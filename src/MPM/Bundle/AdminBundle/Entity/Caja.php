<?php

namespace MPM\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Caja
 *
 * @ORM\Table(name="cajas")
 * @ORM\Entity(repositoryClass="MPM\Bundle\AdminBundle\Entity\CajaRepository")
 */
class Caja
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_open", type="datetime")
     */
    protected $fechaOp;

    /**
     * @ORM\ManyToOne(targetEntity="Personal")
     * @ORM\JoinColumn(name="personal_open_id", referencedColumnName="id")
     **/
    protected $personalOp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_close", type="datetime")
     */
    protected $fechaCl;

    /**
     * @ORM\ManyToOne(targetEntity="Personal")
     * @ORM\JoinColumn(name="personal_close_id", referencedColumnName="id")
     **/
    protected $personalCl;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal")
     */
    protected $monto;

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
     * Set fechaOp
     *
     * @param \DateTime $fechaOp
     * @return Caja
     */
    public function setFechaOp($fechaOp)
    {
        $this->fechaOp = $fechaOp;

        return $this;
    }

    /**
     * Get fechaOp
     *
     * @return \DateTime 
     */
    public function getFechaOp()
    {
        return $this->fechaOp;
    }

    /**
     * Set fechaCl
     *
     * @param \DateTime $fechaCl
     * @return Caja
     */
    public function setFechaCl($fechaCl)
    {
        $this->fechaCl = $fechaCl;

        return $this;
    }

    /**
     * Get fechaCl
     *
     * @return \DateTime 
     */
    public function getFechaCl()
    {
        return $this->fechaCl;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return Caja
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
     * Set personalOp
     *
     * @param Personal $personalOp
     * @return Caja
     */
    public function setPersonalOp(Personal $personalOp = null)
    {
        $this->personalOp = $personalOp;

        return $this;
    }

    /**
     * Get personalOp
     *
     * @return Personal 
     */
    public function getPersonalOp()
    {
        return $this->personalOp;
    }

    /**
     * Set personalCl
     *
     * @param Personal $personalCl
     * @return Caja
     */
    public function setPersonalCl(Personal $personalCl = null)
    {
        $this->personalCl = $personalCl;

        return $this;
    }

    /**
     * Get personalCl
     *
     * @return Personal 
     */
    public function getPersonalCl()
    {
        return $this->personalCl;
    }
}
