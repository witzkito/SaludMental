<?php

namespace SaludMental\SaludMentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();
        $personas = $em->getRepository('SaludMentalBundle:Persona')->findAll();
        $familias = $em->getRepository('SaludMentalBundle:Familia')->findAll();
        $hogares = $em->getRepository('SaludMentalBundle:Hogar')->findAll();
        $casos = array();
        return $this->render('SaludMentalBundle:Default:index.html.twig',
                array('personas' => $personas, 'familias' => $familias, 'hogares' => $hogares,
                    'casos' => $casos));
    }
}
