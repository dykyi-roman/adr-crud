<?php

namespace App\Action\Page;

use App\Responder\Response\HtmlResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class IndexAction
{
    /**
     * @param HtmlResponder $response
     *
     * @return Response
     *
     * @Route("/", name="index_page")
     */
    public function handle(HtmlResponder $response): Response
    {
        return $response->response('index/index');
    }
}
