<?php include("includes/css.php")?>

	<body class="smoothscroll enable-animation">

		<div id="wrapper">

			<?php include("includes/header.php")?>

			<!-- /PAGE HEADER -->



			<section class="page-header page-header-xs">

				<div class="container">



					<?php 

error_reporting(NULL);

include"db.php";



if(isset($_POST['submit']) && isset($_POST['kitstatus']) && $_POST['kitstatus']==1)

{

	$query = mysql_query("UPDATE gulbarga SET `u_pstatus` = '1' WHERE `u_id` = '".$_POST['useridsignup']."'"); 

	if(!$row = mysql_fetch_array($query)) 

						{ 

							echo "<center><h3>Record Updated Sucessfully</h3></center>"; 

						} 

					else 

						{ 

							echo "<center>Record Not Updated</center>"; 

						} 

}else{
    
    ?>
    
    <script>
        
            alert("Please select Kit Status");
            window.location.href= "https://qc.milliservices.com/check.php";
      
    </script>
    
    <?php
    
}



?><br><br><br>

			</section>



			

		



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