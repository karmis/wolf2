<?php

namespace BS\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = array(
            'blogs' => array(),
            'action' => array(),
            'events' => array()
        );

        $entities['blogs'] = $em->getRepository('BSFrontBundle:Blog')->createQueryBuilder('blog')
            ->where('blog.published = :is')
            ->setParameter('is', true)
            ->orderBy('blog.id', 'ASC')
            ->getQuery()->getResult();

        $entities['events'] = $em->getRepository('BSFrontBundle:Event')->createQueryBuilder('event')
            ->where('event.published = :is')
            ->setParameter('is', true)
            ->orderBy('event.id', 'ASC')
            ->getQuery()->getResult();

        return $this->render('BSFrontBundle:Default:index.html.twig', array(
            'entities' => $entities
        ));
    }
}
