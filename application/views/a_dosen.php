<div class="col-md-10 content">
	<br/>
	<button class="btn btn-success" id="view_modal_dosen"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
	<br/><br/>
	<div class="table-responsive">
	<table class="table table-striped t">
		<thead>
			<tr>
				<th>
					No.
				</th>
				<th>
					No Reg. Dosen
				</th>
				<th>
					Nama Dosen
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
					<?=$data->no_dosen?>
				</td>
				<td>
					<?=$data->nama_dosen?>
				</td>			
				<td align="center">
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="<?=$data->no_dosen?>" class="hapus_dosen" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i>
					</a> | 
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit" id="<?=$data->no_dosen?>" class="edit_dosen" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i>
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
<div id="modal_dosen" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Dosen</h4>
      </div>
      <div class="modal-body">
        
        <form id="form_dosen">
        	<div class="form-group">
	        	<label>No Reg. Dosen:</label>
	        	<input type="text" name="no_reg_dosen" id="no_reg_dosen" class="form-control" required/>
	        </div>
	        <div class="form-group">
	        	<label>Nama Dosen:</label>
	        	<input type="text" name="aksi_dosen" id="aksi_dosen" style="display:none" />
	        	<input type="text" name="id_dosen" id="id_dosen" style="display:none" />
	        	<input type="text" name="nama_dosen" id="nama_dosen" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Tempat Lahir:</label>
	        	<input type="text" name="tempat_lahir_dosen" id="tempat_lahir_dosen" class="form-control" />
	        </div>
	        <div class="form-group">
	        	<label>Tanggal Lahir:</label>
	        	<input type="date" name="tanggal_lahir_dosen" id="tanggal_lahir_dosen" class="form-control" />
	        </div>
	        <div class="form-group">
	        	<label>Nomor Hp:</label>
	        	<input type="number" name="no_hp_dosen" id="no_hp_dosen" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Jenis Kelamin:</label>
	        	<select class="form-control" name="jenis_kelamin_dosen" id="jenis_kelamin_dosen">
	        		<option>--pilih--</option>
	        		<option value="pria">pria</option>
	        		<option value="wanita">wanita</option>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Agama:</label>
	        	<select class="form-control" name="agama_dosen" id="agama_dosen">
	        		<option>--pilih--</option>
	        		<option value="islam">islam</option>
	        		<option value="kristen">kristen</option>
	        		<option value="katolik">katolik</option>
	        		<option value="kongucu">kongucu</option>
	        		<option value="hindu">hindu</option>
	        		<option value="budha">budha</option>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Alamat:</label>
	        	<textarea name="alamat_dosen" id="alamat_dosen" class="form-control" style="resize:none"></textarea>
	        </div>
	        <div class="form-group">
	        	<label>Password:</label>
	        	<input type="password" name="password_dosen" id="password_dosen" required class="form-control" />
	        </div>
	        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Submit</button>
        </form>
        <div id="notif_dosen"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Hapus -->
<div id="modal_hapus_dosen" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kelas</h4>
      </div>
      <div class="modal-body">
      	<div id="notif_hapus_dosen"></div>
      	<p>
      		Apakah anda yakin akan menghapus data ini ?
      	</p>
      	<p>
      		<button type="button" class="btn btn-danger" id="proses_hapus_dosen" >Ya</button>
      		<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      	</p>
      </div>
      <!--<div class="modal-footer">
        
      </div>-->
    </div>

  </div>
</div>