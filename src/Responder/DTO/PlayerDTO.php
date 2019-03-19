<?php

namespace App\Responder\DTO;

use App\Domain\Entity\Player;

final class PlayerDTO
{
    /**
     * Variable
     *
     * @var Player |
     */
    private $entity;

    public function __construct(Player $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->entity->getName(),
            'email' => $this->entity->getEmail(),
            'age' => $this->entity->getAge(),
        ];
    }
}
