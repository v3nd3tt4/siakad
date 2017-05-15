<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lihat_nilai extends CI_Controller {

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
			'page' => 'm_lihat_nilai',
			'isi' => $this->db->query("select *, mahasiswa.tanggal_lahir, mahasiswa.jenis_kelamin, mahasiswa.alamat, mahasiswa.no_hp, mahasiswa.agama, mahasiswa.tempat_lahir from mahasiswa left join kelas on mahasiswa.id_kelas=kelas.id left join pembimbing_akademik on pembimbing_akademik.npm=mahasiswa.npm left join dosen on pembimbing_akademik.kode_dosen=dosen.no_dosen where mahasiswa.npm='$npm'")->row(),
			'nilai' => $this->db->query("select krs.npm, mahasiswa.nama_mhs, krs.semester, krs.kode_mk, matakuliah.nama_mk, nilai.nilai from mahasiswa join krs on mahasiswa.npm = krs.npm join matakuliah on krs.kode_mk = matakuliah.kode_mk join nilai on krs.id = nilai.id_krs where krs.npm = '$npm'
order by krs.semester and krs.kode_mk DESC")
			
		);
		$this->load->view('template_mahasiswa/wrapper', $data);
	}
}