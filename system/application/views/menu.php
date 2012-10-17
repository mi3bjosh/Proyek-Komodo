<?php switch($jenis){
	case "Artikel";
		include("vartikel.php");
		break;
	case "Isi Artikel";
		include("isi_artikel.php");
		break;
	case "Admin";
		include("admin/home_admin.php");
		break;
	case "manajemen_artikel";
		include("admin/manajemen_artikel.php");
		break;
	case "edit_manajemen_artikel";
		include("admin/edit_manajemen_artikel.php");
		break;
	case "tambah_artikel";
		include("admin/tambah_artikel.php");
		break;
	case "manajemen_link";
		include("admin/manajemen_link.php");
		break;
	case "edit_link";
		include("admin/link/edit_link.php");
		break;
	case "tambah_link";
		include("admin/link/tambah_link.php");
		break;
	}
	?>