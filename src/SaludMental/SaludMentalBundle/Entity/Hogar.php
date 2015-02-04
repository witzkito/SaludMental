<?php

namespace SaludMental\SaludMentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hogar
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SaludMental\SaludMentalBundle\Entity\Repositorio\HogarRepository")
 */
class Hogar
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
     * @ORM\Column(name="domicilio", type="string", length=255)
     * @Assert\Length(
     *     min=4,
     *     minMessage="La direccion debe tener por lo menos {{ limit }} digitos.")*/     
    private $domicilio;

    /**
     * @var string
     *
     * @ORM\Column(name="nroDomicilio", type="string", length=10)
     * @Assert\Regex(
     *     pattern     = "/([0-9]|[S\/N])/",
     *     match       = true,
     *     message="El numero debe contener solo numeros o S/N")
     */
    private $nroDomicilio;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="personas")
     * @ORM\JoinColumn(name="ciudad", referencedColumnName="id")
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="barrio", type="string", length=255)
     */
    private $barrio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="sanitario", type="string", length=255)
     */
    private $sanitario;

    /**
     * @var string
     *
     * @ORM\Column(name="agua", type="string", length=255)
     */
    private $agua;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean", name="electricidad")
     */
    private $electricidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cloaca", type="boolean")
     */
    private $cloaca;
    
    /**
     * @ORM\OneToMany(targetEntity="Familia", mappedBy="hogar")
     */
    private $familias;


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
     * Set calle
     *
     * @param string $calle
     * @return Hogar
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set nroCalle
     *
     * @param string $nroCalle
     * @return Hogar
     */
    public function setNroCalle($nroCalle)
    {
        $this->nroCalle = $nroCalle;

        return $this;
    }

    /**
     * Get nroCalle
     *
     * @return string 
     */
    public function getNroCalle()
    {
        return $this->nroCalle;
    }

    /**
     * Set barrio
     *
     * @param string $barrio
     * @return Hogar
     */
    public function setBarrio($barrio)
    {
        $this->barrio = $barrio;

        return $this;
    }

    /**
     * Get barrio
     *
     * @return string 
     */
    public function getBarrio()
    {
        return $this->barrio;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Hogar
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
     * Set sanitario
     *
     * @param string $sanitario
     * @return Hogar
     */
    public function setSanitario($sanitario)
    {
        $this->sanitario = $sanitario;

        return $this;
    }

    /**
     * Get 
     *
     * @return string 
     */
    public function getSanitario()
    {
        return $this->sanitario;
    }

    /**
     * Set agua
     *
     * @param string $agua
     * @return Hogar
     */
    public function setAgua($agua)
    {
        $this->agua = $agua;

        return $this;
    }

    /**
     * Get agua
     *
     * @return string 
     */
    public function getAgua()
    {
        return $this->agua;
    }

    /**
     * Set cloaca
     *
     * @param boolean $cloaca
     * @return Hogar
     */
    public function setCloaca($cloaca)
    {
        $this->cloaca = $cloaca;

        return $this;
    }

    /**
     * Get cloaca
     *
     * @return boolean 
     */
    public function getCloaca()
    {
        return $this->cloaca;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Hogar
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set nroDomicilio
     *
     * @param string $nroDomicilio
     * @return Hogar
     */
    public function setNroDomicilio($nroDomicilio)
    {
        $this->nroDomicilio = $nroDomicilio;

        return $this;
    }

    /**
     * Get nroDomicilio
     *
     * @return string 
     */
    public function getNroDomicilio()
    {
        return $this->nroDomicilio;
    }

    /**
     * Set electricidad
     *
     * @param boolean $electricidad
     * @return Hogar
     */
    public function setElectricidad($electricidad)
    {
        $this->electricidad = $electricidad;

        return $this;
    }

    /**
     * Get electricidad
     *
     * @return boolean 
     */
    public function getElectricidad()
    {
        return $this->electricidad;
    }

    /**
     * Set ciudad
     *
     * @param \SaludMental\SaludMentalBundle\Entity\Ciudad $ciudad
     * @return Hogar
     */
    public function setCiudad(\SaludMental\SaludMentalBundle\Entity\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \SaludMental\SaludMentalBundle\Entity\Ciudad 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->familias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add familias
     *
     * @param \SaludMental\SaludMentalBundle\Entity\Familia $familias
     * @return Hogar
     */
    public function addFamilia(\SaludMental\SaludMentalBundle\Entity\Familia $familias)
    {
        $this->familias[] = $familias;

        return $this;
    }

    /**
     * Remove familias
     *
     * @param \SaludMental\SaludMentalBundle\Entity\Familia $familias
     */
    public function removeFamilia(\SaludMental\SaludMentalBundle\Entity\Familia $familias)
    {
        $this->familias->removeElement($familias);
    }

    /**
     * Get familias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFamilias()
    {
        return $this->familias;
    }
}
