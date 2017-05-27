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

    public function simpan(){

        if($this->input->post('judul_buat_ujian', true) == '' || $this->input->post('tgl_mulai', true) == '' || $this->input->post('tgl_berakhir', true) == '' || $this->input->post('status', true) == '' || $this->input->post('kelas', true) == '' || $this->input->post('soal', true) == ''){
            echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';
        }else{
            $data = array(              
                'judul_buat_ujian' => $this->input->post('judul_buat_ujian', true),
                'tgl_mulai' => $this->input->post('tgl_mulai', true),
                'tgl_berakhir' => $this->input->post('tgl_berakhir', true),
                'status' => $this->input->post('status', true),
                'waktu_pengerjaan' => $this->input->post('waktu_pengerjaan', true),
                'id_kelas' => $this->input->post('kelas', true),
                'id_soal' => $this->input->post('soal', true),
            );
            $simpan = $this->Model->input_data($data, 'tb_buat_ujian');
            if($simpan){
                echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
                echo'<script>location.reload();</script>';
            }else{
                echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
            }
        }
    }

    public function ambil(){
        $username = $this->input->post('id');
        $data = $this->Model->ambil('id_buat_ujian', $username, 'tb_buat_ujian')->row();

        echo json_encode($data);
    }

    public function edit_data(){
        if($this->input->post('judul_buat_ujian', true) == '' || $this->input->post('tgl_mulai', true) == '' || $this->input->post('tgl_berakhir', true) == '' || $this->input->post('status', true) == '' || $this->input->post('kelas', true) == '' || $this->input->post('soal', true) == ''){
            echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Lengkapi Data !</div>';
        }else{
            $data = array(              
                'judul_buat_ujian' => $this->input->post('judul_buat_ujian', true),
                'tgl_mulai' => $this->input->post('tgl_mulai', true),
                'tgl_berakhir' => $this->input->post('tgl_berakhir', true),
                'status' => $this->input->post('status', true),
                'waktu_pengerjaan' => $this->input->post('waktu_pengerjaan', true),
                'id_kelas' => $this->input->post('kelas', true),
                'id_soal' => $this->input->post('soal', true),
            );
            $simpan = $this->Model->edit_data('id_buat_ujian', $this->input->post('id_buat_ujian', true), 'tb_buat_ujian', $data);
            if($simpan){
                echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
                echo'<script>location.reload();</script>';
            }else{
                echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
            }
        }
    }

    public function hapus_data(){
        $id=$this->input->post('id');
        $hapus = $this->Model->hapus_data('id_buat_ujian', $id, 'tb_buat_ujian');
        if($hapus){
            echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
            echo'<script>location.reload();</script>';
        }
        else{
            echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
        }
    }
    
}