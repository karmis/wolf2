<?php

namespace BS\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption')
            ->add('smallContent')
            ->add('content')
            ->add('published')
            ->add(
                'gallery',
                'collection',
                array(
                    'type' => new ActionGalleryType('edit'),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    // 'options' => array('data_class' => 'BS\AdminBundle\Entity\ActionGallery'),
                    'by_reference' => true,
                    'attr' => array('class' => 'gallerey_item'),
                    'label' => ''
                )
            )
            ->add(
                'videoGallery',
                'collection',
                array(
                    'type' => new ActionVideoGalleryType('edit'),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'required' => false,
                    // 'options' => array('data_class' => 'BS\AdminBundle\Entity\ActionGallery'),
                    'by_reference' => true,
                    'attr' => array('class' => 'gallerey_item'),
                    'label' => ''
                )
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BS\AdminBundle\Entity\Action'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bs_adminbundle_action';
    }
}
