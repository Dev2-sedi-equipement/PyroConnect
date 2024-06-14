<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\GregwarCaptchaType;
use Symfony\UX\Turbo\TurboBundle;
use Symfony\Component\Mime\Address;
use App\Form\ChangePasswordFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ResetPasswordRequestFormType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\Exception\ResetPasswordExceptionInterface;

#[Route('/reset-password')]
class ResetPasswordController extends AbstractController
{
    use ResetPasswordControllerTrait;

    public function __construct(
        private ResetPasswordHelperInterface $resetPasswordHelper,
        private EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Display & process form to request a password reset.
     */

    private const INVALID_ATTEMPTS_KEY = 'invalid_password_reset_attempts';
    private const MAX_INVALID_ATTEMPTS = 5;
    private const BLOCK_DURATION = 300; // 5 minutes in seconds

    #[Route('', name: 'app_forgot_password_request')]
    public function request(Request $request, MailerInterface $mailer, TranslatorInterface $translator): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);
        // Create the form
        $formCaptcha = $this->createForm(GregwarCaptchaType::class);
        $formCaptcha->handleRequest($request);

        if ($formCaptcha->isSubmitted()) {
            if($formCaptcha->isValid()){

                if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                    // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                    $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                    // Créer un objet Response contenant le flux Turbo
                    $response = new Response();
                    $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                    // Add a success flash message
                    $response->setContent($this->render('reset_password/form.html.twig',[ 'requestForm' => $form->createView()]));
                    return $response;
                }

            }else{
                if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                    // If the request comes from Turbo, set the content type as text/vnd.turbo-stream.html and only send the HTML to update
                    $request->setRequestFormat(TurboBundle::STREAM_FORMAT);
                    // Créer un objet Response contenant le flux Turbo
                    $response = new Response();
                    $response->headers->set('Content-Type', 'text/vnd.turbo-stream.html');
                    // Add a success flash message
                    $this->addFlash('danger', 'Le code renseigné n\'est pas bon.');
                    $response->setContent($this->redirectToRoute('app_forgot_password_request'));
                    return $response;
                }
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->processSendingPasswordResetEmail(
                $form->get('email')->getData(),
                $mailer,
                $translator
            );

            
        }

        return $this->render('reset_password/request.html.twig', [
            'requestForm' => $form->createView(),
            'form' => $formCaptcha->createView(),

        ]);
    }

    /**
     * Confirmation page after a user has requested a password reset.
     */
    #[Route('/check-email', name: 'app_check_email')]
    public function checkEmail(): Response
    {
        // Generate a fake token if the user does not exist or someone hit this page directly.
        // This prevents exposing whether or not a user was found with the given email address or not
        if (null === ($resetToken = $this->getTokenObjectFromSession())) {
            $resetToken = $this->resetPasswordHelper->generateFakeResetToken();
        }

        return $this->render('reset_password/check_email.html.twig', [
            'resetToken' => $resetToken,
        ]);
    }

    /**
     * Validates and process the reset URL that the user clicked in their email.
     */
    #[Route('/reset/{token}', name: 'app_reset_password')]
    public function reset(Request $request, UserPasswordHasherInterface $passwordHasher, TranslatorInterface $translator, string $token = null): Response
    {
        if ($token) {
            // We store the token in session and remove it from the URL, to avoid the URL being
            // loaded in a browser and potentially leaking the token to 3rd party JavaScript.
            $this->storeTokenInSession($token);

            return $this->redirectToRoute('app_reset_password');
        }

        $token = $this->getTokenFromSession();
        if (null === $token) {
            throw $this->createNotFoundException('No reset password token found in the URL or in the session.');
        }

        try {
            $user = $this->resetPasswordHelper->validateTokenAndFetchUser($token);
        } catch (ResetPasswordExceptionInterface $e) {
            $this->addFlash('reset_password_error', sprintf(
                '%s - %s',
                $translator->trans(ResetPasswordExceptionInterface::MESSAGE_PROBLEM_VALIDATE, [], 'ResetPasswordBundle'),
                $translator->trans($e->getReason(), [], 'ResetPasswordBundle')
            ));

            return $this->redirectToRoute('app_forgot_password_request');
        }

        // The token is valid; allow the user to change their password.
        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // A password reset token should be used only once, remove it.
            $this->resetPasswordHelper->removeResetRequest($token);

            
            if($form->isValid()){
                // Encode(hash) the plain password, and set it.
                $encodedPassword = $passwordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                );
                $user->setPassword($encodedPassword);
                $this->entityManager->flush();
                // The session is cleaned up after the password has been changed.
                $this->cleanSessionAfterReset();
    
                return $this->redirectToRoute('app_index');

            }else{
                if ($form->isSubmitted() && !$form->isValid()) {
                    if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
        
        
                        $this->addFlash('danger', 'Le mot de passe ne satisfait pas les conditions : 12 caractères minimum, dont 1 majuscule, un chiffre, et un caractère spécial.');
            
                        return $this->render('reset_password/reset.html.twig', [
                            'resetForm' => $form,
                        ]);
                    }
        
                }

            }
  
        }

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form->createView(),
        ]);
    }

    private function processSendingPasswordResetEmail(string $emailFormData, MailerInterface $mailer, TranslatorInterface $translator): Response
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy([
            'email' => $emailFormData,
        ]);
    
        // Do not reveal whether a user account was found or not.
        if (!$user) {
            // L'e-mail n'existe pas, ajoutez un message flash et redirigez.
            $this->addFlash('reset_password_error', 'L\'adresse e-mail n\'existe pas.');
    
            // Si la requête n'est pas de type Turbo, redirigez normalement
            return $this->redirectToRoute('app_forgot_password_request');
        }
    

        try {
            $resetToken = $this->resetPasswordHelper->generateResetToken($user);
        } catch (ResetPasswordExceptionInterface $e) {
            // If you want to tell the user why a reset email was not sent, uncomment
            // the lines below and change the redirect to 'app_forgot_password_request'.
            // Caution: This may reveal if a user is registered or not.
            //
            // $this->addFlash('reset_password_error', sprintf(
            //     '%s - %s',
            //     $translator->trans(ResetPasswordExceptionInterface::MESSAGE_PROBLEM_HANDLE, [], 'ResetPasswordBundle'),
            //     $translator->trans($e->getReason(), [], 'ResetPasswordBundle')
            // ));

            return $this->redirectToRoute('app_check_email');
        }

        $email = (new TemplatedEmail())
            ->from(new Address("dev2@sedi-equipement.fr", 'Dev2'))
            ->to($user->getEmail())
            ->subject('Réinitialisation du mot de passe | PyroConnect')
            ->htmlTemplate('reset_password/email.html.twig')
            ->context([
                'resetToken' => $resetToken,
            ])
        ;

        $mailer->send($email);

        // Store the token object in session for retrieval in check-email route.
        $this->setTokenObjectInSession($resetToken);

        return $this->redirectToRoute('app_check_email');
    }
}
