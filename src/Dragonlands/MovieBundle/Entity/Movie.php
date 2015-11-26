<?php

namespace Dragonlands\MovieBundle\Entity;

/**
 * Movie
 */
class Movie
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titleOrig;

    /**
     * @var string
     */
    private $titleDe;

    /**
     * @var integer
     */
    private $year;

    /**
     * @var integer
     */
    private $length;

    /**
     * @var string
     */
    private $imdbId;


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
     * Set titleOrig
     *
     * @param string $titleOrig
     *
     * @return Movie
     */
    public function setTitleOrig($titleOrig)
    {
        $this->titleOrig = $titleOrig;

        return $this;
    }

    /**
     * Get titleOrig
     *
     * @return string
     */
    public function getTitleOrig()
    {
        return $this->titleOrig;
    }

    /**
     * Set titleDe
     *
     * @param string $titleDe
     *
     * @return Movie
     */
    public function setTitleDe($titleDe)
    {
        $this->titleDe = $titleDe;

        return $this;
    }

    /**
     * Get titleDe
     *
     * @return string
     */
    public function getTitleDe()
    {
        return $this->titleDe;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Movie
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set length
     *
     * @param integer $length
     *
     * @return Movie
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set imdbId
     *
     * @param string $imdbId
     *
     * @return Movie
     */
    public function setImdbId($imdbId)
    {
        $this->imdbId = $imdbId;

        return $this;
    }

    /**
     * Get imdbId
     *
     * @return string
     */
    public function getImdbId()
    {
        return $this->imdbId;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tag
     *
     * @param \Dragonlands\MovieBundle\Entity\Tag $tag
     *
     * @return Movie
     */
    public function addTag(\Dragonlands\MovieBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Dragonlands\MovieBundle\Entity\Tag $tag
     */
    public function removeTag(\Dragonlands\MovieBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
