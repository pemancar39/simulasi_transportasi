<?php
    $idkartu = @$_GET['idkartu'];

    mysqli_query($connect, "delete from tb_kartu where id_kartu = '$idkartu'") or die (mysql_error());
?>
<script type="text/javascript">
    alert("Kartu berhasil dihapus");
    window.location.href="?page=kartu";
</script>