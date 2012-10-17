<html>
<head>
	<title>CodeIgniter</title>
	<link href="<?php echo base_url() ?>css/style.css" media="screen,projection,print" rel="stylesheet" type="text/css" >
	<link href="<?php echo base_url() ?>css/gallery.css" media="screen,projection,print" rel="stylesheet" type="text/css" >
	
	<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.js"></script>
	<?php switch($jenis){
		case "Galeri";
			echo "<script type=\"text/javascript\" src=\"".base_url()."js/gallery.js\"></script> ";
			break;
		}
?>
</head>

<body>
<div id="head" class="clearfloat">
	
	</div>
	<div id="navbar" class="clearfloat">
		<ul id="page-bar" class="left clearfloat">
        <li></li>
        <li></li>
      		<li> <?php echo anchor('cartikel', 'Daftar Artikel'); ?> </li>
            <li></li>
		</ul>
	</div>
</div>
<div id="page" class="clearfloat">
	<div id="top" class="clearfloat">
		<div id="headline"> <p> <?php include "menu.php"; ?> </p> </div>
		<div id="featured">
    		<h3>Tutorial Terbaru</h3>
    		
				<?php foreach($daftarartikel->result() as $row): ?>
    			<table><tr valign="top"><td>&bull; </td><td><font size=2><?php echo anchor('cartikel/view/'.$row->id, $row->judul); ?>
    			</font></td></tr></table>
    			<?php endforeach; ?>
    	  	
    	</div>
    </div>
</div>
<div id="footer">
</div>
</body>
</html>
