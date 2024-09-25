<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class TipeUserModel extends Model
{
    function gettipeuser()
    {
        $query = $this->db->query("SELECT * FROM tipeuser AS tu");
        return  $query->getResult();
    }

    function addtipeuser($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tipeuser');
        return $builder->insert($data);
    }
    function edittipeuser($id)
    {
        $query = $this->db->query("SELECT * FROM tipeuser AS tu WHERE tu.id=?",array($id));
        return  $query->getResult();
    }
    function updatetipeuser($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tipeuser');
        $builder->where('id',$id);
        return $builder->update($data);
    }
    function hapustipeuser($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tipeuser');
        $builder->where('id',$id);
        return $builder->delete();
    }
}
