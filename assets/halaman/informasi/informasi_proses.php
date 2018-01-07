<?php
error_reporting(0);
include "../../../config/koneksi.php";

$action = $_POST["action"];
switch ($action) {
	case "viewinformasi":
		$query = "select * from tinformasi order by idinformasi";
		$hasil = mysql_query($query);

		$arr = array();
		while ($row = mysql_fetch_array($hasil)) {
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

	case 'commit':
		$id 	=$_POST['idinfo'];
		$judul 	=$_POST['tjudul'];
		$isi 	=$_POST['PR_isi'];
		$aktif 	=$_POST['taktif'];
		$tgl = date(dd-MM-yyy);

		if ($id == "") {
			$query="INSERT INTO tinformasi(judul, isi, aktif, tgl_insert) VALUES('$judul', '$isi', '$aktif', '$tgl')";
			/*$query="insert into tguru(nip, nama, jenis_kelamin, mapel, aktif) values('$nip', '$nama', '$alamat', '$jk', '$mapel', $aktif)";*/
		} else {
			$query="Perintah untuk update";
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
		$id	= $_POST['id'];
		$query 	= "DELETE FROM tinformasi WHERE idinformasi = $id";
		$hasil	= mysql_query($query);

		if ($hasil != false) {
			$pesan = "Hapus data sukses";
		} else {
			$pesan = "Data gagal dihapus";
		}

		echo json_encode($pesan);

	break;
	
	default:
		echo json_encode("error");
		break;
}
?>