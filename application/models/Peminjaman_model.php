<?php
class Peminjaman_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function ambil_data(){
		$this->db->select('pinjam.id_pinjam, buku.judul_buku, pinjam.tgl_pinjam, pinjam.tgl_kembali, pinjam.status, datediff(date(now()), date(pinjam.tgl_pinjam)) as jangka_pinjam');
		$this->db->from('pinjam');
		$this->db->join('buku', 'pinjam.buku = buku.id_buku');
		$this->db->join('anggota', 'pinjam.peminjam = anggota.id_anggota');
		$this->db->where('pinjam.peminjam = '. $this->session->userdata('id_anggota'));
		$this->db->order_by('id_pinjam', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function ambil_buku($id){
		return $this->db->get_where('buku', array('id_buku' => $id));
	}

	public function data_pinjam($id){
		$query = $this->db->get_where('pinjam', array('id_pinjam' => $id));
		return $query->row_array();
	}

	public function update_status_pinjam($id){
		$data = array(
			'status' => 'kembali',
			'tgl_kembali' => date('Y-m-d')
		);

		$this->db->where('id_pinjam', $id);
		$this->db->update('pinjam', $data);
	}

	public function tambah_buku($id){
		$this->db->where('id_buku', $id);
		$this->db->set('jumlah', 'jumlah+1', FALSE);
		$this->db->update('buku');
	}
}