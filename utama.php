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
						<a href="#" class="btn btn-secondary disabled">Tidak bisa naik</a>
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
						<a href="#" class="btn btn-secondary disabled">Tidak bisa naik</a>
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
					<p class="card-text">Layanan kereta api komuter yang melayani rute di wilayah Jabodetabek.</p>
					<?php
					if($user['status'] == "3"){
						?>
						<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#formKRL">Keluar Stasiun</a>
						<?php
					} else if($user['status'] == "0"){
						?>
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formKRL">Masuk Stasiun</a>
						<?php
					} else {
						?>
						<a href="#" class="btn btn-secondary disabled">Tidak bisa naik</a>
						<?php
					}
					?>
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

<!-- Modal Commuter Line-->
<div class="modal fade" id="formKRL" tabindex="-1" aria-labelledby="formKRLLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Header -->
			<div class="modal-header">
			<h5 class="modal-title" id="formKRLLabel">Masuk Stasiun</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Body / Form -->
			<div class="modal-body">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="sel1" class="form-label">Pilih kartu:</label>	
				<select class="form-select" id="kartu3" name="pilih_kartu_3">
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
				<?php
				if($user['status'] == "3"){
					?>
					<label for="sel2" class="form-label">Stasiun tujuan:</label>	
					<select name="stasiun_tujuan" class="form-select">
						<option value="">-- Pilih Stasiun --</option>
						<?php
							$q = mysqli_query($connect,"SELECT MIN(id_stasiun) id, nama_stasiun FROM tb_stasiun GROUP BY nama_stasiun ORDER BY id_stasiun") or die(mysqli_error($connect));
							while($d = mysqli_fetch_assoc($q)){?>
								<option value="<?= $d['id']; ?>"><?= $d['nama_stasiun']; ?></option>
						<?php } ?>
					</select>
				<?php } else { ?>
					<label for="sel2" class="form-label">Stasiun awal:</label>	
					<select name="stasiun_asal" class="form-select">
						<option value="">-- Pilih Stasiun --</option>
						<?php
							$q = mysqli_query($connect,"SELECT MIN(id_stasiun) id, nama_stasiun FROM tb_stasiun GROUP BY nama_stasiun ORDER BY id_stasiun") or die(mysqli_error($connect));
							while($d = mysqli_fetch_assoc($q)){
							?>
							<option value="<?= $d['id']; ?>"><?= $d['nama_stasiun']; ?></option>
						<?php } ?>
					</select>
				<?php } ?>
				<br>
			</div>

			<!-- Footer -->
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			<?php
				if($user['status'] == "3"){
					?>
					<button type="submit" class="btn btn-danger" name="tap_out_krl">Tap Out</button>
					<?php
				} else if($user['status'] == "0"){
					?>
					<button type="submit" class="btn btn-success" name="tap_in_krl">Tap In</button>
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
$kartu3 = $_POST['pilih_kartu_3'] ?? '';
$stasiun1 = $_POST['stasiun_asal'] ?? '';
$stasiun2 = $_POST['stasiun_tujuan'] ?? '';

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
/* =========================   TAP IN TRANS JAKARTA  ========================= */
if(isset($_POST['tap_in_tj'])){

	if($kartu1 == NULL || $kartu1 == "") {
		echo "<script>alert('Silakan pilih kartu terlebih dahulu');</script>";
		exit;
	}

	$q = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu1'");
	$datakartu = mysqli_fetch_assoc($q);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];

	// Minimal saldo hanya untuk validasi masuk
	if($saldo < 3500){
	echo "<script>alert('Saldo Anda tidak cukup!');</script>";
	} else {
	$id_trx = uniqid("TJ-");
	mysqli_query($connect,"INSERT INTO tb_riwayat_trx_tj (id_trx,id_kartu,jenis_trx,saldo_awal,waktu_trx_awal) VALUES ('$id_trx','$kartu1','Proses','$saldo',NOW())");
	mysqli_query($connect,"UPDATE tb_user SET status='1', id_kartu='$kartu1' WHERE id_user='1'");
	echo "<script>
		alert('Berhasil Tap In Trans Jakarta dengan kartu $nama_kartu. Saldo tidak terpotong.');
		window.location='';
	</script>";
	}
}

/* =========================   TAP IN TRANS PAKUAN  ========================= */
if(isset($_POST['tap_in_tp'])){

	if($kartu2 == NULL || $kartu2 == "") {
		echo "<script>alert('Silakan pilih kartu terlebih dahulu');</script>";
		exit;
	}

	$q = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu2'");
	$datakartu = mysqli_fetch_assoc($q);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];

	if($saldo < 4900){
	echo "<script>alert('Saldo tidak cukup');</script>";
	} else {
	$saldo_baru = $saldo - 4900;
	mysqli_query($connect,"UPDATE tb_kartu SET saldo='$saldo_baru' WHERE id_kartu='$kartu2'");

	/* UPDATE RIWAYAT TP */
	$id_trx = uniqid("TP-");

	mysqli_query($connect,
		"INSERT INTO tb_riwayat_trx_tp (id_trx,id_kartu,saldo_awal,saldo_akhir,waktu_trx) VALUES ('$id_trx','$kartu2','$saldo','$saldo_baru',NOW())");

	/* UPDATE SALDO KARTU */
	mysqli_query($connect,"UPDATE tb_kartu SET saldo='$saldo_baru' WHERE id_kartu='$kartu2'");

	/* RIWAYAT KARTU (BANK) */
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
	} else if($bank=="KCI"){
		$tabel="tb_riwayat_kartu_kmt";
	}

	mysqli_query($connect,"INSERT INTO $tabel (id_trx,id_merchant,id_kartu,jenis_trx,saldo_awal,nominal_trx,saldo_akhir,waktu_trx) VALUES ('$id_trx_kartu','1','$kartu2','Out','$saldo','$tarif','$saldo_baru',NOW())");

	mysqli_query($connect,"UPDATE tb_user SET status='2', id_kartu='$kartu2' WHERE id_user='1'");

	echo "<script>
		alert('Berhasil naik bus Trans Pakuan dengan kartu $nama_kartu. Saldo terpotong Rp 4.900,-. Saldo sekarang: Rp ".number_format($saldo_baru, 0, ",", ".")."');
		window.location='';
	</script>";
	}
}

/* =========================   TAP IN COMMUTER LINE  ========================= */
if(isset($_POST['tap_in_krl'])){

	if($kartu3 == NULL || $kartu3 == "") {
		echo "<script>alert('Silakan pilih kartu terlebih dahulu');</script>";
		exit;
	}
	
	if($stasiun1 == NULL){
		echo "<script>alert('Silakan pilih stasiun terlebih dahulu');</script>";
		exit;
	}
	
	$q = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu3'");
	$datakartu = mysqli_fetch_assoc($q);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];

	// Minimal saldo hanya untuk validasi masuk
	if($saldo < 5000){
		echo "<script>alert('Saldo Anda tidak cukup!');</script>";
	} else {
		$id_trx = uniqid("KRL-");
		mysqli_query($connect,"INSERT INTO tb_riwayat_trx_krl (id_trx,id_kartu,stasiun_awal,jenis_trx,saldo_awal,waktu_trx_awal) VALUES ('$id_trx','$kartu3','$stasiun1','Proses','$saldo',NOW())");
		mysqli_query($connect,"UPDATE tb_user SET status='3', id_kartu='$kartu3' WHERE id_user='1'");
		mysqli_query($connect,"UPDATE tb_user_krl SET id_stasiun='$stasiun1' WHERE id_user='1'");

		echo "<script>
			alert('Berhasil Tap In Commuter Line dengan kartu $nama_kartu. Saldo Anda sekarang: Rp ".number_format($saldo, 0, ",", ".")."');
			window.location='';
		</script>";
	}
}

/* =========================   TAP OUT TRANS JAKARTA   ========================= */
if(isset($_POST['tap_out_tj'])){

	if($kartu1 == "" || $kartu1 == NULL){
		echo "<script>alert('Silakan pilih kartu terlebih dahulu');</script>";
		exit;
	}

	if($user['id_kartu'] != $kartu1){
		echo "<script>alert('Kartu yang Anda gunakan ini tidak sesuai dengan kartu yang digunakan saat Tap In');</script>";
		exit;
	}

	$q = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu1'");
	$datakartu = mysqli_fetch_assoc($q);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];

	$tarif = 3500;

	if($saldo < $tarif){
		echo "<script>alert('Saldo Anda tidak cukup!');</script>";
		exit;
	}

	$saldo_baru = $saldo - $tarif;

	/* UPDATE SALDO KARTU */
	mysqli_query($connect,"UPDATE tb_kartu SET saldo='$saldo_baru' WHERE id_kartu='$kartu1'");

	/* UPDATE RIWAYAT TJ */
	$qtrx = mysqli_query($connect,"SELECT * FROM tb_riwayat_trx_tj WHERE id_kartu='$kartu1'	AND jenis_trx='Proses' ORDER BY waktu_trx_awal DESC	LIMIT 1");

	$trx = mysqli_fetch_assoc($qtrx);
	$id_trx = $trx['id_trx'];

	mysqli_query($connect,"UPDATE tb_riwayat_trx_tj SET jenis_trx='Selesai', saldo_akhir='$saldo_baru', waktu_trx_akhir=NOW() WHERE id_trx='$id_trx'");

	/* RIWAYAT KARTU (BANK) */
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
	} else if($bank=="KCI"){
		$tabel="tb_riwayat_kartu_kmt";
	}

	mysqli_query($connect,"INSERT INTO $tabel (id_trx,id_merchant,id_kartu,jenis_trx,saldo_awal,nominal_trx,saldo_akhir,waktu_trx) VALUES ('$id_trx_kartu','1','$kartu1','Out','$saldo','$tarif','$saldo_baru',NOW())") or die(mysqli_error($connect));

	/* UPDATE STATUS USER  */
	mysqli_query($connect,"UPDATE tb_user SET status='0', id_kartu=NULL WHERE id_user='1'");

	echo "<script>
	alert('Tap Out berhasil. Saldo terpotong Rp 3.500,- . Saldo Anda sekarang: Rp ".number_format($saldo_baru, 0, ",", ".")."');
	window.location='';
	</script>";
}

	/* =========================   TAP OUT TRANS PAKUAN  ========================= */
	if(isset($_POST['tap_out_tp'])){

	mysqli_query($connect,"UPDATE tb_user SET status='0', id_kartu=NULL WHERE id_user='1'");

	echo "<script>
	alert('Berhasil turun dari bus');
	window.location='';
	</script>";
}

/* =========================   TAP OUT COMMUTER LINE   ========================= */
if(isset($_POST['tap_out_krl'])){

	if($kartu3 == "" || $kartu3 == NULL){
		echo "<script>alert('Silakan pilih kartu terlebih dahulu');</script>";
		exit;
	}

	if($stasiun2 == NULL){
		echo "<script>alert('Silakan pilih stasiun terlebih dahulu');</script>";
		exit;
	}

	if($user['id_kartu'] != $kartu3){
		echo "<script>alert('Kartu yang Anda gunakan ini tidak sesuai dengan kartu yang digunakan saat Tap In');</script>";
		exit;
	}

	$querykartu = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu3'");
	$datakartu = mysqli_fetch_assoc($querykartu);

	$saldo = $datakartu['saldo'];
	$nama_kartu = $datakartu['nama_kartu'];


	if($saldo < 5000){
		echo "<script>alert('Saldo Anda tidak cukup!');</script>";
		exit;
	}
	
	/* CARI STASIUN ASAL DARI TB_USER_KRL */
	$querytrip = mysqli_query($connect,"SELECT * FROM tb_user_krl WHERE id_user='1'") or die(mysqli_error($connect));
	$datatrip = mysqli_fetch_assoc($querytrip);
	$id_stasiun_asal = $datatrip['id_stasiun'];

	/* Ambil data asal */
	$q1 = mysqli_query($connect,"SELECT * FROM tb_stasiun WHERE id_stasiun='$id_stasiun_asal'") or die(mysqli_error($connect));
	$a = mysqli_fetch_assoc($q1);

	/* Ambil data tujuan */
	$q2 = mysqli_query($connect,"SELECT * FROM tb_stasiun WHERE id_stasiun='$stasiun2'") or die(mysqli_error($connect));
	$t = mysqli_fetch_assoc($q2);

	/* Cek line */
	if($a['id_line'] == $t['id_line']){
		// === SAME LINE ===
		$jarak = abs($a['km_posisi'] - $t['km_posisi']);
	} else {
		// === BEDA LINE ===
		// Cari stasiun transit

		// === CARI TRANSIT DI LINE ASAL YANG PALING DEKAT KE TUJUAN ===

		$qTransit = mysqli_query($connect,"SELECT s.* FROM tb_transit t	JOIN tb_stasiun s ON s.id_stasiun = t.id_stasiun WHERE t.line_asal = '{$a['id_line']}' AND t.line_tujuan = '{$t['id_line']}' LIMIT 1") or die(mysqli_error($connect));
		$transit = mysqli_fetch_assoc($qTransit);

		// Hitung jarak
		$jarak1 = abs(
			$a['km_posisi'] -
			$transit['km_posisi']
		);

		$jarak2 = abs(
			$t['km_posisi'] -
			$transit['km_posisi']
		);

		$jarak = $jarak1 + $jarak2;
	}

	/* Hitung tarif */
	 $tarif_dasar = 3000;

	if($jarak <= 25000){
		$tarif = $tarif_dasar;
	} else {
		$sisa_jarak = $jarak - 25000;
		$blok = ceil($sisa_jarak / 10000);
		$tarif = $tarif_dasar + ($blok * 1000);
	}

	$saldo_baru = $saldo - $tarif;

	/* UPDATE SALDO KARTU */
	mysqli_query($connect,"UPDATE tb_kartu SET saldo='$saldo_baru' WHERE id_kartu='$kartu3'");

	/* UPDATE RIWAYAT KRL */
	$qtrx = mysqli_query($connect,"SELECT * FROM tb_riwayat_trx_krl WHERE id_kartu='$kartu3' AND jenis_trx='Proses' ORDER BY waktu_trx_awal DESC LIMIT 1");

	$trx = mysqli_fetch_assoc($qtrx);
	$id_trx = $trx['id_trx'];

	mysqli_query($connect,"UPDATE tb_riwayat_trx_krl SET jenis_trx='Selesai', saldo_akhir='$saldo_baru', stasiun_akhir='$stasiun2', waktu_trx_akhir=NOW() WHERE id_trx='$id_trx'");

	/* RIWAYAT KARTU (BANK) */
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
	} else if($bank=="KCI"){
		$tabel="tb_riwayat_kartu_kmt";
	}

	mysqli_query($connect,"INSERT INTO $tabel (id_trx,id_merchant,id_kartu,jenis_trx,saldo_awal,nominal_trx,saldo_akhir,waktu_trx) VALUES ('$id_trx_kartu','1','$kartu3','Out','$saldo','$tarif','$saldo_baru',NOW())") or die(mysqli_error($connect));

	/* UPDATE STATUS USER  */
	mysqli_query($connect,"UPDATE tb_user SET status='0', id_kartu=NULL WHERE id_user='1'");
	mysqli_query($connect,"UPDATE tb_user_krl SET id_stasiun=NULL WHERE id_user='1'");

	echo "<script>
	alert('Tap Out berhasil. Saldo terpotong Rp ".number_format($tarif, 0, ",", ".")." . Saldo Anda sekarang: Rp ".number_format($saldo_baru, 0, ",", ".")."');
	window.location='';
	</script>";
}
?>