<?php
if(isset($_REQUEST['x'])){
ob_start();
include ('mysql.php');
function alias($alias,$tb,$col,$retrive){ global $mr_con;
	$sql = mysqli_query($mr_con,"SELECT $retrive FROM $tb WHERE $col='$alias' AND flag=0");
	if(mysqli_num_rows($sql)){
		$row = mysqli_fetch_array($sql);
		return $row[$retrive];
	}else return "";
}
function getproperdate($fv1){
	$ac=date_create($fv1);
	return date_format($ac, 'd-M-Y H:i');
}
$orderalias=mysqli_real_escape_string($mr_con,$_REQUEST['x']);
if($orderalias!=''&&$orderalias!='0'){
ob_start(); 
include('mpdf60/mpdf.php');
global $baseurl;
$sql = "SELECT t1.order_id, t1.alias, t1.order_date, t1.order_by, t1.order_amount, t1.payment_mode, t1.order_status, t2.fullname, t2.designation, t2.company_name, t2.industry, t2.addresstype, t2.address, t2.city, t2.state, t2.pincode FROM lj_orders t1 INNER JOIN lj_order_address t2 ON t1.alias=t2.order_alias WHERE t1.alias='$orderalias'";
$result = mysqli_query($mr_con,$sql);
if($result){
$count = mysqli_num_rows($result);
if($count>'0'){
$row=mysqli_fetch_array($result);
$body='<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/cart1_mail.css">
</head>
<body>
<!-- cart main starts-->
<div class="print-cart">
<div class="wrapper-cart"> 
<!-- payment acknowledgement starts-->
<div class="pay-ack">
<div class="payment-ack-header">
	<div style="padding-top:5px; width:100%;text-align:right;"><img style="height:80px;" src="'.$baseurl.'/images/mail-logo.png"></div>
	<hr>
	<div class="" style="padding-bottom:10px;">
		<article class="col-md-8">
			<b>Your (Order ID: '.$row['order_id'].')</b><br>
			<span style="font-size:14px;">Placed on '.getproperdate($row['order_date']).'</span><br>
			<span style="font-size:14px;">Email ID: <span class="bold">'.alias($row['order_by'],'lj_logins','alias','username').'</span></span>
		</article>
	</div><br>
	<div class="" style="padding-bottom:10px;">
		<article class="col-md-8"><b>Order summary</b></article>
	</div>
</div>
<div class="payment-ack-body">
<div class="table-ack">
<table width="100%" cellpadding="3" cellspacing="0">
<tr class="ack-head" style="background:#20641b; line-height:30px; color:#FFF;">
<td style="line-height:30px; color:#FFF;">&nbsp;&nbsp;Product Details</td>
<td style="line-height:30px; color:#FFF;">Price per Month</td>
<td style="line-height:30px; color:#FFF;">Tenure</td>
<td style="line-height:30px; color:#FFF;">Sub - total</td>
</tr>';
$sqlw = "SELECT  t3.plan_id, t3.min_gb, t3.min_months, t3.price, t3.increments, t3.iops, t3.selected_months, t3.selected_storage, t3.selected_iops, t3.plan_amount, t3.selectedServers, t3.selectedOs as selected_os, t3.selectedPlatform as selected_plat FROM lj_selected_plans t3 WHERE t3.order_id='".$row['alias']."'";
$resultw = mysqli_query($mr_con,$sqlw);
while($roww=mysqli_fetch_array($resultw)){
$body.='<tr >';
$body.='<td colspan="5"><h3 class="ack-title bold">'.alias(alias($roww['plan_id'],'lj_server_plans','alias','category1'),'categories','id','categ_name').'</h3></td>';
$body.='</tr>';
$body.='<tr class="bdrr">';
$body.='<td><h5 class="ack-subtitle bold">'.alias(alias($roww['plan_id'],'lj_server_plans','alias','category2'),'categories','id','categ_name').'('.alias($roww['plan_id'],'lj_server_plans','alias','title').')</h5>';
$body.='<ul class="list-ack" style="text-indent:20px;">';
if($roww['min_gb']>'1')$body.='<li>Minimum Size '.$roww['min_gb'].' GB</li>';
if($roww['increments']>'0' && $roww['selected_storage']>0)$body.='<li>Storage Increments '.$roww['increments'].' GB * '.$roww['selected_storage'].'</li>';
if($roww['selected_iops']>'0' && $roww['selected_iops']>0)$body.='<li>IOPS Increments, 10,000/month Rs '.$roww['iops'].' * '.$roww['selected_iops'].' </li>';
if($roww['min_months']>'0')$body.='<li>Minimum Storage &nbsp;'.$roww['min_months'].' Months</li>';
if($roww['selectedServers']>'0')$body.='<li>Servers &nbsp;'.$roww['selectedServers'].'</li>';
if($roww['selected_os']>'0')$body.='<li>Selected OS &nbsp;'.$roww['selected_os'].'</li>';
if($roww['selected_plat']>'0')$body.='<li>Selected Platform &nbsp;'.$roww['selected_plat'].'</li>';
$jagan_q = "SELECT details FROM lj_plans_otherdetails WHERE plan_id='".$roww['plan_id']."'";
$jresult_q = mysqli_query($mr_con,$jagan_q);
while($row_q=mysqli_fetch_array($jresult_q)){
	$body.='<li>'.$row_q['details'].'</li>';
}
$body.='<li>Rs   '.$roww['price'].' / GB / Month</li>';
$body.='</ul></td>';
$body.='<td>Rs '.($roww['plan_amount']/$roww['selected_months']).' per Month</td>';
$body.='<td>'.$roww['selected_months'].' Months</td>';
$body.='<td><span class="bold spntotal">Rs  '.$roww['plan_amount'].'</span></td>';
$body.='</tr>';
}
$body.='</table>
<hr>
<div class="text-right" align="right">
<b style="font-size:16px;">Total Amount <span class="bold"> Rs  '.$row['order_amount'].'</span></b>
</div>
<hr>
<div class="cust-info">
	<b>Customer Information</b><br>
	<span style="font-size:13px;">'.$row['fullname'].'</span><br>
	<span style="font-size:13px;">'.$row['company_name'].'</span><br>
	<span style="font-size:13px;">'.alias($row['order_by'],'lj_logins','alias','username').'</span><br>
	<span style="font-size:13px;">'.$row['address'].'</span><br>
	<span style="font-size:13px;">'.$row['city'].' - '.$row['pincode'].', '.$row['state'].' </span><br>
	<p><img style="margin-top:-3px;" src="images/lock-icon.png">100 % Safe & Secure Payments</p>
</div>
</div>
</div>
</div>
<!-- payment acknowledgement ends --> 
</div>
</div>
<!-- mart main ends -->
</body>
</html>';
}
}
}
$mpdf=new mPDF('','', 0, '', 5, 5, 5, 5, '', 2, '');
	$mpdf->SetHTMLFooter("<p style=\"text-align:right;font-style: italic;font-size:12px;\">{PAGENO}/{nbpg}</p>");
	$mpdf->pagenumPrefix = 'Page No : ';
	//$mpdf->SetWatermarkImage('../../images/gallery/logo-3.png');
	$mpdf->showWatermarkImage = true;
	$mpdf->watermarkImageAlpha = 0.06;
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($body,2);
	$filename='invoice-'.$row['order_id'];
	ob_end_flush();
	$mpdf->Output("$filename.pdf", "I");
}	
?>