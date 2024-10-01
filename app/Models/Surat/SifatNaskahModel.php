<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class SifatNaskahModel extends Model
{
    function getSifatNaskah()
    {
        $query = $this->db->query("SELECT * FROM sifatnaskah");
        return  $query->getResult();
    }

    function addSifatNaskah($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sifatnaskah');
        return $builder->insert($data);
    }
    function editSifatNaskah($id)
    {
        $query = $this->db->query("SELECT * FROM sifatnaskah WHERE sifatnaskah.id=?",array($id));
        return  $query->getResult();
    }
    function updateSifatNaskah($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sifatnaskah');
        $builder->where('id',$id);
        return $builder->update($data);
    }
    function hapusSifatNaskah($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sifatnaskah');
        $builder->where('id',$id);
        return $builder->delete();
    }
}
