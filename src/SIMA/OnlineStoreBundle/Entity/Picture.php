<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="fileName", type="string", length=255)
     * @Assert\NotBlank(message="Please, upload the picture.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="altText", type="string", length=255)
     */
    private $altText;

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Article", inversedBy="pictures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

 
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
     *
     * @return Picture
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
     * Set fileName
     *
     * @param string $fileName
     *
     * @return Picture
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set altText
     *
     * @param string $altText
     *
     * @return Picture
     */
    public function setAltText($altText)
    {
        $this->altText = $altText;

        return $this;
    }

    /**
     * Get altText
     *
     * @return string
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * Set article
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Article $article
     *
     * @return Picture
     */
    public function setArticle(\SIMA\OnlineStoreBundle\Entity\Article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \SIMA\OnlineStoreBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
