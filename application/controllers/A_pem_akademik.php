<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_pem_akademik extends CI_Controller {

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
			'page' => 'a_pem_akademik',
			'isi' => $this->db->query("select *, pembimbing_akademik.id as pem_id from pembimbing_akademik left join mahasiswa on pembimbing_akademik.npm=mahasiswa.npm left join dosen on pembimbing_akademik.kode_dosen=dosen.no_dosen left join kelas on
				mahasiswa.id_kelas=kelas.id order by pembimbing_akademik.id desc")->result(),
			'dosen' => $this->Model->list_data('dosen')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		$username = $this->input->post('npm');
		$cek = $this->Model->cek_data('npm', $username, 'mahasiswa')->num_rows();
			if($cek == 0){
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> NPM tidak ada di database !</div>';
			}else{
				$cek1 = $this->Model->cek_data('npm', $username, 'pembimbing_akademik')->num_rows();
				if($cek1 != 0){
					echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Mahasiswa ini sudah mempunyai pembimbing akademik !</div>';
				}else{
					$data = array(
						'npm' => $this->input->post('npm'),
						'kode_dosen' => $this->input->post('dosen')
						
					);
					$simpan = $this->Model->input_data($data, 'pembimbing_akademik');
					if($simpan){
						echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
						echo'<script>location.reload();</script>';
					}else{
						echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
					}
				}
			}
	}

	public function hapus_data(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('id', $id, 'pembimbing_akademik');
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
		$data = $this->Model->ambil('id', $username, 'pembimbing_akademik')->row();

		echo json_encode($data);
	}

	public function edit_data(){
		$username = $this->input->post('id_pem_akademik');
		$data =  array(
			//'npm' => $this->input->post('npm'),
			'kode_dosen' => $this->input->post('dosen')
		);
		$update = $this->Model->edit_data('id', $username, 'pembimbing_akademik', $data);
		if($update){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
			echo'<script>location.reload();</script>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
		}
	}


}