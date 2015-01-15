<?php

namespace SaludMental\SaludMentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SaludMental\SaludMentalBundle\Entity\Familia;
use SaludMental\SaludMentalBundle\Form\FamiliaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class FamiliaController extends Controller
{
    /**
     * @Route("/familia/nueva", name="new_familia")
     * @Template()
     */
    public function newAction()
    {
        $em = $this->get('doctrine')->getManager();
        $familia = new Familia;
        $form = $this->get('form.factory')->create(
                new FamiliaType(),
                $familia
        );
        $request = $this->get('request');
            if ($request->getMethod() == 'POST'){
                $form->bind($request);
                if ($form->isValid()){
                    $familia = $form->getData();
                    $em->persist($familia);
                    $em->flush();
                }
            }
        return $this->render('SaludMentalBundle:Familia:new.html.twig',
                array('form' => $form->createView()));
    }

    /**
     * @Route("/familia/index", name="index_familia")
     * @Template()
     */
    public function indexAction()
    {
        
        $repository = $this->getDoctrine()->getRepository('SaludMentalBundle:Familia');

        $query = $repository->createQueryBuilder('f')
            ->select('f')
            ->getQuery();

        $results = $query->getArrayResult();
        
        $encoders = array(new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        
        $familiaDatatable = $this->get("sg_datatables.familia");
        $familiaDatatable->buildDatatableView();
        $familiaDatatable->setData($serializer->serialize($results, 'json'));


        return $this->render('SaludMentalBundle:Familia:index.html.twig',
                array("datatable" => $familiaDatatable));        
    }
    
    /**
     * Get all Post entities.
     *
     * @Route("/results", name="familia_results")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexResultsAction() {
        /**
         * @var \Sg\DatatablesBundle\Datatable\Data\DatatableData $datatable
         */
        $datatable = $this->get("sg_datatables.datatable")->getDatatable($this->get("sg_datatables.familia"));

        // Callback example
        $function = function($qb) {
            $qb->andWhere("Familia.visible = true");
        };

        // Add callback
        $datatable->addWhereBuilderCallback($function);

        return $datatable->getResponse();
    }

    /**
     * @Route("/bulk/delete", name="familia_bulk_delete")
     * @Method("FAMILIA")
     *
     * @return Response
     */
    public function bulkDeleteAction() {
        $request = $this->getRequest();
        $isAjax = $request->isXmlHttpRequest();

        if ($isAjax) {
            $choices = $request->request->get("data");

            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository("SaludMentalBundle:Familia");

            foreach ($choices as $choice) {
                $entity = $repository->find($choice["value"]);
                $em->remove($entity);
            }

            $em->flush();

            return new Response("This is ajax response.");
        }

        return new Response("This is not ajax.", 400);
    }

    /**
     * @Route("/bulk/disable", name="familia_bulk_disable")
     * @Method("FAMILIA")
     *
     * @return Response
     */
    public function bulkDisableAction() {
        $request = $this->getRequest();
        $isAjax = $request->isXmlHttpRequest();

        if ($isAjax) {
            $choices = $request->request->get("data");

            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository("SaludMentalBundle:Familia");

            foreach ($choices as $choice) {
                $entity = $repository->find($choice["value"]);
                $entity->setVisible(false);
                $em->persist($entity);
            }

            $em->flush();

            return new Response("This is ajax response.");
        }

        return new Response("This is not ajax.", 400);
    }
    
    /**
     * @Route("/familia/show/{id}", name="show_familia", options={"expose"=true})
     * @Template()
     */
    public function showAction($id)
    {
        $em =  $em = $this->getDoctrine()->getManager();
        $familia = $em->getRepository("SaludMentalBundle:Familia")->find($id);
        return $this->render('SaludMentalBundle:Familia:show.html.twig',
                array("entity" => $familia));
        
    }

}
