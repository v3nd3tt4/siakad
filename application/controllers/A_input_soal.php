<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_input_soal extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('upload');
		if($this->session->userdata('status') == '' || $this->session->userdata('level')!='admin'){
			echo'<script>window.location.href="'.base_url().'";</script>';
		}
	}

	public function index(){
        $data = array(
            'page' => 'a_input_soal',
            'data_soal' => $this->Model->list_data_all('soal'),
        );
        $this->load->view('template_admin/wrapper', $data);
    }

    public function buat_soal(){
        $data = array(
            'page' => 'a_buat_soal',
            'matakuliah' => $this->Model->list_data('matakuliah'),
            'data_soal' => $this->Model->list_data_all('soal'),
        );
        $this->load->view('template_admin/wrapper', $data);
    }

    public function lanjutkan_soal(){
        $mk = $this->input->post('matakuliah', true);
        $judul = $this->input->post('judul_soal', true);
        $jumlah_soal = $this->input->post('jumlah_soal', true);
        $data = array(
            'page' => 'a_isi_soal',
            'matakuliah' => $this->Model->ambil_new('matakuliah', array('kode_mk' => $mk)),
            'data_soal' => $this->Model->list_data_all('soal'),
        );
        $this->load->view('template_admin/wrapper', $data);
    }
    
}