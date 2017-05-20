<div class="col-md-10 content">
	<br/>
	<h3>Edit Soal</h3><hr/>
	<?=$this->session->flashdata('msg');?>
	<form method="POST" action="<?=base_url()?>a_input_soal/edit_soalnya">
	<table class="table table-striped">
		<tr>
			<td>Matakuliah</td>
			<td>:</td>
			<td>
				<input type="hidden" name="id_soal" value="<?=$soal->row()->id_soal?>">
				<input type="hidden" name="kode_mk" id="kode_mk" class="form-control" value="<?=$matakuliah->row()->kode_mk?>" readonly />
				<input type="text" name="matakuliah" id="matakuliah" class="form-control" value="<?=$matakuliah->row()->nama_mk?>" readonly />
			</td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td>
				<input type="text" name="judul_soal" id="judul_soal" class="form-control" value="<?=$soal->row()->judul_soal?>" readonly />
			</td>
		</tr>
		<tr>
			<td>Jumlah Soal</td>
			<td>:</td>
			<td>
				<input type="text" name="jumlah_soal" id="jumlah_soal" class="form-control" value="<?=$soal->row()->jumlah_soal?>" readonly />
			</td>
		</tr>
	</table>
	<?php foreach($isi_soal->result() as $isi){?>
	<table class="table table-striped">
		<tr>
			<td>No</td>
			<td>:</td>
			<td>
				<input type="hidden" name="id_isi_soal[]" value="<?=$isi->id_isi_soal?>" readonly>
				<input type="number" name="no_soal[]" id="no_soal" class="form-control" value="<?=$isi->no_soal?>" readonly required />
			</td>
		</tr>
		<tr>
			<td>Isi Soal</td>
			<td>:</td>
			<td>
				<textarea name="isi_soal[]" id="isi_soal" class="form-control ckeditor" required ><?=$isi->isi_soal?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Jawaban Benar</td>
			<td>:</td>
			<td>
				<select class="form-control" name="jawaban_benar[]" id="jawaban_benar" required>
					<option value="">--pilih--</option>
					<option value="a" <?=$isi->jawaban_benar == 'a' ? 'selected' : ''?>>a</option>
					<option value="b" <?=$isi->jawaban_benar == 'b' ? 'selected' : ''?>>b</option>
					<option value="c" <?=$isi->jawaban_benar == 'c' ? 'selected' : ''?>>c</option>
					<option value="d" <?=$isi->jawaban_benar == 'd' ? 'selected' : ''?>>d</option>
					<option value="e" <?=$isi->jawaban_benar == 'e' ? 'selected' : ''?>>e</option>
				</select>
			</td>
		</tr>
	</table><br/>
	<?php }?>
	<nav class="navbar navbar-default navbar-fixed-bottom">
	  <div class="container">
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="#"><button type="submit" class="btn btn-primary" ><i class="fa fa-save" aria-hidden="true"></i> Update Soal</button></a></li>
	      <!-- <li><a href="#">Page 1</a></li>
	      <li><a href="#">Page 2</a></li>
	      <li><a href="#">Page 3</a></li> -->
	    </ul>
	  </div>
	</nav>
	</form>
</div>