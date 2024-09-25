<?php

namespace App\Controllers\Jabatan;

use App\Controllers\BaseController;
use App\Models\Subsatker\SubsatkerModel;
use CodeIgniter\HTTP\ResponseInterface;

class Subsatker extends BaseController
{
    private $indukmodule = 'Sistem';
    private $submodule = 'Subsatker';
    private $title = 'Subsatker';
    private $subtitle = 'Tambah Subsatker';
    private $subtitle2 = 'Edit Subsatker';

    function getSubsatker()
    {
        $model = new SubsatkerModel();
        $data['subsatker'] = $model->getSubsatker();
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['view'] = 'umum/subsatker/subsatker';
        return view('layout/template', $data);
    }
    function addSubsatker()
    {
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['submodule'] = $this->submodule;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'umum/subsatker/addSubsatker';
        return view('layout/template', $data);
    }
    function prosesAddSubsatker()
    {
        $SubsatkerModel = new SubsatkerModel();
        $data = [
            'kode_subsatker' => $this->request->getPost('kode_subsatker'),
            'nama_subsatker' => $this->request->getPost('nama_subsatker'),
            'jenis_induk_subsatker' => $this->request->getPost('jenis_induk_subsatker'),
            'status' => $this->request->getPost('status'),
        ];

        if ($SubsatkerModel->addSubsatker($data)) {
            return redirect()->to(base_url('/subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function editSubsatker($id)
    {
        $SubsatkerModel = new SubsatkerModel();
        $data['getSubsatker'] = $SubsatkerModel->editSubsatker($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'umum/subsatker/editSubsatker';
        return view('layout/template', $data);
    }
    function prosesEditSubsatker($id)
    {
        $SubstakerModel = new SubsatkerModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($SubstakerModel->updateSubsatker($id, $data)) {
            return redirect()->to(base_url('/subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusSubsatker($id)
    {
        $SubsatkerModel = new SubsatkerModel();
        if ($SubsatkerModel->hapusSubsatker($id)) {
            return redirect()->to(base_url('/subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
