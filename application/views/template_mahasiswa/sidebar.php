<div class="col-md-2">
	<a href="<?=base_url()?>m_home" <?php if($page=='m_home'){ ?>class="active"<?php } ?>><span class="glyphicon glyphicon-user"></span> <?=$this->session->userdata('nama')?></a>

	<br/><br/>
	<b style="color:#666666">KRS</b><br/>
	<div class="dropdown">
	<a href="#" data-toggle="dropdown" <?php if($page=='m_buat_krs'){ ?>class="active"<?php } ?>><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Buat KRS <span class="caret"></span></a>
	<ul class="dropdown-menu">
	    <li><a href="<?=base_url()?>m_buat_krs/1">Semester 1</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/2">Semester 2</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/3">Semester 3</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/4">Semester 4</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/5">Semester 5</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/6">Semester 6</a></li>
	    <!--<li><a href="<?=base_url()?>m_buat_krs/7">Semester 7</a></li>
	    <li><a href="<?=base_url()?>m_buat_krs/8">Semester 8</a></li>-->
	</ul>
	</div>
	
	<i class="fa fa-eye" aria-hidden="true"></i> Lihat KRS<br/>

	<br/>
	<b style="color:#666666">KHS</b><br/>
	
	<i class="fa fa-eye" aria-hidden="true"></i> Lihat KHS<br/>
</div>