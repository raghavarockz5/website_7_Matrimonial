<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
<div class="container"><ol class="breadcrumb">
  <li>
    <a href="index.php">Home</a>
  </li>
 <li>
    <a href="#">Registration</a>
  </li>
  <li class="active">Family Status</li>
</ol></div>
</div>
<section class="content greybg">
  <!--<div class="panel page_head01">
    <div class="container">
      <h3 class="text-center">
        Some details about your <strong>family</strong> will improve your profile quality

      </h3>
    </div>
  </div>-->
  <?php require_once'includes/stages.php'; ?>
  <div class="container">
   <?php 
	$code = addslashes($_GET['token']);
	  $sql = "select * from `profiles` where `code` = '$code' and `completed_status` = 'Completed'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0) {
		$res = mysql_fetch_object($result);
	?>
    <div class="boxed">
     <span class="pull-right"> <a href="register_step7.php?token=<?php echo $_GET['token']; ?>" ><button class="btn btn-lg btn-danger">
                                 <b>
                                   Skip This
                                 </b>
                                 <i class="fa fa-arrow-right">
                                 </i>
                               </button>
                               </a>
                               </span>
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
              <div class="col-md-2">
                <label for="">
                 Father's Status
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-10">
                <div class="form-group">
                  <select  name="father_status" id="input" data-title="Select "  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                  <option value="">Select</option>
                  <option value="Employed" <?php if($res->father_status == 'Employed') { ?> selected="selected" <?php } ?>>Employed</option>
                            <option value="Business" <?php if($res->father_status == 'Business') { ?> selected="selected" <?php } ?>>Business</option>
                            <option value="Employed" <?php if($res->father_status == 'Retired') { ?> selected="selected" <?php } ?>>Retired</option>
                            <option value="Employed" <?php if($res->father_status == 'Not Employed') { ?> selected="selected" <?php } ?>>Not Employed</option>
                            <option value="Employed" <?php if($res->father_status == 'Passed Away') { ?> selected="selected" <?php } ?>>Passed Away</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <label for="">
                Mother's Status
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-10">
                <div class="form-group">
                  <select name="mother_status" id="input"  data-title="Select "  data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                  <option value="">Select</option>
                     <option value="Employed" <?php if($res->mother_status == 'Employed') { ?> selected="selected" <?php } ?>>Employed</option>
                            <option value="Homemaker" <?php if($res->mother_status == 'Homemaker') { ?> selected="selected" <?php } ?>>Homemaker</option>
                            <option value="Business" <?php if($res->mother_status == 'Business') { ?> selected="selected" <?php } ?>>Business</option>
                            <option value="Retired" <?php if($res->mother_status == 'Retired') { ?> selected="selected" <?php } ?>>Retired</option>
                            <option value="Employed" <?php if($res->mother_status == 'Passed Away') { ?> selected="selected" <?php } ?>>Passed Away</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <label for="">
                  No of Brothers
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select name="no_of_bros" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                  <?php
						for($i=0;$i<=10;$i++) {
						?>
                        <option value="<?php echo $i; ?>" <?php if($res->no_of_bros) { ?> selected <?php } ?>><?php echo $i; ?></option>
                        <?php } ?>

                  </select>
                </div>
              </div>

               <div class="col-md-2">
                <label for="">
                 of which married
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select name="no_of_married_bros" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                   <?php
						for($i=0;$i<=10;$i++) {
						?>
                        <option value="<?php echo $i; ?>" <?php if($res->no_of_married_bros) { ?> selected <?php } ?>><?php echo $i; ?></option>
                        <?php } ?>
                  </select>
                </div>
              </div>


              <div class="col-md-2">
                <label for="">
                  No of Sisters
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select name="no_of_sis" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                   <?php
						for($i=0;$i<=10;$i++) {
						?>
                        <option value="<?php echo $i; ?>" <?php if($res->no_of_sis) { ?> selected <?php } ?>><?php echo $i; ?></option>
                        <?php } ?>
                  </select>
                </div>
              </div>

               <div class="col-md-2">
                <label for="">
                  of which married
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select name="no_of_married_sis" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg" class="form-control required" data-width="100%" >
                  <?php
						for($i=0;$i<=10;$i++) {
						?>
                        <option value="<?php echo $i; ?>" <?php if($res->no_of_married_sis) { ?> selected <?php } ?>><?php echo $i; ?></option>
                        <?php } ?>
                  </select>
                </div>
              </div>
  
        
           
            
              <div class="col-md-12">
               
                                    <button type="submit" name="submit" id="submit-form" class="btn btn-lg btn-primary">
                                 <b>
                                   Continue
                                 </b>
                                 <i class="fa fa-arrow-right">
                                 </i>
                               </button></span>
              </div>
            </div>
          </form>
         
    </div>
      <?php } else { ?>
      <h3 align="center">Invalid Request</h3>
      <?php } ?>
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

$sql = "UPDATE  `profiles` SET  `father_status` =  '$father_status',
`mother_status` =  '$mother_status',
`no_of_bros` =  '$no_of_bros',
`no_of_married_bros` =  '$no_of_married_bros',
`no_of_sis` =  '$no_of_sis',
`no_of_married_sis` =  '$no_of_married_sis' WHERE  `code` = '$token'";
$result = mysql_query($sql);
if($result)
{
	echo "<script>document.location.href='register_step7.php?token=$token'</script>";
}

}
?>