<?php

include "../../../config/koneksi.php";

$ACTION=$_POST["action"];
switch ($ACTION) {
	case"viewMapel":
		$query="select * from tmapel order by idmapel";
		$hasil=mysql_query($query);

		$arr=array();
		while ($row=mysql_fetch_array($hasil)){
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

	case "commit":
		$ID=$_POST['idMapel'];
		$IDMAPEL=$_POST['tidmapel'];
		$NAMAMAPEL=$_POST['namamapel'];
		$AKTIF=$_POST['taktif'];

		if($ID==""){
			$query="insert into tmapel(nama_mapel,aktif) values('$NAMAMAPEL','$AKTIF')";
		}else{
			$query="update tmapel set nama_mapel='$NAMAMAPEL',
									where idmapel='$IDMAPEL'";
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
		$IDMAPEL   = $_POST['idmapel'];
		$query = "delete from tmapel where idmapel = $IDMAPEL";
		$hasil = mysql_query($query);

		if ($hasil !=false) {
			$pesan = "Hapus data berhasil";
		}else{
			$pesan = "Data tidak dapat dihapus";
		}
		echo json_encode($pesan);
	break;

	case "viewEdit":
		$ID=$_POST["idMapel"];

		$query="select * from tmapel where idmapel='$ID";
		$hasil=mysql_query($query);

		$arr=array();
		while($row=mysql_fetch_array($hasil)){
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

	default :
		echo json_encode("error");
	break;
}
	?>