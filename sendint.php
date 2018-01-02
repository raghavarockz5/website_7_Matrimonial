<?php session_start();
require_once "admin/includes/config.php";
$eid = $_GET['id'];
$uid = $_SESSION['uid'];
$sqlc = "select * from `express` where `uid` = $uid and `eid` = $eid";
$resultc = mysql_query($sqlc);
if(mysql_num_rows($resultc)  > 0)
{
	$resc = mysql_fetch_object($resultc);
	if($resc->uid_delete_status == 0) {
	echo 0;
	} else {
		$sqlup = "update `express` set `uid_delete_status` = '0' where `entry_id` = $resc->entry_id";
		$resultup = mysql_query($sqlup);
		if($resultup)
		{
			echo 1;	
		}
	}
} else {
	$sqlin = "INSERT INTO `express` (`uid`, `eid`, `status`) VALUES ('$uid', '$eid', '0')";
	$resultin = mysql_query($sqlin);
	if($resultin)
	{
	echo 1;	
	}
}
?>