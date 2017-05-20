<div class="col-md-10 content">
	<br/>
	<h3>Isi Soal</h3><hr/>
	<table class="table table-striped">
		<tr>
			<td>Matakuliah</td>
			<td>:</td>
			<td>
				<input type="hidden" name="kode_mk" id="kode_mk" class="form-control" value="<?=$matakuliah->row()->kode_mk?>" readonly />
				<input type="text" name="matakuliah" id="matakuliah" class="form-control" value="<?=$matakuliah->row()->nama_mk?>" readonly />
			</td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td>
				<input type="text" name="judul_soal" id="judul_soal" class="form-control" value="<?=$this->input->post('judul_soal', true)?>" readonly />
			</td>
		</tr>
		<tr>
			<td>Jumlah Soal</td>
			<td>:</td>
			<td>
				<input type="text" name="jumlah_soal" id="jumlah_soal" class="form-control" value="<?=$this->input->post('jumlah_soal', true)?>" readonly />
			</td>
		</tr>
		<tr>
			<td>Waktu</td>
			<td>:</td>
			<td>
				<input type="text" name="jumlah_soal" id="jumlah_soal" class="form-control" value="<?=$this->input->post('waktu', true)?>" readonly />
			</td>
		</tr>
	</table>
	<?php for($i=1; $i<=$this->input->post('jumlah_soal', true);$i++){?>
	<table class="table table-striped">
		<tr>
			<td>No</td>
			<td>:</td>
			<td>
				<input type="number" name="no_soal" id="no_soal" class="form-control" value="<?=$i?>" readonly />
			</td>
		</tr>
		<tr>
			<td>Isi Soal</td>
			<td>:</td>
			<td>
				<textarea name="isi_soal" id="isi_soal" class="form-control ckeditor" ></textarea>
			</td>
		</tr>
		<tr>
			<td>Jawaban Benar</td>
			<td>:</td>
			<td>
				<select class="form-control" name="jawaban_benar" id="jawaban_benar">
					<option value="">--pilih--</option>
					<option value="a">a</option>
					<option value="b">b</option>
					<option value="c">c</option>
					<option value="d">d</option>
					<option value="e">e</option>
				</select>
			</td>
		</tr>
	</table><br/>
	<?php }?>
</div>