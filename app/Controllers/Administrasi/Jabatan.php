<?php

namespace App\Controllers\Umum;

use App\Controllers\BaseController;
use App\Models\Jabatan\JabatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Jabatan extends BaseController
{
    private $indukmodule = 'Sistem';
    private $submodule = 'Jabatan';
    private $title = 'Jabatan';
    private $subtitle = 'Tambah Jabatan';
    private $subtitle2 = 'Edit Jabatan';

    function getJabatan()
    {
        $model = new JabatanModel();
        $data['Jabatan'] = $model->getJabatan();
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['view'] = 'umum/jabatan/jabatan';
        return view('layout/template', $data);
    }
    function addJabatan()
    {
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['submodule'] = $this->submodule;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'umum/jabatan/addJabatan';
        return view('layout/template', $data);
    }
    function prosesAddJabatan()
    {
        $JabatanModel = new JabatanModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_induk_subsatker' => $this->request->getPost('jenis_induk_subsatker'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JabatanModel->addSubsatker($data)) {
            return redirect()->to(base_url('/subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function editJabatan($id)
    {
        $JabatanModel = new JabatanModel();
        $data['getSubsatker'] = $JabatanModel->editJabatan($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'umum/subsatker/editSubsatker';
        return view('layout/template', $data);
    }
    function prosesEditJabatan($id)
    {
        $JabatanModel = new JabatanModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JabatanModel->updateJabatan($id, $data)) {
            return redirect()->to(base_url('/subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusJabatan($id)
    {
        $JabatanModel = new JabatanModel();
        if ($JabatanModel->hapusJabatan($id)) {
            return redirect()->to(base_url('/jabatan'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
