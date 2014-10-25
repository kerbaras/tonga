<?php

namespace MPM\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 * 
 * @ORM\Table(name="clientes")
 * @ORM\Entity(repositoryClass="MPM\Bundle\AdminBundle\Entity\ClienteRepository")
 */
class Cliente extends Persona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="asosiationId", type="string")
     */
    protected $asosiationId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sancionado", type="boolean")
     */
    protected $sancionado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sancionadoDesde", type="date", nullable=true)
     */
    protected $sancionadoDesde;

    /**
     * @ORM\ManyToOne(targetEntity="Tarifa", inversedBy="clientes")
     * @ORM\JoinColumn(name="tarifa_id", referencedColumnName="id")
     **/
    protected $tarifa;

    /**
     * @ORM\OneToMany(targetEntity="MesPago", mappedBy="cliente")
     **/
    protected $mesesPagos;

    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="cliente")
     **/
    protected $pagos;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->mesesPagos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->asosiationId = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->sancionado = false;
    }

    public function getRoles()
    {
        return array("ROLE_CLIENT");
    }

    /**
     * Set asosiationId
     *
     * @param integer $asosiationId
     * @return Cliente
     */
    public function setAsosiationId($asosiationId)
    {
        $this->asosiationId = $asosiationId;

        return $this;
    }

    /**
     * Get asosiationId
     *
     * @return integer 
     */
    public function getAsosiationId()
    {
        return $this->asosiationId;
    }

    /**
     * Set sancionado
     *
     * @param boolean $sancionado
     * @return Cliente
     */
    public function setSancionado($sancionado)
    {
        $this->sancionado = $sancionado;

        return $this;
    }

    /**
     * Get sancionado
     *
     * @return boolean 
     */
    public function getSancionado()
    {
        return $this->sancionado;
    }

    /**
     * Set sancionadoDesde
     *
     * @param \DateTime $sancionadoDesde
     * @return Cliente
     */
    public function setSancionadoDesde($sancionadoDesde)
    {
        $this->sancionadoDesde = $sancionadoDesde;

        return $this;
    }

    /**
     * Get sancionadoDesde
     *
     * @return \DateTime 
     */
    public function getSancionadoDesde()
    {
        return $this->sancionadoDesde;
    }

    /**
     * Set tarifa
     *
     * @param Tarifa $tarifa
     * @return Cliente
     */
    public function setTarifa(Tarifa $tarifa = null)
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    /**
     * Get tarifa
     *
     * @return Tarifa 
     */
    public function getTarifa()
    {
        return $this->tarifa;
    }

    /**
     * Add mesesPagos
     *
     * @param MesPago $mesesPagos
     * @return Cliente
     */
    public function addMesesPago(MesPago $mesesPagos)
    {
        $this->mesesPagos[] = $mesesPagos;

        return $this;
    }

    /**
     * Remove mesesPagos
     *
     * @param MesPago $mesesPagos
     */
    public function removeMesesPago(MesPago $mesesPagos)
    {
        $this->mesesPagos->removeElement($mesesPagos);
    }

    /**
     * Get mesesPagos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesesPagos()
    {
        return $this->mesesPagos;
    }

    /**
     * Add pagos
     *
     * @param Pago $pagos
     * @return Cliente
     */
    public function addPago(Pago $pagos)
    {
        $this->pagos[] = $pagos;

        return $this;
    }

    /**
     * Remove pagos
     *
     * @param Pago $pagos
     */
    public function removePago(Pago $pagos)
    {
        $this->pagos->removeElement($pagos);
    }

    /**
     * Get pagos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagos()
    {
        return $this->pagos;
    }
}
