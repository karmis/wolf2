<?php

namespace BS\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BS\AdminBundle\Entity\Action;
use BS\AdminBundle\Form\ActionType;

/**
 * Action controller.
 *
 * @Route("/action")
 */
class ActionController extends Controller
{
    private $routePrefix = 'admin_action';

    /**
     * Lists all Action entities.
     *
     * @Route("/", name="admin_action")
     * @Method("GET")
     * @Template("BSAdminBundle:Action:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BSAdminBundle:Action')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1),
            1000
        );
        $deleteForms = array();
        for ($i = 0; $i < count($entities); $i++) {
            $deleteForms[$entities[$i]->getId()] = $this->createDeleteForm($entities[$i]->getId())->createView();
        }

        return array(
                'pagination' => $pagination,
                'delete_forms' => $deleteForms
        );
    }
    /**
     * Creates a new entity.
     *
     * @Route("/create", name="admin_action_create")
     * @Method("POST")
     * @Template("BSAdminBundle:Action:item.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Action();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirectAfterSubmit($request, $entity);
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'operationType' => 'new'
        );
    }

    /**
     * Creates a form to create a Action entity.
     *
     * @param Action $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Action $entity)
    {
        $form = $this->createForm(new ActionType(), $entity, array(
            'action' => $this->generateUrl('admin_action_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Creates a new entity.
     *
     * @Route("/new", name="admin_action_new")
     * @Method("GET")
     * @Template("BSAdminBundle:Action:item.html.twig")
     */
    public function newAction()
    {
        $entity = new Action();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'operationType' => 'new'
        );
    }

    /**
     * Displays a form to edit an existing entity.
     *
     * @Route("/edit/{id}", name="admin_action_edit")
     * @Method("GET")
     * @Template("BSAdminBundle:Action:item.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:Action')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Action entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'operationType' => 'edit'
        );
    }

    /**
    * Creates a form to edit a Action entity.
    *
    * @param Action $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Action $entity)
    {
        $form = $this->createForm(new ActionType(), $entity, array(
            'action' => $this->generateUrl('admin_action_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing Action entity.
     *
     * @Route("/update/{id}", name="admin_action_update")
     * @Method("PUT")
     * @Template("BSAdminBundle:Action:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:Action')->find($id);
        // $em->getReference($entity);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Action entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        // die(print_r($request));
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirectAfterSubmit($request, $entity);
        }

        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'operationType' => 'edit'
        );
    }
    /**
     * Deletes a Action entity.
     *
     * @Route("/delete/{id}", name="admin_action_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BSAdminBundle:Action')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Action entity.');
            }

            $this->get('cache')->delete('init_actions');

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirectAfterSubmit($request, $entity);
    }

    /**
     * Creates a form to delete a Action entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_action_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Redirect after flush
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function redirectAfterSubmit(Request $request, $entity)
    {
        if($request->request->get('list')){
            return $this->redirect($this->generateUrl($this->routePrefix . ''));
        } elseif($request->request->get('create')) {
            return $this->redirect($this->generateUrl($this->routePrefix . '_new'));
        } elseif($request->request->get('edit')) {
            return $this->redirect($this->generateUrl($this->routePrefix . '_edit', array('id' => $entity->getId())));
        } else {
            return $this->redirect($this->generateUrl($this->routePrefix . ''));
        }
    }
}
