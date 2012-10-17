<?php 

//bulan sekarang 
$month=date("m"); 
//Tahun sekarang  
$year=date("Y"); 
//hari ini  
$day=date("d");  
//cek jumlah hari tahun sekarang 
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
switch (date("m")) { 
  case "1" : $bulan="<tt>Januari</tt>";break; 
  case "2" : $bulan="<tt>Februari</tt>";break; 
  case "3" : $bulan="<tt>Maret</tt>";break; 
  case "4" : $bulan="<tt>April</tt>";break; 
  case "5" : $bulan="<tt>Mei</tt>";break; 
  case "6" : $bulan="<tt>Juni</tt>";break; 
  case "7" : $bulan="<tt>Juli</tt>";break; 
  case "8" : $bulan="<tt>Agustus</tt>";break; 
  case "9" : $bulan="<tt>September</tt>";break; 
  case "10" : $bulan="<tt>October</tt>";break; 
  case "11" : $bulan="<tt>November</tt>";break; 
  case "12" : $bulan="<tt>Desember</tt>";break; 
} 

//table untuk menulis tanggal sekarang 
echo '<link href="\style.css\" rel="\stylesheet\" type="\text/css\">';
echo '<table align="center" border="0" width="100%" cellpadding=2 cellspacing=1 style="">';
echo '<tr><td align=center ><font face=arial size=5 color=gray><b>'; 
echo $bulan. "&nbsp;". date("Y"); 
echo '</b></font><br/><br/></td></tr></table>';    

//table untuk menulis hari 
echo '<table align="center" border="0" width="100%" cellpadding=2 cellspacing=1 style="solid #B3554B">';
echo '<tr><td align="center"><font size="4" face=arial color="#1A89BE">S</font></td>'; 
echo '<td align=center><font size=4 face=arial color="#1A89BE">M</font></td>'; 
echo '<td align=center><font size=4 face=arial color="#1A89BE">T</font></td>'; 
echo '<td align=center><font size=4 face=arial color="#1A89BE">W</font></td>'; 
echo '<td align=center><font size=4 face=arial color="#1A89BE">T</font></td>'; 
echo '<td align=center><font size=4 face=arial color="#1A89BE">F</font></td>'; 
echo '<td align=center><font size=4 face=arial color="#1A89BE">S</font></td>'; 
echo '</tr>';
echo "</tt>"; 
/* 
mengecek tanggal 1 bulan sekarang ada pada hari ke berapa 
kemudian tambahkan cell td sebanyak var $s 
*/  
$s=date ("w", mktime (0,0,0,$month,1,$year)); 
for ($ds=1;$ds<=$s;$ds++) { 
echo "<td style=\"font-family:arial;color:#cccccc\" align=\"center\" valign=\"middle\" bgcolor=\"\" class=text1>";

} 
 
//memulai penulisan tanggal 
for ($d=1;$d<=$endDate;$d++) { 
 
//jika nilai $d (tanggal) adalah hari minggu (0) dibuat baris baru <tr> 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; } 
//default warna huruf
$bg="";
$fontColor="#000000"; 
$fontSize="10";
$style="";
//jika tanggal adalah hari minggu warna huruf merah 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) 
{ $fontColor="red";$bg="";$style=""; } 
//jika tanggal adalah hari sabtu warna huruf biru 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 5) 
{ $fontColor="green";$bg="";$style=""; }

if ($d == date("d")) 
{ $fontColor="white";$bg="#3FA5F8";$style="";}
//menulis tanggal 
echo "<td align=\"center\" valign=\"middle\" class=text1 $style> 
<span style=\"text-align:center;display:block;color:$fontColor;background-color:$bg\" class=text1><font face=verdana size=1>$d</font></span></td>"; 
//jika tanggal adalah hari sabtu (6) akhiri baris </tr> 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; } 
 
} 
//akhir table 
echo '</table><br>'; 

?>

