<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MapelKelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
        $this->load->model('MateriSiswa_model');

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
        $this->load->view('siswa/materiSiswa', $data);
        
    }

    public function listMateri($kodeKelas,$kodeMapel)
    {
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['mapel']=$this->MateriSiswa_model->getView('mapel',array('KodeMapel'=>$kodeMapel))->result();
        $data['materi']=$this->MateriSiswa_model->getMateriKelas($kodeKelas,$kodeMapel)->result();
        $this->load->view('siswa/headerSiswa');
        $this->load->view('siswa/listmateri',$data);
    }

    public function detailMateri($idmateri)
    {
        $data['materi'] = $this->siswa_model->view_where('materi',array('id_materi'=>$idmateri))->result();
        
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/detailmateri',$data);
    }

    public function download($nama)
    {
        $pth = file_get_contents(base_url()."assets/materi/".$nama);
        force_download($nama, $pth);
    }

}
?>