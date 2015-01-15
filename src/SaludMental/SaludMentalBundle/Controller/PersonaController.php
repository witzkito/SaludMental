<?php

namespace SaludMental\SaludMentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SaludMental\SaludMentalBundle\Entity\Persona;
use SaludMental\SaludMentalBundle\Form\PersonaType;

class PersonaController extends Controller
{
    /**
     * @Route("/persona/new/{id}", name="new_persona")
     * @Template()
     */
    public function newAction($id)
    {
        $em =  $em = $this->getDoctrine()->getManager();
        $familia = $em->getRepository("SaludMentalBundle:Familia")->find($id);
        $persona = new Persona;
        $form = $this->get('form.factory')->create(
            new PersonaType(),
            $persona
        );
        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->bind($request);
            $persona = $form->getData();
            $personaFamilia = new \SaludMental\SaludMentalBundle\Entity\FamiliaPersona;
            $personaFamilia->setFamilia($familia);
            $personaFamilia->setPersona($persona);
            $persona->addFamilia($personaFamilia);
            $em->persist($persona);
            $em->persist($personaFamilia);
            $em->flush();
        }
        return $this->render('SaludMentalBundle:Persona:new.html.twig',
                array('form' => $form->createView(), 'familia' => $familia));
    }

    /**
     * @Route("/persona/show/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/persona/edit/{id}")
     * @Template()
     */
    public function editAction($id)
    {
        return array(
                // ...
            );    }

}
