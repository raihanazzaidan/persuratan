<?php

namespace App\Controllers\Administrasi;

use App\Controllers\BaseController;
use App\Models\Administrasi\HakAksesModel;
use CodeIgniter\HTTP\ResponseInterface;

class HakAkses extends BaseController
{
    private $modul = 'Administrasi';
    private $title = 'Hak Akses';
    private $subtitle = 'Tambah Hak Akses';
    private $subtitle2 = 'Edit Hak Akses';

    function getHakAkses()
    {
        $HakAksesModel = new HakAksesModel();
        $data['hakakses'] = $HakAksesModel->getHakAkses();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'administrasi/hakakses/index';
        return view('layout/template', $data);
    }
    function addHakAkses()
    {
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'administrasi/hakakses/addHakAkses';
        return view('layout/template', $data);
    }
    function prosesAddHakAkses()
    {
        $HakAksesModel = new HakAksesModel();
        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'keterangan' => $this->request->getPost('keterangan'),
            'level' => $this->request->getPost('level'),
            'status' => $this->request->getPost('status'),
        ];

        // Panggil fungsi adduser dari model
        if ($HakAksesModel->addHakAkses($data)) {
            return redirect()->to(base_url('/administrasi/hak-akses/'))->with('message', 'User berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan user');
        }
    }
    function editHakAkses($id)
    {
        $HakAksesModel = new HakAksesModel();
        $data['hakakses'] = $HakAksesModel->getHakAkses();
        $data['gethakakses'] = $HakAksesModel->editHakAkses($id);
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'administrasi/hakakses/editHakAkses';
        return view('layout/template', $data);
    }
    function prosesEditHakAkses($id)
    {
        $HakAksesModel = new HakAksesModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'keterangan' => $this->request->getPost('keterangan'),
            'level' => $this->request->getPost('level'),
            'status' => $this->request->getPost('status'),
        ];

        if ($HakAksesModel->updateHakAkses($id, $data)) {
            return redirect()->to(base_url('/administrasi/hak-akses/'));
        } else {
            return redirect()->back()->withInput();
        }
    }
    function hapusHakAkses($id)
    {
        $HakAksesModel = new HakAksesModel();
        if ($HakAksesModel->hapusHakAkses($id)) {
            return redirect()->to(base_url('/administrasi/hak-akses/'));
        } else {
            return redirect()->back()->withInput();
        }
    }
}
