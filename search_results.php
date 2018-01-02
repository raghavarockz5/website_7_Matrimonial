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
        Profile Search
      </li>
    </ol>
  </div>
</div>
<?php
$condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$looking_for_condition = "&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$age_condition = "looking_for=".$_GET['looking_for']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$height_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$martial_status_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$mother_tongue_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$caste_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$star_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&education=".$_GET['education']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$education_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&working_as=".$_GET['working_as']."&annual_income=".$_GET['annual_income'];
$working_as_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&annual_income=".$_GET['annual_income'];
$annual_income_condition = "looking_for=".$_GET['looking_for']."&af=".$_GET['af']."&at=".$_GET['at']."&hf=".$_GET['hf']."&ht=".$_GET['ht']."&martial_status=".$_GET['martial_status']."&mother_tongue=".$_GET['mother_tongue']."&community=".$_GET['community']."&star=".$_GET['star']."&education=".$_GET['education']."&working_as=".$_GET['working_as'];
?>
<input type="hidden" name="cond" id="cond" value="<?php echo $condition; ?>" />
	<input type="hidden" name="looking_for_condition" id="looking_for_condition" value="<?php echo $looking_for_condition; ?>" />
	<input type="hidden" name="age_condition" id="age_condition" value="<?php echo $age_condition; ?>" />
	
	<input type="hidden" name="height_condition" id="height_condition" value="<?php echo $height_condition; ?>" />
	<input type="hidden" name="martial_status_condition" id="martial_status_condition" value="<?php echo $martial_status_condition; ?>" />
	<input type="hidden" name="mother_tongue_condition" id="mother_tongue_condition" value="<?php echo $mother_tongue_condition; ?>" />
	<input type="hidden" name="caste_condition" id="caste_condition" value="<?php echo $caste_condition; ?>" />
    
    <input type="hidden" name="star_condition" id="star_condition" value="<?php echo $star_condition; ?>" />
    <input type="hidden" name="education_condition" id="education_condition" value="<?php echo $education_condition; ?>" />
    <input type="hidden" name="working_as_condition" id="working_as_condition" value="<?php echo $working_as_condition; ?>" />
    <input type="hidden" name="annual_income_condition" id="annual_income_condition" value="<?php echo $annual_income_condition; ?>" />
    
    <script language="javascript">
	 function go_lf(v)
	 {
	  var cond=document.getElementById("looking_for_condition").value;
	  document.location.href='search_results.php?'+cond+'&looking_for='+v;
	 }
	  function go_ms(v)
	 {
	  var cond=document.getElementById("martial_status_condition").value;
	  document.location.href='search_results.php?'+cond+'&martial_status='+v;
	 }
	 function go_mt(v)
	 {
	  var cond=document.getElementById("mother_tongue_condition").value;
	  document.location.href='search_results.php?'+cond+'&mother_tongue='+v;
	 }
	 function go_caste(v)
	 {
	  var cond=document.getElementById("caste_condition").value;
	  document.location.href='search_results.php?'+cond+'&community='+v;
	 }
	 function go_star(v)
	 {
	  var cond=document.getElementById("star_condition").value;
	  document.location.href='search_results.php?'+cond+'&star='+v;
	 }
	  function go_education(v)
	 {
	  var cond=document.getElementById("education_condition").value;
	  document.location.href='search_results.php?'+cond+'&education='+v;
	 }
	  function go_wa(v)
	 {
	  var cond=document.getElementById("working_as_condition").value;
	  document.location.href='search_results.php?'+cond+'&working_as='+v;
	 }
	 function go_ai(v)
	 {
	  var cond=document.getElementById("annual_income_condition").value;
	  document.location.href='search_results.php?'+cond+'&annual_income='+v;
	 }
	 
	</script>
<section class="content greybg">
  <div class="container">
    <div class="">
      <div class="row">
        <div class="col-md-3">
          <div class="panel fillter_panel">
            <h3>
              Search by filter
            </h3>
            <div class="filter">
              <ul>
              <?php if(!isset($_SESSION['uid'])) { ?>
              <li>
                  <a>
                    Looking For
                  </a>
                  <ul>
                    <li>
                        <select name="looking_for" class="form-control input-sm" id="fruits" onchange="go_lf(this.value);">
                        <option value="Female" <?php if($_GET['looking_for'] == 'Female') { ?> selected="selected" <?php } ?>>Bride</option>
                        <option value="Male" <?php if($_GET['looking_for'] == 'Male') { ?> selected="selected" <?php } ?>>Groom</option>
                         
                        </select>
                    </li>
                  </ul>
                </li>
              <?php } ?>  
                <li>
                  <a>
                    Age
                  </a>
                  <ul>
                    <li>
                      <form class="row" name="age" method="GET" role="form">
                      <input type="hidden" name="hf" value="<?php echo $_GET['hf']; ?>" />
                      <input type="hidden" name="ht" value="<?php echo $_GET['ht']; ?>" />
                      <input type="hidden" name="looking_for" value="<?php echo $_GET['looking_for']; ?>" />
                      <input type="hidden" name="martial_status" value="<?php echo $_GET['martial_status']; ?>" />
                      <input type="hidden" name="mother_tongue" value="<?php echo $_GET['mother_tongue']; ?>" />
                      <input type="hidden" name="community" value="<?php echo $_GET['community']; ?>" />
                      <input type="hidden" name="star" value="<?php echo $_GET['star']; ?>" />
                      <input type="hidden" name="education" value="<?php echo $_GET['education']; ?>" />
                      <input type="hidden" name="working_as" value="<?php echo $_GET['working_as']; ?>" />
                      <input type="hidden" name="annual_income" value="<?php echo $_GET['annual_income']; ?>" />
                        <div class="col-md-5">
                          <select name="af" id="input" class="form-control input-sm" >
                            <option value="">
                              From
                            </option>
                            <?php
							for($i=18;$i<=60;$i++) {
							?>
                            <option value="<?php echo $i; ?>" <?php if($i == $_GET['af']) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-5">
                          <select name="at" id="input" class="form-control input-sm" >
                            <option value="">
                              To
                            </option>
                             <?php
							for($i=18;$i<=60;$i++) {
							?>
                            <option value="<?php echo $i; ?>" <?php if($i == $_GET['at']) { ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-xs btn-primary btn-block">
                            <b>
                              go
                            </b>
                          </button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    Height
                  </a>
                  <ul>
                    <li>
                      <form class="row" action="" method="GET" role="form">
                      <input type="hidden" name="af" value="<?php echo $_GET['af']; ?>" />
                      <input type="hidden" name="at" value="<?php echo $_GET['at']; ?>" />
                      <input type="hidden" name="looking_for" value="<?php echo $_GET['looking_for']; ?>" />
                      <input type="hidden" name="martial_status" value="<?php echo $_GET['martial_status']; ?>" />
                      <input type="hidden" name="mother_tongue" value="<?php echo $_GET['mother_tongue']; ?>" />
                      <input type="hidden" name="community" value="<?php echo $_GET['community']; ?>" />
                      <input type="hidden" name="star" value="<?php echo $_GET['star']; ?>" />
                      <input type="hidden" name="education" value="<?php echo $_GET['education']; ?>" />
                      <input type="hidden" name="working_as" value="<?php echo $_GET['working_as']; ?>" />
                      <input type="hidden" name="annual_income" value="<?php echo $_GET['annual_income']; ?>" />
                        <div class="col-md-5">
                          <select name="hf" id="input" class="form-control input-sm">
                            <option value="">
                              From
                            </option>
                            <option value="134" <?php if($_GET['hf'] == '134') { ?> selected="selected" <?php } ?>>4ft 5in - 134cm</option>
                                  <option value="137" <?php if($_GET['hf'] == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($_GET['hf'] == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($_GET['hf'] == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($_GET['hf'] == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($_GET['hf'] == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($_GET['hf'] == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($_GET['hf'] == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($_GET['hf'] == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($_GET['hf'] == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($_GET['hf'] == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($_GET['hf'] == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($_GET['hf'] == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($_GET['hf'] == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($_GET['hf'] == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($_GET['hf'] == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($_GET['hf'] == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($_GET['hf'] == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($_GET['hf'] == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($_GET['hf'] == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($_GET['hf'] == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($_GET['hf'] == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($_GET['hf'] == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($_GET['hf'] == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($_GET['hf'] == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($_GET['hf'] == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($_GET['hf'] == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($_GET['hf'] == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($_GET['hf'] == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($_GET['hf'] == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($resm->looging_height_from == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($_GET['hf'] == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>
                          </select>
                        </div>
                        <div class="col-md-5">
                          <select name="ht" id="input" class="form-control input-sm" >
                            <option value="">
                              To
                            </option>
                             <option value="137" <?php if($_GET['ht'] == '137') { ?> selected="selected" <?php } ?>>4ft 6in - 137cm</option>
                                  <option value="139" <?php if($_GET['ht'] == '139') { ?> selected="selected" <?php } ?>>4ft 7in - 139cm</option>
                                  <option value="142" <?php if($_GET['ht'] == '142') { ?> selected="selected" <?php } ?>>4ft 8in - 142cm</option>
                                  <option value="144" <?php if($_GET['ht'] == '144') { ?> selected="selected" <?php } ?>>4ft 9in - 144cm</option>
                                  <option value="147" <?php if($_GET['ht'] == '147') { ?> selected="selected" <?php } ?>>4ft 10in - 147cm</option>
                                  <option value="149" <?php if($_GET['ht'] == '149') { ?> selected="selected" <?php } ?>>4ft 11in - 149cm</option>
                                  <option value="152" <?php if($_GET['ht'] == '152') { ?> selected="selected" <?php } ?>>5ft 0in - 152cm</option>
                                  <option value="154" <?php if($_GET['ht'] == '154') { ?> selected="selected" <?php } ?>>5ft 1in - 154cm</option>
                                  <option value="157" <?php if($_GET['ht'] == '157') { ?> selected="selected" <?php } ?>>5ft 2in - 157cm</option>
                                  <option value="160" <?php if($_GET['ht'] == '160') { ?> selected="selected" <?php } ?>>5ft 3in - 160cm</option>
                                  <option value="162" <?php if($_GET['ht'] == '162') { ?> selected="selected" <?php } ?>>5ft 4in - 162cm</option>
                                  <option value="165" <?php if($_GET['ht'] == '165') { ?> selected="selected" <?php } ?>>5ft 5in - 165cm</option>
                                  <option value="167" <?php if($_GET['ht'] == '167') { ?> selected="selected" <?php } ?>>5ft 6in - 167cm</option>
                                  <option value="170" <?php if($_GET['ht'] == '170') { ?> selected="selected" <?php } ?>>5ft 7in - 170cm</option>
                                  <option value="172" <?php if($_GET['ht'] == '172') { ?> selected="selected" <?php } ?>>5ft 8in - 172cm</option>
                                  <option value="175" <?php if($_GET['ht'] == '175') { ?> selected="selected" <?php } ?>>5ft 9in - 175cm</option>
                                  <option value="177" <?php if($_GET['ht'] == '177') { ?> selected="selected" <?php } ?>>5ft 10in - 177cm</option>
                                  <option value="180" <?php if($_GET['ht'] == '180') { ?> selected="selected" <?php } ?>>5ft 11in - 180cm</option>
                                  <option value="182" <?php if($_GET['ht'] == '182') { ?> selected="selected" <?php } ?>>6ft 0in - 182cm</option>
                                  <option value="185" <?php if($_GET['ht'] == '185') { ?> selected="selected" <?php } ?>>6ft 1in - 185cm</option>
                                  <option value="187" <?php if($_GET['ht'] == '187') { ?> selected="selected" <?php } ?>>6ft 2in - 187cm</option>
                                  <option value="190" <?php if($_GET['ht'] == '190') { ?> selected="selected" <?php } ?>>6ft 3in - 190cm</option>
                                  <option value="193" <?php if($_GET['ht'] == '193') { ?> selected="selected" <?php } ?>>6ft 4in - 193cm</option>
                                  <option value="195" <?php if($_GET['ht'] == '195') { ?> selected="selected" <?php } ?>>6ft 5in - 195cm</option>
                                  <option value="198" <?php if($_GET['ht'] == '198') { ?> selected="selected" <?php } ?>>6ft 6in - 198cm</option>
                                  <option value="200" <?php if($_GET['ht'] == '200') { ?> selected="selected" <?php } ?>>6ft 7in - 200cm</option>
                                  <option value="203" <?php if($_GET['ht'] == '203') { ?> selected="selected" <?php } ?>>6ft 8in - 203cm</option>
                                  <option value="205" <?php if($_GET['ht'] == '205') { ?> selected="selected" <?php } ?>>6ft 9in - 205cm</option>
                                  <option value="208" <?php if($_GET['ht'] == '208') { ?> selected="selected" <?php } ?>>6ft 10in - 208cm</option>
                                  <option value="210" <?php if($_GET['ht'] == '210') { ?> selected="selected" <?php } ?>>6ft 10in - 210cm</option>
                                  <option value="213" <?php if($_GET['ht'] == '213') { ?> selected="selected" <?php } ?>>7ft 0in - 213cm</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-xs btn-primary btn-block">
                            <b>
                              go
                            </b>
                          </button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    Marital status
                  </a>
                  <ul>
                    <li>
                        <select  class="form-control input-sm" id="fruits" onchange="go_ms(this.value);">
                          <option  value="">
                            -Select-
                          </option>
                          <option value="Never Married" <?php if($_GET['martial_status'] == 'Never Married') { ?> selected="selected" <?php } ?>>Never Married</option>
                           <option value="Divorced" <?php if($_GET['martial_status'] == 'Divorced') { ?> selected="selected" <?php } ?>>Divorced</option>
                           <option value="Widowed" <?php if($_GET['martial_status'] == 'Widowed') { ?> selected="selected" <?php } ?>>Widowed</option>
                           <option value="Awaiting Divorce" <?php if($_GET['martial_status'] == 'Awaiting Divorce') { ?> selected="selected" <?php } ?>>Awaiting Divorce</option>
                             <option value="Annulled" <?php if($_GET['martial_status'] == 'Annulled') { ?> selected="selected" <?php } ?>>Annulled</option>
                         
                        </select>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    Mother tongue
                  </a>
                  <ul>
                    <li>
                      <form>
                        <select name="mother_tongue"  class="form-control input-sm" id="fruits" onchange="go_mt(this.value);">
                          <option value="">
                            -Select-
                          </option>
                         <?php
						  $sqld = "select * from `mother_tongue` order by `mother_tongue`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->mother_tongue; ?>" <?php if($_GET['mother_tongue'] == $resd->mother_tongue) { ?> selected="selected" <?php } ?>><?php echo $resd->mother_tongue; ?></option>
                          <?php } ?>
                         
                        </select>
                      </form>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    Caste
                  </a>
                  <ul>
                    <li>
                      <form>
                        <select name="community" id="input" data-title="Select Community" data-live-search="true" data-style="mystyle btn-lg" class="form-control input-smu" data-width="100%" onchange="go_caste(this.value);">
                        <option  value="">
                            -Select-
                          </option>
                            <?php
						  $sqld = "select * from `communities` order by `community`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->community; ?>" <?php if($_GET['community'] == $resd->community) { ?> selected="selected" <?php } ?>><?php echo $resd->community; ?></option>
                          <?php } ?>
                         
                        </select>
                      </form>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    Star
                  </a>
                  <ul>
                    <li>
                      <form>
                        <select name="star" id="input" data-title="Select Nakshatra" data-style="mystyle btn-lg" class="form-control input-sm" data-width="100%" onchange="go_star(this.value);">
                        <option value="">
                            -Select-
                          </option>
                           <?php
						  $sqld = "select * from `nakshatra` order by `nakshatra`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->nakshatra; ?>" <?php if($_GET['star'] == $resd->nakshatra) { ?> selected="selected" <?php } ?>><?php echo $resd->nakshatra; ?></option>
                          <?php } ?>
                         
                        </select>
                      </form>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    Education
                  </a>
                  <ul>
                    <li>
                      <form>
                        <select name="education"  class="form-control input-sm" id="fruits" onchange="go_education(this.value);">
                          <option value="">
                            -Select-
                          </option>
                          <?php
						  $sqld = "select * from `education` order by `education`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->education; ?>" <?php if($_GET['education'] == $resd->education) { ?> selected="selected" <?php } ?>><?php echo $resd->education; ?></option>
                          <?php } ?>
                         
                        </select>
                      </form>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <a>
                    Occupation
                  </a>
                  <ul>
                    <li>
                      <form>
                        <select name="working_as"  class="form-control input-sm" id="fruits" onchange="go_wa(this.value);">
                          <option  value="">
                            -Select-
                          </option>
                          <?php
						  $sqld = "select * from `working_as` order by `working_as`";
						  $resultd = mysql_query($sqld);
						  while($resd = mysql_fetch_object($resultd)){
						  ?>
                          <option value="<?php echo $resd->working_as; ?>" <?php if($_GET['working_as'] == $resd->working_as) { ?> selected="selected" <?php } ?>><?php echo $resd->working_as; ?></option>
                          <?php } ?>
                         
                        </select>
                      </form>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    Annual income
                  </a>
                   <ul>
                    <li>
                      <form>
                        <select name="annual_income"  class="form-control input-sm" id="fruits" onchange="go_ai(this.value);">
                          <option  value="">
                            -Select-
                          </option>
                          <option value="Upto INR 1 Lakh" <?php if($_GET['annual_income'] == 'Upto INR 1 Lakh') { ?> selected <?php } ?> >Upto INR 1 Lakh</option>
    <option value="INR 1 Lakh to 2 Lakh" <?php if($_GET['annual_income'] == 'INR 1 Lakh to 2 Lakh') { ?> selected <?php } ?>>INR 1 Lakh to 2 Lakh</option>
    <option value="INR 2 Lakh to 4 Lakh" <?php if($_GET['annual_income'] == 'INR 2 Lakh to 4 Lakh') { ?> selected <?php } ?> >INR 2 Lakh to 4 Lakh</option>
    <option value="INR 4 Lakh to 7 Lakh" <?php if($_GET['annual_income'] == 'INR 4 Lakh to 7 Lakh') { ?> selected <?php } ?> >INR 4 Lakh to 7 Lakh</option>
    <option value="INR 7 Lakh to 10 Lakh" <?php if($_GET['annual_income'] == 'INR 7 Lakh to 10 Lakh') { ?> selected <?php } ?> >INR 7 Lakh to 10 Lakh</option>
    <option value="INR 10 Lakh to 15 Lakh" <?php if($_GET['annual_income'] == 'INR 10 Lakh to 15 Lakh') { ?> selected <?php } ?> >INR 10 Lakh to 15 Lakh</option>
    <option value="INR 15 Lakh to 20 Lakh" <?php if($_GET['annual_income'] == 'INR 15 Lakh to 20 Lakh') { ?> selected <?php } ?>>INR 15 Lakh to 20 Lakh</option>
    <option value="INR 20 Lakh to 30 Lakh" <?php if($_GET['annual_income'] == 'INR 20 Lakh to 30 Lakh') { ?> selected <?php } ?>>INR 20 Lakh to 30 Lakh</option>
    <option value="INR 30 Lakh to 50 Lakh" <?php if($_GET['annual_income'] == 'INR 30 Lakh to 50 Lakh') { ?> selected <?php } ?> >INR 30 Lakh to 50 Lakh</option>
    <option value="INR 50 Lakh to 75 Lakh"<?php if($_GET['annual_income'] == 'INR 50 Lakh to 75 Lakh') { ?> selected <?php } ?>>INR 50 Lakh to 75 Lakh</option>
    <option value="INR 75 Lakh to 1 Crore" <?php if($_GET['annual_income'] == 'INR 75 Lakh to 1 Crore') { ?> selected <?php } ?> >INR 75 Lakh to 1 Crore</option>
    <option value="INR 1 Crore & above" <?php if($_GET['annual_income'] == 'INR 1 Crore & above') { ?> selected <?php } ?> >INR 1 Crore &amp; above</option>
                         
                        </select>
                      </form>
                    </li>
                  </ul>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <?php
		
		foreach ($_GET AS $key => $value) {
 $_GET[$key] = addslashes($value);
}
extract($_GET);

if($looking_for != '')
	{
		$looking_for_qry = " and `gender` = '$looking_for' ";
	} else {
		if(isset($_SESSION['uid'])) {
			$uid = $_SESSION['uid'];
			$sqlu = "select gender from profiles where entry_id = $uid";
			$resultu = mysql_query($sqlu);
			$resu = mysql_fetch_object($resultu);
			if($resu->gender == 'Male')
			{
				$looking_for_qry = " and `gender` = 'Female' ";
			} else {
				$looking_for_qry = " and `gender` = 'Male' ";
			}
		} else {
		$looking_for_qry = " and `gender` = 'Female' ";
		}
	}
	
	if($af != '')
	{
		$adate = date("d-m-Y");
		$from_date =   date('d-m-Y', strtotime($adate . "-$af year") );
		$from_date = strtotime($from_date);
		$af_qry = " and `dob_time` <= '$from_date' ";
	} else {
		$af_qry = "";
	}
	
	if($at != '')
	{
		$adate = date("d-m-Y");
		$to_date =   date('d-m-Y', strtotime($adate . "-$at year ") );
		$to_date = strtotime($to_date);
		$at_qry = " and `dob_time` >= '$to_date' ";
	} else {
		$at_qry = "";
	}
	
	if($hf != '')
	{
		$hf_qry = " and `height` >= '$hf' ";
	} else {
		$hf_qry = "";
	}
	
	if($ht != '')
	{
		$ht_qry = " and `height` <= '$ht' ";
	} else {
		$ht_qry = "";
	}
	
		 if($martial_status != '')
	{
		$martial_status_qry = " and `martial_status` = '$martial_status' ";
	} else {
		$martial_status_qry = "";
	}
	
	if($mother_tongue != '')
	{
		$mother_tongue_qry = " and `mother_tongue` = '$mother_tongue' ";
	} else {
		$mother_tongue_qry = "";
	}
	
	if($community != '')
	{
		$community_qry = " and `community` = '$community' ";
	} else {
		$community_qry = "";
	}
	
	if($star != '')
	{
		$star_qry = " and `nakshatra` = '$star' ";
	} else {
		$star_qry = "";
	}
	
	if($education != '')
	{
		$education_qry = " and `education` = '$education' ";
	} else {
		$education_qry = "";
	}
	
	if($working_as != '')
	{
		$working_as_qry = " and `working_as` = '$working_as' ";
	} else {
		$working_as_qry = "";
	}
	
	if($annual_income != '')
	{
		$annual_income_qry = " and `annual_income` = '$annual_income' ";
	} else {
		$annual_income_qry = "";
	}


		 $i = (($page-1)*20)+1;
		  $sql5 = "select * from `profiles` where `status` = 'Active' $looking_for_qry $hf_qry $ht_qry $martial_status_qry $community_qry $mother_tongue_qry $star_qry $education_qry $working_as_qry $annual_income_qry $af_qry $at_qry";
		  $result5 = mysql_query($sql5);
		   $tr = mysql_num_rows($result5);
		  ?>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-8">
              <h3>
                Profiles Found (<?php echo $tr; ?>)
              </h3>
            </div>
            <!--<div class="col-md-2">
              <span class="pull-right">
                <div class="checkbox m-t-2">
                  <label class="btn btn-warning p-l-3">
                    <input type="checkbox" value=""/>
                    Send Interest to All
                  </label>
                </div>
              </span>
            </div>
            <div class="col-md-2">
              <select name="" id="input" class="form-control input-sm m-t-2" required="required">
                <option value="">Sort by</option>
              </select>
            </div>-->
          </div>
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
	$path = "search_results.php";
	//$condition ="";
	$tab = "";
	
	
	
		  if($tr > 0) {
			  
		 $sql = "select * from `profiles` where `status` = 'Active' $looking_for_qry $hf_qry $ht_qry $martial_status_qry $community_qry $mother_tongue_qry $star_qry $education_qry $working_as_qry $annual_income_qry $af_qry $at_qry order by  `entry_id` desc LIMIT $limitvalue, $limit";
		 $result = mysql_query($sql);
		 while($res = mysql_fetch_object($result)) {
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
			 
			 if(isset($_SESSION['uid'])) {
		 $link = "profile_view.php?pid=$res->code";
		 } else { 
		  $link = "login.php";
		 } ?>
          <div class="panel profile_block">
            <!--<span class="actions">
              <a href="#" class="fa fa-eye" >
              </a>
              <a href="#" class="fa fa-trash">
              </a>
            </span>-->
            <div class="media">
              <div class="media-left">
                <a href="<?php echo $link; ?>">
                <?php $sqli = "select * from `images` where `profile_link` = $res->entry_id order by `pstatus` asc";
				$resulti = mysql_query($sqli);
				if(mysql_num_rows($resulti) > 0) { 
				$resi = mysql_fetch_object($resulti); ?>
                <img class="media-object" src="thumb/timthumb.php?src=profiles/<?php echo $resi->image; ?>&w=200&h=200" alt="..."/>
                <?php } else { ?>
                  <img class="media-object" src="images/thumb.png" alt="..."/>
                  <?php } ?>
                </a>
                <!--<small>
                  Last Login : 58 mins ago
                </small>-->
                <a href="<?php echo $link; ?>" class="btn-link btn-block special m-t-1">
                  View Full Profile
                  <i class="fa fa-caret-right">
                  </i>
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">
                  <div class="radio m-a-0">
                    <!--<label class="p-l-0">
                      <input type="checkbox" name="" id="input" value="" checked="checked"/>
                      Gouthami
                    </label>-->
                    <?php echo $res->name; ?>
                  </div>
                </h4>
                <small>
                  MP<?php echo $res->entry_id; ?> | Profile Created for <?php echo $res->created_by; ?>
                </small>
                <ul class="m-t-1">
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
                  <?php /*?><li>
                    <strong>
                      Location
                    </strong>
                    : <?php echo $city; ?>, <?php echo $state; ?>, <?php echo $country; ?>
                  </li><?php */?>
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
                <!--<span class="phara_qoutes">
                  Swetha was very lovable person and she is caring too and make others,
                  I belong to the Christian - Others caste and am looking for a match from
                </span>-->
              </div>
              <div class="separator">
              </div>
              <?php if(isset($_SESSION['uid'])) { ?>
              <span class="pull-right">
                <a href="javascript:saveprofile(<?php echo $res->entry_id; ?>);" class="btn btn-success">
                  Save Profile
                  <i class="fa fa-save">
                  </i>
                </a>
               <!-- <a href="" class="btn btn-info">
                  Shortlist
                  <i class="fa fa-th-large">
                  </i>
                </a>-->
                <a href="javascript:sendint(<?php echo $res->entry_id; ?>);" class="btn btn-warning">
                  Send Interest
                  <i class="fa fa-heart">
                  </i>
                </a>
              </span>
              <?php } else { ?>
               <span class="pull-right">
                <a href="login.php" class="btn btn-success">
                  Save Profile
                  <i class="fa fa-save">
                  </i>
                </a>
               <!-- <a href="" class="btn btn-info">
                  Shortlist
                  <i class="fa fa-th-large">
                  </i>
                </a>-->
                <a href="login.php" class="btn btn-warning">
                  Send Interest
                  <i class="fa fa-heart">
                  </i>
                </a>
              </span>
              <?php } ?>
              <div class="clearfix"></div>
            </div>
          </div>
          <?php } ?>
          
          <span class="pull-right">
            <ul class="pagination">
               <?php echo paginate($page,$path,$tr,$limit,$condition,$tab); ?>
            </ul>
          </span>
          <?php } else { ?>
          <h3 align="center">There are no profiles found for your related search.</h3>
          <?php } ?>
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
