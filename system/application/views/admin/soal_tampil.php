<h1>Modul Soal</h1>
<table width=100%>
<?php foreach($hasil->result() as $row) : ?>
<tr>
	<td width="30"><?php echo $row->no; ?>. </td>
	<td colspan="2"><?php echo $row->pertanyaan; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td width="20">a. </td>
	<td><?php echo $row->opt1; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>b. </td>
	<td><?php echo $row->opt2; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>c. </td>
	<td><?php echo $row->opt3; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>d. </td>
	<td><?php echo $row->opt4; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="2">Jawaban : <?php echo $row->jawab; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="2">
	<a href="<?php echo site_url();?>/admin/soals/edit_soal/<?php echo $row->no; ?>">Edit<a>  |   
	<a href="<?php echo site_url();?>/admin/soals/hapus_soal/<?php echo $row->no; ?>">Hapus<a>
	</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<?php endforeach; ?>
</table>
<br>
<center>
<?php
	echo $this->pagination->create_links();
?>
</center>
<br>
<a href="<?php echo site_url();?>/admin/soals/tambah_soal">Tambah Soal<a>