<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\UserRoleModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserRole extends BaseController
{
    private $modul = 'Administrasi';
    private $title = 'User Role';
    private $subtitle = 'Tambah User Role';
    private $subtitle2 = 'Edit User Role';

    function getUserRole()
    {
        $UserRoleModel = new UserRoleModel();
        $data['userrole'] = $UserRoleModel->getUserRole();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/userrole/index';
        return view('layout/template', $data);
    }
    function addUserRole()
    {
        $UserRoleModel = new UserRoleModel();
        $data['user'] = $UserRoleModel->ambil_data_user();
        $data['hakakses'] = $UserRoleModel->ambil_data_hakakses();
        $data['jabatan'] = $UserRoleModel->ambil_data_jabatan();
        $data['grupjabatan'] = $UserRoleModel->ambil_data_grupjabatan();
        $data['tipeuser'] = $UserRoleModel->ambil_data_tipeuser();
        $data['subsatker'] = $UserRoleModel->ambil_data_subsatker();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/userrole/adduserrole';
        return view('layout/template', $data);
    }

    function pilihuser()
    {
        $UserRoleModel = new UserRoleModel();
        $id_user = $this->request->getPost('pilihuser');
        $ambildataUser = $UserRoleModel->ambil_data_user_byid($id_user);
        // print_r($ambildataUser);
        $data = [
            'id_user' => $ambildataUser[0]->id,
            'nama_user' => $ambildataUser[0]->nama_lengkap,
            'email_user' => $ambildataUser[0]->email
        ];
        session()->set($data);
        $sessFlashdata = [
            'sweetAlert' => [
                'message' => 'Berhasil memilih user',
                'icon' => 'success',
            ],
        ];
        session()->setFlashdata($sessFlashdata);
        return redirect()->to('administrasi/user-role/adduserrole/');
    }

    function hapus_session_pilih_user()
    {
        $session = session();
        $session->remove(['id_user', 'nama_user', 'email_user']);
        $sessFlashdata = [
            'sweetAlert' => [
                'message' => 'Berhasil membatalkan pilih user',
                'icon' => 'success',
            ],
        ];
        session()->setFlashdata($sessFlashdata);
        return redirect()->to('administrasi/user-role/adduserrole');
    }

    function prosesAddUserRole()
    {
        $UserRoleModel = new UserRoleModel();
        $data = [
            'usr_id' => $this->request->getPost('usr_id'),
            'usg_level' => $this->request->getPost('usg_level'),
            'jabatan_id' => $this->request->getPost('jabatan_id'),
            'jabatan_grup_id' => $this->request->getPost('jabatan_grup_id'),
            'usertipe_id' => $this->request->getPost('usertipe_id'),
            'subsatker_id' => $this->request->getPost('subsatker_id'),
        ];
        if ($UserRoleModel->addUserRole($data)) {
            $session = session();
            $session->remove(['id_user', 'nama_user', 'email_user']);
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
        return redirect()->to(base_url('/administrasi/user-role/'))->with('message', 'User berhasil ditambahkan');
    }
    function editUserRole($id)
    {
        $UserRoleModel = new  UserRoleModel();
        // $data['getuserrole_byid'] = $UserRoleModel->getUserRole_byid($id);
        $data['getuserrole'] = $UserRoleModel->editUserRole($id);
        $data['user'] = $UserRoleModel->ambil_data_user();
        $data['hakakses'] = $UserRoleModel->ambil_data_hakakses();
        $data['jabatan'] = $UserRoleModel->ambil_data_jabatan();
        $data['grupjabatan'] = $UserRoleModel->ambil_data_grupjabatan();
        $data['tipeuser'] = $UserRoleModel->ambil_data_tipeuser();
        $data['subsatker'] = $UserRoleModel->ambil_data_subsatker();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/userrole/edituserrole';
        return view('layout/template', $data);
        // print_r($data['getuserrole']);
    }
    function prosesEditUserRole($id)
    {
        $UserRoleModel = new UserRoleModel();
        $data = [
            'usg_level' => $this->request->getPost('usg_level'),
            'jabatan_id' => $this->request->getPost('jabatan_id'),
            'jabatan_grup_id' => $this->request->getPost('jabatan_grup_id'),
            'usertipe_id' => $this->request->getPost('usertipe_id'),
            'subsatker_id' => $this->request->getPost('subsatker_id'),
        ];

        if ($UserRoleModel->updateUserRole($id, $data)) {
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
        return redirect()->to(base_url('/administrasi/user-role/'));
    }
    function hapusUserRole($id)
    {
        $UserRoleModel = new UserRoleModel();
        if ($UserRoleModel->hapusUserRole($id)) {
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
        return redirect()->to(base_url('/administrasi/user-role/'));
    }
}
