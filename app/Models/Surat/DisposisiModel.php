<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class DisposisiModel extends Model
{
    function getDisposisi($id)
    {
        $query = $this->db->query('SELECT
        disposisi.*,
        registrasisuratmasuk.*,
        pengirim.nama_lengkap AS nama_pengirim,
        tujuan.nama_lengkap AS nama_tujuan
        FROM disposisi
        JOIN registrasisuratmasuk ON disposisi.id_surat = registrasisuratmasuk.id
        JOIN user AS pengirim ON disposisi.pengirim_id = pengirim.id
        JOIN user AS tujuan ON disposisi.tujuan_id = tujuan.id
        WHERE disposisi.tujuan_id = ?', array($id));
        return $query->getResult();
    }

    function getDetailSuratDisposisi($id)
    {
        $query = $this->db->query('SELECT
        disposisi.*,
        registrasisuratmasuk.*,
        pengirim.nama_lengkap AS nama_pengirim,
        tujuan.nama_lengkap AS nama_tujuan
        FROM disposisi
        JOIN registrasisuratmasuk ON disposisi.id_surat = registrasisuratmasuk.id
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
    function updateDisposisi($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('disposisi');
        $builder->where('id', $id);
        return $builder->insert($data);
    }
}
