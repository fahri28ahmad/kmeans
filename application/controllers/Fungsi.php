<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('name')) {
			redirect('auth');
		}
	}
	public function get_rein(){
		$this->load->model("rein");
		$data['tanggal'] = $this->input->post("tanggal");
		$data['bulan'] = $this->input->post("bulan");
		$data['tahun'] = $this->input->post("tahun");
		$data['hari'] = $this->input->post("hari");
		$data['tanggal_awal'] = $this->input->post("tanggal_awal");
		$data['tanggal_akhir'] = $this->input->post("tanggal_akhir");
		$data['keterangan'] = $this->input->post("keterangan");
		$data['rein'] = 0;

		print_r($data);

		$r = $this->rein->getRein($data);
		$data['rein'] = 1;
		$i = $this->rein->getRein($data);

		$stat = new StdClass();
		$big_nom = array();
		$temp_nom = 0;
		foreach($r as $p){
			if($p->nominal > $temp_nom){
				$temp_nom = $p->nominal;
				$big_nom['nominal'] = $p->nominal;
				$big_nom['tanggal'] = $p->tanggal;
			}
		}

		$stat->large_number = $big_nom;


		$l['income'] = $i;
		$l['revenue'] = $r;
		$l['stat'] = $stat;
		echo json_encode($l);
		$this->load->view("tmcari",$data);
	}

	public function get_rein_2(){
		$this->load->model("rein");
		$data['tanggal'] = $this->input->post("tanggal");
		$data['bulan'] = $this->input->post("bulan");
		$data['tahun'] = $this->input->post("tahun");
		$data['hari'] = $this->input->post("hari");
		$data['tanggal_awal'] = $this->input->post("tanggal_awal");
		$data['tanggal_akhir'] = $this->input->post("tanggal_akhir");
		$data['keterangan'] = $this->input->post("keterangan");
		$data['rein'] = 0;

		$r = $this->rein->getRein($data);
		$data['rein'] = 1;
		$i = $this->rein->getRein($data);

		$stat = new StdClass();
		$big_nom = array();
		$temp_nom = 0;
		foreach($r as $p){
			if($p->nominal > $temp_nom){
				$temp_nom = $p->nominal;
				$big_nom['nominal'] = $p->nominal;
				$big_nom['tanggal'] = $p->tanggal;
			}
		}

		$stat->large_number = $big_nom;


		$l['income'] = $i;
		$l['revenue'] = $r;
		$l['stat'] = $stat;
		$l['v'] = 0;
		$this->load->view("tmcari",$l);
	}

	public function insert_pendapatan()
	{
		$this->load->model("rein");
		$data = array();
		$data['name'] = $this->input->post("name");
		$data['umur'] = $this->input->post("umur");
		$data['io'] = $this->input->post("io");
		$data['cd4'] = $this->input->post("cd4");
		$data['art'] = $this->input->post("art");
		
		$this->db->insert('data', $data);
		$id=$this->db->insert_id();
		
		$this->session->set_flashdata("flash","ditambahkan");
		echo json_encode("true");
		redirect('welcome/datalatih');
	}
	public function inputc()
	{
		$this->load->model("rein");
		$data = array();
		$data['c1'] = $this->input->post("c1");
		$data['c2'] = $this->input->post("c2");
		$data['c3'] = $this->input->post("c3");
		$data['c11'] = $this->input->post("c11");
		$data['c12'] = $this->input->post("c12");
		$data['c13'] = $this->input->post("c13");
		$data['c21'] = $this->input->post("c21");
		$data['c22'] = $this->input->post("c22");
		$data['c23'] = $this->input->post("c23");
		$data['c31'] = $this->input->post("c31");
		$data['c32'] = $this->input->post("c32");
		$data['c33'] = $this->input->post("c33");
		$this->db->insert('centroid', $data);
		$id=$this->db->insert_id();
		
		$this->session->set_flashdata("flash","ditambahkan");
		echo json_encode("true");
		redirect('welcome/pengelompok');
	}
	public function simpan_prediksi(){
		$this->load->model("regresi");

		$a=[];

		$query= $this->db->get('regresi');

		foreach($query->result() as $row){
			$x= $row->bp;
			$x1= $row->bk;
			$x2= $row->jam_km;

			$y = $this->regresi->hitung_prediksi($x,$x1,$x2);
			array_push($a, [
				'id' => $row->id,
				'prediksi' => $y
			]);
		}

		$this->db->update_batch('regresi', $a, 'id');

		// redirect(base_url('welcome/prediksi/'.$y.'/'.$x.'/'.$x1.'/'.$x2));
	}
	public function insert_pengeluaran()
	{
		$this->load->model("rein");
		$data = array();
		$data['nominal'] = $this->input->post("nominal");
		$data['rein'] = 0;
		$data['keterangan'] = $this->input->post("ket");
		$data['tanggal'] = $this->input->post("tanggal");
		$data['tipe_ket'] = $this->input->post("tipe_ket");
		$this->rein->insertRein($data);
		$this->session->set_flashdata("flash","ditambahkan");
		echo json_encode("true");
		redirect('welcome/pengeluaran');
	}
	public function update()
	{
		$this->load->model("regresi");
		$data = array();
		$data['date'] = $this->input->post("date");
		$data['penjualan_produk'] = $this->input->post("penjualan");
		
		$this->rein->updateRein($data);
		echo json_encode("true");
		$this->session->set_flashdata("flash","ubah");	
		redirect('welcome/pengeluaran');
	}
	// public function edit()
	// {
	// 	$this->load->model("rein");
	// 	$data = array();
	// 	$data['id'] = $this->input->post("nominal");
	// 	$data['nominal'] = $this->input->post("nominal");
	// 	$data['rein'] = $this->input->post("rein");;
	// 	$data['keterangan'] = $this->input->post("ket");
	// 	$data['tanggal'] = $this->input->post("tanggal");
	// 	$data['tipe_ket'] = $this->input->post("tipe_ket");
	// 	$this->rein->insertRein($data);
	// 	echo json_encode("true");
	// }
}
