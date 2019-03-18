<?php

namespace App\Domain\Entity;

use App\Domain\VO\Credentials;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\PlayerRepository")
 */
final class Player
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=80)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $age;


    public function isNullObject(): bool
    {
        return $this->id === null;
    }

    /**
     * @param Credentials $credentials
     */
    public function setCredentials(Credentials $credentials): void
    {
        $this->name = $credentials->getName();
        $this->email = $credentials->getEmail()->getAddress();
        $this->age = $credentials->getAge()->getAge();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
