<?php

namespace Saravana\EmailSuppressor\Controllers;

use Illuminate\Database\Capsule\Manager;
use Saravana\EmailSuppressor\Business\IdSuppressor;
use Saravana\EmailSuppressor\Business\UnsubscribedSuppressor;

class HomeController
{
    public function index()
    {
        $total = Manager::table('data')->count();

        $suppressions = [];

        $suppressors = [IdSuppressor::class, UnsubscribedSuppressor::class];

        foreach ($suppressors as $suppressor) {
            $suppressions[] = call_user_func([$suppressor, 'process']);
        }

        return view('home', ['total' => $total, 'suppressions' => $suppressions])->render();
    }
}
