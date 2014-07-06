<?php

namespace Volley\Bundle\FaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Volley\Bundle\FaceBundle\Entity\RoundRepository")
 */
class Round
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Volley\Bundle\FaceBundle\Entity\Tournament",inversedBy="rounds")
     */
    private $tournament;

    /**
     * @ORM\OneToMany(targetEntity="Volley\Bundle\FaceBundle\Entity\Game",mappedBy="round")
     * @ORM\OrderBy({"number" = "ASC"})
     */
    private $games;


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
     * @return Round
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
     * Set type
     *
     * @param string $type
     * @return Round
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set tournament
     *
     * @param \Volley\Bundle\FaceBundle\Entity\Tournament $tournament
     * @return Round
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->games = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add games
     *
     * @param \Volley\Bundle\FaceBundle\Entity\Game $games
     * @return Round
     */
    public function addGame(\Volley\Bundle\FaceBundle\Entity\Game $games)
    {
        $this->games[] = $games;

        return $this;
    }

    /**
     * Remove games
     *
     * @param \Volley\Bundle\FaceBundle\Entity\Game $games
     */
    public function removeGame(\Volley\Bundle\FaceBundle\Entity\Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGames()
    {
        return $this->games;
    }

    function __toString()
    {
        return $this->getName();
    }


}
