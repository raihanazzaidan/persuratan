<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class JenisNaskahModel extends Model
{
    function getJenisNaskah()
    {
        $query = $this->db->query("SELECT * FROM jenisnaskah");
        return  $query->getResult();
    }

    function addJenisNaskah($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jenisnaskah');
        return $builder->insert($data);
    }
    function editJenisNaskah($id)
    {
        $query = $this->db->query("SELECT * FROM jenisnaskah WHERE jenisnaskah.id=?",array($id));
        return  $query->getResult();
    }
    function updateJenisNaskah($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jenisnaskah');
        $builder->where('id',$id);
        return $builder->update($data);
    }
    function hapusJenisNaskah($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jenisnaskah');
        $builder->where('id',$id);
        return $builder->delete();
    }
}
