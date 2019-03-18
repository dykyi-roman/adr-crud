<?php

namespace App\Action\Player;

use App\Domain\Service\PlayerService;
use App\Responder\Response\DeletePlayerResponse;
use Immutable\Exception\ImmutableObjectException;
use Immutable\Exception\InvalidValueException;
use Immutable\ValueObject\Email;
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
            $playerService->delete(new Email($request->get('email', '')));

            return $response->successResponse();
        } catch (ImmutableObjectException | InvalidValueException $exception) {
            return $response->failureResponse(['message' => $exception->getMessage()]);
        }
    }
}
