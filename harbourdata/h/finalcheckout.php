<?php



session_cache_limiter('private, must-revalidate');

session_cache_expire(60);
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



?>

<?php include('findingfanny.php');include('anybodycandance.php');

$baseurl="https://pidatacenters.com";

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
<script src="js/locationv3.js"></script>
<style>

.forgotpw{

  color:#087100 !important;

  }

.forgotpw:hover{

  color:#fff !important;

  

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

#register-block_a, #resetlogin_a,.makepaymdnt_a,#dffhdf_a {

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

  border:1px solid #FFF;

}



</style>

 <style>
.num2 {
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
    .num2 {
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

<div class="num2">
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
    

<div class="main-cart">

  <div class="video-bg" >

    <video autoplay loop muted poster="https://pidatacenters.com/wp-content/uploads/2015/08/product-vdo-cover1.jpg" id="background">

      <source src="https://pidatacenters.com/wp-content/uploads/2015/08/video1.mp4" type="video/mp4">

    </video>

    <div class="layer" id="Make_Payment"></div>

  </div>

  <form method="post" onsubmit="return validateForma()" id="form_validate" name="form_property" action="<?php echo $baseurl;?>/pidata/p/plans/orders.php">

    <div class="wrapper-cart transbg">

      <div class="VerticalTab fc_VerticalTab VerticalTab_1 tabs_ver_1">

        <ul class="resp-tabs-list hor_1" id='rfgtyh'>

          <li class="tabs-1" id="tabs-1"><span class="num">1</span>Login / Register</li>

          <li class="tabs-2" id="tabs-2"><span class="num">2</span>Confirm Address</li>

          <li class="tabs-3" id="tabs-3"><span class="num">3</span>Review Order</li>

          <li class="tabs-4" id="tabs-4"><span class="num">4</span>Make Payment</li>

        </ul>

        <div class="resp-tabs-container hor_1">

          <div class="fc-tab-1">

            <h2 class="title_contanier">Login / Register</h2>

            <!--login and register content starts -->

            <div class="tab-content">

              

              <div class="confirm-address errrormessage_f"> 

                <!-- login starts-->

                <p class="errrormessage" style="color:#F00" align="center"></p>

                <div class="log-register" id="dffhdf_a">

                  <div class="col-md-12">

                    <article class="churmail text-center">

                      <p style="margin:0;"><span class="glyphicon glyphicon-ok-circle"></span></p>

                      <p>Login successful!<br> Happy carting</p>

                      <!--<a href="javascript:void(0)"  class="bold jaganwsx qazxcv white-by" style="margin-right:5px;">Click to login</a> </article>-->

                  </div>

                </div>

                <div class="log-register" id="login-block">

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>User name <span class="redstar">*</span></label>

                      <input type="text" name="uname">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>Password<span class="redstar">*</span></label>

                      <input type="password" name="password">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="row">

                      <div class="col-md-5 mrgtop"> <a href="javascript:void(0)" class="save-submit bold loginajax qazxcv">LOGIN</a> </div>

                      <div class="col-md-6 col-md-offset-1"><a class="forgotpw bold" href="javascript:void(0)" id="frpw">forgot password ?</a></div>

                    </div>

                  </div>

                  <div class="col-md-12 mrgtoptwo">

                    <p class="acc">Don’t have an account?<a class="forgotpw bold" id="register" href="javascript:void(0)">Register</a></p>

                  </div>

                </div>

                <!-- login ends --> 

                

                <!-- register starts-->

                <div class="log-register" id="register-block">

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>Name<span class="redstar">*</span></label>

                      <input type="text" name="emrname" class="">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>Company Name<span class="redstar">*</span></label>

                      <input type="text" name="emrcompany" class="">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>Email<span class="redstar">*</span></label>

                      <input type="text" name="emr" class="">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>Mobile no.<span class="redstar">*</span></label>

                      <input type="text" name="emoble" class="">

                    </div>

                  </div>

                  <div class="col-md-12"> </div>

                  <div class="col-md-12 mrgtoptwo">

                    <div class="row">

                      <div class="col-md-12 mrgtop"> <a href="javascript:void(0)"  class="save-submit bold loginajax_reg qazxcv" style="margin-right:5px;">REGISTER</a> <a href="javascript:void(0)"  class="save-submit bold qazxcv" id="cancelbut">CANCEL</a> </div>

                    </div>

                  </div>

                </div>

                <div class="log-register" id="register-block_a">

                  <div class="col-md-12">

                    <article class="churmail text-center">

                      <p style="margin:0;"><span class="glyphicon glyphicon-ok-circle"></span></p>

                      <p>Thank you for Registering!!<br>Kindly check your inbox to proceed.</p>

                      <a href="javascript:void(0)" class="bold jaganwsx qazxcv white-by" style="margin-right:5px;">Click to Login</a> </article>

                  </div>

                </div>

                <!-- register ends--> 

                

                <!-- forgot password starts-->

                <div class="log-register" id="forgotpw">

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>Email ID<span class="redstar">*</span></label>

                      <input type="text" name="repem">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="row">

                      <div class="col-md-12 mrgtop"> <a href="javascript:void(0)"  class="save-submit bold qazxcv" id="forgtpasswdrd">SEND EMAIL</a> <a href="javascript:void(0)"  class="save-submit bold qazxcv jaganwsx" id="cancelbut">CANCEL</a> </div>

                    </div>

                  </div>

                </div>

                <!-- forgot password ends --> 

                

                <!-- reset and login starts-->

                <div class="log-register" id="resetlogin">

                  <div class="col-md-12">

                    <article class="churmail text-center">

                      <p style="margin:0;"><span class="glyphicon glyphicon-ok-circle"></span></p>

                      <p>Please check your email to reset password</p>

                    </article>

                  </div>

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>Enter Code <span class="redstar">*</span></label>

                      <input type="text" name="frcode">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="log-div ">

                      <label>New Password<span class="redstar">*</span></label>

                      <input type="password" name="frpass">

                    </div>

                  </div>

                  <div class="col-md-12">

                    <div class="row">

                      <div class="col-md-12 mrgtop"> <a href="javascript:void(0)"  class="save-submit bold resetpassworddd qazxcv">RESET &amp; LOGIN</a> <a href="javascript:void(0)"  class="save-submit bold qazxcv jaganwsx">CANCEL</a></div>

                    </div>

                  </div>

                </div>

                <div class="log-register" id="resetlogin_a">

                  <div class="col-md-12">

                    <article class="churmail text-center">

                      <p style="margin:0;"><span class="glyphicon glyphicon-ok-circle"></span></p>

                      <p>Password reset successful</p>

                      <a href="javascript:void(0)"  class="bold jaganwsx qazxcv white-by" style="margin-right:5px;">Click to Login</a> </article>

                  </div>

                </div>

                

                <!-- reset and login ends --> 

              </div>

            </div>

            <!-- Login and register contnet ends  --> 

            

          </div>

          <div class="fc-tab-2">

            <h2 class="title_contanier">Confirm Address</h2>

            <!-- confirm addres starts -->

            <div class="tab-content">

              <div class="confirm-address">

                <p class="errrormessage" style="color:#F00" align="center"></p>

                

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Full Name<span class="redstar">*</span></label>

                    <input type="text"  name="fullname">

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Designation<span class="redstar">*</span></label>

                    <input type="text"  name="designation">

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Company Name <span class="redstar">*</span></label>

                    <input type="text" name="company_name" >

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Industry<span class="redstar">*</span></label>

                    <select name="industry">

                     <option style="display:none;" selected></option>

                       <option value="Accounting">Accounting</option>

                        <option value="Advertising">Advertising</option>

                        <option value="Aerospace">Aerospace</option>

                        <option value="Agriculture/ Agribusiness ">Agriculture / Agribusiness</option>

                        <option value="Apparel / Accessories">Apparel / Accessories</option>

                        <option value="Automobile">Automobile</option>

                        <option value="BFSI">BFSI</option>

                        <option value="Biotechnology">Biotechnology</option>

                        <option value="Chemical">Chemical</option>

                        <option value="Civil">Civil</option>

                        <option value="Consulting">Consulting</option>

                        <option value="Consumer Products">Consumer Products</option>

                        <option value="E-Commerce">E-Commerce</option>

                        <option value="Education">Education</option>

                        <option value="Electronics">Electronics</option>

                        <option value="Energy">Energy</option>

                        <option value="Entertainment / Recreation">Entertainment / Recreation</option>

                        <option value="Fashion / Beauty">Fashion / Beauty</option>

                        <option value="Food / Beverage">Food / Beverage</option>

                        <option value="Gaming">Gaming</option>

                        <option value="Government / PSU">Government / PSU</option>

                        <option value="Healthcare / Pharma">Healthcare / Pharma</option>

                        <option value="IT/ITES">IT/ITES</option>

                        <option value="Legal Services">Legal Services</option>

                        <option value="Manufacturing">Manufacturing</option>

                        <option value="Media / Broadcasting">Media / Broadcasting</option>

                        <option value="Motion Pictures / Video">Motion Pictures / Video</option>

                        <option value="Public Relations">Public Relations</option>

                        <option value="Real Estate">Real Estate</option>

                        <option value="Retail">Retail</option>

                        <option value="Sports">Sports</option>

                        <option value="Tele Communications">Tele Communications</option>

                        <option value="Tourism / Travel">Tourism / Travel</option>

                        <option value="Web Services">Web Services</option>

                        <option value="Others">Others</option>

          </select>

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Address Type<span class="redstar">*</span></label>

                    <select name="addtype">

                      <option style="display:none;" selected></option>

                      <option value="Home/Personal">Home/ Personal</option>

                      <option value="Office/Commercial">Office/ Commercial</option>

                    </select>

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Address Line 1 <span class="redstar">*</span></label>

                    <input type="text"  name="add1">

          <input type="hidden" name="add2">

                  </div>

                </div>
                
                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Country<span class="redstar">*</span></label>

                    <select name="country" class="countries" id="countryId">
                        <option value="">Select Country</option>                       
                    </select>
                    <input type="hidden" name="country_v2" id="country_v2">

                  </div>

                </div>
         

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>State<span class="redstar">*</span></label>

                    <select name="state" class="states" id="stateId">
                            <option value="">Select State</option>
                    </select>
                    <input type="hidden" name="state_v2" id="state_v2">

                  </div>

                </div>
                <div class="col-md-6">

                  <div class="log-div ">

                   <label>City / Town<span class="redstar">*</span></label>

                     <!--<select name="city" class="cities" >
                        <option value="">Select City</option>
                    </select>-->

                    <input type="text"  name="city">

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="log-div ">

                    <label>Pincode <span class="redstar">*</span></label>

                    <input type="text"  name="pincode">

                  </div>

                </div>

                <div class="col-md-12" align="right"> <a href="javascript:void(0)"  class="save-submit bold qazxcv" onClick="validatechedgi()">Continue </a> </div>

              </div>

              <!-- confirm address ends --> 

            </div>

            <!-- confirm address ends --> 

          </div>

          <div class="fc-tab-3">

            <h2 class="title_contanier">Review Order</h2>

            <!-- review order table starts-->

            <div class="review-order-table">

              <table width="100%" cellpadding="0" cellspacing="0">

                <thead>

                  <tr class="brd trbg">

                    <th>Product Details</th>
                    <th>Quantity</th>

                    <th>Tenure</th>

                    <th style="width: 18%;padding-left: 7%;">Price</th>

                    <th>&nbsp;</th>

                  </tr>

                </thead>

                <?php for($q=0;$q<count($packid);$q++){?>

                <tbody class="qwesr">

                  <tr>

                    <td colspan="4"><h4 class="review-ord-subtitle bold"><?php echo $plansSelected[$q];?> </h4></td>

                  </tr>

                  <tr class="">

                    <td><label class="dbmargin2"> <?php echo $packselectedsub[$q];?></label></td>
                    <td><span style="padding-left: 12px;"><?php echo $qtt[$q];?> Units</span></td>

                    <td>

                    <input type="hidden" name="packid[]" class="packid" value="<?php echo $packid[$q];?>">
                      <input type="hidden" name="packprice[]" class="packprice" value="<?php echo $packtenureprice[$q];?>">
                      <input type="hidden" name="planprice[]" class="planprice" value="<?php echo $planPrice[$q];?>">
            <input type="hidden" name="packcpu1[]" class="packcpu1" value="<?php echo $cpu_total[$q]; ?>">
      <input type="hidden" name="packcpu2[]" class="packcpu2" value="<?php echo $ram_total[$q];?>">
      <input type="hidden" name="packcpu3[]" class="packcpu3" value="<?php echo $space_total[$q];?>">
      <input type="hidden" name="packcpu4[]" class="packcpu4" value="<?php echo $data_total[$q];?>">
       <input type="hidden" name="packipn[]" class="packipn" value="<?php echo $ip[$q];?>">
<input type="hidden" name="packips[]" class="packips" value="<?php echo $packips[$q];?>">
      

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
     <input type="hidden" name = "otc123[]" class="otc123" value="<?php echo $otc_item[$q];?>">
     <?php
 $discount =0;
 
    
     $discount_total[] = $discount;
?>
        <input type="hidden" name="plandiscount[]" class="plandiscount" value="<?php echo round($discount);?>">



                      <input type="hidden"  class="packmonths changepricing " name="packmonths[]" value="<?php echo $packmonths[$q];?>">

                      <input type="hidden"  class="incss changepricings123 " name="packqtt[]" value="<?php echo $qtt[$q];?>">

                       <span style="padding-left: 12px;"><?php if($packmonths[$q]==1){echo "Monthly";}
                       else if($packmonths[$q]==3){
                        echo "1 year (Quarterly Advance)";

                       }else if($packmonths[$q]==6){
                        echo "1 year (50% Advance)";
                       }else if($packmonths[$q]==12){
                        echo "1 year (100% Advance)";
                      }else if($packmonths[$q]==24){
                        echo "2 year (100% Advance)";
                      }else if($packmonths[$q]==36){
                        echo "3 year (100% Advance)";
                      }
                       ?> </span><br>

                    </td>

                    <td style="float: right;
    padding-right: 14px;">Rs <span class="subbrtor"><?php echo $planprice2[$q];?></span></td>

                    <td><a href="javascript:void(0)" class="finclose"><img src="images/close-bold-icon.png"></a></td>

                  </tr>
                  <tr >
                  
                  <th colspan="3"> <div class="myspan"><label  style="color: #20641b;font-weight: bold;font-size: 14px; }" class="myterms123 dbmargin2"> 
                   <?php if($packmonths[$q]==1){echo "Total bill is for first month only. Subsequent invoices will be generated on monthly basis hereafter. Unless there is a cancellation.";}
                   else if($packmonths[$q]==3){echo "Total bill is for first quarter only. Subsequent invoices will be generated on quarterly basis hereafter.";}
                   else if($packmonths[$q]==6){echo "Total bill is for first six months only. Subsequent invoices will be generated on quarterly basis hereafter.";} 
                   else if($packmonths[$q]==12){echo "Total bill is for the period of one year in full.";}
                   else if($packmonths[$q]==24){echo "Total bill is for the period of two year in full.";}
                   else if($packmonths[$q]==36){echo "Total bill is for the period of three year in full.";}?></label></div>
</th>

</tr>
<tr class="brd">
<th  colspan="5" >&nbsp;</th>

</tr>
                  

                </tbody>



                <?php }?>

              </table>

              
    

<!--
          <div class="review-price pull-right" style="    margin-right: 10px;">
            <table>
              <tr>
                <td>
                  <h4>Total : </h4>
                </td>
                <td style="float: right;">
                  <h4>
                    <span class="bold"> Rs <span class="grandtrunk"><?php //echo array_sum($planprice2);?></span> /-</span>
                  </h4>
                </td>                
              </tr>

              <tr>
                <td>
                  <h5 class="bold" style="padding-bottom: 10px;">
                      Service Tax (15%) :
                  </h5>
                </td>
                <td style="float: right;">
                  <h5 class="bold" style="padding-bottom: 10px;"> Rs <span class="grandtax">0</span>/-</h5>
                </td>               
             </tr>
<style type="text/css">
.grprice-rt2 {
   
   
    background: #20641b none repeat scroll 0 0;
    padding: 7px;
    color: #fff;
    border-radius: 4px;
}

</style>
 
              <tr class="grprice-rt2" style="width: inherit;">
                <td>
                    <label class="bold" style="    padding-bottom: 4px;
    padding-top: 10px;
    padding-left: 8px; font-size: 18px;">
                        Grand Total :
                    </label>               
                </td>

                <td  style="float: right;" >
                  <label class="bold" style="    padding-bottom: 4px;
    padding-top: 10px;
    padding-right: 8px; font-size: 18px;"> Rs <span class="grandtrunk2">0</span>/-</label>
                </td>
                  
              </tr>

              
 
              <!--<tr>
              <td>
                <div class="grprice-rt" style="width: inherit;">
                  <p class="main-total-price"> <span class="bold" style="float:left;color: #fff;">Grand Total &nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="bold" style="float:right">Rs  <span class="grandtrunk2">0</span>/-</span></p>
                </div>
                </td>
              </tr>-->
<!--
            </table>

          </div>
-->
<style type="text/css">
  .grprice-rt{

    float: right;
    width: inherit;
    background: #20641b none repeat scroll 0 0;
    /* padding: 15px; */
    /* padding: 5px; */
    color: #fff;
    border-radius: 4px;
    padding: 2px;
    padding-left: 6px;
    padding-right: 8px;
}
</style>
<div style="margin-left: 54%;     margin-left: 47%;
    padding-right: 32px;">
<table>
  
           <!-- <h5 class="bold" style="    margin-top: -2%; text-align: right;"> Total : &nbsp;&nbsp; Rs <span class="grandtrunk">0</span>/-</h5>-->
           <tr class="grprice-rt" style="width: 100%; margin-top: 5px; background: #59971b; ">
                 
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

       <tr class="grprice-rt" style="width: 100%; margin-top: 5px; display: none; background: #59971b; ">
                 
              <td style="float: left;">
              <p class="main-total-price">
                <span class="bold" style="float:left">Discount : </span> 
                </p>
              </td>
              <td style="float: right;">
              <p class="main-total-price">
                <span class="bold" style="float:right">Rs  <span class="granddiscount">0</span>/-</span>
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
            <h5 class="bold" style="margin-top: -3%; text-align: right;"> Service Tax (15%) : &nbsp;&nbsp; Rs <span class="grandtax">0</span>/-</h5><br>-->
            <tr class="grprice-rt" style="background: #59971b; width: 100%; margin-top: 5px; padding: 0px; padding-left: 6px;
    padding-right: 8px;" >
            
              
              <td style="float: left;"> 
              <p class="main-total-price">
                <span class="bold" style="float:left; font-size: 13px;">Service Tax (15%) : </span> 
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

    
            <br>
          

            <div class="col-md-12 pb15" style="padding-top: 18px;" align="right"> <a href="#Make_Payment"  class="save-submit bold qazxcv" style="margin-right: 29px;" onClick="validateForm('tabs-4');">Continue </a> </div>
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
          
            <!-- review order table ends --> 

          </div>

          <div class="fc-tab-4">

            <h2 class="title_contanier">Make Payment</h2>

            <!-- Make Payment starts -->

            <div class="log-register makepaymdnt_a">

<div class="col-md-12">

<article class="churmail text-center">

<p style="margin:0;"><span class="glyphicon glyphicon-ok-circle"></span></p>

<p>Thank you!!<br>Our team would reach out to you in next 24hrs, to help proceed further.</p>

<a href="<?php echo $baseurl;?>/pidata/p/pricing_cloud_servers.php"  class="bold qazxcv white-by">Close</a>

</article>

</div>

</div>

            <div class="makepaymdnt">

              <p class="errrormessage" style="color:#F00" align="center"></p>

              <div id="errorringforms"></div>

              <div class="pay-title">

                <h3 class="bold pull-left">You pay</h3>

                <h4 class="bold pull-right">Rs <span class="grandtrunk2"><?php echo moneyFormatIndia
              (
                (array_sum($planprice2)+
                  ((int)array_sum($otc_item)))+(int)
                ((
                  ((int)array_sum($planprice2))+
                  ((int)array_sum($otc_item))

                
              )*0.18))
            ;?></span></h4>

              </div>

              <div class="col-md-12">

                <label>

                  <input type="radio" checked="checked" name="type_payment" value="online" onClick="changetst('Make Payment');">

                  Online Payment</label>

                <label>

                  <input type="radio" name="type_payment" value="offline" onClick="changetst('Make Request');">

                  Offline Payment</label>

                <p><small>Offline payment can be through Cheque, Demand Draft</small></p>

              </div>

              <div class="col-md-12">

                <button class="revew-but bold finalbtns" style="float:right;" type="submit">Make Payment</button>

              </div>

              <?php /*?><ul class="payment-method">

              <li>

                <p class="payp">Pay Using Credit Card</p>

                <div class="cards">

                  <form id="myForm">

                    <span>

                    <input type="radio" id="radio-button" value="1" name="myRadio">

                    <img src="images/visa-card.png"> </span> <span>

                    <input type="radio" name="myRadio">

                    <img src="images/master-card-icon.png"> </span> <span>

                    <input type="radio" name="myRadio">

                    <img src="images/american-card.png"> </span>

                  </form>

                </div>

                <div class="card-details confirm-address" id="card-details">

                  <div class="col-md-6">

                    <div class="log-div ">

                      <label>Card Number<span class="redstar">*</span></label>

                      <input type="text">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="log-div ">

                      <label>Expiry <span class="redstar">*</span></label>

                      <select class="sel-card">

                        <option>Month</option>

                        <option>January</option>

                        <option>February</option>

                        <option>March</option>

                      </select>

                      <select class="sel-card">

                        <option>Year</option>

                        <option>2017</option>

                        <option>2018</option>

                        <option>2019</option>

                      </select>

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="log-div ">

                      <label>CVV <span class="redstar">*</span></label>

                      <input class="cvv" type="text">

                    </div>

                  </div>

                  <div class="col-md-6"> <a href="payment-ack.html" class="revew-but bold" style="float:left;">Make Payment</a> <img src="images/verified-icon.png"> </div>

                </div>

              </li>

              <li>

                <p class="payp">Pay Using Debit Card</p>

                <div class="cards">

                  <form id="myFormdebit">

                    <span>

                    <input type="radio" id="radio-button" value="1" name="myRadio">

                    <img src="images/visa-card.png"> </span> <span>

                    <input type="radio" name="myRadio">

                    <img src="images/master-card-icon.png"> </span> <span>

                    <input type="radio" name="myRadio">

                    <img src="images/american-card.png"> </span>

                  </form>

                </div>

                <div class="card-details confirm-address" id="card-detailsdebit">

                  <div class="col-md-6">

                    <div class="log-div ">

                      <label>Card Number<span class="redstar">*</span></label>

                      <input type="text">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="log-div ">

                      <label>Expiry <span class="redstar">*</span></label>

                      <select class="sel-card">

                        <option>Month</option>

                        <option>January</option>

                        <option>February</option>

                        <option>March</option>

                      </select>

                      <select class="sel-card">

                        <option>Year</option>

                        <option>2017</option>

                        <option>2018</option>

                        <option>2019</option>

                      </select>

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="log-div ">

                      <label>CVV <span class="redstar">*</span></label>

                      <input class="cvv" type="text">

                    </div>

                  </div>

                  <div class="col-md-6"> <a href="payment-ack.html" class="revew-but bold" style="float:left;">Make Payment</a> <img src="images/verified-icon.png"> </div>

                </div>

              </li>

              <li>

                <p class="payp">Pay Using Paypal</p>

                <div class="cards">

                  <form id="myFormpp">

                    <span>

                    <input type="radio" id="radio-button" value="1" name="myRadio">

                    <img src="images/paypal-icon.png"> </span>

                  </form>

                </div>

                <div class="card-details confirm-address" id="card-detailspp">

                  <div class="col-md-6">

                    <div class="log-div ">

                      <label>Card Number<span class="redstar">*</span></label>

                      <input type="text">

                    </div>

                  </div>

                  <div class="col-md-6">

                    <div class="log-div ">

                      <label>Expiry <span class="redstar">*</span></label>

                      <select class="sel-card">

                        <option>Month</option>

                        <option>January</option>

                        <option>February</option>

                        <option>March</option>

                      </select>

                      <select class="sel-card">

                        <option>Year</option>

                        <option>2017</option>

                        <option>2018</option>

                        <option>2019</option>

                      </select>

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="log-div ">

                      <label>CVV <span class="redstar">*</span></label>

                      <input class="cvv" type="text">

                    </div>

                  </div>

                  <div class="col-md-6"> <a href="payment-ack.html" class="revew-but bold" style="float:left;">Make Payment</a> </div>

                </div>

              </li>

            </ul><?php */?>

            </div>

            

            <!-- Make Payment ends --> 

          </div>

        </div>

      </div>

      <!-- End .HorizontalTab --> 

      

      <!-- user account tab ends --> 

    </div>

  </form>

</div>

<style type="text/css">
  h1.txt-2 {
    font-size: 29px;
    color: #323131;
    font-weight: 400;
    margin-bottom: 13px;
}
</style>
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

<script>function checkVal(){if (document.getElementById('s').value == ""){return false;}}</script> 

<script>



function dst(cliks){document.getElementById(cliks).click();}

function changetst(msx){$(".finalbtns").text(msx);}

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

<script type="text/javascript" src="js/custom-script_v4.js?2010201712"></script> 

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

<script>

$(document).ready(function() {

    $(".loginajax_reg").click(function(event){

    if(checkemailb($('input[name="emr"]').val()) && $('input[name="emrname"]').val()!='' && $('input[name="emrcompany"]').val()!=''){

      if(checkmobilee($('input[name="emoble"]').val())){

      event.preventDefault();

      $.ajax({

        url: 'plans/login.php',

        type: "POST",

        cache:false,

        async:false,

        data: 'altype=reg&emr='+$('input[name="emr"]').val()+'&emoble='+$('input[name="emoble"]').val()+'&enamee_a='+$('input[name="emrname"]').val()+'&ecomo_a='+$('input[name="emrcompany"]').val(),

        success: function(result){

          if(result.trim()=='0') $('.errrormessage').text("Error in registering! Kindly try later.");

          else if(result.trim()=='1') $('.errrormessage').text("Your Email ID is already registered.");

          else{

            $('.errrormessage').text("");

            jQuery('#register-block, #login-block, #forgotpw').css("display","none");

            jQuery('#register-block_a').css("display", "block");

          };

        }

      });

      }else alert('Kindly enter valid Mobile Number');

    }else alert('Kindly enter valid Email ID or Business Email ID and fill the name and Company Name');

  });

    $(".resetpassworddd").click(function(event){

      $(".resetpassworddd").prop('disabled', true);


      if($('input[name="frpass"]').val().length >=8){

        event.preventDefault();

        $.ajax({

          url: 'plans/login.php',

          type: "POST",

          cache:false,

          async:false,

          data: 'altype=changepass&fremail='+$('input[name="repem"]').val()+'&frcode='+$('input[name="frcode"]').val()+'&frpass='+$('input[name="frpass"]').val(),

          success: function(result){
            $(".resetpassworddd").prop('disabled', false);

            if(result.trim()=='0') $('.errrormessage').text("Error in requesting new password! Kindly try later.");

            else if(result.trim()=='1') $('.errrormessage').text("Your Email ID and code does not match.");

            else{

              $('.errrormessage').text("");

              jQuery('#register-block, #resetlogin, #forgotpw').css("display","none");

              jQuery('#resetlogin_a').css("display", "block");

            };

          }

        });

      }else alert('Password should be min. 8 characters ');

  });

    $("#forgtpasswdrd").click(function(event){


    if(checkemail($('input[name="repem"]').val())){
      $("#forgtpasswdrd").prop('disabled', true);
      event.preventDefault();

      $.ajax({

        url: 'plans/login.php',

        type: "POST",

        cache:false,

        async:false,

        data: 'altype=passreq&repem='+$('input[name="repem"]').val(),

        success: function(result){
          $("#forgtpasswdrd").prop('disabled', false);

          if(result.trim()=='0') $('.errrormessage').text("Error in requesting new password! Kindly try later.");

          else if(result.trim()=='1') $('.errrormessage').text("Your Email ID is not registered with us.");

          else{

            $('.errrormessage').text("");

            jQuery('#register-block, #login-block, #forgotpw').css("display","none");

            jQuery('#resetlogin').css("display", "block");

          };

        }

      });

    }else alert('kindly enter valid Email ID');

  });

    $(".loginajax").click(function(event){
      //$("#forgtpasswdrd").prop('disabled', true);

    event.preventDefault();

    $.ajax({

      url: 'plans/login.php',

      type: "POST",

      cache:false,

      async:false,

      data: 'altype=logg&uname='+$('input[name="uname"]').val()+'&password='+$('input[name="password"]').val(),

      success: function(result){

        if(result.trim()=='0') $('.errrormessage').text("Error in login! Kindly try later.");

        if(result.trim()=='1') $('.errrormessage').text("Incorrect login details");

        else{

          $('.errrormessage').text("");

          jQuery('#register-block, #login-block, #forgotpw').css("display","none");

          jQuery('#dffhdf_a').css("display", "block");

          var resul=JSON.parse(result);

          setCookie("auth_user", resul.auth_id, 1);

          setCookie("auth_token", resul.auth_token, 1);

          setCookie("auth_type", resul.auth_type, 1);

          var fullname=resul.fullname;

          var designation=resul.designation;

          var company_name=resul.company_name;

          var industry=resul.industry;

          var addresstype=resul.addresstype;

          var address=resul.address;

          var city=resul.city;

          var country=resul.country;
          var state=resul.state;
          var pincode=resul.pincode;

          var fullname=resul.fullname;

          var userId=resul.$usalias;

          $('input[name="fullname"]').val(fullname);

          $('input[name="designation"]').val(designation);

          $('input[name="company_name"]').val(company_name);

          $('select[name="industry"]').val(industry);

          $('select[name="addtype"]').val(addresstype);

          $('input[name="add1"]').val(address);

          

          $('select[name="addtype"]').val(addresstype);

          //$('select[name="state"]').val(state);

          //$('input[name="pincode"]').val(pincode);

          //dst('tabs-2');
          $('select[name="country"]').val(country);

          $("#country_v2").val(country);
          $('select[name="country"]').trigger("change");

         
          //$('select[name="state"]').text(state);

          $('input[name="pincode"]').val(pincode);

           $('select[name="state"]').val(state);
           $("#state_v2").val(state);
           $('select[name="state"]').trigger("change");
           //$('select[name="city"]').val(city);
           $('input[name="city"]').val(city);


          dst('tabs-2');
          $('select[name="state"]').val(state);

          }

        }

    });

  });

});



var testresults

function checkemail(str){

  var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i

  if (filter.test(str)){testresults=true}

  else{testresults=false}

  return (testresults)

}

function checkemailb(str){
  var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
  var reg = /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!mailinator.com)(?!hotmail.com)(?!yahoo.co.in)(?!aol.com)(?!abc.com)(?!xyz.com)(?!pqr.com)(?!rediffmail.com)(?!live.com)(?!outlook.com)(?!me.com)(?!msn.com)(?!ymail.com)([\w-]+\.)+[\w-]{2,4})?$/;

  if (filter.test(str)){
    if (reg.test(str)){
    testresults=true;
  }
    }

  else{testresults=false}
  return (testresults)
}

function checkmobilee(str){

  var phoneno = /^\d{10}$/;

  if (!str.match(phoneno)){testresults=false}

  else{testresults=true}

  return (testresults)

}



function validatechedgi(){ var meg=0;

  var t11=$('select[name="industry"]').val().length;

  var t12=$('select[name="addtype"]').val().length;

  var t13=$('select[name="state"]').val().length;

  if($('input[name="fullname"]').val().length=='0'){meg="Enter Full Name";}

  else if($('input[name="designation"]').val().length=='0'){meg="Enter Designation";}

  else if($('input[name="company_name"]').val().length=='0'){meg="Enter Company Name";}

  else if(t11=='0'){meg="Select Industry";}

  else if(t12=='0'){meg="Enter Address Type";}

  else if($('input[name="add1"]').val().length=='0'){meg="Enter Address";}

  else if($('input[name="city"]').val().length=='0'){meg="Enter City";}

  else if(t13=='0'){meg="Enter State";}

  else if($('input[name="pincode"]').val().length=='0'){meg="Enter Pincode";}

  else{meg="";dst('tabs-3');}

  if(meg!='0') $('.errrormessage').text(meg); 

}

function validateForm(idd)

{

 var x=parseInt($('.grandtrunk').text());
  var y=parseInt($('.grandtrunk2').text());

  if (x==null || x==""|| x<="0"|| x=="NAN" || x=="Nan" || isNaN(x) || y==null || y==""|| y<="0"|| isNaN(y)){


    alert("Select atleast one Plan before Checkout");

    window.location.href = '<?php echo $baseurl;?>/pidata/p/pricing_cloud_servers.php';

    return false;

  }

  else if(x >'0'){dst(idd);return true;}

}

function validateForma(e){

  
  if($('select[name="industry"]').length){var t11=$('select[name="industry"]').val().length;}else{t11=0;}

  if($('select[name="addtype"]').length){var t12=$('select[name="addtype"]').val().length;}else{t12=0;}

  if($('select[name="state"]').length){var t13=$('select[name="state"]').val().length;}else{t13=0;}

  

  if($('input[name="industry"]').length){var t11_a=$('input[name="industry"]').val().length;if(t11_a!='0')t11=1;}

  if($('input[name="addtype"]').length){var t12_a=$('input[name="addtype"]').val().length;if(t12_a!='0')t12=1;}

  if($('input[name="state"]').length){var t13_a=$('input[name="state"]').val().length;if(t13_a!='0')t13=1;}

  var x=parseInt($('.grandtrunk').text());

  if($('input[name="fullname"]').val().length=='0'){meg="Enter Full Name";$('.errrormessage').text(meg);return false;}

  else if($('input[name="designation"]').val().length=='0'){meg="Enter Designation";$('.errrormessage').text(meg);return false;}

  else if($('input[name="company_name"]').val().length=='0'){meg="Enter Company Name";$('.errrormessage').text(meg);return false;}

  else if(t11=='0' || t11_a=='0'){meg="Select Industry";$('.errrormessage').text(meg);return false;}

  else if(t12=='0' || t12_a=='0'){meg="Enter Address Type";$('.errrormessage').text(meg);return false;}

  else if($('input[name="add1"]').val().length=='0'){meg="Enter Address";$('.errrormessage').text(meg);return false;}

  else if($('input[name="city"]').val().length=='0'){meg="Enter City";$('.errrormessage').text(meg);return false;}

  else if(t13=='0' || t13_a=='0'){meg="Enter State";$('.errrormessage').text(meg);return false;}

  else if($('input[name="pincode"]').val().length=='0'){meg="Enter Pincode";$('.errrormessage').text(meg);return false;}

  else if(x==null || x==""|| x<="0"){alert("Select atleast one plan before checkout");window.location.href = '<?php echo $baseurl;?>/pidata/p/demo4.php';return false;}

  else{

    return true;
/*    event.preventDefault();

    var data = new FormData($('#form_validate')[0]);

    $.ajax({

    url: 'plans/orders.php',

    type: "POST",

    data: data,

    processData: false,

    contentType: false,

    success: function(result){

      if(result.trim()=='0') $('.errrormessage').text("Something Went Wrong! Try Again Later");

      if(result.trim()=='1') $('.errrormessage').text("Incorrect Login Details");

      else{

        $('.errrormessage').text("");

        jQuery('.makepaymdnt').css("display","none");

        jQuery('.makepaymdnt_a').css("display", "block");

      }

    }

    });

    return false;

*/  }

}





</script>

</body>

</html>