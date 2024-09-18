<?php

namespace App\Controllers\Umum;

use App\Controllers\BaseController;
use App\Models\Umum\BerandaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Beranda extends BaseController
{
    private $indukmodule = 'Sistem';
    private $submodule = 'Umum';
    private $title = 'Beranda';
    private $title2 = 'Tambah User';

    function index()
    {
        $model = new BerandaModel();
        $data['user'] = $model->getData();
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['view'] = 'umum/beranda/index';
        return view('layout/template', $data);
    }
    function adduser()
    {
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title2;
        $data['subtitle'] = 'Add';
        $data['view'] = 'umum/beranda/adduser';
        return view('layout/template', $data);
    }
    function prosesadduser()
    {
        $BerandaModel = new BerandaModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'user_nip' => $this->request->getPost('user_nip'),
            'status' => $this->request->getPost('status'),
        ];

        if ($BerandaModel->adduser($data)) {
            return redirect()->to(base_url('/beranda'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function editData($id)
    {
        $BerandaModel = new  BerandaModel();
        $data['ambilData'] = $BerandaModel->editData($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['subtitle'] = 'Add';
        $data['view'] = 'umum/beranda/editData';
        return view('layout/template', $data);
    }
    function prosesEditData($id)
    {
        $BerandaModel = new BerandaModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
        ];

        if ($BerandaModel->updateData($id, $data)) {
            return redirect()->to(base_url('/beranda'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusData($id)
    {
        $BerandaModel = new BerandaModel();
        if ($BerandaModel->hapusData($id)) {
            return redirect()->to(base_url('/beranda'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
