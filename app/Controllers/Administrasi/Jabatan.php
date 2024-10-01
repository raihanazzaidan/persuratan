<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\JabatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Jabatan extends BaseController
{
    private $modul = 'Administrasi';
    private $title = 'Jabatan';
    private $subtitle = 'Tambah Jabatan';
    private $subtitle2 = 'Edit Jabatan';

    function getJabatan()
    {
        $JabatanModel = new JabatanModel();
        $data['jabatan'] = $JabatanModel->getJabatan();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/jabatan/index';
        return view('layout/template', $data);
    }
    function addJabatan()
    {
        $JabatanModel = new JabatanModel();
        $data['s'] = $JabatanModel->ambil_subsatker();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/jabatan/addJabatan';
        return view('layout/template', $data);
    }
    function prosesAddJabatan()
    {
        $JabatanModel = new JabatanModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'subsatker_id' => $this->request->getPost('subsatker_id'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JabatanModel->addJabatan($data)) {
            return redirect()->to(base_url('/administrasi/jabatan'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function editJabatan($id)
    {
        $JabatanModel = new JabatanModel();
        $data['s'] = $JabatanModel->ambil_subsatker();
        $data['getJabatan'] = $JabatanModel->editJabatan($id);
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/jabatan/editJabatan';
        return view('layout/template', $data);
    }
    function prosesEditJabatan($id)
    {
        $JabatanModel = new JabatanModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'subsatker_id' => $this->request->getPost('subsatker_id'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JabatanModel->updateJabatan($id, $data)) {
            return redirect()->to(base_url('/administrasi/subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusJabatan($id)
    {
        $JabatanModel = new JabatanModel();
        if ($JabatanModel->hapusJabatan($id)) {
            return redirect()->to(base_url('/administrasi/jabatan'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
