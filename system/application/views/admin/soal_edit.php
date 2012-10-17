<h1>Edit Data Soal</h1>
<?php echo form_open_multipart('admin/soals/update');
foreach($query as $row) :
$no = $row->no;
$pertanyaan = $row->pertanyaan;
$opt1 =  $row->opt1;
$opt2 =  $row->opt2;
$opt3 =  $row->opt3;
$opt4 =  $row->opt4;
$jawab = $row->jawab;		
?>
<table>
<tr>
	<td>Pertanyaan</td>
	<td> : </td>
	<td><input type="text" name="pertanyaan" size="80" value="<?php echo $pertanyaan; ?>"></td>
</tr>
<tr>
	<td>Opsi 1</td>
	<td> : </td>
	<td><input type="text" name="opt1" size="40" value="<?php echo $opt1; ?>"></td>
</tr>
<tr>
	<td>Opsi 2</td>
	<td> : </td>
	<td><input type="text" name="opt2" size="40" value="<?php echo $opt2; ?>"></td>
</tr>
<tr>
	<td>Opsi 3</td>
	<td> : </td>
	<td><input type="text" name="opt3" size="40" value="<?php echo $opt3; ?>"></td>
</tr>
<tr>
	<td>Opsi 4</td>
	<td> : </td>
	<td><input type="text" name="opt4" size="40" value="<?php echo $opt4; ?>"></td>
</tr>
<tr>
	<td>Jawaban</td>
	<td> : </td>
	<td><input type="text" name="jawab" size="20" value="<?php echo $jawab; ?>"></td>
</tr>
<tr height="50">
	<td colspan="2"><input type="hidden" name="no" value="<?php echo $no; ?>"></td>
	<td><?php echo form_submit('submit', 'Update'); ?>
		<a href="<?php echo site_url();?>/admin/soals">
		<input type="button" value="Cancel" /></a>
	</td>
</tr>

</table>
<?php echo form_close(); 
endforeach; ?>