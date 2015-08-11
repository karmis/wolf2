<?php

namespace BS\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption')
            ->add('metaTitle', null, array(
                'required' => true
            ))
            ->add('metaDescription', null, array(
                'required' => true
            ))
            ->add('metaKeywords', null, array(
                'required' => true
            ))
            ->add('slug')
            ->add('content', null, array(
                'required' => false
            ))
            ->add('published', null, array(
                'required' => false
            ))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_page';
    }
}
