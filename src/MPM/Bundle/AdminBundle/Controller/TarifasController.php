<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MPM\Bundle\AdminBundle\Entity\Tarifa;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TarifasController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $tarifas = $em->getRepository('AdminBundle:Tarifa')->findAll();

        return $this->render('AdminBundle:Tarifas:index.html.twig', array('mainMenu' => 'tarifas', 'tarifas'=> $tarifas));
    }

    public function newAction()
    {
    	$tarifa = new Tarifa();

    	return $this->render('AdminBundle:Tarifas:new.html.twig', array('mainMenu' => 'tarifas', 'tarifa' => $tarifa, 'action' => 'Agregar'));
    }

    public function createAction(Request $request)
    {
        $tarifa = new Tarifa();
        $nombre = $request->request->get('nombre', false);
        $monto = $request->request->get('monto', false);
        

        if (!$nombre && !$monto) {
            throw new Exception("Error Processing Request", 1);
        }

        $tarifa->setMonto($monto);
        $tarifa->setNombre($nombre);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($tarifa);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_tarifas_homepage'));
    }

    public function editAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$tarifa = $em->getRepository('AdminBundle:Tarifa')->find($id);

        return $this->render('AdminBundle:Tarifas:new.html.twig', array('mainMenu' => 'tarifas', 'tarifa' => $tarifa, 'action' => 'Editar'));
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
		$tarifa = $em->getRepository('AdminBundle:Tarifa')->find($id);

        $nombre = $request->request->get('nombre', false);
        $monto = $request->request->get('monto', false);
        

        if (!$nombre && !$monto) {
            throw new Exception("Error Processing Request", 1);
        }

        $tarifa->setMonto($monto);
        $tarifa->setNombre($nombre);

        $em->flush();

        return $this->redirect($this->generateUrl('admin_tarifas_homepage'));
    }


    public function removeAction($id) {

        $em   = $this->getDoctrine()->getManager();
        $tarifa = $em->getRepository('AdminBundle:Tarifa')->find($id);

        $em->remove($tarifa);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_Tarifas_homepage'));
    }

}