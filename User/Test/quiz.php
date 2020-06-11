<?php
session_start();
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);

if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:quiz.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION['tid']))
{
	header("location: index.php");
}
?>

<html>
<head>
<title>Testare</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");


$query="select * from questions";

$rs=mysqli_query($con,"select * from questions where game_id=$tid") or die(mysqli_error());
if(!isset($_SESSION['qn']))
{
	$_SESSION['qn']=0;
	mysqli_query($con,"delete from answers where sess_id='" . session_id() ."'") or die(mysqli_error());
	$_SESSION['trueans']=0;
	
}
else
{	
		if(@$submit=='Intrebarea urmatoare >' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into answers(sess_id, game_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}
				$_SESSION['qn']=$_SESSION['qn']+1;
		}
		else if(@$submit=='Termina testul' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into answers(sess_id, game_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}
				echo "<h1 class=head1> Rezultate:</h1>";
				$_SESSION['qn']=$_SESSION['qn']+1;
				echo "<Table align=center><tr class=tot><td>Numarul total de intrebari:<td> $_SESSION[qn]";
				echo "<tr class=tans><td>Raspunsuri corecte:<td>".$_SESSION['trueans'];
				$w=$_SESSION['qn']-$_SESSION['trueans'];
				echo "<tr class=fans><td>Raspunsuri gresite:<td> ". $w;
				echo "</table>";
				$date = date('Y-m-d H:i:s');
				mysqli_query($con,"insert into learn(email,game_id,test_date,score) values('$login','$tid','$date',$_SESSION[trueans])") or die(mysqli_error());
				echo "<h1 align=center><a href=verifica.php> Verifica raspunsurile corecte</a> </h1>";
				unset($_SESSION['qn']);
				unset($_SESSION[sid]);
				unset($_SESSION['tid']);
				unset($_SESSION['trueans']);
				exit;
		}
}
$rs=mysqli_query($con,"select * from questions where game_id=$tid") or die(mysqli_error());
if($_SESSION['qn']>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit;
}
mysqli_data_seek($rs,$_SESSION['qn']);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=quiz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION['qn']+1;
echo "<tR><td><span class=style2>Intrebare ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

if($_SESSION['qn']<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Intrebarea urmatoare >'></form>";
else
echo "<tr><td><input type=submit name=submit value='Termina testul'></form>";
echo "</table></table>";
?>
</body>
</html>
