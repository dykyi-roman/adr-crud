<?php

namespace App\Action\Player;

use App\Domain\Exception\ValidationEmailException;
use App\Domain\Service\PlayerService;
use App\Responder\Response\UpdatePlayerResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class UpdatePlayer
{
    /**
     * @param Request              $request
     * @param PlayerService        $playerService
     * @param UpdatePlayerResponse $response
     *
     * @return JsonResponse
     *
     * @Route("/player/update/post", name="player_update")
     */
    public function handle(Request $request, PlayerService $playerService, UpdatePlayerResponse $response): JsonResponse
    {
        try {
            $playerService->update(
                $request->get('email', ''),
                $request->get('name', '')
            );
        } catch (ValidationEmailException $exception) {
            return $response->failureResponse(['message' => $exception->getMessage()]);
        }

        return $response->successResponse();
    }
}
