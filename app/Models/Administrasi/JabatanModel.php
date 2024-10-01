<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    function getJabatan()
    {
        $query = $this->db->query("SELECT
        j.*,
        s.nama_subsatker AS nama_subsatker
        FROM jabatan AS j
        JOIN subsatker AS s ON j.subsatker_id = s.id");
        return  $query->getResult();
    }

    function ambil_subsatker()
    {
        $query = $this->db->query("SELECT * FROM subsatker AS s WHERE s.status = 1");
        return  $query->getResult();
    }

    function addJabatan($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jabatan');
        return $builder->insert($data);
    }
    function editJabatan($id)
    {
        $query = $this->db->query("SELECT * FROM jabatan AS j WHERE j.id=?", array($id));
        return  $query->getResult();
    }
    function updateJabatan($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jabatan');
        $builder->where('id', $id);
        return $builder->update($data);
    }
    function hapusJabatan($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jabatan');
        $builder->where('id', $id);
        return $builder->delete();
    }

}
