<h1>Tambah Data Materi</h1>
<?php if (isset($error)) echo $error; ?>
    <table>
    <?php
		echo form_open_multipart('admin/arsipmateri/simpan_front');
		
		$mjudul=array(
			'name'=>'mjudul',
			'size'=>'45',
			'type'=>'text');
			
		$mpath=array(
			'name'=>'mpath',
			'size'=>'45',
			'type'=>'file');
									
		$mdesc=array(
			'name'=>'mdesc', 
			'cols'=>'35',
			'rows'=>'5');
		
		?><tr><td>Judul</td><td>:</td><td><?php echo form_input($mjudul); ?></td></tr><?php
		?><tr><td>Deskripsi</td><td>:</td><td><?php echo form_textarea($mdesc); ?></td></tr><?php
		?><tr><td>File</td><td>:</td><td><?php echo form_input($mpath); ?></td></tr><?php
		?><tr><td>Tipe</td><td>:</td><td><?php 
		$options[0] = "--Pilih Jenis File--";
		foreach ($data_tipe->result() as $row2){
			$options[$row2->tid] = $row2->tname;
		}
		echo form_dropdown('tipe',$options);
		?></td></tr><?php
		?><tr><td></td><td>&nbsp;</td><td><?php echo form_submit('submit','Simpan'); ?><?php echo form_reset('reset','Kosongkan'); ?></td></tr><?php
    	
		echo form_close();
	?>
    </table>