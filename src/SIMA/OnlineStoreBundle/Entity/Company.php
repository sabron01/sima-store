<?php

namespace SIMA\OnlineStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SIMA\OnlineStoreBundle\Entity\Enterprise;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="SIMA\OnlineStoreBundle\Repository\CompanyRepository")
 */
class Company extends Enterprise
{  
    /**
     * @ORM\OneToMany( targetEntity="SIMA\OnlineStoreBundle\Entity\Repository", mappedBy="company" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $repositories;

       /**
     * Constructor
     */
    public function __construct()
    {
        $this->repositories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add repository
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Repository $repository
     *
     * @return Company
     */
    public function addRepository(\SIMA\OnlineStoreBundle\Entity\Repository $repository)
    {
        $this->repositories[] = $repository;

        return $this;
    }

    /**
     * Remove repository
     *
     * @param \SIMA\OnlineStoreBundle\Entity\Repository $repository
     */
    public function removeRepository(\SIMA\OnlineStoreBundle\Entity\Repository $repository)
    {
        $this->repositories->removeElement($repository);
    }

    /**
     * Get repositories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRepositories()
    {
        return $this->repositories;
    }
}
