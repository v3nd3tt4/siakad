<div class="col-md-10 content">
	<h3>Nilai</h3>
	<hr/>
	<?php
		$hitung = $nilai->num_rows();
		$data = $nilai->result();
		if($hitung == 0){

		}else{
	?>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Matakuliah</th>
					<th>Nama Matakuliah</th>
					<th>Semester</th>
					<th>Nilai</th>
					<th>Huruf Mutu</th>
				</tr>
			</thead>
			<tbody>
	<?php
		$no = 1;
		//$presentase_tugas = 30 / 100;
		//$presentase_uts = 30 / 100;
		//$presentase_uas = 40 / 100;
		foreach ( $data as $data) {
		//$tugas = $data->tugas * $presentase_tugas;
		//$uts = $data->uts * $presentase_uts;
		//$uas = $data->uas * $presentase_uas;
		$jumlah = $data->nilai;	
		$huruf_mutu = $this->Model->huruf_mutu($jumlah);	
	?>
				<tr>
					<td><?=$no++?>.</td>
					<td><?=$data->kode_mk?></td>
					<td><?=$data->nama_mk?></td>
					<td><?=$data->semester?></td>
					<td><?=number_format($jumlah, 2)?></td>
					<td><?=$huruf_mutu?></td>
				</tr>
	<?php
		}
	?>
			</tbody>
		</table>
	<?php
		}
	?>
</div>