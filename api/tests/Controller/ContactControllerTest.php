<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testValidContactSubmission(): void
    {
        $client = static::createClient();

        $client->request('POST', '/api/contact', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'nom' => 'Test Nom',
            'email' => 'test@example.com',
            'telephone' => '0123456789',
            'sujet' => 'Sujet test',
            'message' => 'Ceci est un message de test de plus de 10 caractères.',
        ]));

        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertTrue($response['success']);
    }

    public function testInvalidContactSubmission(): void
    {
        $client = static::createClient();

        $client->request('POST', '/api/contact', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'nom' => '',
            'email' => 'bademail',
            'message' => 'Trop court',
        ]));

        $this->assertResponseStatusCodeSame(400);
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertFalse($response['success']);
    }
}
