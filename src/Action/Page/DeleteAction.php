<?php

namespace App\Action\Page;

use App\Responder\Response\HtmlResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DeleteAction
{
    /**
     * @param HtmlResponder $response
     *
     * @return Response
     *
     * @Route("/player/delete", name="delete_page")
     */
    public function handle(HtmlResponder $response): Response
    {
        return $response->response('player/delete');
    }
}
