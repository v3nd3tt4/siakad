<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_mahasiswa extends CI_Controller {

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
			'page' => 'a_mahasiswa',
			'isi' => $this->db->query("select * from mahasiswa left join kelas on mahasiswa.id_kelas=kelas.id")->result(),
			'kelas' => $this->Model->list_data('kelas')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function simpan(){
		$nim = $this->input->post('nim');
		$cek = $this->Model->cek_data('npm', $nim, 'mahasiswa')->num_rows();
		if($cek != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> NIM sudah digunakan !</div>';
		}else{
			$data = array(
				'npm' => $this->input->post('nim'),
				'nama_mhs' => $this->input->post('nama_mhs'),
				'tempat_lahir' => $this->input->post('tempat_lahir_mhs'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir_mhs'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin_mhs'),
				'agama' => $this->input->post('agama_mhs'),
				'no_hp' => $this->input->post('no_hp_mhs'),
				'alamat' => $this->input->post('alamat_mhs'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'tahun_lulus' => $this->input->post('tahun_lulus_sekolah'),
				'alamat_sekolah' => $this->input->post('alamat_sekolah'),
				'tahun_masuk_kuliah' => $this->input->post('tahun_masuk_kuliah'),
				'id_kelas' => $this->input->post('kelas_mhs'),
				'nama_ayah' => $this->input->post('nama_ayah_kandung'),
				'nama_ibu' => $this->input->post('nama_ibu_kandung')
			);
			$simpan = $this->Model->input_data($data, 'mahasiswa');
				if($simpan){
					$data1 = array(
						'nama' => $this->input->post('nama_mhs'),
						'username' => $this->input->post('nim'),
						'password' => password_hash($this->input->post('password_mhs'), PASSWORD_DEFAULT),
						'level' => 'mahasiswa'
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
		$hapus = $this->Model->hapus_data('npm', $id, 'mahasiswa');
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
		$data = $this->Model->ambil('npm', $username, 'mahasiswa')->row();

		echo json_encode($data);
	}

	public function edit_data(){
		$username = $this->input->post('id_mhs');
		$data = array(
				'npm' => $this->input->post('nim'),
				'nama_mhs' => $this->input->post('nama_mhs'),
				'tempat_lahir' => $this->input->post('tempat_lahir_mhs'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir_mhs'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin_mhs'),
				'agama' => $this->input->post('agama_mhs'),
				'no_hp' => $this->input->post('no_hp_mhs'),
				'alamat' => $this->input->post('alamat_mhs'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'tahun_lulus' => $this->input->post('tahun_lulus_sekolah'),
				'alamat_sekolah' => $this->input->post('alamat_sekolah'),
				'tahun_masuk_kuliah' => $this->input->post('tahun_masuk_kuliah'),
				'id_kelas' => $this->input->post('kelas_mhs'),
				'nama_ayah' => $this->input->post('nama_ayah_kandung'),
				'nama_ibu' => $this->input->post('nama_ibu_kandung')
			);
		$update = $this->Model->edit_data('npm', $username, 'mahasiswa', $data);
		if($update){
			$data1 = array(
                'username' => $this->input->post('nim'),
				'nama' => $this->input->post('nama_mhs'),
				'password' => password_hash($this->input->post('password_mhs'), PASSWORD_DEFAULT),
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