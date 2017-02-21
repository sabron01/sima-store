<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticlePrice
 *
 * @ORM\Table(name="article_price")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\ArticlePriceRepository")
 */
class ArticlePrice
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
     * @var float
     *
     * @ORM\Column(name="purchasePrice", type="float", options={"default":0})
     */
    private $purchasePrice;

    /**
     * @var float
     *
     * @ORM\Column(name="priceHT", type="float")
     */
    private $priceHT;

    /**
     * @var float
     *
     * @ORM\Column(name="priceTTC", type="float")
     */
    private $priceTTC;

    /**
     * @var float
     *
     * @ORM\Column(name="priceQuotation", type="float")
     */
    private $priceQuotation;

    /**
     * @var float
     *
     * @ORM\Column(name="priceDiscont", type="float")
     */
    private $priceDiscont;

    /**
     * @var string
     *
     * @ORM\Column(name="offerPrrice", type="string", length=255)
     */
    private $offerPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier", type="string", length=255)
     */
    private $supplier;

    /**
     * @ORM\OneToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Article")
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
     * Set purchasePrice
     *
     * @param float $purchasePrice
     *
     * @return ArticlePrice
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    /**
     * Get purchasePrice
     *
     * @return float
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * Set priceHT
     *
     * @param float $priceHT
     *
     * @return ArticlePrice
     */
    public function setPriceHT($priceHT)
    {
        $this->priceHT = $priceHT;

        return $this;
    }

    /**
     * Get priceHT
     *
     * @return float
     */
    public function getPriceHT()
    {
        return $this->priceHT;
    }

    /**
     * Set priceTTC
     *
     * @param float $priceTTC
     *
     * @return ArticlePrice
     */
    public function setPriceTTC($priceTTC)
    {
        $this->priceTTC = $priceTTC;

        return $this;
    }

    /**
     * Get priceTTC
     *
     * @return float
     */
    public function getPriceTTC()
    {
        return $this->priceTTC;
    }

    /**
     * Set priceQuotation
     *
     * @param float $priceQuotation
     *
     * @return ArticlePrice
     */
    public function setPriceQuotation($priceQuotation)
    {
        $this->priceQuotation = $priceQuotation;

        return $this;
    }

    /**
     * Get priceQuotation
     *
     * @return float
     */
    public function getPriceQuotation()
    {
        return $this->priceQuotation;
    }

    /**
     * Set priceDiscont
     *
     * @param float $priceDiscont
     *
     * @return ArticlePrice
     */
    public function setPriceDiscont($priceDiscont)
    {
        $this->priceDiscont = $priceDiscont;

        return $this;
    }

    /**
     * Get priceDiscont
     *
     * @return float
     */
    public function getPriceDiscont()
    {
        return $this->priceDiscont;
    }

    /**
     * Set offerPrice
     *
     * @param string $offerPrice
     *
     * @return ArticlePrice
     */
    public function setOfferPrice($offerPrice)
    {
        $this->offerPrice = $offerPrice;

        return $this;
    }

    /**
     * Get offerPrice
     *
     * @return string
     */
    public function getOfferPrice()
    {
        return $this->offerPrice;
    }

    /**
     * Set supplier
     *
     * @param string $supplier
     *
     * @return ArticlePrice
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
     * Set article
     *
     * @param \SIMA\OnlineStoreBundle\Entity\article $article
     *
     * @return ArticlePrice
     */
    public function setArticle(\SIMA\OnlineStoreBundle\Entity\article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \SIMA\OnlineStoreBundle\Entity\article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
