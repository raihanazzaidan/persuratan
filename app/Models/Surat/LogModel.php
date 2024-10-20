<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class LogModel extends Model
{

    public function getLog()
    {
        $query = $this->db->query('SELECT 
        log.*,
        suratmasuk.id AS id_suratmasuk,
        disposisi.id AS id_disposisi,
        user.nama_lengkap AS nama_pengirim
        FROM log
        JOIN user ON log.user_id = user.id
        JOIN registrasisuratmasuk AS suratmasuk ON log.id_surat = suratmasuk.id
        JOIN disposisi ON log.id_disposisi = disposisi.id
        ');
        return $query->getResult();
    }

    function getLogDisposisi($id)
    {
        $query = $this->db->query('SELECT 
        log.*,
        suratmasuk.id AS id_suratmasuk,
        disposisi.id AS id_disposisi,
        user.nama_lengkap AS nama_pengirim
        FROM log
        JOIN user ON log.user_id = user.id
        JOIN registrasisuratmasuk AS suratmasuk ON log.id_surat = suratmasuk.id
        JOIN disposisi ON log.id_disposisi = disposisi.id
        ORDER BY log.createdAt DESC', array($id));
        return $query->getResult();
    }
    function addLog($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('log');
        return $builder->insert($data);
    }

    function getDisposisiData($id)
    {
        $query = $this->db->query("SELECT 
        disposisi.id AS id_disposisi, 
        disposisi.id_surat AS id_surat
        FROM disposisi WHERE id = ?", array($id));
        return $query->getRow();
    }
}
