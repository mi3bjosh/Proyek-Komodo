<h1>Materi Terhapus</h1>
<?php 
$flashmessage=$this->session->flashdata('message');
echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
?>
<table>
	<tr>
    	<th width="25">No</th>
        <th width="100">Judul</th>
        <th width="150">Deskripsi</th>
        <th width="85">Pengunggah</th>
        <th width="150">Tanggal</th>
        <th width="70">Aksi</th>
    </tr>
    <?php
	$c=0;
	
	foreach($data_arsip->result() as $row){
		$mid = $row->mid;
		?>
        <tr>
        	<td><?php echo $c=$c+1; ?></td>
            <td><?php echo $row->mjudul; ?></td>
            <td><?php echo $row->mdesc; ?></td>
            <td><?php echo $row->mauthor; ?></td>
            <td><?php echo $row->mdate ?></td>
            <td>
				<?php echo anchor('admin/arsipmateri/untrash/'.$mid,'Kembalikan',array('class'=> 'delete','onclick'=>"return confirm('Anda yakin?')")); ?>
            </td>
        </tr>
        <?php	
	}
	?>
</table>