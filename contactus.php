<?php require_once'includes/header.php'; ?>
<div class="breadcrumb_wrapper">
<div class="container"><ol class="breadcrumb">
  <li>
    <a href="index.php">Home</a>
  </li>
 
  <li class="active">Contact Us</li>
</ol></div>
</div>
<section class="content greybg">


  <div class="container">
    <div class="panel panel_custom2">
    <div class="row">
  

      <div class="col-md-6 form">
        <h3>Contact Us</h3>
         <?php
$sql = "select * from `pages` where `entry_id` = 8";
$result = mysql_query($sql);
$res = mysql_fetch_object($result);
echo stripslashes($res->desc);
?>
      </div>

          <div class="col-md-6 form">

 <div class="feedback_inner">      
 <?php if($_GET['msg'] == 'sent') { ?>
 <h4 align="center" style="color:#0C0;">Your Message Has Sent</h4>
 <?php } ?>   
     <h2>Feedback</h2>
 
            <form id="form" action="" method="POST" role="form">
           
         <div class="row">   
                    <div class="col-md-12">   <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="name" class="form-control" id="" placeholder="">
                                 </div></div>
                     
                          <div class="col-md-6">   <div class="form-group">
                                   <label for="">Email</label>
                                   <input type="text" name="email" class="form-control" id="" placeholder="">
                                 </div></div>
          
                                            <div class="col-md-6">   <div class="form-group">
                                   <label for="">Phone</label>
                                   <input type="text" name="mobile" class="form-control" id="" placeholder="">
                                 </div></div>
          
                                                 <div class="col-md-12">   <div class="form-group">
                                   <label for="">Subject</label>
                                   <input type="text" name="subject" class="form-control" id="" placeholder="">
                                 </div></div>
          
                                                     
          
          
                                                       <div class="col-md-12">   <div class="form-group">
                                   <label for="">Suggestions / Feedback
          </label>
                                 <textarea name="message" id="input" class="form-control" rows="3" required="required"></textarea>
                                 </div></div>
          
          
          
                       <div class="col-md-12 ">
               <div class=""> <button type="submit" name="submit" class="btn btn-success">Submit</button></div>
              </div></div>
            </form></div>
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

<?php
  if(isset($_POST['submit']))
  {
 foreach ($_POST AS $key => $value) {
 $_POST[$key] = addslashes($value);
}
extract($_POST);

$subject = "$subject - $res_set->title";
$message = "Hi <br />
Details : <br />
Name : $name <br />
Mobile : $mobile <br />
Email : $email <br />
Subject : $subject <br />
Message : $message <br />";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				
				// Additional headers
				$headers .= 'From: '.$email . "\r\n";
				$headers .= 'Reply-To: '.$email . "\r\n";
				$to = $res_set->email;
				if(mail($to, $subject, $message, $headers))
				{
				echo "<script>document.location.href='contactus.php?msg=sent'</script>";
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
					
						email:
						{
							required: true,
							email: true
						},
						name:
						{
							required: true
						},
						mobile:
						{
							required: true
						},
						subject:
						{
							required: true
						},
						message:
						{
							required: true
						}
					},
					
					// Messages for form validation
					messages:
					{
						
					
						email:
						{
							required: 'Please enter email'
						},
						password:
						{
							required: 'Please enter password'
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