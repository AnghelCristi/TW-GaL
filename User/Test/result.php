<?php
session_start();
?>

<html>
<head>
<title>Rezultatele mele</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_SESSION);
$rs=mysqli_query($con,"select t.game_name,t.difficulty, t.total_que,r.test_date,r.score from game t, learn r where
t.game_id=r.game_id and r.email='$login'") or die(mysqli_error());

echo "<h1 class=head1> Rezultatele mele: </h1>";
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h1 class=head1> Nu ai dat inca niciun test</h1>";
	exit;
}
echo "<table border=1 align=center><tr class=style2><td width=300>Test Name <td> Difficulty <td> Total<br> Questions <td> Score";
while($row=mysqli_fetch_row($rs))
{
echo "<tr class=style8><td>$row[0] <td align=center> $row[1] <td align=center> $row[2] <td align=center> $row[4]";
}
echo "</table>";
?>
</body>
</html>
