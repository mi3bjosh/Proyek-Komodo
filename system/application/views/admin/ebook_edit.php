<h1>Edit Data Ebook</h1>
<?php
$this->load->helper('html');
$this->load->helper('form');
foreach($query as $row) :
$id = $row->id;
$judul = $row->judul;
$isi =  $row->isi;
$gambar = $row->gambar;		
$tipe = $row->tipe;	
$isidata = array(
              'name'        => 'isi',
			  'value'		=> $isi,	
			  'rows'		=> '10',
			  'cols'		=> '50'
            );
$file = array(
              'name'        => 'path',
			  'value'		=> $gambar,	
			  'disabled'	=> 'true',
			  'size'		=> '80'
            );
$tipe= array(
              'name'        => 'tipe',
			  'value'		=> 'berita',
			  'rows'		=> '10',
			  'cols'		=> '50'
            );
$image = array(
          'name' 		=> 'gambar',
		  'value'		=> $gambar,
          'width' 		=> '100',
          'height' 		=> '100',
);	

echo form_open_multipart('admin/ebook/update');
echo "<p>";
echo form_label('Judul :')."<br>".form_input('judul',$judul);
echo "<br>";
echo form_label('Isi :')."<br>".form_textarea($isidata);
echo "<br>";
echo form_label('File Path :')."<br>".form_input($file);
echo "<br>";
echo form_label('Unggah File :')."<br>";
//.form_upload('gambar',$image);
?>
<input name="gambar" type="file" src="<?php echo base_url();?><?php echo $gambar;?>" value="<?php echo $gambar;?>"/>
<?php
echo "<br>";
echo form_hidden('id',$id);
echo form_submit('kirim','Update');
form_close();
echo "</p>";
endforeach; 
?>