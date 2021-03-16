<?php


session_start();
unset($_SESSION);
session_destroy();
//ini_set('display_errors',1);



//error_reporting(E_ALL);



$secret_key = "c882b4a1aa071c3cf7afc00d3976268d";	 // Pass Your Registered Secret Key from EBS secure Portal



if(isset($_REQUEST['ResponseCode'])){



include('plans/mysql.php');



include('plans/payment-ack-download.php');



$baseurl="https://pidatacenters.com";



$rescode=$_REQUEST['ResponseCode'];



$paydate=$_REQUEST['DateCreated'];



$paymentID=$_REQUEST['PaymentID'];



$merchantRefNo=$_REQUEST['MerchantRefNo'];



$billingName=$_REQUEST['BillingName'];



$billingAddress=$_REQUEST['BillingAddress'];



$billingCity=$_REQUEST['BillingCity'];



$billingState=$_REQUEST['BillingState'];



$billingPostalCode=$_REQUEST['BillingPostalCode'];



$billingPhone=$_REQUEST['BillingPhone'];



$billingEmail=$_REQUEST['BillingEmail'];



$transactionID=$_REQUEST['TransactionID'];



$tequestID=$_REQUEST['RequestID'];



$amount=(int)$_REQUEST['Amount'];



$orderalias=alias($merchantRefNo,'lj_orders','order_id','alias');



mysqli_query($mr_con,"UPDATE lj_orders SET payment_id='$paymentID',trans_id='$transactionID',request_id='$tequestID',order_status='0' WHERE alias='$orderalias'");



$sqlss = "SELECT orderalias FROM lj_payments_pend WHERE orderalias='$orderalias'";



$resultee = mysqli_query($mr_con,$sqlss);



if($resultee){



$countee = mysqli_num_rows($resultee);



if($countee>'0'){orderssss($orderalias);}



}



mysqli_query($mr_con,"DELETE FROM lj_payments_pend WHERE orderalias='$orderalias'");



$chk = mysqli_query($mr_con,"SELECT * FROM lj_selected_plans1 where plan_id>='10' AND plan_id<='21' AND order_id='$orderalias'");



if($chk){	



	$cnt = mysqli_num_rows($chk);



	if($cnt>'0'){



		$orderby=alias($orderalias,'lj_orders','alias','order_by');

		$discount=alias($orderalias,'lj_orders','alias','discount');



		$project_chk = mysqli_query($mr_con,"SELECT project,company FROM lj_logins where alias='$orderby'");



		if($project_chk){



			$project_fetch=mysqli_fetch_array($project_chk);



			$login_project = $project_fetch['project'];



			$customer_company = $project_fetch['company'];



			$login_project="a";



			if($login_project!=''){



				while($fetch_chk = mysqli_fetch_array($chk)){



					$fetch_plan=$fetch_chk['plan_id'];



					if($fetch_plan=='10'){



						$selected_plan='m1.small';



					}else if($fetch_plan=='11'){



						$selected_plan='m1.medium';



					}else if($fetch_plan=='12'){



						$selected_plan='m1.large';



					}else if($fetch_plan=='14'){



						$selected_plan='m1.tiny';



					}else if($fetch_plan=='15'){



						$selected_plan='m1.small';



					}else if($fetch_plan=='16'){



						$selected_plan='m1.medium';



					}else if($fetch_plan=='17'){



						$selected_plan='m1.large';



					}else if($fetch_plan=='18'){



						$selected_plan='m1.tiny';



					}else if($fetch_plan=='19'){



						$selected_plan='m1.small';



					}else if($fetch_plan=='20'){



						$selected_plan='m1.medium';



					}else if($fetch_plan=='21'){



						$selected_plan='m1.large';



					}else{



						$selected_plan='';



					}



					



					$fetch_slected_os=$fetch_chk['selectedOs'];



					if($fetch_slected_os=='Debian'){



						$selected_os='Pi_Debian';



					}else if($fetch_slected_os=='RHEL'){



						$selected_os='Pi_REHL_6.2';



					}else if($fetch_slected_os=='SUSE'){



						$selected_os='Pi_SUSE';



					}else if($fetch_slected_os=='Ubuntu'){



						$selected_os='Pi_Ubuntu_14.04';



					}else if($fetch_slected_os=='Win 2008/2012 (Std /Ent)'){



						$selected_os='Pi_win2k12_std';



					}else{



						$selected_os='';



					}	



					$selected_os='cirros';					



					



					$company=preg_replace("/[^a-zA-Z0-9]/", "", $customer_company);					



					$instance='PVIJ'.$company.'_'.$selected_os.'_'.$fetch_chk['id'];



					//echo $selected_os.$selected_plan.$instance;



					$payload = file_get_contents('https://pidatacenters.com/mStack/mymgs.php?a='.$selected_os.'&b='.$selected_plan.'&c='.$instance);



					//$url="https://103.210.73.39/mStack/mymgs.php?a=".$selected_os."&b=".$selected_plan."&c=".$instance;



					//curlx_ja($url);



					//$output = shell_exec('arg.sh '.$selected_os.' '.$selected_plan.' demo INSTANCE_NETWORK 10.0.12.0/24 True ROUTER Floating_IP '.$instance.' demo demo True');



				}				



			}



		}		



	}



}



function curlx_ja($url){



	$chu = curl_init();



	curl_setopt($chu, CURLOPT_URL, $url);



	curl_setopt($chu, CURLOPT_FRESH_CONNECT, true);



	curl_setopt($chu, CURLOPT_TIMEOUT, 1);



	curl_exec($chu);



	curl_close($chu);



}



?>



<!DOCTYPE html>



<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->



<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->



<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->



<!--[if gt IE 8]><!-->



<html>



<!--<![endif]-->







<head>



<meta charset="UTF-8" />



<title>Welcome to Pi DATACENTERS</title>



<link rel="shortcut icon" href="favicon.ico">



<link rel="shortcut icon" href="favicon.ico">



<link rel="stylesheet" href="css/main.css">



<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>



<script src="js/vendor/modernizr-2.6.2.min.js"></script>



<link rel="stylesheet" href="css/owl.carousel.css">



<link rel="stylesheet" href="css/camera.css">



<link rel="stylesheet" href="css/responsive.css">



<link rel="stylesheet" href="css/menu.css">



<link rel="stylesheet" href="css/select.css">



<link rel="stylesheet" href="css/tabs/cart1.css">



<link rel="stylesheet" href="css/tabs/responsive-cart.css">



<link rel="stylesheet" href="css/tabs/tabs.css">



<link rel='stylesheet' id='rpt-css'  href='css/rpt_style.min.css?ver=4.4.2' type='text/css' media='all' />



<script type='text/javascript' src='js/vendor/jquery-1.9.1.min.js?ver=4.4.2'></script>



<script type='text/javascript' src='js/jquery.easing.1.3.js?ver=4.4.2'></script>



<style>



.forgotpw {



	color: #087100 !important;



}



.forgotpw:hover {



	color: #fff !important;



}



.emsg {



	font-size: 18px;



	color: #FFF;



	text-align: center;



	font-weight: 400;



}



p small {



	color: #FFF !important;



}



#register-block_a, #resetlogin_a, .makepaymdnt_a, #dffhdf_a {



	display: none;



}



a.qazxcv, a.qazxcv:visited {



	min-width: 110px;



	height: 34px;



	cursor: pointer;



	font-size: 16px;



	transition: all 0.2s ease;



	padding: 5px 15px;



	text-decoration: none;



	color: #087100;



}



a.white-by, a.white-by:visited {



	min-width: 110px;



	height: 34px;



	cursor: pointer;



	font-size: 16px;



	transition: all 0.2s ease;



	padding: 5px 15px;



	text-decoration: none;



	color: #FFF !important;



	border: 1px solid #FFF;



}



.hired{color:#F00;font-weight:bold;}



.container {



    width: 100%;



    max-width: 1140px;



    margin: 0 auto;



	padding:0;



}
.asterik{
  display: inline; 
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 400;

}
.asterik:after{
 content:"*";
color:red;    
}


</style>

     <style>
.num6 {
    text-align: left;
    color: #011c54;
    line-height: 37px;
    padding: 4px 21px;
    font-weight: 350;
    font-size: 14px;
    position: fixed;
    z-index: 9999999;
    right: 6%;
}

@media only screen and (max-width: 500px) {
    .num6 {
    text-align: left;
    color: #011c54;
    line-height: 37px;
    padding: 4px 21px;
    font-weight: 350;
    font-size: 14px;
    position: fixed;
    z-index: 9999999;
    right: -5%;
    }
}
</style>

</head>



<body>



<div class="num6">
	<div class="srch">

              <div class="searchform">

                <form onsubmit="return checkVal()" method="get" id="searchform" class="searchform" action="https://pidatacenters.com/">

                  <input type="submit" class="search-but" value="&nbsp;">

                  <input class="searchInput" type="text" value="" name="s" id="s">

                </form>

              </div>

            </div>

    <span style="display: inline-block;vertical-align:middle;"> <img src="https://pidatacenters.com/wp-content/uploads/2016/06/TollFree-Icon.png" style="display:inline;float: left;padding: 3px;height: 25px;"> </span>

    <span style="display: inline-block;line-height: -3px;vertical-align: middle;font-weight:600;">1800-3074-3282 (Toll Free)</span>

    <!--<span style="display: inline-block;line-height: -3px;vertical-align: middle;padding-left: 13px;font-weight:600;">9 AM to 6 PM IST</span>-->


</div>

    <header class="hdr-home clearfix">
<!--
  <div class="header trans" data-0="background:rgba(1, 27, 47, 0); margin-top:0" data-50=" margin-top:0" data-60="background:rgba(1, 27, 47, 1); margin-top:-0">

    <div class="container clearfix">

      <div class="logo trans" data-0="width:255px;" data-50="width:180px;"> <a href="<?php //echo $baseurl;?>/"> <img src="<?php //echo $baseurl;?>/pidata/wp-content/uploads/2015/08/logo.png" alt="logo" style="width: 95%;"> </a> </div>

      <div class="header-rht trans" data-0="margin-top:50px" data-50="margin-top:29px">

        <div class="srch">

          <div class="searchform">

            <form onsubmit="return checkVal()" method="get" id="searchform" class="searchform" action="<?php //echo $baseurl;?>/">

              <input type="submit" class="search-but" value="&nbsp;">

              <input class="searchInput" type="text" value="" name="s" id="s">

            </form>

          </div>

        </div>
-->
 <div class="header trans" data-0="background:rgba(1, 27, 47, 0); margin-top:0" data-50=" margin-top:0" data-60="background:rgba(255,255,255,1); margin-top:-0">

    <div class="container clearfix">

      <div class="logo trans" data-0="width:255px;" data-50="width:180px;"> <a href="https://pidatacenters.com/"> <img src="https://pidatacenters.com/wp-content/uploads/2015/08/logo.png" alt="logo" style="width: 95%;"> </a> </div>

      <div class="header-rht trans" data-0="margin-top:50px" data-50="margin-top:29px">

        
        <nav>

              <ul>

                <li id="nav-menu-item-13" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-home"><a href="https://pidatacenters.com/" class="menu-link main-menu-link">HOME</a></li>
                <li id="nav-menu-item-14" class="main-menu-item  menu-item-even menu-item-depth-0 single-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/about-pi-data-center/" class="menu-link main-menu-link">ABOUT Pi</a><span class="sub-menu-icon"></span>
                  <ul class="sub-menu menu-odd  menu-depth-1">
                    <li id="nav-menu-item-983" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/about-pi/#whowearesec" class="menu-link sub-menu-link">Who we are</a></li>
                    <li id="nav-menu-item-634" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/about-pi/#missionvision" class="menu-link sub-menu-link">What Drives Us</a></li>
                    <li id="nav-menu-item-172" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/about-pi-data-centers/pi-data-centers-team/" class="menu-link sub-menu-link">The Team</a></li>
                    <li id="nav-menu-item-843" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/news/" class="menu-link sub-menu-link">News</a></li>
                    <!--li id="nav-menu-item-2521" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/events/" class="menu-link sub-menu-link">Events</a></li-->
                    <li id="nav-menu-item-1531" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/blog-pi-datacenters/" class="menu-link sub-menu-link">Blog</a></li>
                    <li id="nav-menu-item-1888" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a title="White Papers" href="https://pidatacenters.com/whitepapers/" class="menu-link sub-menu-link">WhitePapers</a></li>
                    <li id="nav-menu-item-177" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/about-pi-data-centers/careers/" class="menu-link sub-menu-link">Careers</a></li>
                    <li id="nav-menu-item-1827" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/contact.php" class="menu-link sub-menu-link">Reach Us</a></li>
                  </ul>
                </li>
               

                <li id="nav-menu-item-16" class="main-menu-item  menu-item-even menu-item-depth-0 sub-menu-2 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/products/" class="menu-link main-menu-link">PRODUCTS</a><span class="sub-menu-icon"></span>
					<ul class="sub-menu menu-odd  menu-depth-1">
					  <li id="nav-menu-item-724" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/products/cloud-products/" class="menu-link sub-menu-link">Cloud Products</a><span class="sub-menu-icon"></span>
					  <ul class="sub-menu menu-even sub-sub-menu menu-depth-2">
					    <li id="nav-menu-item-2708" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/colocation-services/" class="menu-link sub-menu-link">Co-Location &#038; White Space</a></li>
					    <li id="nav-menu-item-202" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-products/cloud-hosting-services/" class="menu-link sub-menu-link">Cloud Hosting</a></li>
					    <li id="nav-menu-item-205" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-products/cloud-bursting/" class="menu-link sub-menu-link">Cloud Bursting</a></li>
					    <li id="nav-menu-item-216" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-products/elastic-storage-services/" class="menu-link sub-menu-link">Elastic Storage</a></li>
					  </ul>
					</li>
               

                     <li id="nav-menu-item-725" class="sub-menu-item  menu-item-odd menu-item-depth-1 sub-two-col menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/products/cloud-managed-services/" class="menu-link sub-menu-link">Cloud Managed Services</a><span class="sub-menu-icon"></span>
						  <ul class="sub-menu menu-even sub-sub-menu menu-depth-2">
						    <li id="nav-menu-item-229" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-managed-services/managed-disaster-recovery/" class="menu-link sub-menu-link">Managed Disaster<span class="sub-li-b"> Recovery</span></a></li>
						    <li id="nav-menu-item-247" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-managed-services/erp-cloud-sap-hana-oracle-db/" class="menu-link sub-menu-link">ERP Cloud SAP HANA Oracle DB</a></li>
						    <li id="nav-menu-item-227" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-managed-services/enterprise-application-support/" class="menu-link sub-menu-link">Enterprise Application Support</a></li>
						    <li id="nav-menu-item-235" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-managed-services/virtualization-management-services/" class="menu-link sub-menu-link">Virtualization Management Services</a></li>
						    <li id="nav-menu-item-246" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-managed-services/cloud-migration/" class="menu-link sub-menu-link">Cloud Migration</a></li>
						    <li id="nav-menu-item-245" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-managed-services/cloud-automation/" class="menu-link sub-menu-link">Cloud Automation</a></li>
						    <li id="nav-menu-item-244" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/cloud-managed-services/cloud-data-backups/" class="menu-link sub-menu-link">Cloud Data Backups</a></li>
						  </ul>
						</li>
               

                     <li id="nav-menu-item-726" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/products/remote-services/" class="menu-link sub-menu-link">Remote Services</a><span class="sub-menu-icon"></span>
						  <ul class="sub-menu menu-even sub-sub-menu menu-depth-2">
						    <li id="nav-menu-item-265" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/remote-services/remote-infrastructure-managed-services/" class="menu-link sub-menu-link">RIM Services</a></li>
						    <li id="nav-menu-item-264" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/remote-services/remote-network-management/" class="menu-link sub-menu-link">Remote Network Management</a></li>
						    <li id="nav-menu-item-263" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/remote-services/remote-compute-service/" class="menu-link sub-menu-link">Remote Compute Service</a></li>
						    <li id="nav-menu-item-271" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/remote-services/remote-database-management/" class="menu-link sub-menu-link">Remote Database Management</a></li>
						    <li id="nav-menu-item-270" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/remote-services/noc-facilities-at-pi/" class="menu-link sub-menu-link">NOC</a></li>
						  </ul>
						</li>
               

                      <li id="nav-menu-item-727" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/products/self-service-provisioning/" class="menu-link sub-menu-link">Self Service Provisioning</a><span class="sub-menu-icon"></span>
						  <ul class="sub-menu menu-even sub-sub-menu menu-depth-2">
						    <li id="nav-menu-item-286" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/self-service-provisioning/iaas-infrastructure-as-a-service/" class="menu-link sub-menu-link">IaaS</a></li>
						    <li id="nav-menu-item-285" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/products/self-service-provisioning/paas-platform-as-service/" class="menu-link sub-menu-link">PaaS</a></li>
						    <li id="nav-menu-item-2067" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/contact.php?id=trial" class="menu-link sub-menu-link">Self Service Free Trial</a></li>
						  </ul>
						</li>
						</ul>
						</li>

               



                <li id="nav-menu-item-2440" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/harbour1-enterprise-class-cloud-platform-data-center/" class="menu-link main-menu-link">HARBOUR 1™</a></li>
                <li id="nav-menu-item-15" class="main-menu-item  menu-item-even menu-item-depth-0 enment-menu sub-menu-2 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/environments/" class="menu-link main-menu-link">ENVIRONMENTS</a><span class="sub-menu-icon"></span>
                  <ul class="sub-menu menu-odd  menu-depth-1">
                    <li id="nav-menu-item-839" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/environments/frameworks/" class="menu-link sub-menu-link">Framework</a><span class="sub-menu-icon"></span>
                      <ul class="sub-menu menu-even sub-sub-menu menu-depth-2">
                        <li id="nav-menu-item-304" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/frameworks/virtual-private-cloud/" class="menu-link sub-menu-link">Virtual Private Cloud</a></li>
                        <li id="nav-menu-item-303" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/frameworks/community-cloud/" class="menu-link sub-menu-link">Community Cloud</a></li>
                        <li id="nav-menu-item-302" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/frameworks/hybrid-cloud/" class="menu-link sub-menu-link">Hybrid Cloud</a></li>
                        <li id="nav-menu-item-301" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/frameworks/software-defined-data-centers/" class="menu-link sub-menu-link">SDDC</a></li>
                      </ul>
                    </li>
                    <li id="nav-menu-item-288" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/environments/industry-solutions/" class="menu-link sub-menu-link">Industry Solutions</a><span class="sub-menu-icon"></span>
                      <ul class="sub-menu menu-even sub-sub-menu menu-depth-2">
                        <li id="nav-menu-item-316" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/industry-solutions/it-ites/" class="menu-link sub-menu-link">IT/ITES</a></li>
                        <li id="nav-menu-item-331" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/industry-solutions/government-and-psu/" class="menu-link sub-menu-link">Government and PSU</a></li>
                        <li id="nav-menu-item-315" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/industry-solutions/bfsi/" class="menu-link sub-menu-link">BFSI</a></li>
                        <li id="nav-menu-item-330" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/industry-solutions/manufacturing/" class="menu-link sub-menu-link">Manufacturing</a></li>
                        <li id="nav-menu-item-329" class="sub-menu-item sub-sub-menu-item menu-item-even menu-item-depth-2 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/environments/industry-solutions/retail-industry-solutions/" class="menu-link sub-menu-link">Retail</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li id="nav-menu-item-17" class="main-menu-item  menu-item-even menu-item-depth-0 single-menu last-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="https://pidatacenters.com/tco-pi-cloud/" class="menu-link main-menu-link">TCO</a><span class="sub-menu-icon"></span>
                  <ul class="sub-menu menu-odd  menu-depth-1">
                    <li id="nav-menu-item-333" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/tco-pi-cloud/cloudonomics-pi-datacenters/" class="menu-link sub-menu-link">Cloudonomics</a></li>
                    <li id="nav-menu-item-334" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/tco-pi-cloud/power-consumption/" class="menu-link sub-menu-link">Power Consumption</a></li>
                    <li id="nav-menu-item-335" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/tco-pi-cloud/infrastructure-usage/" class="menu-link sub-menu-link">Infrastructure Usage</a></li>
                    <li id="nav-menu-item-339" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="https://pidatacenters.com/tco-pi-cloud/capex-opex/" class="menu-link sub-menu-link">Capex / Opex</a></li>
                  </ul>
                </li>
                <li id="nav-menu-item-2120" class="main-menu-item  menu-item-even menu-item-depth-0 single-menu pricing-menu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a class="menu-link main-menu-link">PRICING</a><span class="sub-menu-icon"></span>
<ul class="sub-menu menu-odd  menu-depth-1">
  <li id="nav-menu-item-2121" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/p/pricing_cloud_servers.php" class="menu-link sub-menu-link">Cloud Servers</a></li>
  <li id="nav-menu-item-2122" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/p/pricing_virtual_servers.php" class="menu-link sub-menu-link">Virtual Dedicated Servers</a></li>
  <li id="nav-menu-item-2123" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/p/pricing_enterprise_servers.php" class="menu-link sub-menu-link">Enterprise Dedicated Servers</a></li>
  <li id="nav-menu-item-2124" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/p/pricing_cloud_storage.php" class="menu-link sub-menu-link">Cloud Storage</a></li>
  <li id="nav-menu-item-2125" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/p/pricing_server_colocation.php" class="menu-link sub-menu-link">Server Co-Location</a></li>
  <li id="nav-menu-item-2126" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/pidata/p/pricing_rack_colocation.php" class="menu-link sub-menu-link">Rack Co-Location</a></li>
</ul>
</li>

  
                <li id="nav-menu-item-2127" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/CustomerPortal/" class="menu-link main-menu-link">SELF SERVICE</a></li>
                <!--li id="nav-menu-item-2520" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom"><a href="https://pidatacenters.com/events/" class="menu-link main-menu-link">EVENTS</a></li-->

              </ul>

          <a href="#" id="pull" class="nav-icon"></a> </nav>

      </div>

    </div>

  </div>

</header>

<section  
    style="background: url(images/pricing_banner123.jpg) center bottom;
    background-size: cover !important;
    background-repeat: no-repeat;
    height: 100%;
    width: 100%;">
<div id="prcing-cloud-servers2"></div>
      <div class="header-caption">

        <div class="container">

          <h1>&nbsp;</h1>

        </div>

      </div>

    </section>
    


<?



if($rescode!='0'){mysqli_query($mr_con,"UPDATE lj_orders SET payment_mode='Offline' WHERE order_id='$merchantRefNo'");}



?>



<div class="main-cart">



  <div class="video-bg">



    <video autoplay loop muted poster="https://pidatacenters.com/wp-content/uploads/2015/08/product-vdo-cover1.jpg" id="background">



      <source src="https://pidatacenters.com/wp-content/uploads/2015/08/video1.mp4" type="video/mp4">



    </video>



    <div class="layer"></div>



  </div>



  <div class="wrapper-cart transbg">



    <!-- payment acknowledgement starts-->



    <div class="pay-ack">



    	<div class="payment-ack-header">



        	<div class="title">



            	<img src="images/thanku-icon.png">



                <article>



                	<h3 class="bold">Thank you <?php echo $billingName;?>!</h3>



                    <p>Your order ( Order ID: <?php echo $merchantRefNo;?> ) has been placed successfully.</p>



                    <?php if($rescode!='0'){?><p class="hired">Online payment failed. Our team will help you proceed further.</p><?php }?>



                </article>



            </div>



            <div class="order-iddetails">



            	<article class="col-md-7">



                	<h3>Your (Order ID: <?php echo $merchantRefNo;?>)</h3>



                    <h5>Placed on <?php echo getproperdate($paydate);?></h5>



                    <p>Check Your inbox <span class="bold"><?php echo $billingEmail;?></span></p>



                </article>



                <div class="col-md-5 text-right">



                	<ul class="print-download pull-right">



                    	<li><a href="<?php echo $baseurl;?>/pidata/p/plans/invoices.php?x=<?php echo $orderalias;?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span>Download</a></li>



                        <li><a href="<?php echo $baseurl;?>/pidata/p/plans/prints.php?x=<?php echo $orderalias;?>" target="_blank"><span class="glyphicon glyphicon-print"></span>Print</a></li>



                    </ul>

						  <div class="clearfix"></div>

						  <a href="https://pidatacenters.com/CustomerPortal/"><h3><span class="glyphicon glyphicon-log-in"></span> My account</h3></a>



                </div>



            </div>



        </div>



        <div class="payment-ack-body">



        	<div class="table-ack">



            



            	<table width="100%" cellpadding="0" cellspacing="0">



                	<tr class="ack-head">



                    	<td style="width: 35%; padding-left: 24px;">Product Details</td>

                       <!-- <td style="width: 18%;">Price</td> -->

                        <td style="width: 40%; text-align: center;">Tenure</td>

                        <!--<td style="width: 20%;">Sub - total</td>-->
                        <td style="width: 25%; text-align: center;">Price</td>



                    </tr>



				<?php



                     $sqlw = "SELECT  t3.plan_id, t3.ram, t3.cpu_cores,t3.data_transfer, t3.disk_space, t3.backup, t3.iops, t3.drive,t3.server1, t3.power, t3.selectedOs,t3.quantity, t3.db,t3.months,t3.price, t3.plan_amount,t3.otc FROM lj_selected_plans1 t3  WHERE t3.order_id='".$orderalias."'";



                    $resultw = mysqli_query($mr_con,$sqlw);



                    while($roww=mysqli_fetch_array($resultw)){



                   $body.='<tr>';
                    $sqlserver = "SELECT  t3.plan, t3.subplan FROM lj_server_plans1 t3  WHERE t3.alias='".$roww['plan_id']."'";

                    $result123 = mysqli_query($mr_con,$sqlserver);
                    $row321=mysqli_fetch_array($result123);


                    //$body.='<td colspan="5"><h3 class="ack-title bold">'.alias(alias($roww['plan_id'],'lj_server_plans','alias','category1'),'categories','id','categ_name').'</h3></td>';
                    $body.='<td colspan="5"><h3 class="ack-title bold">'.$row321['plan'].'</h3></td>';

                    $body.='</tr>';

                    $body.='<tr class="bdrr">';
                    $body.='<td><h5 class="ack-subtitle bold">'.$row321['subplan'].'</h5>';


                    $body.='<ul class="list-ack" style="text-indent:20px;">';

					           if($roww['selectedOs']!=='' && $roww['selectedOs']!=='0' && $roww['selectedOs']>'0') $body.='<li>OS : '.$roww['selectedOs'].'</li>';

					//if($roww['selectedPlatform']!='') $body.='<li>'.$roww['selectedPlatform'].'</li>'; 

                    
                    if($roww['ram']>'1')$body.='<li>Ram : '.$roww['ram'].' GB</li>';
                    if($roww['cpu_cores']>'1')$body.='<li>CPU : '.$roww['cpu_cores'].' Cores</li>';
                    if($roww['data_transfer']>'1')$body.='<li>Data Transfer : '.$roww['data_transfer'].' GB</li>';
                    if($roww['disk_space']>'1')$body.='<li>Disk Space : '.$roww['disk_space'].' GB</li>';
                    if($roww['backup']>'1')$body.='<li>Backup : '.$roww['backup'].' GB</li>';
                    
                    if($roww['iops']>'0')$body.='<li>IPs : '.$roww['iops'].' </li>';
                    if($roww['db']!=='' && $roww['db']!=='0' && $roww['db']>'0'){                

                    if($roww['db']=="MS SQL Enterprise*"){
                      $body.='<li>Database: <label class="asterik">MS SQL Enterprise</label></li>';
                      $body.='<li><font color="red">*</font>2 core license cost included</li>';
                  
                    }else if($roww['db']=="MS SQL Standard*"){

                     $body.='<li>Database: <label class="asterik">MS SQL Standard</label></li>';
                     
                    $body.='<li><font color="red">*</font>2 core license cost included</li>';

                    }
                    else if($roww['db']=="MS SQL Web*"){

                     $body.='<li>Database: <label class="asterik">MS SQL Web</label></li>';
                     
                    $body.='<li><font color="red">*</font>2 core license cost included</li>';

                    }
                   
                  else{
                      $body.='<li>Database: '.$roww['db'].'</li>';
                  }
              }
                    //if($roww['db']!='') $body.='<li>Database : '.$roww['db'].'</li>';

                   // if($roww['db']=="MS SQL Enterprise*" || $roww['db']=="MS SQL Standard*"){
      //$dbtext = "Temporary license key to be provisioned";
    // $body.='<li><font color="red">*</font>Temporary license key to be provisioned</li>';
  //}
                    if($roww['server1']!='' && $roww['server1']>'0') $body.='<li>Server : '.$roww['server1'].'</li>';
                    if($roww['drive']!='')$body.='<li>Drive : '.$roww['drive'].' </li>';
                    if($roww['power']>'1')$body.='<li>Power : '.$roww['power'].'KVA</li>';
                   if($roww['quantity']>'0') $body.='<li>Quantity : '.$roww['quantity'].' </li>';//if($roww['rackspace']>'1')$body.='<li>Rackspace '.$roww['rackspace'].' Units</li>';
                    


                    //$body.='<li>Rs   '.moneyFormatIndia($roww['price']).' / GB / Month</li>';

                    $body.='</ul></td>';

                 //   $body.='<td valign="middle" style="vertical-align:middle;">Rs '.round($roww['plan_amount']/$roww['months'],2).'</td>';

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
                      }//$body.='<td valign="middle" style="vertical-align:middle;">'.$tenure.'</td>';

                       $body.='<td valign="middle" style="vertical-align:middle; text-align: center;">'.$tenure.' <br>
                    <br>';


                    if($roww['months']==1){$terms = "Total bill is for first month only. Subsequent invoices will be generated on monthly basis hereafter. Unless there is a cancellation.";}
                   else if($roww['months']==3){$terms = "Total bill is for first quarter only. Subsequent invoices will be generated on quarterly basis hereafter.";}
                   else if($roww['months']==6){$terms = "Total bill is for first six months only. Subsequent invoices will be generated on half yearly basis hereafter.";} 
                   else if($roww['months']==12){$terms = "Total bill is for the period of one year in full.";}
                   else if($roww['months']==24){$terms = "Total bill is for the period of two year in full.";}
                   else if($roww['months']==36){$terms = "Total bill is for the period of three year in full.";}

                   $body.='<label style="color: #20641b;font-weight: bold;font-size: 14px;text-align: center;" class="myterms123">'.$terms.' 
                   </label>
                   </td>';


                    $body.='<td valign="middle" style="vertical-align:middle; text-align: right;"><span class="bold spntotal">Rs  '.moneyFormatIndia($roww['plan_amount']).'</span></td>';


                    $body.='</tr>';
                    $tax[]=$roww['plan_amount'];
                    $otc[]=$roww['otc'];
                   // $discount[] = $roww['discount'];

                    }

					echo $body;



                ?>                    



                </table>
<br>
 <?php 
                if ($discount>0) {
                  ?>

                   <p class="bold spntotal" style="text-align: right; padding-right: 15px;">Discount: <?php echo moneyFormatIndia((int)$discount);?></p>
               

                  <?php
                } 
                
                ?>

                

                <p class="bold spntotal" style="text-align: right; padding-right: 15px;">OTC : <?php echo moneyFormatIndia((int)array_sum($otc));?></p>
                 

                	<p class="bold spntotal" style="text-align: right; padding-right: 15px;">GST (18%): <?php echo moneyFormatIndia((int)((array_sum($tax)+array_sum($otc)-$discount)*0.18));?>
                </p>
                
                <div class="upaid text-right">

                	<h3>You Paid <span class="bold"> Rs  <?php echo moneyFormatIndia((int)$amount);?></span></h3>



                	<?php

                	// if($rescode=='0'){echo "<h3>You Paid <span class='bold'> Rs  $amount</span></h3>";}



					//else echo "<h3>Amount to be Paid <span class='bold'> Rs  $amount</span></h3>";?>



                </div>



                <div class="cust-info">



                	<h3>Customer Information</h3>



                    <p>



                    	<?php echo $billingEmail;?><br>



                        <?php echo $billingPhone;?><br>



                        <?php echo $billingAddress;?><br>



                        <?php echo $billingCity;?> - <?php echo $billingPostalCode;?>, <?php echo $billingState;?>



                    </p>



                    <br>



                    <p align="center"><img style="margin-top:-3px;" src="images/lock-icon.png">100 % Safe & Secure Payments</p>



                </div>



            </div>



        </div>



    </div>



    <!-- payment acknowledgement ends -->



  </div>



</div>



<div class="quotes row-001">



  <div class="container">



    <h1 class="txt-2">Industry Speaks</h1>



    <div class="tsml carousel-nav ">



      <div class="carousel-tsml owl-carousel owl-theme owl-responsive-900 owl-loaded">



        <div class="owl-stage-outer owl-height" style="height: 380px;">



          <div class="owl-stage" style="transform: translate3d(-2394px, 0px, 0px); transition: 1s; width: 6384px;">



            <div class="owl-item cloned" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/narendra-gogula.jpg" alt="image"></div>



                <h4>Narendra Gogula<span>Managing Director, Accenture</span></h4>



                <p>“Pi DATACENTERS will be the enabler of Digital India. With the explosive growth of mobile/cloud data and continuous evolution of Internet of Things in India, there is an urgent need for data centers leveraging cutting edge technology. With a vision of excellence in customer service and deep technology expertise, Pi DATACENTERS has the right leadership team to realize the exciting phase of Digital transformation in India.”</p>



              </div>



            </div>



            <div class="owl-item cloned" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/Satyanarayana-1.jpg" alt="image"></div>



                <h4>Shri. J Satyanarayana, IAS (Retd)<span>E-Governance, Electronics and IT, Advisor to Government of AP</span></h4>



                <p>“Pi is going to be a pioneer in infrastructure project and a critical contributor to the new state Andhra Pradesh and Digital India . It would play a crucial role in the growth of industry and share a key stage in development of e-Governance and e- Pragati.”</p>



              </div>



            </div>



            <div class="owl-item" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/tsml-1.jpg" alt="image"></div>



                <h4>Sridhar Gadhi<span>Founder &amp; CEO, Paradigm IT Group</span></h4>



                <p>“Pi built by the best brains in the industry is best poised to usher in the next generation evolution in the Digital space for both Andhra Pradesh &amp; India to unlock value for citizens &amp; enterprises alike”</p>



              </div>



            </div>



            <div class="owl-item active" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/sudheer.jpg" alt="image"></div>



                <h4>Sudheer Kuppam<span>Managing Partner - Epsilon Venture Partners<br>



                  ( Previously MD, Intel Capital APAC )</span></h4>



                <p>“Pi is bringing world class state-of-the-art datacenter and cloud hosting capabilities to India, at a critical time, when there is a much needed impetus to build the country's digital infrastructure. The young and aspirational India led data demand as well as the digitization initiatives driven by the state and central governments provide a fantastic opportunity for entrepreneurs &amp; businesses in the Indian cloud ecosystem. Pi is proud to be supporting a new digital India through its low latency solutions as well as fast &amp; elastic applications enabling interconnection of both businesses and governments to their customers and citizens respectively.”</p>



              </div>



            </div>



            <div class="owl-item" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/narendra-gogula.jpg" alt="image"></div>



                <h4>Narendra Gogula<span>Managing Director, Accenture</span></h4>



                <p>“Pi DATACENTERS will be the enabler of Digital India. With the explosive growth of mobile/cloud data and continuous evolution of Internet of Things in India, there is an urgent need for data centers leveraging cutting edge technology. With a vision of excellence in customer service and deep technology expertise, Pi DATACENTERS has the right leadership team to realize the exciting phase of Digital transformation in India.”</p>



              </div>



            </div>



            <div class="owl-item" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/Satyanarayana-1.jpg" alt="image"></div>



                <h4>Shri. J Satyanarayana, IAS (Retd)<span>E-Governance, Electronics and IT, Advisor to Government of AP</span></h4>



                <p>“Pi is going to be a pioneer in infrastructure project and a critical contributor to the new state Andhra Pradesh and Digital India . It would play a crucial role in the growth of industry and share a key stage in development of e-Governance and e- Pragati.”</p>



              </div>



            </div>



            <div class="owl-item cloned" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/tsml-1.jpg" alt="image"></div>



                <h4>Sridhar Gadhi<span>Founder &amp; CEO, Paradigm IT Group</span></h4>



                <p>“Pi built by the best brains in the industry is best poised to usher in the next generation evolution in the Digital space for both Andhra Pradesh &amp; India to unlock value for citizens &amp; enterprises alike”</p>



              </div>



            </div>



            <div class="owl-item cloned" style="width: 798px; margin-right: 0px;">



              <div class="item trans">



                <div class="pic"><img src="https://pidatacenters.com/wp-content/uploads/2015/08/sudheer.jpg" alt="image"></div>



                <h4>Sudheer Kuppam<span>Managing Partner - Epsilon Venture Partners<br>



                  ( Previously MD, Intel Capital APAC )</span></h4>



                <p>“Pi is bringing world class state-of-the-art datacenter and cloud hosting capabilities to India, at a critical time, when there is a much needed impetus to build the country's digital infrastructure. The young and aspirational India led data demand as well as the digitization initiatives driven by the state and central governments provide a fantastic opportunity for entrepreneurs &amp; businesses in the Indian cloud ecosystem. Pi is proud to be supporting a new digital India through its low latency solutions as well as fast &amp; elastic applications enabling interconnection of both businesses and governments to their customers and citizens respectively.”</p>



              </div>



            </div>



          </div>



        </div>



        <div class="owl-controls">



          <div class="owl-nav">



            <div class="owl-prev" style="">prev</div>



            <div class="owl-next" style="">next</div>



          </div>



          <div class="owl-dots" style="display: none;"></div>



        </div>



      </div>



    </div>



  </div>



</div>



<section class="home-sec-5">



  <div class="container clearfix">



    <h2>Learn how our product will benefit your business</h2>



    <a class="learnMore" href="https://pidatacenters.com/contact/">Get in Touch</a> </div>



</section>



<footer>



  <div class="container">



    <div class="footer-cnt">



      <ul class="footer-nav clearfix">



        <li>



          <h4>Products</h4>



          <ul>



            <li id="menu-item-105" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-105"><a href="https://pidatacenters.com/products/cloud-products/">Cloud Products</a></li>



            <li id="menu-item-106" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-106"><a href="https://pidatacenters.com/products/cloud-managed-services/">Cloud Managed Services</a></li>



            <li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-107"><a href="https://pidatacenters.com/products/remote-services/">Remote Services</a></li>



            <li id="menu-item-108" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-108"><a href="https://pidatacenters.com/products/self-service-provisioning/">Self Service Provisioning</a></li>



          </ul>



        </li>



        <li>



          <h4>Environment</h4>



          <ul>



            <li id="menu-item-110" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-110"><a href="https://pidatacenters.com/environments/frameworks/">Framework</a></li>



            <li id="menu-item-111" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-111"><a href="https://pidatacenters.com/environments/industry/">Industry Solutions</a></li>



          </ul>



        </li>



        <li>



          <h4>TCO</h4>



          <ul>



            <li id="menu-item-112" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-112"><a href="https://pidatacenters.com/tco/cloudonomics/">Cloudonomics</a></li>



            <li id="menu-item-113" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-113"><a href="https://pidatacenters.com/tco/power-consumption/">Power Consumption</a></li>



            <li id="menu-item-114" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-114"><a href="https://pidatacenters.com/tco/compute-usage/">Infrastructure Usage</a></li>



            <li id="menu-item-117" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-117"><a href="https://pidatacenters.com/tco/capex-opex/">Capex / Opex</a></li>



          </ul>



        </li>



        <li>



          <h4>Company</h4>



          <ul>



            <li id="menu-item-119" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-119"><a href="https://pidatacenters.com/">Home</a></li>



            <li id="menu-item-120" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item menu-item-120"><a href="https://pidatacenters.com/about-pi/">What Drives Us</a></li>



            <li id="menu-item-131" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-131"><a href="https://pidatacenters.com/about-pi/the-team/">The Team</a></li>



            <li id="menu-item-1447" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1447"><a href="https://pidatacenters.com/news/">News</a></li>



            <li id="menu-item-136" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136"><a href="https://pidatacenters.com/about-pi/careerpage/">Careers</a></li>



            <li id="menu-item-137" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-137"><a href="https://pidatacenters.com/about-pi/contact/">Reach Us</a></li>



            <li id="menu-item-879" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-879"><a href="https://pidatacenters.com/terms-conditions/">Terms &amp; Conditions</a></li>



            <li id="menu-item-881" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-881"><a href="https://pidatacenters.com/privacy-policy/">Privacy Policy</a></li>



          </ul>



        </li>



      </ul>



    </div>



    <div class="footer-bottom clearfix">



      <div class="lft">



        <p>©2016 Pi DATACENTERS Pvt. Ltd.    All rights reserved</p>



        <div class="social-icons"> <a target="_blank" href="https://www.linkedin.com/company/6437312?trk=tyah&amp;trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A6437312%2Cidx%3A1-1-1%2CtarId%3A1440322319243%2Ctas%3Api%20data" class="in"></a> <a target="_blank" href=" https://twitter.com/Pi_DATACENTERS" class="twr"></a> <a target="_blank" href="https://web.facebook.com/pidatacenters" class="fb"></a> </div>



      </div>



    </div>



  </div>



</footer>



<script>function checkVal(){if (document.getElementById('s').value == ""){return false;}}</script> 



<script>







function dst(cliks){document.getElementById(cliks).click();}







jQuery('#rfgtyh li').on('click', function(event){



	var ert=$(this).attr('id');



	//ert.off("click");



	//dst(ert);



});



jQuery('#myForm input').on('change', function() {



	if(jQuery('input[name="myRadio"]:checked')){



		jQuery("#card-details").css("display","block");



		jQuery("#card-detailsdebit, #card-detailspp").css("display","none");



		jQuery('#myFormdebit input[name="myRadio"]').prop('checked', false);



		jQuery('#myFormpp input[name="myRadio"]').prop('checked', false);



	}



});











jQuery('#myFormdebit input').on('change', function() {



	if(jQuery('input[name="myRadio"]:checked')){



		jQuery("#card-detailsdebit").css("display","block");



		jQuery("#card-details, #card-detailspp").css("display","none");



		jQuery('#myForm input[name="myRadio"]').prop('checked', false);



		jQuery('#myFormpp input[name="myRadio"]').prop('checked', false);



	}



});







jQuery('#myFormpp input').on('change', function() {



	if(jQuery('input[name="myRadio"]:checked')){



		jQuery("#card-detailspp").css("display","block");



		jQuery("#card-details, #card-detailsdebit").css("display","none");



		jQuery('#myForm input[name="myRadio"]').prop('checked', false);



		jQuery('#myFormdebit input[name="myRadio"]').prop('checked', false);



	}



});







jQuery('#register').click(function(){



		jQuery('#login-block').css("display","none");



		jQuery('#register-block').css("display","block");



});







jQuery('#cancelbut').click(function(){



		jQuery('#login-block').css("display","block");



		jQuery('#register-block').css("display","none");



});



jQuery('.jaganwsx').click(function(){



		jQuery('#login-block').css("display","block");



		jQuery('#register-block,#register-block_a, #forgotpw, #resetlogin_a, #resetlogin').css("display","none");



});







jQuery("#frpw").click(function(){



		jQuery('#forgotpw').css("display","block");



		jQuery('#register-block, #login-block').css("display","none");



		jQuery('#resetlogin').css("display", "blocik");



});







jQuery("#sendemail").click(function(){



		//jQuery('#register-block, #login-block, #forgotpw').css("display","none");



		//jQuery('#resetlogin').css("display", "block");



});











</script> 



<script type="text/javascript" src="js/tabs/easyResponsiveTabs.js"></script> 



<script type="text/javascript" src="js/tabs/jquery.nicescroll.min.js"></script> 



<script type="text/javascript" src="js/tabs/tabs.js"></script> 



<script type="text/javascript" src="js/custom-script.js"></script> 



<script>$(document).scroll(function(){t=$(this).scrollTop(),t>29?($("nav>ul>li > ul.sub-menu").addClass("upnav"),$(".single-menu .sub-menu").addClass("upnav-1")):($("nav>ul>li > ul.sub-menu").removeClass("upnav"),$(".single-menu .sub-menu").removeClass("upnav-1"))});</script> 



<script type='text/javascript' src='js/camera.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/owl.carousel.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/SmoothScroll-1.2.1.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/jquery.easing-sooper.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/skrollr.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/main.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/selectivizr-min.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/wp-embed.min.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/jquery.bpopup.min.js?ver=4.4.2'></script> 



<script type='text/javascript' src='js/validate.js?ver=4.4.2'></script> 



<script type="text/javascript" src="js/enscroll-0.6.1.min.js"></script> 



<script type="text/javascript" src="js/custom-script.js"></script> 



<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 



<script type="text/javascript">



var  pop_up_form;



document.getElementById('s').onkeydown = function(e){



   if(e.keyCode == 13){



	 setTimeout(function(){ $('#searchform').submit();}, 30);



	return true; 



   }



};



$( document ).ready(function() {



	$('.os-options .item .label').click(function() {



		$('.selected-os').removeClass('active');



		$('.selected-os').html("");



		$('.os-options .item .radio').removeClass('active');



		var selectedOS = $(this).text();



		$(this).closest('div.rpt_plan').find('.selected-os').addClass('active');



		$(this).closest('div.rpt_plan').find('.selected-os').html(selectedOS);



		$(this).parent('div.item').find('span.radio').addClass('active');



	});



	$('.os-options .item .radio').click(function() {



		$('.selected-os').removeClass('active');



		$('.selected-os').html("");			



		$('.os-options .item .radio').removeClass('active');



		var selectedOS = $(this).parent('div.item').find('span.label').text();



		$(this).addClass('active');



		$(this).closest('div.rpt_plan').find('.selected-os').addClass('active');



		$(this).closest('div.rpt_plan').find('.selected-os').html(selectedOS);



	});		



	$('.platform-options .item .label').click(function() {



		$('.selected-pltfm').removeClass('active');



		$('.selected-pltfm').html("");



		$('.platform-options .item .radio').removeClass('active');



		var selectedpltfm = $(this).text();



		$(this).closest('div.rpt_plan').find('.selected-pltfm').addClass('active');



		$(this).closest('div.rpt_plan').find('.selected-pltfm').html(selectedpltfm);



		$(this).parent('div.item').find('span.radio').addClass('active');



	});



	$('.platform-options .item .radio').click(function() {



		$('.selected-pltfm').removeClass('active');



		$('.selected-pltfm').html("");			



		$('.platform-options .item .radio').removeClass('active');



		var selectedpltfm = $(this).parent('div.item').find('span.label').text();



		$(this).addClass('active');



		$(this).closest('div.rpt_plan').find('.selected-pltfm').addClass('active');



		$(this).closest('div.rpt_plan').find('.selected-pltfm').html(selectedpltfm);



	});			



});



</script> 



<script type="text/javascript">



$( document ).ready(function() {



	$('a.rpt_foot').click(function(e) {



		e.preventDefault();



		if($(this).parent('.rpt_plan').find('.os-options').size() >0 && !$(this).parent('.rpt_plan').find('.selected-os').hasClass('active')){alert("Select OS to proceed"); return;}



		if($(this).parent('.rpt_plan').find('.platform-options').size() > 0 && !$(this).parent('.rpt_plan').find('.selected-pltfm').hasClass('active')){alert("Select Platform  to proceed"); return;}



		var optid = $(this).attr('href');



		$("#pricing_form #product option").each(function() {



			if (optid == $(this).data("optid")) {



				$(this).attr('selected', 'selected');



				var product_q = $(this).val();



				$('#pricing_form #product').val(product_q);



				$("#product-fill span").text(product_q);



				$("#product-fill").show();



			} 



		});



		var planTitle = $(this).parent().find('.rpt_title').text();



		$("#pricing_form #plan").val(planTitle);



		$("#plan-fill span").text(planTitle);



		$("#plan-fill").show();



		var price = $(this).parent().find('.rpt_price').text();	



		$("#pricing_form #price").val(price);



		var recurrence = $(this).parent().find('.rpt_recurrence').text();



		$("#pricing_form #recurrence").val(recurrence);



		var spec ='';



		$(this).parent().find('.rpt_feature').each(function(){



			if( $(this).find(".platform-options,.os-options").size()>0){return;}



			spec += $(this).html()+'<br>';



		});



		$("#pricing_form #productSpec").val(spec);



		var selectedOS = $(this).parent('.rpt_plan').find('.selected-os').text();



		$("#pricing_form #selectedOS").val(selectedOS);



		if (selectedOS != '' && selectedOS !== null && selectedOS !== undefined){$("#os-fill span").text(selectedOS);$("#os-fill").show();}



		var selectedpltfm = $(this).parent('.rpt_plan').find('.selected-pltfm').text();



		$("#pricing_form #selectedpltfm").val(selectedpltfm);		



		if (selectedpltfm != '' && selectedpltfm !== null && selectedpltfm !== undefined){$("#platform-fill span").text(selectedpltfm);$("#platform-fill").show();}



	});



});	



</script> 



<script> 



$(document).ready(function() {



  $(window).keydown(function(event){



    if( (event.keyCode == '13')){



      event.preventDefault();



      return false;



    }



  });



}); 



$(document).ready(function(){



	if(window.location.hash){



		var id = window.location.hash.slice(1);



		var HeadHeight = $('.header').outerHeight();



		$('html, body').animate({scrollTop: $("#" + id).offset().top -HeadHeight},2000);



	}



	



});	



</script> 



<script src="js/in.js" type="text/javascript"> lang: en_US</script> 



<script src="js/platform.js" async defer></script> 



<script>



	landscape = window.orientation ? window.orientation == 'landscape' : true;



	if (landscape && window.innerWidth < 3000 && window.innerWidth > 1000) {$(document).ready(function(){skrollr.init({forceHeight: true});});}



</script>



</body>



</html>







<?php }else{echo "You are not supposed to be here";}?>