<center>
<?php

if ($this->session->flashdata('message')){
	echo "<div class='status_box'>".$this->session->flashdata('message')."</div>";
}

echo form_open('dosen/calendar/update');?>
	<input id="id" name="id" type="hidden" size="30" value="<?php echo $event[0]['id'] ;?>">
	<h2>Edit Event</h2>
    <table align="center">
		<tr>
			<td width="125">Tanggal</td>
            <td width="20"> : </td>
			<td><input id="date" name="date" size="30" value="<?php echo $event[0]['eventDate'] ;?>" ></td>
		</tr>
		<tr>
			<td>Judul Event</td>
            <td> : </td>
			<td><input id="eventTitle" name="eventTitle" value="<?php echo $event[0]['eventTitle'] ;?>" size="50"></td>
		</tr>
		<tr>
			<td>Keterangan Event</td>
            <td> : </td>
			<td><textarea cols="40" rows="5" name="eventContent" id="eventContent"><?php echo $event[0]['eventContent'] ;?></textarea></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $event[0]['id'] ;?>" />
		<tr>
        	<td colspan="2">&nbsp;</td>
			<td><input type="submit" value="Update Event" name="add">
            	<a href="<?php echo site_url();?>/dosen/calendar"><input type="button" value="Cancel"></a>
            </td>
		</tr>
		<tr>
			<td colspan="3">				
			</td>
		</tr>
	</table>
	
	<?php form_close() ;?>
</center>