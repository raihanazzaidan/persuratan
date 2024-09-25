<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class JenisIndukSubsatkerModel extends Model
{
    function getJenisIndukSubsatker()
    {
        $query = $this->db->query("SELECT * FROM jenisinduksubsatker AS jis");
        return  $query->getResult();
    }
    function addJenisIndukSubsatker($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jenisinduksubsatker');
        return $builder->insert($data);
    }
    function editJenisIndukSubsatker($id)
    {
        $query = $this->db->query("SELECT * FROM jenisinduksubsatker AS jis WHERE jis.id=?", array($id));
        return  $query->getResult();
    }
    function updateJenisIndukSubsatker($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jenisinduksubsatker');
        $builder->where('id', $id);
        return $builder->update($data);
    }
    function hapusJenisIndukSubsatker($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('jenisinduksubsatker');
        $builder->where('id', $id);
        return $builder->delete();
    }
}
