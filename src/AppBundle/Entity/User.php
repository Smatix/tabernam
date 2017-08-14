<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"username"},
 *     errorPath="username",
 *     message="login już istnieje"
 * )
 
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Uzupełnij pole.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Imię jest za krótkie",
     *     maxMessage="Imię jest za długie",)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Uzupełnij pole.")
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="Nazwisko jest za krótkie",
     *     maxMessage="Nazwisko jest za długie",)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Uzupełnij pole.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Login jest za krótki",
     *     maxMessage="Login jest za długi",)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Uzupełnij pole.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Hasło jest za krótkie",
     *     maxMessage="Haslo jest za długie",)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Uzupełnij pole.")
     * @Assert\Email(message="Podaj poprawny email.")
     * 
     */
    private $email;
    
     /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    public function __construct()
    {
        $this->isActive = true;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($idUser)
    {
        $this->id = $idUser;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getSurname()
    {
        return $this->surname;
    }
    
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    
    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    
}

