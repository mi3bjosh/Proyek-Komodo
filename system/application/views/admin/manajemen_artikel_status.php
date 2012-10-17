<h1>Status Artikel</h1>
<table width=100% class="bordered">
<tr bgcolor=#999999>
	<th width="10"> No </th>
	<th> Judul </th>
	<th> Status </th>
	<th colspan="2"> Aksi </th>
</tr>
<?php
$i = 1;
foreach($hasil->result() as $row) :
?>

<tr>
	<td> <?php echo $i; ?> </td>
	<td> <?php echo $row->judul; ?> </td>
	<td> <?php if($row->status=="1"){
	echo "Tampil";
	}else{
	echo "Belum Layak";
	}?> </td>
	<td> <?php echo anchor('admin/tutorial/update_status/'.$row->id, 'Tampil'); ?> </td>
	<td> <?php echo anchor('admin/tutorial/update_status2/'.$row->id, 'Tidak Tampil'); ?> </td>
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
<br>
<a href="<?php echo site_url();?>/admin/tutorial"><input type="button" value="Back" /></a>
</center>
