<div class="col-md-2">
	<a href="<?=base_url()?>m_home" <?php if($page=='a_home'){ ?>class="active"<?php } ?>><i class="fa fa-user" aria-hidden="true"></i> <?=$this->session->userdata('nama')?> </a>

	<br/><br/>
	<b style="color:#666666">MASTER</b><br/>
	<a href="<?=base_url()?>a_admin" <?php if($page=='a_admin'){ ?>class="active"<?php } ?>><i class="fa fa-pencil-square-o" aria-hidden="true"></i> User</a><br/>
	<a href="<?=base_url()?>a_kelas" <?php if($page=='a_kelas'){ ?>class="active"<?php } ?>><i class="fa fa-bank aria-hidden="true"></i> Kelas</a><br/>
	<a href="<?=base_url()?>a_dosen" <?php if($page=='a_dosen'){ ?>class="active"<?php } ?>><i class="fa fa-user-md" aria-hidden="true"></i> Dosen</a><br/>
	<a href="<?=base_url()?>a_matakuliah" <?php if($page=='a_matakuliah'){ ?>class="active"<?php } ?>><i class="fa fa-wpforms" aria-hidden="true"></i> Matakuliah</a><br/>
	<a href="<?=base_url()?>a_mahasiswa" <?php if($page=='a_mahasiswa'){ ?>class="active"<?php } ?>><i class="fa fa-graduation-cap" aria-hidden="true"></i> Mahasiswa</a><br/><br/>
    
	<b style="color:#666666">SETTING</b><br/>	
	<a href="<?=base_url()?>a_pem_akademik" <?php if($page=='a_pem_akademik'){ ?>class="active"<?php } ?>><i class="fa fa-street-view" aria-hidden="true"></i> Pembimbing Akademik</a><br/>
	<a href="<?=base_url()?>a_pem_matkul" <?php if($page=='a_pem_matkul'){ ?>class="active"<?php } ?>><i class="fa fa-pencil" aria-hidden="true"></i> Pengampu Matakuliah</a><br/>
	<a href="<?=base_url()?>a_per_matkul" <?php if($page=='a_per_matkul'){ ?>class="active"<?php } ?>><i class="fa fa-book" aria-hidden="true"></i> Peruntukan Matakuliah</a><br/>
	<a href="<?=base_url()?>a_masa_krs" <?php if($page=='a_masa_krs'){ ?>class="active"<?php } ?>><i class="fa fa-clock-o" aria-hidden="true"></i> Masa Pengisian KRS</a><br/><br/>
	

	<b style="color:#666666">BLOKIR</b><br/>
	<a href="<?=base_url()?>a_blokir" <?php if($page=='a_blokir'){ ?>class="active"<?php } ?>><i class="fa fa-lock" aria-hidden="true"></i> Daftar Blokir</a><br/><br/>
    
    <b style="color:#666666">VERIFIKASI</b><br/>
	<a href="<?=base_url()?>a_verifikasi_krs" <?php if($page=='a_verifikasi_krs'){ ?>class="active"<?php } ?>><i class="fa fa-check-circle-o" aria-hidden="true"></i> Verifikasi KRS</a><br/>
    <a href="<?=base_url()?>verifikasi_khs" <?php if($page=='a_verifikasi_khs'){ ?>class="active"<?php } ?>><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Verifikasi KHS</a><br/><br/>
    
    <b style="color:#666666">NILAI</b><br/>
	<a href="<?=base_url()?>a_input_nilai" <?php if($page=='a_input_nilai'){ ?>class="active"<?php } ?>><i class="fa fa-wpforms" aria-hidden="true"></i> Input Nilai</a><br/>
	<a href="<?=base_url()?>a_lihat_nilai" <?php if($page=='a_lihat_nilai'){ ?>class="active"<?php } ?>><i class="fa fa-eye" aria-hidden="true"></i> Lihat Nilai</a><br/><br/>

	<b style="color:#666666">UJIAN ONLINE</b><br/>
	<a href="<?=base_url()?>a_input_soal" <?php if($page=='a_input_soal' || $page=='a_buat_soal'){ ?>class="active"<?php } ?>><i class="fa fa-pencil" aria-hidden="true"></i> Buat Soal</a><br/>
    
</div>