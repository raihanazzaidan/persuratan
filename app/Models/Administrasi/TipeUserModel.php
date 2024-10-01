<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class TipeUserModel extends Model
{
    function getTipeUser()
    {
        $query = $this->db->query("SELECT * FROM tipeuser AS tu");
        return  $query->getResult();
    }

    function addTipeUser($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tipeuser');
        return $builder->insert($data);
    }
    function editTipeUser($id)
    {
        $query = $this->db->query("SELECT * FROM tipeuser AS tu WHERE tu.id=?",array($id));
        return  $query->getResult();
    }
    function updateTipeUser($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tipeuser');
        $builder->where('id',$id);
        return $builder->update($data);
    }
    function hapusTipeUser($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tipeuser');
        $builder->where('id',$id);
        return $builder->delete();
    }
}
