<?php

use Illuminate\Contracts\View\View;
use Jenssegers\Blade\Blade;

define('DIR', dirname(__FILE__));

/**
 * Get blade view for HTML generation
 * @param string $view 
 * @param mixed|null $data 
 * @return View 
 * @throws InvalidArgumentException 
 */
function view(string $view, mixed $data = null): View
{
    $blade = new Blade(__DIR__ . '/views', __DIR__ . '/cache');
    return $blade->make($view, $data);
}
