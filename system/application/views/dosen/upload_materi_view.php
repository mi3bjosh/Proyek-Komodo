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
        <div class="section_w940">
        <div id="isian">
          <p>
          <h1>Upload Materi</h1>
          </p>
          <p align="justify" style="font-size:14x; padding:20px;">
		  	<div id="upload">
<?php echo form_open('elearning/upload_materi');?>
	<?php echo anchor('/elearning/','Kembali');?>
	<br/>
	<?php echo form_fieldset('Insert'); ?>
    <table width="306" border="0">
  <tr>
    <td width="90">Kode Materi;</td>
    <td width="16">:</td>
    <td width="186"><input type="text" id="kodeMateri" name="kodeMateri"/><?php echo form_error('kodeMateri'); ?></td>
  </tr>
  <tr>
    <td>Nama Materi</td>
    <td>:</td>
    <td><input type ="text" id="namaMateri" name="namaMateri"/> <?php echo form_error('namaMateri'); ?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><input type="submit" id="submit" name="submit" value="Submit">
	  <input type="reset" id="reset" name="reset" value="Reset"></td>
  </tr>
</table>
	  <?php echo form_fieldset_close();?>
      <?php echo form_close();?>
      <?php if(isset($materi)): foreach ($materi as $row) :?>
	  <?php echo form_fieldset('Materi'); ?>
	  <?php echo 'Kode Materi : '.$row->kodeMateri; ?><br/>
	  <?php echo 'Nama Materi : '.$row->namaMateri; ?><br/>
	  <?php echo anchor('/elearning/edit_materi/'.$row->kodeMateri,'Edit'); ?>
      <?php echo " | ";?>
	  <?php echo anchor('/elearning/remove_materi/'.$row->kodeMateri,'Delete'); ?><br/>
	  <?php echo form_fieldset_close();?>
      <?php endforeach?>
      <?php else :?>
      <?php endif; ?>
      <?php echo $pagination; ?></p>
	  	  </div>
          </div>
          <div class="box">
                
            <div class="box_image_wrapper">
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
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


<!-- end of wrapper -->
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
