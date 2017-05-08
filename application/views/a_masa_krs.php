
<div class="col-md-10 content">
	<br/>
	<button class="btn btn-success" id="view_modal_masa_krs"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
	<hr/>
	<br/>
	<div class="table-responsive">
	<table class="table table-striped t">
		<thead>
			<tr>
				<th>
					No.
				</th>
				<th>
					Kelas
				</th>
				<th>
					Angkatan
				</th>
				</th>
				<th>
					Semester
				</th>
				<th>
					Status
				</th>
				
				<th>
					
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$no = 1;
			foreach($isi as $data){
		?>
			<tr>
				<td>
					<?=$no++?>.
				</td>
				<td>
					<?=$data->nama_kelas?>
				</td>
				<td>
					<?=$data->angkatan?>
				</td>
				<td>
					<?=$data->semester?>
				</td>
				<td>
					<?=$data->status?>
				</td>		
				<td align="center">
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="<?=$data->id_mas_krs?>" class="hapus_masa_krs" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i>
					</a> | 
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit" id="<?=$data->id_mas_krs?>" class="edit_masa_krs" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i>
					</a> <!--| 
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Lihat" id="<?=$data->id?>" class="lihat_admin" style="color:brown"><i class="fa fa-eye" aria-hidden="true"></i>
					</a>-->
				</td>
			</tr>
		<?php
			}
		?>
			
		</tbody>
	</table>
</div>
	<br/>
</div>

<!-- Modal -->
<div id="modal_masa_krs" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masa Pengisian KRS</h4>
      </div>
      <div class="modal-body">
        <div id="notif_masa_krs"></div>
        <form id="form_masa_krs">
		  <div class="form-group">
		    <!--<label for="email">Matakuliah:</label><br/>
		    <select class="form-control" id="matkul" name="matkul">
		    	<option>--pilih--</option>
		    	<?php
		    	foreach ($matakuliah as $matakuliah) {
		    	?>
		    	<option value="<?=$matakuliah->kode_mk?>"><?=$matakuliah->nama_mk?></option>
		    	<?
		    	}
		    	?>
		    </select>-->
		    
		    <input type="text" name="aksi_masa_krs" id="aksi_masa_krs" style="display:none" />
	        <input type="text" name="id_masa_krs" id="id_masa_krs" style="display:none" />
		  </div>
		  <div class="form-group">
		    <label for="pwd">Kelas:</label><br/>
		    <select class="form-control" id="kelas" name="kelas">
		    	<option>--pilih--</option>
		    	<?php
		    	foreach ($kelas as $kelas) {
		    	?><option value="<?=$kelas->id?>" ><?=$kelas->nama_kelas?></option>
		    	<?php
		    	}
		    	?>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Angkatan:</label><br/>
		    <select class="form-control" id="angkatan" name="angkatan">
		    	<option>--pilih--</option>
		    	<?php
		    	foreach ($angkatan as $angkatan) {
		    	?><option value="<?=$angkatan->tahun_masuk_kuliah?>" ><?=$angkatan->tahun_masuk_kuliah?></option>
		    	<?php
		    	}
		    	?>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Semester:</label><br/>
		    <select class="form-control" id="semester" name="semester">
		    	<option>--pilih--</option>
		    	<?php
		    	for($i=1;$i<=10;$i++) {
		    	?>
		    	<option value="<?=$i?>" >Semester <?=$i?></option>
		    	<?php
		    	}
		    	?>
		    </select>
		  </div>
		  <div class="form-group">
		  	<label for="pwd">Status:</label><br/>
		    <select class="form-control" id="status" name="status">
		    	<option>--pilih--</option>
		    	<option value="no" >no </option>
		    	<option value="open" >open </option>
		    	<option value="close" >close </option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label style="color:#fff" for="pwd">Password:</label><br/>
		  	<button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Submit</button>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Hapus -->
<div id="modal_hapus_masa_krs" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Peruntukan Matakuliah</h4>
      </div>
      <div class="modal-body">
      	<div id="notif_hapus_masa_krs"></div>
      	<p>
      		Apakah anda yakin akan menghapus data ini ?
      	</p>
      	<p>
      		<button type="button" class="btn btn-danger" id="proses_hapus_masa_krs" >Ya</button>
      		<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      	</p>
      </div>
      <!--<div class="modal-footer">
        
      </div>-->
    </div>

  </div>
</div>