<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientesController extends Controller
{
    public function indexAction()
    {
    	$clientes = array();
    	$clientes[] = new ClienteN('Matias', 'Pierobon', 39831249, 4830311);
    	$clientes[] = new ClienteN('Maia', 'Pierobon', 40536559, 4830311);
    	$clientes[] = new ClienteN('Luciano', 'Perez Cerra', 35541249, 4830311);

    	$nombres = array('Julian', 'Tomás', 'Martin', 'Mia', 'Carla');
    	$apellidos = array('Inchausti', 'Tomassoni', 'Gómez', 'Pérez');
    	for ($i=0; $i < 25; $i++) { 
    		$clientes[] = new ClienteN($nombres[rand(0,4)], $apellidos[rand(0,3)], rand(16000000, 35000000), 4000000 + rand(100000, 999999));
    	}

        return $this->render('AdminBundle:Clientes:index.html.twig', array('mainMenu' => 'clientes', 'clientes'=> $clientes));
    }
}


class ClienteN
{
	public $apellido;
	public $nombre;
	public $dniNumero;
	public $dniTipo;
	public $telefono;
	public $tarifa;


	public function __construct($nombre, $apellido, $dni, $telefono) {
		$this->apellido = $apellido;
		$this->nombre = $nombre;
		$this->dniNumero = $dni;
		$this->dniTipo = 'DNI';
		$this->telefono = $telefono;
	}

}