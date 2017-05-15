<div class="col-md-10 content">
	<br/>
	<button class="btn btn-success" id="view_modal_mhs"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
	<br/><br/>
	<div class="table-responsive">
	<table class="table table-striped t">
		<thead>
			<tr>
				<th>
					No.
				</th>
				<th>
					NIM
				</th>
				<th>
					Nama Mahasiswa
				</th>
				<th>
					Kelas
				</th>
				<th>
					Tahun Masuk
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
					<?=$data->tahun_masuk_kuliah?>
				</td>		
				<td align="center">
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="<?=$data->npm?>" class="hapus_mhs" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i>
					</a> | 
					<a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit" id="<?=$data->npm?>" class="edit_mhs" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i>
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
<div id="modal_mhs" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mahasiswa</h4>
      </div>
      <div class="modal-body">
        
        <form id="form_mhs">
        	<div class="form-group">
	        	<label>NIM:</label>
	        	<input type="text" name="nim" id="nim" class="form-control" required/>
	        </div>
	        <div class="form-group">
	        	<label>Nama Mahasiswa:</label>
	        	<input type="text" name="aksi_mhs" id="aksi_mhs" style="display:none" />
	        	<input type="text" name="id_mhs" id="id_mhs" style="display:none" />
	        	<input type="text" name="nama_mhs" id="nama_mhs" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Tempat Lahir:</label>
	        	<input type="text" name="tempat_lahir_mhs" id="tempat_lahir_mhs" class="form-control" />
	        </div>
	        <div class="form-group">
	        	<label>Tanggal Lahir:</label>
	        	<input type="date" name="tanggal_lahir_mhs" id="tanggal_lahir_mhs" class="form-control" />
	        </div>
	        <div class="form-group">
	        	<label>Nomor Hp:</label>
	        	<input type="number" name="no_hp_mhs" id="no_hp_mhs" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Jenis Kelamin:</label>
	        	<select class="form-control" name="jenis_kelamin_mhs" id="jenis_kelamin_mhs">
	        		<option>--pilih--</option>
	        		<option value="pria">pria</option>
	        		<option value="wanita">wanita</option>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Kelas:</label>
	        	<select class="form-control" name="kelas_mhs" id="kelas_mhs">
	        		<option>--pilih--</option>
	        		<?php
	        			foreach ($kelas as $key) {
	        		?>
	        			<option value="<?=$key->id?>"><?=$key->nama_kelas?></option>
	        		<?php	
	        			}
	        		?>
	        	</select>
	        </div>
	        <div class="form-group">
	        	<label>Agama:</label>
	        	<select class="form-control" name="agama_mhs" id="agama_mhs">
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
	        	<textarea name="alamat_mhs" id="alamat_mhs" class="form-control" style="resize:none"></textarea>
	        </div>
	        <div class="form-group">
	        	<label>Asal Sekolah:</label>
	        	<input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Tahun Lulus Sekolah:</label>
	        	<input type="text" name="tahun_lulus_sekolah" id="tahun_lulus_sekolah" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Alamat Sekolah:</label>
	        	<textarea name="alamat_sekolah" id="alamat_sekolah" class="form-control" style="resize:none"></textarea>
	        </div>
	        <div class="form-group">
	        	<label>Tahun Masuk Kuliah:</label>
	        	<input type="text" name="tahun_masuk_kuliah" id="tahun_masuk_kuliah" class="form-control" required />
	        </div>
            <div class="form-group">
	        	<label>Nama Ayah Kandung:</label>
	        	<input type="text" name="nama_ayah_kandung" id="nama_ayah_kandung" class="form-control" required />
	        </div>
            <div class="form-group">
	        	<label>Nama Ibu Kandung:</label>
	        	<input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control" required />
	        </div>
	        <div class="form-group">
	        	<label>Password:</label>
	        	<input type="password" name="password_mhs" id="password_mhs" required class="form-control" />
	        </div>
	        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Submit</button>
        </form>
        <div id="notif_mhs"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Hapus -->
<div id="modal_hapus_mhs" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kelas</h4>
      </div>
      <div class="modal-body">
      	<div id="notif_hapus_mhs"></div>
      	<p>
      		Apakah anda yakin akan menghapus data ini ?
      	</p>
      	<p>
      		<button type="button" class="btn btn-danger" id="proses_hapus_mhs" >Ya</button>
      		<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      	</p>
      </div>
      <!--<div class="modal-footer">
        
      </div>-->
    </div>

  </div>
</div>