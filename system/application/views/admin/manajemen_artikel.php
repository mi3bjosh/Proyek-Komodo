<h1>Modul Tutorial</h1>
<table width=100% class="bordered">
<tr bgcolor=#999999>
	<th width="10" class="td"> No </th>
	<th class="td"> Judul </th>
	<th class="td"> Tanggal </th>
	<th class="td" colspan="2"> Aksi </th>
</tr>
<?php
$i = 1;
foreach($hasil->result() as $row) :
?>

<tr>
	<td> <?php echo $i; ?> </td>
	<td> <?php echo $row->judul; ?> </td>
	<td> <?php echo $row->tgl; ?> </td>
	<td> <?php echo anchor('admin/tutorial/edit_manajemen_artikel/'.$row->id, 'Edit'); ?> </td>
	<td> <?php echo anchor('admin/tutorial/delete_manajemen_artikel/'.$row->id, 'Hapus'); ?> </td>
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
<p><?php echo anchor('admin/tutorial/tambah_artikel', 'Tambah Artikel'); ?> | 
   <?php echo anchor('admin/tutorial/artikel_status', 'Status Artikel'); ?></p>