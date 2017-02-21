<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\StockRepository")
 */
class Stock
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
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Article", inversedBy="stocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @var int
     *
     * @ORM\Column(name="threshold", type="integer")
     */
    private $threshold;

    /**
     * @var int
     *
     * @ORM\Column(name="availableQuantity", type="integer")
     */
    private $availableQuantity;

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Repository",inversedBy="stocks" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $repository;


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
     * Set threshold
     *
     * @param integer $threshold
     *
     * @return Stock
     */
    public function setThreshold($threshold)
    {
        $this->threshold = $threshold;

        return $this;
    }

    /**
     * Get threshold
     *
     * @return integer
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * Set availableQuantity
     *
     * @param integer $availableQuantity
     *
     * @return Stock
     */
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;

        return $this;
    }

    /**
     * Get availableQuantity
     *
     * @return integer
     */
    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }

    /**
     * Set article
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Article $article
     *
     * @return Stock
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

    /**
     * Set repository
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Repository $repository
     *
     * @return Stock
     */
    public function setRepository(\SIMA\OnlineStoreBundle\Entity\Repository $repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * Get repository
     *
     * @return \SIMA\OnlineStoreBundle\Entity\Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}
