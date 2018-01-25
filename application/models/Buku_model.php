<?php
class Buku_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function show_buku($slug = FALSE){
		if($slug === FALSE){
			$query = $this->db->get('buku');
			return $query->result_array();
		}

		$query = $this->db->get_where('buku', array('slug' => $slug));
		return $query->row_array();
	}

	public function show_buku_id($id){
		return $this->db->get_where('buku', array('id_buku' => $id));
	}

	//Awal proses pinjam
	public function jumlah_buku_dipinjam(){
		$where = array(
			'peminjam' => $this->session->userdata('id_anggota'),
			'status' => 'belum'
		);
		return $this->db->get_where('pinjam', $where);
	}

	public function pinjam($data){
		return $this->db->insert('pinjam', $data);
	}

	public function kurangi_buku($id){
		$this->db->where('id_buku', $id);
		$this->db->set('jumlah', 'jumlah-1', FALSE);
		$this->db->update('buku');
	}

	public function tambah_buku_user(){
		$this->db->where('id_anggota', $this->session->userdata('id_anggota'));
		$this->db->set('jumlah_pinjam', 'jumlah_pinjam+1', FALSE);
		$this->db->update('anggota');
	}
	//Akhir proses pinjam
}