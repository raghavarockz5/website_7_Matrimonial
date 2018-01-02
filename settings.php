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

            Settings

         </li>

      </ol>

   </div>

</div>

<section class="content greybg listing">

   <div class="container">

      <div class="row">

      <?php require_once'includes/dashboard_sidebar.php'; ?>

      <div class="col-md-9">
  <?php if($_GET['msg'] == 'success') { ?>
				<div align="center" style="font-size:18px; color:#009900;">Password Updated Successfully.</div>
				<?php } ?>
      <h2 class="modren_title">Settings</h2>



      <form id="form" action="" method="POST" role="form"  class="panel panel_custom2">

    <input type="hidden" name="cupwd" id="cupwd" value="<?php echo $res_user->password; ?>" />

               <div class="row">

                  <div class="col-md-12">

                     <div class="form-group">

                        <label for="">Current Password</label>

                        <input type="password" class="form-control" name="opwd" id="opwd" placeholder="">

                     </div>

                  </div>

                  <div class="col-md-12">

                     <div class="form-group">

                        <label for="">New Password</label>

                        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="">

                     </div>

                  </div>

                  <div class="col-md-12">

                     <div class="form-group">

                        <label for="">Re-Enter Password</label>

                        <input type="password" class="form-control" name="cpwd" id="cpwd" placeholder="">

                     </div>

                  </div>

              

             

                  <div class="col-md-12 ">

                     <div class="">  <button type="submit" class="btn btn-theme" name="submit">Update Password</button></div>

                  </div>

               </div>

            </form>

           



      </div>

      </div>

      </div>

</section>

<!--

   content end

   -->

<?php require_once'includes/footer.php'; ?>
<?php 
   if(isset($_POST['submit']))
   {
   foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST); 
$uid = $_SESSION['uid'];
 $sql = "UPDATE  `profiles` SET  `password` =  '$pwd' WHERE  `entry_id` = $uid";
 $result = mysql_query($sql);
 if($result)
 {
  echo "<script>document.location.href='settings.php?msg=success'</script>";
 }		
}
?>

<link rel="stylesheet" href="admin/validator/css/sudhi.css" />
		<script src="admin/validator/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">
var jQuery_1_9_1 = $.noConflict(true);
</script>
		<script src="admin/validator/js/jquery.validate.min.js"></script>
        
        
      <script type="text/javascript">
			$(function()
			{
						
				$("#form").validate(
				{
					// Rules for form validation
					rules:
					{
						opwd:
						{
							required: true,
							equalTo: '#cupwd'
						},
						pwd:
						{
							required: true
						},
						cpwd:
						{
							required: true,
							equalTo: '#pwd'
						}
					},
					
					// Messages for form validation
					messages:
					{
						
						opwd:
						{
							required: 'Please enter old password',
							equalTo: 'Incorrect Current password'
						},
						pwd:
						{
							required: 'Please enter new password'
						},
						cpwd:
						{
							required: 'Please current password',
							equalTo: 'Confirm password not matched with new password'
						}
					},					
					
					// Do not change code below
					errorPlacement: function(error, element)
					{
						error.appendTo(element.parent());
					}
				});
			});			
		</script>
