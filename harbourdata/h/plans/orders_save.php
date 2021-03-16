<?php include('mysql.php');
//ini_set('display_errors',1);

//error_reporting(E_ALL);
include('payment-ack-download.php');

date_default_timezone_set("Asia/Kolkata");

$current_date_time=date("Y-m-d H:i:s");

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



$copmans=mysqli_real_escape_string($mr_con,$_REQUEST['copmans']);

$svname=mysqli_real_escape_string($mr_con,$_REQUEST['svname']);

$svmob=mysqli_real_escape_string($mr_con,$_REQUEST['svmob']);

$emailll=mysqli_real_escape_string($mr_con,$_REQUEST['emailll']);

	$sql = "SELECT id FROM lj_logins WHERE username='$emailll'";

	$result = mysqli_query($mr_con,$sql);

	if($result){

		$count = mysqli_num_rows($result);

		if($count=='0'){

			$aliass=aliasCheck(generateRandomString(15),'lj_logins','alias');

			$password=aliasCheck(generateRandomString(8),'lj_logins','password');

			$sqla="INSERT INTO lj_logins (username,alias,password,mobile_no,name,company) VALUES ('$emailll','$aliass','$password','$svmob','$svname','$copmans')";

			

			$resulta = mysqli_query($mr_con,$sqla);
			
			$alias_a=aliasCheck(generateRandomString(15),'lj_order_address','alias');

			mysqli_query($mr_con,"INSERT INTO lj_order_address (ordered_by,fullname,company_name,primary_mobile_number,alias) VALUES ('$aliass','$svname','$copmans','$svmob','$alias_a')");

			if($resulta){$error = "2";rregistering($aliass);}

			else $error = "0";

		}

	}else $error = "0";







$uname=$emailll;

$password=$password;

if(count($_REQUEST['packselected'])<='0'){$ecode=0;$emsg="Select Atleast one Plan";}

else{

	$address=$add1." ".$add2;

	$order_amount='0';	

	$sql = "SELECT alias FROM lj_logins WHERE username='$uname'";

	$result = mysqli_query($mr_con,$sql);

	if($result){

		$count = mysqli_num_rows($result);

		if($count>'0'){

			$rowTT = mysqli_fetch_array($result);

			$usalias=$rowTT['alias'];

			$oderd_id='#'.codeCheck(generateRandomcode(10),'lj_orders','order_id');

			$alias=aliasCheck(generateRandomString(15),'lj_orders','alias');



			$q1="INSERT INTO lj_orders_saved (order_id, order_by, order_date, order_amount, payment_mode, order_status, alias) VALUES ('$oderd_id','$usalias','$current_date_time','0','0','0','$alias')";

					
			$rs1=mysqli_query($mr_con,$q1);

			if($rs1){

				if($rs1){

					for($gg=0;$gg<count($_REQUEST['packid']);$gg++){

						
						$plan_id = $_REQUEST['packid'][$gg];						
						$s_plan=$_REQUEST['packselected'][$gg];
						$s_plan_sub=$_REQUEST['packselectedsub'][$gg];

						$cpu=$_REQUEST['packcpu'][$gg];
						$ram=$_REQUEST['packram'][$gg];
						$data=$_REQUEST['packdata'][$gg];
						$space=$_REQUEST['packspace'][$gg];

						$months=$_REQUEST['packmonths'][$gg];

						$price=$_REQUEST['packprice'][$gg];

						$iops=$_REQUEST['packips'][$gg];
						$os=$_REQUEST['packos'][$gg];
						$db=$_REQUEST['packdb'][$gg];
						$backup=$_REQUEST['packbackup'][$gg];
						//$cpu=$_REQUEST['packcpu'][$gg];

						$drive=$_REQUEST['packdrive'][$gg];
						$server=$_REQUEST['packserver'][$gg];						
						$power=$_REQUEST['packpower'][$gg];
						$power=$rackspace=0;
						
						/*$total = $_REQUEST['planprice'][$gg];
						$planamount[] = $_REQUEST['plantotal'][$gg];

						$drive=$_REQUEST['packdrive'][$gg];*/
						$months=$_REQUEST['packmonths'][$gg];
						$price=$_REQUEST['packprice'][$gg];
						$total = $_REQUEST['planprice'][$gg];
						$planamount[] = $_REQUEST['plantotal'][$gg];

						 $discount_plan =0;
     
     $discount[] = $discount_plan;

						$packipn=$_REQUEST['packipn'][$gg];
						$packcpu1=$_REQUEST['packcpu1'][$gg];
						$packcpu2=$_REQUEST['packcpu2'][$gg];
						$packcpu3=$_REQUEST['packcpu3'][$gg];
						$packcpu4=$_REQUEST['packcpu4'][$gg];

						$packtenureprice=$_REQUEST['packtenureprice'][$gg];
						$packdrivecode=$_REQUEST['packdrivecode'][$gg];
						$packip_total=$_REQUEST['packip_total'][$gg];
						$packbackup_total=$_REQUEST['packbackup_total'][$gg];
						$packdatabase_total=$_REQUEST['packdatabase_total'][$gg];
						$packos_total=$_REQUEST['packos_total'][$gg];
						$packqtt=$_REQUEST['packqtt'][$gg];
						

						$orderitems_alias=aliasCheck(generateRandomString(15),'lj_order_address','alias');

						$jagan="INSERT INTO lj_saved_plans1 (plan_id, order_id, ram, cpu_cores, data_transfer, disk_space, backup, iops, drive, server1, power, selectedOs, db, months, price, plan_amount, alias,packipn,packcpu1,packcpu2,packcpu3,packcpu4,packtenureprice,packdrivecode,packip_total,packbackup_total,packdatabase_total,packos_total,packqtt)

						VALUES ('$plan_id','$alias', '$ram', '$cpu','$data', '$space', '$backup', '$iops', '$drive', '$server', '$power', '$os', '$db', '$months', '$price', '$total', '$orderitems_alias','$packipn','$packcpu1','$packcpu2','$packcpu3','$packcpu4','$packtenureprice','$packdrivecode','$packip_total','$packbackup_total','$packdatabase_total','$packos_total','$packqtt')";
						$reft=mysqli_query($mr_con,$jagan);

						if($reft){

							$ecode=2;$emsg="Order Successfully Placed";

						}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later";}

					}

					if(count($planamount)>'0'){

						$finalAmt=array_sum($planamount);
						$finaldiscount=array_sum($discount);	

						mysqli_query($mr_con,"UPDATE lj_orders_saved SET order_amount='$finalAmt', discount='$finaldiscount' WHERE alias='$alias'");

						orderssss_save($alias,ucfirst($svname),ucfirst($copmans),$svmob);

					}

				}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later";}

			}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later";}

		}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later";}

	}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later";}

}



function curlx($url){

	$chu = curl_init();

	curl_setopt($chu, CURLOPT_URL, $url);

	curl_setopt($chu, CURLOPT_FRESH_CONNECT, true);

	curl_setopt($chu, CURLOPT_TIMEOUT, 1);

	curl_exec($chu);

	curl_close($chu);

}





