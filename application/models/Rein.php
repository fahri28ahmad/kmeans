<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Rein extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getRein($data){
        $this->db->select("r.id, tanggal, keterangan, r.tipe_ket as kets, t.tipe_ket, nominal, rein");
        $this->db->from("rein r");
        if(isset($data['id'])){
            $this->db->where("r.id",$data['id']);
        }
        if(isset($data['tanggal'])){
            $this->db->where("DATE(tanggal)",$data['tanggal']);
        }
        if(isset($data['bulan'])){
            $this->db->where("MONTH(tanggal)",$data['bulan']);
        }
        if(isset($data['tahun'])){
            $this->db->where("YEAR(tanggal)",$data['tahun']);
        }
        if(isset($data['hari'])){
            $this->db->where("DAYOFWEEK(tanggal)",$data['hari']);
        }
        if(isset($data['tanggal_awal'])){
            $this->db->where("tanggal >=",$data['tanggal_awal']);
        }
        if(isset($data['tanggal_akhir'])){
            $this->db->where("tanggal <=",$data['tanggal_akhir']);
        }
        if(isset($data['keterangan'])){
            $this->db->like("keterangan",$data['keterangan']);
        }
        if(isset($data['rein'])){
            $this->db->where("rein",$data['rein']);
        }
        $this->db->join("tipe_ket t","t.id = r.tipe_ket");
        if(isset($data['limit'])){
            $this->db->limit($data['limit']);
        }
        if(isset($data['lolod'])){
            $this->db->order_by("tanggal",$data['lolod']);
        }else{
            $this->db->order_by("tanggal","ASC");
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getTipeKet(){
        $this->db->from("tipe_ket");
        $query = $this->db->get();
        return $query->result();
    }
    public function getupdate($id){
        $this->db->from("tipe_ket");
        $this->db->select('*')->from('rein')->where('id',$id)->get();
        return $query->result();
    }

    public function insertRein($data){
        $this->db->insert("rein",$data);
    }
    // public function updateRein($data){
    //     $this->db->update("rein",$data);
    // }
    public function updateRein($data){
        $this->db->where("date",$data['date']);
        $this->db->update("regresi",$data);
    }
    public function hapusdata($id){
        $this->db->where("id",$id);
        $this->db->delete("data");
    }
    // public function information($id) {
    // $q = $this->db->select('*')->from('tableName')->where('id',$id)->get();
    // return $q->result();
    // }
}
