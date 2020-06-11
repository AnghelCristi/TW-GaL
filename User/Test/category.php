<?php
session_start();
?>

<html>
<head>
<title>Categorii</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
include("database.php");
echo "<h2 class=head1> Alege categoria: </h2>";
$rs=mysqli_query($con,"select * from category");
echo "<table align=center>";
while($row=mysqli_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=game.php?subid=$row[0]><font size=4>$row[1]</font></a>";
}
echo "</table>";
?>
</body>
</html>
