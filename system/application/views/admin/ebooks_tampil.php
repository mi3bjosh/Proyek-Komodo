<script>
function confirmDelete() {
    var answer = confirm("Anda Yakin Menghapus Ebook Yang Anda Pilih?")
    if (answer) {
		return true;
    }
    else {
		return false;
    }
}
</script>
<h1>Modul Tutorial</h1>
<table width=100%  class="bordered">
<tr bgcolor=#999999>
	<th width="10" class="td"> No </th>
	<th class="td"> Judul </th>
	<th class="td"> Tanggal </th>
	<th class="td" colspan="2"> Aksi </th>
</tr>
<?php
//$i = 1;
foreach($hasil->result() as $row) :
?>

<tr>
	<td> <?php echo $row->idebook; ?> </td>
	<td> <?php echo $row->judul; ?> </td>
	<td> <?php echo $row->tgl; ?> </td>
	<td> <?php echo anchor('admin/ebooks/edit_ebooks/'.$row->idebook, 'Edit'); ?> </td>
	<td> <?php echo anchor('admin/ebooks/delete_ebooks/'.$row->idebook, 'Hapus', "onclick = 'return confirmDelete()'"); ?> </td>
</tr>
<?php 
//$i++;
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
<p><?php echo anchor('admin/ebooks/tambah_ebooks', 'Tambah Ebook'); ?> | 
   <?php echo anchor('admin/ebooks/ebooks_status', 'Status Ebook'); ?></p>