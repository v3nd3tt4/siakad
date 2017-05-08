<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_matakuliah extends CI_Controller {

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
			'page' => 'a_matakuliah',
			'isi' => $this->Model->list_data('matakuliah')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		$username = $this->input->post('kode_mk');
		$cek = $this->Model->cek_data('kode_mk', $username, 'matakuliah')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Kode matakuliah sudah digunakan !</div>';
		}else{
			$data = array(
				'kode_mk' => $this->input->post('kode_mk'),
				'nama_mk' => $this->input->post('nama_mk'),
				'sks' => $this->input->post('sks'),
				'keterangan' => $this->input->post('ket_mk'),
			);
			$simpan = $this->Model->input_data($data, 'matakuliah');
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
		$hapus = $this->Model->hapus_data('id', $id, 'matakuliah');
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
		$data = $this->Model->ambil('id', $username, 'matakuliah')->row();

		echo json_encode($data);
	}

	public function edit_data(){
		$username = $this->input->post('kode_mk');
		$id = $this->input->post('id_mk');
		$cek = $this->Model->cek_data('kode_mk', $username, 'matakuliah')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Kode matakuliah sudah digunakan !</div>';
		}else{
			$data = array(
					'kode_mk' => $this->input->post('kode_mk'),
					'nama_mk' => $this->input->post('nama_mk'),
					'sks' => $this->input->post('sks'),
					'keterangan' => $this->input->post('ket_mk'),
				);
			$update = $this->Model->edit_data('id', $id, 'matakuliah', $data);
			if($update){			
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
			}	
		}		
	}

}