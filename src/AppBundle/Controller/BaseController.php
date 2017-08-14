<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function MessageAction()
    {
        return $this->render('message.html.twig', array(
            ));
    }
}
