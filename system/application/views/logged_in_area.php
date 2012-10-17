<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>Admin Area</title>
</head>
<body>
	<h2>Selamat Datang Kembali, <?php echo $this->session->userdata('firstname'); ?>!</h2>
     <p>Anda login sebagai <?php echo $this->session->userdata('status'); ?>.</p>
	<h4><?php echo anchor('arsipmateri', 'Lanjut'); ?> | <?php echo anchor('login/logout', 'Logout'); ?></h4>
</body>
</html>	