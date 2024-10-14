<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class DisposisiModel extends Model
{
    function getDisposisi($id)
    {
        $query = $this->db->query('SELECT
        disposisi.*,
        suratmasuk.id AS id_suratmasuk,
        suratmasuk.nama_pengirim AS pengirim_surat,
        suratmasuk.instansi_pengirim,
        suratmasuk.tanggal_naskah,
        suratmasuk.tanggal_diterima,
        suratmasuk.nomor_naskah,
        suratmasuk.hal,
        suratmasuk.ringkasan,
        suratmasuk.file_naskah,
        suratmasuk.file_lampiran,
        pengirim.nama_lengkap AS nama_pengirim,
        tujuan.nama_lengkap AS nama_tujuan
        FROM disposisi
        JOIN registrasisuratmasuk AS suratmasuk ON disposisi.id_surat = suratmasuk.id
        JOIN user AS pengirim ON disposisi.pengirim_id = pengirim.id
        JOIN user AS tujuan ON disposisi.tujuan_id = tujuan.id
        WHERE disposisi.tujuan_id = ?', array($id));
        return $query->getResult();
    }

    function getDetailSuratDisposisi($id)
    {
        $query = $this->db->query('SELECT
        disposisi.*,
        suratmasuk.id AS id_suratmasuk,
        suratmasuk.instansi_pengirim,
        suratmasuk.tanggal_naskah,
        suratmasuk.tanggal_diterima,
        suratmasuk.nomor_naskah,
        suratmasuk.hal,
        suratmasuk.ringkasan,
        suratmasuk.file_naskah,
        suratmasuk.file_lampiran,
        pengirim.nama_lengkap AS nama_pengirim,
        tujuan.nama_lengkap AS nama_tujuan
        FROM disposisi
        JOIN registrasisuratmasuk AS suratmasuk ON disposisi.id_surat = suratmasuk.id
        JOIN user AS pengirim ON disposisi.pengirim_id = pengirim.id
        JOIN user AS tujuan ON disposisi.tujuan_id = tujuan.id
        WHERE disposisi.id_surat = ?', array($id));
        return $query->getRow();
    }

    function getDataUser()
    {
        $query = $this->db->query('SELECT * FROM user AS u WHERE u.status_user = "Y"');
        return  $query->getResult();
    }
    function getDataSuratMasuk()
    {
        $query = $this->db->query('SELECT * FROM registrasisuratmasuk');
        return  $query->getResult();
    }
    function disposisi($id)
    {
        $query = $this->db->query("SELECT * FROM registrasisuratmasuk WHERE registrasisuratmasuk.id=?", array($id));
        return  $query->getResult();
    }
    function postDisposisi($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('disposisi');
        $builder->where('id', $id);
        return $builder->insert($data);
    }
    function updateDisposisi($id)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE disposisi.id=?",array($id));
        return  $query->getResult();
    }
    function selesaikanDisposisi($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('disposisi');
        $builder->where('id', $id);
        return $builder->update($data);
    }
}
