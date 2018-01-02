<option value="">Select State</option>

<?php

require_once "admin/includes/config.php";

$id = $_GET['id'];

$sql = "select `entry_id`,`state` from `states` where `country` = $id order by `state`";

$result = mysql_query($sql);

while($res = mysql_fetch_object($result)) {

?>

<option value="<?php echo $res->entry_id; ?>"><?php echo $res->state; ?></option>

<?php } ?>