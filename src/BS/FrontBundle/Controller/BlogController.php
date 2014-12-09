<?php

namespace BS\FrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BS\FrontBundle\Entity\Blog;

/**
 * Blog controller.
 *
 */
class BlogController extends Controller
{

    /**
     * Lists all Blog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BSFrontBundle:Blog')->findAll();

        return $this->render('BSFrontBundle:Blog:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Blog entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BSFrontBundle:Blog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Blog entity.');
        }

        return $this->render('BSFrontBundle:Blog:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
