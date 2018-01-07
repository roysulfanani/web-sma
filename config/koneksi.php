<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "achmad_roysul_fanani_064";

$koneksi = mysql_connect($host, $username, $password);
$dbpilih = mysql_select_db($db, $koneksi);
?>