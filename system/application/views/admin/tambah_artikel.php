<h1>Tambah Data Artikel</h1>
<?php echo $xinha_java; ?>
<?php echo form_open_multipart('admin/tutorial/tambah_artikel'); ?>
<table>
<tr>
	<td class="td"> Judul </td>
	<td class="td"> : </td>
	<?php
		$input = array(
			'name' => 'judul',
			'id' => 'judul',
			'size' => '84',
		);
	?>
	<td> <?php echo form_input($input); ?> </td>
</tr>
<tr valign="top">
	<td class="td"> Isi </td>
	<td class="td"> : </td>
	<td> 
		<?php
		$textarea = array(
			'name' => 'isi',
			'id' => 'isi',
			'cols' => '65',
			'rows' => '20',
		);
		echo form_textarea($textarea);
		?>
 </td>
</tr>
<tr>
	<td class="td"> Gambar </td>
	<td class="td"> : </td>
	<td><?php echo form_upload('userfile'); ?> </td>
</tr>
<tr height="50">
	<td colspan="2">&nbsp;</td>
	<td><?php echo form_submit('submit', 'Submit', 'id="submit"'); ?> 
		<a href="<?php echo site_url();?>/admin/tutorial">
		<input type="button" value="Cancel" /></a>
	</td>
</tr>
</table>
<?php echo form_close(); ?>