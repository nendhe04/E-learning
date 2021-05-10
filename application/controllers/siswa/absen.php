<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MapelKelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
        // $this->load->model('AbsenSiswa_model');

        // //anti bypass
        if ($this->session->userdata('level') == "1") {
            redirect('/admin/overview');
        } elseif ($this->session->userdata('level') == "2") {
            redirect('/guru/overviewGuru');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
	}

    public function index()
    {
        $data['data']=$this->Kelas_model->getKelas();
        $data['siswa']=$this->Siswa_model->getSiswaById($this->session->userdata('id_User'));
        $data['mapel']=$this->MapelKelas_model->getMapel()->result();
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/absenSiswa', $data);
        
    }

    public function listAbsen($kelas, $mapel)
    {
        {
            $data['absen']=$this->Absen_model->absensi($kelas,$mapel,$this->session->userdata('id_User'))->result();
            $this->load->view('siswa/headerGuru', $data);
            $this->load->view('siswa/cekAbsensi', $data);
        }
    }

}
?>