<center><p>Please Wait...<br>Do not refresh or go back</p></center>

<?php include('mysql.php');
//ini_set('display_errors',1);

//error_reporting(E_ALL);

include('payment-ack-download.php');

date_default_timezone_set("Asia/Kolkata");

$current_date_time=date("Y-m-d H:i:s");
function alias_alias($tb,$col,$alias,$retrive){ global $mr_con;

	$sql = mysqli_query($mr_con,"SELECT $retrive FROM $tb WHERE $col='$alias'");

	if(mysqli_num_rows($sql)){

		$row = mysqli_fetch_array($sql);

		return $row[$retrive];

	}else return "";

}

function generateRandomString($length = 15) {

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$charactersLength = strlen($characters);

	$randomString = '';

	for ($i = 0; $i < $length; $i++){$randomString .= $characters[rand(0, $charactersLength - 1)];}

	return strtoupper($randomString);

}

function aliasCheck($fv1,$fv2,$fv3){ global $mr_con;

	$rec=$mr_con->query("SELECT $fv3 FROM $fv2 WHERE $fv3='$fv1'");

	if($rec->num_rows==0)return $fv1; else return aliasCheck(generateRandomString(15),$fv2,$fv3);

}

function generateRandomcode($length = 5) {

	$characters = '0123456789';

	$charactersLength = strlen($characters);

	$randomString = '';

	for ($i = 0; $i < $length; $i++){$randomString .= $characters[rand(0, $charactersLength - 1)];}

	return strtoupper($randomString);

}

function codeCheck($fv1,$fv2,$fv3){ global $mr_con;

	$rec=$mr_con->query("SELECT $fv3 FROM $fv2 WHERE $fv3='#".$fv1."'");

	if($rec->num_rows==0)return $fv1; else return codeCheck(generateRandomcode(5),$fv2,$fv3);

}



$uname=mysqli_real_escape_string($mr_con,$_REQUEST['uname']);

$password=mysqli_real_escape_string($mr_con,$_REQUEST['password']);

$fullname=mysqli_real_escape_string($mr_con,$_REQUEST['fullname']);

$designation=mysqli_real_escape_string($mr_con,$_REQUEST['designation']);

$company_name=mysqli_real_escape_string($mr_con,$_REQUEST['company_name']);

$industry=mysqli_real_escape_string($mr_con,$_REQUEST['industry']);

$addtype=mysqli_real_escape_string($mr_con,$_REQUEST['addtype']);

$add1=mysqli_real_escape_string($mr_con,$_REQUEST['add1']);

$add2=mysqli_real_escape_string($mr_con,$_REQUEST['add2']);

$city=mysqli_real_escape_string($mr_con,$_REQUEST['city']);


$state=mysqli_real_escape_string($mr_con,$_REQUEST['state_v2']);

$country=mysqli_real_escape_string($mr_con,$_REQUEST['country_v2']);
//echo $state;
//echo $country;

$pincode=mysqli_real_escape_string($mr_con,$_REQUEST['pincode']);

$type_payment=mysqli_real_escape_string($mr_con,$_REQUEST['type_payment']);

if(empty($uname)){$ecode=0;$emsg="Kinldy Login before Ordering";}

elseif(empty($password)){$ecode=0;$emsg="Kinldy Login before Ordering";}

elseif(empty($fullname)){$ecode=0;$emsg="Enter Full Name";}

elseif(empty($designation)){$ecode=0;$emsg="Enter Designation";}

elseif(empty($company_name)){$ecode=0;$emsg="Enter Company Name";}

elseif(empty($industry)){$ecode=0;$emsg="Enter Industry";}

elseif(empty($addtype)){$ecode=0;$emsg="Select Address Type";}

elseif(empty($add1)){$ecode=0;$emsg="Enter Address";}

elseif(empty($city)){$ecode=0;$emsg="Enter City Name";}

elseif(empty($state)){$ecode=0;$emsg="Select State";}
elseif(empty($country)){$ecode=0;$emsg="Select Country";}

elseif(empty($pincode)){$ecode=0;$emsg="Enter Pincode";}

elseif(empty($type_payment)){$ecode=0;$emsg="Enter Payment Type";}

elseif(count($_REQUEST['packselected'])<='0'){$ecode=0;$emsg="Select Atleast one Plan";}

else{

	$address=$add1." ".$add2;

	$order_amount='0';	

	$sql = "SELECT alias FROM lj_logins WHERE username='$uname' AND password='$password'";

	$result = mysqli_query($mr_con,$sql);

	if($result){

		$count = mysqli_num_rows($result);

		if($count>'0'){

			$rowTT = mysqli_fetch_array($result);

			$usalias=$rowTT['alias'];

			$oderd_id='#'.codeCheck(generateRandomcode(10),'lj_orders','order_id');

			$alias=aliasCheck(generateRandomString(15),'lj_orders','alias');
			$order_status = '0';

			if($type_payment=='online'){
				$order_status = '1';
			}

			$q1="INSERT INTO lj_orders (order_id, order_by, order_date, order_amount, payment_mode, order_status, alias) VALUES ('$oderd_id','$usalias','$current_date_time','$order_amount','$type_payment','$order_status','$alias')";

			$rs1=mysqli_query($mr_con,$q1);

			if($rs1){

				//$addalias=aliasCheck(generateRandomString(15),'lj_order_address','alias');

				mysqli_query($mr_con,"UPDATE lj_order_address SET order_alias='$alias',designation='$designation',company_name='$company_name',fullname='$fullname',industry='$industry',addresstype='$addtype',address='$address',city='$city',state='$state',country='$country',pincode='$pincode' WHERE ordered_by='$usalias'");

				mysqli_query($mr_con,"UPDATE lj_logins SET company='$company_name',name='$fullname' WHERE alias='$usalias'");

				if($rs1){

					for($gg=0;$gg<count($_REQUEST['packselected']);$gg++){

						$drive='0';
						$power=$rackspace=0;
						$plan_id = $_REQUEST['packid'][$gg];
						
						$s_plan=$_REQUEST['packselected'][$gg];

						$s_plan_sub=$_REQUEST['packselectedsub'][$gg];

						$months=$_REQUEST['packmonths'][$gg];

						$price=$_REQUEST['packprice'][$gg];

						$cpu=$_REQUEST['packcpu'][$gg];
						$ram=$_REQUEST['packram'][$gg];
						$data=$_REQUEST['packdata'][$gg];
						$space=$_REQUEST['packspace'][$gg];
						$backup=$_REQUEST['packbackup'][$gg];
						//$cpu=$_REQUEST['packcpu'][$gg];
						$drive=$_REQUEST['packdrive'][$gg];
						$server=$_REQUEST['packserver'][$gg];
						$power=$_REQUEST['packpower'][$gg];
						$iops=$_REQUEST['packips'][$gg];

						$os=$_REQUEST['packos'][$gg];

						$db=$_REQUEST['packdb'][$gg];
						$total = $_REQUEST['plantotal'][$gg];
						$planamount[] = $_REQUEST['plantotal'][$gg];

						$qtt = $_REQUEST['packqtt'][$gg];
						$otc12 = $_REQUEST['otc123'][$gg];
						$otc[] = $_REQUEST['otc123'][$gg];

						$orderitems_alias=aliasCheck(generateRandomString(15),'lj_order_address','alias');

						$jagan="INSERT INTO lj_selected_plans1 (plan_id, order_id, ram, cpu_cores, data_transfer, disk_space, backup, iops, drive, server1, power, selectedOs, db, months, price,quantity, plan_amount, alias,otc)

						VALUES ('$plan_id','$alias', '$ram', '$cpu','$data', '$space', '$backup', '$iops', '$drive', '$server', '$power', '$os', '$db', '$months', '$price','$qtt', '$total', '$orderitems_alias','$otc12')";

//INSERT INTO lj_selected_plans1 (plan_id, order_id, ram, cpu_cores, data_transfer, disk_space, backup, iops, drive, server1, power, selectedOs, db, months, price, plan_amount, alias)

						//VALUES ('10','MOMDOMASM', '10', '20','50', '100', '50', '10', 'SATA', '5', '3', 'WINODWS', 'mySQL', '3', '10000', '100001', 'JSAJDJKASKDAD');


						$reft=mysqli_query($mr_con,$jagan);

						if($reft){

							$ecode=2;$emsg="Order Successfully Placed";

						}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later0";}

					}

					if(count($planamount)>'0'){

						$finalAmt=(array_sum($planamount)+array_sum($otc))+(int)((array_sum($planamount)+array_sum($otc))*0.18);	

						mysqli_query($mr_con,"UPDATE lj_orders SET order_amount='$finalAmt' WHERE alias='$alias'");

						$acre=rand();

						$hasdat=md5($alias."||".$acre);

						mysqli_query($mr_con,"INSERT INTO lj_payments_pend (orderalias,randmnumm,finalcheck) VALUES ('$alias','$acre','$hasdat')");

						//echo "<script type='text/javascript'>window.location='".$baseUrl."/pidata/payments.php?x=".$hasdat."'</script>";
						echo "<script type='text/javascript'>window.location='https://pidatacenters.com/pidata/p/payments.php?x=".$hasdat."'</script>";

					}

				}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later1";}

			}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later2";}

		}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later3";}

	}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later4";}

}

//echo $emsg;









function curlx($url){

	$chu = curl_init();

	curl_setopt($chu, CURLOPT_URL, $url);

	curl_setopt($chu, CURLOPT_FRESH_CONNECT, true);

	curl_setopt($chu, CURLOPT_TIMEOUT, 1);

	curl_exec($chu);

	curl_close($chu);

}