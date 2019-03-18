<?php

namespace App\Action\Player;

use App\Domain\Service\PlayerService;
use App\Domain\VO\Credentials;
use App\Domain\Exception\PlayerCreateException;
use App\Responder\Response\CreatePlayerResponse;
use Immutable\Exception\ImmutableObjectException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

final class CreatePlayer
{
    /**
     * @param Request              $request
     * @param PlayerService        $playerService
     * @param CreatePlayerResponse $response
     *
     * @return array
     *
     * @Route("/player/create/post", name="playercreate")
     */
    public function handle(Request $request, PlayerService $playerService, CreatePlayerResponse $response): array
    {
        try {
            $playerService->createNewPlayer(
                new Credentials(
                    $request->get('email', ''),
                    $request->get('name', ''),
                    $request->get('age', 0)
                )
            );

            return $response->successResponse();
        } catch (PlayerCreateException $exception) {
            return $response->failureResponse();
        } catch (ImmutableObjectException $exception) {
            return $response->failureResponse();
        }
    }
}
