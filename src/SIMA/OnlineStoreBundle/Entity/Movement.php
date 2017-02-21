<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movement
 *
 * @ORM\Table(name="movement")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\MovementRepository")
 */
class Movement
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
     * @ORM\Column(name="movmentDate", type="datetime")
     */
    private $movmentDate;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Article" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\ManyToMany(targetEntity="SIMA\OnlineStoreBundle\Entity\Repository")
     * @ORM\JoinTable(name="movement_repository_source",
     *      joinColumns={@ORM\JoinColumn(name="movement_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="repository_source_id", referencedColumnName="id")}
     *      )
     */
    private $repositorySource;

    /**
     * @ORM\ManyToMany(targetEntity="SIMA\OnlineStoreBundle\Entity\Repository")
     * @ORM\JoinTable(name="movement_repository_target",
     *      joinColumns={@ORM\JoinColumn(name="movement_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="repository_target_id", referencedColumnName="id")}
     *      )
     */
    private $repositoryTarget;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->repositorySource = new \Doctrine\Common\Collections\ArrayCollection();
        $this->repositoryTarget = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set movmentDate
     *
     * @param \DateTime $movmentDate
     *
     * @return Movement
     */
    public function setMovmentDate($movmentDate)
    {
        $this->movmentDate = $movmentDate;

        return $this;
    }

    /**
     * Get movmentDate
     *
     * @return \DateTime
     */
    public function getMovmentDate()
    {
        return $this->movmentDate;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Movement
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set article
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Article $article
     *
     * @return Movement
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
     * Add repositorySource
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Repository $repositorySource
     *
     * @return Movement
     */
    public function addRepositorySource(\SIMA\OnlineStoreBundle\Entity\Repository $repositorySource)
    {
        $this->repositorySource[] = $repositorySource;

        return $this;
    }

    /**
     * Remove repositorySource
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Repository $repositorySource
     */
    public function removeRepositorySource(\SIMA\OnlineStoreBundle\Entity\Repository $repositorySource)
    {
        $this->repositorySource->removeElement($repositorySource);
    }

    /**
     * Get repositorySource
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRepositorySource()
    {
        return $this->repositorySource;
    }

    /**
     * Add repositoryTarget
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Repository $repositoryTarget
     *
     * @return Movement
     */
    public function addRepositoryTarget(\SIMA\OnlineStoreBundle\Entity\Repository $repositoryTarget)
    {
        $this->repositoryTarget[] = $repositoryTarget;

        return $this;
    }

    /**
     * Remove repositoryTarget
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Repository $repositoryTarget
     */
    public function removeRepositoryTarget(\SIMA\OnlineStoreBundle\Entity\Repository $repositoryTarget)
    {
        $this->repositoryTarget->removeElement($repositoryTarget);
    }

    /**
     * Get repositoryTarget
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRepositoryTarget()
    {
        return $this->repositoryTarget;
    }
}
