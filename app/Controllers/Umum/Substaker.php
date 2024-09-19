<?php

namespace App\Controllers\Umum;

use App\Controllers\BaseController;
use App\Models\Umum\SubstakerModel;
use CodeIgniter\HTTP\ResponseInterface;

class S extends BaseController
{
    private $indukmodule = 'Sistem';
    private $submodule = 'Umum';
    private $title = 'Substaker';
    private $title2 = 'Tambah User';

    function index()
    {
        $model = new SubstakerModel();
        $data['user'] = $model->getData();
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['view'] = 'umum/substaker/index';
        return view('layout/template', $data);
    }
    function adduser()
    {
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title2;
        $data['subtitle'] = 'Add';
        $data['view'] = 'umum/substaker/adduser';
        return view('layout/template', $data);
    }
    function prosesadduser()
    {
        $SubstakerModel = new SubstakerModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'user_nip' => $this->request->getPost('user_nip'),
            'status' => $this->request->getPost('status'),
        ];

        if ($SubstakerModel->adduser($data)) {
            return redirect()->to(base_url('/substaker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function edituser($id)
    {
        $SubstakerModel = new  SubstakerModel();
        $data['ambilData'] = $SubstakerModel->editData($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['subtitle'] = 'Add';
        $data['view'] = 'umum/substaker/editData';
        return view('layout/template', $data);
    }
    function prosesEditData($id)
    {
        $SubstakerModel = new SubstakerModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
        ];

        if ($SubstakerModel->updateData($id, $data)) {
            return redirect()->to(base_url('/substaker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusData($id)
    {
        $SubstakerModel = new SubstakerModel();
        if ($SubstakerModel->hapusData($id)) {
            return redirect()->to(base_url('/substaker'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
