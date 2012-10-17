<h1>Modul Materi</h1>
<?php 
$flashmessage=$this->session->flashdata('message');
echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
?>
		
<?php
//form Mata Kuliah
echo "Pilih Mata Kuliah: <br>";
echo form_open('admin/arsipmateri/tampilKategori');
$options[0] = "--Pilih Mata Kuliah--";
foreach ($data_mk->result() as $row2){
	$options[$row2->mkid] = $row2->mkname;
}
echo form_dropdown('mk',$options);
echo form_submit('mymk', 'Go!');
echo form_close();

?>