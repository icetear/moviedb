<?php

namespace Dragonlands\MovieBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
   
    /**
     * @var string
     */
    private $comment;


    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return User
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * @var \DateTime
     */
    private $birthday;


    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $movies;


    /**
     * Add movie
     *
     * @param \Dragonlands\MovieBundle\Entity\Movie $movie
     *
     * @return User
     */
    public function addMovie(\Dragonlands\MovieBundle\Entity\Movie $movie)
    {
        $this->movies[] = $movie;

        return $this;
    }

    /**
     * Remove movie
     *
     * @param \Dragonlands\MovieBundle\Entity\Movie $movie
     */
    public function removeMovie(\Dragonlands\MovieBundle\Entity\Movie $movie)
    {
        $this->movies->removeElement($movie);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMovies()
    {
        return $this->movies;
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
     * @return User
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
