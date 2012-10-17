<h1>Edit Data Materi</h1>
	<?php echo form_open('admin/arsipmateri/update_back'); ?>
	<table>
	<tr>
		<td><label for="nis">Judul Materi</label></td>
		<td>:</td>
		<td><input type="text" name="mjudul" size="30" value="<?php echo $ar['mjudul']; ?>" /></td>
	</tr>
	<tr>
		<td><label for="nis">Deskripsi</label></td>
		<td>:</td>
		<td><textarea cols=30 rows=5 name="mdesc"/><?php echo $ar['mdesc']; ?></textarea></td>
	</tr>
    <tr>
		<td><label for="nis">File</label></td>
		<td>:</td>
		<td><input type="text" name="mpath" size="30" value="<?php echo $ar['mpath']; ?>" /></td>
	</tr>
    <tr>
		<td><label for="nis">Kategori</label></td>
		<td>:</td>
		<td><input type="text" name="mcatid" size="30" value="<?php echo $ar['mcatid']; ?>" /></td>
	</tr>
    <tr>
		<td><label for="nis">Tanggal</label></td>
		<td>:</td>
		<td><input type="text" name="mdate" size="30" value="<?php echo $ar['mdate']; ?>" /></td>
	</tr>
    <tr>
		<td><label for="nis">Pengunggah</label></td>
		<td>:</td>
		<td><input type="text" name="mauthor" size="30" value="<?php echo $ar['mauthor']; ?>" /></td>
	</tr>
    <tr>
		<td><label for="nis">Hapus</label></td>
		<td>:</td>
		<td><input type="text" name="m_isdel" size="30" value="<?php echo $ar['m_isdel']; ?>" /></td>
	</tr>
    <tr>
		<td><label for="nis">Kode Publikasi</label></td>
		<td>:</td>
		<td><input type="text" name="m_ispub" size="30" value="<?php echo $ar['m_ispub']; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="hidden" name="id_gb" size="30" value="<?php echo $ar['mid']; ?>" /></td>
		<td><input type="button" onClick="history.go(-1)" value=" Batal " />
        <input type="submit" name="submit" id="submit" value=" Perbarui " /></td>
	</tr>
	<?php echo form_close(); ?>
</table>