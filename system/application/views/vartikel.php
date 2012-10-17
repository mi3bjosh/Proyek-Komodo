<?php
foreach($hasil->result() as $row) :
$isi = $row->isi;
$isi = substr($isi, 0, 480);
?>
<table>
<tr>
	<td colspan="2"> <font size="3"><b>
	<?php echo anchor('cartikel/view/'.$row->id, $row->judul); ?> | <font size="2"><?php echo $row->tgl; ?></font></td>
</tr>
<tr>
	<td> <img src="<?php echo base_url();?>system/artikel/thumbnails/<?php echo $row->gambar;?>"/> </td>
	<td valign="top"> <font size="2"><?php echo $isi; ?> .. </font></td>
</tr>
<tr>
	<td colspan="2"><hr></td>
</tr>
</table>

<?php 
endforeach;
	echo $this->pagination->create_links();

?>