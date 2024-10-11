<?php

// Init psr-4 autoloading

use Illuminate\View\ViewException;

require_once(__DIR__ . "/vendor/autoload.php");

// Load external routes file
require_once(__DIR__ . "/routes.php");

// Load external routes file
require_once(__DIR__ . "/helpers.php");

// Init Database
require_once(__DIR__ . "/database.php");

try {
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    echo $response;
} catch (Exception $ex) {
    throw $ex;
}
