<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type;
use AppBundle\Entity\Order;
use AppBundle\Form\OrderType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    
    /**
     * @Route("/orders/new", name="order_new")
     */
    public function newAction(Request $request)
    {
        $order  = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);
//var_dump($order->getCode());
        if ($form->isValid()) {
            
            
            //$em = $this->getDoctrine()->getManager();
            //$em->persist($entity);
            //$em->flush();

            //return $this->redirect($this->generateUrl('admin_brand_show', array('id' => $entity->getId())));
            return new Response("good");
        }

        //return new Response("bad");
        
        return $this->render('AppBundle:Order:new.html.twig', array(
            'form'   => $form->createView()
        ));    
        
    }
}
