<?php
namespace Music\MBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Music\MBundle\Entity\User;
/**
 * @ORM\Entity
 * @ORM\Table(name="song")
 * @ORM\HasLifecycleCallbacks
 */
class Song
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    protected $title;
    /**
     * @ORM\Column(type="string")
     */
    protected $owner;
    /**
     * @ORM\Column(type="Track")
     */
    protected $tracks;
    

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
     //   $this->SetCreator();

    }


    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Song
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Song
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
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
     * Set title
     *
     * @param string $title
     * @return Song
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
     * Set owner
     *
     * @param string $owner
     * @return Song
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return string 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set tracks
     *
     * @param \Track $tracks
     * @return Song
     */
    public function setTracks(\Track $tracks)
    {
        $this->tracks = $tracks;
    
        return $this;
    }

    /**
     * Set tracks
     *
     * @param \Track $tracks
     * @return Song
     */
    public function addTrack(\Track $tracks)
    {
        $this->tracks[] = $tracks;
    
        return $this;
    }


    /**
     * Get tracks
     *
     * @return \Track 
     */
    public function getTracks()
    {
        return $this->tracks;
    }
}