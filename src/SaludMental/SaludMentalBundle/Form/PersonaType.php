<?php

namespace SaludMental\SaludMentalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('tipoDocumento', 'choice', array(
                'choices' => array('DNI' => 'DNI', 'LE' => 'LE', 'LC' => 'LC' )
            ))
            ->add('nroDocumento')
            ->add('domicilio')
            ->add('nroDomicilio')
            ->add('telefonoFijo')
            ->add('telefonoCelular')
            ->add('fechaNacimiento', 'date', array(
                'format' => 'd/M/y',
                'years' => range(1920, date('Y'))))
            ->add('estadoCivil', 'choice', array(
                'choices' => array('Soltero/a' => 'Soltero/a', 'Casado/a' => 'Casado/a')
            ))
            ->add('ocupacion')
            ->add('discapacidad')
            ->add('jubilado')
            ->add('pensionado')
            ->add('haberes')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SaludMental\SaludMentalBundle\Entity\Persona'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'saludmental_saludmentalbundle_persona';
    }
}
