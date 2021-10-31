<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Hiv extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_hiv_data($data){
        $this->db->from("data");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_c_data($data){
        $this->db->from("centroid");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_jumlah_data($limit, $start){
        // $this->db->from("regresi");
        return $this->db->get("data", $limit, $start );$query->result();
    }

    public function hitung_prediksi($in_x,$in_y,$in_z){
    	$this->db->from("nilai_regresi");
    	$this->db->order_by('id','DESC');
        $nilai = $this->db->get()->row();
    	$y = $nilai->a + (round($nilai->b1,2) * $in_x) + (round($nilai->b2,2) * $in_y) + (round($nilai->b3,2) * $in_z);

    	return $y;
    }
    public function updateRein($data){
        $this->db->where("date",$data['date']);
        $this->db->update("data",$data);
    }
    public function proses_regresi($k){
		$signma_x_1 = 0;
		$signma_x_2 = 0;
		$signma_x_3 = 0;
		$signma_y = 0;
		$signma_x_12 = 0;
		$signma_x_22 = 0;
		$signma_x_32 = 0;
		$signma_y2 = 0;
		$signma_x1_y = 0;
		$signma_x2_y = 0;
		$signma_x3_y = 0;
		$signma_x1_x2 = 0;
		$signma_x1_x3 = 0;
		$signma_x2_x3 = 0;
		foreach($k as $l){
						$signma_x_1 += $l->bp;
						$signma_x_2 += $l->bk;
						$signma_x_3 += $l->jam_km;
						$signma_y += $l->hsl_p;
						$signma_x_12 += pow($l->bp, 2);
						$signma_x_22 += pow($l->bk, 2);
						$signma_x_32 += pow($l->jam_km, 2);
						$signma_y2 += pow($l->hsl_p, 2);
						$signma_x1_y += ($l->bp * $l->hsl_p);
						$signma_x2_y += ($l->bk * $l->hsl_p);
						$signma_x3_y += ($l->jam_km * $l->hsl_p);
						$signma_x1_x2 += ($l->bp * $l->bk);
						$signma_x1_x3 += ($l->bp * $l->jam_km);
						$signma_x2_x3 += ($l->bk * $l->jam_km);
		    } 
		    	$a = round($signma_x_12 - (pow($signma_x_1, 2)/sizeof($k)),2);
				$b = round($signma_x_22 - (pow($signma_x_2, 2)/sizeof($k)),2);
				$c = round($signma_x_32 - (pow($signma_x_3, 2)/sizeof($k)),2);
				$d = round($signma_y2 - (pow($signma_y, 2)/sizeof($k)),2);
				$e = round(($signma_x1_y) - ($signma_x_1*$signma_y)/sizeof($k),2);
				$f = round(($signma_x2_y) - ($signma_x_2*$signma_y)/sizeof($k),2);
				$g = round(($signma_x3_y) - ($signma_x_3*$signma_y)/sizeof($k),2);
				$h = round(($signma_x1_x2) - ($signma_x_1*$signma_x_2)/sizeof($k),2);
				$i = round(($signma_x1_x3) - ($signma_x_1*$signma_x_3)/sizeof($k),2);
				$j = round(($signma_x2_x3) - ($signma_x_2*$signma_x_3)/sizeof($k),2);

				$a_a = array(
					'x' => $a,
					'y' => $h,
					'z' => $i,
					'result' => $e
				);

				$b_b = array(
					'x' =>  $h,
					'y' => $b,
					'z' => $j,
					'result' => $f
				);

				$c_c = array(
					'x' => $i,
					'y' => $j,
					'z' => $c,
					'result' => $g
				);

				$a_awal = $a_a;
				$b_awal = $b_b;
				$c_awal = $c_c;

				$new_a = array(
					'x' => $a_a['x'] / $a_a['z'],
					'y' => $a_a['y'] / $a_a['z'],
					'z' => $a_a['z'] / $a_a['z'],
					'result' => $a_a['result'] / $a_a['z']
				);

				$new_b = array(
					'x' => $b_b['x'] / $b_b['z'],
					'y' => $b_b['y'] / $b_b['z'],
					'z' => $b_b['z'] / $b_b['z'],
					'result' => $b_b['result'] / $b_b['z']
				);
				$d = array(
					'x' => $new_a['x']  - $new_b['x'],
					'y' => $new_a['y']  - $new_b['y'],
					'result' => $new_a['result']  - $new_b['result']
				);

				$new_b_2 = array(
					'x' => $b_b['x'] / $b_b['z'],
					'y' => $b_b['y'] / $b_b['z'],
					'z' => $b_b['z'] / $b_b['z'],
					'result' => $b_b['result'] / $b_b['z']
				);

				$new_c = array(
					'x' => $c_c['x'] / $c_c['z'],
					'y' => $c_c['y'] / $c_c['z'],
					'z' => $c_c['z'] / $c_c['z'],
					'result' => $c_c['result'] / $c_c['z']
				);

				$e = array(
					'x' => $new_b_2['x']  - $new_c['x'],
					'y' => $new_b_2['y']  - $new_c['y'],
					'result' => $new_b_2['result']  - $new_c['result']
				);

				$a_a = $d;
				$b_b = $e;

				//cari KPK di Y
				$result_1 = abs($a_a['result']);
				$result_2 = abs($b_b['result']);

				$x1 = abs($a_a['x']);
				$x2 = abs($b_b['x']);
				$y1 = abs($a_a['y']);
				$y2 = abs($b_b['y']);

				$kpk_y1 = $y1 * $y2;

				$perkalian_xa = ($kpk_y1 / $y1) * $x1;
				$perkalian_xb = ($kpk_y1 / $y2) * $x2;

				$result_xa = ($kpk_y1 / $y1) * $result_1;
				$result_xb = ($kpk_y1 / $y2) * $result_2;

				$text_1 = $a_a["x"] . "x" . " + " . $a_a["y"] . "y" . " = " . $a_a['result'];
				$text_2 = $b_b["x"] . "x" . " + " . $b_b["y"] . "y" . " = " . $b_b['result'];


				$new_a = array(
					'x' => $perkalian_xa,
					'y' => $kpk_y1,
					'result' => $result_xa
				);

				$new_b = array(
					'x' => $perkalian_xb,
					'y' => $kpk_y1,
					'result' => $result_xb
				);

				$after_subtitusi_x = $new_a['x'] - $new_b['x'];
				$after_subtitusi_result = $new_a['result'] - $new_b['result'];


				$finish_x = $after_subtitusi_result/$after_subtitusi_x;
				$pers_1_x = $a_a['x'] * $finish_x;
				$pers_1_semifinal = $a_a['result'] - $pers_1_x;
				$finish_y = $pers_1_semifinal / $a_a['y'];


				$final_x = $a_awal['x'] * $finish_x;
				$final_y = $a_awal['y'] * $finish_y;
				$final_semifinal = $final_x + $final_y;
				$final_semifinal = $a_awal['result'] - $final_semifinal;
				$final_z = $final_semifinal/$a_awal['z'];

				$a_p1 = ($signma_y/sizeof($k));
				$a_p2 = ($finish_x * ($signma_x_1/sizeof($k)));
				$a_p3 = ($finish_y * ($signma_x_2/(sizeof($k))));
				$a_p4 = ($final_z * ($signma_x_3/(sizeof($k))));

				$a = round(($a_p1 - $a_p2 - $a_p3 - $a_p4),3);

				$save = [
					'a' => $a,
					'b1' => $finish_x,
					'b2' => $finish_y,
					'b3' => $final_z,
				];

				$this->db->where('id', '1');
				$this->db->update('nilai_regresi', $save);
		}
}
