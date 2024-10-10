<?php

use Illuminate\Database\Capsule\Manager as Capsule;

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

function initDatabase()
{
    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'mail_empower',
        'username'  => 'root',
        'password'  => 'root',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    // $capsule->setEventDispatcher(new Dispatcher(new Container));

    // Set the fetch mode for database results
    $capsule->setFetchMode(PDO::FETCH_OBJ);

    // Make this Capsule instance available globally via static methods
    $capsule->setAsGlobal();

    // Setup the Eloquent ORM.
    // $capsule->bootEloquent();
}

initDatabase();