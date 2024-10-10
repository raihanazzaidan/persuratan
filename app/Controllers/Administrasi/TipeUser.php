<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\TipeUserModel;
use Ramsey\Uuid\Uuid;
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
        $data['tipeuser'] = $TipeUserModel->getTipeUser();
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/tipeuser/index';
        return view('layout/template', $data);
    }
    function addTipeUser()
    {
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/tipeuser/addTipeUser';
        return view('layout/template', $data);
    }
    function prosesAddTipeUser()
    {
        $uuid =  Uuid::uuid4()->toString();
        $TipeUserModel = new TipeUserModel();
        $data = [
            'id' => $uuid,
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($TipeUserModel->addTipeUser($data)) {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Data berhasil ditambahkan',
                    'icon' => 'success',
                ],
            ];
        } else {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Gagal menambahkan data',
                    'icon' => 'warning',
                ],
            ];
        }
        session()->setFlashdata($sessFlashdata);
        return redirect()->to(base_url('/administrasi/tipe-user'));
    }
    function editTipeUser($id)
    {
        $TipeUserModel = new TipeUserModel();
        $data['getTipeUser'] = $TipeUserModel->editTipeUser($id);
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

        if ($TipeUserModel->updateTipeUser($id, $data)) {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Data berhasil diubah',
                    'icon' => 'success',
                ],
            ];
        } else {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Gagal mengubah data',
                    'icon' => 'warning',
                ],
            ];
        }
        session()->setFlashdata($sessFlashdata);
        return redirect()->to(base_url('/administrasi/tipe-user'));
    }
    function hapusTipeUser($id)
    {
        $TipeUserModel = new TipeUserModel();
        if ($TipeUserModel->hapusTipeUser($id)) {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Data berhasil dihapus',
                    'icon' => 'success',
                ],
            ];
        } else {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Gagal menghapus data',
                    'icon' => 'warning',
                ],
            ];
        }
        session()->setFlashdata($sessFlashdata);
        return redirect()->to(base_url('/administrasi/tipe-user'));
    }
}
