<?php include('mysql.php');

function getcateg($fv1){global $mr_con;

	$q1="SELECT categ_name FROM categories WHERE id='$fv1'";

	$eq1=mysqli_query($mr_con,$q1);

	if(mysqli_num_rows($eq1)>'0'){

		$r1=mysqli_fetch_array($eq1);

		return $r1['categ_name'];

	}else return '0';

}
function selected($fv1,$fv2){

	if($fv1==$fv2) return 'selected="selected"';

}

$re='';

$baseurl='https://pidatacenters.com/pidata';

$a1=mysqli_real_escape_string($mr_con,$_REQUEST['x']);

$cpu_total=mysqli_real_escape_string($mr_con,$_REQUEST['cpu_total']);
$ram_total=mysqli_real_escape_string($mr_con,$_REQUEST['ram_total']);
$space_total=mysqli_real_escape_string($mr_con,$_REQUEST['space_total']);
$data_total=mysqli_real_escape_string($mr_con,$_REQUEST['data_total']);

$packip_total=mysqli_real_escape_string($mr_con,$_REQUEST['packip_total']);
$packbackup_total=mysqli_real_escape_string($mr_con,$_REQUEST['packbackup_total']);
$packdatabase_total=mysqli_real_escape_string($mr_con,$_REQUEST['packdatabase_total']);
$packos_total=mysqli_real_escape_string($mr_con,$_REQUEST['packos_total']);


//$plan=mysqli_real_escape_string($mr_con,$_REQUEST['plan']);
//$subplan=mysqli_real_escape_string($mr_con,$_REQUEST['subplan']);
$pricing = mysqli_real_escape_string($mr_con,$_REQUEST['total']);
$planprice=$pricing;
$os=mysqli_real_escape_string($mr_con,$_REQUEST['os']);
$os_t=mysqli_real_escape_string($mr_con,$_REQUEST['os_t']);
$database=mysqli_real_escape_string($mr_con,$_REQUEST['database']);
$database_t=mysqli_real_escape_string($mr_con,$_REQUEST['database_t']);
$backup=mysqli_real_escape_string($mr_con,$_REQUEST['backup']);

$ip_num=mysqli_real_escape_string($mr_con,$_REQUEST['ip_num']);
if(isset($_REQUEST['ip']) && $_REQUEST['ip']!=='' && $_REQUEST['ip']!=='0')$ip=mysqli_real_escape_string($mr_con,$_REQUEST['ip']);else $ip='0';
//$min_months = '1';
$cpu=mysqli_real_escape_string($mr_con,$_REQUEST['cpu']);
$ram=mysqli_real_escape_string($mr_con,$_REQUEST['ram']);

$cpu_e=mysqli_real_escape_string($mr_con,$_REQUEST['cpu_e']);
$ram_e=mysqli_real_escape_string($mr_con,$_REQUEST['ram_e']);


$space=mysqli_real_escape_string($mr_con,$_REQUEST['space']);
$data=mysqli_real_escape_string($mr_con,$_REQUEST['data']);
$power=mysqli_real_escape_string($mr_con,$_REQUEST['power']);
$power_total=mysqli_real_escape_string($mr_con,$_REQUEST['power_total']);
$server=mysqli_real_escape_string($mr_con,$_REQUEST['server']);
$server_total=mysqli_real_escape_string($mr_con,$_REQUEST['server_total']);

$drive=mysqli_real_escape_string($mr_con,$_REQUEST['drive']);
$drive_code=mysqli_real_escape_string($mr_con,$_REQUEST['drive_code']);

$tenure=mysqli_real_escape_string($mr_con,$_REQUEST['tenure']);

$tenure_price=mysqli_real_escape_string($mr_con,$_REQUEST['tenure_price']);
//$power=mysqli_real_escape_string($mr_con,$_REQUEST['power']);

$q1="SELECT `plan`, `subplan`, `min_months`, `image`, `description`,`alias` FROM lj_server_plans1 WHERE alias='$a1' AND flag='0'";

$eq1=mysqli_query($mr_con,$q1);

if(mysqli_num_rows($eq1)){

	while($r1=mysqli_fetch_array($eq1)){

/*
		$cat1=getcateg($r1['category1']);

		$cat2=getcateg($r1['category2']);

		$cat3=getcateg($r1['category3']);

		$pricing=$r1['price'];

		$planprice=$r1['price']*$r1['min_months']*$r1['min_gb'];
*/
		$re.='<div class="qwesr"><h2 class="category-title">'.$r1['subplan'].'</h2>';

		$re.='<div class="category-block jaganindia">';
/*
		if($cat3!='0')$re.='<h3 class="arrow-bg bold">'.$cat2.'('.$cat3.')</h3>';

		else $re.='<h3 class="arrow-bg bold">'.$cat2.'</h3>';
*/
		
		$re.='<table width="100%" cellpadding="0" cellspacing="0" class="sum-table">';

		$re.='<tr>';

		$re.='<td>';

			$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Plan Details:</b></p>';

			if($cpu_total!=='' && $cpu_total!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>CPU :</b> '.$cpu.' Cores - '.$cpu_total.'/-</p>';
			if($ram_total!=='' && $ram_total!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Ram : </b> '.$ram.' GB - '.$ram_total.'/-</p>';

			if($cpu_e!=='' && $cpu_e!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>CPU :</b> '.$cpu_e.' Cores</p>';
			if($ram_e!=='' && $ram_e!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Ram : </b> '.$ram_e.' GB</p>';
			//if($space_e!=='' && $space_e!=='0')$re.='<p class="dbmargin3"><b>Space : </b> '.$space_e.' GB</p>';
			
			if($space_total!=='' && $space_total!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Disk Space : </b> '.$space.' GB - '.$space_total.'/-</p>';
			if(($space_total=='' || $space_total=='0') &&($space!=='' && $space!=='0'))$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Disk Space : </b> '.$space.' GB</p>';
			if($data_total!=='' && $data_total!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Data Transfer : </b> '.$data.' GB - '.$data_total.'/-</p>';
			if($ip_num!=='' && $ip_num!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>IP : </b>'.$ip_num.'</p>';
			if($os!=='' && $os!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>OS : </b>'.$os_t.'</p>';
			if($backup!=='' && $backup!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Backup : </b>'.$backup.' GB</p>';
			if($database!=='' && $database!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Database : </b>'.$database_t.'</p>';
			if($drive!=='' && $drive!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Drive : </b>'.$drive.'</p>';
			if($server!=='' && $server!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Server : </b>'.$server.' Units</p>';
			if($power!=='' && $power!=='0')$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Power : </b>'.$power.' KVA</p>';
			$re.='<p class="dbmargin3" style=
			"text-indent: 0px !important"><b>Total : </b>'.$tenure_price.'</p>';
			
			$re.='<span class="hello12"></span>';
		$re.='</td>';

		$re.='<td valign="top"><a class="close-pro" href="javascript:void(0)" data-value="'.$r1['alias'].'"><img src="images/close-bold-icon.png"></a></td>';

		$re.='</tr>';



		$re.='<tr>';

		$re.='<td>';

			if($r1['subplan']=='Cloud Server'){

			$re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
			$re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
			$re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
			$re.='<input type="hidden" name="packprice1[]" class="packprice1" value="'.$pricing.'">';
			$re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

			$pricing=$cpu_total+$ram_total+$space_total+$data_total;
			$re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';

			$re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';


			$re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
			$re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
			$re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
			$re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';
			$re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';
			$re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
			$re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
			$re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
			$re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
			$re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
			$re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
			$re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
			$re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
			$re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

			$re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
			$re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
			$re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
			$re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';

			$re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';

			$re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
			$re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';
			
			$re.='<div><label><b class="lblgree">Tenure:</b> ';
				$re.='<select class="packmonths changepricing finselet" name="packmonths[]">';

			if($r1['min_months']=='1')$re.='<option value="1"'; if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>1 Month x Rs '.$pricing.'/-</option>';

			if($r1['min_months']<='2')$re.='<option value="2" ';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>3 Months x Rs '.$pricing*0.85.'/-</option>';

			$re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>6 Months x Rs '.$pricing*0.70.'/-</option>';

			$re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>12 Months x Rs '.$pricing*0.65.'/-</option>';

			$re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>24 Months x Rs '.$pricing*0.60.'/-</option>';

			$re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>36 Months x Rs '.($pricing*0.50).'/-</option>';

			

			$re.='</select></label>';

			}else if($r1['subplan']=='Virtual Dedicated Servers'){
				$re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
			$re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
			$re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
			$re.='<input type="hidden" name="packprice1[]" class="packprice1" value="'.$pricing.'">';
			$re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

			$pricing=$cpu_total+$ram_total+$space_total+$data_total;
			$re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';

			$re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';


			$re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
			$re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
			$re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
			$re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';
			$re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';
			$re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
			$re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
			$re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
			$re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
			$re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
			$re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
			$re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
			$re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
			$re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

			$re.='<input type="hidden" name="packdrivecode[]" class="packdrivecode" value="'.$drive_code.'">';


			$re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
			$re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
			$re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
			$re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';

			$re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';

			$re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
			$re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';
			
			
			$re.='<div><label><b class="lblgree">Tenure:</b> ';
				$re.='<select class="packmonths changepricing finselet" name="packmonths[]">';

			if($r1['min_months']=='1')$re.='<option value="1"'; if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>1 Month x Rs '.$pricing.'/-</option>';

			if($r1['min_months']<='2')$re.='<option value="2" ';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>3 Months x Rs '.$pricing*0.85.'/-</option>';

			$re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>6 Months x Rs '.$pricing*0.70.'/-</option>';

			$re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>12 Months x Rs '.$pricing*0.65.'/-</option>';

			$re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>24 Months x Rs '.$pricing*0.60.'/-</option>';

			$re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>36 Months x Rs '.($pricing*0.50).'/-</option>';

			$re.='</select></label>';

			}else if(($r1['subplan']=='Enterprise Dedicated Servers - E3')||($r1['subplan']=='Enterprise Dedicated Servers - E5')){

			$re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
			$re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
			$re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
			$pricing = $tenure_price;

			$re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
			$re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

			$re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

			$re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
			$re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
			$re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
			$re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
			$re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
			$re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
			$re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
			$re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
			$re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
			$re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';
$re.='<input type="hidden" name="packdrivecode[]" class="packdrivecode" value="'.$drive_code.'">';

			$re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
			$re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';

			$re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
			$re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
			$re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';

			$re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';

			$re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';


			$re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
			$re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
			$re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
			$re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';
			
			$re.='<div><label><b class="lblgree">Tenure:</b> ';
				$re.='<select class="packmonths changepricing finselet" name="packmonths[]">';

			$re.='<option value="1"';if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>1 Month</option>';

			$re.='<option value="2"';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months</option>';

			$re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>3 Months</option>';

			$re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>6 Months</option>';

			$re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>12 Months</option>';

			$re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>24 Months</option>';

			$re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>36 Months</option>';


			$re.='</select></label>';

			}
			else if(($r1['subplan']=='Enterprise Cloud Storage')||($r1['subplan']=='Dedicated Disk Storage')){

			$re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
			$re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
			$re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
			$pricing = $pricing-$ip;

			$re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
			$re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

			$re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

			$re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
			$re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
			$re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
			$re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
			$re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
			$re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
			$re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
			$re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
			$re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
			$re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

			$re.='<input type="hidden" name="packdrivecode[]" class="packdrivecode" value="'.$drive_code.'">';

			$re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
			$re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';

			$re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';

			$re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
			$re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
			$re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';

			$re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';



			$re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
			$re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
			$re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
			$re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';
			
			$re.='<div><label><b class="lblgree">Tenure:</b> ';
				$re.='<select class="packmonths changepricing finselet" name="packmonths[]">';

			$re.='<option value="1"';if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>1 Month</option>';

			$re.='<option value="2"';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months</option>';

			$re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>3 Months</option>';

			$re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>6 Months</option>';

			$re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>12 Months</option>';

			$re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>24 Months</option>';

			$re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>36 Months</option>';

			$re.='</select></label>';

			}
else if($r1['subplan']=='Virtual Dedied Servers'){

			$re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
			$re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
			$re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
			$pricing = $pricing-$ip;

			$re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
			$re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

			$re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

			$re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
			$re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
			$re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
			$re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
			$re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
			$re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
			$re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
			$re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
			$re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
			$re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

			$re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';
			
			$re.='<div><label><b class="lblgree">Tenure:</b> ';
				$re.='<select class="packmonths changepricing finselet" name="packmonths[]">';

			if($r1['min_months']=='1')$re.='<option value="1">1 Month x Rs '.$pricing.'/-</option>';

			if($r1['min_months']<='2')$re.='<option value="2">2 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="3">3 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="6">6 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="12">12 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="24">24 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="36">36 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="48">48 Months x Rs '.$pricing.'/-</option>';

			$re.='</select></label>';

			}


			else{

			$re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
			$re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
			$re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
			$pricing = $pricing-$ip;

			$re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
			$re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

			$re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

			$re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
			$re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
			$re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
			$re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
			$re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
			$re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
			$re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
			$re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
			$re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
			$re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

			$re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';
			
			$re.='<div><label><b class="lblgree">Tenure:</b> ';
				$re.='<select class="packmonths changepricing finselet" name="packmonths[]">';

			if($r1['min_months']=='1')$re.='<option value="1">1 Month x Rs '.$pricing.'/-</option>';

			if($r1['min_months']<='2')$re.='<option value="2">2 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="3">3 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="6">6 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="12">12 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="24">24 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="36">36 Months x Rs '.$pricing.'/-</option>';

			$re.='<option value="48">48 Months x Rs '.$pricing.'/-</option>';

			$re.='</select></label>';

			}

			
			$re.='</div>';

		$re.='</td>';

		$re.='</tr>';
		$re.='</table>';

		$re.='<table width="100%" cellpadding="0" cellspacing="0" class="sum-table sum-tablea">';

		$re.='<tr>';

		$re.='<td><span class="bold">Plan Price: Rs <span class="subbrtor" id="subbrtor">'.$planprice.'</span>/-</span></td>';
		$re.='<input type="hidden" name="planprice[]" class="planprice" id="planprice2" value="'.$planprice.'">';
		$re.='<input type="hidden" name="plantotal[]" class="plantotal" id="plantotal" value="'.$planprice.'">';


		$re.='</tr>';

		$re.='</table>';

		$re.='</div></div>';

}

}else{}

echo $re;

?>