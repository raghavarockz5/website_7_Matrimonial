<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li>
        <a href="index.php">
          Home
        </a>
      </li>
    
      <li class="active">
        Login
      </li>
    </ol>
  </div>
</div>
<section class="content greybg">
  <div class="container">
    <div class="panel panel_custom2">
      <div class="row">
        <div class="col-md-7">
         
<div class="row">       

<div class="col-md-8 col-sm-offset-2"> 
 <?php if($_GET['msg'] == 'invalidlogin') { ?>
              <span id="errors1" style="color:#FF0000; text-align:center; font-weight:500;">Invalid Email Or Password</span>
            
              <?php } ?>
<form id="form" action="" method="POST" role="form" class="login form">
  <h3>Login</h3>

  
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="email" class="form-control" id="" placeholder="">
    </div>
  
        <div class="form-group">
      <label for="">Password</label>
      <input type="password" name="password" class="form-control" id="" placeholder="">
    </div>
   <div align="right"><a href="forgot-password.php">Forgot Password ?</a></div>
    <button type="submit" class="btn btn-primary">Submit <i class="fa fa-arrow-right"></i></button>
  </form>
   
  </div>
 
  </div>

  <!--<div class="owl-carousel scroll01">
    <div class="item"><img src="images/thumb.png"></div>
      <div class="item"><img src="images/thumb.png"></div>
        <div class="item"><img src="images/thumb.png"></div>
          <div class="item"><img src="images/thumb.png"></div>
  </div>-->
        </div>
        <div class="col-md-5">
       <div class="inner_form"> <?php if(!isset($_SESSION['uid'])){ include 'includes/form.php'; } else { ?>
    <?php include 'includes/search.php'; } ?></div>
     
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!--
content end
-->
<?php require_once'includes/footer.php'; ?>

  <?php
if(isset($_POST['email']))
{
	foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);
$sql = "select * from `profiles` where `email` = '$email' and `password` = '$password' and `status` = 'Active'";
$result = mysql_query($sql);
if(mysql_num_rows($result) > 0) {
	$res = mysql_fetch_object($result);
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$date = date("d-m-Y h:i A");
	$sqlup = "INSERT INTO `user_logs` (`user_link`, `date`, `ip`) VALUES ('$res->entry_id', '$date', '$ip')";
	$resultup = mysql_query($sqlup);
	if($resultup) {
	$_SESSION['uid'] = $res->entry_id;
			echo "<script>document.location.href='dashboard.php'</script>";
	}
} else {
	echo "<script>document.location.href='$cpage?msg=invalidlogin'</script>";
}
}
?>

<link rel="stylesheet" href="admin/validator/css/sudhi.css" />
		<script src="admin/validator/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">
var jQuery_1_9_1 = $.noConflict(true);
</script>
		<script src="admin/validator/js/jquery.validate.min.js"></script>
        
        
        <script type="text/javascript">
			$(function()
			{
						
				$("#form").validate(
				{
					// Rules for form validation
					rules:
					{
					
						email:
						{
							required: true,
							email: true
						},
						password:
						{
							required: true
						}
					},
					
					// Messages for form validation
					messages:
					{
						
					
						email:
						{
							required: 'Please enter email'
						},
						password:
						{
							required: 'Please enter password'
						}
					},					
					
					// Do not change code below
					errorPlacement: function(error, element)
					{
						error.appendTo(element.parent());
					}
				});
			});			
		</script>