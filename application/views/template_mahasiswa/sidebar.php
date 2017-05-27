<div class="col-md-2">
	<a href="<?=base_url()?>m_home" <?php if($page=='m_home'){ ?>class="active"<?php } ?>><i class="fa fa-user" aria-hidden="true"></i> <?=$this->session->userdata('nama')?></a>

	<br/><br/>
	<b style="color:#666666">KRS</b><br/>
	<div class="dropdown">
	<a href="#" data-toggle="dropdown" <?php if($page=='m_buat_krs'){ ?>class="active"<?php } ?>><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Buat KRS <span class="caret"></span></a>
	<ul class="dropdown-menu">
	    <li><a href="<?=base_url()?>m_buat_krs/1">KRS Trimester 1</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/2">KRS Trimester 2</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/3">KRS Trimester 3</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/4">KRS Trimester 4</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/5">KRS Trimester 5</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/6">KRS Trimester 6</a></li>
	    <!--<li><a href="<?=base_url()?>m_buat_krs/7">Semester 7</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/8">Semester 8</a></li>-->
	</ul>
	</div>
	
	<a href="<?=base_url()?>m_lihat_nilai" <?php if($page=='m_lihat_nilai'){ ?>class="active"<?php } ?>><i class="fa fa-book" aria-hidden="true"></i> Nilai</a><br/>

	<br/>
	<b style="color:#666666">KHS</b><br/>
	
	<div class="dropdown">
		<a href="#" data-toggle="dropdown" ><i class="fa fa-download" aria-hidden="true"></i> Cetak KHS<span class="caret"></span></a>
		<ul class="dropdown-menu">
		    <li><a href="<?=base_url()?>m_buat_krs/cetak_khs/1" target="_blank">KHS Trimester 1</a></li>
		    <li><a href="<?=base_url()?>m_buat_krs/cetak_khs/2" target="_blank">KHS Trimester 2</a></li>
		    <li><a href="<?=base_url()?>m_buat_krs/cetak_khs/3" target="_blank">KHS Trimester 3</a></li>
		    <li><a href="<?=base_url()?>m_buat_krs/cetak_khs/4" target="_blank">KHS Trimester 4</a></li>
		    <li><a href="<?=base_url()?>m_buat_krs/cetak_khs/5" target="_blank">KHS Trimester 5</a></li>
		    <li><a href="<?=base_url()?>m_buat_krs/cetak_khs/6" target="_blank">KHS Trimester 6</a></li>
		    <!--<li><a href="<?=base_url()?>m_buat_krs/7">Semester 7</a></li>
		    <li><a href="<?=base_url()?>m_buat_krs/8">Semester 8</a></li>-->
		</ul>
	</div>

	<br/>
	<b style="color:#666666">Ujian Online</b><br/>

	<a href="<?=base_url()?>m_mulai_ujian" <?php if($page=='m_mulai_ujian' || $page == 'm_kerjakan_ujian'){ ?>class="active"<?php } ?>><i class="fa fa-book" aria-hidden="true"></i> Mulai Ujian</a><br/>
	<a href="<?=base_url()?>m_mulai_ujian/nilai_ujian_online" <?php if($page=='m_nilai_ujian_online'){ ?>class="active"<?php } ?>><i class="fa fa-wpforms" aria-hidden="true"></i> Nilai Ujian Online</a><br/>
</div>