<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuotationRequest
 *
 * @ORM\Table(name="quotation_request")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\QuotationRequestRepository")
 */
class QuotationRequest
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
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @ORM\OneToMany( targetEntity="SIMA\OnlineStoreBundle\Entity\QuotationItem", mappedBy="quotationRequest" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $quotationItems;

       /**
     * Constructor
     */
    public function __construct()
    {
        $this->quotationItems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lastName
     *
     * @param string $lastName
     *
     * @return QuotationRequest
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return QuotationRequest
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return QuotationRequest
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return QuotationRequest
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Add quotationItem
     *
     * @param \SIMA\OnlineStoreBundle\Entity\QuotationItem $quotationItem
     *
     * @return QuotationRequest
     */
    public function addQuotationItem(\SIMA\OnlineStoreBundle\Entity\QuotationItem $quotationItem)
    {
        $this->quotationItems[] = $quotationItem;

        return $this;
    }

    /**
     * Remove quotationItem
     *
     * @param \SIMA\OnlineStoreBundle\Entity\QuotationItem $quotationItem
     */
    public function removeQuotationItem(\SIMA\OnlineStoreBundle\Entity\QuotationItem $quotationItem)
    {
        $this->quotationItems->removeElement($quotationItem);
    }

    /**
     * Get quotationItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuotationItems()
    {
        return $this->quotationItems;
    }
}
