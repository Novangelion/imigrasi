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
		<h1><center>Edit Data Paspor</center></h1>
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
		<div class="container">
		<?php foreach($paspor as $t){ ?>
		<form action="<?php echo base_url('index.php/Imigrasi/update/');?><?php echo $t->no_paspor?>" method="post">
		<div class="form-group">
			<label><b>Nomor KTP :<b></label>
				<input type="text" class="form-control" name="no_ktp" value="<?php echo $t->no_ktp ?>"><br>
			<label><b>Nama :<b></label>
				<input type="text" class="form-control" name="nama" value="<?php echo $t->nama ?>"><br>
			<label><b>Tempat Lahir :<b></label>
				<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $t->tempat_lahir ?>"><br>
			<label><b>Tanggal Lahir :<b></label>
				<input type="date" class="form-control" name="tgl_lahir" value="<?php echo $t->tgl_lahir ?>"><br>
			<label><b>Alamat :<b></label>
				<input type="text" class="form-control" name="alamat" value="<?php echo $t->alamat ?>"><br>
			<label><b>Kebangsaan :<b></label>
				<input type="text" class="form-control" name="kebangsaan" value="<?php echo $t->kebangsaan ?>"><br>
			<label><b>Tanggal Keluar :<b></label>
				<input type="date" class="form-control" name="tgl_keluar" value="<?php echo $t->tgl_keluar ?>"><br>
			<label><b>Berlaku Sampai :<b></label>
				<input type="date" class="form-control" name="tgl_berlaku" value="<?php echo $t->tgl_berlaku ?>"><br>
			<center><input type="submit" class="w3-btn w3-teal" name="perbarui" value="Perbarui"></center>
		</div>
		</form>
		
		</div>
		<?php } ?>
	</div>