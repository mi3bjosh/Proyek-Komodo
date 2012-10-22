<h1>Modul Tutorial</h1>
<table width=100% class="zebra">
<tr bgcolor=#999999>
	<th width="10" class="td"> No </th>
	<th class="td"> Judul </th>
	<th class="td"> Tanggal </th>
</tr>
<?php
$i = 1;
foreach($hasil->result() as $row) :
?>

<tr>
	<td> <?php echo $i; ?> </td>
	<td> <?php echo $row->judul; ?> </td>
	<td> <?php echo $row->tgl; ?> </td>
	<td> <?php echo anchor('dosen/tutorial/edit_tutorial/'.$row->id, 'Edit'); ?> </td>
	<td> <?php echo anchor('dosen/tutorial/delete_tutorial/'.$row->id, 'Hapus'); ?> </td>

</tr>
<?php 
$i++;
endforeach;

?>
</table>
<br>
<center>
<?php
	echo $this->pagination->create_links();
?>
</center>
<br><br>
<p><?php echo anchor('dosen/tutorial/tambah_artikel', 'Tambah Artikel'); ?></p>