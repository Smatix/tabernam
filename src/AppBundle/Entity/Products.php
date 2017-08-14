<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity (repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Products
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="producer", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $producer;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer", nullable=false)
     * @Assert\NotBlank()
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $image;

    public function setId($idProduct)
    {
        $this->id = $idProduct;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    
    public function setProducer($producer)
    {
        $this->producer = $producer;
    }
    
    public function getProducer()
    {
        return $this->producer;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function setImage($image)
    {
        $this->image = $image;
    }
    
    public function getImage()
    {
        return $this->image;
    }
    
    
}

