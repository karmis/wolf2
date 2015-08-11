<?php

namespace BS\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Path;
use AdminBundle\Form\PathType;

/**
 * Path controller.
 *
 * @Route("/admin_path")
 */
class PathController extends Controller
{

    /**
     * Lists all Path entities.
     *
     * @Route("/", name="admin_path")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminBundle:Path')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Path entity.
     *
     * @Route("/", name="admin_path_create")
     * @Method("POST")
     * @Template("AdminBundle:Path:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Path();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_path_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Path entity.
     *
     * @param Path $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Path $entity)
    {
        $form = $this->createForm(new PathType(), $entity, array(
            'action' => $this->generateUrl('admin_path_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Path entity.
     *
     * @Route("/new", name="admin_path_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Path();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Path entity.
     *
     * @Route("/{id}", name="admin_path_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Path')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Path entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Path entity.
     *
     * @Route("/{id}/edit", name="admin_path_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Path')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Path entity.');
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
    * Creates a form to edit a Path entity.
    *
    * @param Path $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Path $entity)
    {
        $form = $this->createForm(new PathType(), $entity, array(
            'action' => $this->generateUrl('admin_path_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Path entity.
     *
     * @Route("/{id}", name="admin_path_update")
     * @Method("PUT")
     * @Template("AdminBundle:Path:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Path')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Path entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_path_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Path entity.
     *
     * @Route("/{id}", name="admin_path_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminBundle:Path')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Path entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_path'));
    }

    /**
     * Creates a form to delete a Path entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_path_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
