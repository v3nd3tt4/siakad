<div class="col-md-10 content">
	<br/>
	<button class="btn btn-success" id="view_modal_matakuliah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
	<br/><br/>
	<div class="table-responsive">
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
				<th>
					SKS
				</th>
				<th>
					keterangan
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
					<?=$data->kode_mk?>
				</td>
				<td>
					<?=$data->nama_mk?>
				</td>		
				<td>
					<?=$data->sks?>
				</td>	
				<td>
					<?=$data->keterangan?>
				</td>		
				<td align="center">
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="<?=$data->id?>" class="hapus_mk" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i>
					</a> | 
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit" id="<?=$data->id?>" class="edit_mk" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i>
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
<div id="modal_matakuliah" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Matakuliah</h4>
      </div>
      <div class="modal-body">
        <div id="notif_matakuliah"></div>
        <form id="form_matakuliah">
        	<div class="form-group">
	        	<label>Kode Matakuliah:</label>
	        	<input type="text" name="kode_mk" id="kode_mk" class="form-control" required/>
	        </div>
	        <div class="form-group">
	        	<label>Nama Matakuliah:</label>
	        	<input type="text" name="aksi_mk" id="aksi_mk" style="display:none" />
	        	<input type="text" name="id_mk" id="id_mk" style="display:none" />
	        	<input type="text" name="nama_mk" id="nama_mk" class="form-control" required/>
	        </div>
	        <div class="form-group">
	        	<label>Jumlah SKS:</label>
	        	<input type="number" name="sks" id="sks" class="form-control" required/>
	        </div>
	        <div class="form-group">
	        	<label>Keterangan:</label>
	        	<textarea name="ket_mk" id="ket_mk" class="form-control" style="resize:none"></textarea>
	        </div>
	        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Hapus -->
<div id="modal_hapus_mk" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Matakuliah</h4>
      </div>
      <div class="modal-body">
      	<div id="notif_hapus_mk"></div>
      	<p>
      		Apakah anda yakin akan menghapus data ini ?
      	</p>
      	<p>
      		<button type="button" class="btn btn-danger" id="proses_hapus_mk" >Ya</button>
      		<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      	</p>
      </div>
      <!--<div class="modal-footer">
        
      </div>-->
    </div>

  </div>
</div>