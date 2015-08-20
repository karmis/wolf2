<?php

namespace BS\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventVideoGalleryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption')
            ->add('description')
            ->add('ref')
            ->add('photoFile', 'file', array(
                'data_class' => null
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BS\AdminBundle\Entity\EventVideoGallery'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bs_adminbundle_eventvideogallery';
    }
}
