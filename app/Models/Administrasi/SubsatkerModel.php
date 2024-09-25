<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class SubsatkerModel extends Model
{
    function getSubsatker()
    {
        $query = $this->db->query("SELECT
        s.*,
        jis.nama AS nama_jenisinduksubsatker
        FROM subsatker AS s
        JOIN jenisinduksubsatker AS jis ON s.jenis_induk_subsatker = jis.id");
        return  $query->getResult();
    }

    function ambil_jenisinduksubsatker()
    {
        $query = $this->db->query("SELECT * FROM jenisinduksubsatker AS jis WHERE jis.status = 1");
        return  $query->getResult();
    }

    function addSubsatker($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('subsatker');
        return $builder->insert($data);
    }
    function editSubsatker($id)
    {
        $query = $this->db->query("SELECT * FROM subsatker AS s WHERE s.id=?", array($id));
        return  $query->getResult();
    }
    function updateSubsatker($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('subsatker');
        $builder->where('id', $id);
        return $builder->update($data);
    }
    function hapusSubsatker($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('subsatker');
        $builder->where('id', $id);
        return $builder->delete();
    }
}
