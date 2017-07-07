<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_input_soal extends CI_Controller {
    
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

    public function edit_soal(){
        $id_soal = $this->input->get('id_soal', true);
        $data_soal = $this->Model->ambil_new('soal', array('id_soal' => $id_soal));
        $data = array(
            'page' => 'a_edit_soal',
            'soal' => $data_soal,
            'matakuliah' => $this->Model->ambil_new('matakuliah', array('kode_mk' => $data_soal->row()->kode_mk)),
            'isi_soal' => $this->Model->ambil_new('tb_isi_soal', array('id_soal' => $id_soal))
        );
        $this->load->view('template_admin/wrapper', $data);
    }

    public function simpan_soalnya(){
        $this->db->trans_begin();
        $data1 = array(
            'kode_mk' => $this->input->post('kode_mk', true),
            'judul_soal' => $this->input->post('judul_soal', true),
            'jumlah_soal' => $this->input->post('jumlah_soal', true),
            'tanggal_create' => date('Y-m-d H:i:s'),
        );
        $data2 = array();
        $simpan = $this->Model->input_data($data1, 'soal');
        $id_soal = $this->Model->last_id();
        for($i=0; $i<$this->input->post('jumlah_soal', true);$i++){
            $data2[] = array(
                'id_soal' => $id_soal,
                'no_soal' => $this->input->post('no_soal', true)[$i],
                'isi_soal' => $this->input->post('isi_soal', true)[$i],
                'jawaban_benar' => $this->input->post('jawaban_benar', true)[$i]

            );
        }

        $this->db->insert_batch('tb_isi_soal', $data2);

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan, terjadi kesalahan sistem !</div>');
            redirect("a_input_soal/lanjutkan_soal");
        }else{
            $this->db->trans_commit();
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>');
            redirect("a_input_soal/buat_soal");
        }
    }

    public function edit_soalnya(){
        $id_soal = $this->input->post('id_soal', true);
        $this->db->trans_begin();
        $data = array();
        for($i=0;$i<count($this->input->post('id_isi_soal', true));$i++){
            $data[] = array(
                'id_isi_soal' => $this->input->post('id_isi_soal', true)[$i],
                'isi_soal' => $this->input->post('isi_soal', true)[$i],
                'jawaban_benar' => $this->input->post('jawaban_benar', true)[$i]
            );
        }
        $this->db->update_batch('tb_isi_soal', $data, 'id_isi_soal');
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan, terjadi kesalahan sistem !</div>');
            redirect("a_input_soal/edit_soal?id_soal=$id_soal");
        }else{
            $this->db->trans_commit();
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>');
            redirect("a_input_soal/edit_soal?id_soal=$id_soal");
        }
    }
    
}
