<?php

if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Login_model extends CI_Model

{

public function __construct()

{

parent::__construct();

}

public function takeUser($username, $password, $level)

{

$this->db->select('elearningta');

$this->db->from('user');

$this->db->where('username', $username);

$this->db->where('password', $password);

$this->db->where('level', $level);

$query = $this->db->get('elearningta');

return $query->num_rows();

}

public function userData($username)

{

$this->db->select('username');

$this->db->select('name');

$this->db->where('username', $username);

$query = $this->db->get('user');

return $query->row();

}

}
