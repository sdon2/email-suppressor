<?php

namespace Saravana\EmailSuppressor\Controllers;

use Illuminate\Database\Capsule\Manager;
use Saravana\EmailSuppressor\Business\IdSuppressor;

class HomeController
{
    public function index()
    {
        $total = Manager::table('data')->count();

        $id_file = fopen(DIR . "/data/316suppression.txt", "r");

        $supressions['id'] = ['count' => 0, 'suppressed' => 0];

        while ($line = trim(fgets($id_file))) {
            $supressions['id']['count']++;
            if (IdSuppressor::suppress($line)) {
                $supressions['id']['suppressed']++;
            }
        }

        return view('home', ['total' => $total, 'suppressions' => $supressions])->render();
    }
}
