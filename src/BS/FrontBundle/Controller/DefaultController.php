<?php

namespace BS\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BS\AdminBundle\Entity\FeedBack;
use BS\AdminBundle\Form\FeedBackType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = array(
            'blogs' => array(),
            'action' => array(),
            'events' => array(),
        );

        $entities['blogs'] = $em->getRepository('BSAdminBundle:Blog')->createQueryBuilder('blog')
            ->where('blog.published = :is')
            ->setParameter('is', true)
            ->orderBy('blog.id', 'ASC')
            ->getQuery()->getResult();

        $entities['events'] = $em->getRepository('BSAdminBundle:Event')->createQueryBuilder('event')
            ->where('event.published = :is')
            ->setParameter('is', true)
            ->orderBy('event.id', 'ASC')
            ->getQuery()->getResult();

        $feedBackForm = $this->getFeedBackForm();

        return $this->render('BSFrontBundle:Default:index.html.twig', array(
            'entities' => $entities,
            'feedBackForm' => $feedBackForm
        ));
    }


    private function getFeedBackForm()
    {
        $entity = new FeedBack();
        $form   = $this->createFeedBackForm($entity);

        return $form->createView();
    }

    private function createFeedBackForm(FeedBack $entity)
    {
        $form = $this->createForm(new FeedBackType(), $entity, array(
            'action' => $this->generateUrl('feedback_create'),
            'method' => 'POST',
        ));

        return $form;
    }
}
