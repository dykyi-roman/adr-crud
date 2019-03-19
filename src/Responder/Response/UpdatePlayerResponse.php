<?php
/**
 * PHP file.
 *
 * @category   Web-project
 * @package    Booi
 * @subpackage Null
 * @author     PHP Developer <developer@email.com>
 * @license    https://www.booi.com Booi
 * @version    1.0.0
 * @link       ****
 * @since      1.0.0
 */

namespace App\Responder\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

final class UpdatePlayerResponse extends JsonResponder
{
    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    public function successResponse(array $data = []): JsonResponse
    {
        return new JsonResponse(['message' => 'Player is updated!']);
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
