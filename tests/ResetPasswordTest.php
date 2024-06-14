<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

class ResetPasswordTest extends WebTestCase
{
    public function testResetPasswordEmailSent(): void
    {
        // Créer un client HTTP pour effectuer la requête
        $client = static::createClient();

        // Simuler une requête POST vers la route 'app_forgot_password_request'
        $crawler = $client->request('POST', '/reset-password', [
            'reset_password_request_form' => [
                'email' => 'raniderradj2@gmail.com', // Remplacez par une adresse e-mail valide
            ],
        ]);

        // Vérifier si la réponse est une redirection vers la page de confirmation d'e-mail
        $this->assertResponseRedirects('/reset-password/check-email');

        // Suivre la redirection
        $client->followRedirect();

        // Vérifier si la réponse a un code 200 OK
        $this->assertResponseStatusCodeSame(200);
    }
}
