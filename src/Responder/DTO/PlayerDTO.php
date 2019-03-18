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
