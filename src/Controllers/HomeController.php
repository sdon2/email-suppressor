<?php

namespace Saravana\EmailSuppressor\Controllers;

use Pecee\Http\Request;

class HomeController
{
    public function index()
    {
        return view('home', ['name' => 'Saravana'])->render();
    }
}