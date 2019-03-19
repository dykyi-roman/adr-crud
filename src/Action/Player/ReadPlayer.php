<?php

namespace App\Action\Player;

use App\Domain\Exception\ValidationEmailException;
use App\Domain\Service\PlayerService;
use App\Responder\Response\ReadPlayerResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class ReadPlayer
{
    /**
     * @param Request            $request
     * @param PlayerService      $playerService
     * @param ReadPlayerResponse $response
     *
     * @return JsonResponse
     *
     * @Route("/player/read/email", name="player_read_by_email")
     */
    public function handle(Request $request, PlayerService $playerService, ReadPlayerResponse $response): JsonResponse
    {
        try {
            $player = $playerService->info($request->get('email', ''));

            return $response->successResponse($player->toArray());
        } catch (ValidationEmailException $exception) {
            return $response->failureResponse(['message' => $exception->getMessage()]);
        }
    }
}
