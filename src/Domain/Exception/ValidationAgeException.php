<?php

namespace App\Domain\Exception;

use Throwable;

final class ValidationAgeException extends \RuntimeException
{
    private const MESSAGE = 'Age is not valid!';

    /**
     * PlayerCreateException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = self::MESSAGE, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
