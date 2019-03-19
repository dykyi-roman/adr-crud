<?php

namespace App\Action\Player;

use App\Domain\Exception\PlayerCreateException;
use App\Domain\Exception\ValidationAgeException;
use App\Domain\Exception\ValidationEmailException;
use App\Domain\Service\PlayerService;
use App\Domain\VO\Credentials;
use App\Responder\Response\CreatePlayerResponse;
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
            $playerService->create(
                new Credentials(
                    $request->get('email', ''),
                    $request->get('name', ''),
                    (int)$request->get('age', 0)
                )
            );
        } catch (PlayerCreateException | ValidationEmailException | ValidationAgeException $exception) {
            return $response->failureResponse(['message' => $exception->getMessage()]);
        }

        return $response->successResponse();
    }
}
