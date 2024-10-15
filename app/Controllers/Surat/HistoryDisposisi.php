<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\HistoryDisposisiModel;
use CodeIgniter\HTTP\ResponseInterface;

class HistoryDisposisi extends BaseController
{
    private $modul = 'Surat';
    private $title = 'History Disposisi';

    public function index()
    {
        $id = session()->id;
        $historyDisposisiModel = new HistoryDisposisiModel();
        $data['historyDisposisi'] = $historyDisposisiModel->getHistoryDisposisi($id);
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'surat/suratdisposisi/historydisposisi';
        return view('layout/template', $data);
    }
}
