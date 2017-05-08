<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$data = array(
			'page' => 'm_home'
		);
		$this->load->view('template_mahasiswa/wrapper', $data);
	}

}      