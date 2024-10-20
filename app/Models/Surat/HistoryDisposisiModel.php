<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class HistoryDisposisiModel extends Model
{
    function getHistoryDisposisi($id)
    {
        $query = $this->db->query('SELECT
        disposisi.*,
        suratmasuk.id AS id_suratmasuk,
        suratmasuk.nomor_naskah,
        suratmasuk.hal,
        tujuan.nama_lengkap AS nama_tujuan
        FROM disposisi
        JOIN registrasisuratmasuk AS suratmasuk ON disposisi.id_surat = suratmasuk.id
        JOIN user AS tujuan ON disposisi.tujuan_id = tujuan.id
        WHERE disposisi.pengirim_id = ?
        ORDER BY disposisi.tanggal_disposisi DESC', array($id));
        return $query->getResult();
    }
}
