<?php
/*session_start();

if (empty($_SESSION)) {
	header("location:login.php");
}*/

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = "dashboard";
}

switch ($page) {

	case "dashboard":
		$title = "DASHBOARD";
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/dashboard/dashboard.php";
		include "footer.php";

		break;

	case "dosen":
		$title = "Dosen";
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/dosen/dosen.php";
		include "footer.php";

		break;

	case "user":
		$title = "USER";
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/user/user.php";
		include "footer.php";

		break;

	case "informasi":
		$title = "INFORMASI";
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/informasi/informasi.php";
		include "footer.php";

		break;
	
	case "mapel":
			$title = "MATA PELAJARAN";
			include "header.php";
			include "menu.php";
			include "menu_kiri.php";
			include "halaman/mapel/mapel.php";
			include "footer.php";

			break;

	case "bukutamu":
		$title = "BUKU TAMU";
		include "header.php";
		include "menu.php";
		include "menu_kiri.php";
		include "halaman/bukutamu/bukutamu.php";
		include "footer.php";

		break;

	/*case 'logout':
		?><button type="button" ></button><?php
		break;*/
	
	default:
		# code...
		break;
}

?>