<div class="container" style="margin-top:80px">
	<h1>Hi, Teddy!</h1>
	<h2>Yuk isi saldo <small>kartu transportasi kamu</small></h2>
	<form action=""  method="post" enctype="multipart/form-data">
		<div class="mb-3 mt-3">
			<label for="sel1" class="form-label">Pilih kartu:</label>	
				<select class="form-select" id="kartu" name="pilih_kartu">
					<option value="">--Pilih kartu--</option>
					<?php 
					$sqlkartu = mysqli_query($connect, "SELECT * FROM tb_kartu") or die(mysqli_error($connect));
					while ($data = mysqli_fetch_array($sqlkartu)):;
					?>
						<option value="<?php echo $data['id_kartu'];?>"><?php echo $data['nama_kartu'];?> - Saldo Rp <?php echo number_format($data['saldo'], 0, ",", "."); ?></option>
					<?php 
						endwhile;
					?>
				</select>
		</div>
		<div class="mb-3">
			<label for="jumlah" class="form-label">Jumlah top up:</label>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio1" name="optradio" value="20000">
				<label class="form-check-label" for="radio1">Rp 20.000</label>
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio2" name="optradio" value="25000">
				<label class="form-check-label" for="radio2">Rp 25.000</label>
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio3" name="optradio" value="50000">
				<label class="form-check-label" for="radio3">Rp 50.000</label>
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio4" name="optradio" value="100000">
				<label class="form-check-label" for="radio4">Rp 100.000</label>
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio5" name="optradio" value="150000">
				<label class="form-check-label" for="radio5">Rp 150.000</label>
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" id="radio6" name="optradio" value="200000">
				<label class="form-check-label" for="radio6">Rp 200.000</label>
			</div>
		</div>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
		<button type="submit" class="btn btn-primary" name="top_up">Top Up</button>
	</form>
</div>

<?php

$kartu = $_POST['pilih_kartu'] ?? '';

/* =========================   TOP UP KARTU  ========================= */
if(isset($_POST['top_up'])){
	if($kartu == ""){
		echo "<script>alert('Pilih kartu terlebih dahulu!');</script>";
	} else {
		$jumlah = $_POST['optradio'] ?? 0;
		if($jumlah == 0){
			echo "<script>alert('Pilih jumlah top up terlebih dahulu!');</script>";
		} else {
			// Ambil data kartu dari database
			$q = mysqli_query($connect,"SELECT * FROM tb_kartu WHERE id_kartu='$kartu'") or die(mysqli_error($connect));
			$datakartu = mysqli_fetch_assoc($q);
			$saldo = $datakartu['saldo'];
			$saldo_baru = $saldo + $jumlah;

			// Proses top up (contoh: simpan ke database)
			mysqli_query($connect, "UPDATE tb_kartu SET saldo='$saldo_baru' WHERE id_kartu='$kartu'") or die(mysqli_error($connect));

			// Simpan riwayat top up kartu ke database bank
			$bank = $datakartu['bank'];
			$id_trx_kartu = uniqid();

			if($bank=="BBRI"){
				$tabel="tb_riwayat_kartu_bri";
				$merchant = '5';
			} else if($bank=="BBCA"){
				$tabel="tb_riwayat_kartu_bca";
				$merchant = '3';
			} else if($bank=="BMRI"){
				$tabel="tb_riwayat_kartu_mri";
				$merchant = '4';
			} else if($bank=="BDKI"){
				$tabel="tb_riwayat_kartu_dki";
				$merchant = '6';
			}
			mysqli_query($connect,"INSERT INTO $tabel (id_trx,id_merchant,id_kartu,jenis_trx,saldo_awal,nominal_trx,saldo_akhir,waktu_trx) VALUES ('$id_trx_kartu','$merchant','$kartu','In','$saldo','$jumlah','$saldo_baru',NOW())") or die(mysqli_error($connect));
			echo "<script>alert('Top up kartu berhasil dengan jumlah: Rp ".number_format($jumlah, 0, ",", ".").". Saldo kartu Anda sekarang: Rp ".number_format($saldo_baru, 0, ",", ".")."');
			window.location='/simulasi_transportasi';</script>";
		}
	}
}

?>