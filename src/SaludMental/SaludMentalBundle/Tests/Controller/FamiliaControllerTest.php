<?php

namespace SaludMental\SaludMentalBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FamiliaControllerTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;
    private $client;
    
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
        $this->client = static::createClient();
    }
    
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/familia/nueva');
        
        $this->assertTrue($crawler->filter('html:contains("Nueva Familia")')->count() > 0);
    }

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/familia/index');
        
        $this->assertTrue($crawler->filter('html:contains("Ver")')->count() > 0);
    }
    
    public function testShow()
    {
        $familia = $this->em
            ->getRepository('SaludMentalBundle:Familia')
            ->findAll();
        foreach ($familia as $fam){
            break;
        }
        if ($fam != null){
            $client = static::createClient();
            $crawler = $client->request('GET', '/familia/show/'. $fam->getId());
            $this->assertTrue($crawler->filter('html:contains("Ver Familia")')->count() > 0);
        }
        
    }

}
