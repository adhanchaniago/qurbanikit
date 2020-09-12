<?php include("includes/css.php")?>

	<body class="smoothscroll enable-animation">

		<div id="wrapper">

			<?php include("includes/header.php")?>

			<section>
            <center><h1><span style="font-size:40px;">Eid Ul Adha 2019 Cleaning Campaign</span><br><q><span style="font-size:30px;">Just A Little Care Can Make A Big Change</span></q></h1></center>
				
				<div class="container">

					<div class="row">



						<div class="col-md-12 col-sm-12">



						

	

						<!-- Useful Elements -->

						<div class="panel panel-default">

							<div class="panel-heading panel-heading-transparent " style="background:#F3F3F3;">

								<h1 class="panel-title" style="font-size:25px; color:#8ab933;"><center>Book Your Eid Ul Adha Cleaning Kit</center></h1>

							</div>



							<div class="panel-body">


								<form  action="index.php" method="post" enctype="multipart/form-data">

									<fieldset>

										<!-- required [php action request] -->

										



										<div class="row">

											<div class="form-group">

												<div class="col-md-3 col-sm-3">

													<label>Your Name *</label>

													<input type="text" name="usernamesignup" value="" class="form-control" placeholder="Enter Your Name" required>

												</div>

												

												<div class="col-md-3 col-sm-3">

													<label>Mobile Number *</label>

													<input type="text" name="passwordsignup" value="" class="form-control" placeholder="Enter Your Mobile Number" required>

												</div>

												<div class="col-md-3 col-sm-3">

													<label>Alternative Number </label>

													<input type="text" name="altno" value="" class="form-control " placeholder="Enter Your Alternative Number" >

												</div>

												<div class="col-md-3 col-sm-3">

													<label>Your email </label>

													<input type="email" name="emailsignup" value="" class="form-control " placeholder="Enter Your Email " >

												</div>

											</div>

										</div>

										<div class="row">

											<div class="form-group">										

												<div class="col-md-3 col-sm-3">

													<label>City </label>

													
<select name="city" id="city" class="form-control ">
<option value="Gulbarga">Gulbarga</option>
</select>
												</div>

												

												<div class="col-md-3 col-sm-3">

													<label>Ward</label>

													<input type="text" name="ward" value="" class="form-control " placeholder="Ward No">

												</div>

												
                                                   
												
												<div class="col-md-3 col-sm-3">

													<label>Distribution Point*</label>
                                                    <select name="dpoint" id="dpoint" class="form-control" required>
                                                    <option value="">Select Distribution Point</option>
                                                    <option value="Shaikh Roza">Shaikh Roza</option>
                                                    <option value="Mohd.Rafeeq Chowk">Mohd.Rafeeq Chowk</option>
                                                    <option value="Phatak(MSK Mill)">Phatak(MSK Mill)</option>
                                                    <option value="Mijhgori">Mijhgori</option>
                                                    <option value="Rehmat nagar">Rehmat nagar</option>
                                                    <option value="Aiwan-E-Shahi">Aiwan-E-Shahi</option>
                                                    <option value="Santrashwadi">Santrashwadi </option>
                                                    <option value="Gulshan-E-Arafat Colony">Gulshan-E-Arafat Colony</option>
                                                    <option value="Zam Zam Colony">Zam Zam Colony</option>
                                                    <option value="Islamabad Colony">Islamabad Colony</option>
                                                    <option value="Yadulla Colony">Yadulla Colony</option>
                                                    <option value="Misbah Nagar">Misbah Nagar</option>
                                                    </select>
													

												</div>

												

												<div class="col-md-3 col-sm-3">

													<label>Address </label>

													<input type="text" name="address" value="" class="form-control " placeholder="Address with Pincode">

												</div>

											</div>

										</div>

										



										<button type="submit" name="submit" class="btn btn-success">Book Now</button>



									

									</fieldset>


<h4 style="color:red;"><font face="Fira Sans">Note: We <bold>Milli Services</bold> Team Doing the Cleaning Campaign since 3years free of cost for Sake of Allah Subhanawatala. Please Support Us to make a Kalaburagi City Clean.</font></h4>
									

<?php 

error_reporting(0);

include"db.php";



function sendSms($contacts,$userid){

$query = mysql_query("SELECT count(`u_id`) AS count From gulbarga"); 
$row = mysql_fetch_assoc($query);
if($row['count'] >= 10000){
    $sms_text = urlencode('Sorry sir registration of cleaning kit has been closed. Thanks and best regards Milli Team!');
}else{
    $sms_text = urlencode('Assalamualikum , Your Cleaning KIT registration number is:'.$userid.'.-Just a little care can make a big change. Thanks & Regards Milli Team!');
}


$api_key = '35B28C0D7DB129';
$from = 'MILLIS';

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://kutility.in/app/smsapi/index.php?key=35B28C0D7DB129&type=text");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "&routeid=415&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
$response = curl_exec($ch);
curl_close($ch);
}

function getCurrentSequence(){
    $query = mysql_query("SELECT * FROM core_settings_sequence WHERE identity='CAM'"); 
    $settingsSequence= mysql_fetch_array($query);
    $leftPadding = $settingsSequence['left_padding'];
    if ($leftPadding == "") {
        $leftPadding = 1;
    }
    $value = $settingsSequence['prefix'] . str_pad($settingsSequence['current_sequence'], $leftPadding, "0", STR_PAD_LEFT);
    return $value;
}

function getUpdateCurrentSequence(){
    mysql_query("update core_settings_sequence set current_sequence=current_sequence+1 where identity='CAM'");
}


function SignUp() 

	{ 

		if(!empty($_POST['passwordsignup'])) 

			{ 



$query = mysql_query("SELECT * FROM gulbarga WHERE mobile='".$_POST['passwordsignup']."'"); 

					if(!$row = mysql_fetch_array($query)) 

						{ 

							newuser(); 

						} 

					else 

						{ 

							echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 

						} 

			} 

	} 

function NewUser()

{ 

$name = $_POST['usernamesignup']; 

$email = $_POST['emailsignup'];

$mobile = $_POST['passwordsignup'];

$atlno = $_POST['altno'];

$address = $_POST['address'];

$city = $_POST['city'];

$ward = $_POST['ward'];

$dpoint = $_POST['dpoint'];

$userid = rand(100000,999999);	

$query = "INSERT INTO gulbarga (`autoincrement_id`,`name`,`email`,`mobile`,`altno`,`dpoint`,`ward`,`address`,`city`) 

VALUES ('".$userid."','".$name."','".$email."','".$mobile."','".$atlno."','".$dpoint."','".$ward."','".$address."','".$city."')";

//echo $query;exit;

 $data = mysql_query ($query);
 
 sendSms($mobile,$userid);

$id = mysql_insert_id();

 $to = $_POST['emailsignup']; 

    $subject = "EEMSO kit Booking No";

    $message = "Your Booking has been successfully completed and your booking No is:".$userid;

    $from = "eemsoindia@gmail.com";

    $headers = "From:" . $from;



    if (mail($to, $subject, $message, $headers)) 

		{

        	echo "Mail Sent To Your Registered Email Account.";

    	}

    else 

		{

        	

    	}



 //$message = "YOUR REGISTRATION IS COMPLETED";

  if($data) 

  	{

                  echo "<br>";

		 echo "YOUR REGISTRATION NO IS: ";

                  echo  "<h1 color='#D2A920'>".$userid."</h1>";

	 }

 } 



 	

	if(isset($_POST['submit'])) 

		{ 

			SignUp(); 

		} 

	

?>

								</form>

							



							</div>



							

						</div>

					

						</div>

					</div>



				</div>

			</section>

		</div>

		<!-- /wrapper -->





		<!-- SCROLL TO TOP -->

		<a href="#" id="toTop"></a>





	<!-- FOOTER -->

			<footer id="footer" >



				<div class="copyright">

					<div class="container">

						

						&copy; All Rights Reserved, Milli Services

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