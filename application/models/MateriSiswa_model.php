<?php

if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class MateriSiswa_model extends CI_Model
{
    public function __construct()

    {
        parent::__construct();
    }

    public function getView($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

    public function getMateriKelas($kelas,$mapel)
        {
            return $this->db->query('SELECT
            mt.id_materi,
            mt.KodeMapel,
            mt.KodeGuru,
            mt.judul,
            mt.isi,
            mt.file,
            mt.tgl_posting,
            mk.id AS id_materi_kelas,
            mk.KodeKelas,
            gr.NamaGuru
            FROM
            materi AS mt
            INNER JOIN materi_kelas AS mk ON mk.id_materi = mt.id_materi
            INNER JOIN guru AS gr ON gr.KodeGuru = mt.KodeGuru
            WHERE
            mt.KodeMapel = "' . $kodeMapel . '" AND 
            mk.KodeKelas = "' . $kodeKelas . '"');
        }
}
