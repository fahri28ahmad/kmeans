<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('Form_validation');
	}
	public function index(){
		if ($this->session->userdata('name')) {
			redirect('Welcome');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run()== FALSE){
		$this->load->view("login/login");
		}else{
			$this->_login();
		}
	}
	private function _login(){
		
		$name = $this->input->post('name');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['name'=> $name ]) ->row_array();
		if($user){
			if ($user['is_active']== 1) {
				if(password_verify($password, $user['password'])){
					$data =[
						'name'=> $user['name'],
						'role_id'=> $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('welcome');

				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					  Password salah!!!
					</div>');
					redirect('auth');
				}

			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					  Akun belum di aktifasi!!!
					</div>');
				redirect('auth');
			}
			
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
	  Akun tidak ditemukan!!!
	</div>');
			redirect('auth');
		}
	}

	public function register(){
		if ($this->session->userdata('name')) {
			redirect('Welcome');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[user.name]',[
			'is_unique' => 'username sudah terdaftar'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'email sudah terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches' => 'pasword tidak sama',
			'min_length' => 'pasword terlalu pendek',
		]);
		$this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]');

		if ( $this->form_validation->run() == FALSE){
			$this->load->view("login/register");
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', TRUE)),
				'email' => htmlspecialchars($this->input->post('email', TRUE)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
	  Selamat akun anda telah di daftarkan!!!
	</div>');
		redirect('auth');
		}
		
	}
	public function logout(){
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">
	  Kamu berhasil Keluar!!!
	</div>');
		redirect('auth');
	}
	public function gantipswd(){
		
	}
}
