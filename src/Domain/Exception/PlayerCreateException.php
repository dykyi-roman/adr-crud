<?php

namespace App\Domain\Exception;

use Throwable;

final class PlayerCreateException extends \RuntimeException
{
    private const MESSAGE = 'Can`t create player';

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
