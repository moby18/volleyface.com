<?php

namespace Volley\StatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tournament
 *
 * @ORM\Table(name="stat_tournament")
 * @ORM\Entity
 */
class Tournament
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="tournaments")
     * @ORM\JoinColumn(name="countryId", referencedColumnName="id")
     */
    protected $country;

    /**
     * @ORM\OneToMany(targetEntity="Season", mappedBy="tournament")
     */
    protected $seasons;

    function __construct()
    {
        $this->seasons = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Tournament
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Tournament
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set country
     *
     * @param \Volley\StatBundle\Entity\Country $country
     * @return Tournament
     */
    public function setCountry(\Volley\StatBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Volley\StatBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add seasons
     *
     * @param \Volley\StatBundle\Entity\Season $seasons
     * @return Tournament
     */
    public function addSeason(\Volley\StatBundle\Entity\Season $seasons)
    {
        $this->seasons[] = $seasons;

        return $this;
    }

    /**
     * Remove seasons
     *
     * @param \Volley\StatBundle\Entity\Season $seasons
     */
    public function removeSeason(\Volley\StatBundle\Entity\Season $seasons)
    {
        $this->seasons->removeElement($seasons);
    }

    /**
     * Get seasons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeasons()
    {
        return $this->seasons;
    }

    function __toString()
    {
        return $this->getName();
    }


}
