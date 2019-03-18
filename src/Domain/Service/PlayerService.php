<?php

namespace App\Domain\Service;

use App\Domain\Event\CreatePlayerEvent;
use App\Domain\Repository\PlayerRepository;
use App\Domain\VO\Credentials;
use App\Domain\Exception\PlayerCreateException;
use Doctrine\ORM\ORMException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class PlayerService
 *
 * @category Web-project
 * @package  Booi
 * @author   PHP Developer <developer@email.com>
 * @license  https://www.booi.com Booi
 * @link     ****
 */
final class PlayerService
{
    /**
     * Variable
     *
     * @var PlayerRepository |
     */
    private $playerRepository;
    /**
     * Variable
     *
     * @var EventDispatcherInterface |
     */
    private $eventDispatcher;

    /**
     * PlayerService constructor.
     *
     * @param PlayerRepository         $playerRepository
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(PlayerRepository $playerRepository, EventDispatcherInterface $eventDispatcher)
    {
        $this->playerRepository = $playerRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param Credentials $credentials
     */
    public function createNewPlayer(Credentials $credentials): void
    {
        try {
            $this->playerRepository->create($credentials);

            $this->eventDispatcher->dispatch(
                new CreatePlayerEvent($credentials->getName())
            );

        } catch (ORMException $e) {
            throw new PlayerCreateException();
        }
    }
}
