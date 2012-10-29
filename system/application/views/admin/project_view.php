<link href="<?php echo base_url(); ?>css/ListStyle.css" rel="stylesheet" type="text/css" />
<script>
function confirmDelete() {
    var answer = confirm("Anda Yakin Menghapus Project Yang Anda Pilih?")
    if (answer) {
		return true;
    }
    else {
		return false;
    }
}
</script>
<h1>Modul Project</h1>
<table width="100%">
<?php 
foreach($hasil as $p):?>
	<tr>
    	<td width="100">Judul</td>
        <td> : </td>
        <td><?php echo $p->JudulPW; ?></td>
    </tr>
    <tr>
    	<td>Deskripsi</td>
        <td> : </td>
        <td><?php echo $p->Deskripsi; ?></td>
    </tr>
    <tr>
    	<td>Tanggal post</td>
        <td> : </td>
        <td><?php echo 'posted at '.$p->tglpost; ?></td>
    </tr>
    <tr>
    	<td>Total unduh</td>
        <td> : </td>
        <td><?php echo $p->counter; ?></td>
    </tr>
    <tr>
    	<td>Status</td>
        <td> : </td>
        <td><?php if($p->status == 1 ){ 
				  echo "<b>Tampil</b>";
			  }else{
				  echo "<b>Tidak Tampil</b>";
			  }
	    	?> <-
            <?php echo anchor('admin/project/publish/'.$p->IdPW, 'Ubah Status'); ?> | 
            <?php echo anchor('admin/project/delete_project/'.$p->IdPW, 'Hapus'), "onClick = 'return confirmDelete()'"); ?>
		</td>
    </tr>
  	<tr>
    	<td colspan="3">-------------------------------------------------------------------------------------------------------------------------------</td>
  	</tr>
<?php
endforeach;
?>
</table>
<br>
<center>
<?php
echo $this->pagination->create_links();
?>
</center>