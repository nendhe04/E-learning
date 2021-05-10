<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Absen_model extends CI_Model
{
    public function __construct()

    {
        parent::__construct();
    }

    public function getIndex()
    {
        return $this->db->query("SELECT
		mk.id_mapel_kelas,
		mk.KodeMapel,
		mp.NamaMapel,
		mk.KodeKelas,
		mk.KodeGuru,
		gu.id_user FROM 
		mapel_kelas AS mk
		INNER JOIN mapel AS mp ON mp.KodeMapel = mk.KodeMapel
		INNER JOIN guru AS gu ON gu.KodeGuru = mk.KodeGuru
		");
    }

    public function absenSiswa($id)
    {
        return $this->db->query('SELECT
        si.NamaSiswa,
        ab.id_absen,
        ab.no_induk,
        ab.`keterangan`,
        ab.id_absen_siswa,
        si.NISN
        FROM
        absen_siswa AS ab
        INNER JOIN siswa AS si ON ab.no_induk = si.no_induk
        WHERE
        ab.id_absen = '.$id);
    }
    
    public function absensi($kelas,$mapel,$id)
        {
            return $this->db->query('SELECT
            ab.`keterangan`,
            asn.tanggal,
            asn.jam_mulai,
            asn.jam_selesai,
            gr.NamaGuru
            FROM
            absen_siswa AS ab
            INNER JOIN absen AS asn ON ab.id_absen = asn.id_absen
            INNER JOIN guru AS gr ON asn.KodeGuru = gr.KodeGuru
            WHERE
            asn.KodeKelas = "'. $kelas . '" AND
            asn.KodeMapel = "' . $mapel . '" AND
            ab.no_induk = "' .$id . '"');
            
        }
}
