<?php

namespace App\Domain\Service;

use App\Domain\Event\PlayerEvent;
use App\Domain\Exception\PlayerCreateException;
use App\Domain\Repository\PlayerRepository;
use App\Domain\VO\Credentials;
use App\Responder\DTO\PlayerDTO;
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
     * Variable
     *
     * @var ValidationService |
     */
    private $validationService;

    /**
     * PlayerService constructor.
     *
     * @param ValidationService        $validationService
     * @param PlayerRepository         $playerRepository
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        ValidationService $validationService,
        PlayerRepository $playerRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->playerRepository = $playerRepository;
        $this->eventDispatcher = $eventDispatcher;
        $this->validationService = $validationService;
    }

    /**
     * @param Credentials $credentials
     */
    public function create(Credentials $credentials): void
    {
        $this->validationService->assertEmail($credentials->getEmail());
        try {
            $this->playerRepository->create($credentials);
            $this->eventDispatcher->dispatch(PlayerEvent::CREATE, new PlayerEvent($credentials->getEmail()));
        } catch (\Exception $e) {
            throw new PlayerCreateException();
        }
    }

    /**
     * @param string $email
     *
     * @return PlayerDTO
     */
    public function info(string $email): PlayerDTO
    {
        $this->validationService->assertEmail($email);
        $payload = $this->playerRepository->getPlayerByEmail($email);

        return new PlayerDTO($payload);
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function delete(string $email): bool
    {
        $this->validationService->assertEmail($email);
        if ($status = $this->playerRepository->deletePlayerByEmail($email)) {
            $this->eventDispatcher->dispatch(PlayerEvent::DELETE, new PlayerEvent($email));
        }

        return $status;
    }

    /**
     * @param string $email
     * @param string $name
     *
     * @return bool
     */
    public function update(string $email, string $name): bool
    {
        $this->validationService->assertEmail($email);
        if ($status = $this->playerRepository->changePlayerNameByEmail($email, $name)) {
            $this->eventDispatcher->dispatch(PlayerEvent::UPDATE, new PlayerEvent($email));
        }

        return $status;
    }
}
