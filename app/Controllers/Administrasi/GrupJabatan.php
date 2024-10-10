<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use  App\Models\Administrasi\GrupJabatanModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\ResponseInterface;

class GrupJabatan extends BaseController
{
    private $modul = 'Administrasi';
    private $title = 'Grup Jabatan';
    private $subtitle = 'Tambah Grup Jabatan';
    private $subtitle2 = 'Edit Grup Jabatan';

    function getGrupJabatan()
    {
        $GrupJabatanModel = new GrupJabatanModel();
        $data['grupjabatan'] = $GrupJabatanModel->getGrupJabatan();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/grupjabatan/index';
        return view('layout/template', $data);
    }
    function addGrupJabatan()
    {
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/grupjabatan/addgrupjabatan';
        return view('layout/template', $data);
    }
    function prosesAddGrupJabatan()
    {
        $GrupJabatanModel = new GrupJabatanModel();
        $uuid =  Uuid::uuid4()->toString();
        $data = [
            'id' => $uuid,
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($GrupJabatanModel->addGrupJabatan($data)) {
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
        return redirect()->to(base_url('administrasi/grup-jabatan'));
    }
    function editGrupJabatan($id)
    {
        $GrupJabatanModel = new GrupJabatanModel();
        $data['getGrupJabatan'] = $GrupJabatanModel->editgrupjabatan($id);
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/grupjabatan/editgrupjabatan';
        return view('layout/template', $data);
    }
    function prosesEditGrupJabatan($id)
    {
        $GrupJabatanModel = new GrupJabatanModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($GrupJabatanModel->updateGrupJabatan($id, $data)) {
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
        return redirect()->to(base_url('/administrasi/grup-jabatan'));
    }
    function hapusGrupJabatan($id)
    {
        $GrupJabatanModel = new GrupJabatanModel();
        if ($GrupJabatanModel->hapusGrupJabatan($id)) {
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
        return redirect()->to(base_url('/administrasi/grup-jabatan'));
    }
}
