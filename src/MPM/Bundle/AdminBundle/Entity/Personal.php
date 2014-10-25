<?php

namespace MPM\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MPM\Bundle\AdminBundle\Entity\Tarifa;
use MPM\Bundle\AdminBundle\Entity\MesPago;
use MPM\Bundle\AdminBundle\Entity\Pago;
use MPM\Bundle\AdminBundle\Entity\Caja;

/**
 * Personal
 *
 * @ORM\Table(name="personal")
 * @ORM\Entity(repositoryClass="MPM\Bundle\AdminBundle\Entity\PersonalRepository")
 */
class Personal extends Persona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    protected $role;

    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="personal")
     **/
    protected $pagosRealizados;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->pagosRealizados = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Personal
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Personal
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Personal
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    public function getRoles()
    {
        return array($this->role);
    }

    /**
     * Add pagosRealizados
     *
     * @param Pago $pagosRealizados
     * @return Personal
     */
    public function addPagosRealizado(Pago $pagosRealizados)
    {
        $this->pagosRealizados[] = $pagosRealizados;

        return $this;
    }

    /**
     * Remove pagosRealizados
     *
     * @param Pago $pagosRealizados
     */
    public function removePagosRealizado(Pago $pagosRealizados)
    {
        $this->pagosRealizados->removeElement($pagosRealizados);
    }

    /**
     * Get pagosRealizados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagosRealizados()
    {
        return $this->pagosRealizados;
    }
}
