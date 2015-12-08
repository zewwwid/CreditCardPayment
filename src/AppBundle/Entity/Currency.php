<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Вылюта.
 * 
 * @ORM\Entity
 * @ORM\Table(name="currency")
 */
class Currency
{
    /**
     * @ORM\Id
     * @ORM\Column(name="primaryKey", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $primaryKey;

    /**
     * Код валюты.
     *
     * @ORM\Column(type="string", length=3, nullable=false)
     */
    protected $name;
    
    /**
     * Заказы оплаченные данной валютой.
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="currency")
     **/
    protected $orders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    /**
     * Get primaryKey
     *
     * @return guid
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Currency
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add order
     *
     * @param \AppBundle\Entity\Order $order
     *
     * @return Currency
     */
    public function addOrder(\AppBundle\Entity\Order $order)
    {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \AppBundle\Entity\Order $order
     */
    public function removeOrder(\AppBundle\Entity\Order $order)
    {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }
    
    public function __toString()
    {
        return $this->getName();
    }
}

