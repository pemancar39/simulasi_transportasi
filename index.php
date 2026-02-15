<?php
session_start();
	include "koneksi.php";

	$id_user = 1; // ID user yang sedang login (fix untuk simulasi single user)

	$query = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user='$id_user'");
	$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <title>Simulasi Transportasi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Simulasi Transportasi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Riwayat</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Transaksi Kartu</a></li>
            <li><a class="dropdown-item" href="#">Transaksi Trans Pakuan</a></li>
			<li><a class="dropdown-item" href="#">Transaksi Trans Jakarta</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Kartu Transportasi</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Daftar Kartu</a></li>
            <li><a class="dropdown-item" href="#">Top Up Kartu</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:80px">
	<h1>Hi, Teddy!</h1>
	<h2>Pilih transportasi umum <small>yang sedang Anda naiki</small></h2>
</div>

<div class="container mt-3">
	<div class="row">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Trans Jakarta</h4>
					<p class="card-text">Bus Rapit Transit yang melayani rute di wilayah Jakarta dan sekitarnya</p>
					<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTJ">Tap In</a>
				</div>
				<img class="card-img-bottom" src="img/transjakarta.jpg" alt="Foto bus Transjakarta">
			</div>
		</div>

		<div class="col-sm-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Trans Pakuan</h4>
					<p class="card-text">Layanan bus kota yang melayani rute di wilayah Kota Bogor</p>
					<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTP">Masuk Bus</a>
				</div>
				<img class="card-img-bottom" src="img/transpakuan.jpg" alt="Foto bus Trans Pakuan">
			</div>
		</div>

		<div class="col-sm-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">KRL Commuter Line</h4>
					<p class="card-text">Layanan kereta api komuter yang melayani rute di wilayah Jabodetabek (fitur ini segera hadir)</p>
					<a href="#" class="btn btn-primary disabled">Masuk Stasiun</a>
				</div>
				<img class="card-img-bottom" src="img/commuter_line.jpg" alt="Foto KRL Commuter Line">
			</div>
		</div>
	</div>
</div>

<!-- Modal Trans Jakarta-->
<div class="modal fade" id="formTJ" tabindex="-1" aria-labelledby="formTJLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Header -->
			<div class="modal-header">
			<h5 class="modal-title" id="formTJLabel">Masuk Halte</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Body / Form -->
			<div class="modal-body">
			<form action="">
				<label for="sel1" class="form-label">Pilih kartu:</label>	
				<select class="form-select" id="kartu1" name="pilih_kartu_1">
					<option value="">--Pilih kartu--</option>
					<?php 
					$sqlkartu = mysqli_query($connect, "SELECT * FROM tb_kartu") or die(mysqli_error($connect));
					while ($data = mysqli_fetch_array($sqlkartu)):;
					?>
						<option value="<?php echo $data['id_kartu'];?>"><?php echo $data['nama_kartu'];?></option>
					<?php 
						endwhile;
					?>
				</select>
				<br>
			</form>
			</div>

			<!-- Footer -->
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-success">Tap In</button>
			</div>

		</div>
	</div>
</div>

<!-- Modal Trans Pakuan-->
<div class="modal fade" id="formTP" tabindex="-1" aria-labelledby="formTPLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Header -->
			<div class="modal-header">
			<h5 class="modal-title" id="formTPLabel">Masuk Bus</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Body / Form -->
			<div class="modal-body">
			<form action="">
				<label for="sel2" class="form-label">Pilih kartu:</label>
				<select class="form-select" id="kartu2" name="pilih_kartu_2">
					<option value="">--Pilih kartu--</option>
					<?php 
					$sqlkartu = mysqli_query($connect, "SELECT * FROM tb_kartu") or die(mysqli_error($connect));
					while ($data = mysqli_fetch_array($sqlkartu)):;
					?>
						<option value="<?php echo $data['id_kartu'];?>"><?php echo $data['nama_kartu'];?></option>
					<?php 
						endwhile;
					?>
				</select>
				<br>
			</form>
			</div>

			<!-- Footer -->
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-success">Tap In</button>
			</div>

		</div>
	</div>
</div>

</body>
</html>