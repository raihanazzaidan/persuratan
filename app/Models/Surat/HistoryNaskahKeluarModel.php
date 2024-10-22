<?php

namespace App\Models\Surat;

use CodeIgniter\Model;

class HistoryNaskahKeluarModel extends Model
{
    function getNaskahKeluar_id($id)
    {
        $query = $this->db->query('SELECT 
        sm.*,
        jn.nama AS nama_jn,
        sn.nama AS nama_sn,
        s.kode_subsatker, 
        s.nama_subsatker,
        jis.nama AS nama_jis,
        u.nama_lengkap AS nama_penerima,
        u.email AS email_penerima,
        CASE
            WHEN hnm.id IS NOT NULL AND hnm.status_dibaca = "belum" THEN "Belum Dibaca"
            WHEN hnm.id IS NOT NULL AND hnm.status_dibaca = "dibaca" THEN "Sudah Dibaca"
            WHEN hnm.id IS NOT NULL AND hnm.status_dibaca = "batal" THEN "Batal"
            END as status_dibaca,
        CASE
            WHEN hnm.id IS NOT NULL AND hnm.status_naskah = "terkirim" THEN "Belum Ditindak lanjut"
            WHEN hnm.id IS NOT NULL AND hnm.status_naskah = "Y" THEN "Selesai"
            WHEN hnm.id IS NOT NULL AND hnm.status_naskah = "N" THEN "Batal"
        END as status_naskah,
        CASE
        WHEN d.id IS NOT NULL AND d.status IS NULL THEN "Disposisi"
        WHEN d.id IS NOT NULL AND d.status = "Y" THEN "Selesai (Disposisi)"
        WHEN d.id IS NOT NULL AND d.status = "N" THEN "Batal (Disposisi)"
        END as status
        FROM registrasisuratmasuk AS sm
        JOIN jenisnaskah AS jn ON sm.jenis_naskah_id = jn.id
        JOIN sifatnaskah AS sn ON sm.sifat_naskah_id = sn.id
        JOIN subsatker AS s ON sm.tujuan_subsatker_id = s.id
        JOIN jenisinduksubsatker AS jis ON s.jenis_induk_subsatker = jis.id
        JOIN user AS u ON sm.tujuan_personal_id = u.id 
        LEFT JOIN disposisi AS d ON sm.id = d.id_surat
        LEFT JOIN historynaskahkeluar AS hnm ON sm.id = hnm.naskah_id
        WHERE sm.user_register = ?
        ORDER BY sm.tanggal_naskah DESC', array($id));
        return $query->getResult();
    }

    function getData_suratMasuk()
    {
        $query = $this->db->query('SELECT * FROM registrasisuratmasuk');
        return $query->getResult();
    }
    function getData_user()
    {
        $query = $this->db->query('SELECT * FROM user WHERE user.status_user = "Y"');
        return $query->getResult();
    }
    function getData_subsatker()
    {
        $query = $this->db->query('SELECT * FROM subsatker WHERE subsatker.status = "1"');
        return $query->getResult();
    }
    function addHistoryNaskahKeluar($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('historynaskahkeluar');
        return $builder->insert($data);
    }
}
