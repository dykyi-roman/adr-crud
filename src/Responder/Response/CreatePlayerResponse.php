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

class CreatePlayerResponse extends JsonResponder
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function successResponse(array $data = []): array
    {
        return [];
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function failureResponse(array $data = []): array
    {
        return [];
    }
}
