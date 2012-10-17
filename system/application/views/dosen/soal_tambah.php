<h1>Tambah Data Soal</h1>
<?php echo form_open_multipart('dosen/soals/tambah_soal'); ?>
<table>
<tr>
	<td>Pertanyaan</td>
	<td> : </td>
	<td><input type="text" name="pertanyaan" size="80"></td>
</tr>
<tr>
	<td>Opsi 1</td>
	<td> : </td>
	<td><input type="text" name="opt1" size="40"></td>
</tr>
<tr>
	<td>Opsi 2</td>
	<td> : </td>
	<td><input type="text" name="opt2" size="40"></td>
</tr>
<tr>
	<td>Opsi 3</td>
	<td> : </td>
	<td><input type="text" name="opt3" size="40"></td>
</tr>
<tr>
	<td>Opsi 4</td>
	<td> : </td>
	<td><input type="text" name="opt4" size="40"></td>
</tr>
<tr>
	<td>Jawaban</td>
	<td> : </td>
	<td><input type="text" name="jawab" size="20"></td>
</tr>
<tr height="50">
	<td colspan="2">&nbsp;</td>
	<td><?php echo form_submit('submit', 'Submit'); ?> 
		<a href="<?php echo site_url();?>/dosen/soals">
		<input type="button" value="Cancel" /></a>
	</td>
</tr>
</table>
<?php echo form_close(); ?>