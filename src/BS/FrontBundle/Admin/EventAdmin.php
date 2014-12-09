<?php

namespace BS\FrontBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use BS\FrontBundle\Entity\Event;

class EventAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('caption', null, array(
                'label' => 'form.caption'
            ))
//            ->add('startDate', 'doctrine_orm_datetime_range', array('input_type' => 'timestamp'))
//            ->add('endDate', null, array(
//                'label' => 'form.endDate'
//            ))
            ->add('published', null, array(
                'label' => 'form.published'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('caption', null, array(
                'label' => 'form.caption'
            ))
            ->add('startDate', null, array(
                'label' => 'form.startDate'
            ))
            ->add('endDate', null, array(
                'label' => 'form.endDate'
            ))
            ->add('smallContent', null, array(
                'label' => 'form.smallContent'
            ))
            ->add('published', null, array(
                'label' => 'form.published'
            ))
            ->add('_action', 'actions', array(
                'label' => 'form.action',
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('caption', null, array(
                'label' => 'form.caption'
            ))
            ->add('startDate', 'date', array(
                'label' => 'form.startDate',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => array(
                    'class' => 'bs bs-custom bs-datepicker bs-datepicker-startDate'
                )
            ))
            ->add('endDate', 'date', array(
                'label' => 'form.endDate',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => array(
                    'class' => 'bs bs-custom bs-datepicker bs-datepicker-endDate'
                )
            ))
            ->add('smallContent', null, array(
                'label' => 'form.smallContent'
            ))
            ->add('content', 'ckeditor', array(
                'label' => 'form.content',
//                'config' => array(
//                    'toolbar' => array(
//                        array(
//                            'name' => 'links',
//                            'items' => array('Link', 'Unlink'),
//                        ),
//                        array(
//                            'name' => 'insert',
//                            'items' => array('Image'),
//                        ),
//                    )
//                )
            ))
            ->add('photoGallery', 'comur_gallery', array(
                'uploadConfig' => array(
                    'uploadRoute' => 'comur_api_upload', //optional
                    'uploadUrl' => Event::EVENT_UPLOAD_ROOT_DIR, // required - see explanation below (you can also put just a dir path)
                    'webDir' => Event::EVENT_UPLOAD_DIR, // required - see explanation below (you can also put just a dir path)
                    'fileExt' => '*.jpg;*.gif;*.png;*.jpeg', //optional
                    'libraryDir' => null, //optional
                    'libraryRoute' => 'comur_api_image_library', //optional
                    'showLibrary' => true, //optional
                    'saveOriginal' => 'originalPhoto' //optional
                ),
                'cropConfig' => array(
                    'maxWidth' => 605,
                    'maxHeight' => 605,
                    'minWidth' => 405,
                    'minHeight' => 405,
                    'aspectRatio' => true, //optional
                    'cropRoute' => 'comur_api_crop', //optional
                    'forceResize' => false, //optional
                    'thumbs' => array( //optional
                        array(
                            'maxWidth' => 410,
                            'maxHeight' => 410,
                            'useAsFieldImage' => true //optional
                        )
                    )
                )
            ))
            ->add('videoGallery', 'sonata_type_collection', array(
                // Предотвращает появление опции "Delete"
                'type_options' => array('delete' => true),
                'by_reference' => false,
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
                'admin_code' => 'bs_front.admin.video.gallery'
            ))
            
            ->add('published', null, array(
                'label' => 'form.published',
                'data' => true
            ));
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('caption', null, array(
                'label' => 'form.caption',
            ))
            ->add('startDate', 'doctrine_orm_datetime_range', array(
                'label' => 'form.startDate'
            ))
            ->add('endDate', 'doctrine_orm_datetime_range', array(
                'label' => 'form.endDate'
            ))
            ->add('smallContent', null, array(
                'label' => 'form.smallContent'
            ))
            ->add('published', null, array(
                'label' => 'form.published',
            ));
    }



    public function prePersist($object)
    {
        foreach ($object->getVideoGallery() as $video) {
            $video->setEvent($object);
        }
    }

    public function preUpdate($object)
    {
        foreach ($object->getVideoGallery() as $video) {
            $video->setEvent($object);
        }
    }
}
