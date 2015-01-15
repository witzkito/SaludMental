<?php

namespace SaludMental\SaludMentalBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PersonaControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new/{id}');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/persona/show/{id}');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/persona/edit/{id}');
    }

}
