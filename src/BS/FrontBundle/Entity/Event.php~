<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 13.10.14
 * Time: 23:55
 */

namespace BS\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Model\MediaInterface;
use Symfony\Component\Validator\Constraints as Assert;
use BS\FrontBundle\Entity\VideoGallery;
define('TMP_EVENT_UPLOAD_ROOT_DIR', __DIR__ . '/../../../../web/uploads/');
/**
 * Blog
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Event
{
    const EVENT_UPLOAD_ROOT_DIR =  TMP_EVENT_UPLOAD_ROOT_DIR;
    const EVENT_UPLOAD_DIR = "uploads/";

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
     * @ORM\Column(name="caption", type="string", length=255)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="smallContent", type="text")
     */
    private $smallContent;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", nullable=true)
     */
    private $published;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $originalPhoto;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $photoGallery;

    /**
     * @ORM\OneToMany(targetEntity="VideoGallery", mappedBy="event", cascade={"all"}, orphanRemoval=true)
     */
    private $videoGallery;

    /**
     * @var string
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="endDate", type="date", nullable=true)
     */
    private $endDate;

    public function getEntityType() {
        return "EVENT";
    }

    public function getUploadRootDir()
    {
        // absolute path to your directory where images must be saved
        return self::EVENT_UPLOAD_ROOT_DIR;
    }

    public function getUploadDir()
    {
        return self::EVENT_UPLOAD_DIR;
    }

    public function getAbsolutePath()
    {
        return null === $this->photo ? null : $this->getUploadRootDir().'/'.$this->photo;
    }

    public function getWebPath()
    {
        return null === $this->photo ? null : '/'.$this->getUploadDir().'/'.$this->photo;
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
     * Set caption
     *
     * @param string $caption
     * @return Event
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set smallContent
     *
     * @param string $smallContent
     * @return Event
     */
    public function setSmallContent($smallContent)
    {
        $this->smallContent = $smallContent;

        return $this;
    }

    /**
     * Get smallContent
     *
     * @return string 
     */
    public function getSmallContent()
    {
        return $this->smallContent;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Event
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Event
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Event
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set originalPhoto
     *
     * @param string $originalPhoto
     * @return Event
     */
    public function setOriginalPhoto($originalPhoto)
    {
        $this->originalPhoto = $originalPhoto;

        return $this;
    }

    /**
     * Get originalPhoto
     *
     * @return string 
     */
    public function getOriginalPhoto()
    {
        return $this->originalPhoto;
    }

    /**
     * Set photoGallery
     *
     * @param array $photoGallery
     * @return Event
     */
    public function setPhotoGallery($photoGallery)
    {
        $this->photoGallery = $photoGallery;

        return $this;
    }

    /**
     * Get photoGallery
     *
     * @return array 
     */
    public function getPhotoGallery()
    {
        return $this->photoGallery;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Event
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->videoGallery = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add videoGallery
     *
     * @param \BS\FrontBundle\Entity\VideoGallery $videoGallery
     * @return Event
     */
    public function addVideoGallery(\BS\FrontBundle\Entity\VideoGallery $videoGallery)
    {
        $this->videoGallery[] = $videoGallery;

        return $this;
    }

    /**
     * Remove videoGallery
     *
     * @param \BS\FrontBundle\Entity\VideoGallery $videoGallery
     */
    public function removeVideoGallery(\BS\FrontBundle\Entity\VideoGallery $videoGallery)
    {
        $this->videoGallery->removeElement($videoGallery);
    }

    /**
     * Get videoGallery
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideoGallery()
    {
        return $this->videoGallery;
    }
}
