<?php
foreach($ambilisi->result() as $row) {
	$gambar = $row->gambar;
	echo "<b>$row->judul </b> <br><br>";
	if ($gambar!=''){
	?>
	<div class="image">
	<img src="<?php echo base_url();?>/system/artikel/<?php echo $gambar;?>">
	</div>
	<?php
	}
	
	echo $row->isi;
	
}
?>
<br><br><a href=javascript:history.go(-1)> Kembali </a><p>&nbsp;</p>