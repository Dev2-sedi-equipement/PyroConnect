<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\UX\Turbo\TurboBundle;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class GestionProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_gestion_profil')]
    public function index(UserRepository $userRepository, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, Security $security, ValidatorInterface $validator): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
        $ROLEADMIN = $security->getUser()->getRoles() == ["ROLE_ADMIN"];
        if ($user === null) {
            return $this->redirectToRoute('app_login');
        }
    
        if ($ROLEADMIN) {
            return $this->redirectToRoute('app_admin');
        }
    
        // Utiliser le cache pour récupérer les données de l'utilisateur
        $userData = $userRepository->find($user->getId());
     
    
        // Créer une instance de UserType en passant les données de l'utilisateur
        $form = $this->createForm(UserType::class, $userData);
        $form->handleRequest($request);
    
        if ($form->isSubmitted()) {
            // Récupérer les données soumises par le formulaire
            $modifiedUser = $form->getData();

            
            // Si un nouveau mot de passe a été saisi, hasher le mot de passe et l'enregistrer
            if ($form->get('password')->getData()) {
                $modifiedUser->setPassword(
                    $userPasswordHasher->hashPassword(
                        $modifiedUser,
                        $form->get('password')->getData()
                    )
                );
            }

            if ($form->isValid()){
                         
                // Enregistrer les modifications dans la base de données
                $modifiedUser->setmodifiedAt(new \DateTimeImmutable());
                // Enregistrer les modifications dans la base de données
                $entityManager->flush();
                if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                    $successMessage = "Bien ! Votre mot de passe à bien été changé.";
                    // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                    $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                            
                    return $this->render('gestion_profil/successPassword.stream.html.twig', ['form' => $form
                    ,"success"=>$successMessage,
                    ]);
                } 
            }else{
                if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                    $user = new User();
                    $errors = $validator->validate($user);

                    if (count($errors) > 0) {
                        $this->addFlash('danger', 'Le mot de passe ne satisfait pas les conditions : 12 caractères minimum, dont 1 majuscule, un chiffre, et un caractère spécial.');

                        // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                            
                        return $this->render('gestion_profil/errorPassword.stream.html.twig', ['form' => $form]
                        );
                    } 
                }
            }
        }
    
        // Générer le rendu du template avec le formulaire
        return $this->render('gestion_profil/index.html.twig', [
            'form' => $form,
            'user' => $user,
        ]);
    }    
}
