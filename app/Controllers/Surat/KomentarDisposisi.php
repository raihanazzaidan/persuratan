<?php

namespace App\Controllers\Surat;

use Ramsey\Uuid\Uuid;
use App\Controllers\BaseController;
use App\Models\Surat\KomentarDisposisiModel;

class KomentarDisposisi extends BaseController
{
    protected $komentarModel;

    public function __construct()
    {
        $this->komentarModel = new KomentarDisposisiModel();
    }

    public function create()
    {
        $uuid = Uuid::uuid4()->toString();
        $disposisiId = $this->request->getPost('disposisi_id');
        $userId = session()->get('id');
        $isiKomentar = $this->request->getPost('komentar');

        $data = [
            'id' => $uuid,
            'disposisi_id' => $disposisiId,
            'user_id' => $userId,
            'komentar' => $isiKomentar,
            'createdAt' => gmdate('Y-m-d H:i:s')  // Simpan waktu dalam UTC
        ];

        if ($this->komentarModel->insert($data)) {
            $newKomentar = $this->komentarModel->getKomentarByDisposisiId($disposisiId);
            
            foreach ($newKomentar as &$k) {
                $date = new \DateTime($k['createdAt'], new \DateTimeZone('UTC'));
                $date->setTimezone(new \DateTimeZone('Asia/Jakarta'));
                $k['formattedDate'] = $date->format('d M H:i');
            }
            
            $response = [
                'status' => 'success',
                'komentar' => $newKomentar
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menambahkan komentar'
            ];
        }

        return $this->response->setJSON($response);
    }

    public function getKomentar($id)
    {
        $KomentarModel = new KomentarDisposisiModel();
        $komentar = $KomentarModel->getKomentarByDisposisiId($id);

        foreach ($komentar as &$k) {
            $date = new \DateTime($k['createdAt'], new \DateTimeZone('UTC'));
            $date->setTimezone(new \DateTimeZone('Asia/Jakarta'));
            $k['formattedDate'] = $date->format('d M H:i');
        }

        return $this->response->setJSON($komentar);
    }

    public function delete($id)
    {
        if ($this->komentarModel->delete($id)) {
            return redirect()->back()->with('success', 'Komentar berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus komentar');
        }
    }
}
