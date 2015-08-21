<?php
namespace BS\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * ActionGallery
 *
 * @ORM\Table()
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class ActionGallery
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
     * @ORM\Column(name="caption", type="string", length=255, nullable=true)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="action_photo", fileNameProperty="photo")
     * 
     * @var File
     */
    private $photoFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $photo;

    public function __toString()
    {
        return $this->caption;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->action = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return ActionGallery
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
     * @return ActionGallery
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
     * Add action
     *
     * @param \BS\AdminBundle\Entity\Action $action
     *
     * @return ActionGallery
     */
    public function addAction(\BS\AdminBundle\Entity\Action $action)
    {
        $this->action[] = $action;

        return $this;
    }

    /**
     * Remove action
     *
     * @param \BS\AdminBundle\Entity\Action $action
     */
    public function removeAction(\BS\AdminBundle\Entity\Action $action)
    {
        $this->action->removeElement($action);
    }

    /**
     * Get action
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set photo
     *
     * @param array $photo
     *
     * @return ActionGallery
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return array
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set photo
     *
     * @param array $photo
     *
     * @return ActionGallery
     */
    public function setPhotoFile($photo)
    {
        $this->photoFile = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return array
     */
    public function getPhotoFile()
    {
        return $this->photoFile;
    }

    /**
     * Set photoFileFav
     *
     * @param string $photoFileFav
     *
     * @return EventVideoGallery
     */
    public function setPhotoFileFav($photoFileFav)
    {
        $this->photoFileFav = $photoFileFav;

        return $this;
    }

    /**
     * Get photoFileFav
     *
     * @return string
     */
    public function getPhotoFileFav()
    {
        return $this->photoFileFav;
    }
    /**
     * Set action
     *
     * @param \BS\AdminBundle\Entity\Action $action
     *
     * @return ActionGallery
     */
    public function setAction(\BS\AdminBundle\Entity\Action $action = null)
    {
        $this->action = $action;

        return $this;
    }
}
