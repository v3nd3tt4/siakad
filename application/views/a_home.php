<div class="col-md-10 content">
	<h3>Biodata Diri</h3>
	<hr/>
	<div class="alert alert-danger"> <marquee><b><?=$this->session->userdata('nama')?></b>, Telitilah dalam memproses dan menginput data ! Jika terjadi error pada system hubungi 085768551713</marquee></div>
	<table class="table table-striped">
	    <tr>
			<td>Username</td>
			<td>:</td>
			<td><?=$this->session->userdata('username')?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?=$this->session->userdata('nama')?></td>
		</tr>
		<tr>
			<td>Level</td>
			<td>:</td>
			<td><?=$this->session->userdata('level')?></td>
		</tr>
		
	</table>
	
</div>