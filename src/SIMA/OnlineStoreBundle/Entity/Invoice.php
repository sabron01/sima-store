<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\InvoiceRepository")
 */
class Invoice
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
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="date")
     */
    private $dueDdate;

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Company" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\OneToMany( targetEntity="SIMA\OnlineStoreBundle\Entity\InvoiceItem", mappedBy="invoice" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $invoiceItems;
    
     /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoiceItems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set amount
     *
     * @param float $amount
     *
     * @return Invoice
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set dueDdate
     *
     * @param \DateTime $dueDdate
     *
     * @return Invoice
     */
    public function setDueDdate($dueDdate)
    {
        $this->dueDdate = $dueDdate;

        return $this;
    }

    /**
     * Get dueDdate
     *
     * @return \DateTime
     */
    public function getDueDdate()
    {
        return $this->dueDdate;
    }

    /**
     * Set owner
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Company $owner
     *
     * @return Invoice
     */
    public function setOwner(\SIMA\OnlineStoreBundle\Entity\Company $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \SIMA\OnlineStoreBundle\Entity\Company
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add invoiceItem
     *
     * @param \SIMA\OnlineStoreBundle\Entity\InvoiceItem $invoiceItem
     *
     * @return Invoice
     */
    public function addInvoiceItem(\SIMA\OnlineStoreBundle\Entity\InvoiceItem $invoiceItem)
    {
        $this->invoiceItems[] = $invoiceItem;

        return $this;
    }

    /**
     * Remove invoiceItem
     *
     * @param \SIMA\OnlineStoreBundle\Entity\InvoiceItem $invoiceItem
     */
    public function removeInvoiceItem(\SIMA\OnlineStoreBundle\Entity\InvoiceItem $invoiceItem)
    {
        $this->invoiceItems->removeElement($invoiceItem);
    }

    /**
     * Get invoiceItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoiceItems()
    {
        return $this->invoiceItems;
    }
}
