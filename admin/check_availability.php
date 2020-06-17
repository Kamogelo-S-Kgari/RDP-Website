<?php 
session_start();
$aid=$_SESSION['id'];
require_once("includes/config.php");
if(!empty($_POST["area"])) 
{
$area=$_POST["area"];
$result ="SELECT count(*) FROM registration WHERE area=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$area);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
echo "<span style='color:red'>$count. block already full.</span>";
else
	echo "<span style='color:red'>All block are Available</span>";
}

if(!empty($_POST["oldpassword"])) 
{
$pass=$_POST["oldpassword"];
$result ="SELECT password FROM userregistration WHERE password=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$pass);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$opass=$result;
if($opass==$pass) 
echo "<span style='color:green'> Password  matched .</span>";
else echo "<span style='color:red'> Password Not matched</span>";
}
?>
