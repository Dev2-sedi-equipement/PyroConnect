<?php

namespace App\Controller\Admin;

use DateTimeZone;
use App\Entity\User;
use App\Entity\Statut;
use App\Entity\Dossiers;
use App\Security\EmailVerifier;
use Symfony\Component\Mime\Address;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Symfony\Component\Form\FormBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Form\Extension\Core\Type\{PasswordType, RepeatedType};
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\{Action, Actions, Crud, KeyValueStore};


class UserCrudController extends AbstractCrudController
{

    protected function getPersonas(): ?PasswordAuthenticatedUserInterface
    {
        $user = parent::getUser();

        // Ensure the user implements PasswordAuthenticatedUserInterface
        if ($user instanceof PasswordAuthenticatedUserInterface) {
            return $user;
        }
        
        return null;
    }
    private $entityManager;
    private $validator;
    private $eventDispatcher;
    private $emailVerifier;
    
    public function __construct(
        public UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        EmailVerifier $emailVerifier,
        ValidatorInterface $validator,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->userPasswordHasher = $userPasswordHasher;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
        $this->eventDispatcher = $eventDispatcher;
        $this->emailVerifier = $emailVerifier;
    }
    

    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureCrud(Crud $crud): Crud
        {
            return $crud
                ->setEntityLabelInSingular('Utilisateur')
                ->setEntityLabelInPlural('Liste des utilisateurs')
            
            ;
        }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_EDIT, Action::INDEX, 'Afficher')
            ->add(Crud::PAGE_INDEX, Action::DETAIL, 'Détail')
            ->add(Crud::PAGE_EDIT, Action::DETAIL, 'Supprimer', function (Action $action) {
                return $action->setLabel(false)->setHtmlAttributes([
                    'data-bs-toggle' => 'modal',
                    'data-bs-target' => '#modal-delete',
                
                ]);
            });
    }
    
        

   

 
    public function configureFields(string $pageName): iterable
    {
        $fields = [
        ChoiceField::new('roles')
            ->setChoices([
                'VRP' => 'VRP',
                'SF' => 'SF',
                'Admin' => 'ROLE_ADMIN',
            ])
            ->allowMultipleChoices()
            ->setColumns(6),

            Field::new('codeVrp')
            ->setLabel('Code VRP')
            ->setRequired(false),  

            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('name') ->setColumns(2) ->setLabel('Prénom'),
            TextField::new('lastName')
            ->setLabel('Nom')
            ->setRequired(false),
        

            EmailField::new('email'),       
            DateField::new('createdAt', "Créé le")
            ->setLabel("Créé le") // Définit le label
            // ->hideOnForm() // Cache le champ dans le formulaire de création/édition
            ->setFormTypeOptions([
                'data' => new \DateTimeImmutable(), // La date actuelle comme valeur par défaut
                'disabled' => true, // Désactive le champ
               
            ])
            ->setTimezone('Europe/Paris') // Facultatif : spécifie le fuseau horaire d'affichage
            // ->setColumns(3) // Définit la largeur des colonnes

       
        
        ];

        $password = TextField::new('password')
            ->setFormType(RepeatedType::class)
            ->setFormTypeOptions([
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Répétez le mot de passe'],
                'mapped' => false,
            ])
            ->setRequired($pageName === Crud::PAGE_NEW)
            ->onlyOnForms()
            ;
        $fields[] = $password;

        return $fields;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        

        $roles = $entityInstance->getRoles();
        if (!is_array($roles)) {
            $roles = [$roles];

        }
      
        // Mettre à jour les rôles de l'entité avec le tableau converti
        $entityInstance->setRoles($roles);
        // set default values here before persisting the entity
        $entityInstance->setCreatedAt(new \DateTimeImmutable());
          // Vérifiez s'il y a des erreurs dans le formulaire

        parent::persistEntity($entityManager, $entityInstance);
    }
    
    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context,): FormBuilderInterface
    {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
        // Injectez $entityManager dans la portée de la fonction anonyme
        $entityManager = $this->entityManager;
        // Ajoute un écouteur d'événements pour le POST_SUBMIT
        $formBuilder
        ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event)use ($entityManager) {
            $form = $event->getForm();
            $user = $form->getData(); // Assurez-vous que cela renvoie bien l'entité utilisateur
            if ($user instanceof PasswordAuthenticatedUserInterface) {
                // Ajoutez ici le code pour hasher le mot de passe et d'autres opérations si nécessaire
                $password = $form->get('password')->getData();
                    // Vérifier si le mot de passe répond aux contraintes de validation
                $violations = $this->validator->validatePropertyValue($user, 'password', $password);
                
                if ($this->isGranted('ROLE_VRP') && $user->getCodeVrp() === null) {
                    // Ajoutez une violation personnalisée pour le champ codeVrp
                    $this->addFlash(
                        'danger',
                        'Le code vrp doit être remplis si l\'utilisateur sélectionné est vrp!'
                    );
    
                    // Empêcher la soumission du formulaire
                    $form->addError(new FormError('Une erreur s\'est produite lors de la soumission du formulaire.'));
                    
                    // Retourner ici si vous souhaitez arrêter l'exécution de la fonction après avoir ajouté l'erreur
                    return;
                }
                if (count($violations) === 0) {
                    // Le mot de passe est valide, vous pouvez le hacher
                    $hash = $this->userPasswordHasher->hashPassword($user, $password);
                    $user->setPassword($hash);
                    $user->setCreatedAt(\DateTimeImmutable::createFromFormat(
                        'd-m-Y H:i:s',
                        date('d-m-Y H:i:s'),
                        new DateTimeZone('Europe/Paris')
                    ));


                  
                  
                    $entityManager->persist($user);
                    $entityManager->flush();
                    $this->addFlash(
                        'success',
                        'L\'utilisateur a été créer avec  avec succès!'
                    );
                } else {
                    // Le mot de passe ne répond pas aux critères de validation
                    foreach ($violations as $violation) {
                        // Vous pouvez gérer les violations ici si nécessaire
                        $this->addFlash('danger', $violation->getMessage());
                    }
                }
            }
        })
        ->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event)use ($entityManager) {
            $form = $event->getForm();
            $user = $form->getData(); // Assurez-vous que cela renvoie bien l'entité utilisateur
            if ($user instanceof PasswordAuthenticatedUserInterface) {
                // Ajoutez ici le code pour hasher le mot de passe et d'autres opérations si nécessaire
                $password = $form->get('password')->getData();
                    // Vérifier si le mot de passe répond aux contraintes de validation
                $violations = $this->validator->validatePropertyValue($user, 'password', $password);
                // dd($user->getRoles());
                if ($user->getRoles("VRP") && $user->getCodeVrp() == null) {
                    // Ajoutez une violation personnalisée pour le champ codeVrp
                    $this->addFlash(
                        'danger',
                        'Le code vrp doit être remplis si l\'utilisateur sélectionné est vrp!'
                    );
    
                    // Empêcher la soumission du formulaire
                    $form->addError(new FormError('Une erreur s\'est produite lors de la soumission du formulaire.'));
                    
                    // Retourner ici si vous souhaitez arrêter l'exécution de la fonction après avoir ajouté l'erreur
                    return;
                }

                if (count($violations) === 0) {
                    // Le mot de passe est valide, vous pouvez le hacher
                    $hash = $this->userPasswordHasher->hashPassword($user, $password);
                    $user->setPassword($hash);
                    $user->setCreatedAt(\DateTimeImmutable::createFromFormat(
                        'd-m-Y H:i:s',
                        date('d-m-Y H:i:s'),
                        new DateTimeZone('Europe/Paris')
                    ));
                  
                    // $entityManager->persist($user);
                    // $entityManager->flush();
                    $this->addFlash(
                        'success',
                        'L\'utilisateur a été créer avec  avec succès!'
                    );
                } 
            }
        })
        ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $form = $event->getForm();
            $user = $form->getData();
            if ($user instanceof UserInterface) {
                // Persistez l'entité utilisateur en base de données
           
                // Récupérez l'ID de l'utilisateur après la persistance en base de données
                $userId = $user->getId();
        
                // Vérifiez si l'ID de l'utilisateur est valide
                if ($userId !== null) {
                    // Appelez la méthode sendEmailConfirmation avec l'ID de l'utilisateur
                    $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                        (new TemplatedEmail())
                            ->from(new Address('PyroConnect@mail.com', 'PyroConnect'))
                            ->to($user->getEmail())
                            ->subject('Confirmer mon email')
                            ->htmlTemplate('registration/confirmation_email.html.twig')
                    );
                } else {
                    // Gérez le cas où l'ID de l'utilisateur est null
                    // ...
                }
            }
        });
        

        return $formBuilder;
    }

    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
        $formBuilder
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                $form = $event->getForm();
                $user = $form->getData(); // Assurez-vous que cela renvoie bien l'entité utilisateur

                if ($user instanceof PasswordAuthenticatedUserInterface) {
                    $password = $form->get('password')->getData();
                    
                    if (empty($password)) {
                        // Si le nouveau mot de passe est vide, insérer l'ancien mot de passe
                        $oldPassword = $user->getPassword();
                        $user->setPassword($oldPassword);
                    } else {
                        // Sinon, hasher le nouveau mot de passe
                        $violations = $this->validator->validatePropertyValue($user, 'password', $password);

                        if (count($violations) === 0) {
                            $hash = $this->userPasswordHasher->hashPassword($user, $password);
                            $user->setPassword($hash);
                            $this->addFlash('success', 'Les modifications ont été enregistrées avec succès !');
                        } else {
                            foreach ($violations as $violation) {
                                $this->addFlash('danger', $violation->getMessage());
                            }
                        }
                        $event->stopPropagation();
                    }
                       // Ajoutez votre message flash ici
                    $this->addFlash(
                        'success',
                        'L\'utilisateur a été modifier avec succès!'
                    );
                    
                }
            });

        return $formBuilder;

    }
    
    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof User) {
            $statutArchived = $entityManager->getRepository(Statut::class)->find(1);
    
            if (!$statutArchived) {
                throw new \RuntimeException('Le statut avec l\'ID 1 n\'a pas été trouvé.');
            }
    

            // Vérifier si le rôle de l'utilisateur est "SF"
            if (in_array('SF', $entityInstance->getRoles())) {

                // Si le rôle est "SF", récupérer les dossiers en fonction de l'ID du créateur et seul les dossiers qu'il a créer seront mis en archive 
                $dossiers = [];
            } else {
                // Sinon, récupérer les dossiers en fonction de l'ID de l'utilisateur au role vrp qui met en archive les dossiers du vrp qui lui ont été assignés
                $dossiers = $entityManager->getRepository(Dossiers::class)->findDossiersByVrpId($entityInstance->getId());

            }
    
            foreach ($dossiers as $dossier) {
                // Définir le statut du dossier sur "Archivé"
                $dossier->setStatutId($statutArchived);

                $entityManager->persist($dossier);
            }
    
            // Enregistrer les modifications dans la base de données
            $entityManager->flush();
        }
    
        parent::deleteEntity($entityManager, $entityInstance);
    
        // Ajoutez votre message flash ici
        $this->addFlash(
            'success',
            'L\'utilisateur a été supprimé avec succès!'
        );
    }
    
    
    
    
    
    
    

    private function addPasswordEventListener(FormBuilderInterface $formBuilder): FormBuilderInterface
    {
        return $formBuilder->addEventListener(FormEvents::POST_SUBMIT, $this->hashPassword());
    }

    
    //Hashage du mot de passe sur la partie admin
    private function hashPassword() {
        return function($event) {
            $form = $event->getForm();
            if (!$form->isValid()) {
                return;
            }
            $password = $form->get('password')->getData();
            if ($password === null) {
                return;
            }

            $hash = $this->userPasswordHasher->hashPassword($this->getUser(), $password);
            $form->getData()->setPassword($hash);
        };
    }
    

 
}