<div class="col-md-10 content">
<h3>KRS Trimester <?=$semester?></h3>
<hr/>
<!-- Trigger the modal with a button -->
<p>
	Untuk menambahkan matakuliah klik tombol <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_buat_krs"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
</p>

<div id="notif_hapus_krs"></div>
<input type="text" name="semester" value="<?=$semester?>" id="semester" style="display:none"/>

<?php
$hitung = $krs->num_rows();
if($hitung == 0){

}else{
?>
<a href="<?=base_url()?>m_buat_krs/cetak_krs/<?=$semester?>" target="_blank" class="btn btn-danger pull-right cetak_krs"><i class="fa fa-print" aria-hidden="true"></i> Cetak KRS</a><br/><br/>
<table class="table table-striped">
	<tr>
		<th>No.</th><th>Kode Matakuliah</th><th>Nama Matakuliah</th><th>SKS</th><th>Batal</th>
	</tr>

<?php
	$no=1;
	foreach($krs->result() as $data2){
?>
	<tr>
		<td><?=$no++?>.</td>
		<td><?=$data2->kode_mk?></td>
		<td><?=$data2->nama_mk?></td>
		<td><?=$data2->sks?></td>
		<td><a href="#" style="color:red" class="hapus_krs" id="<?=$data2->krsid?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
	</tr>
<?php

	}
?>
	<tr>
		<td align="right" colspan="3"><b>Total SKS</b> : </td>
		<td><?=$sks->jumlah_sks?></td>
		<td></td>
	</tr>
</table>
<hr/>
<?php
}
?>


</div>

<!-- Modal -->
<div id="modal_buat_krs" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Matakuliah</h4>
      </div>
      <div class="modal-body">
      	<div id="notif_ambil"></div>
        <table class="table table-striped t">
		<thead>
			<tr>
				<th>
					No.
				</th>
				<th>
					Kode Matakuliah
				</th>
				<th>
					Nama Matakuliah
				</th>
				</th>
				<th>
					SKS
				</th>
				<th>
					Semester
				</th>
				<th>
					Ambil
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
			foreach($isi as $data){
			?>
			<tr>
				<td>
				<?=$no++?>.
				</td>
				<td>
					<?=$data->kode_mk?>
				</td>
				<td>
					<?=$data->nama_mk?>
				</td>
				<td>
					<?=$data->sks?>
				</td>
				<td>
					<?=$data->semesternya?>
				</td>
				<td>					
					<button type="button" class="btn btn-primary btn-xs ambil_matkul" id="<?=$data->kode_mk?>" semester="<?=$semester?>"><i class="fa fa-arrow-down" aria-hidden="true"></i> &nbsp;Ambil</button>
				</td>

			</tr>
			<?php
			}
			?>
		</tbody>
</table><br/><br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>