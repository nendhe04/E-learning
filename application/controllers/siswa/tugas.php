<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('MapelKelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
        $this->load->model('Kelas_model');
		$this->load->model('TugasSiswa_model');

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
        $this->load->view('siswa/tugaskelas', $data);
        
    }

    public function listTugas()
    {
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['mapel']=$this->Mapel_model->getIndex('mapel',array('KodeMapel'=>$kodeMapel))->result();
        $data['tugas']=$this->TugasSiswa_model->getTugasKelas($kodeKelas,$kodeMapel)->result();
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/listTugas',$data);
    }

    public function detailTugas($idtugas,$mapelid,$kelas)
    {
        $data['tugas'] = $this->TugasSiswa_model->getTambah('tugas',array('id_tugas'=>$idtugas))->result();
        $data['nilai'] = $this->TugasSiswa_model->getTambah('tugas_pengumpulan',array('id_tugas'=>$idtugas,'no_induk'=>$this->session->userdata('id_User')))->result();
        $data['KodeKelas'] = $kodeKelas;
        $data['KodeMapel'] = $kodeMapel;
        $data['tugas_id'] = $idtugas;
        $this->load->view('siswa/headerSiswa', $data);
        $this->load->view('siswa/detailtugas',$data);
    }

    public function uploadTugas()
    {
        $no_induk = $this->session->userdata('id_User');
        $kodeKelas = $this->input->post('KodeKelas');
        $idtugas = $this->input->post('tugas_id');
        $kodeMapel = $this->input->post('KodeMapel');
        
        $config['upload_path']          = './assets/tugas/';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('tugas');
        if (!$upload){
            $data['error'] = $this->upload->display_errors();
            $data['tugas'] = $this->TugasSiswa_model->getTambah('tugas',array('id_tugas'=>$idtugas))->result();
            $data['KodeKelas'] = $kodeKelas;
            $data['KodeMapel'] = $kodeMapel;
            $data['tugas_id'] = $idtugas;
            $this->load->view('siswa/headerSiswa');
            $this->load->view('siswa/detailtugas',$data);
        }else{
            $upload = $this->upload->data();
            $pengumpulan = array(
                'KodeKelas' => $kodeKelas , 
                'no_induk' => $no_induk , 
                'tugas_id' => $idtugas ,
                'file' => $upload['file_name'],
                'nilai' => 0,
            );
            $this->session->set_flashdata('success', 'Tugas Berhasil di upload tinggal menunggu hasil nilai');
            $this->TugasSiswa_model->insert($pengumpulan,'tugas_pengumpulan');
            redirect('siswa/tugas/detailTugas/'.$idtugas.'/'.$kodeMapel.'/'.$kodeKelas);
        }

    }

    public function download($nama)
    {
        $pth = file_get_contents(base_url()."assets/tugas/".$nama);
        force_download($nama, $pth);
    }

}
?>