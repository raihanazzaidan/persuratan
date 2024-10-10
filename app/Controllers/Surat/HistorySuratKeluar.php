<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\HistoryNaskahKeluarModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\ResponseInterface;

class HistorySuratKeluar extends BaseController
{
    private $modul = 'Surat';
    private $title = 'History Surat Keluar';

    function getSuratKeluar()
    {
        $id = session()->id;
        // print_r($id);
        $NaskahKeluarModel = new HistoryNaskahKeluarModel();
        $data['naskahkeluar'] = $NaskahKeluarModel->getNaskahKeluar_id($id);
        $data['suratmasuk'] = $NaskahKeluarModel->getData_suratMasuk();
        $data['user'] = $NaskahKeluarModel->getData_user();
        $data['subsatker'] = $NaskahKeluarModel->getData_subsatker();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'surat/historyNaskahKeluar/index';
        return view('layout/template', $data);
    }
}
