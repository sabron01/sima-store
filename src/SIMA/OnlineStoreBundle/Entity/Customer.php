<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SIMA\OnlineStoreBundle\Entity\Enterprise;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\CustomerRepository")
 */
class Customer extends Enterprise
{

    /**
     * @var string
     *
     * @ORM\Column(name="customerCode", type="string", length=255)
     */
    private $customerCode;

    /**
     * Set customerCode
     *
     * @param string $customerCode
     *
     * @return Customer
     */
    public function setCustomerCode($customerCode)
    {
        $this->customerCode = $customerCode;

        return $this;
    }

    /**
     * Get customerCode
     *
     * @return string
     */
    public function getCustomerCode()
    {
        return $this->customerCode;
    }
}
