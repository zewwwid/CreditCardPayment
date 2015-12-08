<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Заказ.
 * 
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderRepository")
 * @ORM\Table(name="orders")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(name="primaryKey", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $primaryKey;

    /**
     * Номер заказа.
     *
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotNull(message = "Не может быть пустым.")
     * @Assert\Regex(
     *     pattern="/^\d+$/",
     *     match=false,
     *     message="Должен быть целым положительнм."
     * )
     * @Assert\Range(min = 0, minMessage = "Должен быть целым положительнм.")
     */
    protected $code;

    /**
     * Стоимость заказа.
     *
     * @ORM\Column(type="decimal", precision=15, scale=2, nullable=false)
     * @Assert\NotNull(message = "Не может быть пустым.")
     * @Assert\Type(type="decimal", message = "Неверный формат.")
     * @Assert\Range(min = 0, minMessage = "Должен быть целым положительнм.")
     */
    protected $summa;
    
    /**
     * Валюта заказа.
     *
     * @ORM\ManyToOne(targetEntity="Currency", inversedBy="orders")
     * @ORM\JoinColumn(name="`currency`", referencedColumnName="primaryKey")
     * @Assert\NotNull(message = "Не может быть пустым.")
     **/
    protected $currency;
    
    /**
     * Номер карты.
     *
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\NotNull(message = "Не может быть пустым.")
     * @Assert\Length(
     *      min = 13, max = 19, 
     *      minMessage = "Допустимая длина от 13 до 19 символов.", 
     *      maxMessage = "Допустимая длина от 13 до 19 символов."
     * )
     * @Assert\Regex(
     *     pattern="/^\d+$/",
     *     match=true,
     *     message="Может содержать только цыфры."
     * )
     */
    protected $cardNumber;

    /**
     * Владелец карты.
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotNull(message = "Не может быть пустым.")
     * @Assert\Length(
     *      max = 100, 
     *      maxMessage = "Максимальная длина 100 символов."
     * )
     */
    protected $cardOwner;
    
    /**
     * Месц срока годности.
     *
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotNull(message = "Не может быть пустым.")
     * @Assert\Range(
     *      min = 1, max = 12,
     *      minMessage = "Допустимый диапазон от 1 до 12.",
     *      maxMessage = "Допустимый диапазон от 1 до 12."
     * )
     * @Assert\Regex(
     *     pattern="/^\d+$/",
     *     match=true,
     *     message="Неверный формат."
     * )
     */
    protected $cardMonth;
    
    /**
     * Год срока годности.
     *
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotNull(message = "Не может быть пустым.")
     * @Assert\Range(
     *      min = 0, max = 99,
     *      minMessage = "Допустимый диапазон от 0 до 99.",
     *      maxMessage = "Допустимый диапазон от 0 до 99."
     * )
     * @Assert\Regex(
     *     pattern="/^\d+$/",
     *     match=true,
     *     message="Неверный формат."
     * )
     */
    protected $cardYear;
    
    /**
     * CVV2/CVC2.
     * 
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotNull(message = "Не может быть пустым.")
     * @Assert\Regex(
     *     pattern="/^\d+$/",
     *     match=true,
     *     message="Может содержать только цыфры."
     * )
     * @Assert\Length(
     *      min = 3, max = 4,
     *      minMessage = "Допустимая длина от 3 до 4 символов.", 
     *      maxMessage = "Допустимая длина от 3 до 4 символов."
     * )
     */
    protected $cvv;


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
     * Set code
     *
     * @param integer $code
     *
     * @return Order
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set summa
     *
     * @param string $summa
     *
     * @return Order
     */
    public function setSumma($summa)
    {
        $this->summa = $summa;

        return $this;
    }

    /**
     * Get summa
     *
     * @return string
     */
    public function getSumma()
    {
        return $this->summa;
    }

    /**
     * Set cardNumber
     *
     * @param string $cardNumber
     *
     * @return Order
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set cardOwner
     *
     * @param string $cardOwner
     *
     * @return Order
     */
    public function setCardOwner($cardOwner)
    {
        $this->cardOwner = $cardOwner;

        return $this;
    }

    /**
     * Get cardOwner
     *
     * @return string
     */
    public function getCardOwner()
    {
        return $this->cardOwner;
    }

    /**
     * Set cardMonth
     *
     * @param integer $cardMonth
     *
     * @return Order
     */
    public function setCardMonth($cardMonth)
    {
        $this->cardMonth = $cardMonth;

        return $this;
    }

    /**
     * Get cardMonth
     *
     * @return integer
     */
    public function getCardMonth()
    {
        return $this->cardMonth;
    }

    /**
     * Set cardYear
     *
     * @param integer $cardYear
     *
     * @return Order
     */
    public function setCardYear($cardYear)
    {
        $this->cardYear = $cardYear;

        return $this;
    }

    /**
     * Get cardYear
     *
     * @return integer
     */
    public function getCardYear()
    {
        return $this->cardYear;
    }

    /**
     * Set cvv
     *
     * @param integer $cvv
     *
     * @return Order
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }

    /**
     * Get cvv
     *
     * @return integer
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Set currency
     *
     * @param \AppBundle\Entity\Currency $currency
     *
     * @return Order
     */
    public function setCurrency(\AppBundle\Entity\Currency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \AppBundle\Entity\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}

