<?php

namespace SaludMental\SaludMentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FamiliaPersona
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SaludMental\SaludMentalBundle\Entity\Repositorio\FamiliaPersonaRepository")
 */
class FamiliaPersona
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
     * @ORM\Column(name="relacion", type="string", length=100, nullable=true)
     */
    private $relacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Persona", inversedBy="familias")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    private $persona;
    
    /**
     * @ORM\ManyToOne(targetEntity="Familia", inversedBy="personas")
     * @ORM\JoinColumn(name="familia_id", referencedColumnName="id")
     */
    private $familia;



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
     * Set relacion
     *
     * @param string $relacion
     * @return FamiliaPersona
     */
    public function setRelacion($relacion)
    {
        $this->relacion = $relacion;

        return $this;
    }

    /**
     * Get relacion
     *
     * @return string 
     */
    public function getRelacion()
    {
        return $this->relacion;
    }

    /**
     * Set persona
     *
     * @param \SaludMental\SaludMentalBundle\Entity\Persona $persona
     * @return FamiliaPersona
     */
    public function setPersona(\SaludMental\SaludMentalBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \SaludMental\SaludMentalBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set familia
     *
     * @param \SaludMental\SaludMentalBundle\Entity\Familia $familia
     * @return FamiliaPersona
     */
    public function setFamilia(\SaludMental\SaludMentalBundle\Entity\Familia $familia = null)
    {
        $this->familia = $familia;

        return $this;
    }

    /**
     * Get familia
     *
     * @return \SaludMental\SaludMentalBundle\Entity\Familia 
     */
    public function getFamilia()
    {
        return $this->familia;
    }
}
