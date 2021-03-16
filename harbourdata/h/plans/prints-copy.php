<?php
if(isset($_REQUEST['x'])){

	error_reporting(E_ALL);
	ini_set('display_errors', 1); 

	include('../mysql.php');
	include('mpdf60/mpdf.php');

	ob_start();

	function getDBdata($condition,$tb,$col,$retrive){ global $mr_con;

		// echo "SELECT $retrive FROM $tb WHERE $col='$condition'".'<br/>'; 

		$sql = mysqli_query($mr_con,"SELECT $retrive FROM $tb WHERE $col='$condition'");
		if(mysqli_num_rows($sql)){
			$row = mysqli_fetch_array($sql);
			return $row[$retrive];
		}else return "";
	}
	function getproperdate($fv1){
		$ac=date_create($fv1);
		return date_format($ac, 'd-M-Y');
	}

	function moneyFormatIndia($num){
	
		$explrestunits = "" ;
			if(strlen($num)>3){
				$lastthree = substr($num, strlen($num)-3, strlen($num));
				$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
				$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
				$expunit = str_split($restunits, 2);
	
				for($i=0; $i<sizeof($expunit); $i++){
					// creates each of the 2's group and adds a comma to the end
					if($i==0){
						$explrestunits .= (int)$expunit[$i].",";
					} // if is first value , convert into integer
					else{
						$explrestunits .= $expunit[$i].",";
					}
				}$thecash = $explrestunits.$lastthree;
			}else{
				$thecash = $num;
			}
		return $thecash.'.00'; // writes the final format where $currency is the currency symbol.
	
	}

	$order_id=mysqli_real_escape_string($mr_con,$_REQUEST['x']);

	if($order_id!='' && $order_id!='0'){
		$sql = "SELECT t1.*, t2.* FROM orders t1 INNER JOIN order_addresses t2 ON t1.order_id=t2.order_id WHERE t1.order_id='".$order_id."'";
		$result = mysqli_query($mr_con,$sql);

		if(mysqli_num_rows($result) > '0'){
			$userdetails=mysqli_fetch_array($result);

			$body='<!DOCTYPE html>
					<html>
					<head>
					<meta charset="utf-8">
					<link rel="stylesheet" href="cart1_mail.css">
					</head>
					<body>
					<!-- cart main starts-->
					<div class="print-cart">
					<div class="wrapper-cart"> 
					<!-- payment acknowledgement starts-->
					<div class="pay-ack">
					<div class="payment-ack-header">
						<!-- <div style="padding-top:5px; width:100%;text-align:right;"><img style="height:80px;" src="https://pidatacenters.com/wp-content/uploads/2017/12/Pi-Logo-180x80.png"></div>
						<hr> -->
						<div class="" style="padding-bottom:10px;">
							<article class="col-md-8">
								<b>Your Order ID: '.$order_id.'</b><br>
								<span style="font-size:14px;">Placed on '.getproperdate($userdetails['order_date']).'</span><br>
								<span style="font-size:14px;">Email ID: <span class="bold">'.$userdetails['email'].'</span></span>
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
									<td style="line-height:30px; color:#FFF;width: 35%;">&nbsp;&nbsp;<b>Product Details</b></td>
									<td style="line-height:30px; color:#FFF; text-align:center;width: 40%;"><b>Tenure</b></td>
									<td style="line-height:30px; color:#FFF; text-align:center;width: 25%;"><b>Price</b></td>
								</tr>';
								$total_otc = 0;
								$sub_total = 0;

								$product_details_query = "SELECT * FROM `purchased_products` WHERE `order_id` = '".$order_id."'";
								$product_details_result = mysqli_query($mr_con,$product_details_query);
				
								if(mysqli_num_rows($product_details_result) > '0'){
				
									while($value=mysqli_fetch_array($product_details_result)){
										$body.='<tr >'; 
										$body.='<td colspan="5"><h3 class="ack-title bold">'.$value['plan'].'</h3></td>';
										$body.='</tr>';
				
										$body.='<tr class="bdrr">';
										$body.='<td><h5 class="ack-subtitle bold">'.$value['subplan'].'</h5>';

										if($value['ram'] != '0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Ram: '.$value['ram'].'</small></p>';
										if($value['cpu'] != '0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>CPU: '.$value['cpu'].'</small></p>';
										if($value['datatransfer'] != '0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer: '.$value['datatransfer'].'</small></p>';
										if($value['diskspace'] != '0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Disk Space: '.$value['diskspace'].'</small></p>';
										if($value['backup'] != '0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Backup: '.$value['backup'].'</small></p>';
										if($value['ip']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IPs: '.$value['ip'].'</small></p>';
										if($value['drive']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Drive: '.$value['drive'].'</small></p>';
										if($value['server']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Server: '.$value['server'].' U</small></p>';
										if($value['power']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Power: '.$value['power'].' KVA</small></p>';
										if($value['os']!=='' && $value['os']!=='0' && $value['os']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>OS: '.$value['os'].'</small></p>';

										if($value['database']!=='' && $value['database']!=='0' && $value['database']>'0'){                

											if($value['database']=="MS SQL Enterprise*"){
												$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Enterprise<font color="red">*</font></small></p>';
												$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
										  
											}else if($value['database']=="MS SQL Standard*"){
						
												 $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Standard<font color="red">*</font></small></p>';
												 $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
						
											}else if($value['database']=="MS SQL Web*"){
						
												 $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Web<font color="red">*</font></small></p>';
												 $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
						
											}                   
											  else{
												$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$value['database'].'</small></p>';
											  }
										}

										if($value['quantity']>'0')
											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Quantity: '.$value['quantity'].'</small></p></td>';

	
											if($value['tenure']>'0'){
												if($value['tenure']=='1'){
													// $tenure= "Monthly";
													$tenure= "1 Month (Monthly Advance)";
													$terms = "Total bill is for first month only. Subsequent invoices will be generated on monthly basis hereafter. Unless there is a cancellation.";
												}
												else if($value['tenure']=='3'){
													$tenure= "1 year (Quarterly Advance)";
													$terms = "Total bill is for first quarter only. Subsequent invoices will be generated on quarterly basis hereafter.";						
												}else if($value['tenure']=='6'){
													$tenure= "1 year (50% Advance)";
													$terms = "Total bill is for first six months only. Subsequent invoices will be generated on half yearly basis hereafter.";
												}else if($value['tenure']=='12'){
													$tenure= "1 year (100% Advance)";
													$terms = "Total bill is for the period of one year in full.";
												}else if($value['tenure']=='24'){
													$tenure= "2 year (100% Advance)";
													$terms = "Total bill is for the period of two year in full.";
												}else if($value['tenure']=='36'){
													$tenure= "3 year (100% Advance)";
													$terms = "Total bill is for the period of three year in full.";
												}
											}

											$body.='<td style="text-align:center;"><p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;"> '.$tenure.'</span></p><br><p style="color:#20641b;text-indent:14px; font-weight: bold">'.$terms.' </p>
                      								</td>';
											$sub_total = $sub_total + round($value['amount']);
											$body.='<td style="text-align:right"><span class="bold spntotal">INR  '.round($value['amount']).'</span></td>';
			

											$body.='</tr>';
									}
								}
								$discount_para = "";

								$purchase_details_query = "SELECT * FROM orders WHERE order_id = '".$order_id."'";
								// echo $purchase_details_query;
								$purchase_details_result = mysqli_query($mr_con,$purchase_details_query);

								if(mysqli_num_rows($purchase_details_result) > '0'){

									$purchase_value=mysqli_fetch_array($purchase_details_result);	

									// $base_total = $purchase_value['base_total'];
									if($purchase_value['promocode_discount']>0){
										$discount_para = '<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px; padding-right:17px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Discount : INR '.moneyFormatIndia((int)$purchase_value['promocode_discount']).'</span></p>
										<br>';
									}
									if($purchase_value['total_infra_discount']>0){
										$infra_discount_para = '<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px; padding-right:17px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Promotional Offer : INR '.moneyFormatIndia((int)$purchase_value['total_infra_discount']).'</span></p>';

										$after_discount_subtotal = '<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px; padding-right:17px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">After Promotional Offer Sub Total : INR '.moneyFormatIndia((int)$purchase_value['base_total']).'</span></p>';

									}
									$body.='</table>';

									$body.='<br><br><p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px; padding-right:17px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Sub Total : INR '.moneyFormatIndia((int)($purchase_value['amount'] - $purchase_value['tax_amount'])).'</span></p>';
									$body.=$discount_para.'<br>';
									$body.=$infra_discount_para.'<br>';
									$body.=$after_discount_subtotal.'<br>
									<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px; padding-right:17px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">OTC : INR '.moneyFormatIndia((int)$purchase_value['otc_total']).'</span></p>

									<br><br>
									<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px; padding-right:17px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">GST (18%): INR '.moneyFormatIndia((int)$purchase_value['tax_amount']).'</span></p>

									<br>

									<hr>
									
									<div class="text-right" align="right" style="padding-right:17px;">
										<b style="font-size:16px; ">Total Amount <span class="bold"> INR  '.$purchase_value['amount'].'</span></b>
									</div>
									<hr>';
								
								}

				
					$body.='
						<div class="cust-info">

							<b>Customer Information</b><br>
							<span style="font-size:13px;">'.$userdetails['first_name'].'</span><br>
							<span style="font-size:13px;">'.$userdetails['company'].'</span><br>
							<span style="font-size:13px;">'.$userdetails['mobile'].'</span><br>
							<span style="font-size:13px;">'.$userdetails['address_line2'].'</span><br>
							<p align="center"></p>

						</div>
					</div>
					</div>';

				

				
			}

			$tandc='<section>
             <div class="container" style="padding-top: 20px;">
                <h2 style="text-align: center;"><strong>TERMS &amp; CONDITIONS</strong></h2><br><br>
<h3><b>1. Introduction</b></h3><br>
<p style="text-align: justify; color:black;">Welcome to Pi DATACENTERS Private Limited (“Pi”). The Terms and Conditions written on this website shall govern your access and use of this website and its content. These Terms will be applied fully and affect your use of this Website. By using this website, you accept all terms and conditions written in here.Please read them carefully. In addition, when you use any current or future Pi’s products, services, content or other materials, you also will be subject to this agreement governing your use of our products and services.</p><br>
<h3><b>2. Copyright</b></h3><br>
<p style="text-align: justify; color:black;">All content included on this site, its pages and all other screens displaying the content, such as text, graphics, logos, images, language, audio, video, download or any other data content, including relevant software, is the property of Pi, protected by India copyright laws. All hardware / software used on this site is the property of Pi or its suppliers and protected by India copyright laws.</p>
<p style="text-align: justify; color:black;">
By using this site, you signify your agreement to Pi’s Terms and Conditions. Your continued use of Pi and/or its affiliates’ sites following the posting of changes to these terms will mean you accept those changes.
</p><br>
<h3>COPYRIGHT © Pi DATACENTERS Private Limited. 2019, ALL RIGHTS RESERVED.</h3>
<p></p><br>
<h3><b>3. Trademarks</b></h3><br>
<table style="height: 81px;">
<tbody>
<tr style="background:none !important; vertical-align: top;">
<td style="padding: 10px; text-align: justify; color:black; vertical-align: top;"><p style="text-align: justify; color:black;">i.</p></td>
<td style="padding: 10px; text-align: justify; color:black; vertical-align: top;"><p style="text-align: justify; color:black;">Pi, its subsidiaries, affiliates, contractors and/or participating corporations are the owners of the trade and service marks appearing on this website and all rights are reserved in respect of such trade and service marks.</p></td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">ii.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">Oracle is a registered trademark of Oracle Corporation.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">iii.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">SAP products and services mentioned herein as well as their respective logos are trademarks or registered trademarks of SAP AG in Germany and other countries.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">iv.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">IBM Cloud Orchestrator are trademarks or registered trademarks of International Business Machines Corp., registered in many jurisdictions worldwide.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">v.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">Microsoft, Windows, Windows NT and the Windows logo are registered trademarks of Microsoft Corporation in the United States and/or other countries.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">vi.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">OpenStack is a registered trademark of the OpenStack Foundation</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">vii.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">UNIX is a registered trademark in the United States and other countries licensed exclusively through The Open Group.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">viii.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">LINUX and Linux are registered trademarks of Linus Torvalds.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">ix.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">Java and all Java-based trademarks and logos are trademarks of Sun Microsystems, Inc. in the United States and/or other countries.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">x.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">ITIL® is a registered trademark, and a registered community trademark of the Office of Government Commerce, and is registered in the U.S. Patent and Trademark Office.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">xi.</td>
<td style="padding: 10px;text-align: justify; color:black; vertical-align: top;">Other product and service names might be trademarks of other companies</td>
</tr>
</tbody>
</table>
<p></p><br>
<h3><b>4. Use of information and materials</b></h3><br>
<p style="text-align: justify; color:black;">The information and materials contained in these pages – and the terms, conditions, and descriptions that appear – are subject to change. Not all products and services are available in all geographic areas. Your eligibility for particular products and services is subject to Pi’s final determination and acceptance.</p><br>
<h3><b>5. Restrictions</b></h3><br>
<p style="text-align: justify; color:black;">You are specifically restricted from publishing any website content in any form on media, selling sub-licensing and/or otherwise commercializing, publicly performing and/or showing, using in any way that is or may be damaging to this website in any way that impacts user access to and is contrary to applicable laws and regulations, or in any way may cause harm and to any person or business entity and engage in any data mining, data harvesting, data extracting or any other similar activity to achieve any advertising or marketing results without legal authorization from Pi. Certain areas of this Website are restricted from being accessed by you and Pi may further restrict access by you to any areas, at any time, in its absolute discretion.</p>
<pagebreak />
<h3><b>6. Payment Terms</b></h3>
<br>
<p style="text-align: justify; color:black;">Unless otherwise agreed, the below payment terms would be applicable for all purchases from this website:</p>
<table style="height: 481px; padding: 15px;" border="1">
<tbody>
<tr style="background:none !important;">
<td style="text-align: center; padding: 15px;font-weight: bold;text-align: justify; color:black;" width="122"><strong>Payment Model</strong></td>
<td style="text-align: center; padding: 15px;font-weight: bold;text-align: justify; color:black;" width="238"><strong>Payment Terms</strong></td>
<td style="text-align: center; padding: 15px;font-weight: bold;text-align: justify; color:black;" width="97"><strong>Cloud Products</strong></td>
<td style="text-align: center; padding: 15px;font-weight: bold;text-align: justify; color:black;" width="154"><strong>Non-Cloud Products</strong></td>
</tr>
<tr>
<td style="text-align: center; padding: 15px;" width="122"><strong>&nbsp;Monthly (Pay per use)</strong></td>
<td style="text-align: center; padding: 15px;" width="238">On Demand; Monthly payment in advance</td>
<td style="text-align: center; padding: 15px;" width="97"><strong>√</strong></td>
<td style="text-align: center; padding: 15px;" width="154"><strong>×</strong></td>
</tr>
<tr>
<td style="text-align: center; padding: 15px;" width="122"><strong>1 year (Quarterly Advance)</strong></td>
<td style="text-align: center; padding: 15px;" width="238">One Year Contract; Quarterly payment in advance</td>
<td style="text-align: center; padding: 15px;" width="97">√</td>
<td style="text-align: center; padding: 15px;" width="154">√</td>
</tr>
<tr>
<td style="text-align: center; padding: 15px;" width="122"><strong>1 year (50% Advance)</strong></td>
<td style="text-align: center; padding: 15px;" width="238">One Year Contract; Half-yearly payment in advance, subsequent invoices will be generated on half yearly advance basis hereafter</td>
<td style="text-align: center; padding: 15px;" width="97">√</td>
<td style="text-align: center; padding: 15px;" width="154">√</td>
</tr>
<tr>
<td style="text-align: center; padding: 15px;" width="122"><strong>1 year (100% Advance)</strong></td>
<td style="text-align: center; padding: 15px;" width="238">One Year Contract; Total payment for the contract period in full</td>
<td style="text-align: center; padding: 15px;" width="97">√</td>
<td style="text-align: center; padding: 15px;" width="154">√</td>
</tr>
<tr>
<td style="text-align: center; padding: 15px;" width="122"><strong>2 years (100% Advance)</strong></td>
<td style="text-align: center; padding: 15px;" width="238">Two Year Contract; Total payment for the contract period in full</td>
<td style="text-align: center; padding: 15px;" width="97">√</td>
<td style="text-align: center; padding: 15px;" width="154">√</td>
</tr>
<tr>
<td style="text-align: center; padding: 15px;" width="122"><strong>3 years (100% Advance)</strong></td>
<td style="text-align: center; padding: 15px;" width="238">Three Year Contract; Total payment for the contract period in full</td>
<td style="text-align: center; padding: 15px;" width="97">√</td>
<td style="text-align: center; padding: 15px;" width="154">√</td>
</tr>
</tbody>
</table>
<p></p>
<pagebreak />
<h3><b>7. Taxes </b></h3><br>
<p style="text-align: justify; color:black;">All the products, services and other infrastructure purchased by customer or any other recipient shall be exclusive of any taxes. All products and/or services shall attract applicable taxes, with respect to Indian Tax regulations.</p><br>
<h3><b>8. Cancellation &amp; refund policy (Cloud Products)</b></h3><br>
<p style="text-align: justify; color:black;">Customers may cancel the order at any time by emailing on support@pidatacenters.com, along with their order number. This is exclusively applicable for cloud products. The cancellation would be effective in 24 hour working hours from the time of receipt of valid cancellation request. Unless otherwise agreed in written between customer and Pi, total amount shall be refunded, if the cancellation request is placed within 24 hours from order placement. 50% of the paid amount shall be refunded, if the cancellation request is placed after 24 hours but within 48 hours from order placement. Cancellation would not warrant any refund if done in more than 48 hours of order placement or post deployment of the in-scope infrastructure, whichever is earlier. Any cancellation of order placement would be eligible for interest free refund within 7 working days from the date of valid cancellation request by customer. Pi holds the discretion to cancel the order without any notice, and/or de-provision the in-scope product(s), in the scenario of non-payment by the customer within a maximum period of 48 hours of new order placement and/or renewal, and/or if the purpose is found to be malicious and/or illegal as per the law of the land.</p><br>
<h3><b>9. Contract Cancellation Policy (Non-Cloud Products)</b></h3><br>
<p style="text-align: justify; color:black;">Minimum contract period for any services / products, other than cloud products shall be of 1 year, from the date of order placement. In case of enterprise servers, dedicated physical servers, high-end servers, network devices, firewalls, switches and/or any other infrastructure that needs bare-metal machines to be procured & provisioned, any contract being cancelled by the customer, the cancelling party would be liable to remit value equivalent to the total contract period or the remaining contract value, whichever is less, in favour of Pi.</p>
<p style="text-align: justify; color:black;"><br>
Pi holds the discretion to cancel the order without any notice, and/or de-provision the in-scope product(s), in the scenario of non-payment by the customer within a maximum period of 48 hours of new order placement and/or renewal, and/or if the purpose is found to be malicious and/or illegal as per the law of the land.
</p><br>
<pagebreak />
<h3><b>10. Warranty</b></h3><br>
<p style="text-align: justify; color:black;">The information and materials contained in this site, including text, graphics, links or other items – are provided “as is,” “as available”. Pi does not warrant the accuracy, adequacy or completeness of the information and materials and expressly disclaims liability for errors or omissions therein. No warranties of any kind, implied, express or statutory, including but not limited to the warranties of non-infringement of third party rights, title, merchantability, fitness for a particular purpose and freedom from computer virus, are given in conjunction with the information and materials.</p><br><br>
<h3><b>11. Exclusion of Liability</b></h3><br>
<p style="text-align: justify; color:black;">In no event will Pi be liable for any damages, including without limitation direct or indirect, special, incidental, or consequential damages, losses or expenses arising in connection with this site or use thereof or inability to use by any party, or reliance on the contents of this site, or in connection with any failure of performance, error, omission, interruption, defect, delay or failure in operation or transmission, computer virus or line or system failure, even if Pi, its representatives, are advised of the possibility of such damages, losses or expense, hyperlinks to other internet resources are at your own risk; the content, accuracy, opinions expressed, and other links provided by these resources are not investigated, verified, monitored, or endorsed by Pi. This Exclusion clause shall take effect to the fullest extent permitted by law.</p><br>

<h3><b>12. Submission</b></h3><br>
<p style="text-align: justify; color:black;">All information submitted to Pi via this site shall be deemed and remain the property of Pi who shall be free to use, for any purpose, any ideas, concepts, know-how or techniques contained in information a visitor to this site provides Pi through this site. Pi shall not be subject to any obligations of confidentiality or privacy regarding submitted information except as agreed by the Pi or as otherwise specifically agreed or required by law.</p><br>
<h3><b>13. Variation</b></h3><br>
<p style="text-align: justify; color:black;">These terms are subject to change and can be modified at any time without notice. Pi reserves its own authority to modify the content at its own consent.</p><br>
<pagebreak />
<h3><b>14. Governing law &amp; Jurisdiction</b></h3><br>
<p style="text-align: justify; color:black;">By accessing this website and obtaining the facilities, products or services offered through this website, you agree that the laws of State of Andhra Pradesh in India shall govern such access and the provision of such facilities, products and services and you agree that any legal action or proceedings related to or arising out of this Terms and Conditions shall be settled in the courts and/or tribunals in Vijayawada in the state of Andhra Pradesh in India.</h3><br>

<h3><b>15.	Miscellaneous</b></h3>
<table style="height: 81px;" >
<tbody>
<tr style="background:none !important;">
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">i.</td>
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">Without the prior written consent of Pi, the customer agrees not to issue or release any articles, advertising, publicity or other material relating to any of Pi’s infrastructure or mentioning or implying the name of Pi, except as may be required by law and then only after providing Pi with an opportunity to review and comment thereon.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">ii.</td>
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">This Terms &#038; Conditions shall remain in effect until it is terminated by Pi. Subject to this document shall survive any such termination with respect to infrastructure that is disclosed prior to the effective date of termination. Customer will use the infrastructure only for the purpose of their businesses in good faith, bound by law.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">iii.</td>
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">No license or conveyance of any rights under any patent, copyright, trade secret, trademark or any other intellectual property right is granted under this document except the limited rights necessary to carry out the purpose as set forth in this section.</td>
</tr>
<tr>
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">iv.</td>
<td style="padding: 10px;text-align: justify; color:black;vertical-align: top;">The obligations and duties imposed by this document with respect to any information related to infrastructure provided by Pi, may be enforced by Pi of such Information against requestor or requestor’s recipients of such Information. All terms and provisions of this document will be binding upon requestor and their respective affiliates, and upon their respective successors and assigns. All additions or modifications to this document must be made in writing and must be signed by Pi and requestor. Pi and requestor agree that facsimile signatures will have the same legal effect as original signatures and may be used as evidence of execution.</td>
</tr>
</tbody>
</table>
            </div>
        </section>
</br>
 <p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">#This is an electronically generated document and does not require physical signature</span></p>
<!-- payment acknowledgement ends --> 
</div>


</div>


</div>


<!-- payment acknowledgement ends --> 

</div>

</div>

<!-- mart main ends -->

</body>
</html>';

				

					$mpdf=new mPDF('','A4', 0, '', 15, 15, 45, 35, 5, 10, '');
					$mpdf->SetDisplayMode('fullpage');
					
					$mpdf->SetHTMLFooter("<div style='width:95%; display: inline-block;'><hr></div><div style='width:95%; display: inline-block;'>
							<img style='border:3px solid white;' src='https://pidatacenters.com/priceimport/verify/invoice/images/lh_2.png'>
							</div>");
					
					$mpdf->pagenumPrefix = 'Page No : ';
					
					$mpdf->SetWatermarkImage('https://pidatacenters.com/pidata/images/new_watermark.png');
					$mpdf->showWatermarkImage = true;
					$mpdf->watermarkImageAlpha = 1.0;
					$mpdf->SetJS('this.print();');
					$mpdf->WriteHTML($stylesheet,1);
					$mpdf->WriteHTML($body,0);
					$mpdf->AddPage();
					$mpdf->SetHTMLFooter("<div style='width:95%;'><hr></div><table width='95%' style=' padding-bottom:25px;'>
					<tr>
						<td width='30%' align='left' style='font-size:12px;'>©2019 Pi DATACENTERS</td>
						<td width='40%' align='center' style='font-size:12px;'>
						<img style='margin-top:0px; vertical-align:middle;' src='https://pidatacenters.com/pidata/images/lock-icon.png'/>100 % Safe & Secure Payments</td>
						<td align='right' width='30%' style='font-style: italic;font-size:12px;'>{PAGENO}/{nbpg}</td>
					</tr>
					</table>");
					$mpdf->WriteHTML($tandc,2);
					$filename='invoice-'.$order_id;
					ob_end_flush();
					$mpdf->Output("$filename.pdf", "D");	

		}

	}
?>