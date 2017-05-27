<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_buat_ujian extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('upload');
		if($this->session->userdata('status') == '' || $this->session->userdata('level') !='admin'){
			echo'<script>window.location.href="'.base_url().'";</script>';
		}
	}

	public function index(){
        $data = array(
            'page' => 'a_buat_ujian',
            'data_ujian' => $this->Model->get_data_ujian(),
            'kelas' => $this->Model->list_data('kelas'),
            'soal' => $this->Model->list_data('soal'),
        );
        $this->load->view('template_admin/wrapper', $data);
    }
    
}