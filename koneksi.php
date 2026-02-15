<?php
$connect = mysqli_connect("localhost", "root", "");
if(!$connect) {
    die('failed to connect to database ' . mysqli_error($connect));
}
$selectdb = mysqli_select_db($connect, "db_simutrans");
if(!$selectdb) {
    die("Failed to select database");
}
?>