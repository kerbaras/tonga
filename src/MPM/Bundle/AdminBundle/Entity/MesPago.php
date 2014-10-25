<?php

namespace MPM\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * MesPago
 *
 * @ORM\Table(name="meses_pagos")
 * @ORM\Entity(repositoryClass="MPM\Bundle\AdminBundle\Entity\MesPagoRepository")
 */
class MesPago
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
     * @var integer
     *
     * @ORM\Column(name="mes", type="integer")
     */
    protected $mes;

    /**
     * @var integer
     *
     * @ORM\Column(name="ano", type="integer")
     */
    protected $ano;

    /**
     * @ORM\ManyToOne(targetEntity="Pago", inversedBy="meses")
     * @ORM\JoinColumn(name="pago_id", referencedColumnName="id")
     **/
    protected $pago;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="mesesPagos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     **/
    protected $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text")
     */
    protected $observacion;


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
     * Set mes
     *
     * @param integer $mes
     * @return MesPago
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set ano
     *
     * @param integer $ano
     * @return MesPago
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return integer 
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return MesPago
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set pago
     *
     * @param Pago $pago
     * @return MesPago
     */
    public function setPago(Pago $pago = null)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return Pago 
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set cliente
     *
     * @param Cliente $cliente
     * @return MesPago
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
}
