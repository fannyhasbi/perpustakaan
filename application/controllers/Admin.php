<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != 'login_admin'){
			show_404();
		}

		$this->load->model('admin_model');
	}

	/******
		Start bagian Admin
	*******/
	public function logout(){
		$this->admin_model->admin_offline();
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function setting(){
		$where = array(
			'id_admin' => $this->session->userdata('id_admin')
		);
		$data['title'] = 'Setting';
		$data['admin'] = $this->admin_model->data_admin($where);

		//Action message
		$data['success'] = NULL;
		$data['error'] = NULL;

		if($this->input->post('ubah_pass')){
			$pass = $this->input->post('password');
			$pass2= $this->input->post('password2');
			$hash = md5($pass);

			if($pass != $pass2){
				$data['error'] = 'Password tidak sama!';
			} else {

				if($hash == $data['admin']['password']){
					$data['error'] = 'Tidak boleh menggunakan password lama';
				} else {
					$this->admin_model->ubah_pass($hash);
					$data['success'] = 'Password berhasil diubah';
				}
			}
		}

		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/setting', $data);
		$this->load->view('template/admin_footer_sidebar');

	}

	/******
		End bagian admin
	******/


	/******
		Start bagian buku
	******/
	public function buku(){
		$data['title'] = 'Daftar Buku';
		$data['buku'] = $this->admin_model->show_buku();


		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/buku/index', $data);
		$this->load->view('template/admin_footer_sidebar');
	}

	public function edit_buku($id){
		$data['buku'] = $this->admin_model->show_buku_id($id);
		$data['title'] = 'Edit | '. $data['buku']['judul_buku'];
		
		//Action message
		$data['success'] = NULL;

		if($this->input->post('edit_buku')){

			$this->admin_model->update_buku($id);
			$data['success'] = 'Buku berjudul '. $data['buku']['judul_buku'] .' berhasil diupdate';
		}

		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/buku/edit', $data);
		$this->load->view('template/admin_footer_sidebar');
	}

	public function tambah_buku(){
		$data['title'] = 'Tambah Buku';
		
		//Action message
		$data['success'] = NULL;

		if($this->input->post('tambah_buku')){
			$this->admin_model->tambah_buku();
			$data['success'] = 'Buku berhasil ditambahkan';
		}

		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/buku/tambah');
		$this->load->view('template/admin_footer_sidebar');
	}

	public function hapus_buku($id){
		$data['buku'] = $this->admin_model->show_buku_id($id);
		$data['title']= 'Hapus | '. $data['buku']['judul_buku'];

		if($this->input->post('hapus')){
			$this->admin_model->hapus_buku($id);
			redirect(site_url('admin/buku'));
		}


		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/buku/hapus', $data);
		$this->load->view('template/admin_footer_sidebar');
	}

	/******
		End bagian buku
	******/

	/******
		Start bagian anggota
	******/
	public function anggota(){
		$data['title'] = 'Daftar Anggota Perpustakaan';
		$data['anggota'] = $this->admin_model->show_anggota();

		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/anggota/index', $data);
		$this->load->view('template/admin_footer_sidebar');

	}

	public function detail_anggota($id){
		$data_anggota  = $this->admin_model->show_anggota($id);
		$data['title'] = 'Riwayat | '. $data_anggota['nama'];

		$data['anggota']  = $this->admin_model->riwayat_pinjam($id);

		if($data['anggota'] == NULL){
			$this->load->view('template/admin_header_sidebar', $data);
			$this->load->view('peminjaman/no_history');
			$this->load->view('template/admin_footer_sidebar');
		} else {
			$this->load->view('template/admin_header_sidebar', $data);
			$this->load->view('admin/anggota/detail', $data);
			$this->load->view('template/admin_footer_sidebar');
		}
	}

	public function edit_anggota($id){
		$data['anggota'] = $this->admin_model->show_anggota($id);
		$data['title'] = 'Edit | '. $data['anggota']['nama'];
		
		//Action message
		$data['success'] = NULL;

		if($this->input->post('edit_anggota')){
			$this->admin_model->update_anggota($id);
			$data['success'] = 'Data dengan username : <b>'. $data['anggota']['username'] .'</b> berhasil diupdate';
		} elseif ($this->input->post('reset_pass')){
			$this->admin_model->reset_pass_anggota($id);
			$data['success'] = 'Password dengan username : <b>'. $data['anggota']['username'] .'</b> berhasil direset. Password baru: <strong>123456</strong>';
		}

		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/anggota/edit', $data);
		$this->load->view('template/admin_footer_sidebar');
	}

	public function hapus_anggota($id){
		$data['anggota'] = $this->admin_model->show_anggota($id);
		$data['title']= 'Hapus | '. $data['anggota']['username'];


		if($this->input->post('nonaktif_anggota')){
			$this->admin_model->nonaktif_anggota($id);
			redirect(site_url('admin/anggota'));
		}
		elseif($this->input->post('hapus_anggota')){
			$this->admin_model->hapus_anggota($id);
			redirect(site_url('admin/anggota'));
		}

		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/anggota/hapus', $data);
		$this->load->view('template/admin_footer_sidebar');
	}

	public function aktif_anggota($id){
		$this->admin_model->aktif_anggota($id);
		redirect(site_url('admin/anggota'));
	}
	/******
		End bagian anggota
	******/

	/******
		Start bagian peminjaman
	******/
	public function peminjaman($waktu = NULL){

		switch ($waktu) {
			case 'index':
				$folder = 'index';
				$data['title'] = 'Data Peminjaman';
				
				break;

			case 'hari':
				$folder = 'hari';
				$data['title'] = 'Data Peminjaman Harian';
				$data['peminjaman'] = $this->admin_model->ambil_data_peminjaman($waktu);

				break;

			case 'minggu':
				$folder = 'minggu';
				$data['title'] = 'Data Peminjaman Mingguan';
				$data['peminjaman'] = $this->admin_model->ambil_data_peminjaman($waktu);

				break;

			case 'bulan':
				$folder = 'bulan';
				$data['title'] = 'Data Peminjaman Bulanan';
				$data['peminjaman'] = $this->admin_model->ambil_data_peminjaman($waktu);

				break;

			case 'tahun':
				$folder = 'tahun';
				$data['title'] = 'Data Peminjaman Tahunan';
				$data['peminjaman'] = $this->admin_model->ambil_data_peminjaman($waktu);

				break;
			
			default:
				show_404();
				break;
		}

		$this->load->view('template/admin_header_sidebar', $data);
		$this->load->view('admin/peminjaman/'.$folder, $data);
		$this->load->view('template/admin_footer_sidebar');
	}


}
