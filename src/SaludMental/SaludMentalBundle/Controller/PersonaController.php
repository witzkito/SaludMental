<?php

namespace SaludMental\SaludMentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SaludMental\SaludMentalBundle\Entity\Persona;
use SaludMental\SaludMentalBundle\Form\PersonaType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Session\Session;

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
            return new RedirectResponse($this->generateUrl('show_familia',array('id' => $familia->getId())));
        }
        return $this->render('SaludMentalBundle:Persona:new.html.twig',
                array('form' => $form->createView(), 'familia' => $familia));
    }
    
    /**
     * @Route("/persona/delete/{id}", name="delete_persona")
     * @Template()
     */
    public function deleteAction($id)
    {
        $em =  $em = $this->getDoctrine()->getManager();
        $personaFamilia = $em->getRepository("SaludMentalBundle:FamiliaPersona")->find($id);
        $em->remove($personaFamilia);
        $em->flush();
        return new RedirectResponse($this->generateUrl('show_familia',array('id' => $personaFamilia->getFamilia()->getId())));
    }
        
    /**
     * @Route("/persona/new/list/{id}", name="new_list_persona")
     * @Template()
     */
    public function newListAction($id)
    {
        
        $repository = $this->getDoctrine()->getRepository('SaludMentalBundle:Persona');
        $em =  $em = $this->getDoctrine()->getManager();
        $familia = $em->getRepository("SaludMentalBundle:Familia")->find($id);
        
        $session = new Session();
        
        
        $session->set('id_familia', $familia->getId());


        $query = $repository->createQueryBuilder('p')
            ->select('p')
            ->getQuery();

        $results = $query->getArrayResult();
        
        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        
        $personaNewListDatatable = $this->get("sg_datatables.persona.new.list");
        $personaNewListDatatable->buildDatatableView();
        $personaNewListDatatable->setData($serializer->serialize($results, 'json'));
        


        return $this->render('SaludMentalBundle:Persona:newList.html.twig',
                array("datatable" => $personaNewListDatatable));        
    }
    
    /**
     * Get all Post entities.
     *
     * @Route("/persona/new/list/results", name="persona_results")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexResultsAction() {
        /**
         * @var \Sg\DatatablesBundle\Datatable\Data\DatatableData $datatable
         */
        $datatable = $this->get("sg_datatables.datatable")->getDatatable($this->get("sg_datatables.persona.new.list"));

        // Callback example
        $function = function($qb) {
            $qb->andWhere("Persona.visible = true");
        };

        // Add callback
        $datatable->addWhereBuilderCallback($function);

        return $datatable->getResponse();
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
     * @Route("/persona/edit/{id}", name="edit_persona")
     * @Template()
     */
    public function editAction($id)
    {
        $em =  $em = $this->getDoctrine()->getManager();
        $familiaPersona = $em->getRepository("SaludMentalBundle:FamiliaPersona")->find($id);
        $persona = $familiaPersona->getPersona();
        $familia = $familiaPersona->getFamilia();
        $form = $this->get('form.factory')->create(
            new PersonaType(),
            $persona
        );
        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->bind($request);
            $persona = $form->getData();
            $em->persist($persona);
            $em->flush();
            return new RedirectResponse($this->generateUrl('show_familia',array('id' => $familia->getId())));
        }
        return $this->render('SaludMentalBundle:Persona:edit.html.twig',
                array('form' => $form->createView(), 'entity' => $familiaPersona));
        
        }

}
