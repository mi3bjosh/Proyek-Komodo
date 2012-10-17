<?php switch($content){
	case "home";
		include("home.php");
		break;
	case "tampil_soal";
		include("soal_tampil.php");
		break;
	case "tambah_soal";
		include("soal_tambah.php");
		break;
	case "tampil_tutorial";
		include("tutorial_view.php");
		break;
	case "tambah_tutorial";
		include("tutorial_add.php");
		break;
	case "manajemen_link";
		include("manajemen_link.php");
		break;
	case "tambah_link";
		include("link/tambah_link.php");
		break;
	}
	?>