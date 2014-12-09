<?php

namespace BS\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Model\MediaInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Blog
 *
 * @ORM\Table()
 * @ORM\Entity
 */
define('TMP_BLOG_UPLOAD_ROOT_DIR', __DIR__ . '/../../../../web/uploads/');
class Blog
{
    const BLOG_UPLOAD_ROOT_DIR =  TMP_BLOG_UPLOAD_ROOT_DIR;
    const BLOG_UPLOAD_DIR = "uploads/";

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

    // *
    //  * @var string
    //  * @Assert\Regex(
    //  *     pattern="/^[A-Za-z0-9-]+$/",
    //  *     match=true,
    //  *     message="Адрес должен содержать только латинске буквы"
    //  * )
    //  * @ORM\Column(name="slug", type="string", length=255, unique=true)
     
    // private $slug;

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
    protected $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $originalPhoto;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $photoGallery;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Gallery")
     * @ORM\JoinColumn(name="video_gallery", referencedColumnName="id")
     */
    private $videoGallery;

    public function getUploadRootDir()
    {
        // absolute path to your directory where images must be saved
        return self::BLOG_UPLOAD_ROOT_DIR;
    }

    public function getUploadDir()
    {
        return self::BLOG_UPLOAD_DIR;
    }

    public function getAbsolutePath()
    {
        return null === $this->photo ? null : $this->getUploadRootDir().'/'.$this->photo;
    }

    public function getWebPath()
    {
        return null === $this->photo ? null : '/'.$this->getUploadDir().'/'.$this->photo;
    }

    public function getEntityType() {
        return "BLOG";
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
     * @return Blog
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
     * @return Blog
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
     * @return Blog
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
     * @return Blog
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
     * @return Blog
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
     * @return Blog
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
     * @return Blog
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
     * Set videoGallery
     *
     * @param \Application\Sonata\MediaBundle\Entity\Gallery $videoGallery
     * @return Blog
     */
    public function setVideoGallery(\Application\Sonata\MediaBundle\Entity\Gallery $videoGallery = null)
    {
        $this->videoGallery = $videoGallery;

        return $this;
    }

    /**
     * Get videoGallery
     *
     * @return \Application\Sonata\MediaBundle\Entity\Gallery 
     */
    public function getVideoGallery()
    {
        return $this->videoGallery;
    }
}
