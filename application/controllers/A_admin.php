<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_admin extends CI_Controller {

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
			'page' => 'a_admin',
			'isi' => $this->Model->list_data('user')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		$username = $this->input->post('username');
		$cek = $this->Model->cek_data('username', $username, 'user')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Username sudah digunakan !</div>';
		}else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level' => 'admin'
			);
			$simpan = $this->Model->input_data($data, 'user');
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
		$hapus = $this->Model->hapus_data('id', $id, 'user');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function edit_data(){
		$username = $this->input->post('username');
		$data =  array(
			'nama' => $this->input->post('nama'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => 'admin'
		);
		$update = $this->Model->edit_data('username', $username, 'user', $data);
		if($update){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
		}
	}

	public function ambil(){
		$username = $this->input->post('id');
		$data = $this->Model->ambil('username', $username, 'user')->row();

		echo json_encode($data);
	}


}      