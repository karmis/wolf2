<?php

namespace BS\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BS\FrontBundle\Entity\FeedBack;
use BS\FrontBundle\Form\FeedBackType;

/**
 * FeedBack controller.
 *
 * @Route("/feedback")
 */
class FeedBackController extends Controller
{

    /**
     * Lists all FeedBack entities.
     *
     * @Route("/", name="admin_feedback")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BSFrontBundle:FeedBack')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new FeedBack entity.
     *
     * @Route("/", name="feedback_create")
     * @Method("POST")
     * @Template("BSFrontBundle:FeedBack:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new FeedBack();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('feedback_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a FeedBack entity.
     *
     * @param FeedBack $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FeedBack $entity)
    {
        $form = $this->createForm(new FeedBackType(), $entity, array(
            'action' => $this->generateUrl('feedback_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FeedBack entity.
     *
     * @Route("/new", name="feedback_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new FeedBack();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a FeedBack entity.
     *
     * @Route("/{id}", name="feedback_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSFrontBundle:FeedBack')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FeedBack entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing FeedBack entity.
     *
     * @Route("/{id}/edit", name="feedback_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSFrontBundle:FeedBack')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FeedBack entity.');
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
    * Creates a form to edit a FeedBack entity.
    *
    * @param FeedBack $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FeedBack $entity)
    {
        $form = $this->createForm(new FeedBackType(), $entity, array(
            'action' => $this->generateUrl('feedback_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FeedBack entity.
     *
     * @Route("/{id}", name="feedback_update")
     * @Method("PUT")
     * @Template("BSFrontBundle:FeedBack:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSFrontBundle:FeedBack')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FeedBack entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('feedback_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a FeedBack entity.
     *
     * @Route("/{id}", name="feedback_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BSFrontBundle:FeedBack')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FeedBack entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('feedback'));
    }

    /**
     * Creates a form to delete a FeedBack entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('feedback_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
