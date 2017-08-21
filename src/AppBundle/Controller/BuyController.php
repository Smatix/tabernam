<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Products;

class BuyController extends Controller
{
    public function BuyAction($id, Request $request)
    {
        // This part make in service !!! 
        if ($this->isGranted('ROLE_USER') == false) {
            $this->addFlash(
                'error',
                'Zaloguj się aby kupować!'
            );
            return $this->redirectToRoute('product', array('id' => $id));
        }
        
         $product = $this->getDoctrine()
        ->getRepository(Products::class)
        ->find($id);
        
        return $this->render('buy_form.html.twig', [
            'product' => $product
        ]);
    }
    
    public function BuySummaryAction($id, Request $request)
    {
        $product = $this->getDoctrine()
        ->getRepository(Products::class)
        ->find($id);
        
        $price =  $product->getPrice();
        $amount = $request->request->get("amount");
        $adress = $request->request->get("adress");
        
        if (empty($adress) || empty($amount)) {
            $this->addFlash( 'error', 'Uzupełnij formularz!');
            return $this->redirectToRoute('buy', ['id' => $id]);
        }
        
        $sum = $price*$amount;
        
        $this->get('session')->set('order', [
            'adress' => $adress,
            'amount' => $amount,
            'pay' => $request->request->get("pay"),
            'sum' => $sum,
            'id' => $id
        ]);
        return $this->render('buy_summary.html.twig', [
            'product' => $product,
            'amount' => $amount,
            'adress' => $adress,
            'pay' => $request->request->get("pay"),
            'sum' => $sum
        ]);
    }
}
