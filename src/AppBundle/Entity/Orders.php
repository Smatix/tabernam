<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_product", columns={"id_product"})})
 * @ORM\Entity (repositoryClass="AppBundle\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="sum", type="integer", nullable=false)
     */
    private $sum;

    /**
     * @var string
     *
     * @ORM\Column(name="pay", type="text", length=65535, nullable=false)
     */
    private $pay;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="text", length=65535, nullable=false)
     */
    private $adress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="done", type="text", length=65535, nullable=false)
     */
    private $done;

    /**
     * @var \Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Entity\Products
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     * })
     */
    private $idProduct;
    
    
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    
    
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }
    
    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    
    /**
     * @param int $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }
    
    /**
     * @param string $pay
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    }
    
    /**
     * @param string $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }
    
    
    public function setDate($date)
    {
        $this->date = $date;
    }
    
    /**
     * @param string $done
     */
    public function setDone($done)
    {
        $this->done = $done;
    }
}

