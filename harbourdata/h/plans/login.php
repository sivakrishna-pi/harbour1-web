<?php
session_start();
include('mysql.php');
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
function getCustomerId(){global $mr_con;
	$query=mysqli_query($mr_con,"SELECT id FROM lj_logins ORDER BY id DESC LIMIT 1");
	if(mysqli_num_rows($query)>'0'){
		$row = mysqli_fetch_array($query);
		$new_id=$row['id']+1;
		if($new_id > 99999){$y = $new_id;}
		elseif($new_id > 9999){$y = "0".$new_id;}
		elseif($new_id > 999){$y = "00".$new_id;}
		elseif($new_id > 99){$y = "000".$new_id;}
		elseif($new_id > 9){$y = "0000".$new_id;}
		else{$y = "00000".$new_id;}
	}else{$y="000001";}
	return $y;
}
if(isset($_REQUEST['altype']) && $_REQUEST['altype']=='logg'){
	$uname=mysqli_real_escape_string($mr_con,$_REQUEST['uname']);
	$password=mysqli_real_escape_string($mr_con,$_REQUEST['password']);
	$sql = "SELECT alias,type FROM lj_logins WHERE username = '$uname' AND password = '$password'";
	$result = mysqli_query($mr_con,$sql);
	if($result){
		$count = mysqli_num_rows($result);
		if($count>'0'){
			$rowTT = mysqli_fetch_array($result);
			$usalias=$rowTT['alias'];
			$token = aliasCheck(generateRandomString(),'lj_token','token');
			global $current_date_time;
			mysqli_query($mr_con,"INSERT INTO lj_token(customer_id,token,login_date) VALUES ('$usalias','$token','$current_date_time')");
			$sql1 = "SELECT fullname,designation,company_name,industry,addresstype,address,city,state,country,pincode FROM lj_order_address WHERE ordered_by = '$usalias'  LIMIT 1";
			$result1 = mysqli_query($mr_con,$sql1);
			if($result1){
				$count1 = mysqli_num_rows($result1);
				if($count1>'0'){
					$row123 = mysqli_fetch_array($result1);
					$error['fullname']=$row123['fullname'];
					$error['designation']=$row123['designation'];
					$error['company_name']=$row123['company_name'];
					$error['industry']=$row123['industry'];
					$error['addresstype']=$row123['addresstype'];
					$error['address']=$row123['address'];
					$error['city']=$row123['city'];
					$error['state']=$row123['state'];
					$error['country']=$row123['country'];
					$error['pincode']=$row123['pincode'];
					$error['fullname']=$row123['fullname'];
					$error['userId']=$usalias;
					$error['auth_id']=$usalias;
					$error['auth_token']=$token;
					$error['auth_type']=$rowTT['type'];
					echo json_encode($error);
				}else{$error = "2";echo $error;}
			}else{$error = "2";echo $error;}
		}else{$error = "1";echo $error;}
	}else {$error = "0";echo $error;}
	
}
elseif(isset($_REQUEST['altype']) && $_REQUEST['altype']=='reg'){
	$emr=mysqli_real_escape_string($mr_con,$_REQUEST['emr']);
	$emoble=mysqli_real_escape_string($mr_con,$_REQUEST['emoble']);
	$enamee_a=mysqli_real_escape_string($mr_con,$_REQUEST['enamee_a']);
	$ecomo_a=mysqli_real_escape_string($mr_con,$_REQUEST['ecomo_a']);
	$sql = "SELECT id FROM lj_logins WHERE username = '$emr'";
	$result = mysqli_query($mr_con,$sql);
	if($result){
		$count = mysqli_num_rows($result);
		if($count>'0')$error = "1";
		else{
			$alias=getCustomerId();
			$alias_a=aliasCheck(generateRandomString(15),'lj_order_address','alias');
			//$password=aliasCheck(generateRandomString(8),'lj_logins','password');
			//$password=substr(str_replace(" ","",$enamee_a), -4).substr($emoble, -4);
			$length = 8;
			 $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$password=substr( str_shuffle( $chars ), 0, $length );
			$sqla="INSERT INTO lj_logins (username,alias,password,mobile_no,name,company) VALUES ('$emr','$alias','$password','$emoble','$enamee_a','$ecomo_a')";
			$resulta = mysqli_query($mr_con,$sqla);
			mysqli_query($mr_con,"INSERT INTO lj_order_address (ordered_by,fullname,company_name,primary_mobile_number,alias) VALUES ('$alias','$enamee_a','$ecomo_a','$emoble','$alias_a')");
			if($resulta){$error = "2";rregistering($alias);}
			else $error = "0";
		}
	}else $error = "0";
	echo $error;
}
elseif(isset($_REQUEST['altype']) && $_REQUEST['altype']=='passreq'){
	$repem=mysqli_real_escape_string($mr_con,$_REQUEST['repem']);
	$sql = "SELECT alias FROM lj_logins WHERE username = '$repem'";
	$result = mysqli_query($mr_con,$sql);
	if($result){
		$count = mysqli_num_rows($result);
		if($count>'0'){
			$rowTT = mysqli_fetch_array($result);
			$usalias=$rowTT['alias'];
			mysqli_query($mr_con,"DELETE FROM password_request WHERE user_alias = '$usalias'");
			$alias=aliasCheck(generateRandomString(15),'lj_logins','alias');
			$codeintd=codeCheck(generateRandomcode(5),'password_request','codees');
			$sqla="INSERT INTO password_request (user_alias,codees) VALUES ('$usalias','$codeintd')";
			$resulta = mysqli_query($mr_con,$sqla);
			if($resulta){$error = "2";forgotpsd($usalias);}
			else $error = "0";
		}else{
			$error = "1";
		}
	}else $error = "0";
	echo $error;
}
elseif(isset($_REQUEST['altype']) && $_REQUEST['altype']=='changepass'){
	$fremail=mysqli_real_escape_string($mr_con,$_REQUEST['fremail']);
	$frcode=mysqli_real_escape_string($mr_con,$_REQUEST['frcode']);
	$frpass=mysqli_real_escape_string($mr_con,$_REQUEST['frpass']);
	$sql = "SELECT alias FROM lj_logins WHERE username = '$fremail'";
	$result = mysqli_query($mr_con,$sql);
	if($result){
		$count = mysqli_num_rows($result);
		if($count>'0'){
			$rowTT = mysqli_fetch_array($result);
			$usalias=$rowTT['alias'];
			$sqlss = "SELECT id FROM password_request WHERE user_alias = '$usalias' AND codees='$frcode'";
			$resultww= mysqli_query($mr_con,$sqlss);
			$countww = mysqli_num_rows($resultww);
			if($countww>'0'){
				$sqlaeee="UPDATE lj_logins SET password='$frpass' WHERE alias='$usalias'";
				$resultssss = mysqli_query($mr_con,$sqlaeee);
				if($resultssss){
					mysqli_query($mr_con,"DELETE FROM password_request WHERE user_alias = '$usalias'");
					$error = "2";
				}
				else $error = "0";
			}else{
				$error = "1";
			}
		}else{
			$error = "1";
		}
	}else $error = "0";
	echo $error;
}


function generateRandomcode($length = 5) {
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++){$randomString .= $characters[rand(0, $charactersLength - 1)];}
	return strtoupper($randomString);
}
function codeCheck($fv1,$fv2,$fv3){ global $mr_con;
	$rec=$mr_con->query("SELECT $fv3 FROM $fv2 WHERE $fv3='$fv1'");
	if($rec->num_rows==0)return $fv1; else return codeCheck(generateRandomcode(5),$fv2,$fv3);
}

?>