<?php

namespace SaludMental\SaludMentalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HogarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domicilio')
            ->add('nroDomicilio')
            ->add('barrio')                
            ->add('ciudad')
            ->add('tipo', 'choice', array(
                'choices' => array('Material' => 'Material', 'Madera' => 'Madera')
            ))
            ->add('sanitario', 'choice', array(
                'choices' => array('Instalado' => 'Instalado', 'Letrina' => 'Letrina', 'No' => 'No' )
            ))
            ->add('agua', 'choice', array(
                'choices' => array('Potable' => 'Potable', 'Poso' => 'Poso', 'Vertiente' => 'Vertiente' )
            ))
            ->add('electricidad','choice', array(
                'choices' => array(true => 'Si', false => 'No')))
            ->add('cloaca', 'choice', array(
                'choices' => array(true => 'Si', false => 'No')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SaludMental\SaludMentalBundle\Entity\Hogar'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'saludmental_saludmentalbundle_hogar';
    }
}
