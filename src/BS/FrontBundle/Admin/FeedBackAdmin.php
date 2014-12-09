<?php

namespace BS\FrontBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use BS\FrontBundle\Entity\FeedBack;

class FeedBackAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array(
                'label' => 'form.name'
            ))
            ->add('email', null, array(
                'label' => 'form.email'
            ))
            ->add('phone', null, array(
                'label' => 'form.phone'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array(
                'label' => 'form.name'
            ))
            ->add('email', null, array(
                'label' => 'form.email'
            ))
            ->add('phone', null, array(
                'label' => 'form.phone'
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
            )
        ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array(
                'label' => 'form.name',
                'read_only' => true,
                'disabled'  => true,
            ))
            ->add('email', null, array(
                'label' => 'form.email',
                'read_only' => true,
                'disabled'  => true,
            ))
            ->add('phone', null, array(
                'label' => 'form.phone',
                'read_only' => true,
                'disabled'  => true,
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, array(
                'label' => 'form.name'
            ))
            ->add('email', null, array(
                'label' => 'form.email'
            ))
            ->add('phone', null, array(
                'label' => 'form.phone'
            ))
            ->add('content', null, array(
                'label' => 'form.content'
            ))
            // ->add('startDate', 'doctrine_orm_datetime_range', array(
            //     'label' => 'form.startDate'
            // ))
            // ->add('endDate', 'doctrine_orm_datetime_range', array(
            //     'label' => 'form.endDate'
            // ))
            // ->add('smallContent', null, array(
            //     'label' => 'form.smallContent'
            // ))
            // ->add('published', null, array(
            //     'label' => 'form.published',
            // ))
        ;
    }
}
