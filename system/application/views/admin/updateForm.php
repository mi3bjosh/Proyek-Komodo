<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POLINEMA :: E-Learning [Admin Area]</title>
<link href="<?php echo base_url();?>css/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/demo.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/slide.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/anythingslider.css">
<script language="javascript" src="<?php echo base_url();?>js/jquery-1.5.2.js"></script>
<script src="<?php echo base_url();?>js/navDock_1.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.anythingslider.js"></script>
<script src="<?php echo base_url();?>js/jquery.easing.1.2.js"></script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
$(document).ready(function(){
 $('#pol_logo').hide().fadeIn(2000,call);
 function call(){
	setTimeout(function() {
					
				$( "#pol_logo" ).fadeOut(1000,balik);
			},2000);
	};
	function balik(){
				$( "#pol_logo" ).fadeIn(1000,call);
	};
	
	$('#navDemo02').navDocks({speed:300, activeMenu:true});
});
$(function(){
			$('.slider_new').anythingSlider({ autoPlay:true,resizeContents      : false});
		});
</script>
</head>
<body>
<div id="templatemo_wrapper">	
    <div id="templatemo_site_title_bar">
  
        <div id="site_title">
            <h1><a href=# target="_parent">Admin Page
            <!-- <span>free css templates</span> -->
            </a></h1>
            <br />
      </div>
            
        <ul class="social_network">
            <li></li>
            <li></li>	
            <li></li>
      </ul>
            
    </div> <!-- end of templatemo_site_title_bar -->
    
    <div id="templatemo_menu">
    
        <ul>
             <li><?php echo anchor('admin/home/admin_area', 'Home'); ?></li>
          <li><?php echo anchor('admin/arsipmateri', 'Materi'); ?></li>
            <li><?php echo anchor('admin/ebook', 'Ebook'); ?></li>
			<li><?php echo anchor('admin/tutorial', 'Tutorial'); ?></li>
			<li><?php echo anchor('admin/soal', 'Soal'); ?></li>
          <li><a href="#" target="_parent">Log</a></li>
      </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    
    
    <div id="templatemo_admin_content_top">&nbsp;</div>
    <div id="templatemo_content">
    
        <div class="section_w940">
        <div id="isian">
		<h1>Edit Data Latihan Soal</h1>
<?php $this->load->helper('form'); ?>
<style type="text/css">
<!--
body,td,th {
	font-family: Calibri;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
 
<?php echo form_open('admin/soal/updateSoal/'.$id); ?>
<?php foreach ($update as $s): ?>
<h1>PENGATURAN SOAL       </h1>
<table border="0">
  <tr>
    <td><div align="right">Soal :</div></td>
    <td colspan="2"><textarea name="soal" id="soal" cols="45" rows="2"><?php echo $s['soal']; ?></textarea></td>
  </tr>
  <tr>
    <td><div align="right">Kategori :</div></td>
    <td colspan="2">
	<select name="kategori" id="kategori">
	<?php foreach ($kategori as $k): ?>
		<?php if($s['namaKatLS']==$k['namaKatLS']){ ?>
			<option value="<?php echo $k['idKatLS']; ?>" selected="selected"><?php echo $k['namaKatLS']; ?></option>
		<?php }else{ ?>
			<option value="<?php echo $k['idKatLS']; ?>"><?php echo $k['namaKatLS']; ?></option>
		<?php } ?>
	<?php endforeach;?>
    </select>
    </td>
  </tr>
	<?php 
	echo $val;
	for($i=1;$i<=($end+$val);$i++){ ?>
  <tr>
    <td><div align="right">Opsi <?php echo $i; ?>:</div></td>
    <td><textarea name="opsi<?php echo $i; ?>" cols="45" rows="2"><?php echo $s['opsi'.$i]; ?></textarea></td>
  </tr>
  <tr>
    <td><div align="right">Poin <?php echo $i; ?>:</div></td>
    <td><input type="text" name="poin<?php echo $i; ?>" value="<?php echo $s['poin'.$i]; ?>"/></td>
  </tr>
  <?php } ?>
</table>
<input type="submit" name="submit" id="submit" value="EDIT" />
<input type="reset" name="Reset" id="button" value="RESET" />
<a href="<?php echo site_url(); ?>/admin/soal/viewSoal">
<input type="button" name="cancel" id="cancel" value="CANCEL" />
</a>
 <?php endforeach; ?>
<?php echo form_close(); ?>


	          </div>
          <div class="box">
                
            <div class="box_image_wrapper"></div>
                 <div id="left_content">
                 <?php include('com/calender.php');?>
                </div>
                
          </div>
            <div class="cleaner"></div>
        </div>

    </div>
    <div id="templatemo_content_bottom"></div>
    
	<div id="templatemo_footer">

        
        <div class="section_w240">
            
           
            
            </div>
        <div class="cleaner_h40"></div>
        
        <center>
            Copyright © 2011 Subversion Creative | POLINEMA Software Developer
      </center>

	</div>
</div> 