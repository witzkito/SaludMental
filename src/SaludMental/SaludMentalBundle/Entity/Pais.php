<?php

namespace SaludMental\SaludMentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SaludMental\SaludMentalBundle\Entity\Repositorio\PaisRepository")
 */
class Pais
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
     * @ORM\Column(name="slug", type="string", length=100)
     */
    private $slug;
    
    /**
     * @ORM\OneToMany(targetEntity="Ciudad", mappedBy="ciudades")
     */
    protected $ciudades;


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
     * @return Pais
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
     * Set slug
     *
     * @param string $slug
     * @return Pais
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->provincias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    

    
    public function __toString() {
        return $this->nombre;
    }

    

    /**
     * Get ciudades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCiudades()
    {
        return $this->ciudades;
    }

    /**
     * Add ciudades
     *
     * @param \Alu\AluBundle\Entity\Ciudad $ciudades
     * @return Pais
     */
    public function addCiudade(\Alu\AluBundle\Entity\Ciudad $ciudades)
    {
        $this->ciudades[] = $ciudades;

        return $this;
    }

    /**
     * Remove ciudades
     *
     * @param \Alu\AluBundle\Entity\Ciudad $ciudades
     */
    public function removeCiudade(\Alu\AluBundle\Entity\Ciudad $ciudades)
    {
        $this->ciudades->removeElement($ciudades);
    }
}
