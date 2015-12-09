<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Order;
use AppBundle\Form\OrderType;

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
        $orders = $this->getDoctrine()
            ->getRepository('AppBundle:Order')
            ->findAll();
        
        return $this->render('AppBundle:Order:orders.html.twig', array('orders' => $orders));
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
            'form' => $form->createView()
        ));
    }
    
    /**
     * @Route("/orders/edit/{pk}", name="order_edit")
     */
    public function editAction($pk)
    {       
        $em = $this->getDoctrine()->getManager();       
        $order = $em->getRepository('AppBundle:Order')->findOneBy(array('primaryKey' => $pk));

        if (!$order) {
            throw $this->createNotFoundException('Unable to find Order entity.');
        }

        $form = $this->createForm(OrderType::class, $order);
        
        return $this->render('AppBundle:Order:new.html.twig', array(
            'pk' => $pk,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/orders/update/{pk}", name="order_update")
     */
    public function updateAction(Request $request, $pk)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository('AppBundle:Order')->findOneBy(array('primaryKey' => $pk));

        if (!$order) {
            throw $this->createNotFoundException('Unable to find Order entity.');
        }

        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($order);
            $em->flush();

            return $this->redirect($this->generateUrl('orders'));
        }

        return $this->render('AppBundle:Order:new.html.twig', array(
            'pk' => $pk,
            'form'   => $form->createView()
        ));
    }
    
    /**
     * @Route("/orders/delete/{pk}", name="order_delete")
     */
    public function deleteAction(Request $request, $pk)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository('AppBundle:Order')->findOneBy(array('primaryKey' => $pk));

        if (!$order) {
            throw $this->createNotFoundException('Unable to find Order entity.');
        }
        
        $em->remove($order);
        $em->flush();
        
        return $this->redirect($this->generateUrl('orders'));
    }
}
