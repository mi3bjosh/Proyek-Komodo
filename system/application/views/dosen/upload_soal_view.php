<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POLINEMA :: E-Learning</title>
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
            <h1><a href=# target="_parent">Halaman Dosen
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
             <li><?php echo anchor('/elearning/index','Home');?></li>
         	 <li><?php echo anchor('/elearning/awal_materi','Upl. Materi');?></li>
          	 <li><?php echo anchor('/soals/awal_soal','Upl. Soal');?></li>
             <li><?php echo anchor('/elearning/logs','Kalender');?></li>
      </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    <div id="templatemo_admin_content_top">&nbsp;</div>
    <div id="templatemo_content">
   	     <h2>Modul Soal</h2>
<table width=100%>
<?php foreach($hasil->result() as $row) : ?>
<tr>
	<td width="30"><?php echo $row->no; ?>. </td>
	<td colspan="2"><?php echo $row->pertanyaan; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td width="20">a. </td>
	<td><?php echo $row->opt1; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>b. </td>
	<td><?php echo $row->opt2; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>c. </td>
	<td><?php echo $row->opt3; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>d. </td>
	<td><?php echo $row->opt4; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="2">Jawaban : <?php echo $row->jawab; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="2">
	<a href="<?php echo base_url();?>index.php/soals/edit_soal/<?php echo $row->no; ?>">Edit<a>  |   
	<a href="<?php echo base_url();?>index.php/soals/hapus_soal/<?php echo $row->no; ?>">Hapus<a>
	</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<?php endforeach; ?>
</table>
<br>
<center>
<?php
	echo $this->pagination->create_links();
?>
</center>
<br>
<a href="<?php echo site_url();?>/soals/tambah_soal">Tambah Soal<a>
</div>    
    <div id="templatemo_content_bottom"></div>
    
	<div id="templatemo_footer">

        
        <div class="section_w240">
            
           
            
            </div>
        <div class="cleaner_h40"></div>
        
        <center>
            <p>Copyright © 2011 Subversion Creative | POLINEMA Software Developer            </p>
      </center>

	</div>
</div> 


<!-- end of wrapper -->
</body>
</html>
