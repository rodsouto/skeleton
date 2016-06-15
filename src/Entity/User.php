<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="email", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", name="password", length=60)
     */
    private $password;

    /**
     * @ORM\Column(type="string", name="name", length=50)
     */
    private $name;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}