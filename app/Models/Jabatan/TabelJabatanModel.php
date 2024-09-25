<?php

namespace App\Models\TabelJabatan;

use CodeIgniter\Model;

class TabelJabatan extends Model
{
    function getSubsatker()
    {
        $query = $this->db->query("SELECT * FROM subsatker AS s");
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
