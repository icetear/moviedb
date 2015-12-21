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
    * Get String representation of this entity
    *
    * @return string
    */
    public function __toString()
    {
        return $this->titleOrig.", ".$this->year." (".$this->titleDe.")";
    }


    /**
    *   get all tags for this movie
    *
    * @var \Doctrine\Common\Collections\Collection
    */
    public function tags()
    {

        //  we already have the ratings for this movie
        //  now we must group them by tag

        $tags = [];

        foreach($this->ratings as $rating)
        {
            $tag = $rating->getTag();
            if(!in_array($tag, $tags)) $tags[] = $tag;
        }

        usort($tags, array($this, "cmp"));

        return $tags;
        
    }

    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function cmp($a, $b)
    {
        return strcmp($a->getName(), $b->getName());
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
    
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ratings;


    /**
     * Add rating
     *
     * @param \Dragonlands\MovieBundle\Entity\Rating $rating
     *
     * @return Movie
     */
    public function addRating(\Dragonlands\MovieBundle\Entity\Rating $rating)
    {
        $this->ratings[] = $rating;

        return $this;
    }

    /**
     * Remove rating
     *
     * @param \Dragonlands\MovieBundle\Entity\Rating $rating
     */
    public function removeRating(\Dragonlands\MovieBundle\Entity\Rating $rating)
    {
        $this->ratings->removeElement($rating);
    }

    /**
     * Get ratings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRatings()
    {
        return $this->ratings;
    }
    /**
     * @var \Dragonlands\MovieBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \Dragonlands\MovieBundle\Entity\User $user
     *
     * @return Movie
     */
    public function setUser(\Dragonlands\MovieBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Dragonlands\MovieBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
