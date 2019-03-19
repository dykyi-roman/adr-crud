<?php

namespace App\Domain\Event;

use Symfony\Component\EventDispatcher\Event;

final class PlayerEvent extends Event
{
    public const CREATE = 'player.create';
    public const DELETE = 'player.delete';
    public const UPDATE = 'player.update';

    /**
     * Variable
     *
     * @var string |
     */
    private $name;

    /**
     * CreatePlayerEvent constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
