

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POLINEMA :: E-Learning [Admin Area]</title>
<link href="<?php echo base_url();?>css/admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/table.css" rel="stylesheet" type="text/css" />
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
             <li><?php echo anchor('admin/home/admin_area', 'Home'); ?></li>
          <li><?php echo anchor('admin/arsipmateri', 'Materi'); ?></li>
            <li><?php echo anchor('admin/ebooks', 'Ebook'); ?></li>
			<li ><?php echo anchor('admin/tutorial', 'Tutorial'); ?></li>
			<li><?php echo anchor('admin/soals', 'Soal'); ?></li>
          <li><?php echo anchor('admin/project', 'Project'); ?></li>
		  <li><?php echo anchor('admin/membership', 'Membership'); ?></li>
      </ul>    	
    
    </div> <!-- end of templatemo_menu -->
    
    
    <div id="templatemo_admin_content_top">&nbsp;</div>
    <div id="templatemo_content">
    
        <div class="section_w940">
			<div id="isian"> 
				<h1>Membership</h1>
<table>
<tr>
<th width="75">first_name</th>
<th width="75">last_name</th>
<th width="100">email_address</th>
<th width="75">username</th>
<th width="75">status</th>
<th>Aksi</th>
</tr>
<?php foreach($query->result() as $row) : ?>
<tr>
 <td><?php echo $row->first_name; ?></td>
 <td><?php echo $row->last_name; ?></td>
 <td><?php echo $row->email_address; ?></td>
  <td><?php echo $row->username; ?></td>
  <td><?php echo $row->status; ?></td>
 <td>
  
	<a href="<?php echo site_url();?>/admin/membership/delete/<?php echo $row->id; ?>">Hapus</a> |<form method="post" action="membership/update_status">
	<select name="status">
	<option>Dosen</option>
	<option>Mahasiswa</option>
	</select>
	<input type="hidden" name="id" value="<?php echo $row->id; ?>">
	<input type="submit" name="submit" value="OK">
 </td>
</tr>
<?php endforeach; ?>

</table>

			</div>
        <div class="box">  
            <div class="box_image_wrapper"></div>
                <div id="left_content">
                 <?php include('com/calender.php');?>
                </div>   
				<div id="left_content">
					Selamat Datang, <b><?php echo $this->session->userdata('firstname'); ?></b> !<br><br>
					<h3><?php echo anchor('elearning/logout', 'Logout'); ?></h3>
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
            Copyright � 2011 Subversion Creative | POLINEMA Software Developer
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
