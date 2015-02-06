<?php

namespace SaludMental\SaludMentalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FamiliaPersonaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('relacion', 'choice', array(
                'choices' => array('Padre' => 'Padre', 'Madre' => 'Madre',
                    'Hijo' => 'Hijo', 'Hija' => 'Hija', 'Abuelo' => 'Abuelo',
                    'Abuela' => 'Abuela', 'Tio' => 'Tio', 'Tia' => 'Tia',
                    'Bisabuelo' => 'Bisabuelo', 'Bisabuela' => 'Bisabuela')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SaludMental\SaludMentalBundle\Entity\FamiliaPersona'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'saludmental_saludmentalbundle_familiapersona';
    }
}
