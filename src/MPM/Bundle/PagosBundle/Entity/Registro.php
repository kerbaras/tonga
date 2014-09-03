<?php

namespace MPM\Bundle\PagosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registro
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MPM\Bundle\PagosBundle\Entity\RegistroRepository")
 */
class Registro
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="meses", type="integer")
     */
    private $meses;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal")
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptor", type="string", length=255)
     */
    private $descriptor;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Registro
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set meses
     *
     * @param integer $meses
     * @return Registro
     */
    public function setMeses($meses)
    {
        $this->meses = $meses;

        return $this;
    }

    /**
     * Get meses
     *
     * @return integer 
     */
    public function getMeses()
    {
        return $this->meses;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return Registro
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
     * Set descriptor
     *
     * @param string $descriptor
     * @return Registro
     */
    public function setDescriptor($descriptor)
    {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Get descriptor
     *
     * @return string 
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }
}
