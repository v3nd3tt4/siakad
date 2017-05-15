<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buat_krs extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('Model');
        $this->load->library('image_lib');
        $this->load->library('upload');
        include'assets/html2pdf-master/html2pdf.class.php';
		if($this->session->userdata('status') == '' || $this->session->userdata('level')!='mahasiswa'){
			echo'<script>window.location.href="'.base_url().'";</script>';
		}
	}

	public function index($semester){
		$i=1;
		$npm = $this->session->userdata('username');
		$kel = $this->Model->ambil('npm', $npm, 'mahasiswa')->row();
		$query= $this->db->query("select * from status_krs where npm='$npm' and semester='$semester'");
		$hitung = $query->num_rows();
		if($hitung==0){
			$data1= array(
				'npm' => $npm,
				'semester' => $semester,
				'status' => 'lihat'
			);
			$this->Model->input_data($data1, 'status_krs');
		}/*else{
			$stat= 'lihat';			
			$this->db->query("update status_krs set status='$stat' where npm='$npm' and semester='$semester'");
		}*/
		$data = array(
			'semester' => $semester,
			'page' => 'm_buat_krs',
			'isi' => $this->db->query("select *, peruntukan_matakuliah.semester as semesternya from matakuliah left join peruntukan_matakuliah on matakuliah.kode_mk=peruntukan_matakuliah.kode_mk where peruntukan_matakuliah.kode_kelas='$kel->id_kelas' and peruntukan_matakuliah.angkatan='$kel->tahun_masuk_kuliah' order by peruntukan_matakuliah.semester asc")->result(),
			'krs' => $this->db->query("select *, krs.id as krsid from krs left join matakuliah on krs.kode_mk=matakuliah.kode_mk where krs.npm='$npm' and krs.semester='$semester'"),
			'sks' => $this->db->query("select *, sum(matakuliah.sks) as jumlah_sks from krs left join matakuliah on krs.kode_mk=matakuliah.kode_mk where krs.npm='$npm' and krs.semester='$semester'")->row()
		);
		$this->load->view('template_mahasiswa/wrapper', $data);
	}

	public function simpan(){
		$npm = $this->session->userdata('username');
		$semester = $this->input->post('sem');
		$mk = $this->input->post('mk');
		$kel = $this->Model->ambil('npm', $npm, 'mahasiswa')->row();
		$cek_data_ganda = $this->db->query("select * from krs where kode_mk='$mk' and npm='$npm' and semester='$semester'")->num_rows();
		$cek_masa_krs = $this->db->query("select * from mas_krs where semester='$semester' and angkatan='$kel->tahun_masuk_kuliah' and id_kelas='$kel->id_kelas' and status='close' ")->num_rows();
		if($cek_masa_krs != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Masa pengisian KRS telah habis ! silahkan hubungi 085768551713 atau BAAK</div>';
		}else if($cek_data_ganda != 0){
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Anda telah mengambil matakuliah ini di semester sekarang !</div>';
		}else{
			$data = array(
				'npm' => $this->session->userdata('username'),
				'kode_mk' => $this->input->post('mk'),
				'semester' => $this->input->post('sem'),
				'tanggal' => date('Y/m/d')
			);
			$simpan = $this->Model->input_data($data, 'krs');
			if($simpan){
				echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil disimpan !</div>';
				echo'<script>location.reload();</script>';
			}else{
				echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal disimpan !</div>';
			}
		}
	}

	public function hapus(){
		$id = $this->input->post('id');
		$hapus = $this->Model->hapus_data('id', $id, 'krs');
		if($hapus){
			echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Berhasil hapus !</div>';
			echo'<script>location.reload();</script>';
		}
		else{
			echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> Gagal hapus !</div>';
		}
	}

	public function cetak_krs($semester){
		$npm = $this->session->userdata('username');
		$data_mahasiswa = $this->db->query("select * from mahasiswa left join kelas on mahasiswa.id_kelas=kelas.id where npm = '$npm'")->row();
		$krs = $this->db->query("select *, krs.id as krsid from krs left join matakuliah on krs.kode_mk=matakuliah.kode_mk where krs.npm='$npm' and krs.semester='$semester'")->result();
		$isi = $this->db->query("select * from mahasiswa left join kelas on mahasiswa.id_kelas=kelas.id left join pembimbing_akademik on pembimbing_akademik.npm=mahasiswa.npm left join dosen on pembimbing_akademik.kode_dosen=dosen.no_dosen where mahasiswa.npm='$npm'")->row();
		$total_sks = $this->db->query("select *, sum(matakuliah.sks) as total from krs left join matakuliah on krs.kode_mk=matakuliah.kode_mk where krs.npm='$npm' and krs.semester='$semester'")->row();
		ob_start();
	?>
		<img src="assets/images/logo-01.png" width="70" style="float:left;"  />
	    <p style="float:left; margin-left:80px;"  >
	    <b>STEKOMINDO</b><br/>
	    IZIN OPERASIONAL No.420.9 / 2070/IV.40/2014<br/>
	    NOMOR INDUK LEMBAGA KEPENDIDIKAN. 12201.4.1.000.99 <br/>
	    TERAKREDITASI A BAN-PNF No.020/K. 1/SK/AKR/2015 <br/>
	    Email :admin@stekomindo.or.id Website:www.stekomindo.or.id <br/>
	    </p>
	    <hr/>
	    <p style="text-align:center; margin-top:0px;">
	    <u><b>Kartu Rencana Studi (KRS)</b></u><br/><br/>
	    </p>
	    
	    <table>
	    <tr>
	    	<td>NPM</td><td>:</td><td><?=$this->session->userdata('username')?></td>
	    </tr>
	    <tr>
	    	<td>Nama</td><td>:</td><td><?=$data_mahasiswa->nama_mhs?></td>
	    </tr>
	    <tr>
	    	<td>Kelas</td><td>:</td><td><?=$data_mahasiswa->nama_kelas?></td>
	    </tr>
	    <tr>
	    	<td>Trimester</td><td>:</td><td><?=$semester?></td>
	    </tr>
        <tr>
	    	<td>Program</td><td>:</td><td>Manajemen Informartika (Sub Pemrograman Komputer) </td>
	    </tr>
	    </table>
	    <br/><br/>
	    <table style="width:100%" border="1" bordercolor="#000000" cellspacing="0">
	    <thead>
	    	<tr>
	    		<td style="width:5%;">&nbsp;No<br/></td>
	    		<td style="width:20%">&nbsp;Kode Matakuliah<br/></td>
	    		<td style="width:55%">&nbsp;Nama Matakuliah<br/></td>
	    		<td style="width:10%">&nbsp;Bobot<br/></td>
                <td style="width:10%">&nbsp;Ket<br/></td>
	    	</tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$no=1;
	    		foreach($krs as $krs){
	    	?>
	    	<tr>
	    		<td style="width:5%;">&nbsp;<?=$no++?>.<br/></td>
	    		<td style="width:20%">&nbsp;<?=$krs->kode_mk?><br/></td>
	    		<td style="width:55%">&nbsp;<?=$krs->nama_mk?><br/></td>
	    		<td style="width:10%">&nbsp;<?=$krs->sks?><br/></td>
                <td style="width:10%">&nbsp;<?=$krs->keterangan?><br/></td>
	    	</tr>
	    	<?php
	    		}
	    	?>
	    </tbody>
	    </table>

	    <br/><br/>
	    <table style="width:100%" >
	    	<tr>
	    		<td style="width:60%;">Total SKS: <?=$total_sks->total?>
	    		<?php
	    			if($total_sks->total>24){
	    				echo '<b style="color:red"> (Melebihi batas maksimal)</b>';
	    			}
	    		?>
	    		</td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%">&nbsp;Bandar Lampung, <?=date("j F Y", strtotime(date('Y/m/d')))?><br/></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;">Mahasiswa<br/><br/><br/><br/><br/><br/>
	    		<?=strtoupper($data_mahasiswa->nama_mhs)?><br/>
	    		</td>
	    		<td style="width:40%">&nbsp;Pembimbing Akademik<br/><br/><br/><br/><br/><br/>
	    		&nbsp;<?=$isi->nama_dosen?><br/>
	    		</td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    
	    </table>
	    <table style="width:100%" >
	    <tr>
	    		<td style="width:40%;"></td>
	    		<td style="width:60%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:40%;"></td>
	    		<td style="width:60%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:40%;"></td>
	    		<td style="width:60%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:35%;"></td>
	    		<td style="width:65%">Mengetahui, <br/>Kepala BAAK<br/><br/><br/><br/><br/><br/>
	    		Muhammad Iqbal, S. Pd. I</td>
	    		
	    	</tr>
	    </table>
	    
	<?php
		$content=ob_get_clean();  
		$html2pdf=new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15',array(20, 0, 20, 0));
		$html2pdf->setDefaultFont('Arial');  
	    $html2pdf->writeHTML($content);  
	    $html2pdf->Output('krs.pdf');
	}

	public function cetak_khs($semester){
		$npm = $this->session->userdata('username');
		$data_mahasiswa = $this->db->query("select * from mahasiswa left join kelas on mahasiswa.id_kelas=kelas.id where npm = '$npm'")->row();
		$krs = $this->db->query("select *, krs.id as krsid from krs left join matakuliah on krs.kode_mk=matakuliah.kode_mk where krs.npm='$npm' and krs.semester='$semester'")->result();
		$isi = $this->db->query("select * from mahasiswa left join kelas on mahasiswa.id_kelas=kelas.id left join pembimbing_akademik on pembimbing_akademik.npm=mahasiswa.npm left join dosen on pembimbing_akademik.kode_dosen=dosen.no_dosen where mahasiswa.npm='$npm'")->row();
		$total_sks = $this->db->query("select *, sum(matakuliah.sks) as total from krs left join matakuliah on krs.kode_mk=matakuliah.kode_mk where krs.npm='$npm' and krs.semester='$semester'")->row();
		$nilai = $this->db->query("select krs.npm, mahasiswa.nama_mhs, krs.semester, krs.kode_mk, matakuliah.nama_mk, matakuliah.sks, matakuliah.keterangan, nilai.nilai from mahasiswa join krs on mahasiswa.npm = krs.npm join matakuliah on krs.kode_mk = matakuliah.kode_mk join nilai on krs.id = nilai.id_krs where krs.npm = '$npm' and krs.semester='$semester' order by krs.semester and krs.kode_mk DESC")->result();
		ob_start();
	?>
		<img src="assets/images/logo-01.png" width="70" style="float:left;"  />
	    <p style="float:left; margin-left:80px;"  >
	    <b>STEKOMINDO</b><br/>
	    IZIN OPERASIONAL No.420.9 / 2070/IV.40/2014<br/>
	    NOMOR INDUK LEMBAGA KEPENDIDIKAN. 12201.4.1.000.99 <br/>
	    TERAKREDITASI A BAN-PNF No.020/K. 1/SK/AKR/2015 <br/>
	    Email :admin@stekomindo.or.id Website:www.stekomindo.or.id <br/>
	    </p>
	    <hr/>
	    <p style="text-align:center; margin-top:0px;">
	    <u><b>Kartu Hasil Studi (KHS)</b></u><br/><br/>
	    </p>
	    
	    <table>
	    <tr>
	    	<td>NPM</td><td>:</td><td><?=$this->session->userdata('username')?></td>
	    </tr>
	    <tr>
	    	<td>Nama</td><td>:</td><td><?=$data_mahasiswa->nama_mhs?></td>
	    </tr>
	    <tr>
	    	<td>Kelas</td><td>:</td><td><?=$data_mahasiswa->nama_kelas?></td>
	    </tr>
	    <tr>
	    	<td>Trimester</td><td>:</td><td><?=$semester?></td>
	    </tr>
        <tr>
	    	<td>Program</td><td>:</td><td>Manajemen Informartika (Sub Pemrograman Komputer) </td>
	    </tr>
	    </table>
	    <br/><br/>
	    <table style="width:100%" border="1" bordercolor="#000000" cellspacing="0">
	    <thead>
	    	<tr>
	    		<td style="width:5%;">&nbsp;No<br/></td>
	    		<td style="width:15%">&nbsp;Kode Matakuliah<br/></td>
	    		<td style="width:55%">&nbsp;Nama Matakuliah<br/></td>
	    		<td style="width:8%">&nbsp;Bobot<br/></td>
                <td style="width:5%">&nbsp;Ket<br/></td>
                <td style="width:8%">&nbsp;nilai<br/></td>
                <td style="width:5%">&nbsp;HM<br/></td>
	    	</tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$no=1;
	    		foreach($nilai as $krs){
	    	?>
	    	<tr>
	    		<td style="width:5%;">&nbsp;<?=$no++?>.<br/></td>
	    		<td style="width:15%">&nbsp;<?=$krs->kode_mk?><br/></td>
	    		<td style="width:55%">&nbsp;<?=$krs->nama_mk?><br/></td>
	    		<td style="width:8%">&nbsp;<?=$krs->sks?><br/></td>
                <td style="width:5%">&nbsp;<?=$krs->keterangan?><br/></td>
                <td style="width:8%">&nbsp;<?=$krs->nilai?><br/></td>
                <td style="width:5%">&nbsp;<?=$this->Model->huruf_mutu($krs->nilai)?><br/></td>
	    	</tr>
	    	<?php
	    		}
	    	?>
	    </tbody>
	    </table>

	    <br/><br/>
	    <table style="width:100%" >
	    	<tr>
	    		<td style="width:60%;">Total SKS: <?=$total_sks->total?>
	    		<?php
	    			if($total_sks->total>24){
	    				echo '<b style="color:red"> (Melebihi batas maksimal)</b>';
	    			}
	    		?>
	    		</td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%">&nbsp;Bandar Lampung, <?=date("j F Y", strtotime(date('Y/m/d')))?><br/></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;">Mahasiswa<br/><br/><br/><br/><br/><br/>
	    		<?=strtoupper($data_mahasiswa->nama_mhs)?><br/>
	    		</td>
	    		<td style="width:40%">&nbsp;Pembimbing Akademik<br/><br/><br/><br/><br/><br/>
	    		&nbsp;<?php echo $isi->nama_dosen; ?><br/>
	    		</td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:60%;"></td>
	    		<td style="width:40%"></td>
	    		
	    	</tr>
	    
	    </table>
	    <table style="width:100%" >
	    <tr>
	    		<td style="width:40%;"></td>
	    		<td style="width:60%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:40%;"></td>
	    		<td style="width:60%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:40%;"></td>
	    		<td style="width:60%"></td>
	    		
	    	</tr>
	    	<tr>
	    		<td style="width:35%;"></td>
	    		<td style="width:65%">Mengetahui, <br/>Kepala BAAK<br/><br/><br/><br/><br/><br/>
	    		Muhammad Iqbal, S. Pd. I</td>
	    		
	    	</tr>
	    </table>
	    
	<?php
		$content=ob_get_clean();  
		$html2pdf=new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15',array(20, 0, 20, 0));
		$html2pdf->setDefaultFont('Arial');  
	    $html2pdf->writeHTML($content);  
	    $html2pdf->Output('khs.pdf');

	}

}
