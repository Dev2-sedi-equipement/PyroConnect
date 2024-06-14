<?php

namespace App\Controller;

use DateTimeZone;
use App\Entity\Statut;
use Psr\Log\LoggerInterface;
use App\Entity\Dossiers;
use App\Form\ClientsType;
use App\Form\DossiersType;
use App\Entity\Commentaires;
use App\Entity\Notification;
use App\Form\CommentairesType;
use App\Form\DossiersEditType;
use Symfony\UX\Turbo\TurboBundle;
use App\Repository\UserRepository;
use App\Repository\StatutRepository;
use App\Form\DossiersEditArchiveType;
use App\Repository\ClientsRepository;
use Symfony\Component\Mercure\Update;
use App\Repository\DossiersRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NotificationRepository;
use DateTime;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



#[Route('/dossiers')]
class DossiersController extends AbstractController
{
    //Fonction pour envoyer une notification SSE à demo_sse.php
    private function sendSSENotification($message)
    {
        $url = 'demo_sse.php';
        $data = ['message' => $message];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
    }

    #[Route('/nouveau', name: 'app_nouveau')]
    public function new(Request $request, EntityManagerInterface $entityManager, Security $security, ValidatorInterface $validator,StatutRepository $statutRepository, NotificationRepository $notificationRepository, UserRepository $userRepository): Response
    {

        $user = $security->getUser();
        $SF = $security->getUser()->getRoles() == ["SF"];
        $VRP = $security->getUser()->getRoles() == ["VRP"];
        $ROLEADMIN = $security->getUser()->getRoles() == ["ROLE_ADMIN"];

       
        $notifications = $notificationRepository->findBy(['user' => $user]);
        
        $notificationRepository = $entityManager->getRepository(Notification::class);
        $notificationsLength = count($notificationRepository->findByUserId($user->getId()));  

        if ($user === null) {
            return $this->redirectToRoute('app_login');
        }
        if ($ROLEADMIN) {
            return $this->render('Bundles/TwigBundle/Exception/error403.html.twig');
        }
  
        $dossier = new Dossiers();   
        
        $statut = $statutRepository->find(4);
        $errors = $validator->validate($dossier);

        $formDossier = $this->createForm(DossiersType::class, $dossier);

        $formDossier->handleRequest($request); 
        if ($formDossier->isSubmitted()) {
            $dossierData = $formDossier->getData();  
            // $dataName = $dossierData->get('data_name')->getData(); 
            $nomClient = $dossierData->getDataName();
            $userId = $dossierData->getUserId();
         
            $dateTir = $dossierData->getDateTir();
            $formattedDate = $dateTir->format('d/m/Y');
            
            // Définir le fuseau horaire
            $timezone = new DateTimeZone('Europe/Paris');
            
            if ($dateTir instanceof \DateTimeImmutable) {
                // Formater la date selon le fuseau horaire et le format demandé (jour/mois/année)
                $dateTirString = $dateTir->setTimezone($timezone)->format('d/m/Y');
            } else {
                // Gérer le cas où la dateTir n'est pas un objet DateTimeImmutable
                $dateTirString = 'date_par_defaut';
            }
            
            $dpt = $dossierData->getDpt();
            $nomDpt= $dpt->getNomDpt();
            
            // Construire le nom du dossier
            $nomDossier = $nomClient."|".$dateTirString;
            
            // Définir la date de création avec DateTimeImmutable
            $dateCreation = new \DateTimeImmutable('now', $timezone);
            
            // Appliquer les modifications au dossierData
            $dossierData->setNom($nomDossier);
            $dossierData->setDateCreation($dateCreation);
                        
            $dossierData->setDateModificationSF(null);
            $dossierData->setDateModificationVRP(null);
            $dossierData->setLectureSF(false);
            $dossierData->setLectureVRP(false);
            $dossierData->setCreateurDossier($user->getId());
            $dossierData->setStatut($statut);
          
            // Create new comment
            $newCommentData = $formDossier->get('dossier_commentaire')->getData();

            if ($newCommentData) {
                $newComment = new Commentaires();
                $newComment->setMessage($newCommentData->getMessage());
                $newComment->setDateCommentaire(new \DateTimeImmutable());
                $newComment->setUser($user);
                $newComment->setDossiers($dossier);

                $dossier->addDossierCommentaire($newComment);
                $entityManager->persist($newComment);
            }

            
            $dossierData->getNomPersonnel();

            $typeFeu = $dossierData->getTypeFeu();
            if ($typeFeu =="F3"){
                $dossierData->setDeclarationPrefecture(1);
            }else{
                $dossierData->setDeclarationPrefecture(0);
                
            }
            $NbPersonnel = $dossierData->getNbPersonnel();
            if($NbPersonnel === 0){
                $dossierData->setContratArtificier(1);
            }else{
                $dossierData->setContratArtificier(0);
            }
 
            $dossierData->getDateTir();
            // dd($dossierData);
            if ($VRP) {
                $dossierData->setAssignVrp($dossierData->getUserId());
                $dossierData->setNomVrp($user->getName(). ' ' . $user->getLastName() );
            }else{
                $dossierData->getNomVrp();
                $dossierData->getAssignVrp();

              
            }       
            if ($formDossier->isValid()) {
                $entityManager->persist($dossierData);
                $entityManager->flush();
                // Vérifiez si l'utilisateur actuel a le rôle VRP
                if ($VRP) {
                    $this->sendSSENotification('Un nouveau dossier a été créé.');
                    // Créez une nouvelle notification
                    // Récupérez les utilisateurs ayant le rôle SF
                    $usersWithSFRole = $userRepository->findSFUsers(); // Remplacez $userRepository par votre repository utilisateur
                    // Attribuez les utilisateurs ayant le rôle SF à la notification
                    foreach ($usersWithSFRole as $userSF) {
            
                        $notification = new Notification();
                        $notification->setUser($userSF);
                        $notification->setTitre("Le VRP " . ($user->getName()) . ' ' . ($user->getLastName()) . " à créer le dossier " . $dossierData->getNom());
                        $notification->setIdDossier($dossierData->getId());
            
                        $notification->setType("création");
                        $notification->setDateCreation($dossierData->getDateCreation());
            
                        // Enregistrez la nouvelle notification
                        $entityManager->persist($notification);
                        $entityManager->flush();
                    }
                
                // Fermez l'EntityManager après la boucle foreach
                $entityManager->close();
                } elseif ($SF){

                    $this->sendSSENotification('Un nouveau dossier a été créé.');
                    $notification = new Notification();   
             
                    $userVrp  = $dossierData->getAssignVrp();
        
              
                    $notification->setUser($userVrp);
                    $notification->setTitre("Le service feux vous a assigner le dossier" . $dossierData->getNom());
                    $notification->setIdDossier($dossierData->getId());
                    $notification->setDateCreation($dossierData->getDateCreation());
                    $notification->setType("création");

                    $entityManager->persist($notification);
                    $entityManager->flush();
                    // Fermez l'EntityManager
                    $entityManager->close();
                }
                
                if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                    // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                    $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                    // Créer un objet Response contenant le flux Turbo
                    $response = new Response();
                    $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                    $response->setContent($this->renderView('dossiers/successCreate.stream.html.twig', ['dossiers' => $dossier, 'form' => $formDossier, 'user' => $user,'notifications' => $notifications,]));
                    return $response;
                }  
                  
                $this->addFlash('success', 'Le dossier a été créé avec succès.');

                return $this->render('dossiers/new.html.twig', [
                    'formDossier' => $formDossier,
                    'dossiers' => $dossier,
                    // 'comment' => $comment,
                    'user' => $user,
                    'notifications' => $notifications,
                    'notificationsLength' => $notificationsLength


                ]);    

            }else {

                if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                    // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                    $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                    // Créer un objet Response contenant le flux Turbo
                    $response = new Response();
                    $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                    $response->setContent($this->renderView('dossiers/errorsCreate.stream.html.twig', ['dossiers' => $dossier, 'formDossier' => $formDossier, 'user' => $user,'errors' => $errors,]));
                    return $response;
                }  
                
            }

         
            return $this->render('dossiers/new.html.twig', [
                'formDossier' => $formDossier,
                // 'formComment' => $formComment->createView(),
                'dossiers' => $dossier,
                // 'comment' => $comment,
                'user' => $user,
                'notifications' => $notifications,
                'notificationsLength' => $notificationsLength


            ]);    
            
            
        }  


        return $this->render('dossiers/new.html.twig', [
            'formDossier' => $formDossier->createView(),
            // 'dossiers' => $dossier,
            'user' => $user,
            'notifications' => $notifications,
            'notificationsLength' => $notificationsLength
        ]);           
    }    
          

    #[Route('/{id}/edit', name: 'app_dossiers_edit', methods: ['GET', 'POST'], requirements: ['id' => '[^/]++'])]
    public function edit(Request $request, Dossiers $dossier, EntityManagerInterface $entityManager, Security $security, NotificationRepository $notificationRepository,UserRepository $userRepository): Response
    {
        $user = $security->getUser();
        $SF = $security->getUser()->getRoles() == ["SF"];
        $VRP = $security->getUser()->getRoles() == ["VRP"];
    
        if ($user === null) {
            $dossier->unlock();
            return $this->redirectToRoute('app_login');
        }
        $userName = $user->getName() . " " . $user->getLastName();
      

         // Vérifier si le dossier est actuellement verrouillé par un autre utilisateur
        if ($dossier->isLocked() && $dossier->getLockedBy() !== $user) {
            return $this->redirectToRoute('app_dossiers_locked_bru', ['id' => $dossier->getId()]);

        }
        // Récupérer l'id du dossier
        $dossierId = $dossier->getId();
        
        // Utiliser le cache pour stocker la présence de l'utilisateur
        $cache = new FilesystemAdapter();
        $cacheItem = $cache->getItem('presence_' . $dossierId);
        $cacheItem->set(true); // Mettre à jour le cache pour indiquer la présence de l'utilisateur
        $cache->save($cacheItem);

        // Verrouiller le dossier pour l'utilisateur actuel
        $dossier->setLockedBy($user);

        $timezone = new DateTimeZone('Europe/Paris');
        $dossier->setDateLocked(new \DateTimeImmutable('now', $timezone));

        $notificationRepository = $entityManager->getRepository(Notification::class);
        $notificationsLength = count($notificationRepository->findByUserId($user->getId()));   
        $user = $security->getUser();
        $notifications = $notificationRepository->findBy(['user' => $user]);
        
        $form = $this->createForm(DossiersEditType::class, $dossier);
          // Créer un formulaire d'archive en clonant le formulaire existant
  
        $archiveForm = $this->createForm(DossiersEditArchiveType::class, $dossier, [
            'action' => $this->generateUrl('app_dossiers_archive', ['id' => $dossier->getId()]),
            'method' => 'POST',
        ]);
        $comments = $dossier->getDossierCommentaire();
        

        $form->handleRequest($request);
        $archiveForm->handleRequest($request);
       
            
        if ($VRP) {    
            // Vérifiez si une notification de lecture a déjà été créée pour ce dossier
            $existingNotification = $notificationRepository->findOneBy(['id_dossier' => $dossier->getId(), 'type' => 'lecture']);
            
            // Si aucune notification de lecture n'existe, créez une nouvelle notification de lecture
            if (!$existingNotification) {
                // Récupérez les utilisateurs ayant le rôle SF
                $usersWithSFRole = $userRepository->findSFUsers();
                foreach ($usersWithSFRole as $userSF) {
                    $notification = new Notification();   
                    $notification->setUser($userSF);
                    $notification->setTitre("Le VRP ". ($user->getName()) .' '. ($user->getLastName()) . " a lu le dossier " .$dossier->getNom());
                    $notification->setIdDossier($dossier->getId());
                    $notification->setType("lecture");
                    $notification->setDateCreation(new \DateTimeImmutable());
                    
                    // Enregistrez la nouvelle notification
                    $entityManager->persist($notification);
                }
                $entityManager->flush();
            
            }else{
                $entityManager->remove($existingNotification);
                $entityManager->flush();

                $usersWithSFRole = $userRepository->findSFUsers();
                foreach ($usersWithSFRole as $userSF) {
                    $notification = new Notification();   
                    $notification->setUser($userSF);
                    $notification->setTitre("Le VRP ". ($user->getName()) .' '. ($user->getLastName()) . " a lu le dossier " .$dossier->getNom());
                    $notification->setIdDossier($dossier->getId());
                    $notification->setType("lecture");
                    $notification->setDateCreation(new \DateTimeImmutable());
                    
                    // Enregistrez la nouvelle notification
                    $entityManager->persist($notification);
                }
                // Verrouiller le dossier pour l'utilisateur actuel
              
                $entityManager->flush();
            }
        }
        if ($SF) {
            if ($dossier->getStatut()->getLibelle() == "Archivé") {
                // Ne rien faire si le dossier est déjà archivé
            } else {
                // Vérifiez si une notification de lecture a déjà été créée pour ce dossier

                $existingNotification = $notificationRepository->findOneBy(['id_dossier' => $dossier->getId(), 'type' => 'lecture']);
                if (!$existingNotification) {
                    // Si aucune notification de lecture n'existe, créez une nouvelle notification de lecture
                    $notification = new Notification();
                    $notification->setUser($dossier->getAssignVrp());
                    $notification->setTitre("Le service a lu votre dossier " . $dossier->getNom() . " le " . (new \DateTimeImmutable())->format('d-m-Y H:i:s'));
                    $notification->setIdDossier($dossier->getId());
                    $notification->setType("lecture");
                    $notification->setDateCreation(new \DateTimeImmutable());
                    
                    // Enregistrez la nouvelle notification
                    $entityManager->persist($notification);
                } else {
                    // Si une notification de lecture existe, supprimez-la d'abord
                    $entityManager->remove($existingNotification);
                    $entityManager->flush();
                
                    // Créez ensuite une nouvelle notification de lecture
                    $newNotification = new Notification();
                    $newNotification->setUser($dossier->getAssignVrp());
                    $newNotification->setTitre("Le service a lu votre dossier " . $dossier->getNom() . " le " . (new \DateTimeImmutable())->format('d-m-Y H:i:s'));
                    $newNotification->setIdDossier($dossier->getId());
                    $newNotification->setType("lecture");
                    $newNotification->setDateCreation(new \DateTimeImmutable());
                    
                    // Enregistrez la nouvelle notification
                    $entityManager->persist($newNotification);
                }
                $entityManager->flush();
                
            }
        }
            
        if ($form->isSubmitted() && $form->isValid()) {
            
            $dateTir = $form->getData()->getDateTir();
            if ($dateTir instanceof \DateTimeImmutable) {
                $dateTir = $dateTir->format('d/m/Y');
            } else {
                // Gérez le cas où la dateTir n'est pas un objet DateTimeImmutable (éventuellement, attribuez une valeur par défaut)
                $dateTir = 'date_par_defaut';
            }
            
            $nomClient = $form->getData()->getDataName();
            
            $nomDossier = $nomClient."|".$dateTir ;
            $form->getData()->setNom($nomDossier);
            $form->getData()->getNbPersonnel();
            
            $form->getData()->isContratArtificier();
            $form->getData()->isTransmis();

            $typeFeu = $form->getData()->getTypeFeu();
            $declaPrefecture = $form->getData()->isDeclarationPrefecture();

            $NbPersonnel = $form->getData()->getnbPersonnel();
            $nomPersonnel = $form->getData()->getNomPersonnel();
            // Create new comment
            $newCommentData = $form->get('dossier_commentaire')->getData();

            if ($newCommentData) {
                $newComment = new Commentaires();
                $newComment->setMessage($newCommentData->getMessage());
                $newComment->setDateCommentaire(new \DateTimeImmutable());
                $newComment->setUser($user);
                $newComment->setDossiers($dossier);

                $dossier->addDossierCommentaire($newComment);
                $entityManager->persist($newComment);
            }

            if ($typeFeu =="F3"){
                $form->getData()->setDeclarationPrefecture(1);
            }
            if ($declaPrefecture ==false){
                $form->getData()->setDeclarationPrefecture(0);
            }

            if($typeFeu =="F4" && $NbPersonnel == 0 && $nomPersonnel == null){
                $form->getData()->setDeclarationPrefecture(0);
                
            }else{
                $form->getData()->setDeclarationPrefecture(1);

            }
        
            if ($VRP){
                
                // Récupérez les utilisateurs ayant le rôle SF
                $usersWithSFRole = $userRepository->findSFUsers(); // Remplacez $userRepository par votre repository utilisateur
                foreach ($usersWithSFRole as $userSF) {
                    
                    $notification = new Notification();   
                    $notification->setUser($userSF);
                    $notification->setTitre("Le VRP ". ($user->getName()) .' '. ($user->getLastName()) . " a modifier le dossier " .$dossier->getNom());
                    $notification->setIdDossier($dossier->getId());
                    $notification->setType("modification");
                    $dateCreation = \DateTimeImmutable::createFromFormat(
                        'd-m-Y H:i:s',
                        date('d-m-Y H:i:s'),
                        new DateTimeZone('Europe/Paris')
                    );
                    
                    $notification->setDateCreation($dateCreation);
                    
                    // Enregistrez la nouvelle notification
                    $entityManager->persist($notification);
                    // Déverrouiller le dossier pour l'utilisateur actuel
                    $dossier->unlock();
                    
                    $entityManager->flush();
 
                }
            }
            
            if ($SF){     
                $dossier->setContratArtificier($form->getData()->isContratArtificier());
         

                
                $statutRepository = $entityManager->getRepository(Statut::class);
                $statutModifie = $statutRepository->find(3);
                if($form->getData()->isDeclarationPrefecture(1) && $form->getData()->isContratArtificier(1) && $form->getData()->isTransmis(1)){
                    $statutTraité = $statutRepository->find(2);
                    $form->getData()->setStatut($statutTraité);
                }else{
                    $form->getData()->setStatut($statutModifie);

                }

                $notification = new Notification();   
                $notification->setUser($dossier->getAssignVrp());
                $notification->setDateCreation(new \DateTimeImmutable());
                $notification->setTitre("Le service a modifier votre dossier " . $dossier->getNom() . " le " . $notification->getDateCreation()->format('d-m-Y H:i:s'));
                $notification->setType("modification");
    
                $notification->setIdDossier($dossier->getId());
                $entityManager->persist($notification);
                // Déverrouiller le dossier pour l'utilisateur actuel
                $dossier->unlock();
                $entityManager->flush();
       

            }

            if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                // Créer un objet Response contenant le flux Turbo
                $response = new Response();
                $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                $response->setContent($this->redirectToRoute('app_index'));
                return $response;
            }
            
           
        }

        $dateTir = $form->getData()->getDateTir();
        
        if ($dateTir instanceof \DateTimeImmutable) {
                $dateTir = $dateTir->format('d-m-Y');
            } else {
            // Gérez le cas où la dateTir n'est pas un objet DateTimeImmutable (éventuellement, attribuez une valeur par défaut)
            $dateTir = 'date_par_defaut';
            }
        
        $nomClient = $dossier->getNom();
   
        $nomDossier = $nomClient;

    
        return $this->render('dossiers/edit.html.twig', [
            'dossiers' => $dossier,
            'form' => $form,
            'user' => $user,
            'nomDossier'=> $nomDossier,
            'comments' => $comments,
            'notifications' => $notifications,
            'notificationsLength' => $notificationsLength,
            "archiveForm"=>$archiveForm

           
        ]);
    }



    #[Route('/{id}/locked', name: 'app_dossiers_locked_bru', methods: ['GET'])]
    public function dossierLocked(Request $request, Dossiers $dossier, EntityManagerInterface $entityManager, Security $security, UserRepository $userRepository): Response
    {
        $user = $security->getUser();
        $roles = $security->getUser()->getRoles();
        $isSF = in_array("SF", $roles);
        $isVRP = in_array("VRP", $roles);

        $form = $this->createForm(DossiersEditType::class, $dossier);

    
        if ($user === null) {
            $dossier->unlock();
            $entityManager->flush();
            return $this->redirectToRoute('app_login');
        }
    
        // Mettre à jour le dossier pour le verrouiller par l'utilisateur actuel
        $dossier->setLockedBy($user);
        $locker = $dossier->getLockedBy();
        $nomDossier= $dossier->getNom();
        $entityManager->flush();
    
        return $this->render('dossiers/locked.html.twig', [
            'locker' => $locker,     
            'user' => $user,    
            'dossiers' => $dossier,
            'nomDossier' => $nomDossier,
            'form' => $form,
            
           
        ]);
    }
    

    #[Route('/{id}', name: 'app_dossiers_archive', methods: ['POST'])]
    public function archive(Request $request, Dossiers $dossier, EntityManagerInterface $entityManager, Security $security,UserRepository $userRepository): Response
    {
        $user = $security->getUser();
        $SF = $security->getUser()->getRoles() == ["SF"];
        $VRP = $security->getUser()->getRoles() == ["VRP"];
        $statutRepository = $entityManager->getRepository(Statut::class);

        if ($this->isCsrfTokenValid('delete' . $dossier->getId(), $request->request->get('_token'))) {
            $newStatus = $statutRepository->find(1);
            

            if ($newStatus instanceof Statut) {

                if ($VRP){
                    $usersWithSFRole = $userRepository->findSFUsers(); // Remplacez $userRepository par votre repository utilisateur
                    foreach ($usersWithSFRole as $userSF) {
                        $dossier->setStatut($newStatus);
                        $notification = new Notification();   
                        $notification->setUser($userSF);
                        $notification->setTitre("Le VRP ". ($user->getName()) .' '. ($user->getLastName()) . " à archiver le dossier " .$dossier->getNom());
                        $notification->setIdDossier($dossier->getId());
                        $notification->setType("archivé");
                        $dateCreation = \DateTimeImmutable::createFromFormat(
                            'd-m-Y H:i:s',
                            date('d-m-Y H:i:s'),
                            new DateTimeZone('Europe/Paris')
                        );
                        
                                            
                        $notification->setDateCreation($dateCreation);
                        // Enregistrez la nouvelle notification
                        $entityManager->persist($notification);
                        $entityManager->persist($dossier);
                        $entityManager->flush();   
                        if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                            // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                            $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                            // Créer un objet Response contenant le flux Turbo
                            $response = new Response();
                            $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                            $response->setContent($this->redirectToRoute('app_index') );
                            return $response;
                        }         
                    }
                }

                if ($SF){
                    $userVrp  = $dossier->getAssignVrp();
                 
                    $dossier->setStatut($newStatus);
                    $notification = new Notification();   
                    $notification->setUser($userVrp);
                    $notification->setTitre("Le Service Feux ". ($user->getName()) .' '. ($user->getLastName()) . " à archiver le dossier " .$dossier->getNom());
                    $notification->setIdDossier($dossier->getId());
                    $notification->setType("archivé");
                    $dateCreation = \DateTimeImmutable::createFromFormat(
                        'd-m-Y H:i:s',
                        date('d-m-Y H:i:s'),
                        new DateTimeZone('Europe/Paris')
                    );
                                        
                    $notification->setDateCreation($dateCreation);
                    // Enregistrez la nouvelle notification
                    $entityManager->persist($notification);
                    $entityManager->persist($dossier);
                    $entityManager->flush();   
                    if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                        // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                        // Créer un objet Response contenant le flux Turbo
                        $response = new Response();
                        $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                        $response->setContent($this->redirectToRoute('app_dossiers_edit',['id' => $dossier->getId()]) );
                        return $response;
                    }         
                }
            }     
        }   
        
        return $this->redirectToRoute('app_index');
        
    }

    #[Route('/archive/{id}', name: 'app_dossiers_rendre_archive')]
    public function rendreAuVrp(Request $request, Dossiers $dossier, EntityManagerInterface $entityManager): Response
    {
       

        $statutRepository = $entityManager->getRepository(Statut::class);
        $archiveForm = $this->createForm(DossiersEditType::class, $dossier);
        $archiveForm->handleRequest($request); 
       
        $dossierData = $archiveForm->getData();
        $statut = $statutRepository->find(4);

        $dossierData->setStatut($statut);

        $notification = new Notification();   
        $notification->setUser($dossier->getAssignVrp());
        $notification->setDateCreation(new \DateTimeImmutable());
        $notification->setTitre("Le service Feux vous a transmis le dossier archivé " . $dossier->getNom() . " le " . $notification->getDateCreation()->format('d-m-Y H:i:s'));
        $notification->setType("création");

        $notification->setIdDossier($dossier->getId());
        $entityManager->persist($notification); 
        $entityManager->persist($dossier);
        $entityManager->flush();
    
        if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
            // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
            $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
            // Créer un objet Response contenant le flux Turbo
            $response = new Response();
            $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
            $response->setContent($this->redirectToRoute('app_dossiers_edit',['id' => $dossier->getId()]) );

            return $response;
        }
        // Redirige vers la page app_index
        return $this->redirectToRoute('app_index');       
    }
    #[Route('/delete/{id}', name: 'app_dossiers_delete', methods: ['POST'])]
    public function delete(DossiersRepository $dossiersRepository, int $id, EntityManagerInterface $entityManager): Response
    {   
        // Récupérer la notification par son ID
        $dossier = $dossiersRepository->find($id);
    
        // Vérifier si la notification existe
        if (!$dossier) {
            // Si la notification n'existe pas, renvoyer une réponse 404 avec l'ID de la notification et l'URL de la requête
            $message = sprintf('Notification with ID %d not found for request %s', $id, $_SERVER['REQUEST_URI']);
            return new Response($message, Response::HTTP_NOT_FOUND);
        }
    
        // Supprimer la notification et enregistrer les changements
        $entityManager->remove($dossier);
        $entityManager->flush();

        // Redirige vers la page app_index
        return $this->redirectToRoute('app_index');    
    }

    #[Route('/findAllTraiteDossiers', name: 'find_all_traite_dossiers', methods: ['GET', 'POST'])]
    public function findAllTraiteDossiers(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer): JsonResponse
    {
        $sortOrder = "asc";
        $statutId = 2; 
    
        // Créez un cache avec une expiration de 3600 secondes (1 heure)
        $cache = new FilesystemAdapter();
    
        // Essayez de récupérer les dossiers du cache
        $dossiersCache = $cache->get('dossiers_traite_' . $sortOrder . '_' . $statutId, function (ItemInterface $item) use ($dossiersRepository, $sortOrder, $statutId) {
            $item->expiresAfter(3600); // 1 heure
            
            // Récupérez les dossiers de la base de données
            return $dossiersRepository->findAllTraiteDossiers($sortOrder, $statutId);
        });

    
        // Normalisez les dossiers récupérés
        $normalizedDossiers = [];
        foreach ($dossiersCache as $dossier) {
            $statutCouleur = $dossier->getStatut()->getId(); // Remplacez 'default-color' par une couleur par défaut appropriée
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $statutCouleur
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            $normalizedDossiers[] = $normalizedDossier;
        }
    
        // Vérifiez s'il y a de nouveaux dossiers en comparant les anciens et les nouveaux résultats
        $newDossiers = $dossiersRepository->findAllTraiteDossiers($sortOrder, $statutId);
        if (count($newDossiers) !== count($dossiersCache)) {
            // Si le nombre de dossiers a changé, invalidez et mettez à jour le cache
            $cache->delete('dossiers_traite_' . $sortOrder . '_' . $statutId);
            $cache->get('dossiers_traite_' . $sortOrder . '_' . $statutId, function (ItemInterface $item) use ($dossiersRepository, $sortOrder, $statutId) {
                $item->expiresAfter(3600); // 1 heure
                return $dossiersRepository->findAllTraiteDossiers($sortOrder, $statutId);
            });
        }
    
        return $this->json(['dossiers' => $normalizedDossiers]);
    }

    #[Route('/findAllTraiteDossiersVrp', name: 'find_all_traite_dossiers_vrp', methods: ['GET', 'POST'])]
    public function findAllTraiteDossiersVrp(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer, Security $security): JsonResponse
    {
        $sortOrder = "desc";
        $statutId = 2; 
        $user = $security->getUser()->getId();
    
        // Créez un cache avec une expiration de 3600 secondes (1 heure)
        $cache = new FilesystemAdapter();
    
        // Essayez de récupérer les dossiers du cache
        $dossiersCache = $cache->get('dossiers_traite_' . $sortOrder . '_' . $statutId . '_' . $user, function (ItemInterface $item) use ($dossiersRepository, $sortOrder, $statutId, $user) {
            $item->expiresAfter(3600); // 1 heure
            
            // Récupérez les dossiers de la base de données
            return $dossiersRepository->findAllTraiteDossiersByAssignVrpId($user, $sortOrder, $statutId);
        });
    
        // Normalisez les dossiers récupérés
        $normalizedDossiers = [];
        foreach ($dossiersCache as $dossier) {
            $statutCouleur = $dossier->getStatut()->getId(); // Remplacez 'vert' par une couleur par défaut appropriée
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $statutCouleur
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            $normalizedDossiers[] = $normalizedDossier;
        }
    
        // Vérifiez s'il y a de nouveaux dossiers en comparant les anciens et les nouveaux résultats
        $newDossiers = $dossiersRepository->findTraiteDossiersByAssignVrpId($user, $sortOrder, $statutId);
        if (count($newDossiers) !== count($dossiersCache)) {
            // Si le nombre de dossiers a changé, invalidez et mettez à jour le cache
            $cache->delete('dossiers_traite_' . $sortOrder . '_' . $statutId . '_' . $user);
            $cache->get('dossiers_traite_' . $sortOrder . '_' . $statutId . '_' . $user, function (ItemInterface $item) use ($dossiersRepository, $sortOrder, $statutId, $user) {
                $item->expiresAfter(3600); // 1 heure
                return $dossiersRepository->findTraiteDossiersByAssignVrpId($user, $sortOrder, $statutId);
            });
        }
    
        return $this->json(['dossiers' => $normalizedDossiers]);
    }
    
    #[Route('/findAllDossiers', name: 'find_all_dossiers', methods: ['GET'])]
    public function findAllDossiers(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer): JsonResponse
    {
        $dossiers = $dossiersRepository->findAllDossiers();
        
        // Convertir les objets Dossiers en tableau associatif
        $normalizedDossiers = [];
        foreach ($dossiers as $dossier) {
            // Construire un tableau associatif avec les éléments spécifiés
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $dossier->getStatut()->getCouleur()
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            // Ajouter le dossier au tableau des dossiers normalisés
            $normalizedDossiers[] = $normalizedDossier;
        }
        
        return $this->json(['dossiers' => $normalizedDossiers]);
    }

    #[Route('/findAllDossiersVrp', name: 'find_all_dossiers_vrp', methods: ['GET'])]
    public function findAllDossiersVrp(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer, Security $security): JsonResponse
    {
        $userId = $security->getUser()->getId();
    
        // Créez un cache avec une expiration de 3600 secondes (1 heure)
        $cache = new FilesystemAdapter();
    
        // Essayez de récupérer les dossiers du cache
        $dossiersCache = $cache->get('dossiers_' . $userId, function (ItemInterface $item) use ($dossiersRepository, $userId) {
            $item->expiresAfter(3600); // 1 heure
            
            // Récupérez les dossiers de la base de données
            return $dossiersRepository->findDossiersByVrpId($userId);
        });
    
        // Normalisez les dossiers récupérés
        $normalizedDossiers = [];
        foreach ($dossiersCache as $dossier) {
            $statutCouleur = $dossier->getStatut()->getCouleur(); // Remplacez 'vert' par une couleur par défaut appropriée
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $statutCouleur
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            $normalizedDossiers[] = $normalizedDossier;
        }
    
        // Vérifiez s'il y a de nouveaux dossiers en comparant les anciens et les nouveaux résultats
        $newDossiers = $dossiersRepository->findDossiersByVrpId($userId);
        if (count($newDossiers) !== count($dossiersCache)) {
            // Si le nombre de dossiers a changé, invalidez et mettez à jour le cache
            $cache->delete('dossiers_' . $userId);
            $dossiersCache = $cache->get('dossiers_' . $userId, function (ItemInterface $item) use ($dossiersRepository, $userId) {
                $item->expiresAfter(3600); // 1 heure
                return $dossiersRepository->findDossiersByVrpId($userId);
            });
        }
    
        return $this->json(['dossiers' => $normalizedDossiers]);
    }

    #[Route('/findAllEnCoursDeTraitement', name: 'find_en_cours_de_traitement', methods: ['GET'])]
    public function findAllEnCoursDeTraitement(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer): JsonResponse
    {
        // Créez un cache avec une expiration de 3600 secondes (1 heure)
        $cache = new FilesystemAdapter();
    
        // Essayez de récupérer les dossiers du cache
        $dossiersCache = $cache->get('dossiers_en_cours', function (ItemInterface $item) use ($dossiersRepository) {
            $item->expiresAfter(3600); // 1 heure
            
            // Récupérez les dossiers de la base de données
            return $dossiersRepository->findAllEnCours();
        });
    
        // Normalisez les dossiers récupérés
        $normalizedDossiers = [];
        foreach ($dossiersCache as $dossier) {
            $statutCouleur = $dossier->getStatut()->getId(); // Remplacez 'default-color' par une couleur par défaut appropriée
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $statutCouleur
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            $normalizedDossiers[] = $normalizedDossier;
        }
    
        // Vérifiez s'il y a de nouveaux dossiers en comparant les anciens et les nouveaux résultats
        $newDossiers = $dossiersRepository->findAllEnCours();
        if (count($newDossiers) !== count($dossiersCache)) {
            // Si le nombre de dossiers a changé, invalidez et mettez à jour le cache
            $cache->delete('dossiers_en_cours');
            $cache->get('dossiers_en_cours', function (ItemInterface $item) use ($dossiersRepository) {
                $item->expiresAfter(3600); // 1 heure
                return $dossiersRepository->findAllEnCours();
            });
        }
    
        return $this->json(['dossiers' => $normalizedDossiers]);
    }

    #[Route('/findAllEnCoursDeTraitementVrp', name: 'find_en_cours_de_traitement_vrp', methods: ['GET'])]
    public function findAllEnCoursDeTraitementVrp(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer, Security $security): JsonResponse
    {
        // Créez un cache avec une expiration de 3600 secondes (1 heure)
        $cache = new FilesystemAdapter();

        $sortOrder = "asc";
        $statutId = 3; 
        $user = $security->getUser()->getId();

        // Essayez de récupérer les dossiers du cache
        $dossiersCache = $cache->get('dossiers_en_cours_' . $sortOrder . '_' . $statutId . '_' . $user, function (ItemInterface $item) use ($dossiersRepository, $sortOrder, $statutId, $user) {
            $item->expiresAfter(3600); // 1 heure
            
            // Récupérez les dossiers de la base de données
            return $dossiersRepository->findAllEnCoursTraitementDossiersByAssignVrpId($user, $sortOrder, $statutId);
        });

        // Normalisez les dossiers récupérés
        $normalizedDossiers = [];
        foreach ($dossiersCache as $dossier) {
            $statutCouleur = $dossier->getStatut()->getId(); // Remplacez 'default-color' par une couleur par défaut appropriée
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $statutCouleur
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            $normalizedDossiers[] = $normalizedDossier;
        }

        // Vérifiez s'il y a de nouveaux dossiers en comparant les anciens et les nouveaux résultats
        $newDossiers = $dossiersRepository->findAllEnCoursTraitementDossiersByAssignVrpId($user, $sortOrder, $statutId);
        if (count($newDossiers) !== count($dossiersCache)) {
            // Si le nombre de dossiers a changé, invalidez et mettez à jour le cache
            $cache->delete('dossiers_en_cours_' . $sortOrder . '_' . $statutId . '_' . $user);
            $dossiersCache = $cache->get('dossiers_en_cours_' . $sortOrder . '_' . $statutId . '_' . $user, function (ItemInterface $item) use ($dossiersRepository, $sortOrder, $statutId, $user) {
                $item->expiresAfter(3600); // 1 heure
                return $dossiersRepository->findAllEnCoursTraitementDossiersByAssignVrpId($user, $sortOrder, $statutId);
            });
        }

        return $this->json(['dossiers' => $normalizedDossiers]);
    }
    
    #[Route('/findAllNonTraite', name: 'find_non_traite', methods: ['GET'])]
    public function findAllNonTraite(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer): JsonResponse
    {
        // Créez un cache avec une expiration de 3600 secondes (1 heure)
        $cache = new FilesystemAdapter();
    
        // Essayez de récupérer les dossiers du cache
        $dossiersCache = $cache->get('dossiers_non_traite', function (ItemInterface $item) use ($dossiersRepository) {
            $item->expiresAfter(3600); // 1 heure
            
            // Récupérez les dossiers de la base de données
            return $dossiersRepository->findAllNonTraite();
        });
    
        // Normalisez les dossiers récupérés
        $normalizedDossiers = [];
        foreach ($dossiersCache as $dossier) {
            $statutCouleur = $dossier->getStatut()->getId();  // Remplacez 'default-color' par une couleur par défaut appropriée
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $statutCouleur
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            $normalizedDossiers[] = $normalizedDossier;
        }
    
        // Vérifiez s'il y a de nouveaux dossiers en comparant les anciens et les nouveaux résultats
        $newDossiers = $dossiersRepository->findAllNonTraite();
        if (count($newDossiers) !== count($dossiersCache)) {
            // Si le nombre de dossiers a changé, invalidez et mettez à jour le cache
            $cache->delete('dossiers_non_traite');
            $cache->get('dossiers_non_traite', function (ItemInterface $item) use ($dossiersRepository) {
                $item->expiresAfter(3600); // 1 heure
                return $dossiersRepository->findAllNonTraite();
            });
        }
    
        return $this->json(['dossiers' => $normalizedDossiers]);
    }

    #[Route('/findAllNonTraiteVrp', name: 'find_non_traite_vrp', methods: ['GET'])]
    public function findAllNonTraiteVrp(Request $request, DossiersRepository $dossiersRepository, SerializerInterface $serializer, Security $security): JsonResponse
    {

        $sortOrder = "asc";
        $statutId = 4; 
        $user = $security->getUser()->getId();

        // Créez un cache avec une expiration de 3600 secondes (1 heure)
        $cache = new FilesystemAdapter();
    
        // Essayez de récupérer les dossiers du cache
        $dossiersCache = $cache->get('dossiers_non_traite', function (ItemInterface $item) use ($dossiersRepository, $sortOrder, $statutId, $user)  {
            $item->expiresAfter(3600); // 1 heure
            
            // Récupérez les dossiers de la base de données
            return $dossiersRepository->findAllNonTraiteDossiersByAssignVrpId($user, $statutId,$sortOrder);
        });
    
        // Normalisez les dossiers récupérés
        $normalizedDossiers = [];
        foreach ($dossiersCache as $dossier) {
            $statutCouleur = $dossier->getStatut()->getId(); // Remplacez 'default-color' par une couleur par défaut appropriée
            $normalizedDossier = [
                'id' => $dossier->getId(),
                'nom' => $dossier->getNom(),
                'dateTir' => $dossier->getDateTir() ? $dossier->getDateTir()->format('d-m-Y') : null,
                'typeFeu' => $dossier->getTypeFeu(),
                'nomVrp' => $dossier->getNomVrp() ?: "L'utilisateur a été supprimé ou n'existe pas en base de données.",
                'statut' => [
                    'couleur' => $statutCouleur
                ],
                'dateCreation' => $dossier->getDateCreation() ? $dossier->getDateCreation()->format('d/m/Y H:i:s') : null,
            ];
            $normalizedDossiers[] = $normalizedDossier;
        }
    
        // Vérifiez s'il y a de nouveaux dossiers en comparant les anciens et les nouveaux résultats
        $newDossiers = $dossiersRepository->findAllNonTraite();
        if (count($newDossiers) !== count($dossiersCache)) {
            // Si le nombre de dossiers a changé, invalidez et mettez à jour le cache
            $cache->delete('dossiers_non_traite');
            $cache->get('dossiers_non_traite', function (ItemInterface $item) use ($dossiersRepository) {
                $item->expiresAfter(3600); // 1 heure
                return $dossiersRepository->findAllNonTraite();
            });
        }
    
        return $this->json(['dossiers' => $normalizedDossiers]);
    }
    
    #[Route('/unlock-dossiers/{id}', name: 'app_unlock_dossiers', methods: ['GET'])]
    public function unlockDossiersBeforeBackHomePage(int $id, EntityManagerInterface $entityManager,Request $request): Response
    {
      
        $dossier = $entityManager->getRepository(Dossiers::class)->find($id);
        
        if (!$dossier) {
            throw $this->createNotFoundException('Le dossier avec l\'id ' . $id . ' n\'existe pas.');
        }
    
        $user = $this->getUser();
        
        if ($user) {
            $dossier = $entityManager->getRepository(Dossiers::class)->find($id);
            
            if ($dossier && $dossier->getLockedBy() === $user) {
                // Si l'utilisateur actuel a verrouillé le dossier, le déverrouiller
                $dossier->unlock();
                $dossier->setDateLocked(null);
                $entityManager->flush();
            }
        }
        
        return $this->redirectToRoute('app_index');
  
    }

    #[Route('/deleteCommentaire/{id}', name: 'app_delete_commentaire_dossiers', methods: ['GET'])]
    public function deleteCommentaire(int $id, EntityManagerInterface $entityManager): Response
    {
        $commentaire = $entityManager->getRepository(Commentaires::class)->find($id);

        if (!$commentaire) {
            throw $this->createNotFoundException('Commentaire non trouvé');
        }

        $entityManager->remove($commentaire);
        $entityManager->flush();

        return new Response('Commentaire supprimé avec succès');
    }

    #[Route('/modifyCommentaire/{id}', name: 'app_modify_commentaire_dossiers')]
    public function modifyCommentaire(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $commentRepository = $entityManager->getRepository(Commentaires::class);
        $comment = $commentRepository->find($id);

        if (!$comment) {
            return new JsonResponse(['error' => 'Comment not found'], 404);
        }

        $data = json_decode($request->getContent(), true);
 
        if (isset($data['message'])) {
            $comment->setMessage($data['message']);
            $entityManager->flush();

            
            return new JsonResponse([],200);
        }

        return new JsonResponse(['error' => 'Invalid data'], 400);
    }

    
 

#[Route('/submit-comment/{id}', name: 'app_submit_comment_dossiers')]
public function submitCommentaire(int $id, Request $request, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
{
    $dossierRepository = $entityManager->getRepository(Dossiers::class);
    $dossier = $dossierRepository->find($id);

    if (!$dossier) {
        return new JsonResponse(['error' => 'Dossier not found'], 404);
    }

    $content = $request->getContent();
    $data = json_decode($content, true);

    // Log the raw and decoded data for debugging purposes
    $logger->debug('Raw POST data: ' . $content);
    $logger->debug('Decoded POST data: ' . print_r($data, true));

    if (isset($data['message'])) {
        $comment = new Commentaires();
        $comment->setMessage($data['message']);
        $comment->setDossiers($dossier);
        $comment->setUser($this->getUser()); // Assuming you have a method to get the current user
        $comment->setDateCommentaire(new \DateTimeImmutable());

        $entityManager->persist($comment);
        $entityManager->flush();

        $responseComment = [
            'id' => $comment->getId(),
            'message' => $comment->getMessage(),
            'dateCommentaire' => $comment->getDateCommentaire()->format('Y-m-d H:i:s'),
            'userId' => $comment->getUser()->getId(),
            'userName' => $comment->getUser()->getName(), // Assuming your User object has a getName() method
            'userLastName' => $comment->getUser()->getLastName(), // Assuming your User object has a getLastName() method
        ];

        return new JsonResponse(['message' => 'Commentaire ajouté avec succès', 'comment' => $responseComment]);
    }

    return new JsonResponse(['error' => 'Invalid data', 'receivedData' => $data], 400);
}

    



    // #[Route('/{id}/unlock', name: 'app_dossiers_unlock', methods: ['POST'], requirements: ['id' => '\d+'])]
    // public function unlockDossier(Request $request, Dossiers $dossier, EntityManagerInterface $entityManager): Response
    // {
    //     // Vérifiez si le dossier est actuellement verrouillé par l'utilisateur
    //     if ($dossier->isLocked() && $dossier->getLockedBy() === $this->getUser()) {
    //         // Déverrouillez le dossier
    //         $dossier->unlock();
    //         $entityManager->flush();
    //     }
    
    //     // Répondez avec une réponse vide ou un message de confirmation
    //     return new Response('', Response::HTTP_NO_CONTENT);
    // }

    

}



// $comment = new Commentaires();
    // $formComment = $this->createForm(CommentairesType::class, $comment);
    // // Traitement du formulaire de commentaire s'il est soumis et valide
    // $formComment->handleRequest($request); 
    // if ($formComment->isSubmitted() && $formComment->isValid()) {
    //     // Accéder aux données du formulaire commentaire
    //     $commentaireData = $formComment->getData();

    //     $commentaireData->setDateCommentaire(new \DateTimeImmutable());
    //     $commentaireData->setUser($user);
    //     $commentaireData->setDossiers($dossierData);

    //     $entityManager->persist($commentaireData);



    // #[Route('/{id}', name: 'app_comments_show', methods: ['GET'])]
    // public function show(Dossiers $dossier): Response
    // {
    //     return $this->render('dossiers/show.html.twig', [
    //         'dossier' => $dossier,
    //     ]);
    // }