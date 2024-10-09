<?php

// Init psr-4 autoloading
require_once(__DIR__ . "/vendor/autoload.php");

use Pecee\SimpleRouter\SimpleRouter;

// Load external routes file
require_once(__DIR__ . "/helpers.php");

// Load external routes file
require_once(__DIR__ . "/routes.php");

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

//SimpleRouter::setDefaultNamespace('\Demo\Controllers');

// Start the routing
SimpleRouter::start();
