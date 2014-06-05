<?php

namespace Volley\Bundle\FaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Volley\Bundle\FaceBundle\Entity\PostRepository")
 */
class Post
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean")
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=255)
     */
    private $createdBy;

    /**
     * @var string
     *
     * @ORM\Column(name="modified_by", type="string", length=255)
     */
    private $modifiedBy;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="ordering", type="string", length=255)
     */
    private $ordering;

    /**
     * @var string
     *
     * @ORM\Column(name="metakey", type="string", length=255)
     */
    private $metakey;

    /**
     * @var string
     *
     * @ORM\Column(name="metadescr", type="string", length=255)
     */
    private $metadescr;

    /**
     * @var integer
     *
     * @ORM\Column(name="hits", type="integer")
     */
    private $hits;

    /**
     * @var string
     *
     * @ORM\Column(name="metadata", type="string", length=255)
     */
    private $metadata;

    /**
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean")
     */
    private $featured;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;


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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Post
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Post
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set state
     *
     * @param boolean $state
     * @return Post
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return boolean 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Post
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return Post
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set modifiedBy
     *
     * @param string $modifiedBy
     * @return Post
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string 
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return Post
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set ordering
     *
     * @param string $ordering
     * @return Post
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return string 
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set metakey
     *
     * @param string $metakey
     * @return Post
     */
    public function setMetakey($metakey)
    {
        $this->metakey = $metakey;

        return $this;
    }

    /**
     * Get metakey
     *
     * @return string 
     */
    public function getMetakey()
    {
        return $this->metakey;
    }

    /**
     * Set metadescr
     *
     * @param string $metadescr
     * @return Post
     */
    public function setMetadescr($metadescr)
    {
        $this->metadescr = $metadescr;

        return $this;
    }

    /**
     * Get metadescr
     *
     * @return string 
     */
    public function getMetadescr()
    {
        return $this->metadescr;
    }

    /**
     * Set hits
     *
     * @param integer $hits
     * @return Post
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * Get hits
     *
     * @return integer 
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set metadata
     *
     * @param string $metadata
     * @return Post
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Get metadata
     *
     * @return string 
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set featured
     *
     * @param boolean $featured
     * @return Post
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return boolean 
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Post
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
