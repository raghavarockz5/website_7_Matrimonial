<option value="">Select City</option>

<?php

require_once "admin/includes/config.php";

$id = $_GET['id'];

$sql = "select `entry_id`,`city` from `cities` where `state` = $id order by `city`";

$result = mysql_query($sql);

while($res = mysql_fetch_object($result)) {

?>

<option value="<?php echo $res->entry_id; ?>"><?php echo $res->city; ?></option>

<?php } ?>