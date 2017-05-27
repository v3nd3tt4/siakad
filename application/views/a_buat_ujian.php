<div class="col-md-10 content">
	<br/>
	<h3>Ujian Online <a href="#" class="btn btn-success pull-right tambah_buat_ujian"><i class="fa fa-plus" aria-hidden="true"></i> Buat Ujian</a></h3><hr/>
	<table class="table table-stripped t">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Status</th>
                <th>Soal</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no= 1; foreach ($data_ujian->result() as $row){ ?>
            <tr>
                <td><?=$no?>.</td>
                <td><?=$row->judul_buat_ujian?></td>
                <td><?=$row->tgl_mulai?></td>
                <td><?=$row->tgl_berakhir?></td>
                <td><?=$row->status?></td>
                <td><?=$row->judul_soal?></td>
                <td><?=$row->nama_kelas?></td>
                <td>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="<?=$row->id_buat_ujian?>" class="hapus_buat_ujian" style="color:red"><i class="fa fa-trash" aria-hidden="true"></i>
                    </a> | 
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit" id="<?=$row->id_buat_ujian?>" class="edit_buat_ujian" style="color:green"><i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="modal_buat_ujian" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ujian Online</h4>
      </div>
      <div class="modal-body">
        <div id="notif_buat_ujian"></div>
        <form id="form_buat_ujian">
            <div class="form-group">
                <label>Judul:</label>
                <input type="text" name="judul_buat_ujian" id="judul_buat_ujian" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Tanggal Mulai:</label>
                <input type="text" name="aksi_buat_ujian" id="aksi_buat_ujian" style="display:none" />
                <input type="text" name="id_buat_ujian" id="id_buat_ujian" style="display:none" />
                <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Tanggal Berakhir:</label>
                <input type="date" name="tgl_berakhir" id="tgl_berakhir" class="form-control" required/>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">--pilih--</option>
                    <option value="on">on</option>
                    <option value="off">off</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kelas:</label>
                <select name="kelas" id="kelas" class="form-control" required>
                    <option value="">--pilih--</option>
                    <?php
                        foreach ($kelas as $kelas) {
                    ?>
                    <option value="<?=$kelas->id?>"><?=$kelas->nama_kelas?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Soal:</label>
                <select name="soal" id="soal" class="form-control" required>
                    <option value="">--pilih--</option>
                    <?php
                        foreach ($soal as $soal) {
                    ?>
                    <option value="<?=$soal->id_soal?>"><?=$soal->judul_soal?></option>
                    <?php
                        }
                    ?>
                </select>
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
<div id="modal_hapus_buat_ujian" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ujian Online</h4>
      </div>
      <div class="modal-body">
        <div id="notif_hapus_buat_ujian"></div>
        <p>
            Apakah anda yakin akan menghapus data ini ?
        </p>
        <p>
            <button type="button" class="btn btn-danger" id="proses_hapus_buat_ujian" >Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </p>
      </div>
      <!--<div class="modal-footer">
        
      </div>-->
    </div>

  </div>
</div>

