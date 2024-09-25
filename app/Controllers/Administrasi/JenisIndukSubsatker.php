<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\JenisIndukSubsatkerModel;
use CodeIgniter\HTTP\ResponseInterface;

class JenisIndukSubsatker extends BaseController
{
    private $indukmodule = 'Sistem';
    private $submodule = 'Subsatker';
    private $title = 'Jenis Induk Subsatker';
    private $subtitle = 'Tambah Jenis Induk Subsatker';
    private $subtitle2 = 'Edit Jenis Induk Subsatker';

    function getJenisIndukSubsatker()
    {
        $model = new JenisIndukSubsatkerModel();
        $data['jenisinduksubsatker'] = $model->getJenisIndukSubsatker();
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/jenisinduksubsatker/index';
        return view('layout/template', $data);
    }
    function addJenisIndukSubsatker()
    {
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['submodule'] = $this->submodule;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/jenisinduksubsatker/addJenisIndukSubsatker';
        return view('layout/template', $data);
    }
    function prosesAddJenisIndukSubsatker()
    {
        $JenisIndukSubsatkerModel = new JenisIndukSubsatkerModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JenisIndukSubsatkerModel->addJenisIndukSubsatker($data)) {
            return redirect()->to(base_url('administrasi/jenis-induk-subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function editJenisIndukSubsatker($id)
    {
        $JenisIndukSubsatkerModel = new JenisIndukSubsatkerModel();
        $data['getJenisIndukSubsatker'] = $JenisIndukSubsatkerModel->editJenisIndukSubsatker($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/jenisinduksubsatker/editJenisIndukSubsatker';
        return view('layout/template', $data);
    }
    function prosesEditJenisIndukSubsatker($id)
    {
        $JenisIndukSubsatkerModel = new JenisIndukSubsatkerModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JenisIndukSubsatkerModel->updateJenisIndukSubsatker($id, $data)) {
            return redirect()->to(base_url('/administrasi/jenis-induk-subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusJenisIndukSubsatker($id)
    {
        $JenisIndukSubsatkerModel = new JenisIndukSubsatkerModel();
        if ($JenisIndukSubsatkerModel->hapusJenisIndukSubsatker($id)) {
            return redirect()->to(base_url('/administrasi/jenis-induk-subsatker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
