<?php
require 'PHPMailer/PHPMailerAutoload.php';


date_default_timezone_set("Asia/Kolkata");

//$baseurl2 = "https://pidatacenters.com/";

$current_date_time=date("Y-m-d H:i:s");
function moneyFormatIndia($num){

	$explrestunits = "" ;

		if(strlen($num)>3){

			$lastthree = substr($num, strlen($num)-3, strlen($num));

			$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits

			$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.

			$expunit = str_split($restunits, 2);

			for($i=0; $i<sizeof($expunit); $i++){

				// creates each of the 2's group and adds a comma to the end

				if($i==0){$explrestunits .= (int)$expunit[$i].",";} // if is first value , convert into integer

				else{$explrestunits .= $expunit[$i].",";}

			}$thecash = $explrestunits.$lastthree;

		}else{$thecash = $num;}

	return $thecash.'.00'; // writes the final format where $currency is the currency symbol.

}


function smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body){
    $mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "sales@pidatacenters.com";
$mail->Password = "Hyderabad";                          // SMTP password
$mail->SMTPSecure = 'tls';   
$mail->Port = 587;                          // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);
$mail->AddBCC("sales@pidatacenters.com", "Sales Pi");

$mail->From = $from;
$mail->FromName =  $from_name;

$addresses = explode(',', $to);
foreach ($addresses as $address) {
    $mail->AddAddress($address);
}

//$mail->addAddress('sriram@pidatacenters.com');               // Name is optional
$mail->addReplyTo($reply, $reply_name);

$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body;
$mail->send();
}
function smtpmailerbcc_v2($to,$cc,$bcc, $from, $from_name,$reply,$reply_name, $subject, $body){
    $mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "sales@pidatacenters.com";
$mail->Password = "Hyderabad";                           // SMTP password
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;                          // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);
$mail->From = $from;
$mail->FromName =  $from_name;

//$mail->addAddress('sriram@pidatacenters.com');     // Add a recipient

$addresses = explode(',', $to);
foreach ($addresses as $address) {
    $mail->AddAddress($address);
}
if(strlen($cc)>4){
$addresses_cc = explode(',', $cc);
foreach ($addresses_cc as $address_cc) {
    if(strlen($address_cc)>4){
    $mail->addCC($address_cc);
}
}
}
if(strlen($bcc)>4){
$addresses_bcc = explode(',', $bcc);
foreach ($addresses_bcc as $address_bcc) {
    if(strlen($address_bcc)>4){
    $mail->AddBCC($address_bcc);
}
}
}

$mail->addReplyTo($reply, $reply_name);
$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->send();
}

function smtpmailerbcc($to, $from, $from_name,$reply,$reply_name, $subject, $body){
    $mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "sales@pidatacenters.com";
$mail->Password = "Hyderabad";                           // SMTP password
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;                          // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true);
//$mail->AddBCC("sales@pidatacenters.com", "Sales Pi");

$mail->From = $from;
$mail->FromName =  $from_name;
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

$addresses = explode(',', $to);
foreach ($addresses as $address) {
    $mail->AddAddress($address);
}

$BCC_recipients = "buvaragan@pidatacenters.com,shireesha.chintalapati@pidatacenters.com,kiranraja@pidatacenters.com"; // <---just an example
$arrBCC_recipients = explode(",", $BCC_recipients);
foreach ($arrBCC_recipients as $email2stuffInBCC) {
$mail->AddBcc($email2stuffInBCC);
}

//$mail->addAddress('sriram@pidatacenters.como');               // Name is optional
$mail->addReplyTo($reply, $reply_name);
$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->send();
}


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

function orderssss($orderalias){ global $mr_con; global $baseurl2;

$sql = "SELECT t1.order_id, t1.alias, t1.order_date, t1.order_by, t1.order_amount, t1.discount, t1.payment_mode, t1.payment_id, t1.trans_id, t1.request_id, t1.order_status, t2.fullname, t2.designation, t2.company_name, t2.industry, t2.addresstype, t2.address, t2.city, t2.state, t2.country, t2.pincode FROM lj_orders t1 INNER JOIN lj_order_address t2 ON t1.alias=t2.order_alias WHERE t1.alias='$orderalias'";

$result = mysqli_query($mr_con,$sql);

if($result){

$count = mysqli_num_rows($result);

if($count>'0'){

$row=mysqli_fetch_array($result);



$body.='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

	<tr>

		<td align="center">

			<table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

				<tr>

					<td style="font-family:Arial, Helvetica, sans-serif;">

                    	<table align="center">

                        	<tr><td style="text-align:center;"><img src="'.$baseurl2.'/images/mail-logo.png"></td></tr>

                        </table>

						<table cellpadding="7" width="100%" bgcolor="#12314e" style="color:#FFF;">

                        	<tr>

                            	<td align="center">

                                	<p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;">Hi '.alias($row['order_by'],'lj_logins','alias','name').'!</p>

                                    <p style="font-weight:800;Margin:0;padding:0">Thank you for choosing Pi...</p>

                                </td>

                            </tr>

                        </table>

						<table cellpadding="10" width="100%">

                        	<tr>

                            	<td align="center">

                                    <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;color:#087100">Your (Order ID: '.$row['order_id'].')</p>

                                    <p style="Margin:0;padding:0; color:#262626"><small>Placed on '.getproperdate($row['order_date']).'</small></p>

                                    <p style="position: absolute;Margin-left: 598px;Margin-top: -40px;">

                                    	<a href="'.$baseurl2.'/p/plans/prints.php?x='.$row['alias'].'" target="_blank" style="text-decoration:none;Margin-left:5px"><img src="'.$baseurl2.'/images/tool.png" width="26"></a>

                                        <a href="'.$baseurl2.'/p/plans/invoices.php?x='.$row['alias'].'" target="_blank" style="text-decoration:none;Margin-left:5px"><img src="'.$baseurl2.'/images/file.png" width="26"></a>

                                    </p>

                                </td>

                            </tr>

							<tr>

                            	<td align="left">

                                	<p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Customer details</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Name : </b>'.alias($row['order_by'],'lj_logins','alias','name').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Company name : </b>'.alias($row['order_by'],'lj_logins','alias','company').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/web.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;<a style="text-decoration:none !important;color#262626;">'.alias($row['order_by'],'lj_logins','alias','username').'</a></p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/telephone.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;+91 '.alias($row['order_by'],'lj_logins','alias','mobile_no').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:20px;"><img src="'.$baseurl2.'/images/gps.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;'.$row['address'].'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:32px;line-height:18px;">'.$row['city'].' - '.$row['pincode'].', '.$row['state'].', '.$row['country'].'.</p>

                                </td>

                            </tr>

							<tr>

                            	<td align="left">

                                	<p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Order summary</p>';

										$prvisioned_date=findfimepro($row['alias']);

										if($prvisioned_date=='1')$prvisioned_date=$prvisioned_date." Day";

										elseif($prvisioned_date>'1')$prvisioned_date=$prvisioned_date." Days";

										else $prvisioned_date='soon';

										$gdtodat=0;
                    $otc=0;

										$sqlw = "SELECT  t3.plan_id, t3.ram, t3.cpu_cores,t3.data_transfer, t3.disk_space, t3.backup, t3.iops, t3.drive,t3.server1, t3.power, t3.selectedOs, t3.db,t3.months,t3.price,t3.quantity, t3.plan_amount,t3.otc FROM lj_selected_plans1 t3 WHERE t3.order_id='".$row['alias']."'";

										$resultw = mysqli_query($mr_con,$sqlw);$ract=1;

										while($roww=mysqli_fetch_array($resultw)){
                      $otc+=$roww['otc'];

										$gdtodat+=($roww['plan_amount']+$roww['otc']);

										$sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

										$result123 = mysqli_query($mr_con,$sqlserver);
										$row321=mysqli_fetch_array($result123);


										$body.='<table style="padding-left:10px;" cellspacing="10px" width="100%">';

										$body.='<tr><td width="30"><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

										$body.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">'.$row321['plan'].'</p>';


										$body.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">'.$row321['subplan'].'</p>';

										
										
										
										if($roww['ram']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Ram: '.$roww['ram'].' GB</small></p>';
										if($roww['cpu_cores']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>CPU: '.$roww['cpu_cores'].' Cores</small></p>';
										if($roww['data_transfer']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer: '.$roww['data_transfer'].' GB</small></p>';
										if($roww['disk_space']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Disk Space: '.$roww['disk_space'].' GB</small></p>';
										if($roww['backup']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Backup: '.$roww['backup'].' GB</small></p>';
										if($roww['iops']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IPs: '.$roww['iops'].'</small></p>';
										if($roww['drive']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Drive: '.$roww['drive'].'</small></p>';
										if($roww['server1']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Server: '.$roww['server1'].' U</small></p>';
										if($roww['power']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Power: '.$roww['power'].' KVA</small></p>';
										if($roww['selectedOs']!=='' && $roww['selectedOs']!=='0' && $roww['selectedOs']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>OS: '.$roww['selectedOs'].'</small></p>';
										//if($roww['db']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$roww['db'].'</small></p>';

										//if($roww['db']=="MS SQL Enterprise*" || $roww['db']=="MS SQL Standard*"){
      //$dbtext = "2 core license cost included";
     // $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>*2 core license cost included</small></p>';
 // }

 if($roww['db']!=='' && $roww['db']!=='0' && $roww['db']>'0'){                

                    if($roww['db']=="MS SQL Enterprise*"){
                      $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Enterprise<font color="red">*</font></small></p>';
                      $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
                  
                    }else if($roww['db']=="MS SQL Standard*"){

                     $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Standard<font color="red">*</font></small></p>';
                     
                    $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }else if($roww['db']=="MS SQL Web*"){

                     $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Web<font color="red">*</font></small></p>';
                     
                    $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }
                   
                  else{
                      $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$roww['db'].'</small></p>';
                  }
              }
										if($roww['quantity']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Quantity: '.$roww['quantity'].'</small></p>';
										if($roww['months']>'0')if($roww['months']=='1'){$tenure= "Monthly";}
                       else if($roww['months']=='3'){
                        $tenure= "1 year (Quarterly Advance)";

                       }else if($roww['months']=='6'){
                        $tenure= "1 year (50% Advance)";
                       }else if($roww['months']=='12'){
                        $tenure= "1 year (100% Advance)";
                      }else if($roww['months']=='24'){
                        $tenure= "2 year (100% Advance)";
                      }else if($roww['months']=='36'){
                        $tenure= "3 year (100% Advance)";
                      }
										$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Tenure: '.$tenure.' </small></p><br>';
										
                   if($roww['months']==1){$terms = "Total bill is for first month only. Subsequent invoices will be generated on monthly basis hereafter. Unless there is a cancellation.";}
                   else if($roww['months']==3){$terms = "Total bill is for first quarter only. Subsequent invoices will be generated on quarterly basis hereafter.";}
                   else if($roww['months']==6){$terms = "Total bill is for first six months only. Subsequent invoices will be generated on half yearly basis hereafter.";} 
                   else if($roww['months']==12){$terms = "Total bill is for the period of one year in full.";}
                   else if($roww['months']==24){$terms = "Total bill is for the period of two year in full.";}
                   else if($roww['months']==36){$terms = "Total bill is for the period of three year in full.";}


                  // $body.='<label style="color: #20641b;font-weight: bold;font-size: 14px;}" class="myterms123">'.$terms.' </label>';
                   
										$body.='<p style="Margin:0;padding:0;line-height:20px;color:#20641b;text-indent:14px; font-weight: bold"><small>'.$terms.' </small></p><br>';

										

										
										//$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Rs   '.$roww['price'].' / GB / Month</small></p>';

										$body.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Price: Rs '.moneyFormatIndia($roww['plan_amount']).'</span></p>';

										$body.='</td></tr></table><br>';$ract++;

										}

										$discount_para = "";
if($row['discount']>0){
	$discount_para = '
	<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Discount: Rs '.moneyFormatIndia((int)$row['discount']).'</span></p>';


}
                    $body.= $discount_para.'<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">OTC: Rs '.moneyFormatIndia((int)($otc)).'</span></p>';

										$body.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">GST (18%): Rs '.moneyFormatIndia((int)(($gdtodat-(int)$row['discount'])*0.18)).'</span></p>';
										$payment_mode_text='';
										if($row['payment_mode']=='offline'){

$payment_mode_text = '<p style="Margin:10px;Margin-top:-20px;padding:10px 15px;color:#087100;">Invoice for the order placed would be sent to you by next working day</p>';
}
                                   $body.='<table width="100%" cellpadding="10px" style="Margin-top:20px">

										<tr>

											<td style="border-top:1px solid #ccc;" align="right">

												<table height="40" width="200" bgcolor="#12314e" align="right">

													<tr>

														<td valign="middle" align="center">

															<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#fff;"><span style="background:#12314e;line-height:40px;">Grand total: Rs '.moneyFormatIndia($row['order_amount']).'/-</span></p>

														</td>

													</tr>

												</table>

											</td>

										</tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                            	<td align="center">'.$payment_mode_text.'


                                	<p style="Margin:10px;Margin-top:-20px;padding:10px 15px;color:#087100;">Our team would reach out, to help you implement the solution!</p>

									<table height="40" width="100" bgcolor="#087100" align="center">

										<tr>

											<td valign="middle" align="center">

												<a href="'.$baseurl2.'/contact.php?a='.$row['order_by'].'" style="background:#087100; color:#FFF;text-decoration:none;display:block;line-height:38px;">CONTACT</a>  

											</td>

										</tr>

									</table><br>

									<p style="Margin:0;padding:0;line-height:20px;color:#262626;display:block;width:600px;word-wrap:break-word;"><small>We are committed to deliver to you best in class solutions, through our state-of-the-art datacenter and cloud infrastructure, backed by support teams with industry expertise.</small></p>

                                	<p style="Margin:0;padding:0;line-height:20px;color:#262626;"><small><b>Let us architect together!!</b></small></p><br>

                                </td>

                            </tr>


                        </table>

                    </td>

				</tr>

                <tr>

                	<td><p align="center">©2017 Pi DATACENTERS</p><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

			</table>

		</td>

	</tr>
	<tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>

</table>';

$body3.='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

  <tr>

    <td align="center">

      <table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

        <tr>

          <td style="font-family:Arial, Helvetica, sans-serif;">

                      <table align="center">

                          <tr><td style="text-align:center;"><img src="'.$baseurl2.'/images/mail-logo.png"></td></tr>

                        </table>

            <table cellpadding="7" width="100%" bgcolor="#12314e" style="color:#FFF;">

                          <tr>

                              <td align="center">
                              <p style="font-size:18px;"><b>Dear Team,</b></p>

                                  
                                    <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;">We have received a request from '.alias($row['order_by'],'lj_logins','alias','name').' for the below plan</p>

                                </td>

                            </tr>

                        </table>

            <table cellpadding="10" width="100%">

                          <tr>

                              <td align="center">

                                    <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;color:#087100">(Order ID: '.$row['order_id'].')</p>

                                    <p style="Margin:0;padding:0; color:#262626"><small>Placed on '.getproperdate($row['order_date']).'</small></p>

                                    <p style="position: absolute;Margin-left: 598px;Margin-top: -40px;">

                                      <a href="'.$baseurl2.'/p/plans/prints.php?x='.$row['alias'].'" target="_blank" style="text-decoration:none;Margin-left:5px"><img src="'.$baseurl2.'/images/tool.png" width="26"></a>

                                        <a href="'.$baseurl2.'/p/plans/invoices.php?x='.$row['alias'].'" target="_blank" style="text-decoration:none;Margin-left:5px"><img src="'.$baseurl2.'/images/file.png" width="26"></a>

                                    </p>

                                </td>

                            </tr>

              <tr>

                              <td align="left">

                                  <p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Customer details</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Name : </b>'.alias($row['order_by'],'lj_logins','alias','name').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Company name : </b>'.alias($row['order_by'],'lj_logins','alias','company').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/web.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;<a style="text-decoration:none !important;color#262626;">'.alias($row['order_by'],'lj_logins','alias','username').'</a></p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/telephone.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;+91 '.alias($row['order_by'],'lj_logins','alias','mobile_no').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:20px;"><img src="'.$baseurl2.'/images/gps.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;'.$row['address'].'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:32px;line-height:18px;">'.$row['city'].' - '.$row['pincode'].', '.$row['state'].', '.$row['country'].'.</p>';
                                    if($row['payment_mode']=='offline'){

$payment_mode_text = '<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:32px;line-height:18px;">Payment mode - Offline</p>';
}else{
 $payment_mode_text = '<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:32px;line-height:18px;">Payment mode - Online</p>';
 
}

                                    $body3.=$payment_mode_text;

                                $body3.='</td>

                            </tr>

              <tr>

                              <td align="left">

                                  <p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Order summary</p>';

                    $prvisioned_date=findfimepro($row['alias']);

                    if($prvisioned_date=='1')$prvisioned_date=$prvisioned_date." Day";

                    elseif($prvisioned_date>'1')$prvisioned_date=$prvisioned_date." Days";

                    else $prvisioned_date='soon';

                    $gdtodat=0;
                    $otc=0;

                    $sqlw = "SELECT  t3.plan_id, t3.ram, t3.cpu_cores,t3.data_transfer, t3.disk_space, t3.backup, t3.iops, t3.drive,t3.server1, t3.power, t3.selectedOs, t3.db,t3.months,t3.price,t3.quantity, t3.plan_amount,t3.otc FROM lj_selected_plans1 t3 WHERE t3.order_id='".$row['alias']."'";

                    $resultw = mysqli_query($mr_con,$sqlw);$ract=1;

                    while($roww=mysqli_fetch_array($resultw)){
                      $otc+=$roww['otc'];

                    $gdtodat+=($roww['plan_amount']+$roww['otc']);

                    $sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

                    $result123 = mysqli_query($mr_con,$sqlserver);
                    $row321=mysqli_fetch_array($result123);


                    $body3.='<table style="padding-left:10px;" cellspacing="10px" width="100%">';

                    $body3.='<tr><td width="30"><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

                    $body3.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">'.$row321['plan'].'</p>';


                    $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">'.$row321['subplan'].'</p>';

                    
                    
                    
                    if($roww['ram']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Ram: '.$roww['ram'].' GB</small></p>';
                    if($roww['cpu_cores']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>CPU: '.$roww['cpu_cores'].' Cores</small></p>';
                    if($roww['data_transfer']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer: '.$roww['data_transfer'].' GB</small></p>';
                    if($roww['disk_space']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Disk Space: '.$roww['disk_space'].' GB</small></p>';
                    if($roww['backup']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Backup: '.$roww['backup'].' GB</small></p>';
                    if($roww['iops']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IPs: '.$roww['iops'].'</small></p>';
                    if($roww['drive']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Drive: '.$roww['drive'].'</small></p>';
                    if($roww['server1']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Server: '.$roww['server1'].' U</small></p>';
                    if($roww['power']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Power: '.$roww['power'].' KVA</small></p>';
                   if($roww['selectedOs']!=='' && $roww['selectedOs']!=='0' && $roww['selectedOs']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>OS: '.$roww['selectedOs'].'</small></p>';
                    

 if($roww['db']!=='' && $roww['db']!=='0' && $roww['db']>'0'){                

                    if($roww['db']=="MS SQL Enterprise*"){
                      $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Enterprise<font color="red">*</font></small></p>';
                      $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
                  
                    }else if($roww['db']=="MS SQL Standard*"){

                     $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Standard<font color="red">*</font></small></p>';
                     
                    $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }
                    else if($roww['db']=="MS SQL Web*"){

                     $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Web<font color="red">*</font></small></p>';
                     
                    $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }
                   
                  else{
                      $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$roww['db'].'</small></p>';
                  }
              }
                    if($roww['quantity']>'0')$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Quantity: '.$roww['quantity'].'</small></p>';
                    if($roww['months']>'0')if($roww['months']=='1'){$tenure= "Monthly";}
                       else if($roww['months']=='3'){
                        $tenure= "1 year (Quarterly Advance)";

                       }else if($roww['months']=='6'){
                        $tenure= "1 year (50% Advance)";
                       }else if($roww['months']=='12'){
                        $tenure= "1 year (100% Advance)";
                      }else if($roww['months']=='24'){
                        $tenure= "2 year (100% Advance)";
                      }else if($roww['months']=='36'){
                        $tenure= "3 year (100% Advance)";
                      }
                    $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Tenure: '.$tenure.' </small></p><br>';
                    
                   if($roww['months']==1){$terms = "Total bill is for first month only. Subsequent invoices will be generated on monthly basis hereafter. Unless there is a cancellation.";}
                   else if($roww['months']==3){$terms = "Total bill is for first quarter only. Subsequent invoices will be generated on quarterly basis hereafter.";}
                   else if($roww['months']==6){$terms = "Total bill is for first six months only. Subsequent invoices will be generated on half yearly basis hereafter.";} 
                   else if($roww['months']==12){$terms = "Total bill is for the period of one year in full.";}
                   else if($roww['months']==24){$terms = "Total bill is for the period of two year in full.";}
                   else if($roww['months']==36){$terms = "Total bill is for the period of three year in full.";}


                  // $body3.='<label style="color: #20641b;font-weight: bold;font-size: 14px;}" class="myterms123">'.$terms.' </label>';
                   
                    $body3.='<p style="Margin:0;padding:0;line-height:20px;color:#20641b;text-indent:14px; font-weight: bold"><small>'.$terms.' </small></p><br>';

                    

                    
                    //$body3.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Rs   '.$roww['price'].' / GB / Month</small></p>';

                    $body3.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Price: Rs '.moneyFormatIndia($roww['plan_amount']).'</span></p>';

                    $body3.='</td></tr></table><br>';$ract++;

                    }

                    if($row['discount']>0){
	$discount_para = '
	<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Discount: Rs '.moneyFormatIndia((int)$row['discount']).'</span></p>';


}
                    $body3.=$discount_para.'<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">OTC: Rs '.moneyFormatIndia((int)($otc)).'</span></p>';

                    $body3.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">GST (18%): Rs '.moneyFormatIndia((int)(($gdtodat-(int)$row['discount'])*0.18)).'</span></p>';
                    $payment_mode_text='';
                    if($row['payment_mode']=='offline'){

$payment_mode_text = '<p style="Margin:10px;Margin-top:-20px;padding:10px 15px;color:#087100;">Invoice for the order placed would be sent to you by next working day</p>';
}
                                   $body3.='<table width="100%" cellpadding="10px" style="Margin-top:20px">

                    <tr>

                      <td style="border-top:1px solid #ccc;" align="right">

                        <table height="40" width="200" bgcolor="#12314e" align="right">

                          <tr>

                            <td valign="middle" align="center">

                              <p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#fff;"><span style="background:#12314e;line-height:40px;">Grand total: Rs '.moneyFormatIndia($row['order_amount']).'/-</span></p>

                            </td>

                          </tr>

                        </table>

                      </td>

                    </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                              <td align="center">


                                  <p style="Margin:10px;Margin-top:-20px;padding:10px 15px;color:#087100;">Please review the order for delivery</p>

                  <table height="40" width="100" bgcolor="#087100" align="center">

                    <tr>

                      <td valign="middle" align="center">

                        <a href="'.$baseurl2.'/contact.php?a='.$row['order_by'].'" style="background:#087100; color:#FFF;text-decoration:none;display:block;line-height:38px;">CONTACT</a>  

                      </td>

                    </tr>

                  </table><br>

                  <p style="Margin:0;padding:0;line-height:20px;color:#262626;display:block;width:600px;word-wrap:break-word;"><small>We are committed to deliver to you best in class solutions, through our state-of-the-art datacenter and cloud infrastructure, backed by support teams with industry expertise.</small></p>

                                  <p style="Margin:0;padding:0;line-height:20px;color:#262626;"><small><b>Let us architect together!!</b></small></p><br>

                                </td>

                            </tr>


                        </table>

                    </td>

        </tr>

                <tr>

                  <td><p align="center">©2017 Pi DATACENTERS</p><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

      </table>

    </td>

  </tr>
  <tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>

</table>';


$body1.='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

	<tr>

		<td align="center">

			<table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

				<tr>

					<td style="font-family:Arial, Helvetica, sans-serif;">

                    	<table align="center">

                        	<tr><td style="text-align:center;"><img src="'.$baseurl2.'/images/mail-logo.png"></td></tr>

                        </table>

						<table cellpadding="10" width="100%">

                        	<tr>

                            	<td align="center">

								<p style="font-size:18px;"><b>Dear Team,</b></p>

								<p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:16px;color:#087100">We have received a request from "'.alias($row['order_by'],'lj_logins','alias','name').'" for the below plan</p>

                                    <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;color:#087100">Order ID: '.$row['order_id'].'</p>

                                    <p style="Margin:0;padding:0; color:#262626"><small>Placed on '.getproperdate($row['order_date']).'</small></p>

                                </td>

                            </tr>

							<tr>

                            	<td align="left">

                                	<p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Customer details</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Name: </b>'.alias($row['order_by'],'lj_logins','alias','name').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Company name: </b>'.alias($row['order_by'],'lj_logins','alias','company').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/web.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;<a style="text-decoration:none !important;color#262626;">'.alias($row['order_by'],'lj_logins','alias','username').'</a></p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/telephone.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;+91 '.alias($row['order_by'],'lj_logins','alias','mobile_no').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:20px;"><img src="'.$baseurl2.'/images/gps.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;'.$row['address'].'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:32px;line-height:18px;">'.$row['city'].' - '.$row['pincode'].', '.$row['state'].', '.$row['country'].'.</p>

                                </td>

                            </tr>

							<tr>

                            	<td align="left">

                                	<p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Payment details</p>';

									if($row['payment_mode']!='offline'){

										$body1.='<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Payment Mode: </b>'.$row['payment_mode'].'</p>

										<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Payment Date: </b>'.getproperdate($row['order_date']).'</p>

										<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Payment ID: </b>'.$row['payment_id'].'</p>

										<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Transaction ID: </b>'.$row['trans_id'].'</p>

										<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Request ID: </b>'.$row['request_id'].'</p>';

									}else{

										$body1.='<p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Payment Mode: </b>'.$row['payment_mode'].'</p>';

									}

                                $body1.='</td>

                            </tr>

							<tr>

                            	<td align="left">

                                	<p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Order summary</p>';

										$prvisioned_date=findfimepro($row['alias']);

										if($prvisioned_date=='1')$prvisioned_date=$prvisioned_date." Day";

										elseif($prvisioned_date>'1')$prvisioned_date=$prvisioned_date." Days";

										else $prvisioned_date='soon';

										$gdtodat=0;

										$sqlw = "SELECT  t3.plan_id, t3.ram, t3.cpu_cores, t3.price, t3.iops, t3.data_transfer, t3.disk_space, t3.selectedOs, t3.months, t3.plan_amount FROM lj_selected_plans1 t3 WHERE t3.order_id='".$row['alias']."'";

										$resultw = mysqli_query($mr_con,$sqlw);$ract=1;

										while($roww=mysqli_fetch_array($resultw)){

										$gdtodat+=$roww['plan_amount'];

										$body1.='<table style="padding-left:10px;" cellspacing="10px" width="100%"><tr><td width="30"><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

										$body1.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">Cloud Hosting</p>';

										

										$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">Cloud Server</p>';

										
										if($roww['months']>'0')if($roww['months']=='1'){$tenure= "Monthly";}
                       else if($roww['months']=='3'){
                        $tenure= "1 year (Quarterly Advance)";

                       }else if($roww['months']=='6'){
                        $tenure= "1 year (50% Advance)";
                       }else if($roww['months']=='12'){
                        $tenure= "1 year (100% Advance)";
                      }else if($roww['months']=='24'){
                        $tenure= "2 year (100% Advance)";
                      }else if($roww['months']=='36'){
                        $tenure= "3 year (100% Advance)";
                      }
										$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Tenure: '.$tenure.' </small></p>';

										
										if($roww['ram']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Ram: '.$roww['ram'].'</small></p>';


										//$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Rs   '.$roww['price'].' / GB / Month</small></p>';

										$body1.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Price: Rs '.$roww['plan_amount'].'</span></p>';

										$body1.='</td></tr></table><br>';$ract++;

										}

                                   $body1.='<table width="100%" cellpadding="10px" style="Margin-top:20px">

										<tr>

											<td style="border-top:1px solid #ccc;" align="right">

												<table height="40" width="200" bgcolor="#12314e" align="right">

													<tr>

														<td valign="middle" align="center">

															<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#fff;"><span style="background:#12314e;line-height:40px;">Grand total: Rs '.moneyFormatIndia($gdtodat).'/-</span></p>

														</td>

													</tr>

												</table>

											</td>

										</tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                            	<td align="center">

                                	<p style="Margin:0;padding:0;line-height:20px;color:#262626;">Please share the opportunity with the product and delivery team for their review.</p>

									<p style="Margin:0;padding:0;line-height:20px;color:#262626;"><small>The sales owner should track this opportunity to closure.</small></p>

                                </td>

                            </tr>

                        </table>

                    </td>

				</tr>

                <tr>

                	<td><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

			</table>

		</td>

	</tr>
	<tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>

</table>';
$body2.='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

  <tr>

    <td align="center">

      <table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

        <tr>

          <td style="font-family:Arial, Helvetica, sans-serif;">

                      <table align="center">

                          <tr><td style="text-align:center;"><img src="'.$baseurl2.'/images/mail-logo.png"></td></tr>

                        </table>

            <table cellpadding="7" width="100%" bgcolor="#12314e" style="color:#FFF;">

                          <tr>

                              <td align="center">
                              <p style="font-size:18px;"><b>Dear Team,</b></p>

                                  <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;">We have received a request from '.alias($row['order_by'],'lj_logins','alias','name').' for the below plan</p>

                                    

                                </td>

                            </tr>

                        </table>

            <table cellpadding="10" width="100%">

                          <tr>

                              <td align="center">

                                    <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;color:#087100">Your (Order ID: '.$row['order_id'].')</p>

                                    <p style="Margin:0;padding:0; color:#262626"><small>Placed on '.getproperdate($row['order_date']).'</small></p>

                                    <p style="position: absolute;Margin-left: 598px;Margin-top: -40px;">

                                      <a href="'.$baseurl2.'/p/plans/prints.php?x='.$row['alias'].'" target="_blank" style="text-decoration:none;Margin-left:5px"><img src="'.$baseurl2.'/images/tool.png" width="26"></a>

                                        <a href="'.$baseurl2.'/p/plans/invoices.php?x='.$row['alias'].'" target="_blank" style="text-decoration:none;Margin-left:5px"><img src="'.$baseurl2.'/images/file.png" width="26"></a>

                                    </p>

                                </td>

                            </tr>

              <tr>

                              <td align="left">

                                  <p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Customer details</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Name : </b>'.alias($row['order_by'],'lj_logins','alias','name').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Company name : </b>'.alias($row['order_by'],'lj_logins','alias','company').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/web.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;<a style="text-decoration:none !important;color#262626;">'.alias($row['order_by'],'lj_logins','alias','username').'</a></p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/telephone.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;+91 '.alias($row['order_by'],'lj_logins','alias','mobile_no').'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:20px;"><img src="'.$baseurl2.'/images/gps.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;'.$row['address'].'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:32px;line-height:18px;">'.$row['city'].' - '.$row['pincode'].', '.$row['state'].'.</p>

                                </td>

                            </tr>

              <tr>

                              <td align="left">

                                  <p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Order summary</p>';

                    $prvisioned_date=findfimepro($row['alias']);

                    if($prvisioned_date=='1')$prvisioned_date=$prvisioned_date." Day";

                    elseif($prvisioned_date>'1')$prvisioned_date=$prvisioned_date." Days";

                    else $prvisioned_date='soon';

                    $gdtodat=0;

                    $sqlw = "SELECT  t3.plan_id, t3.ram, t3.cpu_cores,t3.data_transfer, t3.disk_space, t3.backup, t3.iops, t3.drive,t3.server1, t3.power, t3.selectedOs, t3.db,t3.months,t3.price,t3.quantity, t3.plan_amount FROM lj_selected_plans1 t3 WHERE t3.order_id='".$row['alias']."'";

                    $resultw = mysqli_query($mr_con,$sqlw);$ract=1;

                    while($roww=mysqli_fetch_array($resultw)){

                    $gdtodat+=$roww['plan_amount'];

                    $sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

                    $result123 = mysqli_query($mr_con,$sqlserver);
                    $row321=mysqli_fetch_array($result123);


                    $body2.='<table style="padding-left:10px;" cellspacing="10px" width="100%">';

                    $body2.='<tr><td width="30"><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

                    $body2.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">'.$row321['plan'].'</p>';


                    $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">'.$row321['subplan'].'</p>';

                    
                    
                    
                    if($roww['ram']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Ram: '.$roww['ram'].' GB</small></p>';
                    if($roww['cpu_cores']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>CPU: '.$roww['cpu_cores'].' Cores</small></p>';
                    if($roww['data_transfer']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer: '.$roww['data_transfer'].' GB</small></p>';
                    if($roww['disk_space']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Disk Space: '.$roww['disk_space'].'</small></p>';
                    if($roww['backup']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Backup: '.$roww['backup'].' GB</small></p>';
                    if($roww['iops']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IPs: '.$roww['iops'].'</small></p>';
                    if($roww['drive']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Drive: '.$roww['drive'].'</small></p>';
                    if($roww['server1']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Server: '.$roww['server1'].' U</small></p>';
                    if($roww['power']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Power: '.$roww['power'].' KVA</small></p>';
                    if($roww['selectedOs']!=='' && $roww['selectedOs']!=='0' && $roww['selectedOs']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>OS: '.$roww['selectedOs'].'</small></p>';
                  //  if($roww['db']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$roww['db'].'</small></p>';

                    //if($roww['db']=="MS SQL Enterprise*" || $roww['db']=="MS SQL Standard*"){
      //$dbtext = "2 core license cost included";
     // $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>*2 core license cost included</small></p>';
 // }

 if($roww['db']!=='' && $roww['db']!=='0' && $roww['db']>'0'){                

                    if($roww['db']=="MS SQL Enterprise*"){
                      $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Enterprise<font color="red">*</font></small></p>';
                      $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
                  
                    }else if($roww['db']=="MS SQL Standard*"){

                     $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Standard<font color="red">*</font></small></p>';
                     
                    $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }else if($roww['db']=="MS SQL Web*"){

                     $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Web<font color="red">*</font></small></p>';
                     
                    $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }
                   
                  else{
                      $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$roww['db'].'</small></p>';
                  }
              }
                    if($roww['quantity']>'0')$body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Quantity: '.$roww['quantity'].'</small></p>';
                    if($roww['months']>'0')if($roww['months']=='1'){$tenure= "Monthly";}
                       else if($roww['months']=='3'){
                        $tenure= "1 year (Quarterly Advance)";

                       }else if($roww['months']=='6'){
                        $tenure= "1 year (50% Advance)";
                       }else if($roww['months']=='12'){
                        $tenure= "1 year (100% Advance)";
                      }else if($roww['months']=='24'){
                        $tenure= "2 year (100% Advance)";
                      }else if($roww['months']=='36'){
                        $tenure= "3 year (100% Advance)";
                      }
                    $body2.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Tenure: '.$tenure.' </small></p><br>';
                    
                    $body2.='</td></tr></table><br>';$ract++;

                    }
                  //  $body2.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Service Tax (15%): Rs '.moneyFormatIndia((int)($gdtodat*0.18)).'</span></p>';
                    $payment_mode_text='';
                    if($row['payment_mode']=='offline'){

$payment_mode_text = '<p style="Margin:10px;Margin-top:-20px;padding:10px 15px;color:#087100;">Invoice for the order placed would be sent to you by next working day</p>';
}else{$payment_mode_123="online";}
                                   $body2.='<table width="100%" cellpadding="10px" style="Margin-top:20px">

                    <tr>

                      <td style="border-top:1px solid #ccc;" align="right">

                        

                      </td>

                    </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                              <td align="center">


                                  <p style="Margin:10px;Margin-top:-20px;padding:10px 15px;color:#087100;">Please review the order for delivery</p>

                  <table height="40" width="100" bgcolor="#087100" align="center">

                    <tr>

                      <td valign="middle" align="center">

                        <a href="'.$baseurl2.'/contact.php?a='.$row['order_by'].'" style="background:#087100; color:#FFF;text-decoration:none;display:block;line-height:38px;">CONTACT</a>  

                      </td>

                    </tr>

                  </table><br>

                  <p style="Margin:0;padding:0;line-height:20px;color:#262626;display:block;width:600px;word-wrap:break-word;"><small>We are committed to deliver to you best in class solutions, through our state-of-the-art datacenter and cloud infrastructure, backed by support teams with industry expertise.</small></p>

                                  <p style="Margin:0;padding:0;line-height:20px;color:#262626;"><small><b>Let us architect together!!</b></small></p><br>

                                </td>

                            </tr>


                        </table>

                    </td>

        </tr>

                <tr>

                  <td><p align="center">©2017 Pi DATACENTERS</p><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

      </table>

    </td>

  </tr>
  <tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>

</table>';



$to=alias($row['order_by'],'lj_logins','alias','username');

$subject='Order Confirmation Receipt -'.$row['order_id'];
$from = 'sales@pidatacenters.com';
	$from_name = 'Order Confirmation @Pi®';
	$reply = 'sales@pidatacenters.com';
	$reply_name = 'Sales Pi';

	//$to = $row['username'];

	//smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);
  //smtpmailer('sales@pidatacenters.com', $from, $from_name,$reply,$reply_name, $subject, $body3);
  $cc="";
$bcc="bidmanagement@pidatacenters.com,kvs.prakasa@pidatacenters.com";
  //$to = $row['username'];

  smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);
  smtpmailerbcc_v2('sales@pidatacenters.com',$cc,$bcc, $from, $from_name,$reply,$reply_name, $subject, $body3);

  

if($payment_mode_123=="online"){
 // smtpmailer('picloudadmin@pidatacenters.com,buvaragan@pidatacenters.com,shireesha.chintalapati@pidatacenters.com,kiranraja@pidatacenters.com', $reply, $from_name,$reply,$reply_name, $subject, $body2);
  smtpmailerbcc('picloudadmin@pidatacenters.com', $reply, $from_name,$reply,$reply_name, $subject, $body2);

  
}


}

}

}





function rregistering($orderalias){ global $mr_con; global $baseurl2;

$sql = "SELECT password, username,name FROM lj_logins WHERE alias='$orderalias'";

$result = mysqli_query($mr_con,$sql);

if($result){

$count = mysqli_num_rows($result);

if($count>'0'){

$row=mysqli_fetch_array($result);



$body='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

	<tr>

		<td align="center">

			<table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

				<tr>

					<td style="font-family:Arial, Helvetica, sans-serif;">

                    	

                    	<table align="center">

                        	<tr><td><img src="'.$baseurl2.'/images/mail-logo.png" width="230"></td></tr>

                        </table>

						<table cellpadding="7" width="100%" bgcolor="#12314e" style="color:#FFF;">

                        	<tr>

                            	<td align="center">

                                	<p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;">Hi '.$row['name'].'!</p>

                                    <p style="font-weight:800;Margin:0;padding:0">Welcome to Pi...</p>

                                </td>

                            </tr>

                        </table>

						<table cellpadding="10" width="100%">

							<tr>

                            	<td align="center">

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;line-height:23px;font-weight:600;">We sincerely thank you for choosing us, as your partner to innovate with.</p>

                                </td>

                            </tr>

                            <tr>

                                <td align="left">

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;line-height:23px;">Below are your login credentials, for you to proceed further with your carting.</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;line-height:23px;text-indent:15px;"><b>User Name:</b> '.$row['username'].'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;line-height:23px;text-indent:15px;"><b>Password:</b> '.$row['password'].'</p>

                                </td>

                            </tr>

                            <tr>

                                <td align="left">

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-align:justify; line-height:23px;">With an uncompromising approach towards our core values of Integrity, Ethical Standards and Mutual Respect, we are committed to deliver to you best in class solutions through our well laid support framework backed by teams with heterogeneous industry expertise.</p>

                                </td>

                            </tr>

                            <tr>

                                <td align="center">

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">For any further assistance, please reach out to us on</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">sales@pidatacenters.com</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">Or</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">Technical Support: +91 866 2845859</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">Business Support: 1800-3074-3282</p>

                                </td>

                            </tr>

	                        </table>

                            <p style="Margin:0;padding:0;color:#262626;line-height:30px;font-size:14px;" align="center"><b>Let us architect together!!</b></p><br>

	                        

                    </td>

				</tr>

                <tr>

                	<td><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

			</table>

		</td>

	</tr>
	<tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>

</table>';

$to=$row['username'];
$subject='Welcome to Pi...';
$from = 'sales@pidatacenters.com';
	$from_name = 'Registration @Pi® ';
	$reply = 'sales@pidatacenters.com';
	$reply_name = 'Sales Pi';
	//$to = $row['username'];

	smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);



}

}

}



function forgotpsd($orderalias){ global $mr_con; global $baseurl2;

$sql = "SELECT username,name FROM lj_logins WHERE alias='$orderalias'";

$result = mysqli_query($mr_con,$sql);

if($result){

$count = mysqli_num_rows($result);

if($count>'0'){

$row=mysqli_fetch_array($result);







$body='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

	<tr>

		<td align="center">

			<table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

				<tr>

					<td style="font-family:Arial, Helvetica, sans-serif;">

                    	<table align="center">

                        	<tr><td><img src="'.$baseurl2.'/images/mail-logo.png" width="230"></td></tr>

                        </table>

						<table cellpadding="7" width="100%" bgcolor="#12314e" style="color:#FFF;">

                        	<tr>

                            	<td align="center">

                                	<p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;">Hi '.$row['name'].'!!</p>

                                    

                                </td>

                            </tr>

                        </table>

						<table cellpadding="10" width="100%">

							<tr>

                            	<td align="center">

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;line-height:23px;font-weight:600;">We sincerely thank you for choosing us, as your partner to innovate with.</p>

                                </td>

                            </tr>

                            <tr>

                                <td align="left">

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;line-height:23px;">Your code for resetting the password to proceed with your carting @Pi<sup>&trade;</sup> is <b>'.alias($orderalias,'password_request','user_alias','codees').'</b>.</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;line-height:23px;"><small>Please enter this code on the page to proceed further.</small></p>

                                </td>

                            </tr>

                            <tr>

                                <td align="center">

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">For any further assistance, please reach out to us on</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">sales@pidatacenters.com</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">Or</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">Technical Support: +91 866 2845859</p>

                                    <p style="Margin:0;padding:0;color:#262626;line-height:18px;font-size:12px;">Business Support: 1800-3074-3282</p>


                                </td>

                            </tr>

	                        </table>

                            <p style="Margin:0;padding:0;color:#262626;line-height:30px;font-size:14px;" align="center"><b>Let us architect together!!</b></p><br>

	                        

                    </td>

				</tr>

                <tr>

                	<td><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

			</table>

		</td>

	</tr>
	<tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>

</table>';



$to=$row['username'];

$subject='Forgot Password Notification';
$from = 'sales@pidatacenters.com';
	$from_name = 'Forgot Password @Pi®';
	$reply = 'sales@pidatacenters.com';
	$reply_name = 'Sales Pi';
	//$to = $row['username'];

	smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);




}

}

}







function orderssss_save($orderalias,$acerdetf,$comp,$mob){ global $mr_con; global $baseurl2;

$sql = "SELECT t1.order_id, t1.alias, t1.order_date,  t1.discount, t1.order_by, t1.order_amount, t1.payment_mode, t1.order_status FROM lj_orders_saved t1 WHERE t1.alias='$orderalias'";

$result = mysqli_query($mr_con,$sql);

if($result){

$count = mysqli_num_rows($result);

if($count>'0'){

$row=mysqli_fetch_array($result);

$body='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">

	<tr>

		<td align="center">

			<table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">

				<tr>

					<td style="font-family:Arial, Helvetica, sans-serif;">

                    	<table align="center">

                        	<tr><td style="text-align:center;"><img src="'.$baseurl2.'/images/mail-logo.png"></td></tr>

                        </table>

						<table cellpadding="7" width="100%" bgcolor="#12314e" style="color:#FFF;">

                        	<tr>

                            	<td align="center">

                                	<p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;">Hi '.$acerdetf.'!</p>
                                  <p style="font-weight:800;Margin:0;padding:0"><a style="color:#FFF;text-decoration:underline;" href="'.$baseurl2.'/p/checkout1.php?a='.$orderalias.'">Click here to edit the order summary</a></p>

                                    

                                </td>

                            </tr>

                        </table>

						<table cellpadding="10" width="100%">

                        	<tr>

                            	<td align="center">

									<pstyle="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:14px;color:#087100">Your order saved successfully!</p>

                                    <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;color:#087100">Your (Request ID: '.$row['order_id'].')</p>

                                    

                                </td>

                            </tr>

							<tr>

                            	<td align="left">

                                	<p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Customer details</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Name: </b>'.$acerdetf.'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Company name: </b>'.$comp.'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/web.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;<a style="text-decoration:none !important;color#262626;">'.alias($row['order_by'],'lj_logins','alias','username').'</a></p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/telephone.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;+91 '.$mob.'</p>

                                </td>

                            </tr>

							<tr>

                            	<td align="left">

                                	<p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Order summary</p>';

										$gdtodat=0;

										$sqlw = "SELECT  * FROM lj_saved_plans1 t3 WHERE t3.order_id='".$row['alias']."'";

										$resultw = mysqli_query($mr_con,$sqlw);$ract=1;

										while($roww=mysqli_fetch_array($resultw)){

										$gdtodat+=$roww['plan_amount'];

										$sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

										$result123 = mysqli_query($mr_con,$sqlserver);
										$row321=mysqli_fetch_array($result123);


										$body.='<table style="padding-left:10px;" cellspacing="10px" width="100%"><tr><td width="30"><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

										$body.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">'.$row321['plan'].'</p>';

										

										$body.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">'.$row321['subplan'].'</p>';

										

										
										
										if($roww['ram']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Ram: '.$roww['ram'].' GB</small></p>';
										if($roww['cpu_cores']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>CPU: '.$roww['cpu_cores'].' Cores</small></p>';
										if($roww['data_transfer']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer: '.$roww['data_transfer'].' GB</small></p>';
										if($roww['disk_space']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Disk Space: '.$roww['disk_space'].'</small></p>';
										if($roww['backup']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Backup: '.$roww['backup'].' GB</small></p>';
										if($roww['iops']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IPs: '.$roww['iops'].'</small></p>';
										if($roww['drive']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Drive: '.$roww['drive'].'</small></p>';
										if($roww['server1']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Server: '.$roww['server1'].' U</small></p>';
										if($roww['selectedOs']!=='' && $roww['selectedOs']!=='0' && $roww['selectedOs']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>OS: '.$roww['selectedOs'].'</small></p>';

 if($roww['db']!=='' && $roww['db']!=='0' && $roww['db']>'0'){                

                    if($roww['db']=="MS SQL Enterprise*"){
                      $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Enterprise<font color="red">*</font></small></p>';
                      $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
                  
                    }else if($roww['db']=="MS SQL Standard*"){

                     $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Standard<font color="red">*</font></small></p>';
                     
                    $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }else if($roww['db']=="MS SQL Web*"){

                     $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Web<font color="red">*</font></small></p>';
                     
                    $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }
                   
                  else if(($roww['db']!="MS SQL Standard*")&&($roww['db']!="MS SQL Enterprise*")){
                      $body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$roww['db'].'</small></p>';
                  }
              }
              if($roww['packqtt']>'0')$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Quantity: '.$roww['packqtt'].'</small></p>';
										if($roww['months']>'0')if($roww['months']=='1'){$tenure= "Monthly";}
                       else if($roww['months']=='3'){
                        $tenure= "1 year (Quarterly Advance)";

                       }else if($roww['months']=='6'){
                        $tenure= "1 year (50% Advance)";
                       }else if($roww['months']=='12'){
                        $tenure= "1 year (100% Advance)";
                      }else if($roww['months']=='24'){
                        $tenure= "2 year (100% Advance)";
                      }else if($roww['months']=='36'){
                        $tenure= "3 year (100% Advance)";
                      }
										$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Tenure: '.$tenure.' </small></p>';


										//$body.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Rs   '.$roww['price'].' / GB / Month</small></p>';

										$body.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Price: Rs '.$roww['plan_amount'].'</span></p>';

										$body.='</td></tr></table><br>';$ract++;

										}

                                   $body.='<table width="100%" cellpadding="10px" style="Margin-top:20px">

										<tr>
										<td style="border-top:1px solid #ccc;"  align="right">
										<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Total: Rs '.moneyFormatIndia($gdtodat).'/-</span></p>
										</td>
										</tr>

										<!--tr>
										<td  align="right">
										<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Discount: Rs '.moneyFormatIndia($row["discount"]).'/-</span></p>
										</td>
										</tr-->
										<tr>
										

											<td  align="right">

												<table height="40" width="200" bgcolor="#12314e" align="right">

													<tr>

														<td valign="middle" align="center">

															<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#fff;"><span style="background:#12314e;line-height:40px;">Grand total: Rs '.moneyFormatIndia($gdtodat-$row["discount"]).'/-</span></p>

														</td>

													</tr>

												</table>

											</td>

										</tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                            	<td align="center">

									<table height="40" width="100" bgcolor="#087100" align="center">

										<tr>

											<td valign="middle" align="center">

												<a href="'.$baseurl2.'/contact.php?a='.$row['order_by'].'" style="background:#087100; color:#FFF;text-decoration:none;display:block;line-height:38px;">CONTACT</a>  

											</td>

										</tr>


									</table><br>
									<p style="margin:0;padding:0;line-height:20px;color:#262626;display:block;width:600px;word-wrap:break-word;     font-size: small;"><span style="color: red;">*</span>Above Grand Total is exclusive of taxes.</p><br>

									<p style="Margin:0;padding:0;line-height:20px;color:#262626;display:block;width:600px;word-wrap:break-word;"><small>We are committed to deliver to you best in class solutions, through our state-of-the-art datacenter and cloud infrastructure, backed by support teams with industry expertise.</small></p>

                                	<p style="Margin:0;padding:0;line-height:20px;color:#262626;"><small><b>Let us architect together!!</b></small></p><br>

                                </td>

                            </tr>

                        </table>

                    </td>

				</tr>

                <tr>

                	<td><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

			</table>

		</td>

	</tr>
	<tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>
</table>';

$body1='<!--[if mso]>

<style> body,table tr,table td,a, span,table.MsoNormalTable {  font-family:Arial, Helvetica, sans-serif !important;  }</style>

<!--<![endif]--><style>a:visited{color: inherit !important;}</style><table width="100%" border="0" cellpadding="2">
  <tr>
    <td align="center">
      <table width="700" style="border:1px solid #ccc;" cellspacing="0" cellpadding="1">
        <tr>
          <td style="font-family:Arial, Helvetica, sans-serif;">
                      <table align="center">
                          <tr><td style="text-align:center;"><img src="'.$baseurl2.'/images/mail-logo.png"></td></tr>
                        </table>
            <table cellpadding="7" width="100%" bgcolor="#12314e" style="color:#FFF;">
                          <tr>
                              <td align="center">
                              <p style="font-size:18px;"><b>Dear Team,</b></p>
                                  <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;">We have received order save request from '.$acerdetf.' for the below plan.</p>                                                                     
                                </td>

                            </tr>

                        </table>

            <table cellpadding="10" width="100%">

                          <tr>

                              <td align="center">


                                    <p style="font-weight:800;Margin:0;padding:0;line-height:30px;font-size:20px;color:#087100">(Request ID: '.$row['order_id'].')</p>

                                    

                                </td>

                            </tr>

              <tr>

                              <td align="left">

                                  <p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Customer details</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Name: </b>'.$acerdetf.'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><b>Company name: </b>'.$comp.'</p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/web.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;<a style="text-decoration:none !important;color#262626;">'.alias($row['order_by'],'lj_logins','alias','username').'</a></p>

                                    <p style="Margin:0;padding:0;color:#262626; font-size:14px;text-indent:10px;line-height:23px;"><img src="'.$baseurl2.'/images/telephone.png" height="16" style="vertical-align:middle;">&nbsp;&nbsp;+91 '.$mob.'</p>

                                </td>

                            </tr>

              <tr>

                              <td align="left">

                                  <p style="font-weight:600;Margin:0;padding:0;line-height:30px;color:#087100;border-bottom:1px dotted #ccc;font-size:16px;Margin-bottom:5px;">Order summary</p>';

                    $gdtodat=0;

                    $sqlw = "SELECT  * FROM lj_saved_plans1 t3 WHERE t3.order_id='".$row['alias']."'";

                    $resultw = mysqli_query($mr_con,$sqlw);$ract=1;

                    while($roww=mysqli_fetch_array($resultw)){

                    $gdtodat+=$roww['plan_amount'];

                    $sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

                    $result123 = mysqli_query($mr_con,$sqlserver);
                    $row321=mysqli_fetch_array($result123);


                    $body1.='<table style="padding-left:10px;" cellspacing="10px" width="100%"><tr><td width="30"><small><b>'.$ract.'</b></small></td><td style="border-left:3px solid #262626;padding-left:5px;">';

                    $body1.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#087100;">'.$row321['plan'].'</p>';

                    

                    $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#12314e;font-size:13px;text-indent:8px;font-weight:600">'.$row321['subplan'].'</p>';

                    

                    
                    
                    if($roww['ram']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Ram: '.$roww['ram'].' GB</small></p>';
                    if($roww['cpu_cores']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>CPU: '.$roww['cpu_cores'].' Cores</small></p>';
                    if($roww['data_transfer']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Data Transfer: '.$roww['data_transfer'].' GB</small></p>';
                    if($roww['disk_space']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Disk Space: '.$roww['disk_space'].'</small></p>';
                    if($roww['backup']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Backup: '.$roww['backup'].' GB</small></p>';
                    if($roww['iops']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>IPs: '.$roww['iops'].'</small></p>';
                    if($roww['drive']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Drive: '.$roww['drive'].'</small></p>';
                    if($roww['server1']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Server: '.$roww['server1'].' U</small></p>';
                    if($roww['selectedOs']!=='' && $roww['selectedOs']!=='0' && $roww['selectedOs']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>OS: '.$roww['selectedOs'].'</small></p>';

 if($roww['db']!=='' && $roww['db']!=='0' && $roww['db']>'0'){                

                    if($roww['db']=="MS SQL Enterprise*"){
                      $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Enterprise<font color="red">*</font></small></p>';
                      $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';
                  
                    }else if($roww['db']=="MS SQL Standard*"){

                     $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Standard<font color="red">*</font></small></p>';
                     
                    $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }else if($roww['db']=="MS SQL Web*"){

                     $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: MS SQL Web<font color="red">*</font></small></p>';
                     
                    $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small><font color="red">*</font>2 core license cost included</small></p>';

                    }
                   
                  else if(($roww['db']!="MS SQL Standard*")&&($roww['db']!="MS SQL Enterprise*")){
                      $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Database: '.$roww['db'].'</small></p>';
                  }
              }
              if($roww['packqtt']>'0')$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Quantity: '.$roww['packqtt'].'</small></p>';
                    if($roww['months']>'0')if($roww['months']=='1'){$tenure= "Monthly";}
                       else if($roww['months']=='3'){
                        $tenure= "1 year (Quarterly Advance)";

                       }else if($roww['months']=='6'){
                        $tenure= "1 year (50% Advance)";
                       }else if($roww['months']=='12'){
                        $tenure= "1 year (100% Advance)";
                      }else if($roww['months']=='24'){
                        $tenure= "2 year (100% Advance)";
                      }else if($roww['months']=='36'){
                        $tenure= "3 year (100% Advance)";
                      }
                    $body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Tenure: '.$tenure.' </small></p>';


                    //$body1.='<p style="Margin:0;padding:0;line-height:20px;color:#262626;text-indent:14px;"><small>Rs   '.$roww['price'].' / GB / Month</small></p>';

                    $body1.='<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Price: Rs '.$roww['plan_amount'].'</span></p>';

                    $body1.='</td></tr></table><br>';$ract++;

                    }

                                   $body1.='<table width="100%" cellpadding="10px" style="Margin-top:20px">

                   					<tr>
										<td style="border-top:1px solid #ccc;"  align="right">
										<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Total: Rs '.moneyFormatIndia($gdtodat).'/-</span></p>
										</td>
										</tr>

										<!--tr>
										<td  align="right">
										<p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#12314e; text-align:right;Margin-top: -23px;"><span style="border-bottom:1px solid #ccc;padding:0 10px 5px 10px;">Discount: Rs '.moneyFormatIndia($row["discount"]).'/-</span></p>
										</td>
										</tr-->
										<tr>

                      <td align="right">

                        <table height="40" width="200" bgcolor="#12314e" align="right">

                          <tr>

                            <td valign="middle" align="center">

                              <p style="font-weight:600;Margin:0;padding:0;line-height:25px;color:#fff;"><span style="background:#12314e;line-height:40px;">Grand total: Rs '.moneyFormatIndia($gdtodat-$row["discount"]).'/-</span></p>

                            </td>

                          </tr>

                        </table>

                      </td>

                    </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                              <td align="center">

                              <p style="Margin:10px;Margin-top:-20px;padding:10px 15px;color:#087100;">Please review the order for delivery</p>

                  <table height="40" width="100" bgcolor="#087100" align="center">

                    <tr>

                      <td valign="middle" align="center">

                        <a href="'.$baseurl2.'/contact.php?a='.$row['order_by'].'" style="background:#087100; color:#FFF;text-decoration:none;display:block;line-height:38px;">CONTACT</a>  

                      </td>

                    </tr>

                  </table><br>
                  <p style="margin:0;padding:0;line-height:20px;color:#262626;display:block;width:600px;word-wrap:break-word;     font-size: small;"><span style="color: red;">*</span>Above Grand Total is exclusive of taxes.</p><br>

                  <p style="Margin:0;padding:0;line-height:20px;color:#262626;display:block;width:600px;word-wrap:break-word;"><small>We are committed to deliver to you best in class solutions, through our state-of-the-art datacenter and cloud infrastructure, backed by support teams with industry expertise.</small></p>

                                  <p style="Margin:0;padding:0;line-height:20px;color:#262626;"><small><b>Let us architect together!!</b></small></p><br>

                                </td>

                            </tr>

                        </table>

                    </td>

        </tr>

                <tr>

                  <td><img src="'.$baseurl2.'/images/BorderHorizontal.jpg" width="100%"></td>

                </tr>

      </table>

    </td>

  </tr>
  <tr>
        <td style="vertical-align:top;padding:0px;text-align:left;width:100%;max-width:682px;min-width:320px" bgcolor="#ffffff"><p align="center"><span style="text-align:center;font:normal 11px arial;color:#363737;line-height:19px">This is an auto generated mail. Please do not reply</span></p></td>
        </tr>

</table>';


//$body = "hello";
$to=alias($row['order_by'],'lj_logins','alias','username');
$subject='Order Save Receipt -'.$row['order_id'];
//$subject='Order Save Recei';
//$to = 'no-reply@pidatacenters.com';
$from = 'sales@pidatacenters.com';
	$from_name = 'Order Saved @Pi®';
	$reply = 'sales@pidatacenters.com';
	$reply_name = 'Sales Pi';
	//$to = $row['username'];
	//$to = 'sathwik.crazy@gmail.com';

	smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body);
	//smtpmailer($to, $from, $from_name,$reply,$reply_name, $subject, $body1);
	smtpmailer('sales@pidatacenters.com', $from, $from_name,$reply,$reply_name, $subject, $body1);

}

}

}



function findfimepro($fv1){global $mr_con;

	$colocation="'1','2','3'";

	$storage="'4','5','6','7','8','9'";

	$iaas="'10','11','12','14','15','16','17'";

	$paas="'18','19','20','21'";



	$ffpq = "SELECT id FROM lj_selected_plans WHERE order_id='$fv1' AND plan_id IN ($colocation)";

	$ffpqr = mysqli_query($mr_con,$ffpq);

	if($ffpqr){

		$ciaas = mysqli_num_rows($ffpqr);

		if($ciaas>'0'){

			$collo=$ciaas;

		}else $collo=0;

	}else $collo=0;

	$ffpq = "SELECT sum(selectedServers) as servercount FROM lj_selected_plans WHERE order_id='$fv1' AND plan_id IN ($iaas)";

	$ffpqr = mysqli_query($mr_con,$ffpq);

	if($ffpqr){

		$ciaass = mysqli_num_rows($ffpqr);

		if($ciaass>'0'){

			$ffr1=mysqli_fetch_array($ffpqr);

			$ciaas=$ffr1['servercount'];

			if($ciaas>='1' && $ciaas<='3')$iaas=1;

			elseif($ciaas>='4' && $ciaas<='6')$iaas=3;

			elseif($ciaas>='7' && $ciaas<='10')$iaas=5;

			else $iaas=0;

		}else $iaas=0;

	}else $iaas=0;



	$ffpq = "SELECT sum(selectedServers) as servercount FROM lj_selected_plans WHERE order_id='$fv1' AND plan_id IN ($paas)";

	$ffpqr = mysqli_query($mr_con,$ffpq);

	if($ffpqr){

		$ciaass = mysqli_num_rows($ffpqr);

		if($ciaass>'0'){

			$ffr1=mysqli_fetch_array($ffpqr);

			$ciaas=$ffr1['servercount'];

			if($ciaas>='1' && $ciaas<='3')$paas=4;

			elseif($ciaas>='4' && $ciaas<='6')$paas=6;

			elseif($ciaas>='7' && $ciaas<='10')$paas=8;

			else $paas=0;

		}else $paas=0;

	}else $paas=0;



	$ffpq = "SELECT SUM((min_gb)+(selected_storage*increments)) as gbbs FROM lj_selected_plans WHERE order_id='$fv1' AND plan_id IN ($storage)";

	$ffpqr = mysqli_query($mr_con,$ffpq);

	if($ffpqr){

		$ciaas = mysqli_num_rows($ffpqr);

		if($ciaas>'0'){

			$ffr1=mysqli_fetch_array($ffpqr);

			if($ffr1['gbbs']<='1000')$staar=1;

			elseif($ffr1['gbbs']>'1000' && $ffr1['gbbs']<'100000')$staar=2;

			elseif($ffr1['gbbs']>'100000' && $ffr1['gbbs']<'500000')$staar=3;

			else $staar=0;

		}else $staar=0;

	}else $staar=0;

	return max(array($iaas, $paas, $staar,$collo));

}
?>