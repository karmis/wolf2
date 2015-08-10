<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 13.10.14
 * Time: 23:55
 */

namespace BS\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use BS\FrontBundle\Entity\VideoGallery;
define('TMP_ACTION_UPLOAD_ROOT_DIR', __DIR__ . '/../../../../web/uploads/');
/**
 * Blog
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Action
{
    const ACTION_UPLOAD_ROOT_DIR =  TMP_ACTION_UPLOAD_ROOT_DIR;
    const ACTION_UPLOAD_DIR = "uploads/";

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
     * @ORM\Column(type="array", nullable=true)
     */
    private $photoGallery;

    public function getEntityType() {
        return "ACTION";
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
     * Set photoGallery
     *
     * @param array $photoGallery
     *
     * @return Action
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
}
