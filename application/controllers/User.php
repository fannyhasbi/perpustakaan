<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('admin_model');
	}

	public function login(){
		if($this->session->userdata('status') == 'login'){
			redirect(site_url());
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('home/login');	
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = array(
				'username' => $username,
				'password' => md5($password)
			);

			$cek = $this->user_model->cek_login($where)->num_rows();

			if($cek > 0){
				$cek_status = $this->user_model->ambil_data($where);

				if($cek_status['status'] != 1){
					echo "Akun sudah tidak aktif";
				} else {
					$user_data = $this->user_model->ambil_data($where);

					$session_data = array(
						'nama' => $user_data['nama'],
						'username' => $username,
						'id_anggota'=> $user_data['id_anggota'],
						'status' => 'login'
					);

					$this->session->set_userdata($session_data);
					redirect(site_url());
				}
			} else {
				echo "Username dan password salah";
			}
		}
	}

	public function login_admin(){

		if($this->session->userdata('status') == 'login_admin'){
			$data['title'] = 'Admin Homepage';

			$this->load->view('template/admin_header_sidebar', $data);
			$this->load->view('admin/index');
			$this->load->view('template/admin_footer_sidebar');
		} else {

			if($this->input->post('login_admin')){
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$where = array(
					'username' => $username,
					'password' => md5($password)
				);

				$cek_login = $this->admin_model->cek_login($where);

				if($cek_login->num_rows() > 0){
					$data_admin = $this->admin_model->data_admin($where);

					$session_data = array(
						'id_admin' => $data_admin['id_admin'],
						'username' => $username,
						'nama'		 => $data_admin['nama'],
						'status' 	 => 'login_admin'
					);

					$this->session->set_userdata($session_data);
					$this->admin_model->admin_online($where);
					redirect(site_url('admin'));
				} else {
					echo "Username dan password salah";
				}

			} else {
				$this->load->view('admin/login');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function daftar(){
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('home/daftar');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');

			$cek = $this->user_model->cek_user_ada($username);

			if($cek->num_rows() != 0){
				echo "Username sudah terpakai";
			} else {
				$data = array(
					'username' => $username,
					'password' => md5($password),
					'nama'  => $nama,
					'status'=> 1
				);
				$this->user_model->daftar($data);
				redirect(site_url());
			}
		}
	}

	public function setting(){
		if($this->session->userdata('status') != 'login'){
			redirect(site_url());
		}

		$where = array('username' => $this->session->userdata('username'));

		$data['title'] = 'Setting | '. $this->session->userdata('username');
		$data['bio'] = $this->user_model->ambil_data($where);
		$data['error'] = NULL;
		$data['success'] = NULL;

		if($this->input->post('ubah_pass')){
			$pass = $this->input->post('password');
			$pass2= $this->input->post('password2');
			$hash = md5($pass);

			if($pass != $pass2){
				$data['error'] = 'Password tidak sama!';
			} else {

				if($hash == $data['bio']['password']){
					$data['error'] = 'Tidak boleh menggunakan password lama';
				} else {

					$this->user_model->update_password($hash);
					$data['success'] = 'Password berhasil diubah';

				}
			}
		}

		$this->load->view('template/header_sidebar', $data);
		$this->load->view('user/setting', $data);
		$this->load->view('template/footer_sidebar');
	}
}
