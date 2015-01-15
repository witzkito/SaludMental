<?php

namespace SaludMental\SaludMentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Persona
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SaludMental\SaludMentalBundle\Entity\Repositorio\PersonaRepository")
 */
class Persona
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=100)
     */
    private $apellido;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tipoDocumento", type="string", length=100)
     */
    private $tipoDocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="nroDocumento", type="string", length=255)
     * @Assert\Regex(
     *     pattern="/[0-9]/",
     *     match=true,
     *     message="Solo Numeros y Comas")
     * @Assert\Length(
     *     min=4,
     *     minMessage="El Numero ingresado es muy corto")
     */
    private $nroDocumento;
    
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
     * @ORM\Column(name="telefonoFijo", type="string", length=100)
     * @Assert\Regex(
     *     pattern     = "/([0-9][-]|[S\/N])/",
     *     match       = true,
     *     message     = "El numero de Telefono debe contener numeros y '-', o S/N")
     */
    private $telefonoFijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoCelular", type="string", length=100)
     * @Assert\Regex(
     *     pattern     = "/([0-9][-]|[S\/N])/",
     *     match       = true,
     *     message     = "El numero de Telefono debe contener numeros y '-' o S/N")
     */
    private $telefonoCelular;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaNacimiento", type="date")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoCivil", type="string", length=100)
     */
    private $estadoCivil;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ocupacion", type="string", length=200)
     */
    private $ocupacion;
    
    /**
     * @ORM\OneToMany(targetEntity="FamiliaPersona", mappedBy="persona")
     */
    protected $familias;
    
    /**
    * @var boolean
    *
    * @ORM\Column(name="discapacidad", type="boolean", nullable=true)
    */
    protected $discapacidad;
    
    /**
    * @var boolean
    *
    * @ORM\Column(name="jubilado", type="boolean", nullable=true)
    */
    protected $jubilado;
    
    /**
    * @var boolean
    *
    * @ORM\Column(name="pensionado", type="boolean", nullable=true)
    */
    protected $pensionado;
    
    /**
    * @var boolean
    *
    * @ORM\Column(name="haberes", type="boolean", nullable=true)
    */
    protected $haberes;
    
    
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->familia = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
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
     * Set apellido
     *
     * @param string $apellido
     * @return Persona
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set tipoDocumento
     *
     * @param string $tipoDocumento
     * @return Persona
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return string 
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set nroDocumento
     *
     * @param string $nroDocumento
     * @return Persona
     */
    public function setNroDocumento($nroDocumento)
    {
        $this->nroDocumento = $nroDocumento;

        return $this;
    }

    /**
     * Get nroDocumento
     *
     * @return string 
     */
    public function getNroDocumento()
    {
        return $this->nroDocumento;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Persona
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
     * @return Persona
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
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     * @return Persona
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;

        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string 
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     * @return Persona
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefonoCelular = $telefonoCelular;

        return $this;
    }

    /**
     * Get telefonoCelular
     *
     * @return string 
     */
    public function getTelefonoCelular()
    {
        return $this->telefonoCelular;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Persona
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set estadoCivil
     *
     * @param string $estadoCivil
     * @return Persona
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return string 
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return Persona
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set ciudad
     *
     * @param \SaludMental\SaludMentalBundle\Entity\Ciudad $ciudad
     * @return Persona
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
     * Get familia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFamilia()
    {
        return $this->familia;
    }


    /**
     * Add familias
     *
     * @param \SaludMental\SaludMentalBundle\Entity\FamiliaPersona $familias
     * @return Persona
     */
    public function addFamilia(\SaludMental\SaludMentalBundle\Entity\FamiliaPersona $familias)
    {
        $this->familias[] = $familias;

        return $this;
    }

    /**
     * Remove familias
     *
     * @param \SaludMental\SaludMentalBundle\Entity\FamiliaPersona $familias
     */
    public function removeFamilia(\SaludMental\SaludMentalBundle\Entity\FamiliaPersona $familias)
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

    /**
     * Set discapacidad
     *
     * @param boolean $discapacidad
     * @return Persona
     */
    public function setDiscapacidad($discapacidad)
    {
        $this->discapacidad = $discapacidad;

        return $this;
    }

    /**
     * Get discapacidad
     *
     * @return boolean 
     */
    public function getDiscapacidad()
    {
        return $this->discapacidad;
    }

    /**
     * Set jubilado
     *
     * @param boolean $jubilado
     * @return Persona
     */
    public function setJubilado($jubilado)
    {
        $this->jubilado = $jubilado;

        return $this;
    }

    /**
     * Get jubilado
     *
     * @return boolean 
     */
    public function getJubilado()
    {
        return $this->jubilado;
    }

    /**
     * Set pensionado
     *
     * @param boolean $pensionado
     * @return Persona
     */
    public function setPensionado($pensionado)
    {
        $this->pensionado = $pensionado;

        return $this;
    }

    /**
     * Get pensionado
     *
     * @return boolean 
     */
    public function getPensionado()
    {
        return $this->pensionado;
    }

    /**
     * Set haberes
     *
     * @param boolean $haberes
     * @return Persona
     */
    public function setHaberes($haberes)
    {
        $this->haberes = $haberes;

        return $this;
    }

    /**
     * Get haberes
     *
     * @return boolean 
     */
    public function getHaberes()
    {
        return $this->haberes;
    }
}
