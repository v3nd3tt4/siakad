<div class="col-md-10 content">
	<br/>
	<button class="btn btn-success" id="view_modal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
	<br/><br/>
	<div class="table-responsive">
	<table class="table table-striped t">
		<thead>
			<tr>
				<th>
					No.
				</th>
				<th>
					Username
				</th>
				<th>
					Nama
				</th>
				<th>
					Level
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
					<?=$data->username?>
				</td>
				<td>
					<?=$data->nama?>
				</td>
				<td>
					<?=$data->level?>
				</td>
				<td align="center">
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="<?=$data->id?>" class="hapus_admin" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i>
					</a> | 
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit" id="<?=$data->username?>" class="edit_admin" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i>
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
<div id="modal_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin</h4>
      </div>
      <div class="modal-body">
        <div id="notif_admin"></div>
        <form id="form_admin">
        	<div class="form-group">
	        	<label>Username:</label>
	        	<input type="text" name="username" id="username" class="form-control" required/>
	        </div>
	        <div class="form-group">
	        	<label>Nama:</label>
	        	<input type="text" name="aksi_admin" id="aksi_admin" style="display:none" />
	        	<input type="text" name="nama" id="nama" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Password:</label>
	        	<input type="password" name="password" id="password" class="form-control" required/>
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
<div id="modal_hapus_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin</h4>
      </div>
      <div class="modal-body">
      	<div id="notif_hapus_admin"></div>
      	<p>
      		Apakah anda yakin akan menghapus data ini ?
      	</p>
      	<p>
      		<button type="button" class="btn btn-danger" id="proses_hapus_admin" >Ya</button>
      		<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      	</p>
      </div>
      <!--<div class="modal-footer">
        
      </div>-->
    </div>

  </div>
</div>