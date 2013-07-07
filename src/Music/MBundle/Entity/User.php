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
     * @var \array
     */
    protected $personalTracks;

    public function __construct()
    {
        parent::__construct();
        //$this->personalTracks = "HelloWorld";
    }
    /*
    public function getPersonalTracks(){
        return $this->personalTracks;
    }

    public function addPersonalTrack($track){
        if (!in_array($track, $this->personalTracks, true)) {
            $this->personalTracks[] = $track;
        }
        return $this;
    }
    */
}