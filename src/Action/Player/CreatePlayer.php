<?php

namespace App\Action\Player;

use App\Domain\Exception\PlayerCreateException;
use App\Domain\Service\PlayerService;
use App\Domain\VO\Credentials;
use App\Responder\Response\CreatePlayerResponse;
use Immutable\Exception\ImmutableObjectException;
use Immutable\Exception\InvalidValueException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class CreatePlayer
{
    /**
     * @param Request              $request
     * @param PlayerService        $playerService
     * @param CreatePlayerResponse $response
     *
     * @return JsonResponse
     *
     * @Route("/player/create/post", name="player_create")
     */
    public function handle(Request $request, PlayerService $playerService, CreatePlayerResponse $response): JsonResponse
    {
        try {
            $playerService->createNewPlayer(
                new Credentials(
                    $request->get('email', ''),
                    $request->get('name', ''),
                    (int)$request->get('age', 0)
                )
            );
        } catch (PlayerCreateException $exception) {
            return $response->failureResponse(['message' => $exception->getMessage()]);
        } catch (ImmutableObjectException | InvalidValueException $exception) {
            return $response->failureResponse(['message' => $exception->getMessage()]);
        }

        return $response->successResponse();
    }
}
