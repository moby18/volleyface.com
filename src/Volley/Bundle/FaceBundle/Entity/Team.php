<?php

namespace Volley\Bundle\FaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank", type="smallint", nullable=true)
     */
    private $rank;

    /**
     * @var integer
     *
     * @ORM\Column(name="place", type="smallint", nullable=true)
     */
    private $place;

    /**
     * @ORM\ManyToMany(targetEntity="Volley\Bundle\FaceBundle\Entity\Player", mappedBy="teams")
     **/
    private $players;

    /**
     * @ORM\ManyToOne(targetEntity="Volley\Bundle\FaceBundle\Entity\Tournament", inversedBy="teams")
     **/
    private $tournament;

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

    /**
     * Set tournament
     *
     * @param \Volley\Bundle\FaceBundle\Entity\Tournament $tournament
     * @return Team
     */
    public function setTournament(\Volley\Bundle\FaceBundle\Entity\Tournament $tournament = null)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return \Volley\Bundle\FaceBundle\Entity\Tournament 
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    function __toString()
    {
        return $this->getName();
    }


}
