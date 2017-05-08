<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_per_matkul extends CI_Controller {

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
			'page' => 'a_per_matkul',
			'isi' => $this->db->query("select *, peruntukan_matakuliah.id as per_id from peruntukan_matakuliah left join matakuliah on matakuliah.kode_mk=peruntukan_matakuliah.kode_mk left join kelas on kelas.id=peruntukan_matakuliah.kode_kelas order by peruntukan_matakuliah.id desc")->result(),
			'matakuliah' => $this->Model->list_data('matakuliah'),
			'kelas' => $this->Model->list_data('kelas'),
			'angkatan' => $this->db->query("select tahun_masuk_kuliah from mahasiswa group by tahun_masuk_kuliah")->result()
		);


		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		/*$username = $this->input->post('npm');
		$cek = $this->Model->cek_data('npm', $username, 'pembimbing_akademik')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Mahasiswa ini sudah mempunyai pembimbing akademik !</div>';
		}else{*/
		if($this->input->post('matkul')=='--pilih--' || $this->input->post('kelas')=='--pilih--' || $this->input->post('angkatan')=='--pilih--' || $this->input->post('semester')=='--pilih--'){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';

		}else{
			$data = array(
				'kode_mk' => $this->input->post('matkul'),
				'kode_kelas' => $this->input->post('kelas'),
				'angkatan' => $this->input->post('angkatan'),
				'semester' => $this->input->post('semester')
			);
			$simpan = $this->Model->input_data($data, 'peruntukan_matakuliah');
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
		$hapus = $this->Model->hapus_data('id', $id, 'peruntukan_matakuliah');
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
		$data = $this->Model->ambil('id', $username, 'peruntukan_matakuliah')->row();

		echo json_encode($data);
	}

	public function edit_data(){
		if($this->input->post('matkul')=='--pilih--' || $this->input->post('kelas')=='--pilih--' || $this->input->post('angkatan')=='--pilih--' || $this->input->post('semester')=='--pilih--'){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';

		}else{
			$username = $this->input->post('id_per_matkul');
			$data = array(
					'kode_mk' => $this->input->post('matkul'),
					'kode_kelas' => $this->input->post('kelas'),
					'angkatan' => $this->input->post('angkatan'),
					'semester' => $this->input->post('semester')
			);
			$update = $this->Model->edit_data('id', $username, 'peruntukan_matakuliah', $data);
			if($update){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil diupdate !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal diupdate !</div>';
			}
		}
	}


}