<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TechnicalDetailItem
 *
 * @ORM\Table(name="technical_detail_item")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\TechnicalDetailsRepository")
 */
class TechnicalDetailItem
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
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\CharacteristicType" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $characteristicType;

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\ArticleModel",inversedBy="technicalDetailItems" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $articleModel;
 
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
     * Set value
     *
     * @param string $value
     *
     * @return TechnicalDetailItem
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set characteristicType
     *
     * @param \SIMA\OnlineStoreBundle\Entity\CharacteristicType $characteristicType
     *
     * @return TechnicalDetailItem
     */
    public function setCharacteristicType(\SIMA\OnlineStoreBundle\Entity\CharacteristicType $characteristicType)
    {
        $this->characteristicType = $characteristicType;

        return $this;
    }

    /**
     * Get characteristicType
     *
     * @return \SIMA\OnlineStoreBundle\Entity\CharacteristicType
     */
    public function getCharacteristicType()
    {
        return $this->characteristicType;
    }

    /**
     * Set articleModel
     *
     * @param \SIMA\OnlineStoreBundle\Entity\ArticleModel $articleModel
     *
     * @return TechnicalDetailItem
     */
    public function setArticleModel(\SIMA\OnlineStoreBundle\Entity\ArticleModel $articleModel)
    {
        $this->articleModel = $articleModel;

        return $this;
    }

    /**
     * Get articleModel
     *
     * @return \SIMA\OnlineStoreBundle\Entity\ArticleModel
     */
    public function getArticleModel()
    {
        return $this->articleModel;
    }
}
