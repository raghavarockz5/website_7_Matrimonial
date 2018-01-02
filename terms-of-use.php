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
        Terms Of Use
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
            Terms Of Use
          </h3>
          <?php
$sql = "select * from `pages` where `entry_id` = 2";
$result = mysql_query($sql);
$res = mysql_fetch_object($result);
echo stripslashes($res->desc);
?>
        </div>
        <div class="col-md-5">
       <div class="inner_form"> <?php if(!isset($_SESSION['uid'])){ include 'includes/form.php'; } else { ?>
    <?php include 'includes/search.php'; } ?>
        <br />
         <?php
                        $sql = "select * from `ads` where `type` = 'Inner Right - 440X153'  limit 0,1";
                       $result = mysql_query($sql);                       
					   while($res = mysql_fetch_object($result)) {
                           if($res->option == 'Image') {
                       ?>
                       <a href="<?php echo $res->link; ?>"><img src="images/ads/<?php echo $res->image; ?>" alt="" class="m-t-2" width="440" /></a>
                           
                          <?php } else { 
                          echo stripslashes($res->code);
                         } } ?>
     
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
