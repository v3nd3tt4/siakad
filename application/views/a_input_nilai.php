<div class="col-md-10 content">
	<h3>Input Nilai</h3>
	<hr/>
	<div class="alert alert-danger"> <marquee><b><?=$this->session->userdata('nama')?></b>, Telitilah dalam memproses dan menginput data ! Jika terjadi error pada system hubungi 085768551713</marquee></div>
	<form id="show_list_nilai">
	<table class="table table-striped">
	    <tr>
			<td>Matakuliah</td>
			<td>:</td>
			<td>
				<select class="form-control" name="matakuliah" id="matakuliah" required>
					<option value="">--pilih--</option>
					<?php
						foreach ($matakuliah as $matakuliah) {
					?>
					<option value="<?=$matakuliah->kode_mk?>"><?=$matakuliah->kode_mk.' - '.$matakuliah->nama_mk?></option>
					<?php
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td>
				<select class="form-control" name="kelas" id="kelas" required>
					<option value="">--pilih--</option>
					<?php
						foreach ($kelas as $kelas) {
					?>
					<option value="<?=$kelas->nama_kelas?>"><?=$kelas->nama_kelas?></option>
					<?php
						}
					?>
				</select>				
			</td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td>
				<select class="form-control" name="semester" id="semester" required>
					<option value="">--pilih--</option>					
					<option value="1">Semester 1</option>
					<option value="2">Semester 2</option>
					<option value="3">Semester 3</option>
					<option value="4">Semester 4</option>
					<option value="5">Semester 5</option>
					<option value="6">Semester 6</option>
					<option value="7">Semester 7</option>
					<option value="8">Semester 8</option>
				</select>				
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i> Show</button></td>
		</tr>
		
	</table>
	</form>
	<div id="result_list_nilai"></div>
</div>
