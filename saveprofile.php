<?php session_start();
require_once "admin/includes/config.php";
$sid = $_GET['id'];
$uid = $_SESSION['uid'];
$sqlc = "select * from `saved` where `uid` = $uid and `sid` = $sid";
$resultc = mysql_query($sqlc);
if(mysql_num_rows($resultc)  > 0)
{
	echo 0;
} else {
	$sqlin = "INSERT INTO `saved` (`uid`, `sid`) VALUES ('$uid', '$sid')";
	$resultin = mysql_query($sqlin);
	if($resultin)
	{
	echo 1;	
	}
}
?>