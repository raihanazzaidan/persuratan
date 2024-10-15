<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\SuratMasukModel;
use CodeIgniter\HTTP\ResponseInterface;

class SuratMasuk extends BaseController
{
    private $modul = 'Surat';
    private $title = 'Surat Masuk';
    function getSuratMasuk()
    {
        $id = session()->id;
        $SuratMasukModel = new SuratMasukModel();
        $data['naskahmasuk'] = $SuratMasukModel->getNaskahMasuk_id($id);
        // $data['suratmasuk'] = $SuratMasukModel->getData_suratMasuk();
        $data['user'] = $SuratMasukModel->getData_user();
        $data['subsatker'] = $SuratMasukModel->getData_subsatker();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'surat/suratmasuk/index';
        return view('layout/template', $data);
    }
}
