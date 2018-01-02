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
        Forgot Password ?
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
<?php if($_GET['msg'] == 'err') { ?>
				<div align="center" style="font-size:18px; color:#FF0000;"><br />Invalid Email ID.</div>
				<?php } ?>
				<?php if($_GET['msg'] == 'success') { ?>
				<div align="center" style="font-size:18px; color:#009900;"><br />Your Request Has Sent. Please Check Your Email Or Mobile For Login Details</div>
				<?php } ?>
<form id="form" action="" method="POST" role="form" class="login form">
  <h3>Forgot Password ?</h3>

  
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="email" class="form-control" id="" placeholder="">
    </div>
  
      
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

$sql_set = "select * from `settings` where `entry_id` = 1";
$result_set = mysql_query($sql_set);
$res_set = mysql_fetch_object($result_set) or die(mysql_error());
 
 $sqlc = "select * from `profiles` where `email` = '$email'";
 $resultc = mysql_query($sqlc);
 if(mysql_num_rows($resultc) == 0)
 {
 echo "<script>document.location.href='forgot-password.php?msg=err'</script>";
 } else {
 $resc = mysql_fetch_object($resultc);
 
 $subject = "Password  - $res_set->title";
$message = "Hi $resc->name <br />
Your logins details find below <br /><br /> 
<h3>Login Details</h3> <br />

User Name : $resc->email <br />
Password : $resc->password <br /><br /><br />
Regards<br />
$res_set->title";


	
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				
				// Additional headers
				$headers .= 'From: '.$res_set->email . "\r\n";
				$headers .= 'Reply-To: '.$res_set->email . "\r\n";
				$to = $resc->email;
				if(mail($to, $subject, $message, $headers))
				{
				echo "<script>document.location.href='forgot-password.php?msg=success'</script>";
				}
			
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