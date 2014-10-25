<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MPM\Bundle\AdminBundle\Entity\Cliente;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientesController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository('AdminBundle:Cliente')->findAll();

        return $this->render('AdminBundle:Clientes:index.html.twig', array('mainMenu' => 'clientes', 'clientes'=> $clientes));
    }

    public function newAction()
    {
    	$cliente = new Cliente();
        $em = $this->getDoctrine()->getManager();
        $tarifas = $em->getRepository('AdminBundle:Tarifa')->findAll();

    	return $this->render('AdminBundle:Clientes:new.html.twig', array('mainMenu' => 'clientes', 'cliente' => $cliente, 'action' => 'Agregar', 'tarifas' => $tarifas));
    }

    public function createAction(Request $request)
    {
        $cliente = new Cliente();
        $nombre = $request->request->get('nombre', false);
        $apellido = $request->request->get('apellido', false);
        $dni = $request->request->get('dni', false);
        $mail = $request->request->get('mail', false);
        $telefono = $request->request->get('telefono', false);
        $sexo = $request->request->get('sexo', false);
        $image = $request->files->get('image');
        $tarifa = $request->request->get('tarifa', false);

        if (!$nombre && !$apellido && !$dni && !$mail) {
            throw new Exception("Error Processing Request", 1);
        }

        $cliente->setApellido($apellido);
        $cliente->setNombre($nombre);
        $cliente->setDni($dni);
        $cliente->setMail($mail);
        $cliente->setTelefono($telefono);
        if ($sexo == "masc") {
            $cliente->setSexo(false);
        }else{
            $cliente->setSexo(true);
        }

        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($cliente);
        $password = $encoder->encodePassword($dni, $cliente->getSalt());
        $cliente->setPassword($password);

        if ($image) {
            $imageFile    = fopen($image->getRealPath(), 'r');
            $imageContent = fread($imageFile, $image->getClientSize());
            fclose($imageFile);
            $cliente->setImage($imageContent);
            $cliente->setImageType($image->getMimeType());
        }

        $em = $this->getDoctrine()->getManager();

        if ($tarifa && $tarifa != "-1") {
            $tarifa = $em->getRepository('AdminBundle:Tarifa')->find($tarifa);
            $cliente->setTarifa($tarifa);
        }

        $em->persist($cliente);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_clientes_homepage'));
    }

    public function editAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$cliente = $em->getRepository('AdminBundle:Cliente')->find($id);
        $tarifas = $em->getRepository('AdminBundle:Tarifa')->findAll();

        return $this->render('AdminBundle:Clientes:new.html.twig', array('mainMenu' => 'clientes', 'cliente' => $cliente, 'action' => 'Editar', 'tarifas' => $tarifas));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('AdminBundle:Cliente')->find($id);

        return $this->render('AdminBundle:Clientes:show.html.twig', array('mainMenu' => 'clientes', 'cliente' => $cliente));
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
		$cliente = $em->getRepository('AdminBundle:Cliente')->find($id);

        $nombre = $request->request->get('nombre', false);
        $apellido = $request->request->get('apellido', false);
        $dni = $request->request->get('dni', false);
        $mail = $request->request->get('mail', false);
        $telefono = $request->request->get('telefono', false);
        $sexo = $request->request->get('sexo', false);
        $image = $request->files->get('image');
        $tarifa = $request->request->get('tarifa', false);

        if (!$nombre && !$apellido && !$dni && !$mail) {
            throw new Exception("Error Processing Request", 1);
        }

        $cliente->setApellido($apellido);
        $cliente->setNombre($nombre);
        $cliente->setDni($dni);
        $cliente->setMail($mail);
        $cliente->setTelefono($telefono);
        if ($sexo == "masc") {
            $cliente->setSexo(false);
        }else{
            $cliente->setSexo(true);
        }

        if ($image) {
            $imageFile    = fopen($image->getRealPath(), 'r');
            $imageContent = fread($imageFile, $image->getClientSize());
            fclose($imageFile);
            $cliente->setImage($imageContent);
            $cliente->setImageType($image->getMimeType());
        }


        if ($tarifa && $tarifa != "-1") {
            $tarifa = $em->getRepository('AdminBundle:Tarifa')->find($tarifa);
            $cliente->setTarifa($tarifa);
        }

        $em->persist($cliente);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_clientes_homepage'));
    }


    public function removeAction($id) {

        $em   = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('AdminBundle:Cliente')->find($id);

        $em->remove($cliente);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_clientes_homepage'));
    }

    public function showPhotoAction($id) {
        $em         = $this->getDoctrine()->getManager();
        $cliente    = $em->getRepository('AdminBundle:Cliente')->find($id);

        if ($cliente->getImage()) {
            $imageContent = stream_get_contents($cliente->getImage());
            $imageMime    = $cliente->getImageType();
        } else {
            $imageFile    = fopen(__dir__ .'/../Resources/private/images/profile.png', 'r');
            $imageContent = stream_get_contents($imageFile);
            fclose($imageFile);
            $imageMime = "image/png";
        }
        $response = new Response($imageContent);
        $response->headers->set('Content-Type', $imageMime);
        $response->send();
    }

}