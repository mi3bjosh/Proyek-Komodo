<html>
<head>

</head>
<body>
<h1>Sistem Logging </h1>
<table>
        <tr>
  		<td bgcolor="#CCC" style="border-radius:3px;"  align="center">No.</td>
			<td bgcolor="#CCC" style="border-radius:3px;"  align="center">Id_Log</td>
			<td bgcolor="#CCC" style="border-radius:3px;" align="center">Id_ebook</td>
	        <td bgcolor="#CCC" style="border-radius:3px;" align="center">User</td>
			<td bgcolor="#CCC" style="border-radius:3px;" align="center">Aksi</td>
			<td bgcolor="#CCC" style="border-radius:3px;" align="center">Waktu</td>
        </tr>
        <?php $i = 1 ?>
        <?php foreach($data as $m): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $m->id_log ?></td>
            <td><?php echo $m->id_ebook ?></td>
			<td><?php echo $m->user ?></td>
			<td><?php echo $m->aksi ?></td>
			<td><?php echo $m->date ?></td>
            <td></td>
        </tr>
        <?php endforeach ?>
</table>
</body>
</html>