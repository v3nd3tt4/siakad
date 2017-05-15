<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model');
	}

	public function index(){
	}

	public function login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$cari = $this->db->query("select * from user where username = '$username'");
		$hitung = $cari->num_rows();
		if($hitung == 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Username tidak ditemukan !</div>';
		}else{
			$data = $cari->row();
			$cocok = password_verify($password, $data->password);
			if($cocok){
				$sess_data['status']='login';
				//$sess_data['id']=$sess->id;
				$sess_data['username']=$data->username;
				$sess_data['nama']=$data->nama;
				$sess_data['password']=$data->password;
				$sess_data['level']=$data->level;
				$this->session->set_userdata($sess_data);
				$level = $data->level;
				if($level == 'admin'){
					echo'<script>window.location.href="'.base_url().'a_home";</script>';
					echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert"	 arial-label="close">&times;</a>User ditemukan, sedang menyambungkan..</div>';
				}else if($level == 'mahasiswa'){
					$cek_blokir = $this->db->query("select * from blokir where npm='$username' and status='blocked'")->num_rows();
					if($cek_blokir > 0){
						echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Anda terblokir silahkan hubungi 085768551713 atau bagian akademik !</div>';
					}else{
						echo'<script>window.location.href="'.base_url().'m_home";</script>';
						echo'<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert"	 arial-label="close">&times;</a>User ditemukan, sedang menyambungkan..</div>';
					}
				}
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Password salah !</div>';
			}
		}
	}

	public function logout(){
		echo 'Please wait...';
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('level');
		//session_destroy();
		echo '<script>window.location.href="'.base_url().'";</script>';
	}

}