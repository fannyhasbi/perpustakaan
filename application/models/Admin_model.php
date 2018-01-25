<?php
class Admin_model extends CI_Model {
	
	public function __construct(){
		$this->load->database();
	}

	/******
		Start Bagian Admin
	******/
	public function cek_login($where){
		return $this->db->get_where('admin', $where);
	}

	public function data_admin($where){
		$query = $this->db->get_where('admin', $where);
		return $query->row_array();
	}

	public function admin_online($where){
		$this->db->where($where);
		$this->db->update('admin', array('status' => 'online'));
	}

	public function admin_offline(){
		$this->db->where('id_admin', $this->session->userdata('id_admin'));

		date_default_timezone_set('Asia/Jakarta'); //Mengganti GMT+07.00

		$data = array(
			'status' => 'offline',
			'last_seen' => date('Y-m-d H:i:s')
		);
		$this->db->update('admin', $data);
	}

	public function ubah_pass($hash){
		$data = array(
			'password' => $hash
		);

		$this->db->where('id_admin', $this->session->userdata('id_admin'));
		$this->db->update('admin', $data);
	}

	/******
		End Bagian Admin
	******/

	/******
		Start Bagian Buku
	******/
	public function show_buku($slug = FALSE){
		if($slug == FALSE){
			$query = $this->db->get('buku');
			return $query->result_array();
		}

		$query = $this->db->get_where('slug', array('slug' => $slug));
		return $query->row_array();
	}

	public function show_buku_id($id){
		$query = $this->db->get_where('buku', array('id_buku' => $id));
		return $query->row_array();
	}

	public function update_buku($id){
		$this->db->set('judul_buku', $this->input->post('judul'));
		$this->db->set('pengarang', $this->input->post('pengarang'));
		$this->db->set('deskripsi', $this->input->post('deskripsi'));
		$this->db->set('jumlah', $this->input->post('jumlah'), FALSE);

		$this->db->where('id_buku', $id);
		$this->db->update('buku');
	}

	public function tambah_buku(){
		$slug = url_title($this->input->post('judul'), 'dash', TRUE);
		//Memastikan tidak ada slug yang sama
		if($this->db->get_where('buku', array('slug' => $slug))->num_rows() > 0){
			$slug = $slug . "-" . rand(0,10);
		}

		$this->db->set('judul_buku', $this->input->post('judul'));
		$this->db->set('pengarang', $this->input->post('pengarang'));
		$this->db->set('deskripsi', $this->input->post('deskripsi'));
		$this->db->set('jumlah', $this->input->post('jumlah'), FALSE);
		$this->db->set('slug', $slug);

		$this->db->insert('buku');
	}

	public function hapus_buku($id){
		$this->db->where('id_buku', $id);
		$this->db->delete('buku');
	}

	/******
		End Bagian Buku
	******/

	/******
		Start Bagian Anggota
	******/
	public function show_anggota($id = FALSE){
		if($id == FALSE){
			$query = $this->db->get('anggota');
			return $query->result_array();
		}

		$query = $this->db->get_where('anggota', array('id_anggota' => $id));
		return $query->row_array();
		
	}

	public function riwayat_pinjam($id){
		$this->db->select('pinjam.id_pinjam, buku.judul_buku, pinjam.tgl_pinjam, pinjam.tgl_kembali, pinjam.status');
		$this->db->from('pinjam');
		$this->db->join('buku', 'pinjam.buku = buku.id_buku');
		$this->db->join('anggota', 'pinjam.peminjam = anggota.id_anggota');
		$this->db->where('pinjam.peminjam = '. $id);
		$this->db->order_by('id_pinjam', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_anggota($id){
		$this->db->set('username', $this->input->post('username'));
		$this->db->set('nama', $this->input->post('nama'));
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota');
	}

	public function reset_pass_anggota($id){
		$this->db->set('password', md5(123456));
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota');
	}

	public function nonaktif_anggota($id){
		$this->db->set('status', '0', FALSE);
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota');
	}

	public function aktif_anggota($id){
		$this->db->set('status', '1', FALSE);
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota');
	}

	public function hapus_anggota($id){
		$this->db->where('id_anggota', $id);
		$this->db->delete('anggota');
	}
	/******
		End Bagian Anggota
	******/

	/******
		Start Bagian Peminjaman
	******/
	public function ambil_data_peminjaman($waktu){
		switch($waktu){
			case 'hari':
				$this->db->select("DATE_FORMAT(pinjam.tgl_pinjam, '%d %M %Y') AS tanggal, COUNT(pinjam.id_pinjam) AS jumlah_pinjam");
				$this->db->from('pinjam');
				$this->db->group_by('tanggal');
				$this->db->order_by('tanggal ASC');

				$query = $this->db->get();
				return $query->result_array();

				break;

			case 'minggu':
				$this->db->select("CONCAT('Minggu ke-', WEEK(pinjam.tgl_pinjam), ' bulan ', DATE_FORMAT(pinjam.tgl_pinjam, '%M')) AS minggu, COUNT(pinjam.id_pinjam) AS jumlah_pinjam");
				$this->db->from('pinjam');
				$this->db->group_by('minggu');
				$this->db->order_by('minggu ASC');

				$query = $this->db->get();
				return $query->result_array();

				break;

			case 'bulan':
				$this->db->select("DATE_FORMAT(pinjam.tgl_pinjam, '%c') AS bulan, COUNT(pinjam.id_pinjam) AS jumlah_pinjam");
				$this->db->from('pinjam');
				$this->db->group_by('bulan');

				$query = $this->db->get();
				return $query->result_array();

				break;

			case 'tahun':
				$this->db->select("YEAR(pinjam.tgl_pinjam) AS tahun, COUNT(pinjam.id_pinjam) as jumlah_pinjam");
				$this->db->from('pinjam');
				$this->db->group_by('tahun');

				$query = $this->db->get();
				return $query->result_array();

				break;

			default: echo "Error"; break;
		}
		
	}


}