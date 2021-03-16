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
   $discount = array();

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
                  $discount[] = 0;

						$product_id=$_REQUEST['packproductid'][$gg];
			
			//for($a=0;$a<count($_REQUEST['packid']);$a++){
    # code...
				//echo $_REQUEST['packproductid'][$a];
				//if ($sess_product_id==$_REQUEST['packproductid'][$a]) {
					/*echo '<script type="text/javascript">
            var sessName = '.json_encode($_SESSION["cart"]).';
            console.log(sessName);
          </script>';*/
          				//$product_id=$sess_product_id;

         		 		$cs_cpu = $_SESSION['cart'][$product_id]['cpu'];
         		 		//echo $cs_cpu;
         		 		//echo $product_id;
         		 		$cs_cpu_e = $_SESSION['cart'][$product_id]['cpu_e'];
         		 		$cs_ram = $_SESSION['cart'][$product_id]['ram'];
         		 		$cs_ram_e = $_SESSION['cart'][$product_id]['ram_e'];
         		 		$cs_data = $_SESSION['cart'][$product_id]['data'];
         		 		$cs_space = $_SESSION['cart'][$product_id]['space'];
         		 		$cs_ip_num = $_SESSION['cart'][$product_id]['ip_num'];
         		 		$cs_ip = $_SESSION['cart'][$product_id]['ip'];
         		 		$cs_database = $_SESSION['cart'][$product_id]['database'];
         		 		$cs_os = $_SESSION['cart'][$product_id]['os'];
         		 		$cs_backup = $_SESSION['cart'][$product_id]['backup'];
         		 		$cs_drive_code = $_SESSION['cart'][$product_id]['drive_code'];


         		 		$cs_cpu_t = $_SESSION['cart'][$product_id]['cpu_total'];
         		 		$cs_ram_t = $_SESSION['cart'][$product_id]['ram_total'];
         		 		$cs_data_t = $_SESSION['cart'][$product_id]['data_total'];
         		 		$cs_space_t = $_SESSION['cart'][$product_id]['space_total'];
         		 		$cs_ip_num_t = $_SESSION['cart'][$product_id]['ip_total'];
         		 		$cs_database_t = $_SESSION['cart'][$product_id]['database_total'];
         		 		$cs_os_t = $_SESSION['cart'][$product_id]['os_total'];
         		 		$cs_backup_t = $_SESSION['cart'][$product_id]['backup_total'];

         		 		$cs_months = $_SESSION['cart'][$product_id]['months'];
         		 		$cs_qtt = $_SESSION['cart'][$product_id]['qtt'];
         		 		$cs_tenure_price = $_SESSION['cart'][$product_id]['tenure_price'];

         		 		$cs_planprice = $_REQUEST['plantotal'][$gg];

         		 		$cs_plantotal = $_SESSION['cart'][$product_id]['plantotal'];
         		 		//echo  "asodjoasdjo";
         		 		//echo $_SESSION['cart'][$product_id]['selectedsub'];
         		 	 if($_SESSION['cart'][$product_id]['selectedsub'] == "Cloud Server"){

         		 	 	//echo  "asodjoasdjo";
         		 	 	$vc_cpu = alias_alias('lj_cpu_price', 'cpu', $cs_cpu, 'ch');

         		 	 	$vc_ram = alias_alias('lj_ram_price', 'ram', $cs_ram, 'ch');
         		 	 	$vc_space = alias_alias('lj_diskspace_price', 'diskspace', $cs_space, 'ch');
         		 	 	$vc_data = alias_alias('lj_data_price', 'data', $cs_data, 'ch');
         		 	 	$vc_ip = alias_alias('lj_ip_price', 'ip', $cs_ip_num, 'ch');
         		 	 	$vc_backup = alias_alias('lj_backup_price', 'backup', $cs_backup, 'ch');
         		 	 	//alias_alias('lj_addon_price', 'addon', $addon, 'price');
         		 	 	
         		 	 	//os and db
         		 	 	$vc_os = alias_alias('lj_addon_price', 'addon', $cs_os, 'price');
         		 	 	$vc_db = alias_alias('lj_addon_price', 'addon', $cs_database, 'price');

         		 	 	if($vc_os=="" || $vc_os==null)$vc_os = 0;
         		 	 	if($vc_db=="" || $vc_db==null)$vc_db = 0;
         		 	 	if($vc_ip=="" || $vc_ip==null)$vc_ip = 0;
         		 	 	if($vc_backup=="" || $vc_backup==null)$vc_backup = 0;

         		 	 	/*if($cs_cpu_t == $vc_cpu && $cs_ram_t == $vc_ram && $cs_data_t == $vc_data && $cs_space_t == $vc_space && $cs_ip_num_t == $vc_ip && $cs_database_t == $vc_db && $cs_os_t == $vc_os && $cs_backup_t == $vc_backup) {

							error_log("All is well! Cloud server", 0);  
							echo "All is well! Cloud server";		 	 		

         		 	 	} else{
         		 	 		//echo "All is well";
         		 	 		
         		 	 		error_log("Cloud server values are not matching anybody!", 1);
         		 	 		//echo "Cloud server values are not matching anybody";
         		 	 	}*/

         		 	 	$core_t =  $vc_cpu+$vc_ram+$vc_space+$vc_data;
         		 	 	$addon_t =  $vc_os+$vc_db+$vc_ip+$vc_backup;

         		 	 	
         		 	 	if($cs_months < 3 && $cs_months > 0){

         		 	 		$total_t = (int)(($core_t*$cs_months)+($addon_t*$cs_months))*$cs_qtt;

         		 	 	} else if($cs_months == 3){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.85)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 6){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.70)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 12){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.65)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 24){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.60)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 36){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.50)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 48){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.50)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}

         		 	 	//echo $total_t." - ".$cs_planprice." , ";
         		 	 	
         		 	 	//abs(-5)
         		 	 	if(abs($total_t - $cs_planprice)<10){
         		 	 		error_log("All is well! Cloud Server", 0);
         		 	 		//echo "AAll is well! Virtual dedicated";	
         		 	 	}else{
         		 	 		unset($_SESSION);
							session_destroy();

							echo '<script type="text/javascript">
            						alert("Something went wrong! Try again later");
            						window.location = "../pricing_cloud_servers.php";
          						</script>';

         		 	 	}
         		 	 	//echo $vc_cpu."-".$cs_cpu_t." ,".$vc_ram."-".$cs_ram_t." ,".$vc_space."-".$cs_space_t." ,".$vc_data."-".$cs_data_t." ,".$vc_ip."-".$cs_ip_num_t." ,".$vc_backup."-".$cs_backup_t." ,".$vc_os."-".$cs_os_t." ,".$vc_db."-".$cs_database_t." ,".$vc_cpu." ,".$vc_cpu;


					} else if($_SESSION['cart'][$product_id]['selectedsub'] == "Virtual Dedicated Servers"){


         		 	 	//echo  "asodjoasdjo";
         		 	 	$vc_cpu = alias_alias('lj_cpu_price', 'cpu', $cs_cpu, 'vd');

         		 	 	$vc_ram = alias_alias('lj_ram_price', 'ram', $cs_ram, 'vd');
         		 	 	$vc_space = alias_alias('lj_diskspace_price', 'diskspace', $cs_space, 'vd');
         		 	 	$vc_data = alias_alias('lj_data_price', 'data', $cs_data, 'vd');
         		 	 	$vc_ip = alias_alias('lj_ip_price', 'ip', $cs_ip_num, 'vd');
         		 	 	$vc_backup = alias_alias('lj_backup_price', 'backup', $cs_backup, 'vd');
         		 	 	//alias_alias('lj_addon_price', 'addon', $addon, 'price');
         		 	 	
         		 	 	//os and db
         		 	 	$vc_os = alias_alias('lj_addon_price', 'addon', $cs_os, 'price');
         		 	 	$vc_db = alias_alias('lj_addon_price', 'addon', $cs_database, 'price');

         		 	 	if($vc_os=="" || $vc_os==null)$vc_os = 0;
         		 	 	if($vc_db=="" || $vc_db==null)$vc_db = 0;
         		 	 	if($vc_ip=="" || $vc_ip==null)$vc_ip = 0;
         		 	 	if($vc_backup=="" || $vc_backup==null)$vc_backup = 0;

         		 	 	/*if($cs_cpu_t == $vc_cpu && $cs_ram_t == $vc_ram && $cs_data_t == $vc_data && $cs_space_t == $vc_space && $cs_ip_num_t == $vc_ip && $cs_database_t == $vc_db && $cs_os_t == $vc_os && $cs_backup_t == $vc_backup){
         		 	 		//echo "something is wrong";
         		 	 		error_log("All is well! Virtual dedicated", 0);
         		 	 		//echo "AAll is well! Virtual dedicated";	
         		 	 	} else {
         		 	 		//echo "All is well";
         		 	 		
         		 	 		error_log("Virtual dedicated values are not matching anybody!", 1);
         		 	 		//echo "Virtual dedicated values are not matching anybody!";	

         		 	 	}*/
         		 	 	$core_t =  $vc_cpu+$vc_ram+$vc_space+$vc_data;
         		 	 	$addon_t =  $vc_os+$vc_db+$vc_ip+$vc_backup;
         		 	 	if($cs_months < 3 && $cs_months > 0){

         		 	 		$total_t = (int)(($core_t*$cs_months)+($addon_t*$cs_months));

         		 	 	} else if($cs_months == 3){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.85)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 6){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.70)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 12){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.65)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 24){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.60)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 36){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.50)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}else if($cs_months == 48){
         		 	 		$total_t = (int)(($core_t*$cs_months*0.50)+($addon_t*$cs_months))*$cs_qtt;
         		 	 	}

         		 	 	//echo $total_t." - ".$cs_planprice." , ";
         		 	 	//abs(-5)
         		 	 	

         		 	 	if(abs($total_t - $cs_planprice)<10){
         		 	 		error_log("All is well! Virtual dedicated", 0);
         		 	 		//echo "AAll is well! Virtual dedicated";	
         		 	 	}else{
         		 	 		unset($_SESSION);
							session_destroy();

							echo '<script type="text/javascript">
            						alert("Something went wrong! Try again later");
            						window.location = "../pricing_cloud_servers.php";
          						</script>';

         		 	 	}


         		 	 	//echo $vc_cpu."-".$cs_cpu_t." ,".$vc_ram."-".$cs_ram_t." ,".$vc_space."-".$cs_space_t." ,".$vc_data."-".$cs_data_t." ,".$vc_ip."-".$cs_ip_num_t." ,".$vc_backup."-".$cs_backup_t." ,".$vc_os."-".$cs_os_t." ,".$vc_db."-".$cs_database_t." ,".$vc_cpu." ,".$vc_cpu;


					} else if($_SESSION['cart'][$product_id]['selectedsub'] == "Enterprise Dedicated Servers - E3"){

							$c = $cs_cpu_e;		                   
		                    $r = $cs_ram_e;
		                    $d = '2';
		                    $os = $cs_os;


		                    if ($c == '4' && $r == '8' && $os == 'Linux' && $d == '2') {
		                        //alert("LC4R8S2TB");
		                        //var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'LC4R8S2TB'));
		                        $e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC4R8S2TB', 'price');

		                    }
		                    else if ($c == '4' && $r == '8' && os == 'Windows' && $d == '2') {
		                        //alert("WC4R8S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R8S2TB'));
		                    	$e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC4R8S2TB', 'price');

		                    } 
		                    else if ($c == '4' && $r == '16' && os == 'Linux' && $d == '2') {
		                        //alert("WC4R8S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R8S2TB'));
		                    	$e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC4R16S2TB', 'price');

		                    }
		                    else if ($c == '4' && $r == '16' && os == 'Windows' && $d == '2') {
		                        //alert("WC4R8S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R8S2TB'));
		                    	$e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC4R16S2TB', 'price');

		                    }
		                    else if ($c == '2 X 4' && $r == '16' && $os == 'Linux' && $d == '2') {
		                        //alert("LC4R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'LC4R16S2TB'));
		                    	$e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC8R16S2TB', 'price');

		                    }
		                    else if ($c == '2 X 4' && $r == '16' && $os == 'Windows' && $d == '2') {
		                        //alert("WC4R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R16S2TB'));
		                    	$e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC8R16S2TB', 'price');

		                    }

		                   
		                    if($cs_months < 3 && $cs_months > 0){

         		 	 		$e3_plan = $e3_plan;

         		 	 	} else if($cs_months == 3){
         		 	 		$e3_plan = alias_alias('lj_enterprise_price', 'price', $e3_plan, '3_tenure');
         		 	 	}else if($cs_months == 6){
         		 	 		$e3_plan = alias_alias('lj_enterprise_price', 'price', $e3_plan, '6_tenure');
         		 	 	}else if($cs_months == 12){
         		 	 		$e3_plan = alias_alias('lj_enterprise_price', 'price', $e3_plan, '12_tenure');
         		 	 	}else if($cs_months == 24){
         		 	 		$e3_plan = alias_alias('lj_enterprise_price', 'price', $e3_plan, '24_tenure');
         		 	 	}else if($cs_months == 36){
         		 	 		$e3_plan = alias_alias('lj_enterprise_price', 'price', $e3_plan, '36_tenure');
         		 	 	}else if($cs_months == 48){
         		 	 		$e3_plan = alias_alias('lj_enterprise_price', 'price', $e3_plan, '48_tenure');
         		 	 	}

		                    $vc_data = alias_alias('lj_data_price', 'data', $cs_data, 'ch');
         		 	 		$vc_ip = alias_alias('lj_ip_price', 'ip', $cs_ip_num, 'ch');

         		 	 		$e3_plan_t =  ($vc_data + ($e3_plan) + $vc_ip)*$cs_months*$cs_qtt;
		                    //echo $e3_plan_t." - ".$cs_planprice." , ";

         		 	 	if(abs($e3_plan_t - $cs_planprice)<10){
         		 	 		error_log("All is well! e3", 0);
         		 	 		//echo "AAll is well! Virtual dedicated";	
         		 	 	}else{
         		 	 		unset($_SESSION);
							session_destroy();

							echo '<script type="text/javascript">
            						alert("Something went wrong! Try again later");
            						window.location = "../pricing_cloud_servers.php";
          						</script>';

         		 	 	}
		                   

					} else if($_SESSION['cart'][$product_id]['selectedsub'] == "Enterprise Dedicated Servers - E5"){
						$c = $cs_cpu_e;		                   
		                    $r = $cs_ram_e;
		                    $d = '2';
		                    $os = $cs_os;


		                    if ($c == '6' && $r == '16' && $os == 'Linux' && $d == '2') {
		                        //alert("LC4R8S2TB");
		                        //var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'LC4R8S2TB'));
		                        $e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC6R16S4TB', 'price');

		                    }
		                    else if ($c == '6' && $r == '16' && os == 'Windows' && $d == '2') {
		                        //alert("WC4R8S2TB");
		                        //var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R8S2TB'));
		                        $e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC6R16S4TB', 'price');

		                    }
		                    else if ($c == '8' && $r == '32' && $os == 'Linux' && $d == '2') {
		                        //alert("LC4R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'LC4R16S2TB'));
		                    	$e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC8R32S4TB', 'price');

		                    }
		                    else if ($c == '8' && $r == '32' && $os == 'Windows' && $d == '2') {
		                        //alert("WC4R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R16S2TB'));
		                    	$e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC8R32S4TB', 'price');

		                    }
		                    else if ($c == '12' && $r == '32' && $os == 'Linux' && $d == '2') {
		                        //alert("LC8R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'LC8R16S2TB'));
		                    	$e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC12R32S4TB', 'price');

		                    }
		                    else if ($c == '12' && $r == '32' && $os == 'Windows' && $d == '2') {
		                        //alert("WC8R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC8R16S2TB'));
		                    	$e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC12R32S4TB', 'price');

		                    }
		                    else if ($c == '16' && $r == '64' && $os == 'Linux' && $d == '2') {
		                        //alert("WC8R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC8R16S2TB'));
		                    	$e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC16R64S4TB', 'price');

		                    }
		                    else if ($c == '16' && $r == '64' && $os == 'Windows' && $d == '2') {
		                        //alert("WC8R16S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC8R16S2TB'));
		                    	$e5_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC16R64S4TB', 'price');

		                    }

		                    if($cs_months < 3 && $cs_months > 0){

         		 	 		$e5_plan = $e5_plan;

         		 	 	} else if($cs_months == 3){
         		 	 		$e5_plan = alias_alias('lj_enterprise_price', 'price', $e5_plan, '3_tenure');
         		 	 	}else if($cs_months == 6){
         		 	 		$e5_plan = alias_alias('lj_enterprise_price', 'price', $e5_plan, '6_tenure');
         		 	 	}else if($cs_months == 12){
         		 	 		$e5_plan = alias_alias('lj_enterprise_price', 'price', $e5_plan, '12_tenure');
         		 	 	}else if($cs_months == 24){
         		 	 		$e5_plan = alias_alias('lj_enterprise_price', 'price', $e5_plan, '24_tenure');
         		 	 	}else if($cs_months == 36){
         		 	 		$e5_plan = alias_alias('lj_enterprise_price', 'price', $e5_plan, '36_tenure');
         		 	 	}else if($cs_months == 48){
         		 	 		$e5_plan = alias_alias('lj_enterprise_price', 'price', $e5_plan, '48_tenure');
         		 	 	}

         		 	 		$vc_data = alias_alias('lj_data_price', 'data', $cs_data, 'ch');
         		 	 		$vc_ip = alias_alias('lj_ip_price', 'ip', $cs_ip_num, 'ch');

         		 	 		$e5_plan_t =  ($vc_data + ($e5_plan) + $vc_ip)*$cs_months*$cs_qtt;
		                   // echo $e5_plan_t." - ".$cs_planprice." , ";

         		 	 	if(abs($e5_plan_t - $cs_planprice)<10){
         		 	 		error_log("All is well! e5", 0);
         		 	 		//echo "AAll is well! Virtual dedicated";	
         		 	 	}else{
         		 	 		unset($_SESSION);
							session_destroy();

							echo '<script type="text/javascript">
            						alert("Something went wrong! Try again later");
            						window.location = "../pricing_cloud_servers.php";
          						</script>';

         		 	 	}

					} else if(($_SESSION['cart'][$product_id]['selectedsub'] == "Enterprise Cloud Storage")||($_SESSION['cart'][$product_id]['selectedsub'] == "Dedicated Disk Storage")){

						if($cs_drive_code=='cs'){

							$storage_plan = alias_alias('lj_diskspace_price', 'diskspace', $cs_space, 'ecs');

							if($cs_months < 3 && $cs_months > 0){

         		 	 		$storage_plan = $storage_plan;

         		 	 		} else if($cs_months == 3){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ecs', $storage_plan, 'ecs_3_tenure');
         		 	 		} 
         		 	 		else if($cs_months == 6){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ecs', $storage_plan, 'ecs_6_tenure');
         		 	 		}
         		 	 		else if($cs_months == 12){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ecs', $storage_plan, 'ecs_12_tenure');
         		 	 		}
         		 	 		else if($cs_months == 24){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ecs', $storage_plan, 'ecs_24_tenure');
         		 	 		}
         		 	 		else if($cs_months == 36){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ecs', $storage_plan, 'ecs_36_tenure');
         		 	 		}
         		 	 		else if($cs_months == 48){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ecs', $storage_plan, 'ecs_48_tenure');
         		 	 		}



						}
						else if($cs_drive_code=='emc'){

							$storage_plan = alias_alias('lj_diskspace_price', 'diskspace', $cs_space, 'pcs');

							if($cs_months < 3 && $cs_months > 0){

         		 	 		$storage_plan = $storage_plan;

         		 	 		} else if($cs_months == 3){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'pcs', $storage_plan, 'pcs_3_tenure');
         		 	 		} 
         		 	 		else if($cs_months == 6){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'pcs', $storage_plan, 'pcs_6_tenure');
         		 	 		}
         		 	 		else if($cs_months == 12){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'pcs', $storage_plan, 'pcs_12_tenure');
         		 	 		}
         		 	 		else if($cs_months == 24){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'pcs', $storage_plan, 'pcs_24_tenure');
         		 	 		}
         		 	 		else if($cs_months == 36){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'pcs', $storage_plan, 'pcs_36_tenure');
         		 	 		}
         		 	 		else if($cs_months == 48){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'pcs', $storage_plan, 'pcs_48_tenure');
         		 	 		}


						}
						else if($cs_drive_code=='SATA'){

							$storage_plan = alias_alias('lj_diskspace_price', 'diskspace', $cs_space, 'sata');

							if($cs_months < 3 && $cs_months > 0){

         		 	 		$storage_plan = $storage_plan;

         		 	 		} else if($cs_months == 3){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sata', $storage_plan, 'sata_3_tenure');
         		 	 		} 
         		 	 		else if($cs_months == 6){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sata', $storage_plan, 'sata_6_tenure');
         		 	 		}
         		 	 		else if($cs_months == 12){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sata', $storage_plan, 'sata_12_tenure');
         		 	 		}
         		 	 		else if($cs_months == 24){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sata', $storage_plan, 'sata_24_tenure');
         		 	 		}
         		 	 		else if($cs_months == 36){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sata', $storage_plan, 'sata_36_tenure');
         		 	 		}
         		 	 		else if($cs_months == 48){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sata', $storage_plan, 'sata_48_tenure');
         		 	 		}

							
						}
						else if($cs_drive_code=='SAS'){

							$storage_plan = alias_alias('lj_diskspace_price', 'diskspace', $cs_space, 'sas');

							if($cs_months < 3 && $cs_months > 0){

         		 	 		$storage_plan = $storage_plan;

         		 	 		} else if($cs_months == 3){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sas', $storage_plan, 'sas_3_tenure');
         		 	 		} 
         		 	 		else if($cs_months == 6){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sas', $storage_plan, 'sas_6_tenure');
         		 	 		}
         		 	 		else if($cs_months == 12){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sas', $storage_plan, 'sas_12_tenure');
         		 	 		}
         		 	 		else if($cs_months == 24){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sas', $storage_plan, 'sas_24_tenure');
         		 	 		}
         		 	 		else if($cs_months == 36){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sas', $storage_plan, 'sas_36_tenure');
         		 	 		}
         		 	 		else if($cs_months == 48){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'sas', $storage_plan, 'sas_48_tenure');
         		 	 		}

							
						}
						else if($cs_drive_code=='SSD'){

							$storage_plan = alias_alias('lj_diskspace_price', 'diskspace', $cs_space, 'ssd');

							if($cs_months < 3 && $cs_months > 0){

         		 	 		$storage_plan = $storage_plan;

         		 	 		} else if($cs_months == 3){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ssd', $storage_plan, 'ssd_3_tenure');
         		 	 		} 
         		 	 		else if($cs_months == 6){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ssd', $storage_plan, 'ssd_6_tenure');
         		 	 		}
         		 	 		else if($cs_months == 12){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ssd', $storage_plan, 'ssd_12_tenure');
         		 	 		}
         		 	 		else if($cs_months == 24){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ssd', $storage_plan, 'ssd_24_tenure');
         		 	 		}
         		 	 		else if($cs_months == 36){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ssd', $storage_plan, 'ssd_36_tenure');
         		 	 		}
         		 	 		else if($cs_months == 48){
         		 	 			$storage_plan = alias_alias('lj_diskspace_price', 'ssd', $storage_plan, 'ssd_48_tenure');
         		 	 		}

							
						}

						$storage_t = $storage_plan*$cs_months*$cs_qtt;

						//echo $storage_t." - ".$cs_planprice." , ";

         		 	 	if(abs($storage_t - $cs_planprice)<10){
         		 	 		error_log("All is well! cloud storage", 0);
         		 	 		//echo "AAll is well! Virtual dedicated";	
         		 	 	}else{
         		 	 		unset($_SESSION);
							session_destroy();

							echo '<script type="text/javascript">
            						alert("Something went wrong! Try again later");
            						window.location = "../pricing_cloud_servers.php";
          						</script>';

         		 	 	}
         		 	 }


						$orderitems_alias=aliasCheck(generateRandomString(15),'lj_order_address','alias');

						$jagan="INSERT INTO lj_selected_plans1 (plan_id, order_id, ram, cpu_cores, data_transfer, disk_space, backup, iops, drive, server1, power, selectedOs, db, months, price,quantity, plan_amount, alias,otc)

						VALUES ('$plan_id','$alias', '$ram', '$cpu','$data', '$space', '$backup', '$iops', '$drive', '$server', '$power', '$os', '$db', '$months', '$price','$qtt', '$total', '$orderitems_alias','$otc12')";

//INSERT INTO lj_selected_plans1 (plan_id, order_id, ram, cpu_cores, data_transfer, disk_space, backup, iops, drive, server1, power, selectedOs, db, months, price, plan_amount, alias)

						//VALUES ('10','MOMDOMASM', '10', '20','50', '100', '50', '10', 'SATA', '5', '3', 'WINODWS', 'mySQL', '3', '10000', '100001', 'JSAJDJKASKDAD');


						$reft=mysqli_query($mr_con,$jagan);

						if($reft){

							$ecode=2;$emsg="Order Successfully Placed";

						}else{$ecode=0;$emsg="Something Went Wrong! Try Again Later";}

					}

					if(count($planamount)>'0'){

						//$finalAmt=(array_sum($planamount)+array_sum($otc))+(int)((array_sum($planamount)+array_sum($otc))*0.18);
                  $discount_pi = array_sum($discount);
                  $grandtotal_pi = array_sum($planamount)+array_sum($otc)-$discount_pi;
                  $finalAmt=($grandtotal_pi)+(int)($grandtotal_pi*0.18);  

                  mysqli_query($mr_con,"UPDATE lj_orders SET order_amount='$finalAmt',discount = '$discount_pi' WHERE alias='$alias'");

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