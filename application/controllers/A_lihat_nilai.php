<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_lihat_nilai extends CI_Controller {

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
			'page' => 'a_lihat_nilai',
			'user' => $this->session->userdata('nama'),
			'matakuliah' => $this->Model->list_data('matakuliah'),
			'kelas' => $this->Model->list_data('kelas')
		);
		$this->load->view('template_admin/wrapper', $data);
	}

	public function show_view_nilai(){
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
				//echo '<button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button><br/><br/>';
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
								/*echo '<th>UTS (30%)</th>';
								echo '<th>UAS (40%)</th>';
								echo '<th>Total</th>';*/
								echo '<th>Huruf Mutu</th>';
							echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						//$presentase_tugas = 30 / 100;
						//$presentase_uts = 30 / 100;
						//$presentase_uas = 40 / 100;
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
									//$tugas = $data->tugas * $presentase_tugas;
									//$uts = $data->uts * $presentase_uts;
									//$uas = $data->uas * $presentase_uas;
									$jumlah = $data->nilai;								
									echo '<td>'.$data->nilai.'</td>';
									//echo '<td>'.$data->uts.'</td>';
									//echo '<td>'.$data->uas.'</td>';
									}
								}else{
									//$tugas = 0 * $presentase_tugas;
									//$uts = 0 * $presentase_uts;
									//$uas = 0 * $presentase_uas;
									$jumlah = 0;	
									echo '<td>0</td>';
									//echo '<td>0</td>';
									//echo '<td>0</td>';
								}	
								$huruf_mutu = $this->Model->huruf_mutu($jumlah);
									//echo '<td>'.number_format($jumlah, 2).'</td>';
									echo '<td>'.$huruf_mutu.'</td>';						
							echo '</tr>';														
						}
						echo '</tbody>';
					echo '</table>';
				echo '</div>';
			echo '</form>';
		}

	}
}