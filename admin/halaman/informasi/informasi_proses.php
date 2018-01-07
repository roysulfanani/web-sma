<?php

error_reporting(0);
include "../../../config/koneksi.php";

$ACTION=$_POST["action"];
switch ($ACTION) {
	case"viewInformasi":
		$query="select * from tinformasi order by idinformasi";
		$hasil=mysql_query($query);

		$arr=array();
		while ($row=mysql_fetch_array($hasil)){
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

		case "commit":
		$ID=$_POST['idinformasi'];
		$JUDUL=$_POST['tjudul'];
		$ISI=$_POST['PR_ISI'];
		$AKTIF=$_POST['taktif'];

		if($ID==""){
			$query="insert into tinformasi(judul, isi, aktif) values('$JUDUL','$ISI','$AKTIF')";
		}else{
			$query="perintah untuk update";
		}

		$hasil=mysql_query($query);
		if(isset($hasil)){
			$pesan="Data berhasil disimpan";
		}else{
			$pesan="Data gagal disimpan";
		}

		echo json_encode($pesan);
	break;

	case "delete" :
		$id   = $_POST['id'];
		$query = "delete from tinformasi where idinformasi = $id";
		$hasil = mysql_query($query);

		if ($hasil !=false) {
			$pesan = "Hapus data berhasil";
		}else{
			$pesan = "Data tidak dapat dihapus";
		}
		echo json_encode($pesan);
	break;

	default :
		echo json_encode("error");
	break;

}

?>