<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_blokir extends CI_Controller {

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
			'page' => 'a_blokir',
			'isi' => $this->db->query("select *, blokir.keterangan as ket, blokir.id as id_blokir from blokir left join mahasiswa on blokir.npm=mahasiswa.npm left join kelas on kelas.id=mahasiswa.id_kelas where blokir.status='blocked'")->result()
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		$username = $this->input->post('npm');
		$cek = $this->Model->cek_data('npm', $username, 'mahasiswa')->num_rows();
			if($cek == 0){
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> NPM tidak ada di database !</div>';
			}else{
			if($this->input->post('status')=='--pilih--'){
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';

			}else{
				$data = array(
					'npm' => $this->input->post('npm'),
					'keterangan' => $this->input->post('keterangan'),
					'status' => $this->input->post('status')					
				);
				$simpan = $this->Model->input_data($data, 'blokir');
				if($simpan){
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
					echo'<script>location.reload();</script>';
				}else{
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
				}
			}
		}
	}

	public function ambil(){
		$username = $this->input->post('id');
		$data = $this->Model->ambil('id', $username, 'blokir')->row();

		echo json_encode($data);
	}
	public function edit_data(){
		if($this->input->post('status')=='--pilih--'){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';

		}else{
			$npm = $this->input->post('npm');
			$cek = $this->Model->cek_data('npm', $npm, 'mahasiswa')->num_rows();
			if($cek == 0){
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> NPM tidak ada di database !</div>';
			}else{
				$username = $this->input->post('id_blokir');
				$data = array(
						'npm' => $this->input->post('npm'),
						'keterangan' => $this->input->post('keterangan'),
						'status' => $this->input->post('status')					
					);
				$update = $this->Model->edit_data('id', $username, 'blokir', $data);
				if($update){
					echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
					echo'<script>location.reload();</script>';
				}else{
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
				}
			}
		}
	}

}