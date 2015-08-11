<?php

namespace BS\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Action controller.
 *
 * @Route("/action")
 */
class ActionController extends Controller
{
    private $entityName = 'Action';
    private $routePrefix = 'admin_action';
    private $entity = null;
    private $form = null;

    public function __construct()
    {
        $this->entity = new  \BS\AdminBundle\Entity\Action();
        $this->form = new \BS\AdminBundle\Form\ActionType();
    }

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

        $entities = $em->getRepository('BSAdminBundle:' . $this->entityName)->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1),
            10
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
     * @Route("/", name="admin_action_create")
     * @Method("POST")
     * @Template("BSAdminBundle:Action:item.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = $this->entity;
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
     * Creates a form to create a entity.
     *
     * @param Action $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm($entity)
    {
        $form = $this->createForm($this->form, $entity, array(
            'action' => $this->generateUrl($this->routePrefix . '_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new entity.
     *
     * @Route("/new", name="admin_action_new")
     * @Method("GET")
     * @Template("BSAdminBundle:Action:item.html.twig")
     */
    public function newAction()
    {
        $entity = $this->entity;
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'operationType' => 'new'
        );
    }

    /**
     * Finds and displays a entity.
     *
     * @Route("/{id}", name="admin_action_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:' . $this->entityName)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing entity.
     *
     * @Route("/{id}/edit", name="admin_action_edit")
     * @Method("GET")
     * @Template("BSAdminBundle:Action:item.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:' . $this->entityName)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
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
    * Creates a form to edit a entity.
    *
    * @param Action $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity)
    {
        $form = $this->createForm($this->form, $entity, array(
            'action' => $this->generateUrl($this->routePrefix . '_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing entity.
     *
     * @Route("/{id}", name="admin_action_update")
     * @Method("PUT")
     * @Template("BSAdminBundle:Action:item.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:' . $this->entityName)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
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
     * Deletes a entity.
     *
     * @Route("/{id}", name="admin_action_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BSAdminBundle:' . $this->entityName)->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find entity.');
            }

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
            ->setAction($this->generateUrl($this->routePrefix . '_delete', array('id' => $id)))
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
