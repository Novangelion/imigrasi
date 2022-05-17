<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/bootstrap.css" type="text/css" >
	<link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css" >
	<link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/w3.css" type="text/css" >
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.js">
	</script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.js">
	</script>
</head>
<body>
	<div class="w3-container">
	<div class="jumbotron w3-teal">
		<h1><center>Data Paspor Online</center></h1>
		<!--<nav class="navbar navbar-default navbar-fixed-top">
		<ul class="nav navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="#">c</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">c</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"></a>
			</li>
	</nav>-->
	</div>
	
	
	<!--<div class="w3-bar w3-black">
			<a href="#" class="w3-bar-item w3-button">adasdasd</a>
			<a href="#" class="w3-bar-item w3-button">adasdasd</a>
			<a href="#" class="w3-bar-item w3-button">adasdasd</a>
	</div>-->
		<table class="table w3-border w3-bordered w3-striped w3-centered">
			<tr class="w3-teal">
				<th>No. Paspor</th>
				<th>No. KTP</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Alamat</th>
				<th>Kebangsaan</th>
				<th>Tgl Keluar Paspor</th>
				<th>Berlaku Sampai</th>
			</tr>
		<?php 
		foreach($paspor as $u){ 
		?>
		<tr style="color:black;">
			<td><?php echo $u->no_paspor ?></td>
			<td><?php echo $u->no_ktp ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->tempat_lahir ?></td>
			<td><?php echo $u->tgl_lahir ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->kebangsaan ?></td>
			<td><?php echo $u->tgl_keluar ?></td>
			<td><?php echo $u->tgl_berlaku ?></td>
			
			
		</tr>
		<tr>
			<td colspan="9"><a href='<?php echo site_url('Imigrasi/edit/'.$u->no_paspor); ?>' class="w3-btn w3-blue">Edit</a>
			<a href='<?php echo site_url('Imigrasi/hapus/'.$u->no_paspor); ?>' class="w3-btn w3-red">Hapus</a></td>
		</tr>
		<?php } ?>
		</table>
		<center><ul class="pagination">
            <?php echo $halaman; ?>
        </ul></center>
		
		<center><a href='<?php echo site_url('Imigrasi/tambah_paspor'); ?>' class="w3-btn w3-teal">Tambah Paspor</a>
		<a href='<?php echo site_url('Imigrasi/doprint'); ?>' class="w3-btn w3-teal">Cetak Data Paspor</a></center>
	</div>