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

/**
 * Class HtmlResponder
 *
 * @category Web-project
 * @package  Booi
 * @author   PHP Developer <developer@email.com>
 * @license  https://www.booi.com Booi
 * @link     ****
 */
abstract class JsonResponder extends JsonResponse
{
    abstract public function successResponse(array $data = []): JsonResponse;

    abstract public function failureResponse(array $data = []): JsonResponse;
}
