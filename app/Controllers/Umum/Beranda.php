<?php

namespace App\Controllers\Umum;

use App\Controllers\BaseController;
use App\Models\Umum\BerandaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Beranda extends BaseController
{

    public function __construct()
    {
        helper('form');  // Load helper form
    }

    private $indukmodule = 'Sistem';
    private $submodule = 'Umum';
    private $title = 'User';
    private $subtitle = 'Tambah User';
    private $subtitle2 = 'Edit User';

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
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'umum/beranda/adduser';
        return view('layout/template', $data);
    }
    function prosesadduser()
    {
        $BerandaModel = new BerandaModel();
        
        // Ambil data dari form
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'user_nip' => $this->request->getPost('user_nip'),
            'status_user' => $this->request->getPost('status_user'),
        ];

        // Panggil fungsi adduser dari model
        if ($BerandaModel->adduser($data)) {
            return redirect()->to(base_url('/beranda'))->with('message', 'User berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan user');
        }
    }
    function edituser($id)
    {
        $BerandaModel = new  BerandaModel();
        $data['getdata'] = $BerandaModel->edituser($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['subtitle'] = 'Add';
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'umum/beranda/edituser';
        return view('layout/template', $data);
    }
    function prosesedituser($id)
    {
        $BerandaModel = new BerandaModel();
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'user_nip' => $this->request->getPost('user_nip'),
            'status_user' => $this->request->getPost('status_user'),
        ];

        if ($BerandaModel->updateuser($id, $data)) {
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapususer($id)
    {
        $BerandaModel = new BerandaModel();
        if ($BerandaModel->hapususer($id)) {
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
