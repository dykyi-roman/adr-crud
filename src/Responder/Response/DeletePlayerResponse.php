<?php

namespace App\Responder\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

final class DeletePlayerResponse extends JsonResponder
{
    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    public function successResponse(array $data = []): JsonResponse
    {
        return new JsonResponse(['message' => 'Player is deleted!']);
    }

    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    public function failureResponse(array $data = []): JsonResponse
    {
        return new JsonResponse(['message' => $data['message']]);
    }
}
