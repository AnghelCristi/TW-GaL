<?php
session_start();
extract($_POST);
extract($_SESSION);
include("database.php");
if(@$submit=='Am verificat')
{
	//mysqli_query($con,"delete from answers where sess_id='" . session_id() ."'") or die(mysqli_error());
	unset($_SESSION[qn]);
	header("Location: index.php");
	exit;
}
?>

<html>
<head>
<title>Verificare intrebari</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
echo "<h1 class=head1> Verificare raspunsuri corecte:</h1>";

if(!isset($_SESSION['qn']))
{
		$_SESSION['qn']=0;
}
else if(@$submit=='Intrebarea urmatoare >' )
{
	$_SESSION['qn']=$_SESSION['qn']+1;
	
}

$rs=mysqli_query($con,"select * from answers where sess_id='" . session_id() ."'") or die(mysqli_error());
mysqli_data_seek($rs,$_SESSION['qn']);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=verifica.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION['qn']+1;
echo "<tR><td><span class=style2>Intrebare ".  $n .": $row[2]</style>";
echo "<tr><td class=".($row[7]==1?'tans':'style8').">$row[3]";
echo "<tr><td class=".($row[7]==2?'tans':'style8').">$row[4]";
echo "<tr><td class=".($row[7]==3?'tans':'style8').">$row[5]";
echo "<tr><td class=".($row[7]==4?'tans':'style8').">$row[6]";
if($_SESSION['qn']<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Intrebarea urmatoare >'></form>";
else
echo "<tr><td><input type=submit name=submit value='Am verificat'></form>";

echo "</table></table>";
?>
