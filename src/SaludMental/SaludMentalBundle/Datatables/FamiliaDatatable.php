<?php

namespace SaludMental\SaludMentalBundle\Datatables;

use Sg\DatatablesBundle\Datatable\View\AbstractDatatableView;

/**
 * Class FamiliaDatatable
 *
 * @package SaludMental\SaludMentalBundle\Datatables
 */
class FamiliaDatatable extends AbstractDatatableView
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatableView()
    {
        $this->getFeatures()
                            ->setAutoWidth(true)
                            ->setDeferRender(false)
                            ->setInfo(true)
                            ->setJQueryUI(false)
                            ->setLengthChange(true)
                            ->setOrdering(true)
                            ->setPaging(true)
                            ->setProcessing(true)  // default: false
                            ->setScrollX(true)     // default: false
                            ->setScrollY("")
                            ->setSearching(true)
                            ->setServerSide(false)  // default: false
                            ->setStateSave(false)
                            ->setDelay(500);       // default: 0

        $this->getOptions()
            ->setLengthMenu(array(10, 25, 50, 100, -1))
            ->setOrder(array("column" => 1, "direction" => "desc"));
        
        $this->getAjax()->setUrl($this->getRouter()->generate('familia_results'));
        
        
        $this->setIndividualFiltering(true);
        
        $this->getColumnBuilder()
                ->add('id', 'column', array(
                    "title" => "ID",
                    "searchable" => true,
                    "orderable" => true,
                    "visible" => true,
                    "class" => "active",
                    "width" => "100px"
                ))
                ->add('nombre', 'column', array(
                    "title" => "Nombre",
                    "searchable" => true,
                    "orderable" => true,
                    "visible" => true,
                    "class" => "active",
                    "width" => "200px"))
                ->add(null, "action", array(
                "title" => "Acciones",
                "start" => '<div class="wrapper">',
                "end" => '</div>',
                "actions" => array(
                    array(
                        "route" => "show_familia",
                        "route_parameters" => array(
                            "id" => "id"
                        ),
                        "label" => "Ver",
                        "attributes" => array(
                            "rel" => "tooltip",
                            "title" => "Show",
                            "class" => "btn btn-default btn-xs btn-block",
                            "role" => "button"
                        ),
                    ),
                )
            ));
                
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'SaludMentalBundle:Familia';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'familia_datatable';
    }
}
