<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
    }
    public function index()
    {
        if (!(session()->get('nama'))) :

            header('Location: /login');
            die();
        endif;

        $data = ['title' => 'Dashboard'];
        return view('home/index', $data);
    }
}
