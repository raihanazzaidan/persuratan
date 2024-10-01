<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class GrupJabatanModel extends Model
{
    function getGrupJabatan()
    {
        $query = $this->db->query("SELECT * FROM grupjabatan AS gj");
        return  $query->getResult();
    }

    function addGrupJabatan($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('grupjabatan');
        return $builder->insert($data);
    }
    function editGrupJabatan($id)
    {
        $query = $this->db->query("SELECT * FROM grupjabatan AS gj WHERE gj.id=?",array($id));
        return  $query->getResult();
    }
    function updateGrupJabatan($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('grupjabatan');
        $builder->where('id',$id);
        return $builder->update($data);
    }
    function hapusGrupJabatan($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('grupjabatan');
        $builder->where('id',$id);
        return $builder->delete();
    }
}
