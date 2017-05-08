<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_masa_krs extends CI_Controller {

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
			'page' => 'a_masa_krs',
			'isi' => $this->db->query("select *, mas_krs.id as id_mas_krs from mas_krs left join kelas on kelas.id=mas_krs.id_kelas ")->result(),
			'angkatan' => $this->db->query("select tahun_masuk_kuliah from mahasiswa group by tahun_masuk_kuliah")->result(),
			'matakuliah' => $this->Model->list_data('matakuliah'),
			'kelas' => $this->Model->list_data('kelas')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		/*$username = $this->input->post('npm');
		$cek = $this->Model->cek_data('npm', $username, 'pembimbing_akademik')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Mahasiswa ini sudah mempunyai pembimbing akademik !</div>';
		}else{*/
		if($this->input->post('status')=='--pilih--' || $this->input->post('kelas')=='--pilih--' || $this->input->post('angkatan')=='--pilih--' || $this->input->post('semester')=='--pilih--'){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';

		}else{
			$data = array(				
				'id_kelas' => $this->input->post('kelas'),
				'angkatan' => $this->input->post('angkatan'),
				'semester' => $this->input->post('semester'),
				'status' => $this->input->post('status')
			);
			$simpan = $this->Model->input_data($data, 'mas_krs');
			if($simpan){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
			}
		}
		//}
	}

	public function hapus_data(){
		$id=$this->input->post('id');
		$hapus = $this->Model->hapus_data('id', $id, 'mas_krs');
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
		$data = $this->Model->ambil('id', $username, 'mas_krs')->row();

		echo json_encode($data);
	}

	public function edit_data(){
		if($this->input->post('status')=='--pilih--' || $this->input->post('kelas')=='--pilih--' || $this->input->post('angkatan')=='--pilih--' || $this->input->post('semester')=='--pilih--'){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';

		}else{
			$username = $this->input->post('id_masa_krs');
			$data = array(				
				'id_kelas' => $this->input->post('kelas'),
				'angkatan' => $this->input->post('angkatan'),
				'semester' => $this->input->post('semester'),
				'status' => $this->input->post('status')
			);
			$update = $this->Model->edit_data('id', $username, 'mas_krs', $data);
			if($update){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
			}
		}
	}


}