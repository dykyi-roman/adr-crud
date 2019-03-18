<?php

namespace App\Domain\Service;

use App\Domain\Event\CreatePlayerEvent;
use App\Domain\Exception\PlayerCreateException;
use App\Domain\Repository\PlayerRepository;
use App\Domain\VO\Credentials;
use App\Responder\DTO\PlayerDTO;
use Immutable\Exception\ImmutableObjectException;
use Immutable\Exception\InvalidValueException;
use Immutable\ValueObject\Email;
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
            $this->eventDispatcher->dispatch(CreatePlayerEvent::NAME, new CreatePlayerEvent($credentials->getName()));
        } catch (\Exception $e) {
            throw new PlayerCreateException();
        }
    }

    /**
     * @param Email $email
     *
     * @return PlayerDTO
     *
     * @throws ImmutableObjectException
     * @throws InvalidValueException
     */
    public function getPlayerInfo(Email $email): PlayerDTO
    {
        $payload = $this->playerRepository->getPlayerByEmail($email->getAddress());

        return new PlayerDTO($payload);
    }
}
