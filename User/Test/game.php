<?php
session_start();
?>

<html>
<head>
<title>Alegere joc</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
include("database.php");
extract($_GET);
$rs1=mysqli_query($con,"select * from category where ctg_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<h1 align=center><font color=blue> $row1[1] </font></h1>";
$rs=mysqli_query($con,"select * from game where ctg_id=$subid");
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h2 class=head1> Nu exista intrebari </h2>";
	exit;
}
echo "<h2 class=head1> Selecteaza jocul impreuna cu dificultatea intrebarii pentru a incepe: </h2>";
echo "<table align=center>";

while($row=mysqli_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=quiz.php?testid=$row[0]&subid=$subid><font size=4>$row[2] $row[4]</font></a>";
}
echo "</table>";
?>
</body>
</html>