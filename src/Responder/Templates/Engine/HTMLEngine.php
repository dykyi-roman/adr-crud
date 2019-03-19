<?php

namespace App\Responder\Templates\Engine;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class HTMLEngine
 */
final class HTMLEngine implements EngineInterface
{
    private const TEMPLATE_FOLDER = '/../View/';
    /**
     * Variable
     *
     * @var array |
     */
    private $vars = [];

    /**
     * Renders a view and returns a Response.
     *
     * @param string $view       The view name
     * @param array  $parameters An array of parameters to pass to the view
     *
     * @return Response A Response instance
     *
     * @throws \Exception
     */
    public function render($view, array $parameters = []): string
    {
        $template = __DIR__ . self::TEMPLATE_FOLDER . $view . '.html';

        if (file_exists($template)) {
            ob_start();
            require $template;
            return ob_get_clean();
        }

        throw new \DomainException(sprintf('Template "%s" Not Found', $view));
    }

    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }

    public function __get($name)
    {
        return $this->vars[$name];
    }
}
