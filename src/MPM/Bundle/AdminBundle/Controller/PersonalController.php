<?php

namespace MPM\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MPM\Bundle\AdminBundle\Entity\Personal;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonalController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $personales = $em->getRepository('AdminBundle:Personal')->findAll();

        return $this->render('AdminBundle:Personal:index.html.twig', array('mainMenu' => 'usuarios', 'personales'=> $personales));
    }

    public function newAction()
    {
    	$personal = new Personal();

    	return $this->render('AdminBundle:Personal:new.html.twig', array('mainMenu' => 'usuarios', 'personal' => $personal, 'action' => 'Agregar'));
    }

    public function createAction(Request $request)
    {
        $personal = new Personal();
        
        $nombre = $request->request->get('nombre', false);
        $apellido = $request->request->get('apellido', false);
        $dni = $request->request->get('dni', false);
        $mail = $request->request->get('mail', false);
        $telefono = $request->request->get('telefono', false);
        $sexo = $request->request->get('sexo', false);
        $image = $request->files->get('image');
        $password = $request->request->get('password', false);
        $username = $request->request->get('username', false);
        $role = $request->request->get('role', false);
        $tipo = $request->request->get('tipo', false);

        if (!$nombre && !$apellido && !$dni && !$mail) {
            throw new Exception("Error Processing Request", 1);
        }

        $personal->setApellido($apellido);
        $personal->setNombre($nombre);
        $personal->setDni($dni);
        $personal->setMail($mail);
        $personal->setTelefono($telefono);
        $personal->setUsername($username);
        $personal->setRole($role);
        $personal->setTipo($tipo);

        if ($sexo == "masc") {
            $personal->setSexo(false);
        }else{
            $personal->setSexo(true);
        }

        if ($image) {
            $imageFile    = fopen($image->getRealPath(), 'r');
            $imageContent = fread($imageFile, $image->getClientSize());
            fclose($imageFile);
            $personal->setImage($imageContent);
            $personal->setImageType($image->getMimeType());
        }

        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($personal);
        $password = $encoder->encodePassword($password, $personal->getSalt());
        $personal->setPassword($password);

        $em = $this->getDoctrine()->getManager();
        $em->persist($personal);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_personal_homepage'));
    }

    public function editAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$personal = $em->getRepository('AdminBundle:Personal')->find($id);

        return $this->render('AdminBundle:Personal:new.html.twig', array('mainMenu' => 'usuarios', 'personal' => $personal, 'action' => 'Editar'));
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
		$personal = $em->getRepository('AdminBundle:Personal')->find($id);

        $nombre = $request->request->get('nombre', false);
        $apellido = $request->request->get('apellido', false);
        $dni = $request->request->get('dni', false);
        $mail = $request->request->get('mail', false);
        $telefono = $request->request->get('telefono', false);
        $sexo = $request->request->get('sexo', false);
        $image = $request->files->get('image');
        $password = $request->request->get('password', false);
        $username = $request->request->get('username', false);
        $role = $request->request->get('role', false);
        $tipo = $request->request->get('tipo', false);

        if (!$nombre && !$apellido && !$dni && !$mail) {
            throw new Exception("Error Processing Request", 1);
        }

        $personal->setApellido($apellido);
        $personal->setNombre($nombre);
        $personal->setDni($dni);
        $personal->setMail($mail);
        $personal->setTelefono($telefono);
        $personal->setUsername($username);
        $personal->setRole($role);
        $personal->setTipo($tipo);

        if ($sexo == "masc") {
            $personal->setSexo(false);
        }else{
            $personal->setSexo(true);
        }

        if ($image) {
            $imageFile    = fopen($image->getRealPath(), 'r');
            $imageContent = fread($imageFile, $image->getClientSize());
            fclose($imageFile);
            $personal->setImage($imageContent);
            $personal->setImageType($image->getMimeType());
        }

        if ($password != "") {
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($personal);
            $password = $encoder->encodePassword($password, $personal->getSalt());
            $personal->setPassword($password);
        }
        

        $em->persist($personal);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_personal_homepage'));
    }


    public function removeAction($id) {

        $em   = $this->getDoctrine()->getManager();
        $personal = $em->getRepository('AdminBundle:Personal')->find($id);

        $em->remove($personal);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_personal_homepage'));
    }

    public function showPhotoAction($id) {
        $em         = $this->getDoctrine()->getManager();
        $personal    = $em->getRepository('AdminBundle:Personal')->find($id);

        if ($personal->getImage()) {
            $imageContent = stream_get_contents($personal->getImage());
            $imageMime    = $personal->getImageType();
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