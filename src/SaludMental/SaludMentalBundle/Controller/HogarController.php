<?php

namespace SaludMental\SaludMentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SaludMental\SaludMentalBundle\Entity\Hogar;
use SaludMental\SaludMentalBundle\Form\HogarType;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HogarController extends Controller
{
    /**
     * @Route("/hogar/new/{id}", name="new_hogar")
     * @Template()
     */
    public function newAction($id)
    {
        $em = $this->get('doctrine')->getManager();
        $familia = $em->getRepository('SaludMentalBundle:Familia')->find($id);
        
        $hogar = new Hogar;
        $hogar->addFamilia($familia);
        $form = $this->get('form.factory')->create(
                new HogarType(),
                $hogar
        );
        $request = $this->get('request');
            if ($request->getMethod() == 'POST'){
                $form->bind($request);
                if ($form->isValid()){
                    $hogar = $form->getData();
                    $familia->setHogar($hogar);
                    $em->persist($hogar);
                    $em->persist($familia);
                    $em->flush();
                    return new RedirectResponse($this->generateUrl('show_familia',array('id' => $familia->getId())));
                }
                
            }
        
       return $this->render('SaludMentalBundle:Hogar:new.html.twig',
                array('form' => $form->createView(), 'familia' => $familia));    
       
    }

    /**
     * @Route("/hogar/show/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/hogar/edit/{id}")
     * @Template()
     */
    public function editAction($id)
    {
        return array(
                // ...
            );    }

}
