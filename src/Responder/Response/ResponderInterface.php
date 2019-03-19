<?php

namespace App\Responder\Response;

use Symfony\Component\HttpFoundation\Response;

interface ResponderInterface
{
    /**
     * @param string $view
     * @param array  $data
     *
     * @return Response
     */
    public function response(string $view, array $data = []): Response;
}
