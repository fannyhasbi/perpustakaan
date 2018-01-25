<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('search_model');
	}

	public function user($username){
		$data['bio'] = $this->search_model->ambil_data($username);

		if($data['bio'] === NULL){
			show_404();
		} else {
			$this->load->view('search/user', $data);
		}
	}
}