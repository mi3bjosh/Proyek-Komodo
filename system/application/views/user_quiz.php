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
            <h1><a href="http://www.templatemo.com" target="_parent">LOGO
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
            <li></li>
          <li><a href="#" target="_parent">Project</a></li>
          <li><a href="#" target="_parent">Tutorial</a></li>
            <li><a href="#" target="_parent">Forum</a></li>
            <li><a href="<?=base_url();?>index.php/latihan_soal/mulaiQuiz">Latihan Soal</a></li>
          <li><a href="#">Contact</a></li>
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
   	    <img src="images/Polinema.png"  /> </div></div>
        
  </div> <!-- end of templatemo_banner -->
    
    <div id="templatemo_content_top"></div>
    <div id="templatemo_content">
    
        <div class="section_w940">
        <div id="isian">
          <p>
          <h1>Content Title</h1></p>
          <div align="justify" style="padding-right:20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue ante vel felis ultricies ut porta nisl gravida. Nam arcu orci, varius at aliquet in, varius id orci. Sed enim ligula, accumsan ac lobortis in, dignissim ac lacus. Nullam ut mi at diam interdum mollis ac in neque. Cras a turpis purus, vel imperdiet tellus. Mauris euismod leo vitae massa porta id eleifend velit porttitor. Pellentesque rutrum dui ac purus dapibus gravida. Nulla tincidunt auctor tellus quis volutpat. Sed velit mi, fermentum ultrices lobortis tristique, tincidunt at sapien. Duis gravida commodo mauris, sit amet mattis magna feugiat ultrices. Vestibulum in lacus turpis, nec feugiat metus. Nulla non elit non lectus gravida ultricies in a augue. Mauris nec erat id augue rutrum porttitor. Fusce posuere sem in nisl rutrum non venenatis metus vulputate. Pellentesque commodo auctor felis, in pellentesque orci posuere et. Morbi pharetra rhoncus lacus porta iaculis. Nulla volutpat porta purus, non iaculis nisl luctus ac. Aliquam mi tellus, iaculis feugiat tristique non, auctor vel nisi. Nunc sed erat mauris, ut placerat nulla. In porta nunc eget ipsum pellentesque congue. Morbi luctus mattis nulla at auctor. Donec et rutrum quam. Aenean arcu diam, laoreet ac pulvinar ut, blandit a tellus. Nulla facilisi. Suspendisse ultrices convallis luctus. Nam faucibus laoreet justo et vestibulum.  
          </div>
          <p align="justify">&nbsp;</p>
          </div>
          <div class="box">
                <h2>Login Here</h2>
            <div class="box_image_wrapper"></div>
            <div id="left_content">
              <form action="" method="post" id="form_login">
                <input name="username"  class="text" type="text" value="Username"    title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input name="Password" class="text" type="password" value="Password"    title="searchfield" onfocus="clearText(this)" onblur="clearText(this)"  />
                <input name="Login" type="submit" value="Login" class="bt" />
              </form>
            </div>
                 <div id="left_content">
                 <?php include('com/calender.php');?>
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