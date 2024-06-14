<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\Mime\Email;
use Symfony\UX\Turbo\TurboBundle;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ContactServiceInformatiqueType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactServiceInformatiqueController extends AbstractController
{
    #[Route('/service-informatique', name: 'app_contact_service_informatique')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer,Environment $twig): Response
    {

        $user= $this->getUser();
        $email= $user->getEmail();
        $name= $user->getName();
        $lastName= $user->getLastName();


        $form = $this->createForm(ContactServiceInformatiqueType::class);
        
        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $sujet = $contact->getSujet();
            $message = $contact->getMessage();
            $adminEmail= "dev2@sedi-equipement.fr";

     
            // Récupérez le contenu du template Twig
            $templateContent = $twig->render('contact_service_informatique/email_template.html.twig', [
                'sujet' => $sujet,
                'message' => $message,
                "adminEmail" => $adminEmail
            ]);
            // Enregistrez la nouvelle notification
            $entityManager->persist($contact);
            
            $entityManager->flush();

            $email = (new Email())
            ->from($email)
            ->to($adminEmail)
            ->subject($sujet)
            ->text($message)
            ->html($templateContent);

        $mailer->send($email);

            if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                // Créer un objet Response contenant le flux Turbo
                $response = new Response();
                $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                $response->setContent($this->renderView('contact_service_informatique/successSendMail.stream.html.twig', ['form' => $form,   'name'=> $name,'lastname'=> $lastName,'email'=> $email]));
                return $response;
            }  
        }

        return $this->render('contact_service_informatique/index.html.twig', [
            'form' => $form,
            'name'=> $name,
            "lastname"=> $lastName,
            "email"=> $email
        ]);
    }
}
