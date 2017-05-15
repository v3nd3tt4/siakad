<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_input_nilai extends CI_Controller {

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
			'page' => 'a_input_nilai',
			'user' => $this->session->userdata('nama'),
			'matakuliah' => $this->Model->list_data('matakuliah'),
			'kelas' => $this->Model->list_data('kelas')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function show_list_nilai(){
		$matakuliah = $this->input->post('matakuliah');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$tampil = $this->db->query("select krs.id, krs.npm, mahasiswa.nama_mhs, kelas.nama_kelas, krs.kode_mk, matakuliah.nama_mk  from krs join matakuliah on krs.kode_mk = matakuliah.kode_mk join mahasiswa on krs.npm = mahasiswa.npm join kelas on kelas.id = mahasiswa.id_kelas where kelas.nama_kelas = '$kelas' and krs.kode_mk = '$matakuliah' and krs.semester='$semester' order by mahasiswa.nama_mhs");
		$hitung = $tampil->num_rows();
		$show = $tampil->result();
		if($hitung <= 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data tidak ditemukan.
</div>';
		}else{
			$no = 1;
			echo '<div id="notif_form_insert_nilai"></div>';
			echo '<form id="form_insert_nilai">';
				echo '<button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button><br/><br/>';
				echo '<div class="table-responsive">';
					echo '<table class="table table-striped table-bordered table-hover">';
						echo '<thead>';
							echo '<tr>';
								echo '<th>No.</th>';
								echo '<th>NPM</th>';
								echo '<th>Nama Mahasiswa</th>';
								echo '<th>Nama Kelas</th>';
								//echo '<th>Nama Matakuliah</th>';
								echo '<th>Nilai</th>';
								/*echo '<th>UTS</th>';
								echo '<th>UAS</th>';*/
							echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						foreach ($show as $show ) {																					
							echo '<tr>';
								echo '<td>'.$no++.'. <input type="text" style="display: none"  class="form-control" name="id_krs[]" value="'.$show->id.'"/></td>';
								echo '<td>'.$show->npm.'</td>';
								echo '<td>'.$show->nama_mhs.'</td>';
								echo '<td>'.$show->nama_kelas.'</td>';
								//echo '<td>'.$show->nama_mk.'</td>';
								$query = $this->Model->ambil('id_krs', $show->id, 'nilai');
								$cek = $query->num_rows();		
								$data = $query->result();
								if($cek == 1){
									foreach ($data as $data) {
									echo '<td><input name="tugas[]" type="number" class="form-control" value="'.$data->nilai.'" /></td>';
									/*echo '<td><input name="uts[]" type="number" class="form-control" value="'.$data->uts.'"/></td>';
									echo '<td><input name="uas[]" type="number" class="form-control" value="'.$data->uas.'"/></td>';*/
									}
								}else{
									echo '<td><input name="tugas[]" type="number" class="form-control" value="0" /></td>';
									/*echo '<td><input name="uts[]" type="number" class="form-control" value="0"/></td>';
									echo '<td><input name="uas[]" type="number" class="form-control" value="0" /></td>';*/
								}								
							echo '</tr>';														
						}
						echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</form>';
		}

	}

	public function proses_insert_nilai(){
		$id_krs = $this->input->post('id_krs');
		$tugas = $this->input->post('tugas');
		$uts = $this->input->post('uts');
		$uas = $this->input->post('uas');
		$jumlah = count($tugas);
		for($i=0; $i<$jumlah; $i++){
			$query = $this->Model->ambil('id_krs', $id_krs[$i], 'nilai');
			$cek = $query->num_rows();		
			//$result = $query->result();
			if($cek == 1){
				$data = array(					
					'nilai' => $tugas[$i],					
					'tanggal' => date('Y-m-d'),
					'user' => $this->session->userdata('username')
				);
				$simpan = $this->Model->edit_data('id_krs', $id_krs[$i], 'nilai', $data);
			}else{				
				$data = array(
					'id_krs' =>$id_krs[$i],
					'nilai' => $tugas[$i],					
					'tanggal' => date('Y-m-d'),
					'user' => $this->session->userdata('username')
				);
				$simpan = $this->Model->input_data($data, 'nilai');
			}
		}		
		if($simpan){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil!</div>';
		}else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal Disimpan!</div>';
		}
	}

}      