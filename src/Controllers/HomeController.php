<?php

namespace Saravana\EmailSuppressor\Controllers;

use Illuminate\Database\Capsule\Manager;
use Saravana\EmailSuppressor\Business\BadMailSuppressor;
use Saravana\EmailSuppressor\Business\FBLSuppressor;
use Saravana\EmailSuppressor\Business\OfferSuppressor;
use Saravana\EmailSuppressor\Business\OptOutSuppressor;
use Saravana\EmailSuppressor\Business\UnsubscribedSuppressor;

class HomeController
{
    public function index()
    {
        $total = Manager::table('data')->count();

        $suppressions = [];

        $suppressors = [
            OfferSuppressor::class,
            UnsubscribedSuppressor::class,
            OptOutSuppressor::class,
            BadMailSuppressor::class,
            FBLSuppressor::class,
        ];
        
        foreach ($suppressors as $suppressor) {            
            if ($suppressor === BadMailSuppressor::class) {
                $badmail_files = ["yabadmail", "yaespbadmail", "complaints"];
                foreach ($badmail_files as &$file) {
                    $class = new $suppressor($file);
                    $suppressions[] = call_user_func([$class, 'process']);
                }
            }
            else {
                $class = new $suppressor();
                $suppressions[] = call_user_func([$class, 'process']);
            }
        }

        return view('home', ['total' => $total, 'suppressions' => $suppressions])->render();
    }
}
