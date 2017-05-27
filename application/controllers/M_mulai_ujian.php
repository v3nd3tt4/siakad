<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mulai_ujian extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('image_lib');
        $this->load->library('upload');
		if($this->session->userdata('status') == '' || $this->session->userdata('level')!='mahasiswa'){
			echo'<script>window.location.href="'.base_url().'";</script>';
		}
	}

	public function index(){
		$this->db->from('mahasiswa');
		$this->db->join('tb_buat_ujian', 'tb_buat_ujian.id_kelas = mahasiswa.id_kelas');
		$this->db->join('soal', 'soal.id_soal = tb_buat_ujian.id_soal');
		$this->db->join('matakuliah', 'soal.kode_mk = matakuliah.kode_mk');
		$this->db->where(array('mahasiswa.npm' => $this->session->userdata('username'), 'tb_buat_ujian.status' => 'on' ));
		$list_ujian = $this->db->get();

		$this->session->set_userdata(array('session_id' => rand()));
		$data = array(
			'page' => 'm_mulai_ujian',
			'data_ujian' => $list_ujian,
			'session_id' => $this->session->userdata('session_id')
		);

		$this->load->view('template_mahasiswa/wrapper', $data);
	}

	public function kerjakan(){
		$this->db->from('tb_buat_ujian');
		$this->db->join('soal', 'soal.id_soal = tb_buat_ujian.id_soal');
		$this->db->join('tb_isi_soal', 'tb_isi_soal.id_soal = soal.id_soal');
		$this->db->join('matakuliah', 'soal.kode_mk = matakuliah.kode_mk');
		$this->db->where(array('tb_buat_ujian.id_buat_ujian' => $this->input->get('id_buat_ujian', true)));
		$soal = $this->db->get();

		$cek = $this->Model->ambil_new('tb_status_ujian', array('npm' => $this->session->userdata('username'), 'id_buat_ujian' =>  $this->input->get('id_buat_ujian', true)));

		$now = strtotime(date('Y-m-d'));
		$tgl_mulai = strtotime($soal->result()[0]->tgl_mulai);
		$tgl_berakhir = strtotime($soal->result()[0]->tgl_berakhir);
		$status_ujian = $soal->result()[0]->status;
		if($this->input->get('session', true) != $this->session->userdata('session_id')){
			$status = 'fail';
			$text = 'Maaf anda tidak boleh mengakses halaman ini';
		}else if($now < $tgl_mulai){
			$status = 'fail';
			$text = 'Maaf, Ujian belum dibuka';
		}else if($now > $tgl_berakhir){
			$status = 'fail';
			$text = 'Maaf, waktu pelaksanaan ujian telah berakhir';
		}else if($status_ujian == 'off'){
			$status = 'fail';
			$text = 'Maaf, waktu pelaksanaan ujian telah berakhir';
		}else if($cek->num_rows() != 0){
			$status = 'fail';
			$text = 'Maaf, anda sudah mengerjakan soal ini';
		}else{
			$status = 'ok';
			$text = '';
		}

		$data = array(
			'page' => 'm_kerjakan_ujian',
			'soal' => $soal,
			'status' => $status,
			'text' => $text
		);

		$this->load->view('template_mahasiswa/wrapper', $data);
	}

	public function simpan_jawaban(){
		$cek = $this->Model->ambil_new('tb_status_ujian', array('npm' => $this->session->userdata('username'), 'id_buat_ujian' =>  $this->input->post('id_buat_ujian', true)));

		if($this->input->post('id_buat_ujian', true) == '' || $this->input->post('jumlah_soal', true) == '' || $this->input->post('id_soal', true) == '' || $this->input->post('no_soal', true) == ''){
			echo'<script>window.location.href="'.base_url().'m_mulai_ujian";</script>';
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Terjadi Kesalahan sistem !</div>';
		}else if($cek->num_rows() != 0){
			echo'<script>window.location.href="'.base_url().'m_mulai_ujian";</script>';
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Maaf, anda sudah mengerjakan soal ini !</div>';
		}else{
			$data_to_status_ujian = array(
				'npm' => $this->session->userdata('username'),
				'id_buat_ujian' => $this->input->post('id_buat_ujian', true)
			);

			$data_to_jawaban = array();
			$jawaban_peserta = array();
			$kunci_jawaban = array();
			//memulai transaksi
			$this->db->trans_begin();

			//simpan ke tb status ujian
			$this->Model->input_data($data_to_status_ujian, 'tb_status_ujian');

			//ambil id terakhir
			$last_id = $this->Model->last_id();

			//tampung dulu jawaban
			for($i = 0; $i < count($this->input->post('no_soal', true)); $i++){
				$data_to_jawaban[] = array(
					'id_status_ujian' => $last_id,
					'npm' => $this->session->userdata('username'),
					'id_soal' => $this->input->post('id_soal', true),
					'no_soal' => $this->input->post('no_soal', true)[$i],
					'jawaban_peserta' => $this->input->post('jawaban_user', true)[$i]
				);
				$jawaban_peserta[] = $this->input->post('jawaban_user', true)[$i];
			}

			//simpan jawaban
			$this->Model->input_data_simultan($data_to_jawaban, 'tb_jawaban');

			//get kunci jawaban dari soal
			$get_kunci_jawaban = $this->Model->ambil_new('tb_isi_soal', array('id_soal' => $this->input->post('id_soal', true)));

			//tampung kunci jawaban dalam array
			foreach ($get_kunci_jawaban->result() as $get_kunci_jawaban) {
				$kunci_jawaban[] = $get_kunci_jawaban->jawaban_benar;
			}

			$jumlah_soal = $this->input->post('jumlah_soal', true);

			//pengkoreksian jawaban yang cocok
			$koreksi = array_intersect_assoc($jawaban_peserta,$kunci_jawaban);

			$hitung_koreksi = count($koreksi);

			$nilai = ($hitung_koreksi/$jumlah_soal)*100;
			$data_update_to_status_ujian = array(
				'nilai' => $nilai,
				'jumlah_benar' => $hitung_koreksi,
				'status' => 'sudah',
				'tgl_pengerjaan' => date('Y-m-d H:i:s')
			);

			//update status ujian
			$this->Model->edit_data('id_status_ujian', $last_id, 'tb_status_ujian', $data_update_to_status_ujian);

			if ($this->db->trans_status() === FALSE){
			    $this->db->trans_rollback();
			    echo'<script>window.location.href="'.base_url().'m_mulai_ujian";</script>';
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Terjadi kesalahan sistem !</div>';
			}
			else{
			    $this->db->trans_commit();
			    echo'<script>window.location.href="'.base_url().'m_mulai_ujian";</script>';
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Terimakasih, berhasil disimpan !</div>';
			}
		}
	}

	public function nilai_ujian_online(){
		$this->db->from('tb_status_ujian');
		$this->db->join('tb_buat_ujian', 'tb_buat_ujian.id_buat_ujian = tb_status_ujian.id_buat_ujian');
		$this->db->join('soal', 'soal.id_soal = tb_buat_ujian.id_soal');
		$this->db->join('matakuliah', 'matakuliah.kode_mk = soal.kode_mk');
		$this->db->where(array('tb_status_ujian.npm' => $this->session->userdata('username')));
		$nilai = $this->db->get();
		$data = array(
			'page' => 'm_nilai_ujian_online',
			'data' => $nilai
		);
		$this->load->view('template_mahasiswa/wrapper', $data);

	}

}