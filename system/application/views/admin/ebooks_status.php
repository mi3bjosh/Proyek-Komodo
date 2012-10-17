<h1>Status Artikel</h1>
<table width=100% class="bordered">
<tr bgcolor=#999999>
	<th width="10">No</th>
	<th>Judul</th>
	<th>Status</th>
	<th colspan="2">Aksi</th>
</tr>
<?php
//$i = 1;
foreach($hasil->result() as $row) :
?>

<tr>
	<td> <?php echo $row->idebook; ?> </td>
	<td> <?php echo $row->judul; ?> </td>
	<td> <?php if($row->status==1){
	echo "Tampil";
	}else{
	echo "Tidak Tampil";
	}?> </td>
	<td> <?php echo anchor('admin/ebooks/update_status/'.$row->idebook, 'Tampil'); ?> </td>
	<td> <?php echo anchor('admin/ebooks/update_status2/'.$row->idebook, 'Tidak Tampil'); ?> </td>
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
<br>
<a href="<?php echo site_url();?>/admin/ebooks"><input type="button" value="Back" /></a>
</center>
