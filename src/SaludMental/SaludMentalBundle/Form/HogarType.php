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
            ->add('tipo')
            ->add('baño')
            ->add('agua')
            ->add('electricidad')
            ->add('cloaca')
            ->add('ciudad')
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
