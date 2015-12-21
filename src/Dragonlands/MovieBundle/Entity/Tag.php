<?php

namespace Dragonlands\MovieBundle\Entity;

/**
 * Tag
 */
class Tag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    /**
    * Get String representation of this entity
    *
    * @return string
    */
    public function __toString()
    {
        return $this->name;
    }


    /*
    *   gets the cumulated rating for this tag for a certain movie
    */
    public function getRatingForMovie(Movie $movie)
    {
        $rating_sum = 0;
        $count = 0;
        
        foreach($this->ratings as $rating)
        {
            if($rating->getMovie() === $movie)
            {
                $rating_sum += $rating->getScore();
                $count++;
            }
        }

        if($count > 0) $rating_sum /= $count;

        return $rating_sum;

    }

    /*
    *   gets the number of ratings for this tag for a certain movie
    */
    public function getRatingCountForMovie(Movie $movie)
    {
        $count = 0;

        foreach($this->ratings as $rating)
        {
            if($rating->getMovie() === $movie)
            {
                $count++;
            }
        }
        return $count;
    }


    /*
     * return all movies that are rated with this tag
     */
    public function getMovies()
    {
        $movies = array();
        foreach($this->ratings as $rating)
        {
            $movies[] = $rating->getMovie();
        }
        return $movies;
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
     *
     * @return Tag
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
     * Constructor
     */
    public function __construct()
    {
    }

    
    /**
     * @var string
     */
    private $color;


    /**
     * Set color
     *
     * @param string $color
     *
     * @return Tag
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
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
     * @return Tag
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
}
