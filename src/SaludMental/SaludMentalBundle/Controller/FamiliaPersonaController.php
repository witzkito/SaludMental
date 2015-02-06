<?php

namespace SaludMental\SaludMentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SaludMental\SaludMentalBundle\Form\FamiliaPersonaType;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FamiliaPersonaController extends Controller
{
    /**
     * @Route("/familia/persona/edit/{id}", name="edit_familia_persona")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $familiaPersona = $em->getRepository('SaludMentalBundle:FamiliaPersona')->find($id);
        
        $form = $this->get('form.factory')->create(
                new FamiliaPersonaType(),
                $familiaPersona
        );
        
        $request = $this->get('request');
            if ($request->getMethod() == 'POST'){
                $form->bind($request);
                if ($form->isValid()){
                    $familiaPersona = $form->getData();
                    $em->persist($familiaPersona);
                    $em->flush();
                    return new RedirectResponse($this->generateUrl('show_familia',array('id' => $familiaPersona->getFamilia()->getId())));
                }
            }
        
        return $this->render('SaludMentalBundle:FamiliaPersona:edit.html.twig',
                array('form' => $form->createView(), 'entity' => $familiaPersona));
    }

}
