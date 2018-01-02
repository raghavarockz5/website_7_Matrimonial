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
        <strong>
          His lifestyle
        </strong>
        details will help us find the best matches for him
      </h3>
    </div>
  </div>-->
  <?php include'require_once/stages.php'; ?>
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
         <form id="reg2-form" class="hr_form" method="post" action="" >
          <input type="hidden" name="token" value="<?php echo $code; ?>" />
            <div class="row">
              <div class="col-md-9 col-sm-offset-3">
                <p class="pull-right">
                  <span class="star">
                  </span>
                  marked fields are mandatory
                </p>
              </div>
              <div class="col-md-3">
                <label for="">
                  Height
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <select  name="height" id="input" data-title="Select Height"  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                 <option value="">Select</option>
                        
                         <option value="134" <?php if($res->height == '134') { ?> selected="selected" <?php } ?>>4ft 5in - 134cm</option>
                                  <option value="137" <?php if($res->height == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($res->height == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($res->height == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($res->height == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($res->height == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($res->height == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($res->height == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($res->height == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($res->height == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($res->height == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($res->height == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($res->height == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($res->height == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($res->height == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($res->height == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($res->height == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($res->height == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($res->height == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($res->height == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($res->height == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($res->height == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($res->height == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($res->height == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($res->height == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($res->height == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($res->height == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($res->height == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($res->height == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($res->height == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($res->height == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($res->height == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="">
                  Skin Tone
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-9">
               <div class="form-group">
                   <select  name="skin_tone" id="input" data-title="Select Height"  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                           <option value="">Select</option>
                           <option value="Very Fair" <?php if($res->skin_tone == 'Very Fair') { ?> selected="selected" <?php } ?>>Very Fair</option>
                            <option value="Fair" <?php if($res->skin_tone == 'Fair') { ?> selected="selected" <?php } ?>>Fair</option>
                              <option value="Wheatish" <?php if($res->skin_tone == 'Wheatish') { ?> selected="selected" <?php } ?>>Wheatish</option>
                                <option value="Dark" <?php if($res->skin_tone == 'Dark') { ?> selected="selected" <?php } ?>>Dark</option>
                          </select>
                </div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-3">
                <label for="">
                  Body Type
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                   <select  name="body_type" id="input" data-title="Select Height"  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                           <option value="">Select</option>
                          
                            <option value="Slim" <?php if($res->body_type == 'Slim') { ?> selected="selected" <?php } ?>>Slim</option>
                            <option value="Athletic" <?php if($res->body_type == 'Athletic') { ?> selected="selected" <?php } ?>>Athletic</option>
                            <option value="Average" <?php if($res->body_type == 'Average') { ?> selected="selected" <?php } ?>>Average</option>
                            <option value="Heavy" <?php if($res->body_type == 'Heavy') { ?> selected="selected" <?php } ?>>Heavy</option>
                          </select>
                </div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-3">
                <label for="">
                  Smoke
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                   <select  name="smoke" id="input" data-title="Select Height"  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                           <option value="">Select</option>
                          <option value="No" <?php if($res->smoke == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($res->smoke == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($res->smoke == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                          </select>
                </div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-3">
                <label for="">
                  Drink
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                   <select  name="drink" id="input" data-title="Select Height"  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                           <option value="">Select</option>
                           <option value="No" <?php if($res->drink == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($res->drink == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($res->drink == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                          </select>
                </div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-3">
                <label for="">
                  Diet
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <select  name="diet" id="input" data-title="Select "  data-style="mystyle btn-lg" class="form-control required" data-live-search="true" data-width="100%" >
                  <option value="" >Select</option>
                    <option value="Veg" label="Veg">Veg</option>
    <option value="Non-Veg" label="Non-Veg">Non-Veg</option>
    <option value="Occasionally Non-Veg" label="Occasionally Non-Veg">Occasionally Non-Veg</option>
    <option value="Eggetarian" label="Eggetarian">Eggetarian</option>
    <option value="Jain" label="Jain">Jain</option>
    <option value="Vegan" label="Vegan">Vegan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-9 col-sm-offset-3">
               <button type="submit" name="submit" id="submit-form2" class="btn btn-lg btn-primary">
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
	        $("#submit-form2").click(function(){
	        	if( validatrix( $("#reg2-form") ) ){
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

$sql = "UPDATE `profiles` SET  `height` =  '$height',
`skin_tone` =  '$skin_tone',
`body_type` =  '$body_type',
`smoke` =  '$smoke',
`drink` =  '$drink',
`diet` =  '$diet' WHERE  `code` ='$token'";
$result = mysql_query($sql);
if($result)
{
	echo "<script>document.location.href='register_step3.php?token=$token'</script>";
}

}
?>