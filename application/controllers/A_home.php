<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_home extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('image_lib');
        $this->load->library('upload');
		if($this->session->userdata('status') == '' || $this->session->userdata('level') !='admin'){
			echo'<script>window.location.href="'.base_url().'";</script>';
		}
	}

	public function index(){
		$data = array(
			'page' => 'a_home',
			'user' => $this->session->userdata('nama')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

}      