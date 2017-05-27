<div class="col-md-10 content">
	<br/>
	<h3>Ujian Online</h3>
	<hr/>
	<table class="table table-striped t">
		<thead>
			<tr>
				<th>No.</th>
				<th>Judul</th>
				<th>Matakuliah</th>
				<th>Waktu</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($data_ujian->result() as $row) {
			?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$row->judul_buat_ujian?></td>
				<td><?=$row->nama_mk?></td>
				<td><?=$row->waktu_pengerjaan?> Menit</td>
				<td>
					<a href="<?=base_url()?>m_mulai_ujian/kerjakan?id_buat_ujian=<?=$row->id_buat_ujian?>&session=<?=$session_id?>" class="btn btn-danger">Kerjakan</a>
				</td>
			</tr>
			<?php
			$no++;
			}
			?>
			
		</tbody>
	</table>
</div>