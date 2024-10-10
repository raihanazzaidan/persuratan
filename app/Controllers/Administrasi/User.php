<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\UserModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{

    public function __construct()
    {
        helper('form');  // Load helper form
    }

    private $modul = 'Administrasi';
    private $title = 'User';
    private $subtitle = 'Tambah User';
    private $subtitle2 = 'Edit User';

    function getuser()
    {
        $model = new UserModel();
        $data['user'] = $model->getData();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/user/index';
        return view('layout/template', $data);
    }
    function adduser()
    {
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/user/adduser';
        return view('layout/template', $data);
    }
    function prosesadduser()
    {
        $UserModel = new UserModel();
        $uuid =  Uuid::uuid4()->toString();
        $createdAt = gmdate("Y-m-d H:i:s", time() + 25200);
        // Ambil data dari form
        $data = [
            'id' =>  $uuid,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'user_nip' => $this->request->getPost('user_nip'),
            'status_user' => $this->request->getPost('status_user'),
            'createdAt' => $createdAt,
        ];

        // Panggil fungsi adduser dari model
        if ($UserModel->adduser($data)) {
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
        return redirect()->to(base_url('/administrasi/user/'))->with('message', 'User berhasil ditambahkan');
    }

    function edituser($id)
    {
        $UserModel = new  UserModel();
        $data['getdata'] = $UserModel->edituser($id);
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/user/edituser';
        return view('layout/template', $data);
    }
    function prosesedituser($id)
    {
        $UserModel = new UserModel();
        $updatedAt = gmdate("Y-m-d H:i:s", time() + 25200);
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'user_nip' => $this->request->getPost('user_nip'),
            'status_user' => $this->request->getPost('status_user'),
            'updatedAt' => $updatedAt,
        ];

        if ($UserModel->updateuser($id, $data)) {
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
        return redirect()->to(base_url('/administrasi/user/'));
    }

    function hapususer($id)
    {
        $UserModel = new UserModel();
        if ($UserModel->hapususer($id)) {
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
        return redirect()->to(base_url('/administrasi/user/'));
    }
}