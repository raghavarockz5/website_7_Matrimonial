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

            <a href="dashboard.php">

            Dashboard

            </a>

         </li>

         <li class="active">

            Recent Profile Visitors

         </li>

      </ol>

   </div>

</div>

<section class="content greybg listing">

   <div class="container">

      <div class="row">

      <?php require_once'includes/dashboard_sidebar.php'; ?>

      <div class="col-md-9">
 <?php
 if($_GET['msg'] == 'delete') {
 ?>
 <h4 align="center" style="color:#090">Deleted Successfully</h4>
 <?php } ?>
      <h2 class="modren_title">Recent Profile Visitors</h2>

             <?php
			  function age($date){
			 $adate = date("d-m-Y");
			 $diff = abs(strtotime($adate) - strtotime($date));

return $years = ceil($diff / (365*60*60*24));
							
							}
							
							if(!isset($_GET['page'])){
	$page = 1;
	} else {
	$page = $_GET['page'];
	}
	$limit=5;
	$limitvalue = ($page - 1) * $limit;
	$limitvalue1 = $limitvalue+10;
	$path = "RecentProfileVisitors.php";
	$condition ="";
	$tab = "";
							
			 $sqlr = "select * from `visitors` where `vid` = $uid";
			 $resultr = mysql_query($sqlr);
			 $tr = mysql_num_rows($resultr);
			 if($tr > 0) {
				 $sqlr = "select * from `visitors` where `vid` = $uid order by `date_time` desc LIMIT $limitvalue, $limit";
			 $resultr = mysql_query($sqlr);
			while($resr = mysql_fetch_object($resultr)) { 
			$sqls = "select your_own_words,state,working_as,name,code,entry_id,dob,height,religion,community,city from `profiles` where `entry_id` = $resr->uid and `gender` != '$res_user->gender'";
$results = mysql_query($sqls);
$ress = mysql_fetch_object($results);

$sqld = "select * from `countries` where `entry_id` = $ress->country";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $country = $resd->country;
			 $sqld = "select * from `states` where `entry_id` = $ress->state";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $state = $resd->state;
			 $sqld = "select * from `cities` where `entry_id` = $ress->city";
			 $resultd = mysql_query($sqld);
			 $resd = mysql_fetch_object($resultd);
			 $city = $resd->city;
			?>

               <div class="panel panel_custom2">

               <div class="row valign-wrapper">

                  <div class="col-md-2">
                  <?php $sqli = "select * from `images` where `profile_link` = $ress->entry_id order by `pstatus` asc";
				$resulti = mysql_query($sqli);
				if(mysql_num_rows($resulti) > 0) { 
				$resi = mysql_fetch_object($resulti); ?>
                <img src="thumb/timthumb.php?src=profiles/<?php echo $resi->image; ?>&w=120&h=150" />
                <?php } else { ?>
                  <img  src="thumb/timthumb.php?src=images/thumb.png&w=120&h=150" />
                  <?php } ?>
                  </div>

                  <div class="col-md-7">

                     <h4 class="special"><?php echo $ress->name; ?>  <strong >[  MP<?php echo $ress->entry_id; ?>  ]  </strong> </h4>

                   <p><?php echo age($ress->dob); ?> Yrs, <?php $ht = round(($ress->height/30.48),1);  $f =explode('.',$ht); echo $f[0].' ft '; $in = ceil(((12/100)*$f[1])*10); echo $in.' in'; ?>, <?php echo $ress->working_as; ?>, <?php echo $ress->religion; ?> / <?php echo $ress->community; ?>, <?php echo $state; ?> / <?php echo $city; ?></p>

                  <p> <strong class="special">About :</strong> <?php echo stripslashes($ress->your_own_words); ?></p>

                  </div>

                  <div class="col-md-3">

<ul class="special_btns">

   <li><a href="javascript:sendint(<?php echo $ress->entry_id; ?>);"><i class="fa fa-heart"></i> Express interest</a></li>

   <li><a href="javascript:saveprofile(<?php echo $ress->entry_id; ?>);"><i class="fa fa-save"></i> Save profile</a></li>

   <li><a href="javascript:deleted('<?php echo base64_encode($resr->entry_id); ?>');"><i class="fa fa-trash"></i> Delete</a></li>

   <li class="selected_special"><a href="profile_view.php?pid=<?php echo $ress->code; ?>"><i class="fa fa-search"></i> View Profile</a></li>

</ul>

 



                  </div>

               </div>

            </div>

                

                  <?php }?>



            <ul class="pagination">

    <?php echo paginate($page,$path,$tr,$limit,$condition,$tab); ?>
  </ul>

<?php } else { ?>
<h3 align="center">There are no profile visitors found for this account</h3>
<?php } ?>
      </div>

      </div>

      </div>

</section>

<!--

   content end

   -->

<?php require_once'includes/footer.php'; ?>



  <script language="javascript">
	  function deleted(id)
	  {
	    if(confirm("Are you sure want to Delete ?"))
		{
		 document.location.href='RecentProfileVisitors.php?deleteid='+id;
		}
	  }
	 </script>
	   <?php
	  if(isset($_GET['deleteid']))
	  {
	  $did = base64_decode($_GET['deleteid']);
	  $uid = $_SESSION['uid'];
	  $sql = "delete from `visitors` where `vid` = $uid and `entry_id` = $did";
	  $result = mysql_query($sql);
	   if($result)
	  {
	   echo "<script>document.location.href='RecentProfileVisitors.php?msg=delete';</script>";

	  }
	  }
	 ?>