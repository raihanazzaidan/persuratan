<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\TipeUserModel;
use CodeIgniter\HTTP\ResponseInterface;

class TipeUser extends BaseController
{
    private $indukmodule = 'Administrasi';
    private $title = 'Tipe User';
    private $subtitle = 'Tambah Tipe User';
    private $subtitle2 = 'Edit Tipe User';

    public function getTipeUser()
    {
        $TipeUserModel = new TipeUserModel();
        $data['tipeuser'] = $TipeUserModel->gettipeuser();
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/tipeuser/index';
        return view('layout/template', $data);
    }
    function addTipeUser()
    {
        $TipeUserModel = new TipeUserModel();
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/tipeuser/addTipeUser';
        return view('layout/template', $data);
    }
    function prosesAddTipeUser()
    {
        $TipeUserModel = new TipeUserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($TipeUserModel->addtipeuser($data)) {
            return redirect()->to(base_url('administrasi/tipe-user'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function editTipeUser($id)
    {
        $TipeUserModel = new TipeUserModel();
        $data['getTipeUser'] = $TipeUserModel->edittipeuser($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/tipeuser/editTipeUser';
        return view('layout/template', $data);
    }
    function prosesEditTipeUser($id)
    {
        $TipeUserModel = new TipeUserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($TipeUserModel->updatetipeuser($id, $data)) {
            return redirect()->to(base_url('/administrasi/tipeuser'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusTipeUser($id)
    {
        $TipeUserModel = new TipeUserModel();
        if ($TipeUserModel->hapustipeuser($id)) {
            return redirect()->to(base_url('/administrasi/tipeuser'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
