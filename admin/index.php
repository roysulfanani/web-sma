<?php

if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = "dashboard";
}
switch($page) {
	case "dashboard":
		$title ="SMA Negeri 7 Surabaya";	
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/dashboard/dashboard.php";
		include "footer.php";
		break;

	case "guru":
		$title ="GURU";	
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/guru/guru.php";
		include "footer.php";
		break;

	case "user":
		$title ="USER";	
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/user/user.php";
		include "footer.php";
		break;
		
	case "informasi":
		$title ="INFORMASI";	
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/informasi/informasi.php";
		include "footer.php";
		break;

	case "buku_tamu":
		$title ="Buku Tamu";	
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/buku tamu/bukutamu.php";
		include "footer.php";
		break;
	
	case "mapel":
		$title ="Mapel";	
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/mapel/mapel.php";
		include "footer.php";
		break;
	
}


?>