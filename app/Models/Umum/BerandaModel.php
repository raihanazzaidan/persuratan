<?php

namespace App\Models\Umum;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    function getData()
    {
        $query = $this->db->query("SELECT * FROM user AS u");
        return  $query->getResult();
    }
    function adduser($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        return $builder->insert($data);
    }
    // function editData($id)
    // {
    //     $query = $this->db->query("SELECT * FROM comics AS c WHERE c.id=?",array($id));
    //     return  $query->getResult();
    // }
    // function updateData($id, $data)
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('comics');
    //     $builder->where('id',$id);
    //     return $builder->update($data);
    // }
    // function hapusData($id)
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('comics');
    //     $builder->where('id',$id);
    //     return $builder->delete();
    // }
}
