<?php

namespace App\Controllers\Surat;

use App\Controllers\BaseController;
use App\Models\Surat\RegistrasiSuratMasukModel;
use App\Models\Surat\HistoryNaskahKeluarModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\HTTP\ResponseInterface;

class RegistrasiSuratMasuk extends BaseController
{
    private $modul = 'Surat';
    private $title = 'Registrasi Surat Masuk';
    private $subtitle = 'Upload Surat Masuk';
    private $subtitle2 = 'Edit Surat Masuk';

    function getSuratMasuk()
    {
        $id = session()->id;
        $SuratMasukModel = new RegistrasiSuratMasukModel();
        $data['suratmasuk'] = $SuratMasukModel->getSuratMasuk($id);
        $data['jenisnaskah'] = $SuratMasukModel->getData_jenisnaskah();
        $data['sifatnaskah'] = $SuratMasukModel->getData_sifatnaskah();
        $data['subsatker'] = $SuratMasukModel->getData_subsatker();
        $data['user'] = $SuratMasukModel->getData_user();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['view'] = 'surat/registrasiSuratMasuk/index';
        return view('layout/template', $data);
    }
    function addSuratMasuk()
    {
        $SuratMasukModel = new  RegistrasiSuratMasukModel();
        $data['jenisnaskah'] = $SuratMasukModel->getData_jenisnaskah();
        $data['sifatnaskah'] = $SuratMasukModel->getData_sifatnaskah();
        $data['subsatker'] = $SuratMasukModel->getData_subsatker();
        $data['user'] = $SuratMasukModel->getData_user();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle'] = $this->subtitle;
        $data['view'] = 'surat/registrasiSuratMasuk/addRegistrasiSuratMasuk';
        return view('layout/template', $data);
    }
    function prosesAddSuratMasuk()
    {
        $SuratMasukModel = new RegistrasiSuratMasukModel();
        $uuid =  Uuid::uuid4()->toString();
        $session = session();
        $user_register = $session->get('id');

        // Mengambil file yang di-upload
        $fileNaskah = $this->request->getFile('file_naskah');
        $fileLampiran = $this->request->getFile('file_lampiran');

        // Cek apakah file di-upload
        if ($fileNaskah && $fileNaskah->isValid()) {
            // Pindahkan file ke folder tujuan dan ambil nama file
            $fileNaskahName = $fileNaskah->getRandomName();
            $fileNaskah->move('uploads/surat', $fileNaskahName);
        } else {
            $fileNaskahName = null; // Jika tidak ada file yang di-upload
        }

        if ($fileLampiran && $fileLampiran->isValid()) {
            $fileLampiranName = $fileLampiran->getRandomName();
            $fileLampiran->move('uploads/lampiran', $fileLampiranName);
        } else {
            $fileLampiranName = null;
        }
        $createdAt = gmdate("Y-m-d H:i:s", time() + 25200);
        // Data yang akan disimpan
        $data = [
            'id' => $uuid,
            'nama_pengirim' => $this->request->getPost('nama_pengirim'),
            'jabatan_pengirim' => $this->request->getPost('jabatan_pengirim'),
            'instansi_pengirim' => $this->request->getPost('instansi_pengirim'),
            'jenis_naskah_id' => $this->request->getPost('jenis_naskah_id'),
            'sifat_naskah_id' => $this->request->getPost('sifat_naskah_id'),
            'nomor_naskah' => $this->request->getPost('nomor_naskah'),
            'tanggal_naskah' => $this->request->getPost('tanggal_naskah'),
            'tanggal_diterima' => $this->request->getPost('tanggal_diterima'),
            'hal' => $this->request->getPost('hal'),
            'ringkasan' => $this->request->getPost('ringkasan'),
            'file_naskah' => $fileNaskahName,
            'file_lampiran' => $fileLampiranName,
            'tujuan_subsatker_id' => $this->request->getPost('tujuan_subsatker_id'),
            'tujuan_personal_id' => $this->request->getPost('tujuan_personal_id'),
            'user_register' => $user_register,
            'createdAt' => $createdAt,  
        ];

        if ($SuratMasukModel->addSuratMasuk($data)) {
            $historyNaskahKeluarData = [
                'id' => $uuid,
                'naskah_id' => $data['id'],
                'pengirim_id' => $user_register,
                'status_naskah' => 'terkirim',
                'status_dibaca' => 'belum',
                'updatedAt' => $createdAt
            ];
            $historyNaskahKeluarModel = new HistoryNaskahKeluarModel();
            $historyNaskahKeluarModel->addHistoryNaskahKeluar($historyNaskahKeluarData);
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
        return redirect()->to(base_url('/surat/registrasi-surat-masuk'));
    }

    function editSuratMasuk($id)
    {
        $SuratMasukModel = new RegistrasiSuratMasukModel();
        $data['getSuratMasuk'] = $SuratMasukModel->editSuratMasuk($id);
        $data['jenisnaskah'] = $SuratMasukModel->getData_jenisnaskah();
        $data['sifatnaskah'] = $SuratMasukModel->getData_sifatnaskah();
        $data['subsatker'] = $SuratMasukModel->getData_subsatker();
        $data['user'] = $SuratMasukModel->getData_user();
        $data['modul'] = $this->modul;
        $data['title'] = $this->title;
        $data['subtitle2'] = $this->subtitle2;
        $data['view'] = 'surat/registrasiSuratMasuk/editRegistrasiSuratMasuk';
        return view('layout/template', $data);
    }
    function prosesEditSuratMasuk($id)
    {
        $SuratMasukModel = new RegistrasiSuratMasukModel();

        // Mengambil file yang di-upload
        $fileNaskah = $this->request->getFile('file_naskah');
        $fileLampiran = $this->request->getFile('file_lampiran');
        $datalama = $SuratMasukModel->editSuratMasuk($id);

        // Data file lama
        $fileNaskah_lama = $datalama[0]->file_naskah;
        $fileLampiran_lama = $datalama[0]->file_lampiran;

        // Cek apakah file Naskah di-upload
        if ($fileNaskah && $fileNaskah->isValid()) {
            // Jika ada file baru, hapus file lama dan simpan file baru
            if (file_exists('./uploads/surat/' . $fileNaskah_lama)) {
                unlink('./uploads/surat/' . $fileNaskah_lama);
            }
            $fileNaskahName = $fileNaskah->getRandomName();
            $fileNaskah->move('uploads/surat', $fileNaskahName);
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $fileNaskahName = $fileNaskah_lama;
        }

        // Cek apakah file Lampiran di-upload
        if ($fileLampiran && $fileLampiran->isValid()) {
            // Jika ada file baru, hapus file lama dan simpan file baru
            if (file_exists('./uploads/lampiran/' . $fileLampiran_lama)) {
                unlink('./uploads/lampiran/' . $fileLampiran_lama);
            }
            $fileLampiranName = $fileLampiran->getRandomName();
            $fileLampiran->move('uploads/lampiran', $fileLampiranName);
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $fileLampiranName = $fileLampiran_lama;
        }

        $updatedAt = gmdate("Y-m-d H:i:s", time() + 25200);
        // Data yang akan disimpan
        $data = [
            'nama_pengirim' => $this->request->getPost('nama_pengirim'),
            'jabatan_pengirim' => $this->request->getPost('jabatan_pengirim'),
            'instansi_pengirim' => $this->request->getPost('instansi_pengirim'),
            'jenis_naskah_id' => $this->request->getPost('jenis_naskah_id'),
            'sifat_naskah_id' => $this->request->getPost('sifat_naskah_id'),
            'nomor_naskah' => $this->request->getPost('nomor_naskah'),
            'tanggal_naskah' => $this->request->getPost('tanggal_naskah'),
            'tanggal_diterima' => $this->request->getPost('tanggal_diterima'),
            'hal' => $this->request->getPost('hal'),
            'ringkasan' => $this->request->getPost('ringkasan'),
            'file_naskah' => $fileNaskahName, // Tetap gunakan nama file yang ada, baik file baru atau file lama
            'file_lampiran' => $fileLampiranName, // Tetap gunakan nama file yang ada, baik file baru atau file lama
            'tujuan_subsatker_id' => $this->request->getPost('tujuan_subsatker_id'),
            'tujuan_personal_id' => $this->request->getPost('tujuan_personal_id'),
            'updatedAt' => $updatedAt,
        ];

        // Proses penyimpanan data
        if ($SuratMasukModel->updateSuratMasuk($id, $data)) {
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
        return redirect()->to(base_url('/surat/registrasi-surat-masuk'));
    }

    function hapusSuratMasuk($id)
    {
        $SuratMasukModel = new RegistrasiSuratMasukModel();
        $datalama = $SuratMasukModel->editSuratMasuk($id);
        // print_r($datalama);

        $fileNaskah_lama = $datalama[0]->file_naskah;
        $fileLampiran_lama = $datalama[0]->file_lampiran;
        if ($SuratMasukModel->hapusSuratMasuk($id)) {
            unlink('./uploads/surat/' . $fileNaskah_lama);
            unlink('./uploads/lampiran/' . $fileLampiran_lama);
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
        return redirect()->to(base_url('/surat/registrasi-surat-masuk'));
    }
}
