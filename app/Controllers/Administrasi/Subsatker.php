<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\SubsatkerModel;
use Ramsey\Uuid\Uuid;
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
        $data['view'] = 'administrasi/subsatker/index';
        return view('layout/template', $data);
    }
    function addSubsatker()
    {
        $model = new SubsatkerModel();
        $data['jis'] = $model->ambil_jenisinduksubsatker();
        $data['indukmodule'] = $this->indukmodule;
        $data['title'] = $this->title;
        $data['submodule'] = $this->submodule;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/subsatker/addSubsatker';
        return view('layout/template', $data);
    }
    function prosesAddSubsatker()
    {
        $SubsatkerModel = new SubsatkerModel();
        $uuid =  Uuid::uuid4()->toString();
        $data = [
            'id' => $uuid,
            'kode_subsatker' => $this->request->getPost('kode_subsatker'),
            'nama_subsatker' => $this->request->getPost('nama_subsatker'),
            'jenis_induk_subsatker' => $this->request->getPost('jenis_induk_subsatker'),
            'status' => $this->request->getPost('status'),
        ];

        if ($SubsatkerModel->addSubsatker($data)) {
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
        return redirect()->to(base_url('administrasi/subsatker'));
    }
    function editSubsatker($id)
    {
        $SubsatkerModel = new SubsatkerModel();
        $data['jis'] = $SubsatkerModel->ambil_jenisinduksubsatker();
        $data['getSubsatker'] = $SubsatkerModel->editSubsatker($id);
        $data['indukmodule'] = $this->indukmodule;
        $data['submodule'] = $this->submodule;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/subsatker/editSubsatker';
        return view('layout/template', $data);
        // print_r($data['jis']);
    }
    function prosesEditSubsatker($id)
    {
        $SubsatkerModel = new SubsatkerModel();
        $data = [
            'kode_subsatker' => $this->request->getPost('kode_subsatker'),
            'nama_subsatker' => $this->request->getPost('nama_subsatker'),
            'jenis_induk_subsatker' => $this->request->getPost('jenis_induk_subsatker'),
            'status' => $this->request->getPost('status'),
        ];

        if ($SubsatkerModel->updateSubsatker($id, $data)) {
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
        return redirect()->to(base_url('/administrasi/subsatker'));
    }
    function hapusSubsatker($id)
    {
        $SubsatkerModel = new SubsatkerModel();
        if ($SubsatkerModel->hapusSubsatker($id)) {
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
        return redirect()->to(base_url('/administrasi/subsatker'));
    }
}
