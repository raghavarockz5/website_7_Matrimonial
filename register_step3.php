<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
<div class="container"><ol class="breadcrumb">
  <li>
    <a href="inex.php">Home</a>
  </li>

  <li class="active">Registration</li>
</ol></div>
</div>
<section class="content greybg">
  <!--<div class="panel page_head01">
    <div class="container">
      <h3 class="text-center">
        Add your brother's
        <strong>
          professional
        </strong>
        details to help us build a good profile
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
         <form id="reg3-form" class="hr_form" method="post" action="" >
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
                  Education Level
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select  name="education_level" id="input" data-title="Select "  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                   <option value="">Select</option>
                          <?php
						  $sqld = "select * from `education_level` order by `education_level`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->education_level; ?>" <?php if($res->education_level == 
$resd->education_level) { ?> selected <?php } ?>><?php echo $resd->education_level; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Education Field
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="education" id="input"  data-title="Select "  data-style="mystyle btn-lg" data-live-search="true" class="form-control required" data-width="100%" >
                   <option value="">Select</option>
                          <?php
						  $sqld = "select * from `education` order by `education`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->education; ?>" <?php if($res->education == 
$resd->education) { ?> selected <?php } ?>><?php echo $resd->education; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Working With
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="working_area" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                     <option value="">Select</option>
                          <?php
						  $sqld = "select * from `working_area` order by `working_area`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->working_area; ?>" <?php if($res->working_area == 
$resd->working_area) { ?> selected <?php } ?>><?php echo $resd->working_area; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Working As
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="working_as" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                       <option value="">Select</option>
                          <?php
						  $sqld = "select * from `working_as` order by `working_as`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->working_as; ?>" <?php if($res->working_as == 
$resd->working_as) { ?> selected <?php } ?>><?php echo $resd->working_as; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Annual Income
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="annual_income" id="input" data-title="Select " data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                   <option value="">Select</option>
                         <option value="Upto INR 1 Lakh" <?php if($res->annual_income == 'Upto INR 1 Lakh') { ?> selected <?php } ?> label="Upto INR 1 Lakh">Upto INR 1 Lakh</option>
    <option value="INR 1 Lakh to 2 Lakh" <?php if($res->annual_income == 'INR 1 Lakh to 2 Lakh') { ?> selected <?php } ?> label="INR 1 Lakh to 2 Lakh">INR 1 Lakh to 2 Lakh</option>
    <option value="INR 2 Lakh to 4 Lakh" <?php if($res->annual_income == 'INR 2 Lakh to 4 Lakh') { ?> selected <?php } ?> label="INR 2 Lakh to 4 Lakh">INR 2 Lakh to 4 Lakh</option>
    <option value="INR 4 Lakh to 7 Lakh" <?php if($res->annual_income == 'INR 4 Lakh to 7 Lakh') { ?> selected <?php } ?> label="INR 4 Lakh to 7 Lakh">INR 4 Lakh to 7 Lakh</option>
    <option value="INR 7 Lakh to 10 Lakh" <?php if($res->annual_income == 'INR 7 Lakh to 10 Lakh') { ?> selected <?php } ?> label="INR 7 Lakh to 10 Lakh">INR 7 Lakh to 10 Lakh</option>
    <option value="INR 10 Lakh to 15 Lakh" <?php if($res->annual_income == 'INR 10 Lakh to 15 Lakh') { ?> selected <?php } ?> label="INR 10 Lakh to 15 Lakh">INR 10 Lakh to 15 Lakh</option>
    <option value="INR 15 Lakh to 20 Lakh" <?php if($res->annual_income == 'INR 15 Lakh to 20 Lakh') { ?> selected <?php } ?> label="INR 15 Lakh to 20 Lakh">INR 15 Lakh to 20 Lakh</option>
    <option value="INR 20 Lakh to 30 Lakh" <?php if($res->annual_income == 'INR 20 Lakh to 30 Lakh') { ?> selected <?php } ?> label="INR 20 Lakh to 30 Lakh">INR 20 Lakh to 30 Lakh</option>
    <option value="INR 30 Lakh to 50 Lakh" <?php if($res->annual_income == 'INR 30 Lakh to 50 Lakh') { ?> selected <?php } ?> label="INR 30 Lakh to 50 Lakh">INR 30 Lakh to 50 Lakh</option>
    <option value="INR 50 Lakh to 75 Lakh"<?php if($res->annual_income == 'INR 50 Lakh to 75 Lakh') { ?> selected <?php } ?> label="INR 50 Lakh to 75 Lakh">INR 50 Lakh to 75 Lakh</option>
    <option value="INR 75 Lakh to 1 Crore" <?php if($res->annual_income == 'INR 75 Lakh to 1 Crore') { ?> selected <?php } ?> label="INR 75 Lakh to 1 Crore">INR 75 Lakh to 1 Crore</option>
    <option value="INR 1 Crore & above" <?php if($res->annual_income == 'INR 1 Crore & above') { ?> selected <?php } ?> label="INR 1 Crore &amp; above">INR 1 Crore &amp; above</option>
    <option value="Not applicable" <?php if($res->annual_income == 'Not applicable') { ?> selected <?php } ?> label="Not applicable">Not applicable</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Mobile Number
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-3 ">
                <div class="form-group">
                  <select name="mob_code" id="input" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                    <?php
						  $sqld = "select code,country from `countries` order by `country`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->code; ?>" <?php if($res->mob_code == 
$resd->code) { ?> selected <?php } ?>><?php echo $resd->country; ?>(<?php echo $resd->code; ?>)</option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-5">
                <input type="text" name="mobile" id="input" class="form-control required" value="" placeholder="Mobile Number"  />
              </div>
              <div class="col-md-8 col-sm-offset-4">
             <button type="submit" name="submit" id="submit-form3" class="btn btn-lg btn-primary">
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
        <?php require_once'includes/sidebar.php'; ?>
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
	        $("#submit-form3").click(function(){
	        	if( validatrix( $("#reg3-form") ) ){
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

$sql = "UPDATE  `profiles` SET  `education_level` =  '$education_level',
`education` =  '$education',
`working_area` =  '$working_area',
`working_as` =  '$working_as',
`annual_income` =  '$annual_income',
`mobile` =  '$mobile',
`mob_code` =  '$mob_code' WHERE  `code` = '$token'";
$result = mysql_query($sql);
if($result)
{
	echo "<script>document.location.href='register_step4.php?token=$token'</script>";
}

}
?>