<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('MapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
        $this->load->model('Absen_model');

        // //anti bypass
        if ($this->session->userdata('level') == "1") {
            redirect('/admin/overview');
        } elseif ($this->session->userdata('level') == "3") {
            redirect('/siswa/overviewsiswa');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
        
	}

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->getKelas();
        $data['guru'] = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        $data['absenKelas'] = $this->MapelKelas_model->getIndex()->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/absenkelas', $data);
        
    }

    public function buatAbsen($kelas,$mapel)
    {
        // $guru = $this->Guru_model->getGuruById($this->session->userdata('id_User'));
        $data['KodeKelas']=$kelas;
        $data['KodeMapel']=$mapel;
        $data['kelas']=$this->Kelas_model->getKelasById($kelas)->result();
        $data['mapel']=$this->Mapel_model->getWhere('mapel',array('KodeMapel'=>$mapel))->result();
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/buatAbsenKelas', $data);
    }

    public function aturAbsen()
    {
        $KodeKelas = $this->input->post('KodeKelas');
        $KodeMapel = $this->input->post('KodeMapel');
        $tanggal = $this->input->post('tanggal');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $data = array(
            'KodeKelas' => $KodeKelas, 
            'KodeGuru' => $this->session->userdata('id_User'),
            'KodeMapel' => $KodeMapel, 
            'tanggal' => $tanggal, 
            'jam_mulai' => $jam_mulai, 
            'jam_selesai' => $jam_selesai
        );

        $id = $this->Absen_model->insert($data,'absen');

        $kelas_siswa = $this->Absen_model->view_where('kelas_siswa',array('KodeKelas'=>$KodeKelas,'aktif'=>1))->result();
        
        foreach ($kelas_siswa as $k) {
            $data = array('id_absen' => $id,'no_induk'=>$i->no_induk,'status'=>0);
            $this->Absen_model->insert($data,'absen_siswa');
        }

        redirect('guru/absen/absensi/'.$id);
    }

    public function absensi($id_absen)
    {
        $data['absen'] = $this->Absen_model->absenSiswa($id_absen)->result();
        
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/absenSiswa');
    }

    public function updateAbsenSiswa($id_absensi,$id_absen,$keterangan)
    {
        $data = array('keterangan' => $keterangan );
        $where = array('id' => $id_absensi);
        $this->Absen_model->update($data,$where,'absen_siswa');
        redirect('guru/absensi/'.$id_absen);
    }
    public function historyAbsen($kelas,$mapel)
    {
        $where = array('KodeKelas'=>$kelas,'KodeMapel'=>$mapel);
        $data['absen'] = $this->Absen_model->getTambah('absen',$where)->result();

        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/historyAbsen');
    }

}
?>