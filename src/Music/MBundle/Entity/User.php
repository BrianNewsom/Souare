<?php
// src/Acme/UserBundle/Entity/User.php

namespace Music\MBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var array    
     * @ORM\Column(type="array", length=1000, nullable=true)
     */
    protected $songs;
    
    public function __construct()
    {
        parent::__construct();
        //$this->personalTracks = "HelloWorld";
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
     * Set songs
     *
     * @param array $songs
     * @return User
     */
    public function setSongs($songs)
    {
        $this->songs = $songs;
    
        return $this;
    }

    /**
     * Set songs
     *
     * @param array $songs
     * @return User
     */
    public function addSong($songs)
    {
        $this->songs[] = $songs;
    
        return $this;
    }
    /**
     * Get songs
     *
     * @return array 
     */
    public function getSongs()
    {
        return $this->songs;
    }
}