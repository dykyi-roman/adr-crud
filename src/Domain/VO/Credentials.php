<?php
/**
 * PHP file.
 *
 * @category   Web-project
 * @package    Booi
 * @subpackage Null
 * @author     PHP Developer <developer@email.com>
 * @license    https://www.booi.com Booi
 * @version    1.0.0
 * @link       ****
 * @since      1.0.0
 */

namespace App\Domain\VO;

use Immutable\Exception\InvalidValueException;
use Immutable\ValueObject\Email;

final class Credentials
{
    /**
     * Variable
     *
     * @var Email |
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
     * @throws \Immutable\Exception\ImmutableObjectException
     * @throws InvalidValueException
     */
    public function __construct(string $email, string $name, int $age)
    {
        $this->email = new Email($email);
        $this->name = $name;
        $this->age = new Age($age);
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
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
