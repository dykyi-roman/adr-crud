<?php

namespace App\Domain\VO;

use App\Domain\Exception\ValidationEmailException;
use Immutable\Exception\ImmutableObjectException;
use Immutable\Exception\InvalidValueException;

final class Credentials
{
    /**
     * Variable
     *
     * @var string |
     */
    private $email;
    /**
     * Variable
     *
     * @var string |
     */
    private $name;
    /**
     * Variable
     *
     * @var Age |
     */
    private $age;

    /**
     * Credentials constructor.
     *
     * @param string $email
     * @param string $name
     * @param int    $age
     *
     */
    public function __construct(string $email, string $name, int $age)
    {
        $this->name = $name;
        $this->email = $email;
        $this->setAge($age);
    }

    /**
     * @param int $age
     *
     */
    private function setAge(int $age): void
    {
        try {
            $this->age = new Age($age);
        } catch (ImmutableObjectException | InvalidValueException $exception) {
            throw new ValidationEmailException();
        }
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Age
     */
    public function getAge(): Age
    {
        return $this->age;
    }
}
