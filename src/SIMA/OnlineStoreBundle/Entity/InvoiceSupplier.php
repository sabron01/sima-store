<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SIMA\OnlineStoreBundle\Entity\Invoice;

/**
 * InvoiceSupplier
 *
 * @ORM\Table(name="invoice_supplier")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\InvoiceSupplierRepository")
 */
class InvoiceSupplier extends Invoice
{

    /**
     * @ORM\ManyToOne( targetEntity="SIMA\OnlineStoreBundle\Entity\Supplier" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $supplier;

    /**
     * Set supplier
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Supplier $supplier
     *
     * @return InvoiceSupplier
     */
    public function setSupplier(\SIMA\OnlineStoreBundle\Entity\Supplier $supplier)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return \SIMA\OnlineStoreBundle\Entity\Supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
}
