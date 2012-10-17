<h1>Modul Materi</h1>
<?php 
$flashmessage=$this->session->flashdata('message');
echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
?>

<?php
//form kategori
if (isset($warn)){
	echo "Tidak ada kategori yang terpilih.<br><br>";
	}
if (isset($data_kategori))
{
	echo "Pilih Kategori: <br>";
	echo form_open('admin/arsipmateri/tampildata');
	$options[0] = "--Pilih Kategori--";
	foreach ($data_kategori->result() as $row1){
		$options[$row1->catid] = $row1->catname;
	}
	echo form_dropdown('cat',$options);
	echo form_submit('mycat', 'Go!');
	echo form_close();
	echo "<br>";
	echo anchor("admin/arsipmateri","Kembali");
} ?>