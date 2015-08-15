<?php

namespace BS\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BS\AdminBundle\Entity\ActionGallery;
use BS\AdminBundle\Form\ActionGalleryType;

/**
 * ActionGallery controller.
 *
 * @Route("/actiongallery")
 */
class ActionGalleryController extends Controller
{

    /**
     * Lists all ActionGallery entities.
     *
     * @Route("/", name="actiongallery")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BSAdminBundle:ActionGallery')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ActionGallery entity.
     *
     * @Route("/", name="actiongallery_create")
     * @Method("POST")
     * @Template("BSAdminBundle:ActionGallery:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ActionGallery();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actiongallery_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ActionGallery entity.
     *
     * @param ActionGallery $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ActionGallery $entity)
    {
        $form = $this->createForm(new ActionGalleryType(), $entity, array(
            'action' => $this->generateUrl('actiongallery_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ActionGallery entity.
     *
     * @Route("/new", name="actiongallery_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ActionGallery();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ActionGallery entity.
     *
     * @Route("/{id}", name="actiongallery_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:ActionGallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActionGallery entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ActionGallery entity.
     *
     * @Route("/{id}/edit", name="actiongallery_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:ActionGallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActionGallery entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a ActionGallery entity.
    *
    * @param ActionGallery $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ActionGallery $entity)
    {
        $form = $this->createForm(new ActionGalleryType(), $entity, array(
            'action' => $this->generateUrl('actiongallery_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ActionGallery entity.
     *
     * @Route("/{id}", name="actiongallery_update")
     * @Method("PUT")
     * @Template("BSAdminBundle:ActionGallery:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:ActionGallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActionGallery entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('actiongallery_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ActionGallery entity.
     *
     * @Route("/{id}", name="actiongallery_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BSAdminBundle:ActionGallery')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ActionGallery entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actiongallery'));
    }

    /**
     * Creates a form to delete a ActionGallery entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actiongallery_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
