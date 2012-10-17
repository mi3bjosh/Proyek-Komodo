<h1>Modul Ebook</h1>
<table>
<tr>
<th width="100">Judul</th>
<th width="150">Tanggal</th>
<th width="100">Tipe</th>
<th>Aksi</th>
</tr>
<?php foreach($query as $row) : ?>
<tr>
 <td><?php echo $row->judul; ?></td>
 <td><?php echo $row->tanggal; ?></td>
 <td><?php echo $row->tipe; ?></td>
 <td>
	<a href="<?php echo site_url();?>/admin/ebook/edit_ebook/<?php echo $row->id; ?>">Edit<a>  |   
	<a href="<?php echo site_url();?>/admin/ebook/hapus_ebook/<?php echo $row->id; ?>">Hapus<a>
 </td>
</tr>
<?php endforeach; ?>
</table>
<br>
<a href="<?php echo site_url();?>/admin/ebook/tambah_ebook">Tambah Ebook<a>