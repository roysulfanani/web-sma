<?php

include "../../config/koneksi.php";

$ACTION=$_POST["action"];
switch ($ACTION) {
	case"viewDosen":
		$query="select * from dosen order by nip";
		$hasil=mysql_query($query);

		$arr=array();
		while ($row=mysql_fetch_array($hasil)){
			array_push($arr, $row);
		}
		echo json_encode($arr);
	break;

	case "commit":
		$ID=$_POST['idDosen'];
		$NIP=$_POST['tnip'];
		$NAMA=$_POST['tnama'];
		$ALAMAT=$_POST['talamat'];
		$JK=$_POST['JK'];
		$TELPON=$_POST['ttelpon'];
		$TGL=$_POST['ttglmasukkerja'];

		if($ID==""){
			$query="insert into dosen(nip,nama_dosen,no_telpon,alamat_dosen,jenis_kelamin,tanggal_masuk_kerja) values('$NIP','$NAMA','$TELPON','$ALAMAT','$JK','$TGL')";
		}else{
			$query="update dosen set nip='$NIP',
									nama_dosen='$NAMA',
									no_telpon='$TELPON',
									jenis_kelamin='$JK',
									tanggal_masuk_kerja='$TGL',
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
		$query = "delete from dosen where nip = $nip";
		$hasil = mysql_query($query);

		if ($hasil !=false) {
			$pesan = "Hapus data berhasil";
		}else{
			$pesan = "Data tidak dapat dihapus";
		}
		echo json_encode($pesan);
	break;

	case "viewEdit":
		$NIP=$_POST["idDosen"];

		$query="select * from dosen where nip='$NIP'";
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
	default :
		echo json_encode("error");
	break;
}

?>