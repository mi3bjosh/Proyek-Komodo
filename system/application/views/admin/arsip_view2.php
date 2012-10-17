<h1>Modul Materi</h1>
<?php 
$flashmessage=$this->session->flashdata('message');
echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p><br>': '';
?>

<?php
if(isset($data_arsip))
{
	?>
	<p><h3>Mata Kuliah : <?php echo $mata_kuliah; ?>, Kategori : <?php echo $kategori;?></h3></p><br>
<table border="0" cellpadding="5" class="bordered">
	<tr>
    	<th>No</th>
        <th>Judul</th>
        <th>Tipe</th>
        <th>Deskripsi</th>
        <th>Pengunggah</th>
        <th>Aksi</th>
    </tr>
    <?php
	$c=0;
	
	foreach($data_arsip->result() as $row){
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
            <td><?php echo $row->mauthor; ?></td>
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
					echo anchor('admin/arsipmateri/publish_back/'.$mid,$pub); ?> | <br>
				<?php echo anchor('../'.$row->mpath,'Unduh'); ?> | 
				<?php echo anchor('admin/arsipmateri/edit_back/'.$mid,'Edit'); ?> | 
				<?php echo anchor('admin/arsipmateri/hapus_back/'.$mid,'Hapus',array('class'=> 'delete','onclick'=>"return confirm('Anda yakin?')")); ?>
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
<?php 
echo anchor("admin/arsipmateri","View All Data")." | ".anchor("admin/arsipmateri/tampilMk","Pilih Mata Kuliah")." | ".anchor("admin/arsipmateri/tampilKategori","Pilih Kategori")." | ".anchor("admin/arsipmateri/tambah_back","Tambah Data")." | ".anchor("admin/arsipmateri/tampildata","Restore Data")." | ".anchor("admin/arsipmateri/trash","Recycle Bin")."<br>";
} ?>