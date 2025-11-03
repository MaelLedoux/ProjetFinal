<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RealisationApiControllerTest extends WebTestCase
{
    public function testGetMaquetteRealisations(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/realisations/maquette');

        $this->assertResponseIsSuccessful();
        $this->assertResponseFormatSame('json');

        $data = json_decode($client->getResponse()->getContent(), true);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data, "La liste des maquettes ne devrait pas être vide");

        foreach ($data as $realisation) {
            $this->assertArrayHasKey('id', $realisation);
            $this->assertArrayHasKey('image', $realisation);
            $this->assertArrayHasKey('description', $realisation);
        }
    }
}
