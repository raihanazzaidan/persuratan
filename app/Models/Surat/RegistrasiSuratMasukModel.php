<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class RegistrasiSuratMasukModel extends Model
{
    function getSuratMasuk($id)
    {
        $query = $this->db->query('SELECT
        registrasisuratmasuk.*, 
        jenisnaskah.nama AS jenis_naskah, sifatnaskah.nama AS sifat_naskah, subsatker.nama_subsatker, user.nama_lengkap AS tujuan_personal, u.nama_lengkap AS nama_user_register
        FROM registrasisuratmasuk
        JOIN jenisnaskah ON registrasisuratmasuk.jenis_naskah_id = jenisnaskah.id
        JOIN sifatnaskah ON registrasisuratmasuk.sifat_naskah_id = sifatnaskah.id
        JOIN subsatker ON registrasisuratmasuk.tujuan_subsatker_id = subsatker.id
        JOIN user ON registrasisuratmasuk.tujuan_personal_id = user.id
        JOIN user AS u ON registrasisuratmasuk.user_register = u.id
        WHERE registrasisuratmasuk.user_register = ?
        ORDER BY registrasisuratmasuk.createdAt DESC', array($id));
        return $query->getResult();
    }

    function getData_jenisnaskah()
    {
        $query = $this->db->query('SELECT * FROM jenisnaskah WHERE jenisnaskah.status = "1"');
        return $query->getResult();
    }
    function getData_sifatnaskah()
    {
        $query = $this->db->query('SELECT * FROM sifatnaskah WHERE sifatnaskah.status = "1"');
        return $query->getResult();
    }
    function getData_subsatker()
    {
        $query = $this->db->query('SELECT * FROM subsatker WHERE subsatker.status = "1"');
        return $query->getResult();
    }
    function getData_user()
    {
        $query = $this->db->query('SELECT * FROM user WHERE user.status_user = "Y"');
        return $query->getResult();
    }
    
    function addSuratMasuk($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('registrasisuratmasuk');
        return $builder->insert($data);
    }
    function editSuratMasuk($id)
    {
        $query = $this->db->query("SELECT * FROM registrasisuratmasuk WHERE registrasisuratmasuk.id=?", array($id));
        return $query->getResult();
    }
    function updateSuratMasuk($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('registrasisuratmasuk');
        $builder->where('id', $id);
        return $builder->update($data);
    }
    function hapusSuratMasuk($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('registrasisuratmasuk');
        $builder->where('id', $id);
        return $builder->delete();
    }
}
