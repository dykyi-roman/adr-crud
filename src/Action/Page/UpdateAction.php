<?php

namespace App\Action\Page;

use App\Responder\Response\ResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class UpdateAction
{
    /**
     * @param ResponderInterface $response
     *
     * @return Response
     *
     * @Route("/player/update", name="update_page")
     */
    public function handle(ResponderInterface $response): Response
    {
        return $response->response('player/update');
    }
}
