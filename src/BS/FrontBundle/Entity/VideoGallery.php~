<?php

namespace BS\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoGallery
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class VideoGallery
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
     * @ORM\Column(name="href", type="text")
     */
    private $href;

    /**
     * @var string
     *
     * @ORM\Column(name="smallHref", type="string", length=255)
     */
    private $smallHref;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="videoGallery")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id")
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
     * @return VideoGallery
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
     * Set href
     *
     * @param string $href
     *
     * @return VideoGallery
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Get href
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set smallHref
     *
     * @param string $smallHref
     *
     * @return VideoGallery
     */
    public function setSmallHref($smallHref)
    {
        $this->smallHref = $smallHref;

        return $this;
    }

    /**
     * Get smallHref
     *
     * @return string
     */
    public function getSmallHref()
    {
        return $this->smallHref;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return VideoGallery
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
     * @return VideoGallery
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
