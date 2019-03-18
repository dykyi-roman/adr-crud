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

use App\Responder\Templates\Engine\EngineInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HtmlResponder
 *
 * @category Web-project
 * @package  Booi
 * @author   PHP Developer <developer@email.com>
 * @license  https://www.booi.com Booi
 * @link     ****
 */
final class HtmlResponder
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
