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

							<div class="panel-heading panel-heading-transparent " style="background:#F3F3F3;">

								<h1 class="panel-title" style="font-size:25px; color:#999;"><center> Sorry Booking Closed </center></h1>

							</div>



<?php 

error_reporting(0);

include"db.php";



function sendSms($contacts,$userid){

$query = mysql_query("SELECT count(`u_id`) AS count From gulbarga"); 
$row = mysql_fetch_assoc($query);
if($row['count'] >= 1000){
    $sms_text = urlencode('Sorry sir registration of cleaning kit has been closed. Thanks and best regards Milli Team!');
}else{
    $sms_text = urlencode('Dear Sir, Your KIT  registration number is:'.$userid.'.-Just a little care can make a big change. Thanks and best regards Milli Team!');
}


$api_key = '35B28C0D7DB129';
$from = 'SAOWDA';

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

		<!--Start of Tawk.to Script-->

<script type="text/javascript">

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();

(function(){

var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];

s1.async=true;

s1.src='https://embed.tawk.to/5868f59d7418a41587c6e52c/default';

s1.charset='UTF-8';

s1.setAttribute('crossorigin','*');

s0.parentNode.insertBefore(s1,s0);

})();

</script>

<!--End of Tawk.to Script-->

		

		

	</body>

</html>