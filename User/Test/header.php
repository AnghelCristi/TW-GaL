 <style>
body {
  background-image: url('back1.jpg');
  background-color: #cccccc;
  background-repeat: no-repeat;
  background-size: cover;
}
</style> 
<table border="0" width="100%" cellspacing="0" cellpadding="0" background="image/topbkg.jpg">
  <tr>
    <td width="90%" valign="top">

<div align="left" style = "position : absolute ; left : 30px ; font-size : 50pt">GaL (Game Playing Learning Monitor)</div></td>
    <td width="10%">
     <img border="0" src="image/img222.jpg" width="203" height="68" align="right"></td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" background="img/blackbar.jpg">
  <tr>
    <td width="100%" align="right"><img border="0" src="image/blackbar.jpg" width="89" height="15"></td>
  </tr>
  </Table>
  <Table width="100%">
  <tr>
  <td>
  <?php "Hi ".@$_SESSION['login']; ?>
  </td>
    <td>
	<?php
	if(isset($_SESSION['login']))
	{
	 echo "<div align=\"right\"><strong><a href=\"index.php\"> Home </a>|<a href=\"signout.php\">Signout</a></strong></div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	
  </tr>
  
</table>
