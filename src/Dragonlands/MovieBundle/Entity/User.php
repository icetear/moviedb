<?php

namespace Dragonlands\MovieBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $passwordhash;


    /**
    * Get String representation of this entity
    *
    * @return string
    */
    public function __toString()
    {
        return $this->username;
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set passwordhash
     *
     * @param string $passwordhash
     *
     * @return User
     */
    public function setPasswordhash($passwordhash)
    {
        $this->passwordhash = $passwordhash;

        return $this;
    }

    /**
     * Get passwordhash
     *
     * @return string
     */
    public function getPasswordhash()
    {
        return $this->passwordhash;
    }
    
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
