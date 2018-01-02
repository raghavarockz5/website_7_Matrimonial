<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
<div class="container"><ol class="breadcrumb">
  <li>
    <a href="index.php">Home</a>
  </li>
  <li>
    <a href="#">Registration</a>
  </li>
  <li class="active">Partner Preferences</li>
</ol></div>
</div>
<section class="content greybg">
  <!--<div class="panel page_head01">
    <div class="container">
      <h2 class="text-center">
       Set your Partner Preferences & find the right Matches...

      </h2>
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
    <div class="boxed hr_form row">
        <form id="reg-form" class="hr_form" method="post" action="" enctype="multipart/form-data" >
           <input type="hidden" name="token" value="<?php echo $res->code; ?>" />
       
      <div class="row">
         <div class="col-md-4">
                <label for="">
                Age
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-4">
                <div class="form-group">
               <select  name="looking_age_from" class="select" data-style="mystyle btn-lg" data-title="From"  data-width="100%">
                <option value="">select</option>
                   <?php
				   for($i=18;$i<=60;$i++) {
				   ?>
                   <option value="<?php echo $i; ?>" <?php if($i==$resm->looking_age_from) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                   <?php } ?>
               </select>
            
                </div>
              </div>
                 <div class="col-md-4">
                <div class="form-group">
               <select name="looking_age_to" class="select" data-style="mystyle btn-lg" data-title="to"  data-width="100%">
               <option value="">select</option>
                 <?php
				   for($i=18;$i<=60;$i++) {
				   ?>
                   <option value="<?php echo $i; ?>" <?php if($i==$resm->looking_age_to) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                   <?php } ?>
               </select>
            
                </div>
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
                  <select name="looking_martial_status[]" id="input"  data-title="Select Marital Status"  data-style="mystyle btn-lg" class="select" data-width="100%" multiple>
                   <option value="">Doesn't Matter</option>
                   <option value="Never Married" <?php if(isset($msb['Never Married'])) { ?> selected="selected" <?php } ?>>Never Married</option>
                           <option value="Divorced" <?php if(isset($msb['Divorced'])) { ?> selected="selected" <?php } ?>>Divorced</option>
                           <option value="Widowed" <?php if(isset($msb['Widowed'])) { ?> selected="selected" <?php } ?>>Widowed</option>
                           <option value="Awaiting Divorce" <?php if(isset($msb['Awaiting Divorce'])) { ?> selected="selected" <?php } ?>>Awaiting Divorce</option>
                             <option value="Annulled" <?php if(isset($msb['Annulled'])) { ?> selected="selected" <?php } ?>>Annulled</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Country Living in
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="country" id="input" data-title="Select State" data-live-search="true" data-style="mystyle btn-lg" class="form-control" data-width="100%"  onChange="get_states(this.value);">
                    <option value="">Select</option>
                          <?php
						  $sqld = "select * from `countries` order by `country`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($resm->looking_country == 
$resd->entry_id) { ?> selected <?php } ?>><?php echo $resd->country; ?></option>
                          <?php } ?>
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
                  <select name="state" id="state" data-title="Select State" data-live-search="true" data-style="mystyle btn-lg" class="form-control"  data-width="100%" onChange="get_cities(this.value);">
                     <option value="">Select</option>
                          <?php
						  $sqld = "select * from `states` where `country` = $resm->looking_country order by `state`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($resm->looking_state == 
$resd->entry_id) { ?> selected <?php } ?>><?php echo $resd->state; ?></option>
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
                  <select name="city" id="city" data-title="Select City" data-live-search="true" data-style="mystyle btn-lg" class="form-control"  data-width="100%">
                    <option value="">Select</option>
                      <?php
						  $sqld = "select * from `cities` where `state` = $resm->looking_state order by `city`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($resm->looking_city == 
$resd->entry_id) { ?> selected <?php } ?>><?php echo $resd->city; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              
                <div class="col-md-4">
                <label for="">
                  Mother Tongue
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_mother_tongue[]"  id="input" data-title="Select Gothram" data-style="mystyle btn-lg" class="select" data-width="100%" multiple>
                    <option value="">Doesn't Matter</option>
                    <?php
						  $sqld = "select * from `mother_tongue` order by `mother_tongue`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->mother_tongue; ?>" <?php if(isset($msb[$resd->mother_tongue])) { ?> selected="selected" <?php } ?>><?php echo $resd->mother_tongue; ?></option>
                          <?php } ?>
                  </select>
                </div>
              </div>
              
                <div class="col-md-4">
                <label for="">
                  Religion
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_religion[]"  id="input" data-title="Select Gothram" data-style="mystyle btn-lg" class="select" data-width="100%" multiple>
                    <option value="">Doesn't Matter</option>
                    <?php
						  $sqld = "select * from `religion` order by `religion`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->religion; ?>" <?php if(isset($msb[$resd->religion])) { ?> selected="selected" <?php } ?>><?php echo $resd->religion; ?></option>
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
                  <select name="looking_community[]" id="input" data-title="Select Community" data-live-search="true" data-style="mystyle btn-lg" class="select" data-width="100%" multiple>
                    <option value="">Doesn't Matter</option>
                    <?php
						  $sqld = "select * from `communities` order by `community`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->community; ?>" <?php if(isset($msb[$resd->community])) { ?> selected="selected" <?php } ?>><?php echo $resd->community; ?></option>
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
              <div class="col-md-8">
                <div class="form-group">
                  <select  name="looking_gothram[]" id="input" data-title="Select Gothram" data-style="mystyle btn-lg" class="select" data-width="100%" multiple>
                     <option value="">Doesn't Matter</option>
                    <?php
						  $sqld = "select * from `gothram` order by `gothram`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->gothram; ?>" <?php if(isset($msb[$resd->gothram])) { ?> selected="selected" <?php } ?>><?php echo $resd->gothram; ?></option>
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
                  <select name="looking_nakshatra[]" id="input" data-title="Select Nakshatra" data-style="mystyle btn-lg" class="select" data-width="100%" multiple>
                    <option value="">Doesn't Matter</option>
                    <?php
						  $sqld = "select * from `nakshatra` order by `nakshatra`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->nakshatra; ?>" <?php if(isset($msb[$resd->nakshatra])) { ?> selected="selected" <?php } ?>><?php echo $resd->nakshatra; ?></option>
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
                <div class="form-group">  
             <select name="looking_kuja_dosham" data-style="mystyle btn-lg" class="select" data-width="100%" >
                           <option value="">Select</option>
                           <option value="Yes" <?php if($resm->looking_kuja_dosham == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                           <option value="No" <?php if($resm->looking_kuja_dosham == 'No') { ?> selected="selected" <?php } ?>>No</option>
                           <option value="Don't Know" <?php if($resm->looking_kuja_dosham == "Don't Know") { ?> selected="selected" <?php } ?>>Don't Know</option>
                          </select>
             </div>
              </div>
        
            </div>
          <h3> Lifestyle & Appearance </h3>
          <hr/>
              <div class="row">
    
              <div class="col-md-4">
                <label for="">
                  Height
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select  name="looking_height_from" id="input" data-title="Select Height"  data-style="mystyle btn-lg" class="select" data-live-search="true" data-width="100%" >
                   <option value="">From</option>
                  <option value="134" <?php if($resm->looking_height_from == '134') { ?> selected="selected" <?php } ?>>4ft 5in - 134cm</option>
                                  <option value="137" <?php if($resm->looking_height_from == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($resm->looking_height_from == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($resm->looking_height_from == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($resm->looking_height_from == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($resm->looking_height_from == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($resm->looking_height_from == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($resm->looking_height_from == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($resm->looking_height_from == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($resm->looking_height_from == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($resm->looking_height_from == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($resm->looking_height_from == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($resm->looking_height_from == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($resm->looking_height_from == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($resm->looking_height_from == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($resm->looking_height_from == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($resm->looking_height_from == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($resm->looking_height_from == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($resm->looking_height_from == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($resm->looking_height_from == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($resm->looking_height_from == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($resm->looking_height_from == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($resm->looking_height_from == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($resm->looking_height_from == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($resm->looking_height_from == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($resm->looking_height_from == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($resm->looking_height_from == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($resm->looking_height_from == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($resm->looking_height_from == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($resm->looking_height_from == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($resm->looging_height_from == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($resm->looking_height_from == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select  name="looking_height_to" id="input" data-title="Select Height"  data-style="mystyle btn-lg" class="select" data-live-search="true" data-width="100%" >
                    <option value="">To</option>
                  <option value="134" <?php if($resm->looking_height_to == '134') { ?> selected="selected" <?php } ?>>4ft 5in - 134cm</option>
                                  <option value="137" <?php if($resm->looking_height_to == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($resm->looking_height_to == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($resm->looking_height_to == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($resm->looking_height_to == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($resm->looking_height_to == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($resm->looking_height_to == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($resm->looking_height_to == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($resm->looking_height_to == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($resm->looking_height_to == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($resm->looking_height_to == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($resm->looking_height_to == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($resm->looking_height_to == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($resm->looking_height_to == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($resm->looking_height_to == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($resm->looking_height_to == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($resm->looking_height_to == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($resm->looking_height_to == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($resm->looking_height_to == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($resm->looking_height_to == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($resm->looking_height_to == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($resm->looking_height_to == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($resm->looking_height_to == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($resm->looking_height_to == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($resm->looking_height_to == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($resm->looking_height_to == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($resm->looking_height_to == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($resm->looking_height_to == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($resm->looking_height_to == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($resm->looking_height_to == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($resm->looking_height_to == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($resm->looking_height_to == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <label for="">
                  Skin Tone
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">    
             <select name="looking_skin_tone" class="select" data-style="mystyle btn-lg"   data-width="100%" > 
            <option value="">Doesn't Matter</option>
            <option value="Very Fair" <?php if($resm->looking_skin_tone == 'Very Fair') { ?> selected="selected" <?php } ?>>Very Fair</option>
                            <option value="Fair" <?php if($resm->looking_skin_tone == 'Fair') { ?> selected="selected" <?php } ?>>Fair</option>
                              <option value="Wheatish" <?php if($resm->looking_skin_tone == 'Wheatish') { ?> selected="selected" <?php } ?>>Wheatish</option>
                                <option value="Dark" <?php if($resm->looking_skin_tone == 'Dark') { ?> selected="selected" <?php } ?>>Dark</option>
                                </select></div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-4">
                <label for="">
                  Body Type
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">  
          <select name="looking_body_type" class="select" data-style="mystyle btn-lg"   data-width="100%" > 
          <option value="">Doesn't Matter</option>   
          <option value="looking_body_type" <?php if($resm->looking_body_type == 'Slim') { ?> selected="selected" <?php } ?>>Slim</option>
                            <option value="Athletic" <?php if($resm->looking_body_type == 'Athletic') { ?> selected="selected" <?php } ?>>Athletic</option>
                            <option value="Average" <?php if($resm->looking_body_type == 'Average') { ?> selected="selected" <?php } ?>>Average</option>
                            <option value="Heavy" <?php if($resm->looking_body_type == 'Heavy') { ?> selected="selected" <?php } ?>>Heavy</option>
                            </select>
          </div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-4">
                <label for="">
                  Smoke
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">  
             <select name="looking_smoke" class="select" data-style="mystyle btn-lg"   data-width="100%">
             <option value="">Doesn't Matter</option>
             <option value="No" <?php if($resm->looking_smoke == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($resm->looking_smoke == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($resm->looking_smoke == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                            </select>
             </div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-4">
                <label for="">
                  Drink
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
               <div class="form-group">      
         <select name="looking_drink" class="select" data-style="mystyle btn-lg"   data-width="100%">
                          <option value="">Doesn't Matter</option>
                         
                            <option value="No" <?php if($resm->looking_drink == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($resm->looking_drink == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($resm->looking_drink == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                           
                             
                          </select>
         </div>
              </div>
              <div class="col-md-12">
              </div>
              <div class="col-md-4">
                <label for="">
                  Diet
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                 <div class="form-group">
                 <select name="looking_diet" class="select" data-style="mystyle btn-lg"   data-width="100%" >
                          <option value="">Doesn't Matter</option>
                         
                            <option value="Veg" <?php if($resm->looking_diet == 'Veg') { ?> selected="selected" <?php } ?>>Veg</option>
                            <option value="Non-Veg" <?php if($resm->looking_diet == 'Non-Veg') { ?> selected="selected" <?php } ?>>Non-Veg</option>
                            <option value="Occasionally Non-Veg" <?php if($resm->looking_diet == 'Occasionally Non-Veg') { ?> selected="selected" <?php } ?>>Occasionally Non-Veg</option>
                            <option value="Eggetarian" <?php if($resm->looking_diet == 'Eggetarian') { ?> selected="selected" <?php } ?>>Eggetarian</option>
                            <option value="Jain" <?php if($resm->looking_diet == 'Jain') { ?> selected="selected" <?php } ?>>Jain</option>
                            <option value="Vegan" <?php if($resm->looking_diet == 'Vegan') { ?> selected="selected" <?php } ?>>Vegan</option>
                           
                           
                             
                          </select>
                </div>
              </div>
      
            </div>
            <h3>Education & Profession Details</h3>
            <hr/>
                <div class="row">
           
              <div class="col-md-4">
                <label for="">
                  Education Level
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select  name="looking_education_level[]" id="input" data-title="Select "  data-style="mystyle btn-lg" class="select" data-live-search="true" data-width="100%" multiple>
                  <option value="">Doesn't Matter</option>
                    <?php
						  $sqld = "select * from `education_level` order by `education_level`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->education_level; ?>" <?php if(isset($msb[$resd->education_level])) { ?> selected="selected" <?php } ?>><?php echo $resd->education_level; ?></option>
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
                  <select name="looking_education[]" id="input"  data-title="Select "  data-style="mystyle btn-lg" data-live-search="true" class="select" data-width="100%" multiple>
                  <option value="">Doesn't Matter</option>
                    <?php
						  $sqld = "select * from `education` order by `education`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->education; ?>" <?php if(isset($msb[$resd->education])) { ?> selected="selected" <?php } ?>><?php echo $resd->education; ?></option>
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
                  <select name="looking_working_area[]" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg"  class="select" data-width="100%" multiple>
                   <?php
						  $sqld = "select * from `working_area` order by `working_area`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->working_area; ?>" <?php if(isset($msb[$resd->working_area])) { ?> selected="selected" <?php } ?>><?php echo $resd->working_area; ?></option>
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
                  <select name="looking_working_as[]" id="input" data-title="Select" data-live-search="true" data-style="mystyle btn-lg" class="select" data-width="100%" multiple>
                   <?php
						  $sqld = "select * from `working_as` order by `working_as`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->working_as; ?>" <?php if(isset($msb[$resd->working_as])) { ?> selected="selected" <?php } ?>><?php echo $resd->working_as; ?></option>
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
                  <select name="looking_annual_income" id="input" data-title="Select " data-live-search="true" data-style="mystyle btn-lg" class="select" data-width="100%" >
                  <option value="">Doesn't Matter</option>
                         <option value="Upto INR 1 Lakh" <?php if($resm->looking_annual_income == 'Upto INR 1 Lakh') { ?> selected <?php } ?> >Upto INR 1 Lakh</option>
    <option value="INR 1 Lakh to 2 Lakh" <?php if($resm->looking_annual_income == 'INR 1 Lakh to 2 Lakh') { ?> selected <?php } ?>>INR 1 Lakh to 2 Lakh</option>
    <option value="INR 2 Lakh to 4 Lakh" <?php if($resm->looking_annual_income == 'INR 2 Lakh to 4 Lakh') { ?> selected <?php } ?> >INR 2 Lakh to 4 Lakh</option>
    <option value="INR 4 Lakh to 7 Lakh" <?php if($resm->looking_annual_income == 'INR 4 Lakh to 7 Lakh') { ?> selected <?php } ?> >INR 4 Lakh to 7 Lakh</option>
    <option value="INR 7 Lakh to 10 Lakh" <?php if($resm->looking_annual_income == 'INR 7 Lakh to 10 Lakh') { ?> selected <?php } ?> >INR 7 Lakh to 10 Lakh</option>
    <option value="INR 10 Lakh to 15 Lakh" <?php if($resm->looking_annual_income == 'INR 10 Lakh to 15 Lakh') { ?> selected <?php } ?> >INR 10 Lakh to 15 Lakh</option>
    <option value="INR 15 Lakh to 20 Lakh" <?php if($resm->looking_annual_income == 'INR 15 Lakh to 20 Lakh') { ?> selected <?php } ?>>INR 15 Lakh to 20 Lakh</option>
    <option value="INR 20 Lakh to 30 Lakh" <?php if($resm->looking_annual_income == 'INR 20 Lakh to 30 Lakh') { ?> selected <?php } ?>>INR 20 Lakh to 30 Lakh</option>
    <option value="INR 30 Lakh to 50 Lakh" <?php if($resm->looking_annual_income == 'INR 30 Lakh to 50 Lakh') { ?> selected <?php } ?> >INR 30 Lakh to 50 Lakh</option>
    <option value="INR 50 Lakh to 75 Lakh"<?php if($resm->looking_annual_income == 'INR 50 Lakh to 75 Lakh') { ?> selected <?php } ?>>INR 50 Lakh to 75 Lakh</option>
    <option value="INR 75 Lakh to 1 Crore" <?php if($resm->looking_annual_income == 'INR 75 Lakh to 1 Crore') { ?> selected <?php } ?> >INR 75 Lakh to 1 Crore</option>
    <option value="INR 1 Crore & above" <?php if($resm->looking_annual_income == 'INR 1 Crore & above') { ?> selected <?php } ?> >INR 1 Crore &amp; above</option>
    
                  </select>
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
	$community = implode(',',$_POST['looking_community']);
	$gothram = implode(',',$_POST['looking_gothram']);
	$nakshatra = implode(',',$_POST['looking_nakshatra']);
	$education_level = implode(',',$_POST['looking_education_level']);
	$working_area = implode(',',$_POST['looking_working_area']);
	$working_as = implode(',',$_POST['looking_working_as']);
	$education = implode(',',$_POST['looking_education']);
	$mother_tongue = implode(',',$_POST['looking_mother_tongue']);
	$religion = implode(',',$_POST['looking_religion']);
	$martial_status = implode(',',$_POST['looking_martial_status']);
	
foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);


			 
$sql = "UPDATE `profiles` SET `looking_age_from` = '$looking_age_from', `looking_age_to` = '$looking_age_to', `looking_height_from` = '$looking_height_from', `looking_height_to` = '$looking_height_to', `looking_martial_status` = '$martial_status', `looking_religion` = '$religion', `looking_mother_tongue` = '$mother_tongue', `looking_community` = '$community', `looking_kuja_dosham` = '$looking_kuja_dosham', `looking_gothram` = '$gothram', `looking_profile_created_by` = '$looking_profile_created_by', `looking_country` = '$country', `looking_state` = '$state', `looking_city` = '$city', `looking_education` = '$education', `looking_working_area` = '$working_area', `looking_working_as` = '$working_as', `looking_annual_income` = '$looking_annual_income', `looking_diet` = '$looking_diet', `looking_smoke` = '$looking_smoke', `looking_drink` = '$looking_drink', `looking_body_type` = '$looking_body_type', `looking_skin_tone` = '$looking_skin_tone', `looking_disability` = '$looking_disability', `looking_nakshatra` = '$nakshatra', `looking_education_level` = '$education_level' WHERE `code` = '$token'";
$result = mysql_query($sql);
if($result)
{
 echo "<script>document.location.href='success.php?token=$token'</script>";
} 

}
?>