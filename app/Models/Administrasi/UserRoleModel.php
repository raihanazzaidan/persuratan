<?php

namespace App\Models\Administrasi;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    function getUserRole()
    {
        $query = $this->db->query('SELECT u.id, u.nama_lengkap, u.email, u.jenis_kelamin, ha.nama AS nama_hakakses, j.nama AS nama_jabatan, gj.nama AS nama_grupjabatan, tu.nama AS nama_tipeuser, s.nama_subsatker
        FROM userrole AS usrl
        JOIN user AS u ON usrl.usr_id = u.id
        JOIN hakakses AS ha ON usrl.usg_level = ha.id
        JOIN jabatan AS j ON usrl.jabatan_id = j.id
        JOIN grupjabatan AS gj ON usrl.jabatan_grup_id = gj.id
        JOIN tipeuser AS tu ON usrl.usertipe_id = tu.id
        JOIN subsatker AS s ON usrl.subsatker_id = s.id;');
        return $query->getResult();
    }

    function ambil_data_user()
    {
        $query = $this->db->query('SELECT * FROM user AS u WHERE u.status_user = "Y"');
        return  $query->getResult();
    }

    function ambil_data_user_byid($id_user)
    {
        $query = $this->db->query('SELECT * FROM user AS u WHERE u.status_user = "Y" AND u.id = ?', array($id_user));
        return  $query->getResult();
    }
    
    function ambil_data_hakakses()
    {
        $query = $this->db-> query('SELECT * FROM hakakses AS ha WHERE ha.status = "1"');
        return $query->getResult();
    }
    
    function ambil_data_jabatan()
    {
        $query = $this->db-> query('SELECT * FROM jabatan AS j WHERE j.status = "1"');
        return $query->getResult();
    }
    function ambil_data_grupjabatan()
    {
        $query = $this->db-> query('SELECT * FROM grupjabatan AS gj WHERE gj.status = "1"');
        return $query->getResult();
    }
    function ambil_data_tipeuser()
    {
        $query = $this->db-> query('SELECT * FROM tipeuser AS tu WHERE tu.status = "1"');
        return $query->getResult();
    }
    function ambil_data_subsatker()
    {
        $query = $this->db-> query('SELECT * FROM subsatker AS s WHERE s.status = "1"');
        return $query->getResult();
    }
    function addUserrole($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('userrole');
        return $builder->insert($data);
    }
    function editUserrole($id)
    {
        $query = $this->db->query("SELECT usrl.*, u.nama_lengkap, u.email
        FROM userrole AS usrl 
        JOIN user AS u ON usrl.usr_id = u.id 
        WHERE usrl.usr_id = ?", array($id));
        return $query->getResult();
    }
    function updateUserRole($id, $data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('userrole');
        $builder->where('usr_id', $id);
        return $builder->update($data);
    }
    function hapusUserRole($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('userrole');
        $builder->where('usr_id', $id);
        return $builder->delete();
    }
}
