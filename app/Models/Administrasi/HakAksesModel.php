<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class HakAksesModel extends Model
{
    function getHakAkses()
    {
        $query = $this->db->query("SELECT * FROM hakakses AS ha");
        return  $query->getResult();
    }

    function addHakAkses($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('hakakses');
        return $builder->insert($data);
    }
    function editHakAkses($id)
    {
        $query = $this->db->query("SELECT * FROM hakakses AS ha WHERE ha.id=?",array($id));
        return  $query->getResult();
    }
    function updateHakAkses($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('hakakses');
        $builder->where('id',$id);
        return $builder->update($data);
    }
    function hapusHakAkses($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('hakakses');
        $builder->where('id',$id);
        return $builder->delete();
    }
}
