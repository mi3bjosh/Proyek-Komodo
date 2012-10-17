<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POLINEMA :: E-Learning</title>
<script type="text/javascript" src="<?= base_url();?>js/jquery-1.3.min.js"></script>
<script src="<?= base_url();?>js/coda.js" type="text/javascript"> </script>
<link rel="stylesheet" href="<?= base_url();?>css/style.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="<?= base_url();?>css/master.css" type="text/css" media="screen" charset="utf-8" />
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
        <div id="isian" style="height:600px; border:none; width:100%;">
          <div id="calleft">
 </div>
 <div id="calmain">

<?php 
if ($this->session->flashdata('message')){
	echo "<div class='status_box' >".$this->session->flashdata('message')."</div>";
}
?>
	<h2 style="text-align:center"><?=$current_month_text?></h2>
	<table cellspacing="0">
		<thead>
		<tr>
			<th>Sun</th>
			<th>Mon</th>
			<th>Tue</th>
			<th>Wed</th>
			<th>Thu</th>
			<th>Fri</th>
			<th>Sat</th>
		</tr>
		</thead>
		<tr>
			<?php
			for($i=0; $i< $total_rows; $i++)
			{
				for($j=0; $j<7;$j++)
				{
					$day++;					
					
					if($day>0 && $day<=$total_days_of_current_month)
					{
						//YYYY-MM-DD date format
						$date_form = "$current_year/$current_month/$day";
						
						echo '<td';
						
						//check if the date is today
						if($date_form == $today)
						{
							echo ' id="today"';
						}
						
						//check if any event stored for the date
						if(array_key_exists($day,$events))
						{
							//adding the date_has_event class to the <td> and close it
							echo ' class="date_has_event"> ';
							echo anchor("calendar/dayevents/".$current_year."-".$current_month."-".$day,$day);
							
							//adding the eventTitle and eventContent wrapped inside <span> & <li> to <ul>
							echo '<div class="events"><ul>';
							
							foreach ($events as $key=>$event){
								if ($key == $day){
							  	foreach ($event as $single){
							  		echo '<li>'; 					
									echo anchor("calendar/edit/$single->id",'<span class="title">'.$single->eventTitle.'(by '.$single->user.')</span><span class="desc">'.$single->eventContent.'</span>');						
									echo '</li>'; 
  								} // end of for each $event
								}
  								
							} // end of foreach $events
							
							
							echo '</ul></div>';
						} // end of if(array_key_exists...)
					
						else 
						{
							//if there is not event on that date then just close the <td> tag
							echo '> '.$day;
						}
						echo "</td>";
					}
					else 
					{
						//showing empty cells in the first and last row
						echo '<td class="padding">&nbsp;</td>';
					}
				}
				echo "</tr><tr>";
			}
			
			?>
		</tr>
		<tfoot>		
			<th>
			<?php echo anchor('elearning/logs/'.$previous_year,'&laquo;&laquo;', array('title'=>$previous_year_text));?>
			</th>
			<th>
			<?php echo anchor('elearning/logs/'.$previous_month,'&laquo;', array('title'=>$previous_month_text));?>
			</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>
			<?php echo anchor('elearning/logs/'.$next_month,'&raquo;', array('title'=>$next_month_text));?>
			</th>
			<th>
			<?php echo anchor('elearning/logs/'.$next_year,'&raquo;&raquo;', array('title'=>$next_year_text));?>
			
			</th>		
		</tfoot>
	</table>
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
</html>
