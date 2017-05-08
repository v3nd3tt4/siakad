<div class="col-md-10 content">
	<h3>Biodata Diri</h3>
	<hr/>
	<div class="alert alert-danger"> <marquee><b><?=$this->session->userdata('nama')?></b>, Telitilah dalam memproses dan menginput data ! Jika terjadi error pada system hubungi 085768551713 atau Bagian Akademik</marquee></div>
	<table class="table table-striped">
	<table class="table table-striped">
	    <tr>
			<td>NPM</td>
			<td>:</td>
			<td><?=$isi->npm?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?=$isi->nama_mhs?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?=$isi->nama_kelas?></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td><?=$isi->tempat_lahir?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><?=date('d F Y',strtotime($isi->tanggal_lahir))?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?=$isi->jenis_kelamin?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td><?=$isi->agama?></td>
		</tr>
		<tr>
			<td>Nomor Handphone</td>
			<td>:</td>
			<td><?=$isi->no_hp?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?=$isi->alamat?></td>
		</tr>
		<tr>
			<td>Tahun Masuk Kuliah</td>
			<td>:</td>
			<td><?=$isi->tahun_masuk_kuliah?></td>
		</tr>
		<tr>
			<td>Pembimbing Akademik</td>
			<td>:</td>
			<td><?=$isi->nama_dosen?></td>
		</tr>
	</table>
	<h3>Asal Sekolah</h3>
	<hr/>
	<table class="table table-striped">
	    <tr>
			<td>Nama Sekolah</td>
			<td>:</td>
			<td><?=$isi->asal_sekolah?></td>
		</tr>
		<tr>
			<td>Tahun Lulus</td>
			<td>:</td>
			<td><?=$isi->tahun_lulus?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?=$isi->alamat_sekolah?></td>
		</tr>
	</table>
</div>