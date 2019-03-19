<?php

namespace App\Action\Page;

use App\Responder\Response\ResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class IndexAction
{
    /**
     * @param ResponderInterface $response
     *
     * @return Response
     *
     * @Route("/", name="index_page")
     */
    public function handle(ResponderInterface $response): Response
    {
        return $response->response('index/index');
    }
}
