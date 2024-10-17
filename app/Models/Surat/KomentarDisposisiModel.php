<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class KomentarDisposisiModel extends Model
{
    protected $table = 'komentar_disposisi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'disposisi_id', 'user_id', 'parent_id', 'komentar'];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';

    protected $validationRules = [
        'id' => 'required|max_length[36]',
        'disposisi_id' => 'required|max_length[36]',
        'user_id' => 'required|max_length[36]',
        'komentar' => 'required'
    ];

    protected $validationMessages = [
        'id' => [
            'required' => 'ID komentar harus diisi.',
            'max_length' => 'ID komentar tidak boleh lebih dari 36 karakter.'
        ],
        'disposisi_id' => [
            'required' => 'ID disposisi harus diisi.',
            'max_length' => 'ID disposisi tidak boleh lebih dari 36 karakter.'
        ],
        'user_id' => [
            'required' => 'ID pengguna harus diisi.',
            'max_length' => 'ID pengguna tidak boleh lebih dari 36 karakter.'
        ],
        'komentar' => [
            'required' => 'Isi komentar harus diisi.'
        ]
    ];

    public function getKomentarByDisposisiId($disposisiId)
    {
        return $this->select('komentar_disposisi.*, user.nama_lengkap as nama_pengirim')
                    ->join('user', 'komentar_disposisi.user_id = user.id')
                    ->where('komentar_disposisi.disposisi_id', $disposisiId)
                    ->orderBy('komentar_disposisi.createdAt', 'ASC')
                    ->findAll();
    }
    function addKomentar($data)
    {
        return $this->insert($data);
    }
}
