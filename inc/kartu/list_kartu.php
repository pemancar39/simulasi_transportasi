<div class="container" style="margin-top:80px">
	<h1>Hi, Teddy!</h1>
	<h2>Berikut kartu transportasi <small>yang kamu miliki</small></h2>
  	<table class="table table-hover">
	<thead>
		<tr>
		<th>Nama Kartu</th>
		<th>Saldo</th>
		<th>Jenis Kartu - Bank</th>
		<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
        $sql = mysqli_query($connect, "SELECT * from tb_kartu") or die (mysql_error());
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
					<td><?php echo $data['nama_kartu'];?></td>
					<td><?php echo "Rp " . number_format($data['saldo'], 0, ",", ".");?></td>
					<td><?php echo $data['jenis_kartu'];?></td>
					<td>
						<div class="btn-group">
							<button class="btn btn-warning btnEdit"
								data-id="<?= $data['id_kartu']; ?>"
								data-nama="<?= $data['nama_kartu']; ?>"
								data-khusus="<?= $data['khusus']; ?>"
								data-bs-toggle="modal"
								data-bs-target="#EditKartu">Edit</button> 
							<a onclick="return confirm('Anda yakin ingin menghapus kartu <?php echo $data['nama_kartu']; ?>?')" href="?page=kartu&action=hapus&idkartu=<?php echo $data['id_kartu']; ?>" class="btn btn-danger">Hapus</a>
						</div>
					</td>
				</tr>
			<?php
			}
		}
		?>
	</tbody>
	</table>
</div>

<div class="container">
	<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahKartu">Tambah Kartu</button>
</div>

<div class="modal fade" id="EditKartu">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
				<h5>Edit Kartu</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">
					<!-- Hidden -->
					<input type="hidden" name="id_kartu" id="edit_id">

					<!-- Nama -->
					<label>Nama Kartu</label>
					<input type="text" name="nama_kartu" id="edit_nama"	class="form-control">

					<!-- Checkbox Tunggal -->
					<div class="form-check mt-3">
						<input class="form-check-input"	type="checkbox"	name="kartu_khusus" id="edit_khusus" value="1">
						<label class="form-check-label">Kartu khusus (Lansia, Disabilitas, Anak Sekolah, Mahasiswa)</label>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" name="update_kartu" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="TambahKartu">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
				<h5>Tambah Kartu</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">

					<!-- Nama -->
					<div class="mb-3 mt-3">
						<label>Nama Kartu</label>
						<input type="text" name="nama_kartu" id="edit_nama"	class="form-control">
					</div>
					
					<div class="mb-3">
						<label for="sel1" class="form-label">Jenis kartu:</label>
						<select class="form-select" id="sel1" name="jenis_kartu">
							<option value="0">-- pilih kartu --</option>
							<option value="1">Flazz BCA</option>
							<option value="2">e-Money Mandiri</option>
							<option value="3">Jaklingko Bank DKI</option>
							<option value="4">Brizzi BRI</option>
							<option value="5">Kartu Multi Trip KCI</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="jumlah" class="form-label">Saldo awal:</label>
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

					<!-- Checkbox Tunggal -->
					<div class="form-check mt-3">
						<input class="form-check-input"	type="checkbox"	name="kartu_khusus" id="edit_khusus" value="1">
						<label class="form-check-label">Kartu khusus (Lansia, Disabilitas, Anak Sekolah, Mahasiswa)</label>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" name="tambah_kartu" class="btn btn-primary">Beli Kartu</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function(){
	const tombol = document.querySelectorAll(".btnEdit");
	tombol.forEach(btn => {
		btn.addEventListener("click", function(){
			console.log(this.dataset.khusus);
			// Isi field biasa
			document.getElementById("edit_id").value =
			this.dataset.id;

			document.getElementById("edit_nama").value =
			this.dataset.nama;

			let aktif = parseInt(this.dataset.khusus);
			document.getElementById("edit_khusus").checked =
			(aktif === 1);
		});
	});
});
</script>

<?php
	if(isset($_POST['update_kartu'])){
		$id   = $_POST['id_kartu'];
		$nama = $_POST['nama_kartu'];

		// REVISI CHECKBOX
		$khusus = $_POST['kartu_khusus'] ?? 0;

		mysqli_query($connect,"UPDATE tb_kartu SET nama_kartu='$nama',khusus='$khusus' WHERE id_kartu='$id'") or die(mysqli_error($connect));

		echo "<script>
			alert('Data kartu berhasil diupdate');
			window.location='';
		</script>";
	}

	if(isset($_POST['tambah_kartu'])){
		$nama = $_POST['nama_kartu'];
		$jenis = $_POST['jenis_kartu'];
		$saldo = $_POST['optradio'] ?? 0;
		$khusus = $_POST['kartu_khusus'] ?? 0;

		if($jenis == "0"){
			echo "<script>alert('Pilih jenis kartu terlebih dahulu!');</script>";
		} else if($saldo == 0){
			echo "<script>alert('Pilih saldo awal terlebih dahulu!');</script>";
		} else {
			if($jenis=="1"){
				$bank = 'BBCA';
				$jenis_kartu = 'Flazz BCA';
			} else if($jenis=="2"){
				$bank = 'BMRI';
				$jenis_kartu = 'e-Money Mandiri';
			} else if($jenis=="3"){
				$bank = 'BDKI';
				$jenis_kartu = 'Jaklingko Bank DKI';
			} else if($jenis=="4"){
				$bank = 'BBRI';
				$jenis_kartu = 'Brizzi BRI';
			} else if($jenis=="5"){
				$bank = 'KCI';
				$jenis_kartu = 'Kartu Multi Trip KCI';
			}

			mysqli_query($connect,"INSERT INTO tb_kartu (nama_kartu, jenis_kartu, saldo, khusus, bank) VALUES ('$nama', '$jenis_kartu', '$saldo', '$khusus', '$bank')") or die(mysqli_error($connect));

			echo "<script>
				alert('Kartu berhasil dibeli!');
				window.location='';
			</script>";
		}
	}
?>
