<?php

namespace App\Controllers\Beranda;

use App\Controllers\BaseController;
use App\Models\Beranda\BerandaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Beranda extends BaseController
{
    private $title = 'Beranda';
    
        function index()
    {
        $model = new BerandaModel();
        $data['beranda'] = $model->index();
        $data['title'] = $this->title;
        $data['view'] = 'beranda/index';
        return view('layout/template', $data);
    }
}
