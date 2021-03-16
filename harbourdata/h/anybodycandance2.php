<?php include('plans/mysql.php');
$plansSelected=array();$planPrice=array();$planMinData=array();$planIncrementData=array();$planIOPSPrice=array();$selectedPeriod=array();$selectedincrement=array();$selectedIOPS=array();
$selectedServers=array();$selectedOs=array();$selectedPlat=array();
session_start();
if(isset($_REQUEST['a']) && mysqli_real_escape_string($mr_con,$_REQUEST['a'])!=''){
	$orderalias=mysqli_real_escape_string($mr_con,$_REQUEST['a']);
	$m_plan=array();$m_sub_plan=array();$m_plan_id=array();$seled=array();$selee=array();$selef=array();$seleg=array();$seleh=array();$selei=array();
	$sql = "SELECT t1.order_id, t1.alias, t1.order_date, t1.order_by, t1.order_amount, t1.payment_mode, t1.order_status FROM lj_orders_saved t1 WHERE t1.alias='$orderalias'";
	$result = mysqli_query($mr_con,$sql);
	if($result){
		$count = mysqli_num_rows($result);
		if($count>'0'){
			$row=mysqli_fetch_array($result);
			$sqlw = "SELECT  * FROM lj_saved_plans1 WHERE order_id='".$row['alias']."'";
			$resultw = mysqli_query($mr_con,$sqlw);
			while($roww=mysqli_fetch_array($resultw)){
				$sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

										$result123 = mysqli_query($mr_con,$sqlserver);
										$row321=mysqli_fetch_array($result123);

				if(isset($row321['plan'])&& $row321['plan']!=='' && $row321['plan']!=='0')$m_plan[]=$row321['plan'];
				if(isset($row321['subplan'])&& $row321['subplan']!=='' && $row321['subplan']!=='0')$m_sub_plan[]=$row321['subplan'];
				if(isset($roww['plan_id'])&& $roww['plan_id']!=='' && $roww['plan_id']!=='0')$m_plan_id[]=$roww['plan_id'];

				if(isset($roww['ram'])&& $roww['ram']!=='' && $roww['ram']!=='0')$m_ram[]=$roww['ram'];else$m_ram[]='0';
				if(isset($roww['cpu_cores'])&& $roww['cpu_cores']!=='' && $roww['cpu_cores']!=='0')$m_cpu[]=$roww['cpu_cores'];else$m_cpu[]='0';
				if(isset($roww['data_transfer'])&& $roww['data_transfer']!=='' && $roww['data_transfer']!=='0')$m_data[]=$roww['data_transfer'];else$m_data[]='0';
				if(isset($roww['disk_space'])&& $roww['disk_space']!=='' && $roww['disk_space']!=='0')$m_disk[]=$roww['disk_space'];else$m_disk[]='0';

				if(isset($roww['iops'])&& $roww['iops']!=='' && $roww['iops']!=='0')$m_iops[]=$roww['iops'];else$m_iops[]='0';				
				if(isset($roww['backup'])&& $roww['backup']!=='' && $roww['backup']!=='0')$m_backup[]=$roww['backup'];else$m_backup[]='0';
				if(isset($roww['selectedOs'])&& $roww['selectedOs']!=='' && $roww['selectedOs']!=='0')$m_os[]=$roww['selectedOs'];else$m_os[]='0';
				if(isset($roww['db'])&& $roww['db']!=='' && $roww['db']!=='0')$m_db[]=$roww['db'];else$m_db[]='0';

				if(isset($roww['drive'])&& $roww['drive']!=='' && $roww['drive']!=='0')$m_drive[]=$roww['drive'];else$m_drive[]='0';

				if(isset($roww['months'])&& $roww['months']!=='' && $roww['months']!=='0')$m_months[]=$roww['months'];else$m_months[]='1';
				if(isset($roww['price'])&& $roww['price']!=='' && $roww['price']!=='0')$m_price[]=$roww['price'];else$m_price[]='0';				
				if(isset($roww['plan_amount'])&& $roww['plan_amount']!=='' && $roww['plan_amount']!=='0')$m_plan_amount[]=$roww['plan_amount'];else$m_plan_amount[]='0';

				if(isset($roww['packipn'])&& $roww['packipn']!=='' && $roww['packipn']!=='0')$m_packipn[]=$roww['packipn'];else$m_packipn[]='0';
				if(isset($roww['packcpu1'])&& $roww['packcpu1']!=='' && $roww['packcpu1']!=='0')$m_packcpu1[]=$roww['packcpu1'];else$m_packcpu1[]='0';
				if(isset($roww['packcpu2'])&& $roww['packcpu2']!=='' && $roww['packcpu2']!=='0')$m_packcpu2[]=$roww['packcpu2'];else$m_packcpu2[]='0';
				if(isset($roww['packcpu3'])&& $roww['packcpu3']!=='' && $roww['packcpu3']!=='0')$m_packcpu3[]=$roww['packcpu3'];else$m_packcpu3[]='0';
				if(isset($roww['packcpu4'])&& $roww['packcpu4']!=='' && $roww['packcpu4']!=='0')$m_packcpu4[]=$roww['packcpu4'];else$m_packcpu4[]='0';
				if(isset($roww['packtenureprice'])&& $roww['packtenureprice']!=='' && $roww['packtenureprice']!=='0')$m_packtenureprice[]=$roww['packtenureprice'];else$m_packtenureprice[]='0';
				if(isset($roww['packdrivecode'])&& $roww['packdrivecode']!=='' && $roww['packdrivecode']!=='0')$m_packdrivecode[]=$roww['packdrivecode'];else$m_packdrivecode[]='0';
				if(isset($roww['packip_total'])&& $roww['packip_total']!=='' && $roww['packip_total']!=='0')$m_packip_total[]=$roww['packip_total'];else$m_packip_total[]='0';
				if(isset($roww['packbackup_total'])&& $roww['packbackup_total']!=='' && $roww['packbackup_total']!=='0')$m_packbackup_total[]=$roww['packbackup_total'];else$m_packbackup_total[]='0';
				if(isset($roww['packdatabase_total'])&& $roww['packdatabase_total']!=='' && $roww['packdatabase_total']!=='0')$m_packdatabase_total[]=$roww['packdatabase_total'];else$m_packdatabase_total[]='0';
				if(isset($roww['packos_total'])&& $roww['packos_total']!=='' && $roww['packos_total']!=='0')$m_packos_total[]=$roww['packos_total'];else$m_packos_total[]='0';
				if(isset($roww['packqtt'])&& $roww['packqtt']!=='' && $roww['packqtt']!=='0')$m_packqtt[]=$roww['packqtt'];else$m_packqtt[]='1';


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
	//$_SESSION['packserver']=$selek;
	//$_SESSION['packpower']=$selek;
	$_SESSION['packminmonths']='1';
	$_SESSION['plantotal']=$m_plan_amount;

	$_SESSION['plantotal2']=$m_plan_amount;
	$_SESSION['planprice2']=$m_plan_amount;

	$_SESSION['ip']=$m_packipn;
	$_SESSION['cpu_total']=$m_packcpu1;
	$_SESSION['ram_total']=$m_packcpu2;
	$_SESSION['space_total']=$m_packcpu3;
	$_SESSION['data_total']=$m_packcpu4;

	$_SESSION['packtenureprice']=$m_packtenureprice;
	$_SESSION['packdrivecode']=$m_packdrivecode;

	$_SESSION['packip_total']=$m_packip_total;
	$_SESSION['packbackup_total']=$m_packbackup_total;
	$_SESSION['packdatabase_total']=$m_packdatabase_total;
	$_SESSION['packos_total']=$m_packos_total;

	$_SESSION['packqtt']=$m_packqtt;




}else{

	if(isset($_REQUEST['packid']) && $_REQUEST['packid']!=='' && $_REQUEST['packid']!=='0')$_SESSION['packid']=$_REQUEST['packid'];
	if(isset($_REQUEST['packselected']))$_SESSION['packselected']=$_REQUEST['packselected'];
	if(isset($_REQUEST['packselectedsub']))$_SESSION['packselectedsub']=$_REQUEST['packselectedsub'];
	if(isset($_REQUEST['packcpu']) && $_REQUEST['packcpu']!=='' && $_REQUEST['packcpu']!=='0')$_SESSION['packcpu']=$_REQUEST['packcpu'];else$_SESSION['packcpu']='0';
	if(isset($_REQUEST['packram']) && $_REQUEST['packram']!=='' && $_REQUEST['packram']!=='0')$_SESSION['packram']=$_REQUEST['packram'];else$_SESSION['packram']='0';
	if(isset($_REQUEST['packdata']) && $_REQUEST['packdata']!=='' && $_REQUEST['packdata']!=='0')$_SESSION['packdata']=$_REQUEST['packdata'];else$_SESSION['packdata']='0';
	if(isset($_REQUEST['packspace']) && $_REQUEST['packspace']!=='' && $_REQUEST['packspace']!=='0')$_SESSION['packspace']=$_REQUEST['packspace'];else$_SESSION['packspace']='0';
	if(isset($_REQUEST['packos']) && $_REQUEST['packos']!=='' && $_REQUEST['packos']!=='0')$_SESSION['packos']=$_REQUEST['packos'];else$_SESSION['packos']='';
	if(isset($_REQUEST['packips']) && $_REQUEST['packips']!=='' && $_REQUEST['packips']!=='0')$_SESSION['packips']=$_REQUEST['packips'];else$_SESSION['packips']='0';
	if(isset($_REQUEST['packdb']) && $_REQUEST['packdb']!=='' && $_REQUEST['packdb']!=='0')$_SESSION['packdb']=$_REQUEST['packdb'];else$_SESSION['packdb']='';
	if(isset($_REQUEST['packbackup']) && $_REQUEST['packbackup']!=='' && $_REQUEST['packbackup']!=='0')$_SESSION['packbackup']=$_REQUEST['packbackup'];else$_SESSION['packbackup']='0';
	if(isset($_REQUEST['packmonths']) && $_REQUEST['packmonths']!=='' && $_REQUEST['packmonths']!=='0')$_SESSION['packmonths']=$_REQUEST['packmonths'];else$_SESSION['packmonths']='1';
	if(isset($_REQUEST['packprice']))$_SESSION['packprice']=$_REQUEST['packprice'];else$_SESSION['packprice']='0';

	if(isset($_REQUEST['packdrive']) && $_REQUEST['packdrive']!=='' && $_REQUEST['packdrive']!=='0')$_SESSION['packdrive']=$_REQUEST['packdrive'];else$_SESSION['packdrive']='';
	if(isset($_REQUEST['packserver']) && $_REQUEST['packserver']!=='' && $_REQUEST['packserver']!=='0')$_SESSION['packserver']=$_REQUEST['packserver'];else$_SESSION['packserver']='0';
	if(isset($_REQUEST['packpower']) && $_REQUEST['packpower']!=='' && $_REQUEST['packpower']!=='0')$_SESSION['packpower']=$_REQUEST['packpower'];else$_SESSION['packpower']='0';
	if(isset($_REQUEST['packminmonths']) && $_REQUEST['packminmonths']!=='' && $_REQUEST['packminmonths']!=='0')$_SESSION['packminmonths']=$_REQUEST['packminmonths'];else$_SESSION['packminmonths']='1';
	if(isset($_REQUEST['planprice']))$_SESSION['planprice2']=$_REQUEST['planprice'];else$_SESSION['planprice2']='0';

if(isset($_REQUEST['packipn'])&& $_REQUEST['packipn']!=='' && $_REQUEST['packipn']!=='0')$_SESSION['ip']=$_REQUEST['packipn'];else$_SESSION['ip']='0';

if(isset($_REQUEST['packcpu1'])&& $_REQUEST['packcpu1']!=='' && $_REQUEST['packcpu1']!=='0')$_SESSION['cpu_total']=$_REQUEST['packcpu1'];else$_SESSION['cpu_total']='0';

if(isset($_REQUEST['packcpu2'])&& $_REQUEST['packcpu2']!=='' && $_REQUEST['packcpu2']!=='0')$_SESSION['ram_total']=$_REQUEST['packcpu2'];else$_SESSION['ram_total']='0';

if(isset($_REQUEST['packcpu3'])&& $_REQUEST['packcpu3']!=='' && $_REQUEST['packcpu3']!=='0')$_SESSION['space_total']=$_REQUEST['packcpu3'];else$_SESSION['space_total']='0';


if(isset($_REQUEST['packcpu4'])&& $_REQUEST['packcpu4']!=='' && $_REQUEST['packcpu4']!=='0')$_SESSION['data_total']=$_REQUEST['packcpu4'];else$_SESSION['data_total']='0';

if(isset($_REQUEST['plantotal'])&& $_REQUEST['plantotal']!=='' && $_REQUEST['plantotal']!=='0')$_SESSION['plantotal2']=$_REQUEST['plantotal'];else$_SESSION['plantotal2']='0';

if(isset($_REQUEST['packtenureprice']))$_SESSION['packtenureprice']=$_REQUEST['packtenureprice'];else$_SESSION['packtenureprice']='0';
if(isset($_REQUEST['packdrivecode'])&& $_REQUEST['packdrivecode']!=='' && $_REQUEST['packdrivecode']!=='0')$_SESSION['packdrivecode']=$_REQUEST['packdrivecode'];else$_SESSION['packdrivecode']='0';

if(isset($_REQUEST['packip_total'])&& $_REQUEST['packip_total']!=='' && $_REQUEST['packip_total']!=='0')$_SESSION['packip_total']=$_REQUEST['packip_total'];else$_SESSION['packip_total']='0';
if(isset($_REQUEST['packbackup_total'])&& $_REQUEST['packbackup_total']!=='' && $_REQUEST['packbackup_total']!=='0')$_SESSION['packbackup_total']=$_REQUEST['packbackup_total'];else$_SESSION['packbackup_total']='0';
if(isset($_REQUEST['packdatabase_total'])&& $_REQUEST['packdatabase_total']!=='' && $_REQUEST['packdatabase_total']!=='0')$_SESSION['packdatabase_total']=$_REQUEST['packdatabase_total'];else$_SESSION['packdatabase_total']='0';
if(isset($_REQUEST['packos_total'])&& $_REQUEST['packos_total']!=='' && $_REQUEST['packos_total']!=='0')$_SESSION['packos_total']=$_REQUEST['packos_total'];else$_SESSION['packos_total']='0';

if(isset($_REQUEST['packqtt']))$_SESSION['packqtt']=$_REQUEST['packqtt'];else$_SESSION['packqtt']='1';


}
$packid = $_SESSION['packid'];	
$plansSelected=$_SESSION['packselected'];
$packselectedsub=$_SESSION['packselectedsub'];

$packip_total=$_SESSION['packip_total'];
$packbackup_total=$_SESSION['packbackup_total'];
$packdatabase_total=$_SESSION['packdatabase_total'];
$packos_total=$_SESSION['packos_total'];

$packtenureprice=$_SESSION['packtenureprice'];
$packdrivecode=$_SESSION['packdrivecode'];

$packcpu=$_SESSION['packcpu'];
$packram=$_SESSION['packram'];
$packdata=$_SESSION['packdata'];
$packspace=$_SESSION['packspace'];
$packos=$_SESSION['packos'];
$packips=$_SESSION['packips'];
$packdb=$_SESSION['packdb'];
$packbackup=$_SESSION['packbackup'];
$packmonths=$_SESSION['packmonths'];
$packprice =$_SESSION['packprice'];
$packdrive = $_SESSION['packdrive'];
$packserver=$_SESSION['packserver'];
$packpower=$_SESSION['packpower'];
//$mindays = $_SESSION['packminmonths'];
$planprice2 = $_SESSION['planprice2'];
$ip = $_SESSION['ip'];
$cpu_total=$_SESSION['cpu_total'];
$ram_total=$_SESSION['ram_total'];
$space_total=$_SESSION['space_total'];
$data_total=$_SESSION['data_total'];
$plantotal2=$_SESSION['plantotal2'];

$qtt=$_SESSION['packqtt'];



//$total

if(count($plansSelected)>'0'){
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
		}}else $ecode[]=0;

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
}else{$ecode[]=0;}