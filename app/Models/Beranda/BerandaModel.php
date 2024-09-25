<?php

namespace App\Models\Beranda;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    function index()
    {
        $query = $this->db->query("SELECT * FROM user AS u");
        return  $query->getResult();
    }
}
