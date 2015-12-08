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
        return $this->redirect($this->generateUrl('order_new'));
    }
    
    /**
     * @Route("/orders", name="orders")
     */
    public function ordersAction(Request $request)
    {
        return $this->render('AppBundle:Order:orders.html.twig');
    }
    
    
    /**
     * @Route("/orders/new", name="order_new")
     */
    public function newAction(Request $request)
    {
        $order  = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
        
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            
            return $this->redirect($this->generateUrl('order_new', array('success' => true)));
        }
               
        return $this->render('AppBundle:Order:new.html.twig', array(
            'form'   => $form->createView()
        ));
    }
}
