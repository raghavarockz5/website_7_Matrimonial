<?php require_once'includes/header.php'; 
	$code = addslashes($_GET['token']);
	  $sql = "select * from `profiles` where `code` = '$code' and `completed_status` = 'Completed' and `status` = 'Active'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0) {
		$res = mysql_fetch_object($result);
?>
<div class="breadcrumb_wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li>
        <a href="index.php">
          Home
        </a>
      </li>
     
      <li class="active">
        Registration Successful
      </li>
    </ol>
  </div>
</div>
<style type="text/css">
  .successmsg{background: #52c799; padding: 60px 0px; color: white; text-align: center;}
    .successmsg .msgs{ font-size: 16px; }
     .successmsg h1 span{ color: #d3f9ea; }
    .successmsg h4 a{ color: #d3f9ea; }
    .successmsg h4 a:hover{ text-decoration: underline; }
</style>

<div class="successmsg"><div class="container">

<h1><i class="fa fa-check-circle"></i> <strong>Congratulations <span> <?php echo $res->name; ?></span>.</strong></h1>
<h3>Your ID Number. <strong>MP<?php echo $res->entry_id; ?></strong></h3>
 
<span class="msgs">You Have Successully Registered With Match Point, Login Details are sent to your email</span>
<h4><a href="login.php">Click Here To Login</a></h4>
 
</div></div>

<?php } else { ?>
<h3 align="center">Invalid Request</h3>
<?php } ?>
<?php require_once'includes/footer.php'; ?>
