<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;

class UserController extends Controller
{
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $plainPassword = $form['password']->getData();
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $plainPassword);
            
            $em = $this->getDoctrine()->getManager();
            $user->setName($form['name']->getData());
            $user->setSurname($form['surname']->getData());
            $user->setUsername($form['username']->getData());
            $user->setPassword($encoded);
            $user->setEmail($form['email']->getData());
            
            $em->persist($user);
            $em->flush();
            
            $this->addFlash('success','Dziękujemy za rejestrację');
            return $this->redirectToRoute('message');
        }
        
        return $this->render('register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
   
}
