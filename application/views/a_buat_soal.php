<div class="col-md-10 content">
	<br/>
	<h3>Buat Soal</h3><hr/>
	<form action="<?=base_url()?>a_input_soal/lanjutkan_soal" method="POST">
		<table class="table table-striped">
			<tr>
				<td>Matakuliah</td>
				<td>:</td>
				<td>
					<select name="matakuliah" id="matakuliah" class="form-control">
						<option value="">--pilih--</option>
						<?php foreach($matakuliah as $matakuliah){?>
						<option value="<?=$matakuliah->kode_mk?>"><?=$matakuliah->kode_mk?> - <?=$matakuliah->nama_mk?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Judul</td>
				<td>:</td>
				<td>
					<input type="text" name="judul_soal" id="judul_soal" class="form-control" />
				</td>
			</tr>
			<tr>
				<td>Jumlah Soal</td>
				<td>:</td>
				<td>
					<input type="number" name="jumlah_soal" id="jumlah_soal" class="form-control" />
				</td>
			</tr>
			<tr>
				<td>Waktu</td>
				<td>:</td>
				<td>
					<input type="number" name="waktu" id="waktu" class="form-control" placeholder="waktu dalam menit" />
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<button type="submit" class="btn btn-primary" >Lanjutkan</button>
				</td>
			</tr>
		</table>
	</form>
</div>