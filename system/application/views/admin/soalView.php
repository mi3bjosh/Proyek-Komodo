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
		<h1>Modul Latihan Soal</h1>
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
<br>
    <h2>DATA SOAL    </h2>
    <h1>
      <?php $no=1; ?>
      <?php 
	  if (isset($soal)): foreach ($soal as $p): ?>
    </h1>
    <table width="800" border="0">
      <tr>
        <td width="28" valign="top"><?php echo $no; ?>.</td>
        <td width="762"><?php $no++; ?>
        Kategori : <?php echo $p['namaKatLS']; ?> <br />
        Soal : <?php echo $p['soal']; ?> <br />
        <?php 
		$counter=0;
		for($j=1;$j<=($end+$val);$j++){
		if($p['poin'.$j]>0){
		$counter++;	
		}
		}
        for($i=1;$i<=($end+$val);$i++){
            //echo $counter;
            if($counter>1){
            $temp="<input type='checkbox' name='checkbox".$no.$i."' checked='checked'/>";
            $temp2="<input type='checkbox' name='checkbox".$no.$i."'/>";
            }else{
			$temp="<input type='radio' name='radio' value='radio' checked='checked'/>";
            $temp2="<input type='radio' name='radio' value='radio'/>";
            }
            if($p['poin'.$i]>0){
            echo $temp;
            }else{
            echo $temp2;
            }  
            echo $p['opsi'.$i]; ?> &nbsp; <font color="red">[Poin <?php echo ' : '.$p['poin'.$i]; ?>] </font><br />
        	<?php 
			}
			echo "Diposting oleh : ".$p['namaUser']."  <i><font color='red'>";
			echo $p['tanggal'];
			?>
            </font>
            </i>
            </br>
        <a href="<?php echo site_url();?>/admin/soal/updateSoal/<?php echo $p['idLatSoal']; ?>">Edit</a>|<a href="<?php echo site_url();?>/admin/soal/deleteSoal/<?php echo $p['idLatSoal']; ?>">Delete</a></td>
        <br />
              </tr>
</table>
	<?php endforeach; else: ?>
<h3>No soal found</h3>
	<p>
	  <?php endif; ?>
    </p>
	<br>
	<p>
    <a href="<?php echo site_url();?>/admin/soal/inputSoal/">
	  <input type="button" name="Button" id="submit" value="INPUT" /></a>
        <a href="<?php echo site_url(); ?>/admin/soal/"><input type="button" name="button" id="button" value="HOME" />
        </a>
	</p>
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