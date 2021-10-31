<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('name')) {
			redirect('auth');
		}
	}
	public function index(){
		// $this->load->model("Rein");
		$data['user'] = $this->db->get_where('user',['name' => $this->session->userdata('name')])->row_array();
		$this->session->set_flashdata('welcome','<div class="alert alert-info" role="alert">
					  Selamat datang ' . $data["user"]["name"] . '
					</div>');
		$this->load->model("hiv");
		$data['v'] = 0;
		$k = $this->hiv->get_hiv_data(array());
		$data['k'] = $k;
		$this->load->view("dashboard",$data);
	}
	public function index1(){
		$this->load->model("hiv");
		$k = $this->hiv->get_hiv_data(array());
		$c = $this->hiv->get_c_data(array());

		$data['k'] = $k;
		$data['c'] = $c;

		$this->load->view("kmeans",$data);
	}

	public function datalatih(){
		$data['user'] = $this->db->get_where('user',['name' => $this->session->userdata('name')])->row_array();
		$this->load->view("datalatih",$data);	
	}
	public function pengelompok(){
		$data['user'] = $this->db->get_where('user',['name' => $this->session->userdata('name')])->row_array();
		$this->load->model("hiv");
		$data['v'] = 0;
		$k = $this->hiv->get_hiv_data(array());
		$data['k'] = $k;
		$this->load->view("pengelompokan",$data);	
	}
	public function pengeluaran(){
		$data['user'] = $this->db->get_where('user',['name' => $this->session->userdata('name')])->row_array();
		$this->load->model("Rein");
		$parameter = array(
			'limit' => 10,
			'ad' => 'desc'
		);
		$data['last_transaction'] = $this->Rein->getRein($parameter);
		$data['ket'] = $this->Rein->getTipeKet();
		$this->load->view("pengeluaran",$data);	
	}
	public function ubah($id){
		$data['user'] = $this->db->get_where('user',['name' => $this->session->userdata('name')])->row_array();
		$this->load->model("Rein");
		$parameter = array(
			'id' => $id
		);
		$data['yihi'] = $this->Rein->getRein($parameter);
		// $data['ket'] = $this->Rein->getupdate();
		// $this->load->view("edit",$data);	
	}
	public function hapus($id){
		$this->load->model("Rein");
		// $parameter = array(
		// 	'id' => $id
		// );
		// $data['yihi'] = $this->Rein->getRein($parameter);
		// // $data['ket'] = $this->Rein->getupdate();
		// $this->load->view("edit",$data);	
		$this->Rein->hapusdata($id);
		$this->session->set_flashdata("flash","Hapus");	
		redirect('welcome/index');
	}
	public function statistik(){
		$data['user'] = $this->db->get_where('user',['name' => $this->session->userdata('name')])->row_array();
		$this->load->model("Rein");
		$parameter = array(
			'limit' => 10,
			'ad' => 'desc'
		);
		$data['last_transaction'] = $this->Rein->getRein($parameter);
		$data['ket'] = $this->Rein->getTipeKet();
		$this->load->view("info",$data);	
	}
	public function pengujian(){
		$data['user'] = $this->db->get_where('user',['name' => $this->session->userdata('name')])->row_array();
		$this->load->model("Rein");
		$parameter = array(
			'limit' => 100,
			'ad' => 'desc'
		);
		$data['last_transaction'] = $this->regresi->get_regresi_data($parameter);
		$data['v'] = 0;
		$k = $this->regresi->get_regresi_data(array());

		$data['k'] = $k;


		$this->load->model("regresi");
		$k = $this->regresi->get_regresi_data(array());
		$this->regresi->proses_regresi($k);
		
		$this->simpan_prediksi();
		$this->load->view("pengujian",$data);	
	}
}
