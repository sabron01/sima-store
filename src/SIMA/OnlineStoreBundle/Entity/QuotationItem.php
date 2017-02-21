<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuotationItem
 *
 * @ORM\Table(name="quotation_item")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\QuotationItemRepository")
 */
class QuotationItem
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
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\QuotationRequest" ,inversedBy="quotationItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quotationRequest;


    /**
     * @var float
     * @ORM\Column(name="givenPrice", type="float")
     */
    private $givenPrice;

  
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
     * Set givenPrice
     *
     * @param float $givenPrice
     *
     * @return QuotationItem
     */
    public function setGivenPrice($givenPrice)
    {
        $this->givenPrice = $givenPrice;

        return $this;
    }

    /**
     * Get givenPrice
     *
     * @return float
     */
    public function getGivenPrice()
    {
        return $this->givenPrice;
    }

    /**
     * Set quotationRequest
     *
     * @param \SIMA\OnlineStoreBundle\Entity\QuotationRequest $quotationRequest
     *
     * @return QuotationItem
     */
    public function setQuotationRequest(\SIMA\OnlineStoreBundle\Entity\QuotationRequest $quotationRequest)
    {
        $this->quotationRequest = $quotationRequest;

        return $this;
    }

    /**
     * Get quotationRequest
     *
     * @return \SIMA\OnlineStoreBundle\Entity\QuotationRequest
     */
    public function getQuotationRequest()
    {
        return $this->quotationRequest;
    }
}
