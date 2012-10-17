<div align="center">
<?php $this->load->helper('form'); ?>
 
<?php echo form_open('soal/updateKat/'.$id); ?><style type="text/css">
<!--
body,td,th {
	font-family: Calibri;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
 <?php foreach ($update as $s): ?>
    <h1>EDIT KATEGORI</h1>
    <p>Kategori
	<input type="text" name="kategori" value="<?php echo $s['namaKatLS']; ?>"/>
<p>
<?php endforeach; ?>
        <?php echo form_submit('submit', 'EDIT'); ?>
        <input type="reset" name="Reset" id="button" value="RESET" />
		<a href="<?php echo site_url(); ?>/soal/viewKategori">
		<input type="button" name="cancel" id="cancel" value="CANCEL" />
  </a>    </p> 
<?php echo form_close(); ?>
</div>