<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function indexAction(Request $request)
    {
        $authUtils = $this->get('security.authentication_utils');
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
  
        $products = $this->getDoctrine()
        ->getRepository(Products::class)
        ->getAll([
            'cat' => $request->query->get('cat'),
            'min' => $request->query->get('min'),
            'max' => $request->query->get('max'),
            'sort' => $request->query->get('sort')
        ]);
        
        return $this->render('products.html.twig', [
            'content' => $products,
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
    
    public function showProductAction($id)
    {
        $product = $this->getDoctrine()
        ->getRepository(Products::class)
        ->find($id);
        
        if (!$product) {
            throw $this->createNotFoundException('Strona nie istnieje');
        }
        
        return $this->render('oneproduct.html.twig', ['product' => $product]);
    }
}
