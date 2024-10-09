<?php

use Pecee\SimpleRouter\SimpleRouter;
use Saravana\EmailSuppressor\Controllers\HomeController;

SimpleRouter::get('/', [HomeController::class, 'index']);