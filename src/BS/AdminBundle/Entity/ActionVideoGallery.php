<?php
namespace BS\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * ActionVideoGallery
 *
 * @ORM\Table()
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class ActionVideoGallery
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
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255, nullable=true)
     */
    private $ref;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="actionvideo_photo_fav", fileNameProperty="photo")
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
     * @return ActionVideoGallery
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
     * @return ActionVideoGallery
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
     * Set ref
     *
     * @param string $ref
     *
     * @return ActionVideoGallery
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
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
}
