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
	//$_SESSION['packserver']=$selek;
	//$_SESSION['packpower']=$selek;
	$_SESSION['packminmonths']='1';
	$_SESSION['plantotal']=$m_plan_amount;

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

if(isset($_REQUEST['otc123']))$_SESSION['otc123']=$_REQUEST['otc123'];else$_SESSION['otc123']='0';


}
if(isset($_REQUEST['packid']))$packid = $_SESSION['packid'];	else$packid='0';
if(isset($_REQUEST['packselected']))$plansSelected=$_SESSION['packselected'];else$plansSelected='0';
if(isset($_REQUEST['packselectedsub']))$packselectedsub=$_SESSION['packselectedsub'];else$packselectedsub='0';

if(isset($_REQUEST['packip_total']))$packip_total=$_SESSION['packip_total'];else$packip_total='0';
if(isset($_REQUEST['packbackup_total']))$packbackup_total=$_SESSION['packbackup_total'];else$packbackup_total='0';
if(isset($_REQUEST['packdatabase_total']))$packdatabase_total=$_SESSION['packdatabase_total'];else$packdatabase_total='0';
if(isset($_REQUEST['packos_total']))$packos_total=$_SESSION['packos_total'];else$packos_total='0';

if(isset($_REQUEST['packtenureprice']))$packtenureprice=$_SESSION['packtenureprice'];else$packtenureprice='0';
if(isset($_REQUEST['packdrivecode']))$packdrivecode=$_SESSION['packdrivecode'];else$packdrivecode='0';

if(isset($_REQUEST['packcpu']))$packcpu=$_SESSION['packcpu'];else$packcpu='0';
if(isset($_REQUEST['packram']))$packram=$_SESSION['packram'];else$packram='0';
if(isset($_REQUEST['packdata']))$packdata=$_SESSION['packdata'];else$packdata='0';
if(isset($_REQUEST['packspace']))$packspace=$_SESSION['packspace'];else$packspace='0';
if(isset($_REQUEST['packos']))$packos=$_SESSION['packos'];else$packos='0';
if(isset($_REQUEST['packips']))$packips=$_SESSION['packips'];else$packips='0';
if(isset($_REQUEST['packdb']))$packdb=$_SESSION['packdb'];else$packdb='0';
if(isset($_REQUEST['packbackup']))$packbackup=$_SESSION['packbackup'];else$packbackup='0';
if(isset($_REQUEST['packmonths']))$packmonths=$_SESSION['packmonths'];else$packmonths='0';
if(isset($_REQUEST['packprice']))$packprice =$_SESSION['packprice'];else$packprice='0';
//$planPrice=$_SESSION['planprice']; /////////////////
if(isset($_REQUEST['packdrive']))$packdrive = $_SESSION['packdrive'];else$packdrive='0';
if(isset($_REQUEST['packserver']))$packserver=$_SESSION['packserver'];else$packserver='0';
if(isset($_REQUEST['packpower']))$packpower=$_SESSION['packpower'];else$packpower='0';
//$mindays = $_SESSION['packminmonths'];
if(isset($_REQUEST['planprice']))$planprice2 = $_SESSION['planprice2'];else$planprice2='0';
if(isset($_REQUEST['packipn']))$ip = $_SESSION['ip'];else$ip='0';
if(isset($_REQUEST['packcpu1']))$cpu_total=$_SESSION['cpu_total'];else$cpu_total='0';
if(isset($_REQUEST['packcpu2']))$ram_total=$_SESSION['ram_total'];else$ram_total='0';
if(isset($_REQUEST['packcpu3']))$space_total=$_SESSION['space_total'];else$space_total='0';
if(isset($_REQUEST['packcpu4']))$data_total=$_SESSION['data_total'];else$data_total='0';
if(isset($_REQUEST['plantotal']))$plantotal2=$_SESSION['plantotal2'];else$plantotal2='0';

if(isset($_REQUEST['packqtt']))$qtt=$_SESSION['packqtt'];else$qtt='1';
if(isset($_REQUEST['otc123']))$otc_item=$_SESSION['otc123'];else$otc_item='0';



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