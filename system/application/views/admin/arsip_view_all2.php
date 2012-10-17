<h1>Modul Materi</h1>
<?php 
$flashmessage=$this->session->flashdata('message');
echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p><br>': '';
?>

<?php
if(isset($data_arsip))
{
	?>
<table border="0"  class="bordered">
	<tr>
    	<th width="5">No</th>
        <th width="40">Judul</th>
        <th width="40">Tipe</th>
        <th width="20">Deskripsi</th>
        <th width="40">Aksi</th>
    </tr>
    <?php
	$c=0;
	
	foreach($hasil->result() as $row){
		$mid = $row->mid;
		?>
        <tr>
        	<td><?php echo $c=$c+1; ?></td>
            <td><?php echo $row->mjudul; ?></td>
            <td>
				<?php
				if ($row->tipe == 10001) $tipe = "Materi";
				elseif ($row->tipe == 10002) $tipe = "Tugas - Project";
				elseif ($row->tipe == 10004) $tipe = "Tugas - Non Project";
				
				echo $tipe;
			 	?>
            </td>
            <td><?php echo $row->mdesc; ?></td>
            <td>
            	<?php 
				if (($status == 1)||($uid == $row->mauthor))
				{
					if ($row->m_ispub == 1)
					{
						$pub = "Sembunyikan";
					}else
					{
						$pub = "Tampilkan";
					}
					echo anchor('admin/arsipmateri/publish_front/'.$mid,$pub); ?> | <br>
				<?php echo anchor('../'.$row->mpath,'Unduh'); ?> | 
				<?php echo anchor('admin/arsipmateri/edit_front/'.$mid,'Edit'); ?> | 
				<?php echo anchor('admin/arsipmateri/hapus_front/'.$mid,'Hapus',array('class'=> 'delete','onclick'=>"return confirm('Anda yakin?')")); ?>
                <?php }else{?>
                <?php echo anchor($row->mpath,'Unduh'); ?>
                <?php } ?>
            </td>
        </tr>
        <?php	
	}
	?>
</table>
<br>
<center>
<?php
	echo $this->pagination->create_links();
?>
</center>
<br>
<?php 
echo anchor("admin/arsipmateri","View All Data")." | ".anchor("admin/arsipmateri/tampilMk","Pilih Mata Kuliah")." | ".anchor("admin/arsipmateri/tampilKategori","Pilih Kategori")." | ".anchor("admin/arsipmateri/tambah_front","Tambah Data")." | ".anchor("admin/arsipmateri/tampildata","Restore Data")." | ".anchor("admin/arsipmateri/trash","Recycle Bin")."<br>";
} ?>