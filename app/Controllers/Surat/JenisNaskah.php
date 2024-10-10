<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\JenisNaskahModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\ResponseInterface;

class JenisNaskah extends BaseController
{
    private $modul = 'Surat';
    private $title = 'Jenis Naskah';
    private $subtitle = 'Add Jenis Naskah';
    private $subtitle2 = 'Edit Jenis Naskah';

    function getJenisNaskah()
    {
        $JenisNaskahModel = new JenisNaskahModel();
        $data['jenisnaskah'] = $JenisNaskahModel->getJenisNaskah();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'surat/jenisnaskah/index';
        return view('layout/template', $data);
    }
    function addJenisNaskah()
    {
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'surat/jenisnaskah/addJenisNaskah';
        return view('layout/template', $data);
    }
    function prosesAddJenisNaskah()
    {
        $JenisNaskahModel = new JenisNaskahModel();
        $uuid =  Uuid::uuid4()->toString();
        $data = [
            'id' => $uuid,
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JenisNaskahModel->addJenisNaskah($data)) {
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
        return redirect()->to(base_url('/surat/jenis-naskah'));
    }
    function editJenisNaskah($id)
    {
        $JenisNaskahModel = new JenisNaskahModel();
        $data['getJenisNaskah'] = $JenisNaskahModel->editJenisNaskah($id);
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'surat/jenisnaskah/editJenisNaskah';
        return view('layout/template', $data);
    }
    function prosesEditJenisNaskah($id)
    {
        $JenisNaskahModel = new JenisNaskahModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        if ($JenisNaskahModel->updateJenisNaskah($id, $data)) {
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
        return redirect()->to(base_url('/surat/jenis-naskah'));
    }
    function hapusJenisNaskah($id)
    {
        $JenisNaskahModel = new JenisNaskahModel();
        if ($JenisNaskahModel->hapusJenisNaskah($id)) {
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
        return redirect()->to(base_url('/surat/jenis-naskah'));
    }
}
