<center>
<?php 
if ($this->session->flashdata('message')){
	echo "<div class='status_box'>".$this->session->flashdata('message')."</div>";
}

echo form_open('dosen/calendar/create');?>
	<h2>Tambah Event Baru</h2>
	<table align="center">
		<tr>
			<td width="125">Tanggal</td>
            <td width="20"> : </td>
			<td><input id="date" name="date" size="30"><!--&nbsp;&nbsp;&nbsp; yyyy-mm-dd--></td>
		</tr>
		<tr>
			<td>Judul Event</td>
            <td> : </td>
			<td><input id="eventTitle" name="eventTitle" size="50"></td>
		</tr>
		<tr>
			<td>Keterangan Event</td>
            <td> : </td>
			<td><textarea cols="50" rows="5" name="eventContent" id="eventContent"></textarea></td>
		</tr>
		<tr>
        	<td colspan="2">&nbsp;</td>
			<td><input type="hidden" name="user_id" id="user_id" value="<?php // echo $user_id;?>" />
				<input type="hidden" name="user" id="nick" value="<?php // echo $user;?>" />		</td>
		</tr>
		<tr>
        	<td colspan="2">&nbsp;</td>
			<td><input type="submit" value="Submit" name="add"><input type="button" onclick="history.go(-1)" value="Cancel"></td>
		</tr>
	</table>

	<?php form_close() ;?>
	
	<?php
//check if there is any alert message set
if(isset($alert) && !empty($alert))
{
	//message alert
	echo $alert;
}
?>
</center>