<?php
	$page = @$_GET['page'];
	$action = @$_GET['action'];
	if($page == "riwayat_kartu"){
		if($action == ""){
			include "inc/riwayat/riwayat_kartu.php";
		} else if($action == "hapus"){
			include "inc/riwayat/hapus_riwayat_kartu.php";
        } else if($action == "cetak"){
			include "inc/riwayat/cetak_riwayat_kartu.php";
		}
	} else if($page == "riwayat_tj"){
		if($action == ""){
			include "inc/riwayat/riwayat_tj.php";
		} else if($action == "hapus"){
			include "inc/riwayat/hapus_riwayat_tj.php";
		} else if($action == "cetak"){
			include "inc/riwayat/cetak_riwayat_tj.php";
		}
	} else if($page == "riwayat_tp"){
		if($action == ""){
			include "inc/riwayat/riwayat_tp.php";
		} else if($action == "hapus"){
			include "inc/riwayat/hapus_riwayat_tp.php";
		} else if($action == "cetak"){
			include "inc/riwayat/cetak_riwayat_tp.php";
		}
	} else if($page == "riwayat_cl"){
		if($action == ""){
			include "inc/riwayat/riwayat_krl.php";
		} else if($action == "hapus"){
			include "inc/riwayat/hapus_riwayat_krl.php";
		} else if($action == "cetak"){
			include "inc/riwayat/cetak_riwayat_krl.php";
		}
	} else if($page == "list_kartu"){
		if($action == ""){
			include "inc/kartu/list_kartu.php";
		} else if($action == "tambah"){
			include "inc/kartu/tambah_kartu.php";
		} else if($action == "edit"){
			include "inc/kartu/edit_kartu.php";
		} else if($action == "hapus"){
			include "inc/kartu/hapus_kartu.php";
		}
	} else if($page == "topup_kartu"){
		if($action == ""){
			include "inc/kartu/topup_kartu.php";
		}
	} else if($page == ""){
		include "utama.php";
	} else {
		//include "inc/404.php";
		echo "Error 404: Halaman tidak ditemukan";
	}
?>