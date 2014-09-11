<?php

namespace MPM\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 * 
 * @ORM\Entity(repositoryClass="MPM\Bundle\AdminBundle\Entity\ClienteRepository")
 */
class Cliente extends Persona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="asosiationId", type="bigint")
     */
    private $asosiationId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sancionado", type="boolean")
     */
    private $sancionado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sancionadoDesde", type="date")
     */
    private $sancionadoDesde;


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
}
