<div class="container" style="margin-top:80px">
	<h1>Riwayat Perjalanan Anda</h1>
	<h2>Menggunakan moda transportasi <small>KRL Commuter Line</small></h2>
  	<table class="table table-hover">
	<thead>
		<tr>
		<th>ID Transaksi</th>
		<th>Jenis Transaksi</th>
		<th>ID Kartu</th>
		<th>Waktu Trx Awal</th>
		<th>Waktu Trx Akhir</th>
		<th>Saldo Awal</th>
		<th>Saldo Akhir</th>
		<th>Stasiun Awal</th>
		<th>Stasiun Akhir</th>
		</tr>
	</thead>
	<tbody>
		<?php
        $sql = mysqli_query($connect, "SELECT * from tb_riwayat_trx_krl") or die (mysql_error());
		$cek = mysqli_num_rows($sql);
		if($cek < 1){
			?>
			<tr>
				<td colspan="9" align="center" style="padding: 10px;">Data tidak ditemukan</td>
			</tr>
			<?php
		} else {
			while($data = mysqli_fetch_array($sql)){
			?>
				<tr>
					<td><?php echo $data['id_trx'];?></td>
					<td><?php echo $data['jenis_trx'];?></td>
					<td><?php echo $data['id_kartu'];?></td>
					<td><?php echo $data['waktu_trx_awal'];?></td>
					<td><?php echo $data['waktu_trx_akhir'];?></td>
					<td><?php echo "Rp " . number_format($data['saldo_awal'], 0, ",", ".");?></td>
					<td><?php echo "Rp " . number_format($data['saldo_akhir'], 0, ",", ".");?></td>
					<?php
					$sqlstasiun = mysqli_query($connect, "SELECT * from tb_stasiun") or die (mysql_error());
					$cekstasiun = mysqli_num_rows($sqlstasiun);
					while($datastasiun = mysqli_fetch_array($sqlstasiun)){
						if($datastasiun['id_stasiun'] == $data['stasiun_awal']){
							$stasiunawal = $datastasiun['nama_stasiun'];
						}
						if($datastasiun['id_stasiun'] == $data['stasiun_akhir']){
							$stasiunakhir = $datastasiun['nama_stasiun'];
						}
					}

					?>
					<td><?php echo $stasiunawal;?></td>
					<td><?php echo $stasiunakhir;?></td>
				</tr>
			<?php
			}
		}
		?>
	</tbody>
	</table>
</div>

<div class="container">
	<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CetakTransaksi">Cetak Transaksi</button>
</div>

<div class="modal fade" id="CetakTransaksi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5>Cetak Transaksi</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<p>Anda yakin ingin mencetak transaksi ini?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary">Cetak</button>
			</div>
		</div>
	</div>
</div>
