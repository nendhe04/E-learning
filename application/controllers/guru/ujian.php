<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('MapelKelas_model');
        $this->load->model('Kelas_model');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
        $this->load->model('Ujian_model');

        // //anti bypass
        if ($this->session->userdata('level') == "1") {
            redirect('/admin/overview');
        } elseif ($this->session->userdata('level') == "3") {
            redirect('/siswa/overviewsiswa');
        } elseif (!$this->session->userdata('level')) {
            redirect('/login');
        }
        
	}

    public function ujian()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->Guru_model->getUjian($this->session->userdata('id_User'))->result();
        $data['mapel'] = $this->Guru_model->getKelasPengajar($this->session->userdata('id_User'))->result();
        $this->load->view('guru/headerGuru',$data);
        $this->load->view('guru/ujian',$data);
    }

    public function buatUjian()
    {
       $values=array(
            'judul'=>$this->input->post('nama'),
            'tgl_buat'=>date('Y-m-d H:i'),
            'tgl_selesai'=>$this->input->post('tgl').' '.$this->input->post('jam'),
            'waktu'=>$this->input->post('waktu'),
            'id_mapel_kelas'=>$this->input->post('mapelKelas'),
            'KodeGuru'=>$this->session->userdata('KodeGuru')
        );
        $this->Guru_model->insert($values,'ujian');
        redirect('guru/ujian');
    }

    public function detailUjian($id)
    {
        $data['id_ujian']=$id;
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->Guru_model->getUjianDetail($id)->result();
        $data['mapel'] = $this->Guru_model->getKelaPengajar($this->session->userdata('id_User'))->result();
        $data['soal']= $this->Guru_model->getView('soal',array('KodeGuru'=>$this->session->userdata('id_User')))->result();
        $data['soal_ujian']= $this->Guru_model->getSoalUjian($id)->result();
        
        $this->load->view('guru/headerGuru', $data);
        $this->load->view('guru/ujian/detailUjian',$data);
    }

    public function hasilUjian($id)
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian']= $this->Guru_model->view('ujian')->result();
        $data['siswa']= $this->Guru_model->view('siswa')->result();
        $data['jawaban']= $this->Guru_model->getView('jawaban',array('id_ujian'=>$id))->result();
        $data['id_ujian']=$id;
        
        $this->load->view('guru/headerGuru',$data);
        $this->load->view('guru/hasilUjian',$data);
    }

    public function updateUjian($id)
    {
        $values=array(
            'judul'=>$this->input->post('nama'),
            'tgl_buat'=>date('Y-m-d H:i'),
            'tgl_selesai'=>$this->input->post('tgl').' '.$this->input->post('jam'),
            'waktu'=>$this->input->post('waktu'),
            'id_mapel_kelas'=>$this->input->post('mapelKelas'),
            'KodeGuru'=>$this->session->userdata('id_User')
        );
        $this->Guru_model->update($values,array('id_ujian'=>$id),'ujian');
        redirect('Guru/ujian/ujian');
    }
    public function soal()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['soal']= $this->Guru_model->getView('soal',array('KodeGuru'=>$this->session->userdata('id_User')))->result();
        $this->load->view('guru/headerGuru',$data);
        $this->load->view('guru/soal',$data);
    }

    public function simpanSoal($tipe,$id_ujian)
    {
        $insert_id='';
        if ($tipe==1) {
            $values=array(
                'pertanyaan'=>$this->input->post('pertanyaan'),
                'pilgan_a'=>'A.'.$this->input->post('pilgan_a'),
                'pilgan_b'=>'B.'.$this->input->post('pilgan_b'),
                'pilgan_c'=>'C.'.$this->input->post('pilgan_c'),
                'jawaban_pilgan'=>$this->input->post('jawaban_pilgan'),
                'tipe'=>$tipe,
                'KodeGuru'=>$this->session->userdata('id_User')
            );
        $insert_id=$this->Guru_model->insert($values,'soal');
        }elseif ($tipe==2) {
            $values=array(
                'pertanyaan'=>$this->input->post('pertanyaan'),
                'tipe'=>$tipe,
                'KodeGuru'=>$this->session->userdata('id_User')
            );
        $insert_id=$this->Guru_model->insert($values,'soal');
        }
        $data=array(
                'id_ujian'=>$id_ujian,
                'id_soal'=>$insert_id,
            );
            $this->Guru_model->insert($data,'ujian_soal');
        redirect('guru/ujian/detailUjian/'.$id_ujian);
    }
    public function tambahSoalUjian($id)
    {
        $daftarSoal=$this->input->post('pertanyaan');
        for ($i=0; $i <count($daftarSoal) ; $i++) { 
            $data=array(
                'id_ujian'=>$id,
                'id_soal'=>$daftarSoal[$i],
            );
            $this->Guru_model->insert($data,'ujian_soal');
        }
        redirect('guru/ujian/detailUjian/'.$id);
    }
    public function nilaiEssay($id,$id_ujian)
    {
        $nilaiEssay=$this->input->post('nilai_essay');
        $nilaiPG= $this->input->post('nilai_pilgan');
        $jumlahSoal= $this->input->post('jumlah_soal');
        $nilai_total=((($nilaiEssay+$nilaiPG)/3)/$jumlahSoal)*100;
        $values=array(
            'nilai_essay'=>$this->input->post('nilai_essay'),
            'nilai_total'=>$nilai_total
        );

        $this->guru_model->update($values,array('jawaban'=>$id),'jawaban');
        redirect('guru/ujian/hasilUjian/'.$id_ujian);
    }
    public function hapusSoal($id)
    {
        $this->Guru_model->delete(array('soal'=>$id),'soal');
        redirect('guru/ujian/soal/');
    }
    public function hapusSoalUjian($id,$id_ujian)
    {
        $this->Guru_model->update(array('id_ujian_soal'=>$id),'ujian_soal');
        redirect('guru/ujian/detailUjian/'.$id_ujian);
    }

    public function hapusUjian($id)
    {
        $this->Ujian_model->delete(array('id_ujian'=>$id),'ujian');
        redirect('guru/ujian/ujian');
    }

}
?>