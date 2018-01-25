<?php
class User_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function ambil_data($data){
		$query = $this->db->get_where('anggota', $data);
		return $query->row_array();
	}

	public function cek_login($data){
		return $this->db->get_where('anggota', $data);
	}

	public function cek_user_ada($username){
		return $this->db->get_where('anggota', array('username' => $username));
	}

	public function daftar($data){
		return $this->db->insert('anggota', $data);
	}

	public function update_password($hash){
		$this->db->where('id_anggota', $this->session->userdata('id_anggota'));
		$this->db->update('anggota', array('password' => $hash));
	}
}