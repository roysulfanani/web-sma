<?php

include "../../../config/koneksi.php";

$ACTION=$_POST["action"];
switch ($ACTION) {
	case"viewGuru":
		$query="select * from tguru order by nip";
		$hasil=mysql_query($query);

		$arr=array();
		while ($row=mysql_fetch_array($hasil)){
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

	case "commit":
		$ID=$_POST['idGuru'];
		$NIP=$_POST['tnip'];
		$NAMA=$_POST['tnama'];
		$ALAMAT=$_POST['talamat'];
		$JK=$_POST['JK'];
		$TELPON=$_POST['ttelpon'];
		$MAPEL=$_POST['tmapel'];
		$AKTIF=$_POST['taktif'];

		if($ID==""){
			$query="insert into tguru(nip,nama,jenis_kelamin,alamat,telpon,mapel,aktif) values('$NIP','$NAMA','$JK','$ALAMAT','$TELPON','$MAPEL','$AKTIF')";
		}else{
			$query="update tguru set nip='$NIP',
									nama='$NAMA',
									alamat='$ALAMAT',
									where nip='$ID'";
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
		$nip   = $_POST['nip'];
		$query = "delete from tguru where nip = $nip";
		$hasil = mysql_query($query);

		if ($hasil !=false) {
			$pesan = "Hapus data berhasil";
		}else{
			$pesan = "Data tidak dapat dihapus";
		}
		echo json_encode($pesan);
	break;

	case "viewEdit":
		$NIP=$_POST["id"];

		$query="select * from tguru where nip='$NIP'";
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

	case "viewMapel":
		$query="select * from tmapel order by idmapel";
		$hasil=mysql_query($query);

		$arr=array();
		while ($row=mysql_fetch_array($hasil)){
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;
	default :
		echo json_encode("error");
	break;
}

?>