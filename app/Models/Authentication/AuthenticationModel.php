<?php

namespace App\Models\Authentication;

use CodeIgniter\Model;

class AuthenticationModel extends Model
{
    function cek_user_login($email)
    {
        $query = $this->db->query('SELECT u.*, ha.level AS level, ha.nama AS nama_hakakses, j.id AS jabatan_id, j.nama AS nama_jabatan, gj.id AS grupjabatan_id, gj.nama AS nama_grupjabatan,tu.id AS tipeuser_id,tu.nama AS nama_tipeuser,s.id AS subsatker_id, s.nama_subsatker
        FROM userrole AS usrl
        JOIN user AS u ON usrl.usr_id = u.id
        JOIN hakakses AS ha ON usrl.usg_level = ha.id
        JOIN jabatan AS j ON usrl.jabatan_id = j.id
        JOIN grupjabatan AS gj ON usrl.jabatan_grup_id = gj.id
        JOIN tipeuser AS tu ON usrl.usertipe_id = tu.id
        JOIN subsatker AS s ON usrl.subsatker_id = s.id
        WHERE u.email = ?', array($email));
        return $query->getResult();
    }
}
