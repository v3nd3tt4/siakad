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
		$this->db->where(array('mahasiswa.npm' => $this->session->userdata('username')));
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

	//tes
}