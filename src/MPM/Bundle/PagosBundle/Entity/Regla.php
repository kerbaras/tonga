<?php

namespace MPM\Bundle\PagosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regla
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MPM\Bundle\PagosBundle\Entity\ReglaRepository")
 */
class Regla
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal")
     */
    private $monto;

    /**
     * @var integer
     *
     * @ORM\Column(name="montoTipo", type="smallint")
     */
    private $montoTipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="desde", type="integer")
     */
    private $desde;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Regla
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return Regla
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set montoTipo
     *
     * @param integer $montoTipo
     * @return Regla
     */
    public function setMontoTipo($montoTipo)
    {
        $this->montoTipo = $montoTipo;

        return $this;
    }

    /**
     * Get montoTipo
     *
     * @return integer 
     */
    public function getMontoTipo()
    {
        return $this->montoTipo;
    }

    /**
     * Set desde
     *
     * @param integer $desde
     * @return Regla
     */
    public function setDesde($desde)
    {
        $this->desde = $desde;

        return $this;
    }

    /**
     * Get desde
     *
     * @return integer 
     */
    public function getDesde()
    {
        return $this->desde;
    }
}
