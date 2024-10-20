<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class UserModel extends Model
{
    function getData()
    {
        $query = $this->db->query("SELECT * FROM user AS u ORDER BY u.nama_lengkap ASC");
        return  $query->getResult();
    }

    function adduser($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        return $builder->insert($data);
    }
    function edituser($id)
    {
        $query = $this->db->query("SELECT * FROM user AS u WHERE u.id=?",array($id));
        return  $query->getResult();
    }
    function updateuser($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('id',$id);
        return $builder->update($data);
    }
    function hapususer($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('id',$id);
        return $builder->delete();
    }
}
