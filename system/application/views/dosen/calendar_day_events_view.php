<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POLINEMA :: E-Learning [Admin Area]</title>
<link href="<?php echo base_url();?>css/calendar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/calstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/demo.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/slide.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/anythingslider.css">
<script language="javascript" src="<?php echo base_url();?>js/jquery-1.5.2.js"></script>
<script src="<?php echo base_url();?>js/navDock_1.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery.anythingslider.js"></script>
<script src="<?php echo base_url();?>js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script src="<?= base_url();?>js/coda.js" type="text/javascript"> </script>
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
            <h1><a href=# target="_parent">
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
             <li><?php echo anchor('dosen/home/dosen_area', 'Home'); ?></li>
			<li ><?php echo anchor('dosen/tutorial', 'Upl.Tutorial'); ?></li>
			<li><?php echo anchor('dosen/soals', 'Upl.Soal'); ?></li>
          <li><?php echo anchor('dosen/calendar', 'Kalender'); ?></li>
      </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    
    
    <div id="templatemo_admin_content_top">&nbsp;</div>
    <div id="templatemo_content">
    
        <div class="section_w940">
			<div id="isian">
            <center>
  <?php 
  // print_r ($dayevents);
  	foreach ($dayevents as $dayevent){
  		echo "<div class=\"dayevents\">";
  		echo "<h3>Tanggal Event : </h3>";
		echo "<br />\n";
		echo $dayevent['eventDate'];
  		echo "<br />\n";
		echo "<br />\n";
  		echo "<h3>Judul Event : </h3>";
		echo "<br />\n";
		echo $dayevent['eventTitle'];
  		echo "<br />\n";
		echo "<br />\n";
  		echo "<h3>Keterangan Event : </h3>";
		echo "<br />\n";
		echo $dayevent['eventContent'];
		echo "<br />\n";
		echo "<br />\n";
		echo "</div>";
		echo anchor('dosen/calendar/edit/'.$dayevent['id'], 'Edit');
		echo " | ";
		echo anchor("dosen/calendar/delete/".$dayevent['id'],'Hapus');
		echo "<br><br>";
  		
		//echo anchor('dosen/calendar/edit/'.$dayevent->id);
		//echo $dayevent['id'];
		//echo site_url('dosen/calendar/edit/'.$event[0]['id'],'EDIT');
  	}
  ?>
  </center>
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
</html>