<?php

namespace SaludMental\SaludMentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Familia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SaludMental\SaludMentalBundle\Entity\Repositorio\FamiliaRepository")
 */
class Familia
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
     * @ORM\OneToMany(targetEntity="FamiliaPersona", mappedBy="familia")
     */
    protected $personas;
    
    /**
     * @ORM\ManyToOne(targetEntity="Hogar", inversedBy="familias")
     * @ORM\JoinColumn(name="hogar", referencedColumnName="id")
     */
    private $hogar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Familia
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
     * Add personas
     *
     * @param \SaludMental\SaludMentalBundle\Entity\FamiliaPersona $personas
     * @return Familia
     */
    public function addPersona(\SaludMental\SaludMentalBundle\Entity\FamiliaPersona $personas)
    {
        $this->personas[] = $personas;

        return $this;
    }

    /**
     * Remove personas
     *
     * @param \SaludMental\SaludMentalBundle\Entity\FamiliaPersona $personas
     */
    public function removePersona(\SaludMental\SaludMentalBundle\Entity\FamiliaPersona $personas)
    {
        $this->personas->removeElement($personas);
    }

    /**
     * Get personas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * Set hogar
     *
     * @param \SaludMental\SaludMentalBundle\Entity\Hogar $hogar
     * @return Familia
     */
    public function setHogar(\SaludMental\SaludMentalBundle\Entity\Hogar $hogar = null)
    {
        $this->hogar = $hogar;

        return $this;
    }

    /**
     * Get hogar
     *
     * @return \SaludMental\SaludMentalBundle\Entity\Hogar 
     */
    public function getHogar()
    {
        return $this->hogar;
    }
}
