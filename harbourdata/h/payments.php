<?php

session_cache_limiter('private, must-revalidate');

session_cache_expire(60);

//ini_set('display_errors',1);

//error_reporting(E_ALL);

include('plans/mysql.php');

include('plans/payment-ack-download.php');

$baseurl="https://pidatacenters.com";

if(isset($_REQUEST['x'])){

	$hdata=mysqli_real_escape_string($mr_con,$_REQUEST['x']);

	$sql = "SELECT orderalias,randmnumm,finalcheck FROM lj_payments_pend WHERE finalcheck='$hdata' AND flag='0'";

	$result = mysqli_query($mr_con,$sql);

	if($result){

		$count = mysqli_num_rows($result);

		if($count>'0'){

			$rowTT = mysqli_fetch_array($result);

			$orderalias=$rowTT['orderalias'];

			$sql1 = "SELECT  fullname,ordered_by,address,city,state,pincode FROM lj_order_address WHERE order_alias='$orderalias' AND flag='0'";

			$result1 = mysqli_query($mr_con,$sql1);

			if($result1){

				$count1 = mysqli_num_rows($result1);

				if($count1>'0'){

					$payment_mode=alias($orderalias,'lj_orders','alias','payment_mode');

					if($payment_mode=='online'){

						$rowTT1 = mysqli_fetch_array($result1);

						$secretKey="c882b4a1aa071c3cf7afc00d3976268d";

						$account_id="20343";

						$refrence_no=alias($orderalias,'lj_orders','alias','order_id');

						$return_url="https://pidatacenters.com/pidata/p/response.php";

						$mode="LIVE";
						//$mode="TEST";

						$channel="0";

						$currency="INR";

						$amount=alias($orderalias,'lj_orders','alias','order_amount');

						$name=$rowTT1['fullname'];

						$address=$rowTT1['address'];

						$city=$rowTT1['city'];

						$state=$rowTT1['state'];

						$postal_code=$rowTT1['pincode'];

						//$country=$_REQUEST['country'];

						$country="IND";

						$email=alias($rowTT1['ordered_by'],'lj_logins','alias','username');

						$phone=alias($rowTT1['ordered_by'],'lj_logins','alias','mobile_no');

						$description='This is test payment from '.$name.' with reference number '.$refrence_no.' dated on '.date("Y-m-d")." for an amount of Rs ".$amount.".";

						// $hash="$secretKey|$account_id|$amount|$refrence_no|$return_url|$mode";

						// $secure_hash=md5($hash);

						$hash="$secretKey|$account_id|$address|$amount|$channel|$city|$country|$currency|$description|$email|$mode|$name|$phone|$postal_code|$refrence_no|$return_url|$state";
						// $secure_hash = strtoupper(hash("sha512",$hash));//for SHA512
						$secure_hash = strtoupper(md5($hash));//for MD5

						echo'<body onload="frmsubitt()"><center><p>Please Wait...<br>Do not refresh or go back</p></center><form action="https://secure.ebs.in/pg/ma/payment/request" method="POST" id="frm1" name="frm1">

						<input type="hidden" value="'.$account_id.'" name="account_id"/>

						<input type="hidden" value="'.$address.'" name="address"/>

						<input type="hidden" value="'.$amount.'" name="amount"/>

						<input type="hidden" value="'.$channel.'" name="channel"/>

						<input type="hidden" value="'.$city.'" name="city"/>

						<input type="hidden" value="'.$country.'" name="country"/>

						<input type="hidden" value="'.$currency.'" name="currency"/>

						<input type="hidden" value="'.$description.'" name="description"/>

						<input type="hidden" value="'.$email.'" name="email"/>

						<input type="hidden" value="'.$mode.'" name="mode"/>

						<input type="hidden" value="'.$name.'" name="name"/>

						<input type="hidden" value="'.$phone.'" name="phone"/>

						<input type="hidden" value="'.$postal_code.'" name="postal_code"/>

						<input type="hidden" value="'.$refrence_no.'" name="reference_no"/>

						<input type="hidden" value="'.$return_url.'" name="return_url"/>

						<input type="hidden" value="'.$state.'" name="state"/>

						<input type="hidden" value="'.$secure_hash.'" name="secure_hash"/>

						</form></body>';

						echo "<script type='text/javascript'>function frmsubitt(){setTimeout(function(){document.frm1.submit()},2000);}</script>";

					}else{

						echo'<body><center><p>Please Wait...<br>Do not refresh or go back</p></center>';

						 orderssss($orderalias);

						 //echo "<script type='text/javascript'>window.location='".$baseUrl."/pidata/response1.php?x=".$orderalias."'</script>";
						 echo "<script type='text/javascript'>window.location='https://pidatacenters.com/pidata/p/response1.php?x=".$orderalias."'</script>";


					}

				}else echo '<center><h3>Something went wrong! Try again later 1</h3></center>';

			}else echo '<center><h3>Something went wrong! Try again later 2</h3></center>';

		}else echo '<center><h3>Something went wrong! Try again later 3</h3></center>';

	}else echo '<center><h3>Something went wrong! Try again later 4</h3></center>';

}else{

echo '<center><h3>You are not supposed to be here</h3></center>';

}

?>

