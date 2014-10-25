<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use MPM\Bundle\AdminBundle\Entity\Pago;
use MPM\Bundle\AdminBundle\Entity\MesPago;
use MPM\Bundle\AdminBundle\Entity\Cliente;
use MPM\Bundle\AdminBundle\Entity\Personal;
use MPM\Bundle\AdminBundle\Entity\Caja;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CajaController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        
        $em = $this->getDoctrine()->getManager();
        $cajas = $em->getRepository('AdminBundle:Caja')->findAll();

        if (!$session->has('caja')) {
            return $this->render('AdminBundle:Caja:list.html.twig', array('mainMenu' => 'caja', 'cajas' => $cajas));
        }else{
            return $this->render('AdminBundle:Caja:index.html.twig', array('mainMenu' => 'caja', 'cajas' => $cajas, 'cajaAbierta' => $session->get('caja')));
        }
    }

    public function openAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $personal = $this->get('security.context')->getToken()->getUser();
        
        $caja = new Caja();
        $caja->setFechaOp(new \DateTime("now"));
        $caja->setPersonalOp($personal);
        $caja->setMonto(0);

        $session->set('caja', $caja);

        $em->persist($caja);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_caja_homepage'));
    }

    public function closeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $personal = $this->get('security.context')->getToken()->getUser();
        
        $caja = $session->get('caja');
        $caja->setFechaCl(new \DateTime("now"));
        $caja->setPersonalCl($personal);

        $session->remove('caja');

        $em->flush();

        return $this->redirect($this->generateUrl('admin_caja_homepage'));
    }

}
