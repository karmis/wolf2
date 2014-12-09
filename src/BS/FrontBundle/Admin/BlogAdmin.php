<?php

namespace BS\FrontBundle\Admin;

use BS\FrontBundle\Entity\Blog;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BlogAdmin extends Admin
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
            ->add('published', null, array(
                'label' => 'form.published'
            ))
            // ->add('slug', null, array(
            //     'label' => 'form.slug'
            // ))
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
            // ->add('slug', null, array(
            //     'label' => 'form.slug'
            // ))
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
//            ->add('id')
            ->add('caption', null, array(
                'label' => 'form.caption'
            ))
            // ->add('slug', null, array(
            //     'label' => 'form.slug'
            // ))
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
                    'uploadUrl' => Blog::BLOG_UPLOAD_ROOT_DIR, // required - see explanation below (you can also put just a dir path)
                    'webDir' => Blog::BLOG_UPLOAD_DIR, // required - see explanation below (you can also put just a dir path)
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
            // ->add('videoGallery', 'sonata_type_model_list', array(
            //         'required' => false,
            //         'label' => 'form.videoGallery',
            //     ),
            //     array(
            //         'link_parameters' => array(
            //             'context' => 'events_youtube'
            //         )
            //     )
            // )
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
            // ->add('slug', null, array(
            //     'label' => 'form.slug'
            // ))
            ->add('smallContent', null, array(
                'label' => 'form.smallContent'
            ))
            ->add('published', null, array(
                'label' => 'form.published',
            ));
    }
}
