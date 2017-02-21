<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceCustomer
 *
 * @ORM\Table(name="invoice_customer")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\InvoiceCustomerRepository")
 */
class InvoiceCustomer extends Invoice
{

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Customer" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * Set customer
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Customer $customer
     *
     * @return InvoiceCustomer
     */
    public function setCustomer(\SIMA\OnlineStoreBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \SIMA\OnlineStoreBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
