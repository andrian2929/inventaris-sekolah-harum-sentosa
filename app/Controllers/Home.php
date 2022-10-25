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

        $homeModel = new \App\Models\HomeModel();
        $unitModel = new \App\Models\UnitModel();


        foreach ($unitModel->getUnit() as $unit) {
            $data['num'][$unit['nama_unit']] = $homeModel->getNum($unit['nama_unit']);
        }




        $data['title'] = 'Dashboard';
        return view('home/index', $data);
    }
}
