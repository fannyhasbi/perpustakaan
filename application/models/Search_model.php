<?php
class Search_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function ambil_data($username = FALSE){
		if($username === FALSE){
			show_404();
		}

		$query = $this->db->get_where('anggota', array('username' => $username));
		return $query->row_array();
	}
}