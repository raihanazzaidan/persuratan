<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\SifatNaskahModel;
use CodeIgniter\HTTP\ResponseInterface;

class SifatNaskah extends BaseController
{
    private $modul = 'Surat';
    private $title = 'Sifat Naskah';
    private $subtitle = 'Add Sifat Naskah';
    private $subtitle2 = 'Edit Sifat Naskah';

    function getSifatNaskah()
    {
        $SifatNaskahModel = new SifatNaskahModel();
        $data['sifatnaskah'] = $SifatNaskahModel->getSifatNaskah();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'surat/sifatnaskah/index';
        return view('layout/template', $data);
    }
    function addSifatNaskah()
    {
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'surat/sifatnaskah/addSifatNaskah';
        return view('layout/template', $data);
    }
    function prosesAddSifatNaskah()
    {
        $SifatNaskahModel = new SifatNaskahModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($SifatNaskahModel->addSifatNaskah($data)) {
            return redirect()->to(base_url('/surat/sifat-naskah'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function editSifatNaskah($id)
    {
        $SifatNaskahModel = new SifatNaskahModel();
        $data['getSifatNaskah'] = $SifatNaskahModel->editSifatNaskah($id);
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'surat/sifatnaskah/editsifatNaskah';
        return view('layout/template', $data);
    }
    function prosesEditSifatNaskah($id)
    {
        $SifatNaskahModel = new SifatNaskahModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($SifatNaskahModel->updateSifatNaskah($id, $data)) {
            return redirect()->to(base_url('/surat/sifat-naskah'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusSifatNaskah($id)
    {
        $SifatNaskahModel = new SifatNaskahModel();
        if ($SifatNaskahModel->hapusSifatNaskah($id)) {
            return redirect()->to(base_url('/surat/sifat-naskah'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
