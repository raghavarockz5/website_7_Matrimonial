<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
<div class="container"><ol class="breadcrumb">
  <li>
    <a href="index.php">Home</a>
  </li>
  
  <li class="active">Registration</li>
</ol></div>
</div>
<section class="content greybg">
  <!--<div class="panel page_head01">
    <div class="container">
      <h3 class="text-center">
       Oh, one last thing...<strong>describe</strong> your brother
      </h3>
    </div>
  </div>-->
  <?php require_once'includes/stages.php'; ?>
  <div class="container">
    <div class="boxed">
     <?php 
	$code = addslashes($_GET['token']);
	  $sql = "select * from `profiles` where `code` = '$code' and `completed_status` = 'Pending' and `status` = 'Inactive'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0) {
		$res = mysql_fetch_object($result);
	?>
      <div class="row">
        <div class="col-md-8">
         <form id="reg4-form" class="hr_form" method="post" action="" >
          <input type="hidden" name="token" value="<?php echo $code; ?>" />
            <div class="row">
              <div class="col-md-8 col-sm-offset-4">
                <p class="pull-right">
                  <span class="star">
                  </span>
                  marked fields are mandatory
                </p>
              </div>
              <div class="col-md-12">
                <div class="alert alert-warning">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Note : </strong> Write about your personality, family background and what you are looking for in your partner.
                </div>
              </div>
                   <div class="col-md-4">
                <label for="">
                 In your own words
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                 <textarea name="your_own_words" id="input" class="form-control required" rows="3" style="height: 200px;"></textarea>
                 <small>Please specify more details about the person looking to get married.</small>
                </div>
              </div>
          
             <div class="col-md-4">
                <label for="">
                  Any Disability?
                  <span class="star">
                  </span>
                </label>
              </div>
              
              
               <div class="col-md-8">
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                    <input type="radio" name="any_disability" id="option1" value="No" autocomplete="off" class="required" checked="checked"/>
                    No
                  </label>
                 
                  <label class="btn btn-default">
                    <input type="radio" name="any_disability" id="option3" value="Physical Disability" autocomplete="off" class="required"/>
                    Physical Disability
                  </label>
                </div>
              </div>
              
              <div class="col-md-8 col-sm-offset-4">
                <button type="submit" name="submit" id="submit-form4" class="btn btn-lg btn-primary">
                  <b>
                    Create My Profile
                  </b>
                  <i class="fa fa-arrow-right">
                  </i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <?php require_once 'includes/sidebar.php'; ?>
      </div>
      <?php } else { ?>
      <h3 align="center">Invalid Request</h3>
      <?php } ?>
    </div>
  </div>
</section>
<!--
  content end
-->
<?php require_once'includes/footer.php'; ?>
<script>
	    $(function(){
	        $("#submit-form4").click(function(){
	        	if( validatrix( $("#reg4-form") ) ){
	        		return true;

	        	}else{
	        		console.log("Some fields are required");
	        	}
	        	return false; //Prevent form submition
	        });
	    });
	</script>
  <?php
if(isset($_POST['submit']))
{
foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);

$sql = "UPDATE  `profiles` SET  `your_own_words` =  '$your_own_words',
`any_disability` =  '$any_disability', `completed_status` = 'Completed', `status` = 'Active' WHERE  `code` ='$token'";
$result = mysql_query($sql);
if($result)
{
  echo "<script>document.location.href='register_step5.php?token=$token'</script>";
	$sqld = "select `name`,`email`,`password` from `profiles` where `code` = '$token'";
	$resultd = mysql_query($sqld);
	$resd = mysql_fetch_object($resultd);
	
	  $subject = "Congratulations  - $res_set->title";
echo $message = "Hi $resd->name <br />
Congratulation, You have successfully registered with $res_set->title <br /><br /> 
<h3>Login Details</h3> <br />
User Name : $resd->email <br />
Password : $resd->password <br /><br /><br />
Regards<br />
$res_set->title";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$headers .= 'From: <'.$res_set->femail.'>' . "\r\n";

if(mail($resd->email,$subject,$message,$headers)) {
	

}
}

}
?>
