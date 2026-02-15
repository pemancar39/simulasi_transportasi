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
			</form>
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
				if($user['status'] == "1"){
					?>
					<button type="submit" class="btn btn-danger" name="tap_out_tp">Tap Out</button>
					<?php
				} else if($user['status'] == "0"){
					?>
					<button type="submit" class="btn btn-success" name="tap_in_tp">Tap In</button>
					<?php
				}
			?>
			</form>
			</div>

		</div>
	</div>
</div>

<?php
	//variabel untuk form transaksi kartu
	$kartu1 = @$_POST['pilih_kartu_1'];
	$kartu2 = @$_POST['pilih_kartu_2'];
	
	$tap_in_tj = @$_POST['tap_in_tj'];
	$tap_in_tp = @$_POST['tap_in_tp'];

	$tap_out_tj = @$_POST['tap_out_tj'];
	$tap_out_tp = @$_POST['tap_out_tp'];
	
	if($tap_in_tj){
		$querykartu = mysqli_query($connect, "SELECT * FROM tb_kartu WHERE id_kartu='$kartu1'") or die(mysqli_error($connect));
		$datakartu = mysqli_fetch_assoc($querykartu);

		// Proses tap in Trans Jakarta
		$saldo = $datakartu['saldo'];
		if($saldo < 3500){
			echo "<script>alert('Saldo tidak cukup untuk masuk ke halte	Trans Jakarta. Silakan top up kartu Anda.');</script>";
			exit;
		} else {
			// Simpan riwayat transaksi Trans Jakarta
			$id_trx = uniqid("TJ-");
			mysqli_query($connect, "INSERT INTO tb_riwayat_trx_tj (id_trx, id_kartu, jenis_trx, saldo_awal, waktu_trx_awal) VALUES ('$id_trx', '$kartu1', 'Proses', '$saldo', NOW())");

			mysqli_query($connect, "UPDATE tb_user SET status='1'");
			echo "<script>alert('Berhasil masuk ke halte Trans Jakarta dengan kartu $datakartu[nama_kartu]');
			window.location='index.php';</script>";
		}
	}

	if($tap_in_tp){
		$querykartu = mysqli_query($connect, "SELECT * FROM tb_kartu WHERE id_kartu='$kartu2'") or die(mysqli_error($connect));
		$datakartu = mysqli_fetch_assoc($querykartu);
		// Proses tap in Trans Pakuan
		$saldo = $datakartu['saldo'];

		if($saldo < 4900){
			echo "<script>alert('Saldo tidak cukup untuk masuk ke bus Trans Pakuan. Silakan top up kartu Anda.');</script>";
			exit;
		} else {
			$saldo_baru = $saldo - 4900; // Tarif
			mysqli_query($connect, "UPDATE tb_kartu SET saldo='$saldo_baru' WHERE id_kartu='$kartu2'");

			// Simpan riwayat transaksi Trans Pakuan
			$id_trx = uniqid("TP-");
			mysqli_query($connect, "INSERT INTO tb_riwayat_trx_tp (id_trx, id_kartu, jenis_trx, saldo_awal, waktu_trx_awal) VALUES ('$id_trx', '$kartu2', 'Proses', '$saldo', NOW())");

			// Simpan riwayat transaksi kartu berdasarkan jenis bank
			$bank = $datakartu['bank'];
			if($bank == "BBRI"){
				$id_trx_kartu = uniqid();
				mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_bri (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '2', '$kartu2', 'Out', '$saldo', 4900, '$saldo_baru', NOW())");
			} else if($bank == "BBCA"){
				$id_trx_kartu = uniqid();
				mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_bca (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '2', '$kartu2', 'Out', '$saldo', 4900, '$saldo_baru', NOW())");
			} else if($bank == "BMRI"){
				$id_trx_kartu = uniqid();
				mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_mri (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '2', '$kartu2', 'Out', '$saldo', 4900, '$saldo_baru', NOW())");
			} else if($bank == "BDKI"){
				$id_trx_kartu = uniqid();
				mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_dki (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '2', '$kartu2', 'Out', '$saldo', 4900, '$saldo_baru', NOW())");
			}

			mysqli_query($connect, "UPDATE tb_user SET status='2'");
			echo "<script>alert('Berhasil masuk ke bus Trans Pakuan dengan kartu $datakartu[nama_kartu]. Saldo tersisa: Rp $saldo_baru');
			window.location='index.php';</script>";
		}
	}

	if($tap_out_tj){
		$querykartu = mysqli_query($connect, "SELECT * FROM tb_kartu WHERE id_kartu='$kartu1'") or die(mysqli_error($connect));
		$datakartu = mysqli_fetch_assoc($querykartu);

		// Proses tap in Trans Jakarta
		$saldo = $datakartu['saldo'];
		$saldo_baru = $saldo - 3500; // Tarif
		mysqli_query($connect, "UPDATE tb_kartu SET saldo='$saldo_baru' WHERE id_kartu='$kartu1'");

		// Simpan riwayat transaksi Trans Jakarta
		$querytrx = mysqli_query($connect, "SELECT * FROM tb_riwayat_trx_tj WHERE id_kartu='$kartu1' AND jenis_trx='Proses'") or die(mysqli_error($connect));
		$data_trx = mysqli_fetch_assoc($querytrx);
		$id_trx = $data_trx['id_trx_tj'];
		mysqli_query($connect, "UPDATE tb_riwayat_trx_tj SET jenis_trx='Selesai', waktu_trx_akhir=NOW() WHERE id_trx_tj='$id_trx'");

		// Simpan riwayat transaksi kartu berdasarkan jenis bank
		$bank = $datakartu['bank'];
		if($bank == "BBRI"){
			$id_trx_kartu = uniqid();
			mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_bri (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '1', '$kartu1', 'Out', '$saldo', 3500, '$saldo_baru', NOW())");
		} else if($bank == "BBCA"){
			$id_trx_kartu = uniqid();
			mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_bca (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '1', '$kartu1', 'Out', '$saldo', 3500, '$saldo_baru', NOW())");
		} else if($bank == "BMRI"){
			$id_trx_kartu = uniqid();
			mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_mri (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '1', '$kartu1', 'Out', '$saldo', 3500, '$saldo_baru', NOW())");
		} else if($bank == "BDKI"){
			$id_trx_kartu = uniqid();
			mysqli_query($connect, "INSERT INTO tb_riwayat_kartu_dki (id_trx, id_merchant, id_kartu, jenis_trx, saldo_awal, nominal_trx, saldo_akhir, waktu_trx) VALUES ('$id_trx_kartu', '1', '$kartu1', 'Out', '$saldo', 3500, '$saldo_baru', NOW())");
		}
		
		mysqli_query($connect, "UPDATE tb_user SET status='0'");
		echo "<script>alert('Berhasil keluar dari halte Trans Jakarta dengan kartu $datakartu[nama_kartu]. Saldo tersisa: Rp $saldo_baru');
		window.location='index.php';</script>";
	}

	if($tap_out_tp){
		mysqli_query($connect, "UPDATE tb_user SET status='0'");
		echo "<script>alert('Berhasil keluar dari bus Trans Pakuan');
		window.location='index.php';</script>";
	}

?>

</body>
</html>