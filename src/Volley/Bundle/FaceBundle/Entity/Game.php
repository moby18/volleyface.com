<?php

namespace Volley\Bundle\FaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Volley\Bundle\FaceBundle\Entity\GameRepository")
 */
class Game
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
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
    */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Volley\Bundle\FaceBundle\Entity\Tournament",inversedBy="games")
     */
    private $tournament;

    /**
     * @ORM\ManyToOne(targetEntity="Volley\Bundle\FaceBundle\Entity\Round",inversedBy="games")
     */
    private $round;

    /**
     * @ORM\ManyToOne(targetEntity="Volley\Bundle\FaceBundle\Entity\Team")
     * @ORM\JoinColumn(name="home_team_id", referencedColumnName="id", nullable=true)
     */
    private $homeTeam;

    /**
     * @ORM\ManyToOne(targetEntity="Volley\Bundle\FaceBundle\Entity\Team")
     * @ORM\JoinColumn(name="away_team_id", referencedColumnName="id", nullable=true)
     */
    private $awayTeam;

    /**
     * @var string
     *
     * @ORM\Column(name="score", type="string", length=255, nullable=true)
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="score_set", type="string", length=255, nullable=true)
     */
    private $scoreSet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="played", type="boolean", nullable=true)
     */
    private $played;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;


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
     * @return Game
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
     * Set tournament
     *
     * @param string $tournament
     * @return Game
     */
    public function setTournament($tournament)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return string 
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     * Set homeTeam
     *
     * @param string $homeTeam
     * @return Game
     */
    public function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    /**
     * Get homeTeam
     *
     * @return string 
     */
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set awayTeam
     *
     * @param string $awayTeam
     * @return Game
     */
    public function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    /**
     * Get awayTeam
     *
     * @return string 
     */
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set score
     *
     * @param string $score
     * @return Game
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set scoreSet
     *
     * @param string $scoreSet
     * @return Game
     */
    public function setScoreSet($scoreSet)
    {
        $this->scoreSet = $scoreSet;

        return $this;
    }

    /**
     * Get scoreSet
     *
     * @return string 
     */
    public function getScoreSet()
    {
        return $this->scoreSet;
    }

    /**
     * Set played
     *
     * @param boolean $played
     * @return Game
     */
    public function setPlayed($played)
    {
        $this->played = $played;

        return $this;
    }

    /**
     * Get played
     *
     * @return boolean 
     */
    public function getPlayed()
    {
        return $this->played;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Game
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Game
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set round
     *
     * @param \Volley\Bundle\FaceBundle\Entity\Round $round
     * @return Game
     */
    public function setRound(\Volley\Bundle\FaceBundle\Entity\Round $round = null)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return \Volley\Bundle\FaceBundle\Entity\Round 
     */
    public function getRound()
    {
        return $this->round;
    }
}