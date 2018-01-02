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
        Welcome, give us a few details about
        <strong>
          your brother's
        </strong>
        background
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
          <form id="reg-form" class="hr_form" method="post" action="" >
          <input type="hidden" name="token" value="<?php echo $code; ?>" />
            <div class="row">
              <div class="col-md-8 col-sm-offset-4">
                <p class="pull-right">
                  <span class="star">
                  </span>
                  marked fields are mandatory
                </p>
              </div>
              
              <div class="col-md-4">
                <label for="">
                  Marital Status
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="martial_status" id="martial_status1"  data-title="Select Marital Status"  data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                  <option value="">Select</option>
                    <option value="Never Married" >Never Married</option>
                           <option value="Divorced">Divorced</option>
                           <option value="Widowed" >Widowed</option>
                           <option value="Awaiting Divorce" >Awaiting Divorce</option>
                             <option value="Annulled" >Annulled</option>
            
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  State Living in
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="state" id="state" data-title="Select State" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" onchange="get_cities(this.value);" >
                     <option value="">Select</option>
                          <?php
						  $sqld = "select * from `states` where `country` = $res->country order by `state`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>"><?php echo $resd->state; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  City Living in
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="city" id="city" data-title="Select City" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                    <option value="">Select</option>
                          <?php
						  $sqld = "select * from `cities` where `state` = $res->state order by `city`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>"><?php echo $resd->city; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Community
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="community" id="input" data-title="Select Community" data-live-search="true" data-style="mystyle btn-lg"class="form-control required" data-width="100%" >
                     <option value="">Select</option>
                          <?php
						  $sqld = "select * from `communities` order by `community`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->community; ?>"><?php echo $resd->community; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Gothra / Gothram
                  <small>
                    (Optional)
                  </small>
                </label>
              </div>
              <div class="col-md-8 ">
                <div class="form-group">
                  <select name="gothram" id="input" data-title="Select Gothram" data-style="mystyle btn-lg" class="form-control" data-width="100%" >
                      <option value="">Select</option>
                          <?php
						  $sqld = "select * from `gothram` order by `gothram`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->gothram; ?>" <?php if($res->gothram == 
$resd->gothram) { ?> selected <?php } ?>><?php echo $resd->gothram; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Nakshatra
                  <small>
                    (Optional)
                  </small>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="nakshatra" id="input" data-title="Select Nakshatra" data-style="mystyle btn-lg" class="form-control" data-width="100%" >
                     <option value="">Select</option>
                          <?php
						  $sqld = "select * from `nakshatra` order by `nakshatra`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->nakshatra; ?>"><?php echo $resd->nakshatra; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Dosham
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default active">
                    <input type="radio" name="dosham" id="option1" value="Yes" autocomplete="off" class="required" checked="checked"/>
                    Yes
                  </label>
                  <label class="btn btn-default">
                    <input type="radio" name="dosham" id="option2" value="No" autocomplete="off" class="required"/>
                    No
                  </label>
                  <label class="btn btn-default">
                    <input type="radio" name="dosham" id="option3" value="Don't Know" autocomplete="off" class="required"/>
                    Don't Know
                  </label>
                </div>
              </div>
              <div class="col-md-8 col-sm-offset-4">
                <button type="submit" name="submit" id="submit-form" class="btn btn-lg btn-primary">
                  <b>
                    Continue
                  </b>
                  <i class="fa fa-arrow-right">
                  </i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <?php  require_once'includes/sidebar.php'; ?>
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
	        $("#submit-form").click(function(){
	        	if( validatrix( $("#reg-form") ) ){
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

$sql = "UPDATE  `profiles` SET  `state` =  '$state',
`city` =  '$city',
`martial_status` =  '$martial_status',
`community` =  '$community',
`gothram` =  '$gothram',
`nakshatra` =  '$nakshatra',
`dosham` =  '$dosham' WHERE  `code` = '$token'";
$result = mysql_query($sql);
if($result)
{
	echo "<script>document.location.href='register_step2.php?token=$token'</script>";
}

}
?>