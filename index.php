<?php
session_start();
	include "koneksi.php";

	$id_user = 1; // ID user yang sedang login (fix untuk simulasi single user)

	$queryuser = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user='$id_user'");
	$user = mysqli_fetch_assoc($queryuser);
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
					<?php
					if($user['status'] == "1"){
						?>
						<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#formTJ">Tap Out</a>
						<?php
					} else if($user['status'] == "0"){
						?>
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTJ">Tap In</a>
						<?php
					} else {
						?>
						<a href="#" class="btn btn-secondary disabled">Sedang di bus</a>
						<?php
					}
					?>
				</div>
				<img class="card-img-bottom" src="img/transjakarta.jpg" alt="Foto bus Transjakarta">
			</div>
		</div>

		<div class="col-sm-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Trans Pakuan</h4>
					<p class="card-text">Layanan bus kota yang melayani rute di wilayah Kota Bogor</p>
					<?php
					if($user['status'] == "2"){
						?>
						<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#formTP">Keluar Bus</a>
						<?php
					} else if($user['status'] == "0"){
						?>
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTP">Masuk Bus</a>
						<?php
					} else {
						?>
						<a href="#" class="btn btn-secondary disabled">Sedang di bus</a>
						<?php
					}
					?>
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
			<form action="" method="post" enctype="multipart/form-data">
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
			</div>

			<!-- Footer -->
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			<?php
				if($user['status'] == "1"){
					?>
					<button type="submit" class="btn btn-danger" name="tap_out_tj">Tap Out</button>
					<?php
				} else if($user['status'] == "0"){
					?>
					<button type="submit" class="btn btn-success" name="tap_in_tj">Tap In</button>
					<?php
				}
			?>
			</div>
			</form>
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
			<form action="" method="post" enctype="multipart/form-data">
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
				</div>

				<!-- Footer -->
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<?php
					if($user['status'] == "2"){
						?>
						<button type="submit" class="btn btn-danger" name="tap_out_tp">Keluar Bus</button>
						<?php
					} else if($user['status'] == "0"){
						?>
						<button type="submit" class="btn btn-success" name="tap_in_tp">Masuk Bus</button>
						<?php
					}
				?>
				</div>
			</form>
		</div>
	</div>
</div>

<?php

$kartu1 = $_POST['pilih_kartu_1'] ?? '';
$kartu2 = $_POST['pilih_kartu_2'] ?? '';
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
/* =========================   TAP IN TRANS JAKARTA  ========================= */
if(isset($_POST['tap_in_tj'])){

	$q = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu1'");
	$datakartu = mysqli_fetch_assoc($q);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];

	// Minimal saldo hanya untuk validasi masuk
	if($saldo < 3500){
	echo "<script>alert('Saldo minimal tidak cukup untuk masuk halte');</script>";
	} else {
	$id_trx = uniqid("TJ-");
	mysqli_query($connect,
		"INSERT INTO tb_riwayat_trx_tj (id_trx,id_kartu,jenis_trx,saldo_awal,waktu_trx_awal)
		VALUES ('$id_trx','$kartu1','Proses','$saldo',NOW())");
	mysqli_query($connect,
		"UPDATE tb_user 
		SET status='1', id_kartu='$kartu1'
		WHERE id_user='1'");
	echo "<script>
		alert('Berhasil Tap In Trans Jakarta - $nama_kartu');
		window.location='';
	</script>";
	}
}

/* =========================   TAP IN TRANS PAKUAN  ========================= */
if(isset($_POST['tap_in_tp'])){

	$q = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu2'");
	$datakartu = mysqli_fetch_assoc($q);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];

	if($saldo < 4900){
	echo "<script>alert('Saldo tidak cukup');</script>";
	} else {
	$saldo_baru = $saldo - 4900;
	mysqli_query($connect,
		"UPDATE tb_kartu 
		SET saldo='$saldo_baru' 
		WHERE id_kartu='$kartu2'");

	/* =========================     UPDATE RIWAYAT TP   	========================= */
	$id_trx = uniqid("TP-");

	mysqli_query($connect,
		"INSERT INTO tb_riwayat_trx_tp
		(id_trx,id_kartu,saldo_awal,saldo_akhir,waktu_trx)
		VALUES
		('$id_trx','$kartu2','$saldo','$saldo_baru',NOW())");

	/* =========================     UPDATE SALDO KARTU  	========================= */
	mysqli_query($connect,
	"UPDATE tb_kartu 
		SET saldo='$saldo_baru' 
		WHERE id_kartu='$kartu2'");

	/* =========================     RIWAYAT KARTU (BANK)  	========================= */
	$bank = $datakartu['bank'];
	$id_trx_kartu = uniqid();

	if($bank=="BBRI"){
		$tabel="tb_riwayat_kartu_bri";
	} else if($bank=="BBCA"){
		$tabel="tb_riwayat_kartu_bca";
	} else if($bank=="BMRI"){
		$tabel="tb_riwayat_kartu_mri";
	} else if($bank=="BDKI"){
		$tabel="tb_riwayat_kartu_dki";
	}

	mysqli_query($connect,
	"INSERT INTO $tabel
		(id_trx,id_merchant,id_kartu,jenis_trx,
		saldo_awal,nominal_trx,saldo_akhir,waktu_trx)
		VALUES
		('$id_trx_kartu','1','$kartu2','Out',
		'$saldo','$tarif','$saldo_baru',NOW())");

	mysqli_query($connect,
		"UPDATE tb_user 
		SET status='2', id_kartu='$kartu2'
		WHERE id_user='1'");

	echo "<script>
		alert('Berhasil naik Trans Pakuan - $nama_kartu');
		window.location='';
	</script>";
	}
}


/* =========================   TAP OUT TJ   ========================= */
if(isset($_POST['tap_out_tj'])){

	$q = mysqli_query($connect,
		"SELECT * FROM tb_kartu WHERE id_kartu='$kartu1'");
	$datakartu = mysqli_fetch_assoc($q);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];

	$tarif = 3500;

	if($saldo < $tarif){

	echo "<script>alert('Saldo tidak cukup saat Tap Out');</script>";
	exit;
	}

	$saldo_baru = $saldo - $tarif;

	/* =========================     UPDATE SALDO KARTU   ========================= */
	mysqli_query($connect,
	"UPDATE tb_kartu 
		SET saldo='$saldo_baru' 
		WHERE id_kartu='$kartu1'");

	/* =========================     UPDATE RIWAYAT TJ   ========================= */
	$qtrx = mysqli_query($connect,
	"SELECT * FROM tb_riwayat_trx_tj
		WHERE id_kartu='$kartu1'
		AND jenis_trx='Proses'
		ORDER BY waktu_trx_awal DESC
		LIMIT 1");

	$trx = mysqli_fetch_assoc($qtrx);
	$id_trx = $trx['id_trx'];

	mysqli_query($connect,
	"UPDATE tb_riwayat_trx_tj
		SET
		jenis_trx='Selesai',
		saldo_akhir='$saldo_baru',
		waktu_trx_akhir=NOW()
		WHERE id_trx='$id_trx'");

	/* =========================     RIWAYAT KARTU (BANK)  ========================= */
	$bank = $datakartu['bank'];
	$id_trx_kartu = uniqid();

	if($bank=="BBRI"){
	$tabel="tb_riwayat_kartu_bri";
	} else if($bank=="BBCA"){
	$tabel="tb_riwayat_kartu_bca";
	} else if($bank=="BMRI"){
	$tabel="tb_riwayat_kartu_mri";
	} else if($bank=="BDKI"){
	$tabel="tb_riwayat_kartu_dki";
	}

	mysqli_query($connect,
	"INSERT INTO $tabel
		(id_trx,id_merchant,id_kartu,jenis_trx,
		saldo_awal,nominal_trx,saldo_akhir,waktu_trx)
		VALUES
		('$id_trx_kartu','1','$kartu1','Out',
		'$saldo','$tarif','$saldo_baru',NOW())");

	/* =========================     UPDATE STATUS USER  ========================= */
	mysqli_query($connect,
	"UPDATE tb_user
		SET status='0'
		WHERE id_user='1'");

	echo "<script>
	alert('Tap Out berhasil. Tarif: Rp $tarif');
	window.location='';
	</script>";
	}

	/* =========================   TAP OUT TP  ========================= */
	if(isset($_POST['tap_out_tp'])){

	mysqli_query($connect,
	"UPDATE tb_user 
		SET status='0' 
		WHERE id_user='1'");

	echo "<script>
	alert('Berhasil turun dari bus');
	window.location='';
	</script>";
}
?>


</body>
</html>