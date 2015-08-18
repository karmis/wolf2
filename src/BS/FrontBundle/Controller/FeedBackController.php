<?php

namespace BS\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    /**
     * Creates a new FeedBack entity.
     *
     * @Route("/", name="feedback_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new FeedBack();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
            } catch (\Exception $e) {
                return new JsonResponse('error');
            }

            $template = $this->renderView(
                'BSFrontBundle:Email:order.html.twig',
                array(
                    'entity' => $entity
                )
            );

            $this->sendEmail($template);

            return new JsonResponse('success');
        } else {
            return new JsonResponse('incomplete');
        }
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

    private function sendEmail($template)
    {
        $mailer = $this->get('mailer');
        $emails = $this->container->getParameter('admin_emails');
        ;
        $message = $mailer->createMessage()
            ->setSubject('Сообщение с сайта Волчий глаз')
            ->setFrom('order@wolfeneye.ru')
            ->setBody($template, 'text/html');
        if (count($emails) > 0) {
            foreach ($emails as $email) {
                // $message->setTo($email);
                $message->addCC($email);
                $mailer->send($message);
            }
        }
    }
}
