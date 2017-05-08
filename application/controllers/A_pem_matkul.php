<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_pem_matkul extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('image_lib');
        $this->load->library('upload');
		if($this->session->userdata('status') == '' || $this->session->userdata('level')!='admin'){
			echo'<script>window.location.href="'.base_url().'";</script>';
		}
	}

	public function index(){
		$data = array(
			'page' => 'a_pem_matkul',
			'isi' => $this->db->query("select *, pengampu_matakuliah.id as pem_id from pengampu_matakuliah left join matakuliah on pengampu_matakuliah.kode_matkul=matakuliah.kode_mk left join dosen on pengampu_matakuliah.kode_dosen=dosen.no_dosen order by pengampu_matakuliah.id desc")->result(),
			'dosen' => $this->Model->list_data('dosen')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		$username = $this->input->post('matkul');
		$cek = $this->Model->cek_data('kode_mk', $username, 'matakuliah')->num_rows();
		if($cek == 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Kode matakuliah tidak ada di database!</div>';
		}else{
			$data = array(
				'kode_matkul' => $this->input->post('matkul'),
				'kode_dosen' => $this->input->post('dosen')
				
			);
			$simpan = $this->Model->input_data($data, 'pengampu_matakuliah');
			if($simpan){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
			}
		}
	}

	public function hapus_data(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('id', $id, 'pengampu_matakuliah');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function ambil(){
		$username = $this->input->post('id');
		$data = $this->Model->ambil('id', $username, 'pengampu_matakuliah')->row();

		echo json_encode($data);
	}

	public function edit_data(){
		$username = $this->input->post('id_pem_matkul');
		$data =  array(
			//'npm' => $this->input->post('npm'),
			'kode_dosen' => $this->input->post('dosen')
		);
		$update = $this->Model->edit_data('id', $username, 'pengampu_matakuliah', $data);
		if($update){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
		}
	}


}