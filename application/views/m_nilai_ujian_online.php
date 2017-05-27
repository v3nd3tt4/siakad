<div class="col-md-10 content">
	<br/>
	<h3>Nilai Ujian Online</h3>
	<hr/>
	<table class="table table-striped t">
		<thead>
			<tr>
				<th>No.</th>
				<th>Matakuliah</th>
				<th>Tanggal Pengerjaan</th>
				<th>Jumlah Soal</th>
				<th>Jawaban Benar</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($data->result() as $row){?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$row->nama_mk?></td>
				<td><?=$row->tgl_pengerjaan?></td>
				<td><?=$row->jumlah_soal?></td>
				<td><?=$row->jumlah_benar?></td>
				<td><?=$row->nilai?></td>
			</tr>
			<?php $no++; }?>
		</tbody>
	</table>
</div>