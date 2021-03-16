<?php require_once('plans/mysql.php');
error_reporting(0);
@ini_set('display_errors', 0);

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
function alias_alias($tb,$col,$alias,$retrive){ global $mr_con;

	$sql = mysqli_query($mr_con,"SELECT $retrive FROM $tb WHERE $col='$alias'");

	if(mysqli_num_rows($sql)){

		$row = mysqli_fetch_array($sql);

		return $row[$retrive];

	}else return "";

}
$plansSelected=array();$planPrice=array();$planMinData=array();$planIncrementData=array();$planIOPSPrice=array();$selectedPeriod=array();$selectedincrement=array();$selectedIOPS=array();
$selectedServers=array();$selectedOs=array();$selectedPlat=array();
//session_start();
if(isset($_REQUEST['a']) && mysqli_real_escape_string($mr_con,$_REQUEST['a'])!=''){
	$orderalias=mysqli_real_escape_string($mr_con,$_REQUEST['a']);
	$m_plan=array();$m_sub_plan=array();$m_plan_id=array();$seled=array();$selee=array();$selef=array();$seleg=array();$seleh=array();$selei=array();
	$sql = "SELECT t1.order_id, t1.alias, t1.order_date, t1.order_by, t1.order_amount, t1.payment_mode, t1.order_status FROM lj_orders_saved t1 WHERE t1.alias='$orderalias'";
	$result = mysqli_query($mr_con,$sql);
	if($result){
		$count = mysqli_num_rows($result);
		if($count>'0'){
			$row=mysqli_fetch_array($result);
			$sqlw = "SELECT  t3.plan_id, t3.ram, t3.db,t3.cpu_cores, t3.price,t3.backup, t3.iops, t3.data_transfer, t3.disk_space, t3.selectedOs,t3.drive, t3.months, t3.plan_amount FROM lj_saved_plans1 t3 WHERE t3.order_id='".$row['alias']."'";
			$resultw = mysqli_query($mr_con,$sqlw);
			while($roww=mysqli_fetch_array($resultw)){
				$sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

				$result123 = mysqli_query($mr_con,$sqlserver);
				$row321=mysqli_fetch_array($result123);

				$m_plan[]=$row321['plan'];
				$m_sub_plan[]=$row321['subplan'];
				$m_plan_id[]=$roww['plan_id'];
				$m_ram[]=$roww['ram'];
				$m_cpu[]=$roww['cpu_cores'];

				$m_price[]=$roww['price'];
				$m_iops[]=$roww['iops'];

				$m_data[]=$roww['data_transfer'];
				$m_disk[]=$roww['disk_space'];
				$m_backup[]=$roww['backup'];
				$m_os[]=$roww['selectedOs'];
				$m_db[]=$roww['db'];
				$m_drive[]=$roww['drive'];
				$m_months[]=$roww['months'];
				$m_plan_amount[]=$row['plan_amount'];


			}
		}
	}
	$_SESSION['packid']=$m_plan_id;
	$_SESSION['packselected']=$m_plan;
	$_SESSION['packselectedsub']=$m_sub_plan;
	$_SESSION['packcpu']=$m_cpu;
	$_SESSION['packram']=$m_ram;
	$_SESSION['packdata']=$m_data;
	$_SESSION['packspace']=$m_disk;
	$_SESSION['packos']=$m_os;
	$_SESSION['packips']=$m_iops;
	$_SESSION['packdb']=$m_db;
	$_SESSION['packbackup']=$m_backup;
	$_SESSION['packmonths']=$m_months;
	$_SESSION['packprice']=$m_price;
	$_SESSION['packdrive']=$m_drive;
	$_SESSION['packminmonths']='1';
	$_SESSION['plantotal']=$m_plan_amount;

}else{

	
//echo $_REQUEST['packid'];
	$flag = 0;
	if(isset($_REQUEST['packid'])){
		foreach ($_SESSION['cart'] as $sess_product_id => $value) {

			
			for($a=0;$a<count($_REQUEST['packid']);$a++){
    # code...
				//echo $_REQUEST['packproductid'][$a];
				if ($sess_product_id==$_REQUEST['packproductid'][$a]) {
      # code...
					$product_id=$_REQUEST['packproductid'][$a];

					//$_SESSION['cart'][$product_id]['tenure'] = $_REQUEST['packmonths'][$a];
					$_SESSION['cart'][$product_id]['selected']=$_REQUEST['packselected'][$a];
					$_SESSION['cart'][$product_id]['selectedsub']=$_REQUEST['packselectedsub'][$a];

					$_SESSION['cart'][$product_id]['tenure_price'] =$_REQUEST['packtenureprice'][$a];
					$_SESSION['cart'][$product_id]['ip_total'] =$_REQUEST['packip_total'][$a];

					//$_SESSION['cart'][$product_id]['pricing'] = $_REQUEST['packmonths'][$a];

					$_SESSION['cart'][$product_id]['months'] = $_REQUEST['packmonths'][$a];
					$_SESSION['cart'][$product_id]['qtt'] = $_REQUEST['packqtt'][$a];

					if(isset($_REQUEST['otc123']))$_SESSION['cart'][$product_id]['otc123'] = $_REQUEST['otc123'][$a];else$_SESSION['cart'][$product_id]['otc123'] ='0';

					$_SESSION['cart'][$product_id]['planprice'] = $_REQUEST['planprice'][$a];

					$_SESSION['cart'][$product_id]['plantotal'] = $_REQUEST['plantotal'][$a];

   //$pricing = mysqli_real_escape_string($mr_con,$_REQUEST['total']);

				//$planprice=$pricing;



				//$flag = 1;
				}
			}
		}
	}

	/*echo '<script type="text/javascript">
            var sessName = '.json_encode($_SESSION["cart"]).';
            console.log(sessName);
          </script>';*/
		foreach ($_SESSION['cart'] as $sess_product_id => $value) {

			
			//for($a=0;$a<count($_REQUEST['packid']);$a++){
    # code...
				//echo $_REQUEST['packproductid'][$a];
				//if ($sess_product_id==$_REQUEST['packproductid'][$a]) {
					/*echo '<script type="text/javascript">
            var sessName = '.json_encode($_SESSION["cart"]).';
            console.log(sessName);
          </script>';*/
          $product_id=$sess_product_id;
         		

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
         		 		$cs_planprice = $_SESSION['cart'][$product_id]['planprice'];
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
            						window.location = "pricing_cloud_servers.php";
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
            						window.location = "pricing_cloud_servers.php";
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
		                    else if ($c == '4' && $r == '8' && $os == 'Windows' && $d == '2') {
		                        //alert("WC4R8S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R8S2TB'));
		                    	$e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'WC4R8S2TB', 'price');

		                    } 
		                    else if ($c == '4' && $r == '16' && $os == 'Linux' && $d == '2') {
		                        //alert("WC4R8S2TB");
		                       // var price = parseInt(ajaxprice('lj_enterprise_price', 'enterprise', 'price', 'WC4R8S2TB'));
		                    	$e3_plan = alias_alias('lj_enterprise_price', 'enterprise', 'LC4R16S2TB', 'price');

		                    }
		                    else if ($c == '4' && $r == '16' && $os == 'Windows' && $d == '2') {
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
            						window.location = "pricing_cloud_servers.php";
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
		                    else if ($c == '6' && $r == '16' && $os == 'Windows' && $d == '2') {
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
            						window.location = "pricing_cloud_servers.php";
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
            						window.location = "pricing_cloud_servers.php";
          						</script>';

         		 	 	}




					}  else if($_SESSION['cart'][$product_id]['selectedsub'] == "Server"){

					} 
          		

		
	}
	/*print "<pre>";
    echo "if empty";
    print_r($_SESSION['cart']);
    print "</pre>";
    echo "\n";*/

/*$packid = $_SESSION['packid'];
$plansSelected=$_SESSION['packselected'];
$packselectedsub=$_SESSION['packselectedsub'];

$packip_total=$_SESSION['packip_total'];
$packbackup_total=$_SESSION['packbackup_total'];
$packdatabase_total=$_SESSION['packdatabase_total'];
$packos_total=$_SESSION['packos_total'];
$packtenureprice=$_SESSION['packtenureprice'];
$packdrivecode=$_SESSION['packdrivecode'];

$packcpu=$_SESSION['packcpu'];
$packram=$_SESSION['packram'];else$packram='0';
$packdata=$_SESSION['packdata'];else$packdata='0';
$packspace=$_SESSION['packspace'];else$packspace='0';
$packos=$_SESSION['packos'];else$packos='0';
$packips=$_SESSION['packips'];else$packips='0';
$packdb=$_SESSION['packdb'];else$packdb='0';
$packbackup=$_SESSION['packbackup'];else$packbackup='0';
$packmonths=$_SESSION['packmonths'];else$packmonths='0';
$packprice =$_SESSION['packprice'];else$packprice='0';
$packdrive = $_SESSION['packdrive'];else$packdrive='0';
$packserver=$_SESSION['packserver'];else$packserver='0';
$packpower=$_SESSION['packpower'];else$packpower='0';
$planprice2 = $_SESSION['planprice2'];else$planprice2='0';
$ip = $_SESSION['ip'];else$ip='0';
$cpu_total=$_SESSION['cpu_total'];else$cpu_total='0';
$ram_total=$_SESSION['ram_total'];else$ram_total='0';
$space_total=$_SESSION['space_total'];else$space_total='0';
$data_total=$_SESSION['data_total'];else$data_total='0';
$plantotal2=$_SESSION['plantotal2'];else$plantotal2='0';

$qtt=$_SESSION['packqtt'];else$qtt='1';
$otc_item=$_SESSION['otc123'];*/


//$total

	/*if(count($plansSelected)>'0'){
		for($a=0;$a<count($plansSelected);$a++){
			if(($packselectedsub[$a]=='Cloud Server')||($packselectedsub[$a]=='Virtual Dedicated Servers')){
				if($packmonths[$a]=='3')$planPrice[]=$packprice[$a]*0.85;
				else if($packmonths[$a]=='6')$planPrice[]=$packprice[$a]*0.70;
				else if($packmonths[$a]=='12')$planPrice[]=$packprice[$a]*0.65;
		//else if($packmonths[$a]=='24')$planPrice[]=$packprice[$a]-($packprice[$a]*0.05);

				else if($packmonths[$a]=='24')$planPrice[]=$packprice[$a]*0.60;
				else if($packmonths[$a]=='36')$planPrice[]=$packprice[$a]*0.50;
				else if($packmonths[$a]=='48')$planPrice[]=$packprice[$a]*0.50;
				else $planPrice[]=$packprice[$a];
			}else{
				$planPrice[]=$packprice[$a];
			}
		}
	}else $ecode[]=0;

		if(count($plansSelected)>'0'){
			for($a=0;$a<count($plansSelected);$a++){
				$plantotal[] = $planPrice[$a]*$packmonths[$a];
			}}else $ecode[]=0;

			if(count($plansSelected)>'0'){
				for($a=0;$a<count($plansSelected);$a++){
					$q1="SELECT `plan`, `subplan`, `min_months`, `image`, `description`,`alias` FROM lj_server_plans1 WHERE alias='$packid[$a]' AND flag='0'";
					$eq1=mysqli_query($mr_con,$q1);
					if(mysqli_num_rows($eq1)>'0'){
						$r1=mysqli_fetch_array($eq1);
			//$plan[]=$r1['plan'];
			//$subplan[]=$r1['subplan'];
						$min_months[] = $r1['min_months'];
						$image[]=$r1['image'];
						$description[]=$r1['description'];
						$alias[]=$r1['alias'];

					}else $ecode[]=0;
				}
			}else{$ecode[]=0;}*/
		}		