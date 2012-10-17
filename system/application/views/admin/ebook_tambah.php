<h1>Tambah Data Ebook</h1>
<?php
$isi = array(
              'name'        => 'isi',
			  'rows'		=> '10',
			  'cols'		=> '50'
            );
$tipe= array(
              'name'        => 'tipe',
			  'value'		=> 'berita',
			  'rows'		=> '10',
			  'cols'		=> '50'
            );


$this->load->helper('form');
echo form_open_multipart('admin/ebook/tambahberita');
echo "<p>";
echo form_label('Judul')."<br>".form_input('judul');
echo "<br>";
echo form_label('isi')."<br>".form_textarea($isi);
echo "<br>";
echo form_label('Unggah File')."<br>".form_upload('gambar');
echo "<br>";
echo form_hidden('tipe','berita');
echo "<br>";
echo form_submit('kirim','Simpan');
form_close();
echo "</p>";
?>