<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POLINEMA :: E-Learning</title>
<link href="<?php echo base_url();?>css/user.css" rel="stylesheet" type="text/css" />
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
	
	$('#navDemo02').navDocks({speed:300, activeMenu:true,ajax:false});
});
$(function(){
			$('.slider_new').anythingSlider({ autoPlay:true,resizeContents      : false});
		});
</script>
</head>
<body>
<div id="templatemo_wrapper">	
    <div id="templatemo_site_title_bar">
      <ul class="social_network">
            <img src="<?php echo base_url(); ?>images/logo_komodo.png" />
      </ul>
    </div> <!-- end of templatemo_site_title_bar -->
    <div id="templatemo_menu">
        <ul>
          <li><?php echo anchor('elearning/project', 'Project'); ?></li>
          <li><?php echo anchor('elearning/artikel', 'Tutorial'); ?></li>
          <li><?php echo anchor('elearning/forum', 'Forum'); ?></li>
          <li><?php echo anchor('elearning/video', 'Video'); ?></li>
      </ul>    	
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_search">
    
    	<div id="search_box">
            <form action="#" method="get">
                <input type="text" value="Enter a keyword..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" />
            </form>
        </div>
    
    </div> <!-- end of search -->
    
    <div id="templatemo_banner">

	    <div id="banner_left">
        <ul class="slider_new" >
		<li >
        
        	<h2>Tutorial Login on HTML5</h2>
            <p>In this tutorial we use a plain text editor (like Notepad) to edit HTML. We believe this is the best way to learn HTML....... </p>
            <div class="cleaner_h10"></div>
            <div class="button_01"><a href="#">More</a></div>
         
        </li>
        	<li>
        
        	<h2>New Tutorials Jquery with CSS3</h2>
            <p>When a browser reads a style sheet, it will format the document according to it. There are three ways of inserting a.........</p>
            <div class="cleaner_h10"></div>
            <div class="button_01"><a href="#">More</a></div>
         
        </li>
        </ul>
           
        </div>
        
        <div id="banner_right">
        <div id="pol_logo">
   	    <img src="<?php echo base_url(); ?>images/Polinema.png"  /> </div></div>
        
  </div> <!-- end of templatemo_banner -->
    
    <div id="templatemo_content_top"></div>
    <div id="templatemo_content">
    
        <div class="section_w940">
        <div id="isian">
          <!--forum start div-->
          <style type="text/css">
			code {
				font-family: Monaco, Verdana, Sans-serif;
				font-size: 12px;
				background-color: #f9f9f9;
				border: 1px solid #D0D0D0;
				color: #002166;
				display: block;
				margin: 14px 0 14px 0;
				padding: 12px 10px 12px 10px;
			}
		  </style>

		<h1>Welcome to Shout Box!</h1>
		<p>Recent shouts</p>
		<?php 
			//$this->load->Model('shoutmodel');
    		//$data['shout']=$this->shoutmodel->getshout();
		
			foreach($shout as $shout): 
		?>
			<code> <b><?php echo $shout->name.' says -';?></b><br><?php echo $shout->shout?></code>
		<?php endforeach; ?>
		<p>The corresponding controller for this page is found at:</p>
		<code>system/application/controllers/shout.php</code>
		<p><b>Submit your own SHOUT!!</b></p>
		
        <form action="<?php echo base_url()."index.php/"; ?>shout/shout_input" method="post">
			<fieldset>

				<legend>ShoutInfo:</legend>
				Name:<input type="text" name="name" /><br>
				What to Shout?:<input type="text" name="shout" />
				Email:<input type="text" name="email" />
				<input type="submit" value="submit" name="submit" />

			</fieldset>
		</form>
		<p><br />Page rendered in {elapsed_time} seconds</p>
          <!--fourm end div-->
          </div>
          <div class="box">
                <h2>Login Here</h2>
            <div class="box_image_wrapper"></div>
                 <div id="left_content">
                 <?php include('com/calender.php');?>
                </div>
                <div id="left_content">
					Selamat Datang, <b><?php echo $this->session->userdata('firstname'); ?></b> !<br><br>
					<h3><?php echo anchor('elearning/logout', 'Logout'); ?></h3>
                </div> 
                 <div id="left_content">
                 <h2>Content Lainnya</h2>
                </div>
                
          </div>
            <div class="cleaner"></div>
        </div>

    </div>
    <div id="templatemo_content_bottom"></div>
    
	<div id="templatemo_footer">

        
        <div class="section_w240">
            
            <h3>Footer</h3>
            
            </div>
        <div class="cleaner_h40"></div>
        
        <center>
            Copyright © 2011 Subversion Creative | POLINEMA Software Developer
      </center>

	</div>
</div> 

<div class="navigation02">
<ul id="navDemo02">
<li class="navActive"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/icoSet2/home.png" alt="Home" /></a></li>
<li><a href="<?php echo base_url()."index.php/elearning/quiz"; ?>"><img src="<?php echo base_url(); ?>images/icoSet2/chat.png" alt="Quiz" /></a></li>
<li><a href="<?php echo base_url()."index.php/elearning/upload"; ?>"><img src="<?php echo base_url(); ?>images/icoSet2/upload.png" alt="Upload" /></a></li>
<li><a href="<?php echo base_url()."index.php/ebookcontroller/"; ?>"><img src="<?php echo base_url(); ?>images/icoSet2/info.png" alt="Ebook" /></a></li>
<li><a href="<?php echo base_url()."index.php/elearning/chart"; ?>"><img src="<?php echo base_url(); ?>images/icoSet2/stats.png" alt="Stats" /></a></li>
</ul>
</div>


<!-- end of wrapper -->
</body>
</html>