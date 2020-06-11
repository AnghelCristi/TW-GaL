
<html>
<head>
<title>Inregistrare user</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);
include("database.php");
$rs=mysqli_query($con,"select * from users where email='$lid'");
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Login Id Already Exists</div>";
	exit;
}
$query="insert into users(email,password) values('$lid','$pass')";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Contul  $lid a fost creat cu succes !</div>";
echo "<br><div class=head1>Logati-va pentru testare</div>";
echo "<br><div class=head1><a href=index.php>Login</a></div>";


?>
</body>
</html>

