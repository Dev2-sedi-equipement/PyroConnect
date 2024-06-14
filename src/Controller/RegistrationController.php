<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\Authenticator;
use App\Security\EmailVerifier;
use Symfony\UX\Turbo\TurboBundle;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Component\Mime\Address;
use Symfony\Component\Form\FormError;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;
    private RequestStack $requestStack;
    private TranslatorInterface $translator;


    public function __construct(EmailVerifier $emailVerifier, RequestStack $requestStack,TranslatorInterface $translator)
    {
        $this->emailVerifier = $emailVerifier;
        $this->requestStack = $requestStack;
        $this->translator = $translator;
     
    }

    #[Route('/register', name: 'app_register', methods: ['GET|POST'])]
    public function register(Request $request,UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {        
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
            if ($existingUser) {
                $errorMessage ='Une erreur est survenue !';
                $form->get('email')->addError(new FormError($errorMessage));
                if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                
                    // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                    $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                
                    return $this->render('registration/errorMail.stream.html.twig', ['form' => $form,
                    'registrationForm' => $form,"errorMessage"=>$errorMessage,
                    ]);
                } 
            }
            $user->setCreatedAt(new \DateTimeImmutable());

                if ($form->isValid()) {
                    $task = $form->getData();
                    $user->setPassword(
                        $userPasswordHasher->hashPassword(
                            $user,
                            $form->get('password')->getData()
                        )
                    );
                    
                    $entityManager->persist($user);
                    $entityManager->flush();

                    // generate a signed url and email it to the user
                    $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                        (new TemplatedEmail())
                            ->from(new Address('PyroConnect@mail.com', 'PyroConnect'))
                            ->to($user->getEmail())
                            ->subject('Confirmer mon email')
                            ->htmlTemplate('registration/confirmation_email.html.twig')
                    );
                    
                        
                    $this->addFlash(
                        'success',
                        'L\'utilisateur a bien été créer !'
                    );
                    if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                        // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                    
                        return $this->render('registration/success.stream.html.twig', ['task' => $task,
                        'registrationForm' => $form,
                        ]);
                    }  
                    return $this->redirectToRoute('app_register', [
                        'registrationForm' => $form,
                    ]);
                }else{
                
                   // Récupérez les erreurs du formulaire
                    $errors = [];
                    foreach ($form->getErrors(true) as $error) {
                        $errors[] = $error->getMessage();
                    }

                    if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                        // Si la demande provient de Turbo, définissez le format de la demande comme text/vnd.turbo-stream.html et envoyez uniquement le HTML à mettre à jour
                        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                        
                        return $this->render('registration/errorCode.stream.html.twig', [
                            'form' => $form,
                            'registrationForm' => $form,
                            'errors' => $errors, // Passer les messages d'erreur à votre modèle
                        ]);
                    }

                }
        }
        
      
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

         
    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator, UserRepository $userRepository): Response
    {
        $id = $request->query->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_register');
        }

        $user = $userRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('app_register');
        }

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre adresse e-mail a été vérifiée !');

        return $this->redirectToRoute('app_login');
    }
}
