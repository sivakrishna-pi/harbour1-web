<?php



session_cache_limiter('private, must-revalidate');

session_cache_expire(60);



?>







<?php include('findingfanny.php');include('anybodycandance2.php');

$baseurl="https://pidatacenters.com";

?>

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js" lang="en-US" prefix="og: https://ogp.me/ns#">

<!--<![endif]-->



<head>

<meta charset="UTF-8" />

<title>Welcome to Pi DATACENTERS</title>

<meta name="viewport" content="width=device-width">

<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="css/main.css">

<link rel="stylesheet" href="css/bootstrap.css">

<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>

<script src="js/vendor/modernizr-2.6.2.min.js"></script>

<link rel="stylesheet" href="css/owl.carousel.css">

<link rel="stylesheet" href="css/camera.css">

<link rel="stylesheet" href="css/responsive.css">

<link rel="stylesheet" href="css/menu.css">

<link rel="stylesheet" href="css/select.css">

<style type="text/css">

img.wp-smiley, img.emoji {

  display: inline !important;

  border: none !important;

  box-shadow: none !important;

  height: 1em !important;

  width: 1em !important;

  margin: 0 .07em !important;

  vertical-align: -0.1em !important;

  background: none !important;

  padding: 0 !important;

}

.pricing-table {

  padding: 0 !important;

}

.jaganindia select {

  display: inline;

  height: 24px;

  padding: 2px 2px 0 2px !important;

}

.cart-input {

  display: inline;

  height: 18px;

  line-height: 20px;

  padding: 2px;

  text-align: center !important;

}

.sum-table:after {

  content: "";

  display: block;

  height: 1px;

  widows: 100%;

  margin-top: -10px;

  border-bottom: 1px dotted #000;

}

.mainincv a img {

  width: 11px !important;

  height: 11px !important;

  float: none !important;

  margin: 0 0 0 0 !important;

  cursor: pointer;

}

.pricing-table h3, .product-name h4 {

  margin-bottom: 0 !important;

  text-transform: capitalize !important;

}

.cart-list li {

  text-align: left !important;

}

.thyrt{

  width:100% !important;

}

.thyrt td{

  padding:0 20px;

  text-align:left !important;

  font-weight: 600;

}

.cart-subtotal{

    color: #20641b !important;

    font-size: 14px;

    line-height: 25px;

    padding: 25px 10px 10px 10px !important;

    text-transform: capitalize;

  text-decoration:underline;

  

}

a.qazxcv, a.qazxcv:visited {

  min-width: 110px;

  height: 34px;

  cursor: pointer;

  font-size: 16px;

  transition: all 0.2s ease;

  padding: 7px 15px;

  text-decoration: none;

  color: #087100;

}

.main-total-price{color:#FFF !important;}

.main-cart {

    position: relative;

    padding: 80px 0; }

</style>

<link rel='stylesheet' id='rpt-css'  href='css/rpt_style.min.css?ver=4.4.2' type='text/css' media='all' />

<link rel="stylesheet" href="css/cart1.css">

<link rel="stylesheet" href="css/responsive-cart.css">

<script type='text/javascript' src='js/vendor/jquery-1.9.1.min.js?ver=4.4.2'></script>

<script type='text/javascript' src='js/jquery.easing.1.3.js?ver=4.4.2'></script>

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

  /* Tenure dropdown Change modal*/

.modal-content {
    -webkit-border-radius: 0;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 0;
    -moz-background-clip: padding;
    border-radius: 6px;
    background-clip: padding-box;
    -webkit-box-shadow: 0 0 40px rgba(0,0,0,.5);
    -moz-box-shadow: 0 0 40px rgba(0,0,0,.5);
    box-shadow: 0 0 40px rgba(0,0,0,.5);
    color: #000;
    background-color: #fff;
    border: rgba(0,0,0,0);
}
.modal-message .modal-dialog {
   /* width: 300px;*/
}
.modal-message .modal-body, .modal-message .modal-footer, .modal-message .modal-header, .modal-message .modal-title {
    background: 0 0;
    border: none;
    margin: 0;
    padding: 0 20px;
    text-align: center!important;
}

.modal-message .modal-title {
    font-size: 27px;
    color: #737373;
    margin-bottom: 3px;
    font-weight: 500;
}

.modal-message .modal-body {
    color: #262626;
        font-size: 18px;
}

.modal-message .modal-header {
    color: #fff;
    margin-bottom: 10px;
    padding: 15px 0 8px;
}
.modal-message .modal-header .fa, 
.modal-message .modal-header 
.glyphicon, .modal-message 
.modal-header .typcn, .modal-message .modal-header .wi {
    font-size: 30px;
}

.modal-message .modal-footer {
    margin: 25px 0 20px;
    padding-bottom: 10px;
}

.modal-backdrop.in {
    zoom: 1;
    filter: alpha(opacity=75);
    -webkit-opacity: .75;
    -moz-opacity: .75;
    opacity: .75;
}
.modal-backdrop {
    background-color: #fff;
}
.modal-message.modal-success .modal-header {
    color: #53a93f;
    border-bottom: 3px solid #a0d468;
}

.modal-message.modal-info .modal-header {
    color: #57b5e3;
    border-bottom: 3px solid #57b5e3;
}

.modal-message.modal-danger .modal-header {
    color: #d73d32;
    border-bottom: 3px solid #e46f61;
}

.modal-message.modal-warning .modal-header {
    color: #f4b400;
    border-bottom: 3px solid #ffce55;
}
.modal-success{
  top: 50%;
  transform: translateY(-50%);

}
@media (min-width: 768px)
{
.modal-dialog-success {
    width: 650px;
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
      <div class="header"  data-50=" margin-top:0" data-60="background:rgba(255,255,255,1); margin-top:-0">

        <div class="container clearfix">

          <div class="logo" data-50="width:180px;"> <a href="https://pidatacenters.com/"> <img src="https://pidatacenters.com/wp-content/uploads/2015/08/logo.png" alt="logo" style="width: 95%;"> </a> </div>

          <div class="header-rht" data-50="margin-top:29px">

            
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
    style="
    height: 100px;
    width: 100%;">
    <div id="prcing-cloud-servers2"></div>
    <div class="header-caption">

      <div class="container">

        <h1>&nbsp;</h1>

      </div>

    </div>

  </section>
    
 <!--script type="text/javascript">

 
  
    $(document).ready(function(){

     $('#terms-conditions-checkbox').change(function() {
        if ($(this).prop('checked')) {
           // alert("You have elected to show your checkout history."); //checked
           if($('.granddiscount').text().length>2){
            $('#modal-success').modal('show');
           }
            
        }
       // console.log($('.granddiscount').val);
        });

     $('.cloudSelectMonths').change(function() {
      var tenureewr = $(this).val();
                  if(tenureewr==3 || tenureewr==6||tenureewr==12){
                     $('#modal-promo').modal('show');
                    }
       // console.log($('.granddiscount').val);
        });
     });
   </script-->
<section class="pricing-table">

  <div class="main-cart"> 

    <!-- video background starts-->

    <div class="video-bg">

      <video autoplay loop muted poster="https://pidatacenters.com/wp-content/uploads/2015/08/product-vdo-cover1.jpg" id="background">

        <source src="https://pidatacenters.com/wp-content/uploads/2015/08/video1.mp4" type="video/mp4">

      </video>

      <div class="layer"></div>

    </div>

    <!-- video background ends -->
    <style type="text/css">
      .trbg2{

    /*background: #538428;*/
    font-size: 15px;
    color: #103150;
    padding: 0 0 10px 0;

      }
      .review-order-table{
        padding-bottom: 0px;
      }
      .review-order-table thead th {
    height: 47px;
    font-size: 16px;
   
    text-transform: uppercase;
    padding: 0 9px;
    font-weight: bold;
    text-align: left;
  }
  .review-order-table table {
    font-size: 16px;
    text-align: left;
    border-bottom: 1px solid #dfdfdf;
}
.review-order-table table tbody tr td {
    padding: 0px 0;
}
.pricing-table h4 {
    font-size: 17px;
    color: #16416d;
    font-weight: 700;
    margin-bottom: 10px;
    text-align: left;
 }
 .grprice-rt {
    float: left;
    width: 192px;
    background: #20641b none repeat scroll 0 0;
    padding: 7px;
    color: #fff;
    border-radius: 4px;
}
.asterik:after{
 content:"*";
color:red;    
}
    </style>

    <div class="wrapper-cart transbg" id="scrltopen">
      <div class="urcart">


        <h3 class="cart-title bold text-center">Selected Product</h3>

        <form action="finalcheckout.php" method="post" onsubmit="return validateForm()" id="form_validate" name="form_property" >
                    <div class="review-order-table">
        <table width="100%" cellpadding="0" cellspacing="0">

                <thead>

                  <tr class="brd trbg2">

                    <th style="    width: 42%;">Product Details</th>

                    <th style="    width: 42%; padding-left: 9%;">Tenure</th>

                    <th style="    width: 42%; padding-left: 9%;">Price</th>

                    <th>&nbsp;</th>

                  </tr>

                </thead>
                
              
                <?php if(count($plansSelected)!==''){ for($q=0;$q<count($plansSelected);$q++){?>
<tbody class="qwesr jaganindia">
                

                  <tr>

                    <td colspan="4"><h4 class="review-ord-subtitle bold"><?php echo $plansSelected[$q];?> </h4>

           
                    </td>

                  </tr>

                  <tr class="brd">

                    <td>
                    <ul class="cart-list">
                    <li> <h3 class="bold"> <?php echo $packselectedsub[$q];?></h3></li>
                     

              <?php

              if($packcpu[$q]!=='' && $packcpu[$q]!=='0')print('<label style="text-indent: 20px;"><b>CPU</b> : '.$packcpu[$q].' Cores</label><br>');

              if($packram[$q]!=='' && $packram[$q]!=='0')print('<label style="text-indent: 20px;"><b>RAM</b> : '.$packram[$q].' GB </label><br>');

              if($packspace[$q]!=='' && $packspace[$q]!=='0')print('<label style="text-indent: 20px;"><b>Disk Space</b> :'.$packspace[$q].' GB</label><br>');
              if($packdata[$q]!=='' && $packdata[$q]!=='0')print('<label style="text-indent: 20px;"><b>Data Transfer</b> :'.$packdata[$q].' GB</label><br>');
              if($packos[$q]!=='' && $packos[$q]!=='0')print('<label style="text-indent: 20px;"><b>OS</b> :'.$packos[$q].'</label><br>');

              if($packdb[$q]!=='' && $packdb[$q]!=='0'){                

                    if($packdb[$q]=="MS SQL Enterprise*"){
                      print('<label style="text-indent: 20px;"><b>Database</b> :</label><label class="asterik">MS SQL Enterprise</label><br>');
                      print('<label style="text-indent: 20px;"><font color="red">*</font>2 core license cost included</label><br>');
                  
                    }else if($packdb[$q]=="MS SQL Standard*"){

                      print('<label style="text-indent: 20px;"><b>Database</b> :</label><label class="asterik">MS SQL Standard</label><br>');
                     
                    print('<label style="text-indent: 20px;"><font color="red">*</font>2 core license cost included</label><br>');

                    }else if($packdb[$q]=="MS SQL Web*"){

                      print('<label style="text-indent: 20px;"><b>Database</b> :</label><label class="asterik">MS SQL Web</label><br>');
                     
                    print('<label style="text-indent: 20px;"><font color="red">*</font>2 core license cost included</label><br>');

                    }
                   
                  else{
                      print('<label style="text-indent: 20px;"><b>Database</b> :'.$packdb[$q].'</label><br>');
                  }
              }

              if($packbackup[$q]!=='' && $packbackup[$q]!=='0')print('<label style="text-indent: 20px;"><b>Backup</b> :'.$packbackup[$q].' GB</label><br>');

              //if($packserver[$q]!=='' && $packserver[$q]!=='0')print('<label style="text-indent: 20px;"><b>Server</b> : '.$packserver[$q].' Cores</label><br>');
              //if($packpower[$q]!=='' && $packpower[$q]!=='0')print('<label style="text-indent: 20px;"><b>Power</b> : '.$packpower[$q].' KVA</label><br>');
              
              if($packips[$q]!=='' && $packips[$q]!=='0')print('<label style="text-indent: 20px;"><b>Number of IPs</b> :'.$packips[$q].' </label><br>');
             if($packdrive[$q]!=='' && $packdrive[$q]!=='0') print('<label style="text-indent: 20px;"><b>Drive</b> :'.$packdrive[$q].' </label><br>');

              //if($planPrice[$q]!=='' && $planPrice[$q]!=='0')print('<br><span>Rs : '.$planPrice[$q].' / GB / Month</span>');

              ?>
              <br>
              <div class="jaganindia"><label style="text-indent: 20px;"><b class="">Quantity:</b></label>
            <span class="inline hello123"  style="padding-left:10px;">&nbsp;<img src="images/3546564.png" style="
    padding-bottom: 6px;
"></span>&nbsp;
            <input type="number" name="packqtt[]" value=<?php echo '"'.$qtt[$q].'"';?> class="incss changepricings123 inline" min="1" max="10" step="1" readonly="readonly">
            <span class="inline hello1234">&nbsp;<img src="images/3546565.png" style="
    padding-bottom: 6px;
"></span></div>
            
            </ul>
                    </td>

                   <?php 
    
                 // echo $packselectedsub[$q]; 
                 // echo 'Enterprise Dedicated Servers - E3';  
if(($packselectedsub[$q]=='Enterprise Dedicated Servers - E3')|| ($packselectedsub[$q]=='Enterprise Dedicated Servers - E5')){
                  /*echo $packtenureprice[$q];
                  echo ",";
                  echo $ip[$q];
                  echo ",";
                  echo $data_total[$q];
                  echo ",";
                  echo $packmonths[$q];*/

                   
                 if($packmonths[$q]==1){$otc = ($packtenureprice[$q]+$ip[$q]+$data_total[$q])*2;}
                   else if($packmonths[$q]==3){$otc = ($packtenureprice[$q]+$ip[$q]+$data_total[$q])*2;}
                   else if($packmonths[$q]==6){$otc = ($packtenureprice[$q]+$ip[$q]+$data_total[$q])*1.5;} 
                   else if($packmonths[$q]==12){$otc = ($packtenureprice[$q]+$ip[$q]+$data_total[$q]);}
                   else if($packmonths[$q]==24){$otc = ($packtenureprice[$q]+$ip[$q]+$data_total[$q]);}
                   else if($packmonths[$q]==36){$otc = ($packtenureprice[$q]+$ip[$q]+$data_total[$q]);}
                    }else{
                      $otc = 0;

                    }
                    $otc_item = round($otc); ?>

                    <td>
                    <input type="hidden" name="packid[]" class="packid" value="<?php echo $packid[$q];?>">
                      <input type="hidden" name="packprice[]" class="packprice" value="<?php echo $packtenureprice[$q];?>">
                      <input type="hidden" name="planprice[]" class="planprice" value="<?php echo $planprice2[$q];?>">
            <input type="hidden" name="packcpu1[]" class="packcpu1" value="<?php echo $cpu_total[$q]; ?>">
      <input type="hidden" name="packcpu2[]" class="packcpu2" value="<?php echo $ram_total[$q];?>">
      <input type="hidden" name="packcpu3[]" class="packcpu3" value="<?php echo $space_total[$q];?>">
      <input type="hidden" name="packcpu4[]" class="packcpu4" value="<?php echo $data_total[$q];?>">
       <input type="hidden" name="packipn[]" class="packipn" value="<?php echo $ip[$q];?>">
<input type="hidden" name="packips[]" class="packips" value="<?php echo $ip_num[$q];?>">
      

                     <input type="hidden" name="packselected[]" class="packselected" value="<?php echo $plansSelected[$q];?>">
            <input type="hidden" name="packselectedsub[]" class="packselectedsub" value="<?php echo $packselectedsub[$q];?>">


            <input type="hidden" name="packcpu[]" class="packcpu" value="<?php echo $packcpu[$q];?>">

            <input type="hidden" name="packram[]" class="packram" value="<?php echo $packram[$q];?>">

            <input type="hidden" name="packdata[]" class="packdata" value="<?php echo $packdata[$q];?>">

            <input type="hidden" name="packspace[]" class="packspace" value="<?php echo $packspace[$q];?>">


            <input type="hidden" name="packbackup[]" class="packbackup" value="<?php echo $packbackup[$q];?>">
            <input type="hidden" name="packipn[]" class="packipn" value="<?php echo $ip_total[$q];?>">
            <input type="hidden" name="packos[]" class="packos" value="<?php echo $packos[$q];?>">
            <input type="hidden" name="packdb[]" class="packdb" value="<?php echo $packdb[$q];?>">

            <input type="hidden" name="packdrive[]" class="packdrive" value="<?php echo $packdrive[$q];?>">
            <input type="hidden" name="packserver[]" class="packserver" value="<?php echo $packserver[$q];?>">
            <input type="hidden" name="packpower[]" class="packpower" value="<?php echo $packpower[$q];?>">
            <input type="hidden" name="packdrivecode[]" class="packdrivecode" value="<?php echo $packdrivecode[$q];?>">
           

            <input type="hidden" name="plantotal[]" class="plantotal" value="<?php echo $planprice2[$q];?>">
            <input type="hidden" name="packtenure[]" class="packtenure" value="<?php echo $tenure[$q];?>">

            <input type="hidden" name="packtenureprice[]" class="packtenureprice" value="<?php echo $packtenureprice[$q];?>">
            <input type="hidden" name="packip_total[]" class="packip_total" value="<?php echo $packip_total[$q];?>">
      <input type="hidden" name="packbackup_total[]" class="packbackup_total" value="<?php echo $packbackup_total[$q];?>">
      <input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="<?php echo $packdatabase_total[$q];?>">
     <input type="hidden" name="packos_total[]" class="packos_total" value="<?php echo $packos_total[$q];?>">
     <input type="hidden" name = "otc123[]" class="otc123" value="<?php echo $otc_item;?>">
<?php
 $discount =0;
 
    
     $discount_total[] = $discount;
?>
        <input type="hidden" name="plandiscount[]" class="plandiscount" value="<?php echo round($discount);?>">
    



                      <br>

                    <select class="packmonths changepricing finselet <?php  if($packselectedsub[$q]=='Cloud Server'){ echo 'cloudSelectMonths';}?>" id="monthspack" name="packmonths[]">

                      <?php 
                      if(($packselectedsub[$q]!='Enterprise Dedicated Servers - E3')&&($packselectedsub[$q]!='Enterprise Dedicated Servers - E5')){
                        print('<option value="1"'); 
                        if($tenure=='1'){
                          print(selected(1,$tenure));
                        }
                        print('>Monthly</option>');
                      }
                      ?>


                      
                      <option <?php echo selected(3,$packmonths[$q]); ?> value="3">1 year (Quarterly Advance)</option>

                      <option value="6" <?php echo selected(6,$packmonths[$q]); ?> >1 year (50% Advance)</option>

                      <option value="12" <?php echo selected(12,$packmonths[$q]); ?> >1 year (100% Advance) </option>

                      <option value="24" <?php echo selected(24,$packmonths[$q]); ?> >2 year (100% Advance) </option>

                      <option value="36" <?php echo selected(36,$packmonths[$q]); ?> >3 year (100% Advance)</option>

                      

                    </select>
                    <br>
                    <br>
                   <label style="color: #20641b;font-weight: bold;font-size: 14px; max-width: 79%;}" class="myterms123"> 
                   <?php if($packmonths[$q]==1){echo "Total bill is for first month only. Subsequent invoices will be generated on monthly basis hereafter. Unless there is a cancellation.";}
                   else if($packmonths[$q]==3){echo "Total bill is for first quarter only. Subsequent invoices will be generated on quarterly basis hereafter.";}
                   else if($packmonths[$q]==6){echo "Total bill is for first six months only. Subsequent invoices will be generated on quarterly basis hereafter.";} 
                   else if($packmonths[$q]==12){echo "Total bill is for the period of one year in full.";}
                   else if($packmonths[$q]==24){echo "Total bill is for the period of two year in full.";}
                   else if($packmonths[$q]==36){echo "Total bill is for the period of three year in full.";}?></label>



                    </td>

                    <td style="float: right;
    padding-right: 14px;">Rs <span class="subbrtor"><?php echo $planprice2[$q];?></span></td>

                    <td><a href="javascript:void(0)" class="finclose"><img src="images/close-bold-icon.png"></a></td>

                  </tr>
                 <tr> </tr>


                </tbody>


                <?php }?>

              </table>

              


            </div>



        <?php }else{?>

      <center><div class="row-cart"><h3 class="bold">Start carting</h3></div></center>

        <?php  $planprice_array[] = $packprice;
               //$planprice_array[] =0;
$otc_item_array[] = $otc;}?>


        <!-- grand total block starts-->


        <div class="gr-total">

          <div class="gr-price">

            <div class="pramotional-code">

              <!--<input type="text" placeholder="Promotional Code">

              <button>Apply Code</button>-->

            </div>
<input type="checkbox" id="terms-conditions-checkbox" name="terms" style="margin-left: -97%;"> I have read and agree to the following <a target="_blank" href="https://pidatacenters.com/terms-conditions/" rel="nofollow" >Terms and conditions</a>

            
<div style="margin-left: 64%;">
<table>
  
           <!-- <h5 class="bold" style="    margin-top: -2%; text-align: right;"> Total : &nbsp;&nbsp; Rs <span class="grandtrunk">0</span>/-</h5>-->
          <tr class="grprice-rt" style="width: 100%; margin-top: 5px; background: #59971b;">
                 
              <td style="float: left;">
              <p class="main-total-price">
                <span class="bold" style="float:left">Total : </span> 
                </p>
              </td>
              <td style="float: right;">
              <p class="main-total-price">
                <span class="bold" style="float:right">Rs  <span class="grandtrunk">0</span>/-</span>
                </p>
              </td>
              
         
      </tr>

        <tr class="grprice-rt" style="width: 100%; margin-top: 5px; display: none; background: #59971b;">
                 
              <td style="float: left;">
              <p class="main-total-price">
                <span class="bold" style="float:left">Discount : </span> 
                </p>
              </td>
              <td style="float: right;">
              <p class="main-total-price">
                <span class="bold" style="float:right">Rs  <span class="granddiscount"><?php array_sum($discount_total) ?></span>/-</span>
                </p>
              </td>
              
         
      </tr>
             <tr class="grprice-rt" style="width: 100%; margin-top: 5px; background: #18294a;">
                 
              <td style="float: left;">
              <p class="main-total-price">
                <span class="bold" style="float:left">OTC : </span> 
                </p>
              </td>
              <td style="float: right;">
              <p class="main-total-price">
                <span class="bold" style="float:right">Rs  <span class="otctotal">0</span>/-</span>
                </p>
              </td>         
            </tr>
            
           <!-- <br>
            <h5 class="bold" style="margin-top: -3%; text-align: right;"> GST (15%) : &nbsp;&nbsp; Rs <span class="grandtax">0</span>/-</h5><br>-->
            <tr class="grprice-rt" style="background: #59971b; width: 100%; margin-top: 5px; padding: 4px;" >
            
              
              <td style="float: left;"> 
              <p class="main-total-price">
                <span class="bold" style="float:left; font-size: 13px;">GST (18%) : </span> 
              </p>
              </td>
              <td style="float: right;">
              <p class="main-total-price">
                <span class="bold" style="float:right; font-size: 13px;"">Rs  <span class="grandtax" style="font-size: 13px;">0</span>/-</span>
              </p>
              </td>
              
        
      </tr>
      
      <br>
      <br>
      
     <tr class="grprice-rt" style=" background: #18294a; width: 100%; margin-top: 5px;" >
              
              <td style="float: left;">
              <p class="main-total-price"> 
                <span class="bold" style="float:left">Grand Total : </span> 
                </p>
              </td>
              <td style="float: right;">
              <p class="main-total-price">
                <span class="bold" style="float:right">Rs  <span class="grandtrunk2">0</span>/-</span>
                </p>
              </td>
              
        
      </tr>
 
 </table>
  </div>          

          </div>
          <style type="text/css">
          .terms{
            text-align: left;
          }
                .terms2{
                  text-align: left;
                  color: red;
                  font-size: 14px;
                 
                }
                .term{
                  text-align: left;
                   margin-top:-20px;
                  padding-bottom: 10px;
                }
              </style>
          
          <div class="row-cart">

            <div class="cart-buttons">

              <a href="pricing_cloud_servers.php" class="cancel-anch bold">Cancel</a>

              <a class="bold sverrbtn" href="#"  role="button" href="javascript:void(0)" >Save</a>

              <button class="bold budgfgtton" onclick="popup()" type="submit">Pay now</button>

            </div>

          </div>

        </div>

        <!-- grand total block ends --> 

        </form>

      </div>

    </div>

  </div>

</section>
<script type="text/javascript">
  /*$(document).on('change', '.changepricing', function(event){

    var myt=$(this).parents('.jaganindia').find('.changepricing').val();
    //$terms = $(this).parents('.jaganindia').find('.myterms123');
    alert("hello");

    iif(myt=='3'){$(this).parents('.jaganindia').find('.myterms123').text("Total bill is for first quarter only. Subsequent invoices will be generated on Quarterly basis hereafter.");}
        else if(myt=='6'){price=price;}
        else if(myt=='12'){price=price;}
        else if(myt=='24'){price=price;}

        else if(myt=='36'){price=price;}

        else if(myt=='48'){price=price;}
    //$(this).parents('.jaganindia').find('.planprice').val();
  });*/

</script>

<div class="pop-call"><span class="icon"></span><span class="dial-number"><a href="tel:+914067456663">+91 40 67456663</a> <a href="tel:+914067456664">+91 40 67456664</a></span></div>

<div class="quotes row-001">
  <div class="container">
    <h1 class="txt-2">Industry Speaks</h1>
    <div class="tsml carousel-nav ">
      <div class="carousel-tsml">
        <div class="item trans">
          <div class="pic"><img src="<?php echo $baseurl;?>/wp-content/uploads/2015/08/tsml-1.jpg" alt="image" /></div>
          <h4>Sridhar Gadhi<span>Founder & CEO, Paradigm IT Group</span></h4>
          <p>“Pi built by the best brains in the industry is best poised to usher in the next generation evolution in the Digital space for both Andhra Pradesh & India to unlock value for citizens & enterprises alike”</p>
        </div>
        <div class="item trans">
          <div class="pic"><img src="<?php echo $baseurl;?>/wp-content/uploads/2015/08/sudheer.jpg" alt="image" /></div>
          <h4>Sudheer Kuppam<span>Managing Partner - Epsilon Venture Partners<br>
            ( Previously MD, Intel Capital APAC )</span></h4>
          <p>“Pi is bringing world class state-of-the-art datacenter and cloud hosting capabilities to India, at a critical time, when there is a much needed impetus to build the country's digital infrastructure. The young and aspirational India led data demand as well as the digitization initiatives driven by the state and central governments provide a fantastic opportunity for entrepreneurs & businesses in the Indian cloud ecosystem. Pi is proud to be supporting a new digital India through its low latency solutions as well as fast & elastic applications enabling interconnection of both businesses and governments to their customers and citizens respectively.”</p>
        </div>
        <div class="item trans">
          <div class="pic"><img src="<?php echo $baseurl;?>/wp-content/uploads/2015/08/narendra-gogula.jpg" alt="image" /></div>
          <h4>Narendra Gogula<span>Managing Director, Accenture</span></h4>
          <p>“Pi DATACENTERS will be the enabler of Digital India. With the explosive growth of mobile/cloud data and continuous evolution of Internet of Things in India, there is an urgent need for data centers leveraging cutting edge technology. With a vision of excellence in customer service and deep technology expertise, Pi DATACENTERS has the right leadership team to realize the exciting phase of Digital transformation in India.”</p>
        </div>
        <div class="item trans">
          <div class="pic"><img src="<?php echo $baseurl;?>/wp-content/uploads/2015/08/Satyanarayana-1.jpg" alt="image" /></div>
          <h4>Shri. J Satyanarayana, IAS (Retd)<span>Chairperson, UIDAI</span></h4>
          <p>“Pi is going to be a pioneer in infrastructure project and a critical contributor to the new state Andhra Pradesh and Digital India . It would play a crucial role in the growth of industry and share a key stage in development of e-Governance and e- Pragati.”</p>
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

<script type="text/javascript" src="js/custom-script_v4.js?20102017123"></script> 

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

<script type="text/javascript">

var  pop_up_form;

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
jQuery(window).load(function() {
jQuery('.carousel-tsml').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    dots: false,
    dotsEach: false,
    smartSpeed: 1000,
    responsiveClass: true,
    autoHeight: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
                        //nav:false
                    },
                    500: {
                        items: 1
                        //nav:false
                    },
                    700: {
                        items: 1
                        //nav:false
                    },
                    900: {
                        items: 1
                        //nav:false
                    },
                }
            });
});

  landscape = window.orientation ? window.orientation == 'landscape' : true;

  if (landscape && window.innerWidth < 3000 && window.innerWidth > 1000) {$(document).ready(function(){skrollr.init({forceHeight: true});});}

</script>

<!--  Terms and Conditions PopUp select modal -->
        <div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" data-keyboard="false" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-success">
            <div class="modal-content">
                <!--div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div-->
                <div class="modal-title">&nbsp;</div>
                <div class="modal-body">By Proceeding further, you agree for a one year lock-in period, under this promotional offer</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Proceed</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
</div>
<!--  End of Terms and Conditions PopUp select modal  -->

<div id="modal-promo" class="modal modal-message modal-success fade" style="display: none;" data-keyboard="false" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-success">
            <div class="modal-content">
                <!--div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div-->
                <div class="modal-title">&nbsp;</div>
                <div class="modal-body">You just saved 50% under the promo offer, for one year contract of cloud servers. Your price benefit would be displayed at the time of check-out.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
</div>


<div class="modal fade modeone" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog urorder">

    <div class="saveur-order"> 

      <!-- video background starts-->

      <div class="video-bg">

        <video autoplay loop muted poster="<?php echo $baseurl;?>/wp-content/uploads/2015/08/product-vdo-cover1.jpg" id="background">

          <source src="<?php echo $baseurl;?>/wp-content/uploads/2015/08/video1.mp4" type="video/mp4">

        </video>

        <div class="layer"></div>

      </div>

      <!-- video background ends --> 

      <!-- popup wrapper starts-->

      <div class="popup-body"> <a type="button" class="saveclose close" data-dismiss="modal" aria-label="Close"> <img src="images/close_a.png"> </a>

        <div class="wrapper-cart" id="wrapper-cart">

          <div class="savorder-in">

            <h3 class="bold text-center">SAVE YOUR ORDER</h3>

            <!-- form starts-->

             <form class="ty67">

              <div class="savediv"> <img src="images/industry-icon.png">

                <input type="text" placeholder="Company / Organization Name" name="copmans" required='required'>

              </div>

              <div class="savediv"> <img src="images/user-icon.png">

                <input type="text" placeholder="Enter Your Name" name="svname" required='required'>

              </div>

              <div class="div-save">

                <div class="savediv"> <img src="images/mobile-icon.png">

                  <input type="text" placeholder="Mobile Number" name="svmob" required='required'>

                </div>

                <div class="savediv"> <img src="images/email-icon.png">

                  <input type="text" placeholder="Email" name="emailll" required='required'>

                </div>

              </div>

              <div>

                <input class="savesubmit bold " type="button" value="SUBMIT"  id="sub-save">

                <p id="demo"></p>

              </div>

            </form>

            <!-- form ends --> 

          </div>

        </div>

        

        <!-- onclick ok and cancel starts-->

        <div class="confirm-box" id="confirm-box">

          <div class="confirm-box-in">

            <div class="article-box">

              <article class="text-center clickok"> <span class="glyphicon glyphicon-ok-circle"></span>

                <p>Your order has been successfully saved<br>

                  Please check your inbox <span class="green dfgdfgfgdf"></span></p>

              </article>

              <center>

                <button type="button" onclick="redirectpricing()" class="savesubmit_b resettrg" data-dismiss="modal" aria-label="Close"> OK </button>

              </center>

            </div>

          </div>

        </div>

        <!-- onclick ok and cancel ends--> 

        

        <!-- onclick submit primary confirmbox starts-->

        <div class="confirm-box" id="primary-confirm-box">

          <div class="confirm-box-in">

            <div class="article-box">

              <article class="text-center clickok">

                <p>You order would be saved, for you to proceed on your next login.<br>To proceed further, please follow the link in your inbox.<br><span class="green dfgdfgfgdf"></span></p>

              </article>

              <center>

                <!--<button type="button" class="savesubmit_b"  id="kkbut"> OK </button>-->

                <button type="button" class="savesubmit_b resettrg" data-dismiss="modal" aria-label="Close"> OK </button>

                <button type="button" class="savesubmit_b" data-dismiss="modal" aria-label="Close"> CANCEL </button>

              </center>

            </div>

          </div>

        </div>

        <!-- onclick submit primary confirmbox ends--> 

        () </div>

      <!-- popup wrapper ends --> 

    </div>

  </div>

</div>

<script>function checkVal(){if (document.getElementById('s').value == ""){return false;}}</script> 

<script>

function validateForm()

{

 var x=parseInt($('.grandtrunk').text());
  var y=parseInt($('.grandtrunk2').text());

  if (x==null || x==""|| x<="0"|| x=="NAN" || x=="Nan" || isNaN(x) || y==null || y==""|| y<="0"|| isNaN(y)){


    alert("Select atleast one plan before you proceed");

    window.location.href = '<?php echo $baseurl;?>/pidata/p/pricing_cloud_servers.php';

    return false;

  }else if(!$('input[name=terms]').is(':checked')) {
      alert("To proceed further, please accept terms and conditions");
      $('input[name=terms]').focus();
      return false;
    }
    

  else if((x >'0')&&$('input[name=terms]').is(':checked')){return true;}

}

function validateForm2()

{

  var x=parseInt($('.grandtrunk').text());

  if (x==null || x==""|| x<="0"){

    alert("Select atleast one plan before you proceed");

    window.location.href = '<?php echo $baseurl;?>/pidata/p/pricing_cloud_servers.php';

    return false;

  }
    

  else if((x >'0')){return true;}

}


function checkemail(str){

  var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i

  if (filter.test(str)){testresults=true}

  else{testresults=false}

  return (testresults)

}

$(document).ready(function(){

  $("#sub-save").click(function(){

    validateForm();

    var phoneno = /^\d{10}$/;

    if($('input[name="copmans"]').val().length=='0'){alert("Enter Company Name");return false;}

    else if($('input[name="svname"]').val().length=='0'){alert("Enter Your Name");return false;}

    else if(!$('input[name="svmob"]').val().match(phoneno)){alert("Enter Correct Mobile Number");return false;}

    else if(!checkemail($('input[name="emailll"]').val())){alert("Enter Correct Email ID");return false;}

    else{
      $("#sub-save").prop('disabled', true);


      var data = new FormData($('#form_validate')[0]);

      data.append("copmans", $('input[name="copmans"]').val());

      data.append("svname", $('input[name="svname"]').val());

      data.append("svmob", $('input[name="svmob"]').val());

      data.append("emailll", $('input[name="emailll"]').val());

      $.ajax({

      url: 'plans/orders_save.php',

      type: "POST",

      data: data,

      processData: false,

      contentType: false,

      success: function(result){

        $(".dfgdfgfgdf").text($('input[name="emailll"]').val());

        $(".savorder-in").css("display","none");

        $("#primary-confirm-box").css("display","block");

      }

      });

    }

    

    });

  });

  $(".sverrbtn").click(function(){

    if(validateForm2()){ $("#login-modal").modal();}

  });

  $("#kkbut").click(function(){

    $("#primary-confirm-box").css("display","none");

    $("#confirm-box").css("display","block");

    

    });

  $(document).on('click', '.servadrs', function(event){

    $infiad=$(this).parent().find('.incss');

    if((parseFloat($infiad.val())+1) >'1'){

      $(this).parent().find('.servless').fadeIn();

    }

    else{

     $(this).parent().find('.servless').hide();

    }

  });

  $(document).on('click', '.servless', function(event){

    $infiad=$(this).parent().find('.incss');

    if((parseFloat($infiad.val())-1) >'1'){

      $(this).parent().find('.servless').fadeIn();

    }else{

       $(this).parent().find('.servless').hide();

    }

  });

</script> 

</body>

</html>