<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Guru_model extends CI_Model

{

	public function __construct()

	{

		parent::__construct();

	}


	public function getGuru()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('user', 'guru.id_user = user.id_user', 'LEFT OUTER');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getProfileGuru($id)
    {
        $this->db->where('KodeGuru', $id);
        return $this->db->get('guru');
    }
	
	public function updateImage($data,$id)
    {
        $this->db->where('KodeGuru', $id);
        $this->db->update('guru', $data);
    }

	public function getUjian($id)
    {
        return $this->db->query('SELECT DISTINCT ujian.id_ujian,judul,tgl_buat,tgl_selesai,waktu,ujian.id_mapel_kelas,mapel.NamaMapel as 
        mapel,kelas.NamaKelas as kelas,KodeKelas,mapel_ajar.KodeGuru FROM ujian 
        JOIN mapel_kelas on mapel_kelas.id_mapel_kelas = ujian.id_mapel_kelas
        JOIN mapel_ajar on mapel_ajar.id_mapel_kelas = mapel_kelas.id_mapel_kelas 
        JOIN mapel on mapel.KodeMapel = mapel_kelas.KodeMapel 
        JOIN kelas on kelas.KodeKelas = mapel_kelas.KodeKelas WHERE ujian.KodeGuru ='.$id);
    }

	public function getKelasPengajar($id)
    {
        return $this->db->query('SELECT DISTINCT id_mapel_kelas,mapel.NamaMapel as mapel,kelas.NamaKelas as kelas,KodeKelas FROM mapel_ajar 
            JOIN mapel_kelas on mapel_kelas.id_mapel_kelas = mapel_ajar.id_mapel_kelas 
            JOIN mapel on mapel.KodeMapel = mapel_kelas.KodeMapel 
            JOIN kelas on kelas.KodeKelas = mapel_kelas.KodeKelas 
            WHERE KodeGuru = '.$id.' ');
    }

    public function getUjianDetail($id)
    {
        return $this->db->query('SELECT ujian.id_ujian,judul,tgl_buat,tgl_selesai,waktu,id_mapel_kelas,mapel.NamaMapel as mapel,kelas.NamaKelas as kelas,KodeKelas FROM ujian 
            JOIN mapel_kelas on mapel_kelas.id_mapel_kelas = ujian.id_mapel_kelas 
            JOIN mapel on mapel.KodeMapel = mapel_kelas.KodeMapel
            JOIN kelas on kelas.KodeKelas = mapel_kelas.KodeKelas
            WHERE ujian.id_ujian = '.$id);
    }

	public function getSoalUjian($id)
    {
        return $this->db->query('SELECT * FROM ujian_soal JOIN soal USING(id_soal) WHERE ujian_soal.id_ujian= '.$id);
    }

	public function update($data,$where,$table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

	public function delete($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

	public function insert($data,$table)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

	public function view($table)
    {
        return  $this->db->get($table);
    }

	public function getView($table,$where)
    {
        return  $this->db->get_where($table,$where);
    }

	public function insertGuru()
	{
		$data = array(
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'NamaGuru' => $this->input->post('NamaGuru'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'id_user' => $this->input->post('id_user'),
			);

		$this->db->insert('guru', $data);

	}

	public function getGuruById($id)
	{
		$this->db->join('user', 'guru.id_user = user.id_user', 'LEFT');
		$this->db->where('guru.id_user', $id);
		return $this->db->get('guru')->row();
	}

	public function editGuru($id)
	{
		$data = array(
			'KodeGuru' => $this->input->post('KodeGuru'), 
			'NamaGuru' => $this->input->post('NamaGuru'),
			'NIP' => $this->input->post('NIP'),
			'JenisKelamin' => $this->input->post('JenisKelamin'),
			'id_user' => $this->input->post('id_user'),
			);
		$this->db->where('KodeGuru', $id);
		$this->db->update('guru', $data);
	}

	public function hapusGuru($id)
	{
		$this->db->where('KodeGuru', $id);
		$this->db->delete('guru');

	}

	// public function editPass($id)
	// {
	// 	$data = array('password' => md5($this->input->post('pwbaru')) );

	// 	$this->db->where('KodeGuru', $id);
	// 	$this->db->update('guru', $data);
	// }

	public function getUserById($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user')->result();
	}

	public function editUser($id)
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),	
			'nama' => $this->input->post('nama'), 
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
			);

		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

	public function hapusUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');	
	}

}
?>