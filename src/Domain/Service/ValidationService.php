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

namespace App\Domain\Service;

use App\Domain\Exception\ValidationEmailException;
use Immutable\Exception\ImmutableObjectException;
use Immutable\Exception\InvalidValueException;
use Immutable\ValueObject\Email;

final class ValidationService
{
    /**
     * @param string $email
     */
    public function assertEmail(string $email): void
    {
        try {
            new Email($email);
        } catch (ImmutableObjectException | InvalidValueException $exception) {
            throw new ValidationEmailException();
        }
    }
}
