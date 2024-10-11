<?php

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

use Saravana\EmailSuppressor\Controllers\HomeController;

$router->get(['/', 'home'], [HomeController::class, 'index']);
