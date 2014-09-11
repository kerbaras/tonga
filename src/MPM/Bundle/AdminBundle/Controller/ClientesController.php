<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MPM\Bundle\AdminBundle\Entity\Cliente;

class ClientesController extends Controller
{
    public function indexAction()
    {
    	$clientes = array();
    	$clientes[] = $this->createUsuer('Matias', 'Pierobon', 39831249, 4830311);
    	$clientes[] = $this->createUsuer('Maia', 'Pierobon', 40536559, 4830311);
    	$clientes[] = $this->createUsuer('Luciano', 'Perez Cerra', 35541249, 4830311);

    	$nombres = array('Julian', 'Tomás', 'Martin', 'Mia', 'Carla');
    	$apellidos = array('Inchausti', 'Tomassoni', 'Gómez', 'Pérez');
    	for ($i=0; $i < 25; $i++) { 
    		$clientes[] = $this->createUsuer($nombres[rand(0,4)], $apellidos[rand(0,3)], rand(16000000, 35000000), 4000000 + rand(100000, 999999));
    	}

        return $this->render('AdminBundle:Clientes:index.html.twig', array('mainMenu' => 'clientes', 'clientes'=> $clientes));
    }

    public function newAction()
    {
    	$cliente = new Cliente();

    	return $this->render('AdminBundle:Clientes:new.html.twig', array('mainMenu' => 'clientes', 'cliente' => $cliente, 'accion' => 'new'));
    }

    public function createAction()
    {
    	return null;
    }

    public function editAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$cliente = $em->getRepository('AdminBundle:Cliente')->find($id);

    	return $this->render('AdminBundle:Clientes:new.html.twig', array('mainMenu' => 'clientes', 'cliente' => $cliente, 'accion' => 'edit'));
    }

    public function updateAction($id)
    {
		return null;
    }

    public function createUsuer($nombre, $apellido, $dni, $telefono) {
    	$cliente = new Cliente();
		$cliente->setApellido($apellido);
		$cliente->setNombre($nombre);
		$cliente->setDniNumero($dni);
		$cliente->setDniTipo('DNI');
		$cliente->setTelefono($telefono);
		return $cliente;
	}

}