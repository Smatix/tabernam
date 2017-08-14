<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Products;
use AppBundle\Entity\Orders;
use DateTime;

class OrdersController extends Controller
{
    public function addAction(Request $request)
    {
        // Probably move it to repository !!!
        $info = $this->get('session')->get('order');
        $user =  $this->getUser();
        $product = $this->getDoctrine()
        ->getRepository(Products::class)
        ->find($info['id']);
        $date = new DateTime;
        $order = new Orders();
        $em = $this->getDoctrine()->getManager();
        
        $order->setIdUser($user);   
        $order->setIdProduct($product);
        $order->setAmount( $info['amount'] );
        $order->setSum( $info['sum'] );
        $order->setPay($info['pay']);
        $order->setAdress($info['adress']);
        $order->setDate( $date );
        $order->setDone("N");
        
        $em->persist($order);
        $em->flush();
            
         $this->addFlash( 'success','Dziękujemy za złożenie zamówienia');
         return $this->redirectToRoute('message');
    }
}
