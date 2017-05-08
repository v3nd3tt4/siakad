<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_dosen extends CI_Controller {

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
			'page' => 'a_dosen',
			'isi' => $this->Model->list_data('dosen')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		$no_reg_dosen = $this->input->post('no_reg_dosen');
		$cek = $this->Model->cek_data('no_dosen', $no_reg_dosen, 'dosen')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> No Registrasi Dosen sudah digunakan !</div>';
		}else{
			$data = array(
				'no_dosen' => $this->input->post('no_reg_dosen'),
				'nama_dosen' => $this->input->post('nama_dosen'),
				'tempat_lahir' => $this->input->post('tempat_lahir_dosen'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir_dosen'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin_dosen'),
				'agama' => $this->input->post('agama_dosen'),
				'alamat' => $this->input->post('alamat_dosen'),
				'no_hp' => $this->input->post('no_hp_dosen')
			);
			$simpan = $this->Model->input_data($data, 'dosen');
				if($simpan){
					$data1 = array(
						'nama' => $this->input->post('nama_dosen'),
						'username' => $this->input->post('no_reg_dosen'),
						'password' => password_hash($this->input->post('password_dosen'), PASSWORD_DEFAULT),
						'level' => 'dosen'
					);
					$simpan1 = $this->Model->input_data($data1, user);
					if($simpan1){
						echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
						echo'<script>location.reload();</script>';
					}else{
						echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
					}					
				}else{
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
				}				
		}
	}

	public function hapus_data(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('no_dosen', $id, 'dosen');
		if($hapus){
			$hapus1 = $this->Model->hapus_data('username', $id, 'user');
			if($hapus1){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
			}
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}			
	}

	public function ambil(){
		$username = $this->input->post('id');
		$data = $this->Model->ambil('no_dosen', $username, 'dosen')->row();

		echo json_encode($data);
	}

	public function edit_data(){
		$username = $this->input->post('no_reg_dosen');
		$data = array(
				'no_dosen' => $this->input->post('no_reg_dosen'),
				'nama_dosen' => $this->input->post('nama_dosen'),
				'tempat_lahir' => $this->input->post('tempat_lahir_dosen'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir_dosen'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin_dosen'),
				'agama' => $this->input->post('agama_dosen'),
				'alamat' => $this->input->post('alamat_dosen'),
				'no_hp' => $this->input->post('no_hp_dosen')
			);
		$update = $this->Model->edit_data('no_dosen', $username, 'dosen', $data);
		if($update){
			$data1 = array(
				'nama' => $this->input->post('nama_dosen'),
				'password' => password_hash($this->input->post('password_dosen'), PASSWORD_DEFAULT),
			);
			$update1 = $this->Model->edit_data('username', $username, 'user', $data1);
			if($update1){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
			}
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
		}			
	}
}