<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use MPM\Bundle\AdminBundle\Entity\Pago;
use MPM\Bundle\AdminBundle\Entity\MesPago;
use MPM\Bundle\AdminBundle\Entity\Cliente;
use MPM\Bundle\AdminBundle\Entity\Personal;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FacturaController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $facturas = $em->getRepository('AdminBundle:Pago')->findAll();
        
        return $this->render('AdminBundle:Factura:index.html.twig', array('mainMenu' => 'facturas', 'facturas' => $facturas));
    }

    public function printAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        $factura = $em->getRepository('AdminBundle:Pago')->find($id);
        
        return $this->render('AdminBundle:Facturas:print.html.twig', array('factura' => $factura));
    }
}
