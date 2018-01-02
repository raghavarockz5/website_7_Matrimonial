<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
  <div class="container">
    <ol class="breadcrumb">
      <li>
        <a href="index.php">
          Home
        </a>
      </li>
    
      <li class="active">
        Help
      </li>
    </ol>
  </div>
</div>
<section class="content greybg">
  <div class="container">
    <div class="panel panel_custom2">
      <div class="row">
        <div class="col-md-7">
          <h3>
            Help
          </h3>
          <?php
$sql = "select * from `pages` where `entry_id` = 9";
$result = mysql_query($sql);
$res = mysql_fetch_object($result);
echo stripslashes($res->desc);
?>
        </div>
        <div class="col-md-5">
       <div class="inner_form"> <?php if(!isset($_SESSION['uid'])){ include 'includes/form.php'; } else { ?>
    <?php include 'includes/search.php'; } ?>
        <img src="images/img2.jpg" width="100%" class="m-t-2"></div>
     
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
