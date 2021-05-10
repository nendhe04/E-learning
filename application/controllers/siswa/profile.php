<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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

    public function profile()
    {
        $data['profile'] = $this->Siswa_model->getProfileSiswa($this->session->userdata('id_User'))->result();
        $this->load->view('siswa/headerSiswa'. $data);
        $this->load->view('siswa/profile',$data);
    }
    
    public function updateGambar()
    {
        $config['upload_path']          = './assets/images/user/';
        $config['allowed_types']        = 'jpg|jpeg|png';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('file-input');
        if (!$upload){
            $data['profile'] = $this->Siswa_model->getProfileSiswa($this->session->userdata('id_User'))->result();
            $this->session->set_flashdata('error', $this->upload->display_errors());
            
            $this->load->view('siswa/headerSiswa', $data);
            $this->load->view('siswa/profile',$data);
        }else{
            $upload = $this->upload->data();
            $data = array(
                'foto' => $upload['file_name']
            );
            $array = array(
                'foto' => $upload['file_name']
            );
            $this->session->set_userdata( $array );
            $this->Siswa_model->updateImage($data,$this->session->userdata('id_User'));
            redirect('siswa/profile');
        }
    }

}
?>