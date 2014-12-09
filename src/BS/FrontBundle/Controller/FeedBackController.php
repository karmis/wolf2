<?php

namespace BS\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BS\FrontBundle\Entity\FeedBack;
use BS\FrontBundle\Form\FeedBackType;
use Symfony\Component\HttpFoundation\Response;

/**
 * FeedBack controller.
 *
 */
class FeedBackController extends Controller
{
    /**
     * Creates a new FeedBack entity.
     *
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

            $response = new Response();
            $response->setContent('success');
            
            $response->headers->set('Content-Type', 'application/json');

            return $response;
            // return $this->redirect($this->generateUrl('feedback_show', array('id' => $entity->getId())));
        }

        return $this->render('BSFrontBundle:FeedBack:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
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

        // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FeedBack entity.
     *
     */
    public function newAction()
    {
        $entity = new FeedBack();
        $form   = $this->createCreateForm($entity);

        return $this->render('BSFrontBundle:FeedBack:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing FeedBack entity.
     *
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

        return $this->render('BSFrontBundle:FeedBack:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
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

        return $this->render('BSFrontBundle:FeedBack:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

}
