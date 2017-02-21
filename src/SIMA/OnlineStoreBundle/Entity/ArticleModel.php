<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticleModel
 *
 * @ORM\Table(name="article_model")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\ArticleModelRepository")
 */
class ArticleModel
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
     * @ORM\Column(name="Label", type="string", length=255)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier", type="string", length=255)
     */
    private $supplier;

    /**
     * @ORM\OneToMany( targetEntity="SIMA\OnlineStoreBundle\Entity\TechnicalDetailItem", mappedBy="articleModel" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $technicalDetailItems;

    /**
     * @ORM\OneToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->technicalDetailItems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set label
     *
     * @param string $label
     *
     * @return ArticleModel
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set supplier
     *
     * @param string $supplier
     *
     * @return ArticleModel
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return string
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Add technicalDetailItem
     *
     * @param \SIMA\OnlineStoreBundle\Entity\TechnicalDetailItem $technicalDetailItem
     *
     * @return ArticleModel
     */
    public function addTechnicalDetailItem(\SIMA\OnlineStoreBundle\Entity\TechnicalDetailItem $technicalDetailItem)
    {
        $this->technicalDetailItems[] = $technicalDetailItem;

        return $this;
    }

    /**
     * Remove technicalDetailItem
     *
     * @param \SIMA\OnlineStoreBundle\Entity\TechnicalDetailItem $technicalDetailItem
     */
    public function removeTechnicalDetailItem(\SIMA\OnlineStoreBundle\Entity\TechnicalDetailItem $technicalDetailItem)
    {
        $this->technicalDetailItems->removeElement($technicalDetailItem);
    }

    /**
     * Get technicalDetailItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTechnicalDetailItems()
    {
        return $this->technicalDetailItems;
    }

    /**
     * Set article
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Article $article
     *
     * @return ArticleModel
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
