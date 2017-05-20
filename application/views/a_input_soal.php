<div class="col-md-10 content">
	<br/>
    <h3>Data Soal <a href="<?=base_url()?>a_input_soal/buat_soal" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Buat Soal</a></h3>

    <hr/>
    <table class="table table-stripped t">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Soal</th>
                <th>Judul</th>
                <th>Jumlah Soal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($data_soal as $data_soal){ ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$data_soal->kode_soal?></td>
                <td><?=$data_soal->judul_soal?></td>
                <td><?=$data_soal->jumlah_soal?></td>
                <td></td>
            </tr>
            <?php $no++; }?>
        </tbody>
    </table>
</div>