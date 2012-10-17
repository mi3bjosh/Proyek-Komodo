<div align="center">
<?php $this->load->helper('form'); ?>
 
<?php echo form_open('soal/viewKategori'); ?><style type="text/css">
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
 
    <h1>KATEGORI</h1>
    <p>Kategori
	<?php echo form_input('kategori'); ?></p>
<p>
        <?php echo form_submit('submit', 'INPUT'); ?>
        <a href="<?php echo site_url(); ?>/soal/"><input type="button" name="button" id="button" value="HOME" />
        </a>
    </p>
	
	<table>
		<tr><td colspan="2">
	--------------------------------- :: Data :: ---------------------------------</td>
	</tr>
	<?php if (isset($kategori)): foreach ($kategori as $p): ?>
	<tr>  
    <td width="300"><?php echo $p['namaKatLS']; ?> </td>
	<td><a href="<?php echo site_url();?>/soal/updateKat/<?php echo $p['idKatLS']; ?>">Edit<a> |
	<a href="<?php echo site_url();?>/soal/deleteKat/<?php echo $p['idKatLS']; ?>">Delete<a></td>
	</tr>
      <?php endforeach; else: ?>
    </table>
    <h3>No soal found</h3>
    <?php endif; ?>
	
<?php echo form_close(); ?>
</div>
