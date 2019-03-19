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
