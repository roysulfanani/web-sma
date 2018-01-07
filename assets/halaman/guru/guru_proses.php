<?php
//error_reporting(0);
include "../../../config/koneksi.php";

$action = $_POST["action"];
switch ($action) {
	case "viewguru":
		$query = "select * from tguru order by nip";
		$hasil = mysql_query($query);

		$arr = array();
		while ($row = mysql_fetch_array($hasil)) {
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

	case 'commit':
		$id=$_POST['idGuru'];
		$nip=$_POST['tnip'];
		$nama=$_POST['tnama'];
		$alamat=$_POST['talamat'];
		$jk=$_POST['JK'];
		$mapel=$_POST['tmapel'];
		$aktif=$_POST['taktif'];

		if ($id == "") {
			$query="INSERT INTO tguru VALUES('$nip', '$nama', '$jk', '$alamat', '$mapel', '$aktif')";
			/*$query="insert into tguru(nip, nama, jenis_kelamin, mapel, aktif) values('$nip', '$nama', '$alamat', '$jk', '$mapel', $aktif)";*/
		} else {
			$query="update tguru set nip = '$nip', nama = '$nama', alamat = '$alamat' where nip = '$id'";
		}

		$hasil=mysql_query($query);
		if (isset($hasil)) {
			$pesan="Data Berhasil disimpan";
		} else {
			$pesan="Data gagal disimpan";
		}

		echo json_encode($pesan);

		break;

	case 'delete':
		$nip	= $_POST['nip'];
		$query 	= "DELETE FROM tguru WHERE nip = $nip";
		$hasil	= mysql_query($query);

		if ($hasil != false) {
			$pesan = "Hapus data sukses";
		} else {
			$pesan = "Data gagal dihapus";
		}

		echo json_encode($pesan);

		break;

	case "viewEdit":
		$NIP = $_POST["nip"];

		$query = "select * from tguru where nip = '$NIP'";
		$hasil = mysql_query($query);

		$arr = array();
		while ($row = mysql_fetch_array($hasil)) {
			array_push($arr, $row);
		}

		echo json_encode($arr);

		break;

	case "viewMapel":
		$query = "select * from tmapel order by idmapel";
		$hasil = mysql_query($query);

		$arr = array();
		while ($row = mysql_fetch_array($hasil)) {
			array_push($arr, $row);
		}
		echo json_encode($arr);
		break;
	
	default:
		echo json_encode("error");
		break;
}
?>