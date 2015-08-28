<?php

namespace BS\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BS\AdminBundle\Entity\FeedBack;
use BS\AdminBundle\Form\FeedBackType;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$this->get('cache')->delete('init_events');
    	$this->get('cache')->delete('init_blogs');
    	$this->get('cache')->delete('init_actions');
        $em = $this->getDoctrine()->getManager();

        $blogs = unserialize(json_decode($this->get('cache')->fetch('init_blogs')));
        if(!$blogs){
            $blogs = $em->getRepository('BSAdminBundle:Blog')->createQueryBuilder('blog')
                ->where('blog.published = :is')
                ->setParameter('is', true)
                ->orderBy('blog.id', 'ASC')
                ->getQuery()->getResult();

            $this->get('cache')->save('init_blogs', serialize(json_encode($blogs)));
        }

        $events = unserialize(json_decode($this->get('cache')->fetch('init_events')));
        if(!$events){
            $events = $em->getRepository('BSAdminBundle:Event')->createQueryBuilder('event')
                ->where('event.published = :is')
                ->setParameter('is', true)
                ->orderBy('event.id', 'ASC')
                ->getQuery()->getResult();

            $this->get('cache')->save('init_events', serialize(json_encode($events)));
        }

        $actions = unserialize(json_decode($this->get('cache')->fetch('init_actions')));
        if(!$actions){
            $actions = $em->getRepository('BSAdminBundle:Action')->createQueryBuilder('action')
                ->where('action.published = :is')
                ->setParameter('is', true)
                ->orderBy('action.id', 'ASC')
                ->getQuery()->getResult();

            $this->get('cache')->save('init_actions', serialize(json_encode($actions)));
        }


        $feedBackForm = $this->getFeedBackForm();

        $entities = array(
            'blogs' => $blogs,
            'action' => $actions,
            'events' => $events,
        );

        return $this->render('BSFrontBundle:Default:index.html.twig', array(
            'entities' => $entities,
            'feedBackForm' => $feedBackForm
        ));
    }

/*
    public function actionsAction()
    {

    }
*/

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

    public function loadContentAction($entityType, $id) {
        $request = $this->getRequest();
        
        if(!$request->isXmlHttpRequest()){
            throw new \Exception("not_xhr", 1);
        }
        $em = $this->getDoctrine()->getManager();
        if($entityType == "BLOG"){
            $repository = $em->getRepository('BSAdminBundle:Blog');
        } elseif($entityType == "EVENT"){
            $repository = $em->getRepository('BSAdminBundle:Event');
        } elseif ($entityType == "ACTION") {
            $repository = $em->getRepository('BSAdminBundle:Action');
        } else {
            throw new \Exception("entity_type_not_valid", 1);
        }

        $cacheId = $entityType . $id;
        
        $entity = unserialize(json_decode($this->get('cache')->fetch($cacheId)));

        if (!$entity) {

            $query = $repository->createQueryBuilder($entityType)
                ->innerJoin($entityType.".gallery", "gallery");
            if($entityType != 'BLOG'){
                $query->leftJoin($entityType.".videoGallery", "videoGallery");
            }

            $entity = $query->where($entityType.'.published = :is')
                ->andWhere($entityType.'.id = :id')
                ->setParameter('is', true)
                ->setParameter('id', $id)
                ->getQuery()->getOneOrNullResult();

            $this->get('cache')->save($cacheId, serialize(json_encode($entity)));
        }

        if(!$entity){
            throw $this->createNotFoundException('entity_not_found');
        }

        return $this->render('BSFrontBundle:Common:modal-populate.html.twig', array(
            'entity' => $entity
        ));
    }
}
