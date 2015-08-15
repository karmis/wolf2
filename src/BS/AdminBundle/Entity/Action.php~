<?php
namespace BS\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;

/**
 * Action
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Action
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
     * @ORM\ManyToMany(targetEntity="ActionGallery", orphanRemoval=true, cascade={"persist", "remove"})
     * @ORM\JoinTable(
     *      name="Action2ActionGallery",
     *      joinColumns={
     *          @ORM\JoinColumn(name="action_id", referencedColumnName="id")
     *      },
     *      inverseJoinColumns={@ORM\JoinColumn(name="gallery_id", referencedColumnName="id")}
     * )
     */
    public $gallery;

    public function __toString()
    {
        return $this->caption;
    }

    public function getEntityType() {
        return "ACTION";
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gallery = new \Doctrine\Common\Collections\ArrayCollection();
        $this->published = true;
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
     *
     * @return Action
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
     *
     * @return Action
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
     *
     * @return Action
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
     *
     * @return Action
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
     * Add gallery
     *
     * @param \BS\AdminBundle\Entity\ActionGallery $gallery
     *
     * @return Action
     */
    public function addGallery(\BS\AdminBundle\Entity\ActionGallery $gallery)
    {
        $this->gallery[] = $gallery;

        return $this;
    }

    /**
     * Remove gallery
     *
     * @param \BS\AdminBundle\Entity\ActionGallery $gallery
     */
    public function removeGallery(\BS\AdminBundle\Entity\ActionGallery $gallery)
    {
        $this->gallery->removeElement($gallery);
    }

    /**
     * Get gallery
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGallery()
    {
        return $this->gallery;
    }
}
