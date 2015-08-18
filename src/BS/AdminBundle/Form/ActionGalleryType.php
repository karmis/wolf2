<?php

namespace BS\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActionGalleryType extends AbstractType
{
    private $widgetType;

    public function __construct($type)
    {
        // if($type == 'edit'){
        //     $this->widgetType = 'iphp_file';
        // } else {
        //     $this->widgetType = 'file';
        // }
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption')
            ->add('photo', 'iphp_file', array(
                'data_class' => null
            ))
           // ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BS\AdminBundle\Entity\ActionGallery'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bs_adminbundle_actiongallery';
    }
}
