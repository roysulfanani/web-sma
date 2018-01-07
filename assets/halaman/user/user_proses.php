<?php
//error_reporting(0);
include "../../../config/koneksi.php";

$action = $_POST["action"];
switch ($action) {
	case "viewMapel":
		$query = "select * from tuser order by username";
		$hasil = mysql_query($query);

		$arr = array();
		while ($row = mysql_fetch_array($hasil)) {
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

	case 'commit':
		//$id=$_POST['idmapel'];
		$nama=$_POST['tnama'];
		$aktif=$_POST['taktif'];

		if ($id == "") {
			$query="INSERT INTO tmapel VALUES('$id', '$nama', '$aktif')";
			/*$query="insert into tguru(nip, nama, jenis_kelamin, mapel, aktif) values('$nip', '$nama', '$alamat', '$jk', '$mapel', $aktif)";*/
		} else {
			$query="update tmapel set idmapel = '$id', nama = '$nama' where idmapel = '$id'";
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
		$id	= $_POST['idmapel'];
		$query 	= "DELETE FROM tmapel WHERE idmapel = $id";
		$hasil	= mysql_query($query);

		if ($hasil != false) {
			$pesan = "Hapus data sukses";
		} else {
			$pesan = "Data gagal dihapus";
		}

		echo json_encode($pesan);

		break;

	case "viewEdit":
		$id = $_POST["idmapel"];

		$query = "select * from tmapel where idmapel = '$id'";
		$hasil = mysql_query($query);

		$arr = array();
		while ($row = mysql_fetch_array($hasil)) {
			array_push($arr, $row);
		}

		echo json_encode($arr);

		break;

	/*case "viewMapel":
		$query = "select * from tmapel order by idmapel";
		$hasil = mysql_query($query);

		$arr = array();
		while ($row = mysql_fetch_array($hasil)) {
			array_push($arr, $row);
		}
		echo json_encode($arr);
		break;
	*/
	default:
		echo json_encode("error");
		break;
}
?>