<?php

use Illuminate\Contracts\View\View;
use Jenssegers\Blade\Blade;

define('DIR', dirname(__FILE__));

function url($to, $args = [])
{
    global $router;
    return $router->route($to, $args);
}

/**
 * Get blade view for HTML generation
 * @param string $view 
 * @param mixed|null $data 
 * @return View 
 * @throws InvalidArgumentException 
 */
$blade = new Blade(__DIR__ . '/views', __DIR__ . '/cache');
function view(string $view, mixed $data = null): View
{
    global $blade;
    return $blade->make($view, $data);
}
