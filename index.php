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
    <a class="navbar-brand" href="/simulasi_transportasi">Simulasi Transportasi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Riwayat</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=riwayat_cl">Transaksi Commuter Line</a></li>
            <li><a class="dropdown-item" href="?page=riwayat_tp">Transaksi Trans Pakuan</a></li>
			      <li><a class="dropdown-item" href="?page=riwayat_tj">Transaksi Trans Jakarta</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Kartu Transportasi</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=kartu">Daftar Kartu</a></li>
            <li><a class="dropdown-item" href="?page=topup_kartu">Top Up Kartu</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
	include "page.php";
?>


</body>
</html>