<div class="col-md-10 content">
	<br/>
	<h3>Ujian Online</h3>
	<hr/>
	<form id="form_ujian_online">
	<div class="table-responsive">
	<table class="table">
	<?php foreach($soal->result() as $row){?>
		<tr>
			<td class="col-md-1">No</td>
			<td class="col-md-1">:</td>
			<td class="col-md-10">
			<input type="hidden" name="no_soal[]" value="<?=$row->no_soal?>">
			<?=$row->no_soal?></td>
		</tr>
		<tr>
			<td class="col-md-1">Soal</td>
			<td class="col-md-1">:</td>
			<td class="col-md-10"><?=$row->isi_soal?></td>
		</tr>
		<tr>
			<td class="col-md-1">Jawaban</td>
			<td class="col-md-1">:</td>
			<td class="col-md-10">
			<select name="jawaban_user[]" id="jawaban_user" class="form-control">
				<option value="">--pilih--</option>
				<option value="a">a</option>
				<option value="b">b</option>
				<option value="c">c</option>
				<option value="d">d</option>
				<option value="e">e</option>
			</select>
			</td>
		</tr>
		<tr>
			<td class="col-md-1">&nbsp;</td>
			<td class="col-md-1"></td>
			<td class="col-md-10"></td>
		</tr>
	<?php }?>
	</table>
	</div>
	<nav class="navbar navbar-default navbar-fixed-bottom">
	  	<div class="container">
	    	<ul class="nav navbar-nav navbar-right">
	      		<li>
	      			<a href="#">
	      			<span id="timer" style="color: red"></span>
	      			<button type="submit" class="btn btn-primary" ><i class="fa fa-save" aria-hidden="true"></i> Simpan</button></a>
	      		</li>
	      <!-- <li><a href="#">Page 1</a></li>
	      <li><a href="#">Page 2</a></li>
	      <li><a href="#">Page 3</a></li> -->
	    	</ul>
	  	</div>
	</nav>
	</form>
</div>
<script type="text/javascript">
 
   $(document).ready(function() {
      /** Membuat Waktu Mulai Hitung Mundur Dengan 
       * var detik = 0,
       * var menit = 1,
       * var jam = 1
       */
       var detik = 0;
       var menit = <?=$soal->result()[0]->waktu_pengerjaan?>;
       var jam = 0;
	  
 
      /**
       * Membuat function hitung() sebagai Penghitungan Waktu
       */
       function hitung() {
          /** setTimout(hitung, 1000) digunakan untuk 
	   *  mengulang atau merefresh halaman selama 1000 (1 detik) */
	   setTimeout(hitung,1000);
 
	  /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
	   $('#timer').html( 'Sisa Waktu : ' + jam + ' Jam - ' + menit + ' Menit - ' + detik + ' Detik &nbsp; &nbsp;');
 
	  /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
	   detik --;
 
	  /** Jika var detik < 0
	   *  var detik akan dikembalikan ke 59
	   *  Menit akan Berkurang 1
	   */
	   if(detik < 0) {
	      detik = 59;
	      menit --;
 
	      /** Jika menit < 0
	       *  Maka menit akan dikembali ke 59
	       *  Jam akan Berkurang 1
	       */
	       if(menit < 0) {
 			
 		      			$.ajax({
							type:"POST",
							url:"<?=base_url()?>m_mulai_ujian/simpan_jawaban",
							data:$("#form_ujian_online").serialize(),
							success: function(data){
								alert("waktu habis !");
								clearInterval();
								window.location = "<?=base_url()?>m_mulai_ujian";
							}
						});
						
		  /** Jika var jam < 0
		   *  clearInterval() Memberhentikan Interval 
		   *  Dan Halaman akan membuka http://tahukahkau.com/
		   */
		  
	       }
	   } 		
        }
 	/** Menjalankan Function Hitung Waktu Mundur */
        hitung();
   });
// ]]></script>