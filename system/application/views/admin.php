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
             <li><a href="#" target="_parent">Content</a></li>
          <li><a href="#" target="_parent">User</a></li>
            <li><a href="#" target="_parent">Report</a></li>
          <li><?php echo anchor('login/logout', 'Logout'); ?></li>
      </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    
    
    <div id="templatemo_content_top"></div>
    <div id="templatemo_content">
    
        <div class="section_w940">
        <div id="isian">
          <p>
          <h1>E-Learning Komodo</h1>
          <p><img src="../../../images/logo_admin.png" width="600" height="70" /></p>
          </p>
          <p><strong>E-learning</strong> comprises all forms of electronically supported <a href="http://en.wikipedia.org/wiki/Learning" title="Learning">learning</a> and <a href="http://en.wikipedia.org/wiki/Teaching" title="Teaching">teaching</a>. The <a href="http://en.wikipedia.org/wiki/Information_systems" title="Information systems">information</a> and <a href="http://en.wikipedia.org/wiki/Communication_systems" title="Communication systems">communication systems</a>, whether <a href="http://en.wikipedia.org/wiki/Networked_learning" title="Networked learning">networked learning</a> or not, serve as specific media to implement the learning process.<a href="http://en.wikipedia.org/wiki/E-learning#cite_note-0">[1]</a> The term will still most likely be utilized to reference out-of-classroom and in-classroom educational experiences via technology, even as advances continue in regard to devices and curriculum.</p>
          <p>E-learning is essentially the computer and network-enabled transfer of skills and knowledge. E-learning applications and processes include Web-based learning, computer-based learning, <a href="http://en.wikipedia.org/wiki/Virtual_education" title="Virtual education">virtual education</a> opportunities and digital collaboration. Content is delivered via the Internet, intranet/extranet, audio or video tape, satellite TV, and CD-ROM. It can be self-paced or instructor-led and includes media in the form of text, image, animation, streaming video and audio.</p>
          <p>Abbreviations like CBT (<em>Computer-Based Training</em>), IBT (<em>Internet-Based Training</em>) or WBT (<em>Web-Based Training</em>) have been used as synonyms to e-learning. Today one can still find these terms being used, along with variations of e-learning such as elearning, Elearning, and eLearning. The terms will be utilized throughout this article to indicate their validity under the broader terminology of E-learning.</p>
          <p style="font-size:14x;">&nbsp;</p>
          </div>
          <div class="box">
                
            <div class="box_image_wrapper"></div>
            <div id="left_content">
              
            </div>
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
