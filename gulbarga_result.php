<?php include("includes/css.php")?>
	<body class="smoothscroll enable-animation">
		<div id="wrapper">
			<?php include("includes/header.php")?>
			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
						<!-- Useful Elements -->
						<div class="panel panel-default">
							<div class="panel-heading panel-heading-transparent">
								<h2 class="panel-title">User Details</h2>
							</div>
							<div class="panel-body">

							 <?php 

error_reporting(NULL);

include"db.php";

if(isset($_POST['submit'])) 

	{ 

		

		$query = mysql_query("SELECT * FROM gulbarga WHERE autoincrement_id = '".$_POST['passwordsignup']."'");

if(mysql_num_rows($query) > 0)

	{

	$array = mysql_fetch_assoc($query);
       if($array['u_pstatus']==1){
           ?>
           <h1>Kit Receved</h1>
           <form  action="#" method="post" enctype="multipart/form-data">
		<fieldset>
			<!-- required [php action request] -->
			<div class="row">
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Name </label>
                        <input class="form-control " readonly name="usernamesignup" type="text" value="<?php echo $array['name'];?>"  />
					</div>
				</div>
			</div>
			 <div class="row">
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Email </label>
                    <input class="form-control " readonly name="emailsignup" type="email" value="<?php echo $array['email'];?>" /> 
					</div>
				</div>
			</div>
				<div class="row">
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Mobile No </label>
				        <input class="form-control " readonly name="passwordsignup" value="<?php echo $array['mobile'];?>" type="number" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Kit Recived Status</label>
                        <input class="form-control " readonly name="passwordsignup" value="Yes" type="text" placeholder="Kit status"/>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
           <?php
       }else{
	?>
	<h1>Kit Not Receved</h1>
    <form  action="gulbarga_checkstatus.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<!-- required [php action request] -->
			<div class="row">
			    <div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>Reg Number </label>
                        <input class="form-control " readonly name="regno" type="text" value="<?php echo $array['autoincrement_id'];?>"  />
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Name </label>
                        <input class="form-control " readonly name="usernamesignup" type="text" value="<?php echo $array['name'];?>"  />
                        <input class="form-control " name="useridsignup" type="hidden" value="<?php echo $array['u_id'];?>"/>
					</div>
				</div>
			</div>
			 <div class="row">
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Email </label>
                    <input class="form-control " readonly name="emailsignup" type="email" value="<?php echo $array['email'];?>" /> 
					</div>
				</div>
			</div>
				<div class="row">
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Mobile No </label>
				        <input class="form-control " readonly name="passwordsignup" value="<?php echo $array['mobile'];?>" type="number" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-md-12 col-sm-12">
						<label>User Kit Recived Status</label>
                        <select name="kitstatus" id="kitstatus" class="form-control ">
                            <option value="">Select Kit Status</option>
                            <option value="1">Yes</option>
                        </select>
					</div>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-success">Update</button>
		</fieldset>
	</form>
<?php 	
       }
	}
else
	{
	?>
	<div id="wrapper">
			There is no on this regID
	</div>
	<?php 
	}
	}
?>      

							</div>
						</div>
						<!-- /Useful Elements -->
						</div>
					</div>
				</div>
			</section>
			<!-- / -->
		</div>
		<!-- /wrapper -->
		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>
	<!-- FOOTER -->
			<footer id="footer" >
				<div class="copyright">
					<div class="container">
						<ul class="pull-right nomargin list-inline mobile-block">
							<li><a href="#">Terms &amp; Conditions</a></li>
							<li>&bull;</li>
							<li><a href="#">Privacy</a></li>
						</ul>
						&copy; All Rights Reserved, Company LTD
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/scripts.js"></script>
	</body>
</html>