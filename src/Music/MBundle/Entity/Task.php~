<?php

// src/Acme/TaskBundle/Entity/Task.php
namespace Music\MBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="task")
 * @ORM\HasLifecycleCallbacks
 */

class Task
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="array", length=255)
     * @Assert\NotBlank
     */
    protected $Song;

    public function getSong()
    {
        return $this->Song;
    }
    public function setSong($Song)
    {
        $this->Song = $Song;
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
}