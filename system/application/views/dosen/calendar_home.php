<div id="calleft">
 </div>
 <div id="calmain">
<center>
<?php 
if ($this->session->flashdata('message')){
	echo "<div class='status_box'>".$this->session->flashdata('message')."</div>";
}
?></center>
	<h2><?=$current_month_text?></h2>
	<table cellspacing="0">
		<thead>
		<tr>
			<th>Minggu</th>
			<th>Senin</th>
			<th>Selasa</th>
			<th>Rabu</th>
			<th>Kamis</th>
			<th>Jum'at</th>
			<th>Sabtu</th>
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
							echo anchor("dosen/calendar/dayevents/".$current_year."-".$current_month."-".$day,$day);
							
							//adding the eventTitle and eventContent wrapped inside <span> & <li> to <ul>
							echo '<div class="events"><ul>';
							
							foreach ($events as $key=>$event){
								if ($key == $day){
							  	foreach ($event as $single){
							  		echo '<li>'; 					
									echo anchor("dosen/calendar/edit/$single->id",'<span class="title">'.$single->eventTitle.'(by '.$single->user.')</span><span class="desc">'.$single->eventContent.'</span>');						
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
			<?php echo anchor('dosen/calendar/index/'.$previous_year,'&laquo;&laquo;', array('title'=>$previous_year_text));?>
			</th>
			<th>
			<?php echo anchor('dosen/calendar/index/'.$previous_month,'&laquo;', array('title'=>$previous_month_text));?>
			</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>
			<?php echo anchor('dosen/calendar/index/'.$next_month,'&raquo;', array('title'=>$next_month_text));?>
			</th>
			<th>
			<?php echo anchor('dosen/calendar/index/'.$next_year,'&raquo;&raquo;', array('title'=>$next_year_text));?>
			
			</th>		
		</tfoot>
	</table>
    <p><center><?php echo anchor('dosen/calendar/create', 'Tambah Event'); ?></center></p>
</div>

	
