<?php require_once 'includes/header.php'; ?> 
    <!-- Slide -->
    <div class="container-fluid slider clearfix">
      <div class="carousel slide article-slide" id="myCarousel">
        <div class="carousel-inner cont-slider">
           <?php
		   $i=0;
		$sql = "select * from `home_banners`";
		$result = mysql_query($sql);
		while($res = mysql_fetch_object($result)) {
		?>
          <div class="item <?php if($i==0) { ?>active<?php } ?>">
            <img src="images/ads/<?php echo $res->image; ?>"/>
          </div>
         <?php $i++; } ?>
          
        </div>
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php
		   $i=0;
		$sql = "select * from `home_banners`";
		$result = mysql_query($sql);
		while($res = mysql_fetch_object($result)) {
		?>
          <li class="" data-slide-to="<?php echo $i; ?>" data-target="#myCarousel">
            <img alt="" title="" src="images/ads/<?php echo $res->image; ?>"/>
          </li>
         <?php $i++; } ?>
        </ol>
      </div>
      <!-- form -->
    <?php if(!isset($_SESSION['uid'])){ include 'includes/form.php'; } else { ?>
    <?php include 'includes/search.php'; } ?>
    </div>
    <!-- Slide end -->
    <!-- content -->
    <div class="container-fluid clearfix content">
      <div class="container">
        <!-- left content -->
        <div class="col-sm-8 pad">
          <?php
		  $sql = "select * from `pages` where `entry_id` = 7";
		  $result = mysql_query($sql);
		  $res = mysql_fetch_object($result);
		  echo stripslashes($res->desc);
		  ?>
          <br/>
          <br/>
          <div class="well clearfix">
            <h3>
              Success Stories
            </h3>
            <?php
			$sql = "select * from `stories` order by `entry_id` desc limit 0,2";
			$result = mysql_query($sql);
			while($res = mysql_fetch_object($result)) {
			?>
            <div class="col-sm-6">
              <img src="images/ads/<?php echo $res->image; ?>"/>
             <?php echo stripslashes($res->story); ?>
            </div>
           <?php } ?>
          </div>
           <?php
                        $sql = "select * from `ads` where `type` = 'Home 420X185'  limit 0,1";
                       $result = mysql_query($sql);                       
					   while($res = mysql_fetch_object($result)) {
                           if($res->option == 'Image') {
                       ?>
                       <a href="<?php echo $res->link; ?>"><img src="images/ads/<?php echo $res->image; ?>" alt="" class="imgleft" /></a>
                           
                          <?php } else { 
                          echo stripslashes($res->code);
                         } } ?>
         <?php
                        $sql = "select * from `ads` where `type` = 'Home 280X195'  limit 0,1";
                       $result = mysql_query($sql);                       
					   while($res = mysql_fetch_object($result)) {
                           if($res->option == 'Image') {
                       ?>
                       <a href="<?php echo $res->link; ?>"><img src="images/ads/<?php echo $res->image; ?>" alt="" /></a>
                           
                          <?php } else { 
                          echo stripslashes($res->code);
                         } } ?>
        </div>
        <!-- left content end -->
        <!-- right content -->
        <div class="col-sm-4">
           <?php
                        $sql = "select * from `ads` where `type` = 'Home Right - 341X421'  limit 0,1";
                       $result = mysql_query($sql);                       
					   while($res = mysql_fetch_object($result)) {
                           if($res->option == 'Image') {
                       ?>
                       <a href="<?php echo $res->link; ?>"><img src="images/ads/<?php echo $res->image; ?>" alt="" /></a>
                           
                          <?php } else { 
                          echo stripslashes($res->code);
                         } } ?>
          <br/>
          <br/>
           <?php
                        $sql = "select * from `ads` where `type` = 'Home Right - 337X117'  limit 0,1";
                       $result = mysql_query($sql);                       
					   while($res = mysql_fetch_object($result)) {
                           if($res->option == 'Image') {
                       ?>
                       <a href="<?php echo $res->link; ?>"><img src="images/ads/<?php echo $res->image; ?>" alt="" class="imgres"/></a>
                           
                          <?php } else { 
                          echo stripslashes($res->code);
                         } } ?>
         
        </div>
        <!-- right content end -->
      </div>
    </div>
    <!-- content end -->
       <?php require_once 'includes/footer.php'; ?> 