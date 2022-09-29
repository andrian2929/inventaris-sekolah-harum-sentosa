<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        if (!(session()->get('nama'))) :
            header('Location: /login');
            die();
        endif;
    }
    public function index()
    {


        $data = ['title' => 'Dashboard'];
        return view('home/index', $data);
    }
}
