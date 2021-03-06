<?php

namespace App\Action\Player;

use App\Domain\Exception\ValidationEmailException;
use App\Domain\Service\PlayerService;
use App\Responder\Response\DeletePlayerResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class DeletePlayer
{
    /**
     * @param Request              $request
     * @param PlayerService        $playerService
     * @param DeletePlayerResponse $response
     *
     * @return JsonResponse
     *
     * @Route("/player/delete/email", name="player_delete_by_email")
     */
    public function handle(Request $request, PlayerService $playerService, DeletePlayerResponse $response): JsonResponse
    {
        try {
            $playerService->delete($request->get('email', ''));

            return $response->successResponse();
        } catch (ValidationEmailException $exception) {
            return $response->failureResponse(['message' => $exception->getMessage()]);
        }
    }
}
