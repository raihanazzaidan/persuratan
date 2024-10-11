<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\DisposisiModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\ResponseInterface;

class Disposisi extends BaseController
{
    private $modul = 'Surat';
    private $title = 'Surat Disposisi';
    private $subtitle = 'Disposisi Surat';
    private $subtitle2 = 'Detail Surat Disposisi';

    function getDisposisi()
    {
        $id = session()->id;
        // print_r($id);
        $DisposisiModel = new DisposisiModel();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['suratdisposisi'] = $DisposisiModel->getDisposisi($id);
        $data['view'] = 'surat/suratdisposisi/index';
        return view('layout/template', $data);
    }

    function detail($id_surat)
    {
        $DisposisiModel = new DisposisiModel();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['suratdisposisi'] = $DisposisiModel->getDetailSuratDisposisi($id_surat);
        $data['view'] = 'surat/suratdisposisi/detail';
        return view('layout/template', $data);
    }


    function disposisi($id)
    {
        $DisposisiModel = new DisposisiModel();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['getDisposisi'] = $DisposisiModel->disposisi($id);
        $data['user'] = $DisposisiModel->getDataUser();
        $data['view'] = 'surat/aksi/disposisi';
        return view('layout/template', $data);
    }

    function prosesDisposisi($id)
    {
        $disposisiModel = new DisposisiModel();
        $uuid = Uuid::uuid4()->toString();
        $tanggal_disposisi = gmdate("Y-m-d H:i:s", time() + 25200);
        $session = session();
        $pengirim_id = $session->get('id');
        $data = [
            'id' => $uuid,
            'id_surat' => $this->request->getPost('id_surat'),
            'pengirim_id' => $pengirim_id,
            'tujuan_id' => $this->request->getPost('tujuan_id'),
            'tanggal_disposisi' => $tanggal_disposisi,
            'catatan_disposisi' => $this->request->getPost('catatan_disposisi')
        ];
        if ($disposisiModel->updateDisposisi($id, $data)) {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Disposisi surat berhasil',
                    'icon' => 'success',
                ],
            ];
        } else {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Gagal disposisi surat',
                    'icon' => 'warning',
                ],
            ];
        }
        session()->setFlashdata($sessFlashdata);
        return redirect()->to(base_url('/surat/surat-masuk'));
    }
}
