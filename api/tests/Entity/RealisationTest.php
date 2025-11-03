<?php

namespace App\Tests\Entity;

use App\Entity\Realisation;
use PHPUnit\Framework\TestCase;

class RealisationTest extends TestCase
{
    public function testRealisationEntity(): void
    {
        $realisation = new Realisation();
        $realisation->setType('dessin');
        $realisation->setTitle('Test Title');
        $realisation->setDescription('Test Description');
        $realisation->setImage('test.jpg');

        $this->assertEquals('dessin', $realisation->getType());
        $this->assertEquals('Test Title', $realisation->getTitle());
        $this->assertEquals('Test Description', $realisation->getDescription());
        $this->assertEquals('test.jpg', $realisation->getImage());
    }
}
