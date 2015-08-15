<?php

namespace BS\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BS\AdminBundle\Entity\FeedBack;
use BS\AdminBundle\Form\FeedBackType;

/**
 * FeedBack controller.
 *
 * @Route("/feedback")
 */
class FeedBackController extends Controller
{
    private $routePrefix = 'admin_feedback';

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

        $entities = $em->getRepository('BSAdminBundle:FeedBack')->findAll();

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
     * Finds and displays a FeedBack entity.
     *
     * @Route("/{id}", name="admin_feedback_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSAdminBundle:FeedBack')->find($id);

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
     * Deletes a FeedBack entity.
     *
     * @Route("/{id}", name="admin_feedback_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BSAdminBundle:FeedBack')->find($id);

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
