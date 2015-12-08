<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Курс валюты.
 * 
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExchangeRepository")
 * @ORM\Table(name="exchange")
 */
class Exchange
{
    /**
     * @ORM\Id
     * @ORM\Column(name="primaryKey", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $primaryKey;

    /**
     * Валюта1.
     *
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumn(name="`currency1`", referencedColumnName="primaryKey")
     **/
    protected $currency1;
    
    /**
     * Валюта2.
     *
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumn(name="`currency2`", referencedColumnName="primaryKey")
     **/
    protected $currency2;
    
    /**
     * Курс.
     *
     * @ORM\Column(type="decimal", precision=15, scale=2, nullable=false)
     */
    protected $rate;


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
     * Set rate
     *
     * @param string $rate
     *
     * @return Exchange
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set currency1
     *
     * @param \AppBundle\Entity\Currency $currency1
     *
     * @return Exchange
     */
    public function setCurrency1(\AppBundle\Entity\Currency $currency1 = null)
    {
        $this->currency1 = $currency1;

        return $this;
    }

    /**
     * Get currency1
     *
     * @return \AppBundle\Entity\Currency
     */
    public function getCurrency1()
    {
        return $this->currency1;
    }

    /**
     * Set currency2
     *
     * @param \AppBundle\Entity\Currency $currency2
     *
     * @return Exchange
     */
    public function setCurrency2(\AppBundle\Entity\Currency $currency2 = null)
    {
        $this->currency2 = $currency2;

        return $this;
    }

    /**
     * Get currency2
     *
     * @return \AppBundle\Entity\Currency
     */
    public function getCurrency2()
    {
        return $this->currency2;
    }
}

