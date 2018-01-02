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
      <li>
        <a href="search_results.php">
          Search Result
        </a>
      </li>
      <li class="active">
        Profile View
      </li>
    </ol>
  </div>
</div>
<section class="content greybg">
<?php
$pid = addslashes($_GET['pid']);

 function age($date){
			 $adate = date("d-m-Y");
			 $diff = abs(strtotime($adate) - strtotime($date));

return $years = ceil($diff / (365*60*60*24));
							
							}
							
							
$sql = "select * from `profiles` where `code` = '$pid' and `gender` != '$res_user->gender'";
$result = mysql_query($sql);
if(mysql_num_rows($result) > 0) { 
$res = mysql_fetch_object($result);

	 $uid = $_SESSION['uid'];
	if($res_user->gender != $res->gender) {
	  $sqlc = "select * from `visitors` where `uid` = $uid and `vid` = $res->entry_id";
	  $resultc = mysql_query($sqlc);
	  if(mysql_num_rows($resultc) > 0)
	  {
	  $resc = mysql_fetch_object($resultc);
	  $times = $resc->times + 1;
	  $date_time = strtotime(date("d-m-Y"));
	  $sqlup = "update `visitors` set `times` = '$times', `date_time` = '$date_time' where `entry_id` = $resc->entry_id";
	  $resultup = mysql_query($sqlup);
	 
	  } else {
		   $date_time = strtotime(date("d-m-Y"));
	   $sqlin = "INSERT INTO `visitors` (`uid`, `vid`, `times`, `date_time`) VALUES ('$uid', '$res->entry_id', '1', '$date_time')";
	    $resultin = mysql_query($sqlin);
	  }
	}
      
			 $sqld = "select * from `countries` where `entry_id` = $res->country";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $country = $resd->country;
			 $sqld = "select * from `states` where `entry_id` = $res->state";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $state = $resd->state;
			 $sqld = "select * from `cities` where `entry_id` = $res->city";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $city = $resd->city;
?>
  <div class="container">
    <div class="">
      <div class="row">
      <div class="col-md-8">
      <div class="panel panel_custom2 view_profile">
          <!--  <span class="actions">
              <a href="#" class="fa fa-phone" >
              </a>
              <a href="#" class="fa fa-cog">
              </a>
            </span>-->
          <h4 class="media-heading">
       <?php echo $res->name; ?></h4>
       <strong>  MP<?php echo $res->entry_id; ?>
    |
    Profile Created For <?php echo $res->created_by; ?></strong>
        <div class="media">
  <div class="media-left">
<div class="media-object">  


<div class="owl-carousel" id="sync1">
  <?php $sqli = "select * from `images` where `profile_link` = $res->entry_id order by `pstatus` asc";
				$resulti = mysql_query($sqli);
				if(mysql_num_rows($resulti) > 0) { 
				while($resi = mysql_fetch_object($resulti)) { ?>
               
                <div class="item"><a href="profiles/<?php echo $resi->image; ?>" rel="photos" class="fancybox"><img src="profiles/<?php echo $resi->image; ?>"></a></div>
              
                <?php } } else { ?>
                  <div class="item"><a href="images/thumb.png" rel="photos" class="fancybox"><img src="images/thumb.png"></a></div>
                  <?php } ?>
    
      

  </div>

<div class="thumbnails_owl">  <div class="owl-carousel m-t-1" id="sync2">
 <?php $sqli = "select * from `images` where `profile_link` = $res->entry_id order by `pstatus` asc";
				$resulti = mysql_query($sqli);
				if(mysql_num_rows($resulti) > 0) { 
				while($resi = mysql_fetch_object($resulti)) { ?>
               
                <div class="item"><img src="profiles/<?php echo $resi->image; ?>"></div>
                 
                <?php } } else { ?>
                  <div class="item"><img src="images/thumb.png"></div>
                  <?php } ?>
   
  </div></div>


  <!-- <a class="btn btn-default btn-block m-t-1 chat_btn"> Online  Chat <i class="fa fa-comments"></i> </a>-->


  </div>
  </div>
  <div class="media-body">
<ul class="pro_details">
                  <li>
                    <strong>
                      Age
                    </strong>
                    : <?php echo age($res->dob); ?> Yrs
                    </li>
                    <li>
                     <strong>Height </strong> : <?php $ht = round(($res->height/30.48),1);  $f =explode('.',$ht); echo $f[0].' ft '; $in = ceil(((12/100)*$f[1])*10); echo $in.' in'; ?>
                  </li>
                  <li>
                    <strong>
                      Religion
                    </strong>
                    : <?php echo $res->religion; ?>
                  </li>
                  <li>
                    <strong>
                      Caste
                    </strong>
                    : <?php echo $res->community; ?>
                  </li>
                  <li>
                    <strong>
                      Star
                    </strong>
                    : <?php echo $res->nakshatra; ?>
                  </li>
                  <li>
                    <strong>
                      Location
                    </strong>
                    : <?php echo $city; ?>, <?php echo $state; ?>, <?php echo $country; ?>
                  </li>
                  <li>
                    <strong>
                      Education
                    </strong>
                    : <?php echo $res->education; ?>
                  </li>
                  <li>
                    <strong>
                      Profession
                    </strong>
                    : <?php echo $res->working_as; ?>
                  </li>
                </ul>



<div class="block">
<!--<h3>Like this member?</h3>-->

<div class="m-y-2">
<a href="javascript:saveprofile(<?php echo $res->entry_id; ?>);" class="btn btn-success">
                  Save Profile
                  <i class="fa fa-save">
                  </i>
                </a>
                
                 <a href="javascript:sendint(<?php echo $res->entry_id; ?>);" class="btn btn-warning">
                  Send Interest
                  <i class="fa fa-heart">
                  </i>
                </a>
<!--<a href="" class="btn btn-success m-r-1">YES</a><a href="" class="btn btn-warning m-r-1">Not Now</a><span class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    More
    <span class="caret"></span>
  </button>-->
  <!--<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">



   <li><a href="">Shortlist</a></li>
   <li><a href="">Send Mail</a></li>
   <li><a href="">Forward</a></li>
   <li><a href="">Print</a></li>
    <li role="separator" class="divider"></li>
   <li><a href="">Ignore</a></li>
   <li><a href="">Block</a></li>

  </ul>-->
</span>

</div>
<!--<p>Contact this member directly through Mobile, E-mail and Chat by upgrading your membership. <a href="" class="special">Upgrade Now</a></p>-->
</div>

  </div>
</div>

      </div>
          <div class="panel panel_custom2">

          <h2 class="modren_title">Personal Information</h2>
          <p><?php echo $res->your_own_words; ?></p>


         <h2 class="modren_title"> Basic Details</h2>

<ul class="modren_list col3">
  <li><small>Name</small> <?php echo $res->name; ?></li>
  <li><small>Body Type</small>  <?php echo $res->body_type; ?></li>
  <li><small>Age</small>  <?php echo age($res->dob); ?> Yrs</li>
  <li><small>Complexion</small>  <?php echo $res->skin_tone; ?></li>
  <li><small>Height</small>  <?php $ht = round(($res->height/30.48),1);  $f =explode('.',$ht); echo $f[0].' ft '; $in = ceil(((12/100)*$f[1])*10); echo $in.' in'; ?></li>
  <li><small>Eating Habits</small> <?php echo $res->diet; ?></li>
  <li><small>Mother Tongue</small> <?php echo $res->mother_tongue; ?></li>
  <li><small>Drinking Habits</small> <?php echo $res->drink; ?></li>
  <li><small>Marital Status</small> <?php echo $res->martial_status; ?></li>
  <li><small>Smoking Habits</small> <?php echo $res->smoke; ?></li>

</ul>

   <h2 class="modren_title"> Religion Information</h2>

            
<ul class="modren_list col3">
  <li><small>Religion</small> <?php echo $res->religion; ?></li>
  <li><small>Caste</small> <?php echo $res->community; ?></li>
  <li><small>Gothram</small> <?php echo $res->gothram; ?></li>
  <li><small>Star / Raasi</small> <?php echo $res->nakshatra; ?></li>
  <li><small>Dosham</small> <?php echo $res->dosham; ?></li>
</ul>


 <h2 class="modren_title"> Location</h2>

<ul class="modren_list col3">
  <li><small>Country</small> <?php echo $country; ?></li>
  <li><small>State</small> <?php echo $state; ?></li>
  <li><small>City</small> <?php echo $city; ?></li>
</ul>


<h2 class="modren_title"> Professional Information</h2>

<ul class="modren_list col3">
  <li><small>Education</small>  <?php echo $res->education_level; ?></li>
  <li><small>Education in Detail </small>  <?php echo $res->education; ?></li>
  <li><small>Occupation</small>  <?php echo $res->working_as; ?></li>
</ul>


<h2 class="modren_title"> Family Details</h2>

<ul class="modren_list col3">
  <li><small>No of Brother(s)</small> <?php echo $res->no_of_bros; ?> / Not Married</li>
  <li><small>No of Sister(s)</small> <?php echo $res->no_of_sis; ?></li>
  <li><small>Father's Status</small> <?php echo $res->father_status; ?></li>
  <li><small>Mother's Status</small> <?php echo $res->mother_status; ?></li>
</ul>



<!--<h2 class="modren_title">Hobbies & Interests</h2>
<ul class="modren_list col3">
  <li><small>Hobbies</small> Cooking, Nature</li>
  <li><small>Interests</small> Music</li>
  <li><small>Favourite</small> Music Film songs</li>
  <li><small>Sports/Fitness</small> Activities Carrom</li>
  <li><small>Spoken Languages</small> English, Telugu</li>
</ul>-->




          </div>
      </div>
         <div class="col-md-4">
      <div class="panel panel_custom2 related">
      <h2 class="modren_title p-t-0">View Similar Profiles</h2>
        
<?php
$sqls = "select code,entry_id,dob,height,religion,community,city from `profiles` where `community` = '$res->community' and `entry_id` != $res->entry_id and `gender` = '$res->gender' and `status` = 'Active' limit 0,5";
$results = mysql_query($sqls);
while($ress = mysql_fetch_object($results)) {
	$sqld = "select * from `cities` where `entry_id` = $res->city";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $city = $resd->city;
?>

<div class="media">
  <div class="media-left">
    <a href="profile_view.php?pid=<?php echo $ress->code; ?>">
       <?php $sqli = "select * from `images` where `profile_link` = $ress->entry_id order by `pstatus` asc";
				$resulti = mysql_query($sqli);
				if(mysql_num_rows($resulti) > 0) { 
				$resi = mysql_fetch_object($resulti); ?>
                <img class="media-object" src="thumb/timthumb.php?src=profiles/<?php echo $resi->image; ?>&w=100&h=100" />
                <?php } else { ?>
                  <img class="media-object" src="images/thumb.png" />
                  <?php } ?>
    </a>
  </div>
  <div class="media-body">
   
<p>MP<?php echo $ress->entry_id; ?><br/>
<?php echo age($ress->dob); ?> Yrs, <?php $ht = round(($ress->height/30.48),1);  $f =explode('.',$ht); echo $f[0].' ft '; $in = ceil(((12/100)*$f[1])*10); echo $in.' in'; ?>,<br/>
<?php echo $ress->religion; ?>, <?php echo $ress->community; ?>,<br/>
<?php echo $city; ?></p>
<a href="profile_view.php?pid=<?php echo $ress->code; ?>" class="special"><small>View Full Profile</small> <i class="fa fa-caret-right"></i></a>
  </div>
</div>


<?php } ?>
      </div>

           <div class="panel panel_custom2 related">
      <h2 class="modren_title p-t-0">Recently Updated Profiles</h2>
        
<?php
$sqls = "select code,entry_id,dob,height,religion,community,city from `profiles` where  `entry_id` != $res->entry_id and `gender` = '$res->gender' and `status` = 'Active' limit 0,5";
$results = mysql_query($sqls);
while($ress = mysql_fetch_object($results)) {
	$sqld = "select * from `cities` where `entry_id` = $res->city";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $city = $resd->city;
?>

<div class="media">
  <div class="media-left">
    <a href="profile_view.php?pid=<?php echo $ress->code; ?>">
       <?php $sqli = "select * from `images` where `profile_link` = $ress->entry_id order by `pstatus` asc";
				$resulti = mysql_query($sqli);
				if(mysql_num_rows($resulti) > 0) { 
				$resi = mysql_fetch_object($resulti); ?>
                <img class="media-object" src="thumb/timthumb.php?src=profiles/<?php echo $resi->image; ?>&w=100&h=100" />
                <?php } else { ?>
                  <img class="media-object" src="images/thumb.png" />
                  <?php } ?>
    </a>
  </div>
  <div class="media-body">
   
<p>MP<?php echo $ress->entry_id; ?><br/>
<?php echo age($ress->dob); ?> Yrs, <?php $ht = round(($ress->height/30.48),1);  $f =explode('.',$ht); echo $f[0].' ft '; $in = ceil(((12/100)*$f[1])*10); echo $in.' in'; ?>,<br/>
<?php echo $ress->religion; ?>, <?php echo $ress->community; ?>,<br/>
<?php echo $city; ?></p>
<a href="profile_view.php?pid=<?php echo $ress->code; ?>" class="special"><small>View Full Profile</small> <i class="fa fa-caret-right"></i></a>
  </div>
</div>


<?php } ?>
      </div>
        
      </div>
      </div>
    </div>
  </div>
  <?php } else { ?>
  <h3 align="center">Your Looking Profile Was Deleted Or Inactivated.</h3>
  <?php } ?>
</div>
</section>
<!--
content end
-->
<?php require_once'includes/footer.php'; ?>

