<?php require_once'includes/header.php'; ?>
<?php require_once'includes/auth.php'; ?>
<div class="breadcrumb_wrapper">

   <div class="container">

      <ol class="breadcrumb">

         <li>

            <a href="index.php">

            Home

            </a>

         </li>

        

         <li class="active">

            Dashboard

         </li>

      </ol>

   </div>

</div>

<section class="content greybg">

   <div class="container">

      <div class="row">

      <?php require_once'includes/dashboard_sidebar.php'; ?>

       

         <div class="col-md-9">

  <h2 class="modren_title">My Profile</h2>

            <div class="panel panel_custom2">



               <div class="row valign-wrapper">

                  <div class="col-md-2">
                  <?php
				  if($res_user->gender == 'Male') { $path = "images/profile.gif"; } else { $path = "images/female.jpg"; }
				  $sqli = "select * from `images` where `profile_link` = $res_user->entry_id order by `pstatus` asc";
				  $resulti = mysql_query($sqli);
				  if(mysql_num_rows($resulti) > 0) {
					  $resi = mysql_fetch_object($resulti);
				  ?>
                  <img src="thumb/timthumb.php?src=profiles/<?php echo $resi->image; ?>&w=120&h=150&q=50">
                  <?php } else { 
                   $sqli = "select * from `images` where `profile_link` = $res_user->entry_id";
				  $resulti = mysql_query($sqli);
				  if(mysql_num_rows($resulti) > 0) {
					  $resi = mysql_fetch_object($resulti);
					?>
                     <img src="thumb/timthumb.php?src=profiles/<?php echo $resi->image; ?>&w=120&h=150&q=50">
                    
                  <?php } else  { ?>
                  <img src="thumb/timthumb.php?src=<?php echo $path; ?>&w=120&h=150&q=50">
                  <?php } } ?>
                  </div>

                  <div class="col-md-10">

                     <h3><?php echo $res_user->name; ?></h3>

                     <p>Profile Id : <strong>MP<?php echo $res_user->entry_id; ?></strong></p>

                      <?php
							 $sql_logs = "select * from `user_logs` where `user_link` = $res_user->entry_id";
							$result_logs = mysql_query($sql_logs);
							if(mysql_num_rows($result_logs) > 1) {
							$sql_logs = "select * from `user_logs` where `user_link` = $res_user->entry_id order by `entry_id` desc limit 1,1";
							$result_logs = mysql_query($sql_logs);
							$res_logs = mysql_fetch_object($result_logs);
							?>
                            	<p>Last Login Date &amp; Time : <?php echo $res_logs->date; ?></p><hr>
                            <?php } else { ?>
                            	<p>Last Login Date &amp; Time : First Login</p><hr>
                                <?php } ?>
                                

                  </div>

                  <!--<div class="col-md-3">

                     <a href="" class="btn btn-theme btn-block"><i class="fa fa-phone"></i> Edit Phone Numbers</a>

                     <a href="" class="btn btn-danger btn-block"><i class="fa fa-envelope"></i> Edit/Add New Mail ID</a>

                  </div>-->

               </div>

            </div>
          <?php 
          if($res_user->looking_community != '')
	 {
	 $communities = explode(',',$res_user->looking_community); 
	 $c=count($communities);
	  for($i=0;$i<$c;$i++) {
	   if($i==0)
	   {
	    $communities_qry = " and (find_in_set('$communities[$i]',`community`)";
	   } else {
	   $communities_qry = $communities_qry." or find_in_set('$communities[$i]',`community`)";
	   }
	  }
	  $communities_qry = $communities_qry.")";
	 } else {
	  $communities_qry = "";
	 }
	 
	 $sqlm = "select * from `profiles` where `status` = 'Active' and `gender` != '$res_user->gender' $communities_qry limit 0,10";
	 $resultm = mysql_query($sqlm);
	 if(mysql_num_rows($resultm) > 0) {
          ?>
            <div class="panel panel_custom2">

               <h2 class="modren_title">Matching Profiles You May Like</h2>

               <div class="owl-carousel myslider" data-items="5" data-margin="5" data-nav="true" >

                  <?php while($resm = mysql_fetch_object($resultm)) { 
				  $sqld = "select * from `countries` where `entry_id` = $resm->country";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $country = $resd->country;
			 $sqld = "select * from `states` where `entry_id` = $resm->state";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $state = $resd->state;
			 $sqld = "select * from `cities` where `entry_id` = $resm->city";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $city = $resd->city;
				  ?>

                  <div class="item scroll_profiles">

                      <?php $sqli = "select * from `images` where `profile_link` = $resm->entry_id order by `pstatus` asc";
				$resulti = mysql_query($sqli);
				if(mysql_num_rows($resulti) > 0) { 
				$resi = mysql_fetch_object($resulti); ?>
                <img class="media-object" src="thumb/timthumb.php?src=profiles/<?php echo $resi->image; ?>&w=230&h=230" alt="..."/>
                <?php } else { ?>
                  <img class="media-object" src="images/thumb.png" alt="..."/>
                  <?php } ?>

                     <span>

                        <a href="profile_view.php?pid=<?php echo $resm->code; ?>" class="btn-link">view profile <i class="fa fa-caret-right"></i></a>

                        <ul>

                           <li>MP<?php echo $resm->entry_id; ?>, (<?php echo age($resm->dob); ?> Yrs)</li>

                           <li><?php echo $ress->working_as; ?></li>

                           <li><?php $ht = round(($resm->height/30.48),1);  $f =explode('.',$ht); echo $f[0].' ft '; $in = ceil(((12/100)*$f[1])*10); echo $in.' in'; ?>, <?php echo $city; ?></li>

                        </ul>

                        <a href="javascript:sendint(<?php echo $resm->entry_id; ?>);" class="btn btn-success btn-block btn-sm"><i class="fa fa-heart"></i> Express Interest</a>

                     </span>

                  </div>

                  <?php }?>

               </div>

            </div>
            <?php } ?>
               <?php
			   if($_GET['msg'] == 'update') {
			   ?>
               <h4 align="center" style="color:#060;">Profile Updated Successfully</h4>
               <?php } ?>
            <div class="panel panel_custom2">

               <h2 class="modren_title">Primary Details <a class="modren_title_link" data-toggle="collapse" href="#PrimaryDetails"></a></h2>

               <div class="collapse" id="PrimaryDetails">

                  <div class="simppleform">
 <form id="reg-form1" class="hr_form" method="post" action="" >
                     <table width="501" border="0" cellpadding="0" cellspacing="10" >

                        <tbody>

                           

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>Name</strong> <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left"><input name="name" id="name" value="<?php echo $res_user->name; ?>" type="text" class="required"></td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>Father Status </strong> <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">
                                           <select name="father_status" class="form-control required" >
                           <option value="">Select</option>
                         
                            <option value="Employed" <?php if($res_user->father_status == 'Employed') { ?> selected="selected" <?php } ?>>Employed</option>
                            <option value="Business" <?php if($res_user->father_status == 'Business') { ?> selected="selected" <?php } ?>>Business</option>
                            <option value="Employed" <?php if($res_user->father_status == 'Retired') { ?> selected="selected" <?php } ?>>Retired</option>
                            <option value="Employed" <?php if($res_user->father_status == 'Not Employed') { ?> selected="selected" <?php } ?>>Not Employed</option>
                            <option value="Employed" <?php if($res_user->father_status == 'Passed Away') { ?> selected="selected" <?php } ?>>Passed Away</option>
                        
                           
                             
                          </select>
                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                          

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>Mother Status</strong> <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">
                                           <select name="mother_status" class="form-control required" >
                           <option value="">Select</option>
                         
                            <option value="Employed" <?php if($res_user->mother_status == 'Employed') { ?> selected="selected" <?php } ?>>Employed</option>
                            <option value="Homemaker" <?php if($res_user->mother_status == 'Homemaker') { ?> selected="selected" <?php } ?>>Homemaker</option>
                            <option value="Business" <?php if($res_user->mother_status == 'Business') { ?> selected="selected" <?php } ?>>Business</option>
                            <option value="Retired" <?php if($res_user->mother_status == 'Retired') { ?> selected="selected" <?php } ?>>Retired</option>
                            <option value="Employed" <?php if($res_user->mother_status == 'Passed Away') { ?> selected="selected" <?php } ?>>Passed Away</option>
                          
                        
                           
                             
                          </select>
                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                          
                           <tr>

                              <td valign="top" align="left">

                                 <table width="600" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>No of Brothers</strong><strong> </strong></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="72" align="left"><input name="no_of_bros" id="no_of_bros" size="3" maxlength="2" value="<?php echo $res_user->no_of_bros; ?>" class="required" type="text"></td>

                                          <td valign="middle" width="145" align="left"><span class="bodytext"><strong>How many Married?</strong></span></td>

                                          <td valign="middle" width="187" align="left"><input name="no_of_married_bros" id="no_of_married_bros" size="3" maxlength="2" value="<?php echo $res_user->no_of_married_bros; ?>" class="required" type="text"></td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="600" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>No of Sisters </strong><strong> </strong></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="73" align="left"><input name="no_of_sis" id="no_of_sis" size="3" maxlength="2" value="<?php echo $res_user->no_of_sis; ?>" class="required" type="text"></td>

                                          <td valign="middle" width="145" align="left"><span class="bodytext"><strong>How many Married?</strong></span></td>

                                          <td valign="middle" width="186" align="left"><input name="no_of_married_sis" id="no_of_married_sis" size="3" maxlength="2" value="<?php echo $res_user->no_of_married_sis; ?>" class="required" type="text"></td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="501" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td valign="middle" width="177" align="left"><span class="bodytext"><strong>Gender</strong></span><span class="loginnow"> *</span></td>

                                          <td valign="middle" width="16" align="center"><span class="bodytext">:</span></td>

                                          <td valign="middle" width="31" align="center"><input name="gender" id="gender" value="Male" <?php if($res_user->gender == 'Male') { ?>checked="checked"<?php } ?> type="radio" class="required"></td>

                                          <td class="bodytext" valign="middle" width="61" align="left">Male</td>

                                          <td valign="middle" width="33" align="center"><input name="gender" id="gender" value="Female" <?php if($res_user->gender == 'Female') { ?>checked="checked"<?php } ?> class="required" type="radio"></td>

                                          <td class="bodytext" valign="middle" width="183">Female</td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>
 <?php
							$dob = explode('-',$res_user->dob);
							?>
                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>Date of Birth</strong> <span class="loginnow">* </span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">
                                              <table>
                                              <tr>
                                              <td>
                                              <select name="d"  class="required" id="fruits">
                          <option value="">
                            DD
                          </option>
                          <?php for($i=1;$i<=31;$i++) { ?>
                          <option value="<?php echo $i; ?>" <?php if($dob[0] == $i) { ?> selected <?php } ?>><?php echo $i; ?></option>
                         <?php } ?>
                        </select>
                         </td>
                         <td>
                         
                                             <select name="m" class="required" id="fruits">
                          <option value="">
                            MM
                          </option>
                          <option value="1" <?php if($dob[1] == 1) { ?> selected <?php } ?>>
                            Jan
                          </option>
                          <option value="2" <?php if($dob[1] == 2) { ?> selected <?php } ?>>
                            Feb
                          </option>
                          <option value="3" <?php if($dob[1] == 3) { ?> selected <?php } ?>>
                            Mar
                          </option>
                          <option value="4" <?php if($dob[1] == 4) { ?> selected <?php } ?>>
                            Apr
                          </option>
                          <option value="5" <?php if($dob[1] == 5) { ?> selected <?php } ?>>
                            May
                          </option>
                          <option value="6" <?php if($dob[1] == 6) { ?> selected <?php } ?>>
                            Jun
                          </option>
                          <option value="7" <?php if($dob[1] == 7) { ?> selected <?php } ?>>
                            July
                          </option>
                          <option value="8" <?php if($dob[1] == 8) { ?> selected <?php } ?>>
                            Aug
                          </option>
                          <option value="9" <?php if($dob[1] == 9) { ?> selected <?php } ?>>
                            Sep
                          </option>
                          <option value="10" <?php if($dob[1] == 10) { ?> selected <?php } ?>>
                            Oct
                          </option>
                          <option value="11" <?php if($dob[1] == 11) { ?> selected <?php } ?>>
                            Nov
                          </option>
                          <option value="12" <?php if($dob[1] == 12) { ?> selected <?php } ?>>
                            Dec
                          </option>
                        </select>
                       </td>
                       <td>
                                             <select  name="y" class="required" id="fruits">
                         <option value="">YY</option>
                         <?php
						 $y = date("Y");
						 $s = $y-18;
						 $e = $s-60;
						 for($i=$s;$i>$e;$i--) {
						 ?>
                         <option value="<?php echo $i; ?>" <?php if($dob[2] == $i) { ?> selected <?php } ?>><?php echo $i; ?></option>
                         <?php } ?>
                        </select>
                      </td>
                      </tr>
                      </table>
                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left"><strong>Height</strong> <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">

                                             <select name="height" class="form-control required" >
                           <option value="">Select</option>
                        
                         <option value="134" <?php if($res_user->height == '134') { ?> selected="selected" <?php } ?>>4ft 5in - 134cm</option>
                                  <option value="137" <?php if($res_user->height == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($res_user->height == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($res_user->height == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($res_user->height == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($res_user->height == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($res_user->height == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($res_user->height == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($res_user->height == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($res_user->height == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($res_user->height == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($res_user->height == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($res_user->height == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($res_user->height == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($res_user->height == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($res_user->height == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($res_user->height == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($res_user->height == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($res_user->height == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($res_user->height == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($res_user->height == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($res_user->height == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($res_user->height == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($res_user->height == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($res_user->height == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($res_user->height == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($res_user->height == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($res_user->height == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($res_user->height == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($res_user->height == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($res_user->height == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($res_user->height == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>

                          </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>Profile Created For </strong> <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">

                                             <select name="created_by" class="form-control required" >
                           <option value="">Select</option>
                           <option value="Myself" <?php if($res_user->created_by == 'Myself') { ?> selected="selected" <?php } ?>>Myself</option>
                           <option value="Son" <?php if($res_user->created_by == 'Son') { ?> selected="selected" <?php } ?>>Son</option>
                           <option value="Daughter" <?php if($res_user->created_by == 'Daughter') { ?> selected="selected" <?php } ?>>Daughter</option>
                           <option value="Brother" <?php if($res_user->created_by == 'Brother') { ?> selected="selected" <?php } ?>>Brother</option>
                           <option value="Sister" <?php if($res_user->created_by == 'Sister') { ?> selected="selected" <?php } ?>>Sister</option>
                           <option value="Relative" <?php if($res_user->created_by == 'Relative') { ?> selected="selected" <?php } ?>>Relative</option>
                            <option value="Friend" <?php if($res_user->created_by == 'Friend') { ?> selected="selected" <?php } ?>>Friend</option>
                          </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left"><strong>Martial Status </strong> <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">

                                             <select name="martial_status" class="form-control required" >
                           <option value="">Select</option>
                           <option value="Never Married" <?php if($res_user->martial_status == 'Never Married') { ?> selected="selected" <?php } ?>>Never Married</option>
                           <option value="Divorced" <?php if($res_user->martial_status == 'Divorced') { ?> selected="selected" <?php } ?>>Divorced</option>
                           <option value="Widowed" <?php if($res_user->martial_status == 'Widowed') { ?> selected="selected" <?php } ?>>Widowed</option>
                           <option value="Awaiting Divorce" <?php if($res_user->martial_status == 'Awaiting Divorce') { ?> selected="selected" <?php } ?>>Awaiting Divorce</option>
                             <option value="Annulled" <?php if($res_user->martial_status == 'Annulled') { ?> selected="selected" <?php } ?>>Annulled</option>
                          

                          </select>

                                          </td>

                                       </tr>
<tr>

                                             <td colspan="2" ></td>

                                             <td><input name="submit1" value="Update" id="submit-form1" class="btn btn-danger" type="submit"></td>

                                          </tr>
                                    </tbody>

                                 </table>

                              </td>

                           </tr>

 
                        </tbody>

                     </table>
                     </form>
                 

                  </div>

               </div>

               <ul class="modren_list col3">


                  <li><small>Name</small> <?php echo $res_user->name; ?></li>

                  <li><small>Father Status </small> <?php echo $res_user->father_status; ?></li>


                  <li><small>Mother Status</small> <?php echo $res_user->mother_status; ?></li>

                 

                  <li><small>Brothers</small> <?php echo $res_user->no_of_bros; ?></li>
                  <li><small>Married Brothers</small> <?php echo $res_user->no_of_married_bros; ?></li>
                  <li><small>Sisters</small> <?php echo $res_user->no_of_sis; ?></li>
                  <li><small>Married Sisters</small> <?php echo $res_user->no_of_married_sis; ?></li>

                  <li><small>Date Of Birth</small> <?php echo $res_user->dob; ?></li>
 <?php function age($date){
			 $adate = date("d-m-Y");
			 $diff = abs(strtotime($adate) - strtotime($date));

return $years = ceil($diff / (365*60*60*24));
							
							}
							?>
                  <li><small>Age</small> <?php echo age($res_user->dob); ?> Yrs</li>

                  <li><small>Height</small> <?php $ht = round(($res_user->height/30.48),1);  $f =explode('.',$ht); echo $f[0].' ft '; $in = ceil(((12/100)*$f[1])*10); echo $in.' in'; ?></li>

                 

                  <li><small>Profile Created For</small> <?php echo $res_user->created_by; ?></li>


                  <li><small>Martial Status</small> <?php echo $res_user->martial_status; ?></li>


            

               </ul>

               <h2 class="modren_title">Religious & Astrology <a class="modren_title_link" data-toggle="collapse" href="#ReligiousAstrology"></a></h2>

               <div class="collapse" id="ReligiousAstrology">

                  <div class="simppleform">

                     <td class="bodytext" valign="top" align="left">
 <form id="reg-form2" class="hr_form" method="post" action="" >
                        <table width="501" border="0" cellpadding="0" cellspacing="10">

                           <tbody>

                              <tr>

                                 <td valign="top" align="left">

                                    <table width="632" border="0" cellpadding="0" cellspacing="0">

                                       <tbody>

                                          <tr>

                                             <td class="bodytext" valign="middle" width="177" align="left"><strong>Religion </strong><span class="loginnow">*</span></td>

                                             <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                             <td valign="middle" width="437" align="left">

                                                <select  name="religion" class="form-control required" id="religion">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `religion` order by `religion`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->religion; ?>" <?php if($res_user->religion == 
$resd->religion) { ?> selected <?php } ?>><?php echo $resd->religion; ?></option>
                          <?php } ?>
                         </select>

                                             </td>

                                          </tr>

                                       </tbody>

                                    </table>

                                 </td>

                              </tr>

                              <tr>

                                 <td valign="top" align="left">

                                    <table width="632" border="0" cellpadding="0" cellspacing="0">

                                       <tbody>

                                          <tr>

                                             <td class="bodytext" valign="middle" width="177" align="left"><strong>Caste</strong> <span class="loginnow">*</span></td>

                                             <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                             <td valign="middle" width="437" align="left">

                                                <select  name="community" class="form-control required" id="community">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `communities` order by `community`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->community; ?>" <?php if($res_user->community == 
$resd->community) { ?> selected <?php } ?>><?php echo $resd->community; ?></option>
                          <?php } ?>
                         </select>

                                             </td>

                                          </tr>

                                       </tbody>

                                    </table>

                                 </td>

                              </tr>

                              

                              <tr>

                                 <td valign="top" align="left">

                                    <table width="476" border="0" cellpadding="0" cellspacing="0">

                                       <tbody>

                                          <tr>

                                             <td class="bodytext" valign="middle" width="178" align="left"><strong>Mother Tongue </strong> <span class="loginnow">*</span></td>

                                             <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                             <td valign="middle" width="281" align="left">

                                                <select  name="mother_tongue" class="form-control required" id="mother_tongue">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `mother_tongue` order by `mother_tongue`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->mother_tongue; ?>" <?php if($res_user->mother_tongue == 
$resd->mother_tongue) { ?> selected <?php } ?>><?php echo $resd->mother_tongue; ?></option>
                          <?php } ?>
                         </select>

                                             </td>

                                          </tr>

                                       </tbody>

                                    </table>

                                 </td>

                              </tr>

                              

                              

                              

                              

                              <tr>

                                 <td valign="top" align="left">

                                    <table width="476" border="0" cellpadding="0" cellspacing="0">

                                       <tbody>

                                          <tr>

                                             <td class="bodytext" valign="middle" width="178" align="left"><strong>Star </strong> <span class="loginnow">*</span></td>

                                             <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                             <td valign="middle" width="281" align="left">

                                                <select  name="nakshatra" class="form-control required" id="nakshatra">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `nakshatra` order by `nakshatra`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->nakshatra; ?>" <?php if($res_user->nakshatra == 
$resd->nakshatra) { ?> selected <?php } ?>><?php echo $resd->nakshatra; ?></option>
                          <?php } ?>
                         </select>

                                             </td>

                                          </tr>

                                       </tbody>

                                    </table>

                                 </td>

                              </tr>

                              

                              <tr>

                                 <td valign="top" align="left">

                                    <table width="476" border="0" cellpadding="0" cellspacing="0">

                                       <tbody>

                                          <tr>

                                             <td class="bodytext" valign="middle" width="178" align="left"><strong>Gothram</strong></td>

                                             <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                             <td valign="middle" width="281" align="left">
                                             <select  name="gothram" class="form-control" id="gothram">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `gothram` order by `gothram`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->gothram; ?>" <?php if($res_user->gothram == 
$resd->gothram) { ?> selected <?php } ?>><?php echo $resd->gothram; ?></option>
                          <?php } ?>
                         </select>
                                             </td>

                                          </tr>

                                          <tr>

                                             <td colspan="2" ></td>

                                             <td><input name="submit2" value="Update" id="submit-form2"  class="btn btn-danger" type="submit"></td>

                                          </tr>

                                       </tbody>

                                    </table>

                                 </td>

                              </tr>

                           </tbody>

                        </table>
                        </form>

                     </td>

                  </div>

               </div>

               <ul class="modren_list col3">

                  <li><small>Religion</small> <?php echo $res_user->religion; ?></li>

                  <li><small>Caste</small>  <?php echo $res_user->community; ?></li>


                  <li><small>Mother Tongue</small>  <?php echo $res_user->mother_tongue; ?></li>





                  <li><small>Star</small> <?php echo $res_user->nakshatra; ?></li>


                  <li><small>Gothram</small>  <?php echo $res_user->gothram; ?></li>

               </ul>

               <h2 class="modren_title">Education,Career & Life Style <a class="modren_title_link" data-toggle="collapse" href="#EducationCareerLifeStyle"></a></h2>

               <div class="collapse" id="EducationCareerLifeStyle">

                  <div class="simppleform">
 <form id="reg-form3" class="hr_form" method="post" action="" >
                     <table width="501" border="0" cellpadding="0" cellspacing="10">

                        <tbody>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left">Education <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">

                                             <select  name="education" class="form-control required" id="education">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `education` order by `education`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->education; ?>" <?php if($res_user->education == 
$resd->education) { ?> selected <?php } ?>><?php echo $resd->education; ?></option>
                          <?php } ?>
                         </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left"><strong>Occupation </strong><span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">

                                             <select  name="working_area" class="form-control required" id="working_area">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `working_area` order by `working_area`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->working_area; ?>" <?php if($res_user->working_area == 
$resd->working_area) { ?> selected <?php } ?>><?php echo $resd->working_area; ?></option>
                          <?php } ?>
                         </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left">Profession <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">

                                             <select  name="working_as" class="form-control required" id="working_as">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `working_as` order by `working_as`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->working_as; ?>" <?php if($res_user->working_as == 
$resd->working_as) { ?> selected <?php } ?>><?php echo $resd->working_as; ?></option>
                          <?php } ?>
                         </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left">Annual Income <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">
                                          <select  name="annual_income" class="form-control required" id="annual_income">
                          <option value="">Select</option>
                         <option value="Upto INR 1 Lakh" <?php if($res_user->annual_income == 'Upto INR 1 Lakh') { ?> selected <?php } ?> label="Upto INR 1 Lakh">Upto INR 1 Lakh</option>
    <option value="INR 1 Lakh to 2 Lakh" <?php if($res_user->annual_income == 'INR 1 Lakh to 2 Lakh') { ?> selected <?php } ?> label="INR 1 Lakh to 2 Lakh">INR 1 Lakh to 2 Lakh</option>
    <option value="INR 2 Lakh to 4 Lakh" <?php if($res_user->annual_income == 'INR 2 Lakh to 4 Lakh') { ?> selected <?php } ?> label="INR 2 Lakh to 4 Lakh">INR 2 Lakh to 4 Lakh</option>
    <option value="INR 4 Lakh to 7 Lakh" <?php if($res_user->annual_income == 'INR 4 Lakh to 7 Lakh') { ?> selected <?php } ?> label="INR 4 Lakh to 7 Lakh">INR 4 Lakh to 7 Lakh</option>
    <option value="INR 7 Lakh to 10 Lakh" <?php if($res_user->annual_income == 'INR 7 Lakh to 10 Lakh') { ?> selected <?php } ?> label="INR 7 Lakh to 10 Lakh">INR 7 Lakh to 10 Lakh</option>
    <option value="INR 10 Lakh to 15 Lakh" <?php if($res_user->annual_income == 'INR 10 Lakh to 15 Lakh') { ?> selected <?php } ?> label="INR 10 Lakh to 15 Lakh">INR 10 Lakh to 15 Lakh</option>
    <option value="INR 15 Lakh to 20 Lakh" <?php if($res_user->annual_income == 'INR 15 Lakh to 20 Lakh') { ?> selected <?php } ?> label="INR 15 Lakh to 20 Lakh">INR 15 Lakh to 20 Lakh</option>
    <option value="INR 20 Lakh to 30 Lakh" <?php if($res_user->annual_income == 'INR 20 Lakh to 30 Lakh') { ?> selected <?php } ?> label="INR 20 Lakh to 30 Lakh">INR 20 Lakh to 30 Lakh</option>
    <option value="INR 30 Lakh to 50 Lakh" <?php if($res_user->annual_income == 'INR 30 Lakh to 50 Lakh') { ?> selected <?php } ?> label="INR 30 Lakh to 50 Lakh">INR 30 Lakh to 50 Lakh</option>
    <option value="INR 50 Lakh to 75 Lakh"<?php if($res_user->annual_income == 'INR 50 Lakh to 75 Lakh') { ?> selected <?php } ?> label="INR 50 Lakh to 75 Lakh">INR 50 Lakh to 75 Lakh</option>
    <option value="INR 75 Lakh to 1 Crore" <?php if($res_user->annual_income == 'INR 75 Lakh to 1 Crore') { ?> selected <?php } ?> label="INR 75 Lakh to 1 Crore">INR 75 Lakh to 1 Crore</option>
    <option value="INR 1 Crore & above" <?php if($res_user->annual_income == 'INR 1 Crore & above') { ?> selected <?php } ?> label="INR 1 Crore &amp; above">INR 1 Crore &amp; above</option>
    <option value="Not applicable" <?php if($res_user->annual_income == 'Not applicable') { ?> selected <?php } ?> label="Not applicable">Not applicable</option>

                         </select>
                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>
                             
                             <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left">Skin Tone <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">

                                             <select name="skin_tone" class="form-control required" >
                           <option value="">Select</option>
                           <option value="Very Fair" <?php if($res_user->skin_tone == 'Very Fair') { ?> selected="selected" <?php } ?>>Very Fair</option>
                            <option value="Fair" <?php if($res_user->skin_tone == 'Fair') { ?> selected="selected" <?php } ?>>Fair</option>
                              <option value="Wheatish" <?php if($res_user->skin_tone == 'Wheatish') { ?> selected="selected" <?php } ?>>Wheatish</option>
                                <option value="Dark" <?php if($res_user->skin_tone == 'Dark') { ?> selected="selected" <?php } ?>>Dark</option>
                          </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>
                           
                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left">Body Type <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">

                                             <select name="body_type" class="form-control required" >
                           <option value="">Select</option>
                         
                            <option value="Slim" <?php if($res_user->body_type == 'Slim') { ?> selected="selected" <?php } ?>>Slim</option>
                            <option value="Athletic" <?php if($res_user->body_type == 'Athletic') { ?> selected="selected" <?php } ?>>Athletic</option>
                            <option value="Average" <?php if($res_user->body_type == 'Average') { ?> selected="selected" <?php } ?>>Average</option>
                            <option value="Heavy" <?php if($res_user->body_type == 'Heavy') { ?> selected="selected" <?php } ?>>Heavy</option>
                             
                          </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>
                           
                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left">Diet <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">

                                             <select name="diet" class="form-control required" >
                           <option value="">Select</option>
                         
                            <option value="Veg" <?php if($res_user->diet == 'Veg') { ?> selected="selected" <?php } ?>>Veg</option>
                            <option value="Non-Veg" <?php if($res_user->diet == 'Non-Veg') { ?> selected="selected" <?php } ?>>Non-Veg</option>
                            <option value="Occasionally Non-Veg" <?php if($res_user->diet == 'Occasionally Non-Veg') { ?> selected="selected" <?php } ?>>Occasionally Non-Veg</option>
                            <option value="Eggetarian" <?php if($res_user->diet == 'Eggetarian') { ?> selected="selected" <?php } ?>>Eggetarian</option>
                            <option value="Jain" <?php if($res_user->diet == 'Jain') { ?> selected="selected" <?php } ?>>Jain</option>
                            <option value="Vegan" <?php if($res_user->diet == 'Vegan') { ?> selected="selected" <?php } ?>>Vegan</option>
                           
                           
                             
                          </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left">Drinking<span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">

                                             <select name="drink" class="form-control required" >
                           <option value="">Select</option>
                         
                            <option value="No" <?php if($res_user->drink == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($res_user->drink == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($res_user->drink == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                           
                             
                          </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="178" align="left">Smoke <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="17" align="center">:</td>

                                          <td valign="middle" width="281" align="left">

                                             <select name="smoke" class="form-control required" >
                           <option value="">Select</option>
                         
                            <option value="No" <?php if($res_user->smoke == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($res_user->smoke == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($res_user->smoke == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                           
                             
                          </select>

                                          </td>

                                       </tr>

                                       <tr>

                                          <td></td>

                                          <td></td>

                                          <td >

                                             <button type="submit" name="submit3" id="submit-form3" class="btn btn-danger">Update</button>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                        </tbody>

                     </table>
                     </form>

                  </div>

               </div>

               <ul class="modren_list col3">

                  <li><small>Education </small> <?php echo $res_user->education; ?></li>

                  <li><small>Occupation</small> <?php echo $res_user->working_area; ?></li>

                  <li><small>Proffesion </small><?php echo $res_user->working_as; ?></li>

                  <li><small>Anual Income</small> <?php echo $res_user->annual_income; ?></li>

                  <li><small>Diet</small> <?php echo $res_user->diet; ?></li>

                  <li><small>Drink </small> <?php echo $res_user->drink; ?></li>

                  <li><small>Smoke </small> <?php echo $res_user->smoke; ?></li>
                  
                  <li><small>Skin Tone </small> <?php echo $res_user->skin_tone; ?></li>
                  <li><small>Body Type </small> <?php echo $res_user->body_type; ?></li>

               </ul>

               <h2 class="modren_title">My Contact Details <a class="modren_title_link" data-toggle="collapse" href="#MyContactDetails"></a></h2>

               <div class="collapse" id="MyContactDetails">

                  <div class="simppleform">
<form id="reg-form4" class="hr_form" method="post" action="" >
                     <table width="501" border="0" cellpadding="0" cellspacing="10">

                        <tbody>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left">Mobile Number <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left"><input name="mobile" id="mobile" value="<?php echo $res_user->mobile; ?>" type="text" class="required"></td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           

                           

                           

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left">Country <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">

                                             <select  name="country" class="form-control required" id="country" onChange="get_states(this.value);">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `countries` order by `country`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($res_user->country == 
$resd->entry_id) { ?> selected <?php } ?>><?php echo $resd->country; ?></option>
                          <?php } ?>
                         </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left">State <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">

                                             <select  name="state" class="form-control required" id="state" onChange="get_cities(this.value);">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `states` where `country` = $res_user->country order by `state`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($res_user->state == 
$resd->entry_id) { ?> selected <?php } ?>><?php echo $resd->state; ?></option>
                          <?php } ?>
                         </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="632" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       <tr>

                                          <td class="bodytext" valign="middle" width="177" align="left">City <span class="loginnow">*</span></td>

                                          <td class="bodytext" valign="middle" width="18" align="center">:</td>

                                          <td valign="middle" width="437" align="left">

                                             <select  name="city" class="form-control required" id="city" >
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `cities` where `state` = $res_user->state order by `city`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($res_user->city == 
$resd->entry_id) { ?> selected <?php } ?>><?php echo $resd->city; ?></option>
                          <?php } ?>
                         </select>

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                           <tr>

                              <td valign="top" align="left">

                                 <table width="476" border="0" cellpadding="0" cellspacing="0">

                                    <tbody>

                                       

                                       <tr>

                                          <td></td>

                                          <td></td>

                                          <td valign="top" width="281" align="left">

                                           

                                             <input name="submit4"  id="submit-form4" value="Update" class="btn btn-danger" type="submit">

                                          </td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </td>

                           </tr>

                        </tbody>

                     </table>
                     </form>

                  </div>

               </div>

               <ul class="modren_list col3">

                  <li><small>Mobile Number </small><?php echo $res_user->mob_code; ?> <?php echo $res_user->mobile; ?></li>

              
                  <li><small>Country  </small>
                  <?php
				  $sqld = "select * from `countries` where `entry_id` = $res_user->country";
				  $resultd = mysql_query($sqld);
				  $resd = mysql_fetch_object($resultd);
				  echo $resd->country;
				  ?>
                  </li>

                  <li><small>State</small>
                  <?php
				  $sqld = "select * from `states` where `entry_id` = $res_user->state";
				  $resultd = mysql_query($sqld);
				  $resd = mysql_fetch_object($resultd);
				  echo $resd->state;
				  ?>
                  </li>

                  <li><small>City </small>
                  <?php
				  $sqld = "select * from `cities` where `entry_id` = $res_user->city";
				  $resultd = mysql_query($sqld);
				  $resd = mysql_fetch_object($resultd);
				  echo $resd->city;
				  ?>
                  </li>

                  <li><small>Email ID</small><?php echo $res_user->email; ?></li>

                

               </ul>

               <h2 class="modren_title">Looking For <a class="modren_title_link" data-toggle="collapse" href="#LookingFor"></a></h2>

               <div class="collapse" id="LookingFor">

                  <div class="simppleform">

                   <form method="post" style="max-width: 500px">

       

      <div class="row">
         <div class="col-md-4">
                <label for="">
                Age
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
               <div class="row">
                 <div class="col-md-6"><select name="looking_age_from" data-title="from"  data-style="btn-default" class="select" data-width="100%">
                   <option value="">select</option>
                   <?php
				   for($i=18;$i<=60;$i++) {
				   ?>
                   <option value="<?php echo $i; ?>" <?php if($i==$res_user->looking_age_from) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                   <?php } ?>
                 </select></div>
                     <div class="col-md-6"><select name="looking_age_to" data-title="to"  data-style="btn-default" class="select" data-width="100%">
                   <option value="">select</option>
                   <?php
				   for($i=18;$i<=60;$i++) {
				   ?>
                   <option value="<?php echo $i; ?>" <?php if($i==$res_user->looking_age_to) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                   <?php } ?>
                 </select></div>
               </div>
            
                </div>
              </div>
           
        
              <div class="col-md-4">
                <label for="">
                  Marital Status
                  <span class="star">
                  </span>
                </label>
              </div>
              <?php
			  $martial_status = explode(',',$res_user->looking_martial_status);
			  $msb = array_flip($martial_status);
			  ?>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_martial_status[]" id="input"  data-title="Doesn't Matter"  data-style="btn-default" class="select" data-width="100%" multiple>
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
                  <select  name="looking_country" class="form-control" id="lcountry" onChange="get_lstates(this.value);">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `countries` order by `country`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($res_user->looking_country == 
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
                  <select  name="looking_state" class="form-control" id="lstate" onChange="get_lcities(this.value);">
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `states` where `country` = $res_user->looking_country order by `state`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($res_user->looking_state == 
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
                  <select  name="looking_city" class="form-control" id="lcity" >
                          <option value="">Select</option>
                          <?php
						  $sqld = "select * from `cities` where `state` = $res_user->looking_state order by `city`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->entry_id; ?>" <?php if($res_user->looking_city == 
$resd->entry_id) { ?> selected <?php } ?>><?php echo $resd->city; ?></option>
                          <?php } ?>
                         </select>
                </div>
              </div>
              
              <?php
			  $mother_tongue = explode(',',$res_user->looking_mother_tongue);
			  $msb = array_flip($mother_tongue);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Mother Tongue
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_mother_tongue[]" id="input" data-title="Doesn't Matter" data-live-search="true" data-style="btn-default" class="select" data-width="100%" multiple>
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
              
              
              <?php
			  $religion = explode(',',$res_user->looking_religion);
			  $msb = array_flip($religion);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Religion
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_religion[]" id="input" data-title="Doesn't Matter" data-live-search="true" data-style="btn-default" class="select" data-width="100%" multiple>
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
              
               <?php
			  $community = explode(',',$res_user->looking_community);
			  $msb = array_flip($community);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Community
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_community[]" id="input" data-title="Doesn't Matter" data-live-search="true" data-style="btn-default" class="select" data-width="100%" multiple>
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
               <?php
			  $gothram = explode(',',$res_user->looking_gothram);
			  $msb = array_flip($gothram);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Gothra / Gothram
                 
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_gothram[]" id="input" data-title="Doesn't Matter" data-live-search="true" data-style="btn-default" class="select" data-width="100%" multiple>
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
               <?php
			  $nakshatra = explode(',',$res_user->looking_nakshatra);
			  $msb = array_flip($nakshatra);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Nakshatra
                 
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_nakshatra[]" id="input" data-title="Doesn't Matter" data-style="btn-default" class="select" data-width="100%" multiple>
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
             <select name="looking_kuja_dosham" class="form-control" >
                           <option value="">Select</option>
                           <option value="Yes" <?php if($res_user->looking_kuja_dosham == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                           <option value="No" <?php if($res_user->looking_kuja_dosham == 'No') { ?> selected="selected" <?php } ?>>No</option>
                           <option value="Don't Know" <?php if($res_user->looking_kuja_dosham == "Don't Know") { ?> selected="selected" <?php } ?>>Don't Know</option>
                          </select>
             </div>
              </div>
        
            </div>

          <h3> Lifestyle & Appearance </h3>



              <div class="row">
    
              <div class="col-md-4">
                <label for="">
                  Height
                  <span class="star">
                  </span>
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                <div class="row">
                 <div class="col-md-6"><select name="looking_height_from" data-title="from"  data-style="btn-default" class="select" data-width="100%">
                   <option value="">From</option>
                  <option value="134" <?php if($res_user->looking_height_from == '134') { ?> selected="selected" <?php } ?>>4ft 5in - 134cm</option>
                                  <option value="137" <?php if($res_user->looking_height_from == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($res_user->looking_height_from == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($res_user->looking_height_from == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($res_user->looking_height_from == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($res_user->looking_height_from == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($res_user->looking_height_from == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($res_user->looking_height_from == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($res_user->looking_height_from == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($res_user->looking_height_from == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($res_user->looking_height_from == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($res_user->looking_height_from == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($res_user->looking_height_from == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($res_user->looking_height_from == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($res_user->looking_height_from == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($res_user->looking_height_from == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($res_user->looking_height_from == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($res_user->looking_height_from == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($res_user->looking_height_from == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($res_user->looking_height_from == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($res_user->looking_height_from == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($res_user->looking_height_from == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($res_user->looking_height_from == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($res_user->looking_height_from == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($res_user->looking_height_from == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($res_user->looking_height_from == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($res_user->looking_height_from == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($res_user->looking_height_from == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($res_user->looking_height_from == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($res_user->looking_height_from == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($res_user->looging_height_from == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($res_user->looking_height_from == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>
                 </select></div>
                     <div class="col-md-6"><select name="looking_height_to" data-title="to"  data-style="btn-default" class="select" data-width="100%">
                   <option value="">To</option>
                  <option value="134" <?php if($res_user->looking_height_to == '134') { ?> selected="selected" <?php } ?>>4ft 5in - 134cm</option>
                                  <option value="137" <?php if($res_user->looking_height_to == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($res_user->looking_height_to == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($res_user->looking_height_to == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($res_user->looking_height_to == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($res_user->looking_height_to == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($res_user->looking_height_to == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($res_user->looking_height_to == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($res_user->looking_height_to == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($res_user->looking_height_to == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($res_user->looking_height_to == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($res_user->looking_height_to == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($res_user->looking_height_to == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($res_user->looking_height_to == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($res_user->looking_height_to == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($res_user->looking_height_to == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($res_user->looking_height_to == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($res_user->looking_height_to == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($res_user->looking_height_to == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($res_user->looking_height_to == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($res_user->looking_height_to == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($res_user->looking_height_to == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($res_user->looking_height_to == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($res_user->looking_height_to == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($res_user->looking_height_to == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($res_user->looking_height_to == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($res_user->looking_height_to == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($res_user->looking_height_to == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($res_user->looking_height_to == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($res_user->looking_height_to == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($res_user->looking_height_to == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($res_user->looking_height_to == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>
                 </select></div>
               </div>
                 
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
             <select name="looking_skin_tone" class="form-control" > 
            <option value="">Doesn't Matter</option>
            <option value="Very Fair" <?php if($res_user->looking_skin_tone == 'Very Fair') { ?> selected="selected" <?php } ?>>Very Fair</option>
                            <option value="Fair" <?php if($res_user->looking_skin_tone == 'Fair') { ?> selected="selected" <?php } ?>>Fair</option>
                              <option value="Wheatish" <?php if($res_user->looking_skin_tone == 'Wheatish') { ?> selected="selected" <?php } ?>>Wheatish</option>
                                <option value="Dark" <?php if($res_user->looking_skin_tone == 'Dark') { ?> selected="selected" <?php } ?>>Dark</option>
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
          <select name="looking_body_type" class="form-control" > 
          <option value="">Doesn't Matter</option>   
          <option value="Slim" <?php if($res_user->looking_body_type == 'Slim') { ?> selected="selected" <?php } ?>>Slim</option>
                            <option value="Athletic" <?php if($res_user->looking_body_type == 'Athletic') { ?> selected="selected" <?php } ?>>Athletic</option>
                            <option value="Average" <?php if($res_user->looking_body_type == 'Average') { ?> selected="selected" <?php } ?>>Average</option>
                            <option value="Heavy" <?php if($res_user->looking_body_type == 'Heavy') { ?> selected="selected" <?php } ?>>Heavy</option>
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
             <select name="looking_smoke" class="form-control" >
             <option value="">Doesn't Matter</option>
             <option value="No" <?php if($res_user->looking_smoke == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($res_user->looking_smoke == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($res_user->looking_smoke == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
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
         <select name="looking_drink" class="form-control" >
                          <option value="">Doesn't Matter</option>
                         
                            <option value="No" <?php if($res_user->looking_drink == 'No') { ?> selected="selected" <?php } ?>>No</option>
                            <option value="Occasionally" <?php if($res_user->looking_drink == 'Occasionally') { ?> selected="selected" <?php } ?>>Occasionally</option>
                            <option value="Yes" <?php if($res_user->looking_drink == 'Yes') { ?> selected="selected" <?php } ?>>Yes</option>
                           
                             
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
                 <select name="looking_diet" class="form-control" >
                          <option value="">Doesn't Matter</option>
                         
                            <option value="Veg" <?php if($res_user->looking_diet == 'Veg') { ?> selected="selected" <?php } ?>>Veg</option>
                            <option value="Non-Veg" <?php if($res_user->looking_diet == 'Non-Veg') { ?> selected="selected" <?php } ?>>Non-Veg</option>
                            <option value="Occasionally Non-Veg" <?php if($res_user->looking_diet == 'Occasionally Non-Veg') { ?> selected="selected" <?php } ?>>Occasionally Non-Veg</option>
                            <option value="Eggetarian" <?php if($res_user->looking_diet == 'Eggetarian') { ?> selected="selected" <?php } ?>>Eggetarian</option>
                            <option value="Jain" <?php if($res_user->looking_diet == 'Jain') { ?> selected="selected" <?php } ?>>Jain</option>
                            <option value="Vegan" <?php if($res_user->looking_diet == 'Vegan') { ?> selected="selected" <?php } ?>>Vegan</option>
                           
                           
                             
                          </select>
                </div>
              </div>
      
            </div>

            <h3>Education & Profession Details</h3>

            

                <div class="row">

           

              

              

              

              

               <?php
			  $education_level = explode(',',$res_user->looking_education_level);
			  $msb = array_flip($education_level);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Education Level
                 
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_education_level[]" id="input" data-title="Doesn't Matter" data-style="btn-default" class="select" data-width="100%" multiple>
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
              
              
           
             <?php
			  $education = explode(',',$res_user->looking_education);
			  $msb = array_flip($education);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Education Field
                 
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_education[]" id="input" data-title="Doesn't Matter" data-style="btn-default" class="select" data-width="100%" multiple>
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
              
              
              <?php
			  $working_area = explode(',',$res_user->looking_working_area);
			  $msb = array_flip($working_area);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Working With
                 
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_working_area[]" id="input" data-title="Doesn't Matter" data-style="btn-default" class="select" data-width="100%" multiple>
                   <option value="">Doesn't Matter</option>
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
              
              
               <?php
			  $working_as = explode(',',$res_user->looking_working_as);
			  $msb = array_flip($working_as);
			  ?>
              <div class="col-md-4">
                <label for="">
                  Working As
                 
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <select name="looking_working_as[]" id="input" data-title="Doesn't Matter" data-style="btn-default" class="select" data-width="100%" multiple>
                   <option value="">Doesn't Matter</option>
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
                 <select  name="looking_annual_income"  id="input" data-title="Doesn't Matter" data-style="btn-default" class="select" data-width="100%">
                          <option value="">Doesn't Matter</option>
                         <option value="Upto INR 1 Lakh" <?php if($res_user->looking_annual_income == 'Upto INR 1 Lakh') { ?> selected <?php } ?> >Upto INR 1 Lakh</option>
    <option value="INR 1 Lakh to 2 Lakh" <?php if($res_user->looking_annual_income == 'INR 1 Lakh to 2 Lakh') { ?> selected <?php } ?>>INR 1 Lakh to 2 Lakh</option>
    <option value="INR 2 Lakh to 4 Lakh" <?php if($res_user->looking_annual_income == 'INR 2 Lakh to 4 Lakh') { ?> selected <?php } ?> >INR 2 Lakh to 4 Lakh</option>
    <option value="INR 4 Lakh to 7 Lakh" <?php if($res_user->looking_annual_income == 'INR 4 Lakh to 7 Lakh') { ?> selected <?php } ?> >INR 4 Lakh to 7 Lakh</option>
    <option value="INR 7 Lakh to 10 Lakh" <?php if($res_user->looking_annual_income == 'INR 7 Lakh to 10 Lakh') { ?> selected <?php } ?> >INR 7 Lakh to 10 Lakh</option>
    <option value="INR 10 Lakh to 15 Lakh" <?php if($res_user->looking_annual_income == 'INR 10 Lakh to 15 Lakh') { ?> selected <?php } ?> >INR 10 Lakh to 15 Lakh</option>
    <option value="INR 15 Lakh to 20 Lakh" <?php if($res_user->looking_annual_income == 'INR 15 Lakh to 20 Lakh') { ?> selected <?php } ?>>INR 15 Lakh to 20 Lakh</option>
    <option value="INR 20 Lakh to 30 Lakh" <?php if($res_user->looking_annual_income == 'INR 20 Lakh to 30 Lakh') { ?> selected <?php } ?>>INR 20 Lakh to 30 Lakh</option>
    <option value="INR 30 Lakh to 50 Lakh" <?php if($res_user->looking_annual_income == 'INR 30 Lakh to 50 Lakh') { ?> selected <?php } ?> >INR 30 Lakh to 50 Lakh</option>
    <option value="INR 50 Lakh to 75 Lakh"<?php if($res_user->looking_annual_income == 'INR 50 Lakh to 75 Lakh') { ?> selected <?php } ?>>INR 50 Lakh to 75 Lakh</option>
    <option value="INR 75 Lakh to 1 Crore" <?php if($res_user->looking_annual_income == 'INR 75 Lakh to 1 Crore') { ?> selected <?php } ?> >INR 75 Lakh to 1 Crore</option>
    <option value="INR 1 Crore & above" <?php if($res_user->looking_annual_income == 'INR 1 Crore & above') { ?> selected <?php } ?> >INR 1 Crore &amp; above</option>
    

                         </select>
                </div>
              </div>
                 
          
         

            

                  <div class="col-md-8 col-sm-offset-4">

                <button type="submit" name="submit5" class="btn btn-danger">

                  <b>

                    Update

                  </b>

                  <i class="fa fa-arrow-right">

                  </i>

                </button>

              </div>

  

            </div>

          </form>

                  </div>

               </div>

               <ul class="modren_list col3">


                  <li><small>Age</small><?php  if($res_user->looking_age_from != '') {  echo $res_user->looking_age_from; } ?> - <?php   if($res_user->looking_age_to != '') { echo $res_user->looking_age_to; } ?></li>

                  <li><small>Marital Status</small><?php echo $res_user->looking_martial_status; ?></li>


                   <li><small>Country  </small>
                  <?php
				  if($res_user->looking_country != 0) { 
				  $sqld = "select * from `countries` where `entry_id` = $res_user->looking_country";
				  $resultd = mysql_query($sqld);
				  $resd = mysql_fetch_object($resultd);
				  echo $resd->country;
				  } else { echo "-"; }
				  ?>
                  </li>

                  <li><small>State</small>
                   <?php
				  if($res_user->looking_state != 0) { 
				  $sqld = "select * from `states` where `entry_id` = $res_user->looking_state";
				  $resultd = mysql_query($sqld);
				  $resd = mysql_fetch_object($resultd);
				  echo $resd->state;
				  } else { echo "-"; }
				  ?>
                  </li>

                  <li><small>City </small>
                   <?php
				  if($res_user->looking_city != 0) { 
				  $sqld = "select * from `cities` where `entry_id` = $res_user->looking_city";
				  $resultd = mysql_query($sqld);
				  $resd = mysql_fetch_object($resultd);
				  echo $resd->city;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Mother Tongue </small>
                   <?php
				  if($res_user->looking_mother_tongue != '') { 
				  echo $res_user->looking_mother_tongue;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Religion </small>
                   <?php
				  if($res_user->looking_religion != '') { 
				  echo $res_user->looking_religion;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Community </small>
                   <?php
				  if($res_user->looking_community != '') { 
				  echo $res_user->looking_community;
				  } else { echo "-"; }
				  ?>
                  </li>
<li><small>Gothram </small>
                   <?php
				  if($res_user->looking_gothram != '') { 
				  echo $res_user->looking_gothram;
				  } else { echo "-"; }
				  ?>
                  </li>
                  
                  
                  
                  <li><small>Nakshatra </small>
                   <?php
				  if($res_user->looking_nakshatra != '') { 
				  echo $res_user->looking_nakshatra;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Dosham </small>
                   <?php
				  if($res_user->looking_kuja_dosham != '') { 
				  echo $res_user->looking_kuja_dosham;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Skin Tone </small>
                   <?php
				  if($res_user->looking_skin_tone != '') { 
				  echo $res_user->looking_skin_tone;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Body Type </small>
                   <?php
				  if($res_user->looking_body_type != '') { 
				  echo $res_user->looking_body_type;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Smoke </small>
                   <?php
				  if($res_user->looking_smoke != '') { 
				  echo $res_user->looking_smoke;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Drink  </small>
                   <?php
				  if($res_user->looking_drink != '') { 
				  echo $res_user->looking_drink;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Diet </small>
                   <?php
				  if($res_user->looking_diet != '') { 
				  echo $res_user->looking_diet;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Education Level </small>
                   <?php
				  if($res_user->looking_education_level != '') { 
				  echo $res_user->looking_education_level;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Education </small>
                   <?php
				  if($res_user->looking_education != '') { 
				  echo $res_user->looking_education;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Working With </small>
                   <?php
				  if($res_user->looking_working_area != '') { 
				  echo $res_user->looking_working_area;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Working As </small>
                   <?php
				  if($res_user->looking_working_as != '') { 
				  echo $res_user->looking_working_as;
				  } else { echo "-"; }
				  ?>
                  </li>
                  <li><small>Annual Income </small>
                   <?php
				  if($res_user->looking_annual_income != '') { 
				  echo $res_user->looking_annual_income;
				  } else { echo "-"; }
				  ?>
                  </li>
                 

               </ul>

               <!--<h2 class="modren_title">My Hobbies <a class="modren_title_link" data-toggle="collapse" href="#MyHobbies"></a></h2>

               <div class="collapse" id="MyHobbies">

                  <div class="simppleform">



<ul class="hobbie clearfix">

  <li><input type="checkbox">Graphology</li>

  <li><input type="checkbox">Palmistry</li>

  <li><input type="checkbox">Art/Handicraft</li>

  <li><input type="checkbox">Dancing</li>

  <li><input type="checkbox">Nature</li>

  <li><input type="checkbox">Pets</li>

  <li><input type="checkbox">Collectibles</li>

  <li><input type="checkbox">Film making</li>

  <li><input type="checkbox">Numerology</li>

  <li><input type="checkbox">Photography</li>

  <li><input type="checkbox">Astrology</li>

  <li><input type="checkbox">Fishing</li>

  <li><input type="checkbox">Puzzles</li>

  <li><input type="checkbox">Mus.Instruments</li>

  <li><input type="checkbox">Cooking</li>

  <li><input type="checkbox">Acting</li>

  <li><input type="checkbox">Gardening</li>

  <li><input type="checkbox">Land Scaping</li>

  <li><input type="checkbox">Painting</li>

</ul>

                    

                  </div>

               </div>

               <p>Palmistry,Dancing,Pets,Flim making</p>-->

               <h2 class="modren_title">My self <a class="modren_title_link" data-toggle="collapse" href="#Myself"></a></h2>

               <div class="collapse" id="Myself">
<form id="reg-form6" method="post" action="" >
                  <div class="simppleform">

                     <h5>About Me</h5>

                     <textarea name="your_own_words" id="your_own_words" class="required" cols="30" rows="5"><?php echo stripslashes($res_user->your_own_words); ?></textarea>
                    

                  </div>
                   <div class="simppleform">
                   <input name="submit6" value="Update" id="submit-form6" class="btn btn-danger" type="submit">
                   </div>
</form>
               </div>

               <p><?php echo stripslashes($res_user->your_own_words); ?></p>

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


    <script>
	    $(function(){
	        $("#submit-form1").click(function(){
	        	if( validatrix( $("#reg-form1") ) ){
	        		return true;

	        	}else{
	        		console.log("Some fields are required");
	        	}
	        	return false; //Prevent form submition
	        });
	    });
	</script>
    
    <script>
	    $(function(){
	        $("#submit-form2").click(function(){
	        	if( validatrix( $("#reg-form2") ) ){
	        		return true;

	        	}else{
	        		console.log("Some fields are required");
	        	}
	        	return false; //Prevent form submition
	        });
	    });
	</script>
    
    <script>
	    $(function(){
	        $("#submit-form3").click(function(){
	        	if( validatrix( $("#reg-form3") ) ){
	        		return true;

	        	}else{
	        		console.log("Some fields are required");
	        	}
	        	return false; //Prevent form submition
	        });
	    });
	</script>
<script>
	    $(function(){
	        $("#submit-form4").click(function(){
	        	if( validatrix( $("#reg-form4") ) ){
	        		return true;

	        	}else{
	        		console.log("Some fields are required");
	        	}
	        	return false; //Prevent form submition
	        });
	    });
	</script>
    <script>
	    $(function(){
	        $("#submit-form6").click(function(){
	        	if( validatrix( $("#reg-form6") ) ){
	        		return true;

	        	}else{
	        		console.log("Some fields are required");
	        	}
	        	return false; //Prevent form submition
	        });
	    });
	</script>
    
        <?php
if(isset($_POST['submit1']))
{
foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);

$act = $_SESSION['uid'];

$dob = $_POST['d'].'-'.$_POST['m'].'-'.$_POST['y'];
$dob =  date("d-m-Y", strtotime($dob)); 
$dob_time = strtotime($dob);


$sql = "UPDATE `profiles` SET  `created_by` =  '$created_by',
`name` =  '$name',
`gender` =  '$gender',
`dob` =  '$dob',
`dob_time` =  '$dob_time',
`martial_status` =  '$martial_status',
`height` =  '$height',
`father_status` =  '$father_status',
`mother_status` =  '$mother_status',
`no_of_bros` =  '$no_of_bros',
`no_of_married_bros` =  '$no_of_married_bros',
`no_of_sis` =  '$no_of_sis',
`no_of_married_sis` =  '$no_of_married_sis' WHERE  `entry_id` = $act";
$result = mysql_query($sql);
if($result)
{
 echo "<script>document.location.href='dashboard.php?msg=update'</script>";
}
}
?>

    <?php
if(isset($_POST['submit2']))
{
foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);

$act = $_SESSION['uid'];

$sql = "UPDATE  `profiles` SET  `mother_tongue` =  '$mother_tongue',
`religion` =  '$religion',
`community` =  '$community',
`gothram` =  '$gothram',
`nakshatra` =  '$nakshatra' WHERE  `entry_id` = $act";
$result = mysql_query($sql);
if($result)
{
 echo "<script>document.location.href='dashboard.php?msg=update'</script>";
}
}
?>

    <?php
if(isset($_POST['submit3']))
{
foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);

$act = $_SESSION['uid'];

$sql = "UPDATE  `profiles` SET  `skin_tone` =  '$skin_tone',
`body_type` =  '$body_type',
`smoke` =  '$smoke',
`drink` =  '$drink',
`diet` =  '$diet',
`education` =  '$education',
`working_area` =  '$working_area',
`working_as` =  '$working_as',
`annual_income` =  '$annual_income' WHERE  `entry_id` = $act";
$result = mysql_query($sql);
if($result)
{
 echo "<script>document.location.href='dashboard.php?msg=update'</script>";
}
}
?>

    <?php
if(isset($_POST['submit4']))
{
foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);

$act = $_SESSION['uid'];

$sql = "UPDATE `profiles` SET  `country` =  '$country',
`state` =  '$state',
`city` =  '$city',
`mobile` =  '$mobile' WHERE  `entry_id` = $act";
$result = mysql_query($sql);
if($result)
{
 echo "<script>document.location.href='dashboard.php?msg=update'</script>";
}
}
?>

    <?php
if(isset($_POST['submit6']))
{
foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);

$act = $_SESSION['uid'];

$sql = "update `profiles` set `your_own_words` = '$your_own_words' where `entry_id` = $act";
$result = mysql_query($sql);
if($result)
{
 echo "<script>document.location.href='dashboard.php?msg=update'</script>";
}
}
?>
    <?php
if(isset($_POST['submit5']))
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

$act = $_SESSION['uid'];
			 
$sql = "UPDATE `profiles` SET `looking_age_from` = '$looking_age_from', `looking_age_to` = '$looking_age_to', `looking_height_from` = '$looking_height_from', `looking_height_to` = '$looking_height_to', `looking_martial_status` = '$martial_status', `looking_religion` = '$religion', `looking_mother_tongue` = '$mother_tongue', `looking_community` = '$community', `looking_kuja_dosham` = '$looking_kuja_dosham', `looking_gothram` = '$gothram', `looking_profile_created_by` = '$looking_profile_created_by', `looking_country` = '$looking_country', `looking_state` = '$looking_state', `looking_city` = '$looking_city', `looking_education` = '$education', `looking_working_area` = '$working_area', `looking_working_as` = '$working_as', `looking_annual_income` = '$looking_annual_income', `looking_diet` = '$looking_diet', `looking_smoke` = '$looking_smoke', `looking_drink` = '$looking_drink', `looking_body_type` = '$looking_body_type', `looking_skin_tone` = '$looking_skin_tone', `looking_disability` = '$looking_disability', `looking_nakshatra` = '$nakshatra', `looking_education_level` = '$education_level' WHERE `entry_id` = $act";
$result = mysql_query($sql);
if($result)
{
 echo "<script>document.location.href='dashboard.php?msg=update'</script>";
} 

}
?>