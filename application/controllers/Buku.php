<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 'login'){
			redirect(site_url('login'));
		}
		
		$this->load->model('buku_model');
		$this->load->model('user_model');
	}

	public function index(){
		redirect(site_url());
	}

	public function items($slug = NULL){
		$data['buku'] = $this->buku_model->show_buku($slug);

		if($data['buku'] == NULL){
			show_404();
		}
		$data['title'] = $data['buku']['judul_buku'];
		$this->load->view('template/header_sidebar', $data);
		$this->load->view('buku/items', $data);
		$this->load->view('template/footer_sidebar');
	}

	public function pinjam($slug = NULL){
		if($slug == NULL){
			show_404();
		}

		$data['buku'] = $this->buku_model->show_buku($slug);

		if($data['buku'] == NULL){
			show_404();
		}

		$data['title']= $data['buku']['judul_buku'];

		$this->load->view('template/header_sidebar', $data);
		$this->load->view('buku/pinjam', $data);
		$this->load->view('template/footer_sidebar');
	}

	public function proses_pinjam($id = NULL){
		if($id == NULL){
			show_404();
		}

		$cek_buku = $this->buku_model->show_buku_id($id);
		if($cek_buku == NULL){
			show_404();
		}

		if($this->buku_model->jumlah_buku_dipinjam()->num_rows() >= 2){
			$data['title'] = 'Gagal meminjam';

			$this->load->view('template/header_sidebar', $data);
			$this->load->view('peminjaman/gagal_pinjam');
			$this->load->view('template/footer_sidebar');
		} else {

			$data = array(
				'tgl_pinjam' => date('Y-m-d'),
				'peminjam' => $this->session->userdata('id_anggota'),
				'buku' => $id,
			);

			$this->buku_model->pinjam($data);
			$this->buku_model->kurangi_buku($id);
			$this->buku_model->tambah_buku_user();
			redirect(site_url());

		}
	}
}