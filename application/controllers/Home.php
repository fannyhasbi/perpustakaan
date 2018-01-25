<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('buku_model');
	}

	public function index(){
		if($this->session->userdata('status') == 'login'){
			$data['title'] = 'Daftar Buku';
			$data['buku'] = $this->buku_model->show_buku();

			$this->load->view('template/header_sidebar', $data);
			$this->load->view('buku/index', $data);
			$this->load->view('template/footer_sidebar');
		} else {
			$this->load->view('home/index');
		}
	}

	public function notfound(){
		show_404();
	}
}
