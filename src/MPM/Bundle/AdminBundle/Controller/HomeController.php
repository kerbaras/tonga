<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Home:index.html.twig', array('mainMenu' => 'dash'));
    }
}
