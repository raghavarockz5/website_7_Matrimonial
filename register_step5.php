<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
<div class="container"><ol class="breadcrumb">
  <li>
    <a href="index.php">Home</a>
  </li>

  <li class="active">Upload Profile Picture</li>
</ol></div>
</div>
<section class="content greybg">


  <div class="container">
    <div class="panel panel_custom">
     <?php 
	$code = addslashes($_GET['token']);
	  $sql = "select * from `profiles` where `code` = '$code' and `completed_status` = 'Completed'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0) {
		$res = mysql_fetch_object($result);
	?>
<div class="row">
<?php
if($_GET['msg'] == 'invalid') {
?>
<h3 align="center" style="color:#F00;">Invalid Image Formate</h3>
<?php } ?>
  <div class="col-md-8 col-sm-offset-2">
<div class="row">
  <div class="col-md-6">



<div class="mypro_pic">  
<?php if($res->gender == 'Male') { ?>
<img class="img-responsive" src="images/profile.gif">
<?php } else { ?>
<img class="img-responsive" src="images/female.jpg">
<?php } ?>


</div>
    
  </div>
  <form id="reg-form" class="hr_form" method="post" action="" enctype="multipart/form-data" >
          <input type="hidden" name="act" value="<?php echo $res->entry_id; ?>" />
           <input type="hidden" name="token" value="<?php echo $res->code; ?>" />
    <div class="col-md-6">
   <h3> Add your  Profile Photo</h3>
<span class="btn btn-info btn-block btn-lg  btn-file m-t-3">  
Upload From Computer
<input name="image_name" type="file">   
</span>
<br /><br />
 <input type="submit" name="submit" id="reg-form" value="Upload" class="btn btn-lg btn-primary">
<!--<div class="or_devider"></div>
<a href="" class="btn btn-primary btn-lg btn-block btn-fb"><i class="fa fa-facebook-square"></i> Import from Facebook </a>-->


</div>
</form>
<div class="col-md-12"><hr/></div>
<!--<div class="col-md-5">
  

<h3 class="m-b-1">Photo Guidelines</h3>
<div class="img_guid"><div class="row">
  <div class="col-md-4"><p><i class="fa fa-check"></i> Close Up</p>
  <img src="images/thumb.png" class="img-responsive">
  </div>

  <div class="col-md-4"><p><i class="fa fa-times"></i> Side Face</p><img src="images/thumb.png" class="img-responsive"></div>
  <div class="col-md-4"><p><i class="fa fa-times"></i> Blur</p><img src="images/thumb.png" class="img-responsive"></div>
    <div class="col-md-4"><p><i class="fa fa-check"></i> Full View</p><img src="images/thumb.png" class="img-responsive"></div>
  <div class="col-md-4"><p><i class="fa fa-times"></i> Group</p><img src="images/thumb.png" class="img-responsive"></div>
  <div class="col-md-4"><p><i class="fa fa-times"></i> Watermark</p><img src="images/thumb.png" class="img-responsive"></div>
</div></div>

</div>-->
   <!--<div class="col-md-6 col-sm-offset-1">
<h3 class="m-b-3">Other ways to upload</h3>
<div class="media">
  <div class="media-left">
    <a href="#">
    
      <img class="media-object" width="40" src="https://maxcdn.icons8.com/Color/PNG/48/Messaging/chat-48.png" >
    </a>
  </div>
  <div class="media-body">
   
   <p><a><u>Click here</u></a> to upload photo from your Mobile. We will send you upload instructions by SMS.</p>
  </div>
</div>


<div class="media">
  <div class="media-left">
    <a href="#">
 
      <img class="media-object" width="40" src="https://maxcdn.icons8.com/Color/PNG/48/Messaging/gmail_login-48.png" >
    </a>
  </div>
  <div class="media-body">

  <p>Email your photo to photos@matchpoint.com along with your Profile ID (MP99803478).</p>

  </div>
</div>


<a href="" class="btn m-t-3 btn-info">Know More <i class="fa fa-ellipsis-v"></i></a>
<a href="register_step6.php" class="btn m-t-3 btn-danger">Skip This  <i class="fa fa-arrow-right"></i></a>
     



   </div>--> 
  
  </div>
   <div align="right"><a href="register_step6.php?token=<?php echo $_GET['token']; ?>" class="btn m-t-3 btn-danger">Skip This  <i class="fa fa-arrow-right"></i></a></div>
</div>
    
  </div>
  <?php } else { ?>
      <h3 align="center">Invalid Request</h3>
      <?php } ?>
</div>
    </div>
  </div>
</section>
<!--
  content end
-->
<?php require_once'includes/footer.php'; ?>


 <?php
if(isset($_POST['submit']))
{
$act = $_POST['act'];
$token = $_POST['token'];
$code = generatePassword();
if ($_FILES['image_name']['name'] != '') { 
			$oname=$_FILES["image_name"]["name"];
			$pos = strrpos($oname, ".");
			$extension=substr($oname,$pos+1);
			$extension=strtolower($extension);
			 if($_FILES['image_name']['type'] == 'image/jpeg' || $_FILES['image_name']['type'] == 'image/jpg' || $_FILES['image_name']['type'] == 'image/png' || $_FILES['image_name']['type'] == 'image/jpeg') {
			$tn = $_FILES["image_name"]["tmp_name"];
			$path = "profiles/".$code.'.'.$extension;
			 move_uploaded_file($tn,$path);
			 $image = $code.'.'.$extension;

			 } else {
			 $image = '';
			 }
			 } else {
			 $image = '';
			 }
		if($image != '') {	 
			 
$sql = "INSERT INTO `images` (`profile_link`, `image`) VALUES ('$act', '$image')";
$result = mysql_query($sql);
if($result)
{
	echo "<script>document.location.href='register_step6.php?token=$token'</script>";
}
		} else {
		echo "<script>document.location.href='register_step5.php?token=$token&msg=invalid'</script>";	
		}
}
?>

<?php
  function generatePassword($length=10,$level=2){

   list($usec, $sec) = explode(' ', microtime());
   srand((float) $sec + ((float) $usec * 100000));

   $validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
   $validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $validchars[3] = "0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/";

   $password  = "";
   $counter   = 0;

   while ($counter < $length) {
     $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

     // All character must be different
     if (!strstr($password, $actChar)) {
        $password .= $actChar;
        $counter++;
     }

   }

   return $password;

}
?>