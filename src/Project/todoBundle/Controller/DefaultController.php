<?php

namespace Project\todoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjecttodoBundle:Default:index.html.twig', array('name' => $name));
    }
}
