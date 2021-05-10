<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Siswa_model');
        
        // //anti bypass
        if ($this->session->userdata('level') == "1") {
            redirect('/admin/overview');
        } elseif ($this->session->userdata('level') == "2") {
            redirect('/guru/overviewGuru');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
	}

    public function ujian()
    {
        $data['nama'] = $this->session->userdata('NamaSiswa');
        $data['ujian']= $this->Siswa_model->getUjianSiswa($this->session->userdata('id_User'))->result();
        $data['jawaban']=$this->Siswa_model->view_where('jawaban',array('no_induk'=>$this->session->userdata('id_User')))->result();
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/ujian',$data);
    }

    public function masukUjian($id,$waktu)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['nama'] = $this->session->userdata('NamaSiswa');
        $data['id_ujian']=$id;
        $data['waktu']=date('Y-m-d H:i',strtotime('+'.$waktu.' minutes',strtotime(date('Y-m-d H:i'))));
        $data['ujian']= $this->Siswa_model->getmasukUjianSiswa($id)->result();
        $data['soal_ujian']= $this->Siswa_model->getSoalUjian($id)->result();
        $this->load->view('siswa/headerSiswa',$data);
        $this->load->view('siswa/masukUjian',$data);
    }

    public function koreksiUjian($id_siswa,$id_ujian)
    {
        date_default_timezone_set('Asia/Jakarta');
        $soal_ujian= $this->Siswa_model->getSoalUjian($id_ujian)->result();
        $jumlah_soal= count($soal_ujian);
        $jawaban=array();
        $nilai=0;
        for ($i=0; $i <$jumlah_soal ; $i++) {
            $jawaban[]=$soal_ujian[$i]->id_soal.':'.$this->input->post($soal_ujian[$i]->id_soal);
            if ($soal_ujian[$i]->tipe == 1) {
                if ($soal_ujian[$i]->jawaban_pilgan == $this->input->post($soal_ujian[$i]->id_soal)) {
                    $nilai=+1;
                }
            }
        }
        $tes_jawaban=implode(',', $jawaban);
        $nilai_total=(($nilai/3)/$jumlah_soal)*100;
        $dataJawaban=array(
            'id_ujian'=>$id_ujian,
            'no_induk'=>$id_siswa,
            'jawaban'=>$tes_jawaban,
            'nilai_pilgang'=>$nilai*3,
            'nilai_total'=>$nilai_total,
            'jumlah_soal'=>$jumlah_soal,
            'tgl'=>date('Y-m-d H:i')
        );
        $this->Siswa_model->insert($dataJawaban,'jawaban');
        redirect('siswa/ujian/ujian');
    }

}
?>