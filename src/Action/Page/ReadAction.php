<?php

namespace App\Action\Page;

use App\Responder\Response\ResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ReadAction
{
    /**
     * @param ResponderInterface $response
     *
     * @return Response
     *
     * @Route("/player/read", name="read_page")
     */
    public function handle(ResponderInterface $response): Response
    {
        return $response->response('player/read');
    }
}
