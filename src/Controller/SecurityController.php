<?php

namespace App\Controller;

use Symfony\UX\Turbo\TurboBundle;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login( Request $request, AuthenticationUtils $authenticationUtils, Security $security): Response
    {
        $lastUsername = $authenticationUtils->getLastUsername();
        $error = $authenticationUtils->getLastAuthenticationError();
   
        if($security->getUser() !== null){
            return $this->redirectToRoute("app_index");
        };
 

    
        if ($error) {
            if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
            
                return $this->render('security/error.stream.html.twig', ['error' => $error,
                'last_username' => $lastUsername,
                ]);
            }  
            
            
    
        }
    
        // Si l'authentification réussit ou si c'est la première fois que l'utilisateur accède à la page de connexion, renvoyer une réponse normale
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    public function onLogoutSuccess(): RedirectResponse
    {
        return $this->redirectToRoute('app_login');
    }
}
