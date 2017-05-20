<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

	function list_data($tabel){
		$data=$this->db->query("select * from $tabel");
		return $data->result();
   	}
    
    function list_data_all($tabel){
        return $this->db->get($tabel)->result();
    }

   	function input_data($data, $tabel){
   		$simpan=$this->db->insert($tabel,$data);
		return true;
   	}

   	function hapus_data($tb_id, $param_id, $tabel){
   		$this->db->where($tb_id,$param_id);
		$hapus=$this->db->delete($tabel);
		if($hapus){
			return true;
		}
		else{
			return false;
		}	
   	}

   	function edit_data($tb_id, $param_id, $tabel, $data){
   		$this->db->where($tb_id,$param_id);
		$this->db->update($tabel,$data);
		return true;
   	}

   	function ambil($tb_id,$param_id, $tabel){
		return $this->db->get_where($tabel,array($tb_id=>$param_id));
	}

	function ambil_new($tabel, $param){
		return $this->db->get_where($tabel, $param);
	}

	function cek_data($tb_id, $param_id, $tabel){
		return $this->db->get_where($tabel,array($tb_id=>$param_id));
	}
		
	function cek_login($tabel, $data){
		return $this->db->get_where($tabel,$data);
	}
  
  	function cek_user($data, $tabel){
  		return $this->db->get_where($tabel,$data);
  	}

  	function huruf_mutu($jumlah){
  		if($jumlah >= 0 && $jumlah <= 49){
			$huruf_mutu = 'E';
		}else if($jumlah >= 50 && $jumlah <= 54){
			$huruf_mutu = 'D';
		}else if($jumlah >= 55 && $jumlah <= 64){
			$huruf_mutu = 'C';
		}else if($jumlah >= 65 && $jumlah <= 74){
			$huruf_mutu = 'B';
		}else if($jumlah >= 75 && $jumlah <= 100){
			$huruf_mutu = 'A';
		}else{
			$huruf_mutu = '-';
		}
		return $huruf_mutu;
  	}
}