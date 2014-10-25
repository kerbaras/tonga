<?php

namespace MPM\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 * 
 * @ORM\Table(name="logs")
 * @ORM\Entity(repositoryClass="MPM\Bundle\AdminBundle\Entity\LogRepository")
 */
class Log
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
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    protected $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="logs")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     **/
    protected $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255)
     */
    protected $ip;

    /**
     * @var boolean
     *
     * @ORM\Column(name="resultado", type="boolean")
     */
    protected $resultado;

    /**
     * @var string
     *
     * @ORM\Column(name="notas", type="text")
     */
    protected $notas;




    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Log
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
     * Set tipo
     *
     * @param string $tipo
     * @return Log
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
     * Set ip
     *
     * @param string $ip
     * @return Log
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set resultado
     *
     * @param boolean $resultado
     * @return Log
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return boolean 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set notas
     *
     * @param string $notas
     * @return Log
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;

        return $this;
    }

    /**
     * Get notas
     *
     * @return string 
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Set usuario
     *
     * @param Persona $usuario
     * @return Log
     */
    public function setUsuario(Persona $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return Persona 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
