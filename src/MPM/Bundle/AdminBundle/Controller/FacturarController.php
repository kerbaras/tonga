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

class FacturarController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        if (!$session->has('caja')) {
            return $this->redirect($this->generateUrl('admin_caja_homepage'));
        }

        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository('AdminBundle:Cliente')->findAll();

        return $this->render('AdminBundle:Facturar:index.html.twig', array('mainMenu' => 'facturar', 'clientes' => $clientes));
    }

    public function getDatosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('AdminBundle:Cliente')->find($request->request->get('id'));

        return $this->render('AdminBundle:Facturar:datos.html.twig', array('cliente' => $cliente));
    }

    public function facturarAction(Request $request)
    {
        $factura = new Pago();
        $mesPago = new MesPago();

        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $clienteId = $request->request->get('cliente_id', false);
        $mes = $request->request->get('mes', false);
        $ano = $request->request->get('ano', false);

        $cliente = $em->getRepository('AdminBundle:Cliente')->find($clienteId);
        $personal = $this->get('security.context')->getToken()->getUser();
        $caja = $session->get('caja');

        $mesPago->setMes($mes);
        $mesPago->setAno($ano);
        $mesPago->setCliente($cliente);

        $factura->setFecha(new \DateTime("now"));
        $factura->setMonto($cliente->getTarifa()->getMonto());
        $factura->setCliente($cliente);
        $factura->setPersonal($personal);
        $factura->addMes($mesPago);

        $mesPago->setPago($factura);

        $caja->sum($factura->getMonto());

        $em->persist($factura);
        $em->persist($mesPago);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_facturas_homepage'));
    }
}
