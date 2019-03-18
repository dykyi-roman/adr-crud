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

namespace App\Responder\Templates\Engine;

/**
 * Interface EngineInterface
 * @package App\Index\Responder
 */
interface EngineInterface
{
    /**
     * Renders a view and returns a Response.
     *
     * @param string $view       The view name
     * @param array  $parameters An array of parameters to pass to the view
     *
     * @return string
     *
     * @throws \RuntimeException if the template cannot be rendered
     */
    public function render($view, array $parameters = array()): string;
}
