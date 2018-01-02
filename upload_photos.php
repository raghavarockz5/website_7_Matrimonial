<?php require_once'includes/header.php'; ?>

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

            Upload Photos

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
 if($_GET['msg'] == 'update') {
 ?>
 <h4 align="center" style="color:#090">Updated Successfully</h4>
 <?php } ?>
 <?php
 if($_GET['msg'] == 'delete') {
 ?>
 <h4 align="center" style="color:#090">Deleted Successfully</h4>
 <?php } ?>
            <h2 class="modren_title">Upload Photos</h2>


               <p><small><i class="fa fa-caret-right"></i> Allows jpg , jpeg and png images only.<br/>

                  <i class="fa fa-caret-right"></i> The uploaded image should not exceed 1 MB.<br/>

                  <i class="fa fa-caret-right"></i> For better profile image please upload 200x200 (width x height).</small>

               </p>

               <div class="row">
 <form name="pics" enctype="multipart/form-data" id="fupload" method="post" >
                  <div class="col-md-9">

                     <div class="form-group">

                        <input type="file" name="files[]" class="myfile" id="" placeholder="" multiple>

                     </div>

                  </div>

                  <div class="col-md-3"><button name="submit" name="submit" class="btn btn-theme btn-block" style="height: 48px;">Upload</button></div>
</form>
                  <div class="clearfix col-md-12"></div>

                  <?php 
				  $sql = "select * from `images` where `profile_link` = $uid";
				  $result = mysql_query($sql);
				  while($res = mysql_fetch_object($result)) {
				  ?>

                  <div class="col-md-3">

                     <div class="scroll_profiles">

                        <img src="thumb/timthumb.php?src=profiles/<?php echo $res->image; ?>&w=179&h=179">

                        <span>

                           <ul>

                              <li> <a href="javascript:msgbox('<?php echo base64_encode($res->entry_id); ?>');"><i class="fa fa-trash"></i> Remove</a></li>

                              <li><a href="upload_photos.php?makeit=<?php echo base64_encode($res->entry_id); ?>" ><i class="fa fa-save"></i> Make it as profile Pic</a></i></li>

                           </ul>

                        </span>

                     </div>

                     <br/>

                  </div>

                  <?php }?>

               </div>

               


         </div>

      </div>

   </div>

</section>

<!--

   content end

   -->

<?php require_once'includes/footer.php'; ?>

<?php
if(isset($_GET['makeit']))
{
$id = base64_decode($_GET['makeit']);
$uid = $_SESSION['uid'];
 $sqlup = "update `images` set `pstatus` = 1 where `profile_link` = $uid and `pstatus` = 0";
$resultup = mysql_query($sqlup);

$sqlu = "update `images` set `pstatus` = 0 where `entry_id` = $id and `profile_link` = $uid";
$resultu = mysql_query($sqlu);
if($resultu)
			{
			  echo "<script>document.location.href='upload_photos.php?msg=update'</script>";
			}
}
?>


<script language="javascript">
  function msgbox(id)
  {
    if(confirm("Are you sure want to delete ?")) {
	  document.location.href = 'upload_photos.php?did='+id;
	}
  }
  </script>
<?php
 if(isset($_GET['did'])) {
  $did = base64_decode($_GET['did']);
  $uid = $_SESSION['uid'];
  
  $sqlc = "select * from `images` where `entry_id` = $did and `profile_link` = $uid";
  $resultc = mysql_query($sqlc);
  $resc = mysql_fetch_object($resultc);
  
  $path1 = "profiles/".$resc->image;
  
  unlink($path1);
  
  $sqld = "delete from `images` where `entry_id` = $did and `profile_link` = $uid";
  $result = mysql_query($sqld) or die(mysql_error());
			if($result)
			{
			  echo "<script>document.location.href='upload_photos.php?msg=delete'</script>";
			}
 }
?>


<?php


   if(isset($_POST['submit']))
   {
	   
	   
	  
							
   foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST); 


 $act = $_SESSION['uid'];
	   
	    $ts = strtotime(date("d-m-Y h:i A"));
	   $valid_formats = array("jpg", "png", "gif", "jpeg", "bmp");
$max_file_size = 1024*1024; //100 kb
$path = "profiles/"; // Upload directory
$count = 0;

	   foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) { 
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	    
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){ 
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ts.$name)) {
	            $count++; // Number of successfully uploaded file
				$image = $ts.$name;
				$sqlin = "INSERT INTO `images` (`profile_link`, `image`) VALUES ('$act', '$image')";
				$resultin = mysql_query($sqlin);
				}
	        }
	    }
	}
	   echo "<script>document.location.href='upload_photos.php?msg=update'</script>";
   }
   ?>
   
   
   <?php
  function generatePassword2($length=20,$level=2){

   list($usec, $sec) = explode(' ', microtime());
   srand((float) $sec + ((float) $usec * 100000));

   $validchars[1] = "0123456789";
   $validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $validchars[3] = "0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/";

   $password  = "";
   $counter   = 0;

   while ($counter < $length) {
     $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

     // All character must be different
     if (!strstr($password, $actChar)) {
        $password .= $actChar;
        $counter++;
     }
   }

   return $password;

}
?>
  <?php
  function generatePassword($length=8,$level=1){

   list($usec, $sec) = explode(' ', microtime());
   srand((float) $sec + ((float) $usec * 100000));

   $validchars[1] = "0123456789";
   $validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $validchars[3] = "0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/";

   $password  = "";
   $counter   = 0;

   while ($counter < $length) {
     $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

     // All character must be different
     if (!strstr($password, $actChar)) {
        $password .= $actChar;
        $counter++;
     }
   }

   return $password;

}
?>
