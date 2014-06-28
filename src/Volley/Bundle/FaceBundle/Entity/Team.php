<?php

namespace Volley\Bundle\FaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Volley\Bundle\FaceBundle\Entity\Player;

/**
 * Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Volley\Bundle\FaceBundle\Entity\TeamRepository")
 */
class Team
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
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank", type="smallint")
     */
    private $rank;

    /**
     * @var integer
     *
     * @ORM\Column(name="place", type="smallint")
     */
    private $place;

    /**
     * @ORM\ManyToMany(targetEntity="Player", mappedBy="teams")
     **/
    private $players;

    public function __construct() {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Team
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
     * Set rating
     *
     * @param integer $rating
     * @return Team
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     * @return Team
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set place
     *
     * @param integer $place
     * @return Team
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return integer 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Add players
     *
     * @param \Volley\Bundle\FaceBundle\Entity\Player $players
     * @return Team
     */
    public function addPlayer(\Volley\Bundle\FaceBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \Volley\Bundle\FaceBundle\Entity\Player $players
     */
    public function removePlayer(\Volley\Bundle\FaceBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
