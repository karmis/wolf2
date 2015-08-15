<?php

namespace BS\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
/**
 * VideoGallery
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PhotoGallery
{
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @Assert\File( maxSize="20M")
     * @FileStore\UploadableField(mapping="photo")
     **/
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="photoGallery")
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    private $event;

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
     *
     * @return PhotoGallery
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
     * Set description
     *
     * @param string $description
     *
     * @return PhotoGallery
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set event
     *
     * @param \BS\FrontBundle\Entity\Event $event
     *
     * @return PhotoGallery
     */
    public function setEvent(\BS\FrontBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \BS\FrontBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }
}
