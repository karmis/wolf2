<?php

namespace BS\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BS\FrontBundle\Entity\Event;

/**
 * Event controller.
 *
 */
class EventController extends Controller
{

    /**
     * Lists all Event entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BSFrontBundle:Event')->findAll();

        return $this->render('BSFrontBundle:Event:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Event entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSFrontBundle:Event')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }

        return $this->render('BSFrontBundle:Event:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
