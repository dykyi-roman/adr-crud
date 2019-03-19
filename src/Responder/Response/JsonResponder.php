<?php

namespace App\Responder\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class HtmlResponder
 */
abstract class JsonResponder extends JsonResponse
{
    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    abstract public function successResponse(array $data = []): JsonResponse;

    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    abstract public function failureResponse(array $data = []): JsonResponse;
}
