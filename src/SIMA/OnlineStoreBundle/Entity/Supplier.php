<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SIMA\OnlineStoreBundle\Entity\Enterprise;

/**
 * Supplier
 *
 * @ORM\Table(name="supplier")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\SupplierRepository")
 */
class Supplier extends Enterprise
{

    /**
     * @var string
     *
     * @ORM\Column(name="supplierCode", type="string", length=255)
     */
    private $supplierCode;

    /**
     * Set supplierCode
     *
     * @param string $supplierCode
     *
     * @return Supplier
     */
    public function setSupplierCode($supplierCode)
    {
        $this->supplierCode = $supplierCode;

        return $this;
    }

    /**
     * Get supplierCode
     *
     * @return string
     */
    public function getSupplierCode()
    {
        return $this->supplierCode;
    }
}
