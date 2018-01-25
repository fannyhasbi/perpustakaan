<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 'login'){
			redirect(site_url());
		}

		$this->load->model('peminjaman_model');
	}

	public function riwayat(){
		$data['title'] = 'Riwayat peminjaman';
		$data['pinjam']  = $this->peminjaman_model->ambil_data();

		if($data['pinjam'] == NULL){
			$this->load->view('template/header_sidebar', $data);
			$this->load->view('peminjaman/no_history');
			$this->load->view('template/footer_sidebar');
		} else {
			$this->load->view('template/header_sidebar', $data);
			$this->load->view('peminjaman/riwayat', $data);
			$this->load->view('template/footer_sidebar');
		}
	}

	public function kembali($id = NULL){
		if($id == NULL){
			show_404();
		}

		$cek_pinjam = $this->peminjaman_model->data_pinjam($id);
		if($cek_pinjam == NULL){
			show_404();
		}

		$this->peminjaman_model->update_status_pinjam($id);
		$this->peminjaman_model->tambah_buku($cek_pinjam['buku']); //buku telah dikembalikan. So, jumlah buku ditambah lagi
		redirect(site_url('peminjaman/riwayat'));
	}
}
