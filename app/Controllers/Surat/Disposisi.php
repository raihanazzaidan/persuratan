<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\DisposisiModel;
use App\Models\Surat\KomentarDisposisiModel;
use App\Models\Surat\LogModel;
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

    function detail($id)
    {
        $DisposisiModel = new DisposisiModel();
        $KomentarModel = new KomentarDisposisiModel();
        
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['user'] = $DisposisiModel->getDataUser();
        $data['suratdisposisi'] = $DisposisiModel->getDetailSuratDisposisi($id);
        $data['komentar'] = $KomentarModel->getKomentarByDisposisiId($id);
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
        $logModel = new LogModel();
        $uuid = Uuid::uuid4()->toString();
        $timestamp = gmdate("Y-m-d H:i:s", time() + 25200);
        $session = session();
        $pengirim_id = $session->get('id');
        $data = [
            'id' => $uuid,
            'id_surat' => $this->request->getPost('id_surat'),
            'pengirim_id' => $pengirim_id,
            'tujuan_id' => $this->request->getPost('tujuan_id'),
            'tanggal_disposisi' => $timestamp,
            'catatan_disposisi' => $this->request->getPost('catatan_disposisi')
        ];
        if ($disposisiModel->postDisposisi($id, $data)) {
            $logData = [
                'id' => $uuid,
                'id_surat' => $data['id_surat'],
                'id_disposisi' => $uuid,
                'user_id' => $pengirim_id,
                'catatan' => 'Disposisi surat',
                'createdAt' => $timestamp
            ];
            $logModel->addLog($logData);
            
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
        return redirect()->to(base_url('/surat/historydisposisi'));
    }

    function pindahDisposisi($id)
    {
        $disposisiModel = new DisposisiModel();
        $logModel = new LogModel();
        $disposisiData = $logModel->getDisposisiData($id);
        $session = session();
        $pengirim_id = $session->get('id');
        $timestamp = gmdate("Y-m-d H:i:s", time() + 25200);
        
        $data = [
            'tujuan_id' => $this->request->getPost('nama_tujuan'),
            'catatan_disposisi' => $this->request->getPost('catatan_disposisi'),
            'tanggal_disposisi' => $timestamp
        ];

        if ($disposisiModel->updateDisposisi($id, $data)) {
            $logData = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $pengirim_id,
                'id_surat' => $disposisiData->id_surat,
                'id_disposisi' => $disposisiData->id_disposisi,
                'catatan' => 'Pemindahan disposisi',
                'createdAt' => $timestamp
            ];
            $logModel->addLog($logData);
            
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Disposisi berhasil dipindahkan',
                    'icon' => 'success',
                ],
            ];
        } else {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Gagal memindahkan disposisi',
                    'icon' => 'warning',
                ],
            ];
        }
        session()->setFlashdata($sessFlashdata);
        return redirect()->to(base_url('/surat/historydisposisi'));
    }

    function selesaikanDisposisi($id)
    {
        
        $disposisiModel = new disposisiModel();
        $logModel = new LogModel();
        $disposisiData = $logModel->getDisposisiData($id);
        $session = session();
        $pengirim_id = $session->get('id');
        $data['getDisposisi'] = $disposisiModel->disposisi($id);
        $timestamp = gmdate("Y-m-d H:i:s", time() + 25200);
        $data = [
            'status' => 'Y',
            'tanggal_selesai' => $timestamp,
            'catatan_selesai' => $this->request->getPost('catatan_selesai')
        ];
        if ($disposisiModel->selesaikanDisposisi($id, $data)) {
            $logData = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $pengirim_id,
                'id_surat' => $disposisiData->id_surat,
                'id_disposisi' => $disposisiData->id_disposisi,
                'catatan' => 'Penyelesaian disposisi',
                'createdAt' => $timestamp
            ];
            $logModel->addLog($logData);
            
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Surat disposisi berhasil diselesaikan',
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
        return redirect()->to(base_url('/surat/disposisi'));
    }

    function batalDisposisi($id)
    {
        $disposisiModel = new DisposisiModel();
        $logModel = new LogModel();
        $disposisiData = $logModel->getDisposisiData($id);
        $session = session();
        $pengirim_id = $session->get('id');
        $timestamp = gmdate("Y-m-d H:i:s", time() + 25200);
        
        $data = [
            'status' => 'N',
            'tanggal_batal' => $timestamp
        ];

        if ($disposisiModel->updateDisposisi($id, $data)) {
            $logData = [
                'id' => Uuid::uuid4()->toString(),
                'user_id' => $pengirim_id,
                'id_surat' => $disposisiData->id_surat,
                'id_disposisi' => $disposisiData->id_disposisi,
                'catatan' => 'Pembatalan disposisi',
                'createdAt' => $timestamp
            ];
            $logModel->addLog($logData);
            
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Disposisi berhasil dibatalkan',
                    'icon' => 'success',
                ],
            ];
        } else {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Gagal membatalkan disposisi',
                    'icon' => 'warning',
                ],
            ];
        }
        session()->setFlashdata($sessFlashdata);
        return redirect()->to(base_url('/surat/historydisposisi'));
    }

}
