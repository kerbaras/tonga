<?php

namespace MPM\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Pago
 *
 * @ORM\Table(name="pagos")
 * @ORM\Entity(repositoryClass="MPM\Bundle\AdminBundle\Entity\PagoRepository")
 */
class Pago
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
     * @ORM\Column(name="fecha", type="datetime")
     */
    protected $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal")
     */
    protected $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptor", type="string", length=255)
     */
    protected $descriptor;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="pagos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     **/
    protected $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="Personal", inversedBy="pagosRealizados")
     * @ORM\JoinColumn(name="personal_id", referencedColumnName="id")
     **/
    protected $personal;

    /**
     * @ORM\OneToMany(targetEntity="MesPago", mappedBy="pago")
     **/
    protected $meses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->meses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Pago
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
     * Set monto
     *
     * @param string $monto
     * @return Pago
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
     * @return Pago
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

    /**
     * Set cliente
     *
     * @param Cliente $cliente
     * @return Pago
     */
    public function setCliente(Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set personal
     *
     * @param Personal $personal
     * @return Pago
     */
    public function setPersonal(Personal $personal = null)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return Personal 
     */
    public function getPersonal()
    {
        return $this->personal;
    }

    /**
     * Add meses
     *
     * @param MesPago $meses
     * @return Pago
     */
    public function addMese(MesPago $meses)
    {
        $this->meses[] = $meses;

        return $this;
    }

    /**
     * Remove meses
     *
     * @param MesPago $meses
     */
    public function removeMese(MesPago $meses)
    {
        $this->meses->removeElement($meses);
    }

    /**
     * Get meses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMeses()
    {
        return $this->meses;
    }
}
