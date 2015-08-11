<?php

namespace BS\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('fio')
            ->add('organization', null, array(
                'empty_data' => 0
            ))
            ->add('email')
            ->add('summ')
            ->add('phone')
            ->add('inn', null, array(
                'empty_data' => 0
            ))
            ->add('bik', null, array(
                'empty_data' => 0
            ))
            ->add('rs', null, array(
                'empty_data' => 0
            ))
            ->add('ogrn', null, array(
                'empty_data' => 0
            ))
            ->add('kpp', null, array(
                'empty_data' => 0
            ))
            ->add('basis', null, array(
                'empty_data' => 0
            ))
            ->add('legalAddress', null, array(
                'empty_data' => 0
            ))
            ->add('mailAddress', null, array(
                'empty_data' => 0
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Payment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminbundle_payment';
    }
}
