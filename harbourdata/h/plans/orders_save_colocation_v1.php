<?php

session_start();
include('mysql.php');
include('payment-ack-download.php');

//include('payment-ack-download.php');
if(isset($_REQUEST['selectedcolocation']) && $_REQUEST['selectedcolocation']!='0' && $_REQUEST['selectedcolocation']!=''){




	$baseurl="https://pidatacenters.com/pidata";

	$tomailID='sales@pidatacenters.com';

	$a=mysqli_real_escape_string($mr_con,$_REQUEST['svname1']);

	$b=mysqli_real_escape_string($mr_con,$_REQUEST['svmob1']);

	$c=mysqli_real_escape_string($mr_con,$_REQUEST['emailll1']);

	$d=mysqli_real_escape_string($mr_con,$_REQUEST['copmans1']);

	$e=mysqli_real_escape_string($mr_con,$_REQUEST['selectedcolocation']);

	$sc_server1=mysqli_real_escape_string($mr_con,$_REQUEST['sc_server1']);
	$sc_power1=mysqli_real_escape_string($mr_con,$_REQUEST['sc_power1']);
	$sc_data1=mysqli_real_escape_string($mr_con,$_REQUEST['sc_data1']);
	$my_ip_num=mysqli_real_escape_string($mr_con,$_REQUEST['my_ip_num']);
	$rc_rack1=mysqli_real_escape_string($mr_con,$_REQUEST['rc_rack1']);

	$body='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

		<tr>

			<td align="center">

				<table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

					<tr>

						<td style="font-family:Arial, Helvetica, sans-serif;">

							<table align="center">

								<tr><td><img src="'.$baseurl.'/images/mail-logo.png" width="230"></td></tr>

							</table>

							<hr>

							<table cellpadding="10" width="100%">

								<tr>

									<td align="left">

										<p style="margin:0;padding:0;color:#262626; font-size:16px;line-height:23px;"><b>Dear Team,</b></p>

										<p style="margin:0;padding:0;line-height:30px;font-size:16px;color:#087100;text-indent:20px;">We have received a quote request from "'.$a.'"</p>

									</td>

								</tr>

								<tr>

									<td align="left">

										<p style="font-weight:600;margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;margin-bottom:5px;">Customer details</p>

										<p style="margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Name: </b>'.$a.'</p>

										<p style="margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;">Company name: '.$d.'</p>

										<p style="margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl.'/images/web.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;<a style="text-decoration:none !important;color#262626;">'.$c.'</a></p>

										<p style="margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl.'/images/telephone.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;+91 '.$b.'</p>

									</td>

								</tr>

								<tr>

									<td align="left">

										<p style="font-weight:600;margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;margin-bottom:5px;">Requested quote for</p>';

										
										
										if($e=='1'){
											$body.='<table style="padding-left:10px;" cellspacing="10px" width="100%">';

										$body.='<tr><td><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

										$body.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">CO-LOCATION</p>';

										$body.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">Server Co-location</p>';


											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Rack Space - '.$sc_server1.'</small></p>';

											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Power - '.$sc_power1.' Rated Power</small></p>';

											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer - '.$sc_data1.'</small></p>';

						

											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IP - '.$my_ip_num.' </small></p>';

											
										}else{

											$body.='<table style="padding-left:10px;" cellspacing="10px" width="100%">';

										$body.='<tr><td><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

										$body.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">CO-LOCATION</p>';

										$body.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">Rack Co-location</p>';


											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Rack Space - '.$rc_rack1.'</small></p>';

											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Power - '.$sc_power1.' Rated Power</small></p>';

											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer - '.$sc_data1.'</small></p>';

						

											$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IP - '.$my_ip_num.' </small></p>';
										}

										$body.='</td></tr></table><br>';

										

									$body.='</td>

</tr>
<tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is auto generated mail – please do not reply to it</span></p></td>
        </tr>

								
	</table>';

	//$to='sales@pidatacenters.com';
	//$to2=$c;
	$to='sales@pidatacenters.com,'.$c;
	$subject='Pi DATACENTERS - Get quote';
$from = 'no-reply@pidatacenters.com';
	$from_name = 'Quote Request @Pi™';
	$reply = 'sales@pidatacenters.com';
	$reply_name = 'Sales Pi';
	//$to = $row['username'];

	smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);
	//smtpmailer($to2, $from, $from_name,$reply,$reply_name, $subject, $body);



}

?>