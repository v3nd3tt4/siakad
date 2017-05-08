<div class="col-md-10 content">
	<br/>
	<button class="btn btn-success" id="view_modal_blokir"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
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
					NPM
				</th>
				<th>
					Nama
				</th>
				</th>
				<th>
					Kelas
				</th>
				<th>
					Status
				</th>
				<th>
					Keterangan
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
					<?=$data->npm?>
				</td>
				<td>
					<?=$data->nama_mhs?>
				</td>
				<td>
					<?=$data->nama_kelas?>
				</td>
				<td>
					<b style="color:red"><?=strtoupper($data->status)?></b>
				</td>	
				<td>
					<?=$data->ket?>
				</td>			
				<td align="center">
					<!--<a href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="" class="hapus_per_matkul" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i>
					</a> |-->
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit" id="<?=$data->id_blokir?>" class="edit_blokir" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i>
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
<div id="modal_blokir" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Blokir</h4>
      </div>
      <div class="modal-body">
        <div id="notif_blokir"></div>
        <form id="form_blokir">
		  <div class="form-group">
		  	<label>NPM:</label>
		  	<input type="text" name="npm" id="npm" class="form-control" required />
		  	<input type="text" id="id_blokir" name="id_blokir" style="display:none" />
		  	<input type="text" id="aksi_blokir" name="aksi_blokir" style="display:none" />
		  </div>
		  <div class="form-group">
		  	<label>Keterangan:</label>
		  	<textarea name="keterangan" id="keterangan" class="form-control" required style="resize:none"></textarea>
		  </div>
		  <div class="form-group">
		  	<label>Status:</label>
		  	<select name="status" id="status" class="form-control">
		  		<option>--pilih--</option>
		  		<option value="blocked">blocked</option>
		  		<option value="unblocked">unblocked</option>
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
<div id="modal_hapus_per_matkul" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Peruntukan Matakuliah</h4>
      </div>
      <div class="modal-body">
      	<div id="notif_hapus_per_matkul"></div>
      	<p>
      		Apakah anda yakin akan menghapus data ini ?
      	</p>
      	<p>
      		<button type="button" class="btn btn-danger" id="proses_hapus_per_matkul" >Ya</button>
      		<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      	</p>
      </div>
      <!--<div class="modal-footer">
        
      </div>-->
    </div>

  </div>
</div>