<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Controller {

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
		$npm = $this->session->userdata('username');
		$data = array(
			'page' => 'm_home',
			'isi' => $this->db->query("select *, mahasiswa.tanggal_lahir, mahasiswa.jenis_kelamin, mahasiswa.alamat, mahasiswa.no_hp, mahasiswa.agama, mahasiswa.tempat_lahir from mahasiswa left join kelas on mahasiswa.id_kelas=kelas.id left join pembimbing_akademik on pembimbing_akademik.npm=mahasiswa.npm left join dosen on pembimbing_akademik.kode_dosen=dosen.no_dosen where mahasiswa.npm='$npm'")->row()
			
		);
		$this->load->view('template_mahasiswa/wrapper', $data);
	}
}