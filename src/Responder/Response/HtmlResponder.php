<?php

namespace App\Responder\Response;

use App\Responder\Templates\Engine\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HtmlResponder
 */
final class HtmlResponder implements ResponderInterface
{

    /**
     * Variable
     *
     * @var Response |
     */
    private $response;

    /**
     * Variable
     *
     * @var EngineInterface |
     */
    private $template;

    /**
     * AbstractResponder constructor.
     *
     * @param Response        $response
     * @param EngineInterface $template
     */
    public function __construct(Response $response, EngineInterface $template)
    {
        $this->response = $response;
        $this->template = $template;
    }

    /**
     * @param string $view
     * @param array  $data
     *
     * @return Response
     */
    public function response(string $view, array $data = []): Response
    {
        try {
            $this->response->setContent($this->template->render($view, $data));
        } catch (\DomainException $exception) {
            throw new \RuntimeException($exception->getMessage());
        }

        return $this->response->send();
    }
}
