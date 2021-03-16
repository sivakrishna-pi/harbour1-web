<?php 



include('findingfanny.php');

if(isset($_REQUEST['a']) && mysqli_real_escape_string($mr_con,$_REQUEST['a'])!='' && mysqli_real_escape_string($mr_con,$_REQUEST['a'])!='0'){

	$user=alias(mysqli_real_escape_string($mr_con,$_REQUEST['a']),'lj_logins','alias','id');

	if($user!=''&&$user!='0'){$usern=mysqli_real_escape_string($mr_con,$_REQUEST['a']);}else{$usern=0;}

}else{$usern=0;}

?><!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js" lang="en-US" prefix="og: https://ogp.me/ns#">

<!--<![endif]-->



<head>

<meta charset="UTF-8" />

<title>Reach Us - Pi DATACENTERS</title>

<link rel="profile" href="https://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php echo $baseurl;?>/xmlrpc.php" />

<meta name="viewport" content="width=device-width">

<link rel="shortcut icon" href="<?php echo $baseurl;?>/wp-content/themes/pidata/favicon.ico">

<link rel="stylesheet" href="css/main.css">

<link rel="stylesheet" href="css/bootstrap.css">

<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>

<script src="js/vendor/modernizr-2.6.2.min.js"></script>

<link rel="stylesheet" href="css/owl.carousel.css">

<link rel="stylesheet" href="css/camera.css">

<link rel="stylesheet" href="css/responsive.css">

<link rel="stylesheet" href="css/menu.css">

<link rel="stylesheet" href="css/select.css">

<script type="text/javascript">

            var get_template_directory_uri = '<?php echo $baseurl;?>/wp-content/themes/pidata';

        </script>



<!-- This site is optimized with the Yoast SEO plugin v3.0.7 - https://yoast.com/wordpress/plugins/seo/ -->

<link rel="canonical" href="<?php echo $baseurl;?>/about-pi/contact/" />

<meta property="og:locale" content="en_US" />

<meta property="og:type" content="article" />

<meta property="og:title" content="Reach Us - Pi DATACENTERS" />

<meta property="og:url" content="<?php echo $baseurl;?>/about-pi/contact/" />

<meta property="og:site_name" content="Pi DATACENTERS" />

<meta name="twitter:card" content="summary"/>

<meta name="twitter:title" content="Reach Us - Pi DATACENTERS"/>

<!-- / Yoast SEO plugin. -->



<link rel="alternate" type="application/rss+xml" title="Pi DATACENTERS &raquo; Reach Us Comments Feed" href="<?php echo $baseurl;?>/about-pi/contact/feed/" />

<script type="text/javascript">

			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"https:\/\/pidatacenters.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.4.2"}};

			!function(a,b,c){function d(a){var c,d=b.createElement("canvas"),e=d.getContext&&d.getContext("2d"),f=String.fromCharCode;return e&&e.fillText?(e.textBaseline="top",e.font="600 32px Arial","flag"===a?(e.fillText(f(55356,56806,55356,56826),0,0),d.toDataURL().length>3e3):"diversity"===a?(e.fillText(f(55356,57221),0,0),c=e.getImageData(16,16,1,1).data.toString(),e.fillText(f(55356,57221,55356,57343),0,0),c!==e.getImageData(16,16,1,1).data.toString()):("simple"===a?e.fillText(f(55357,56835),0,0):e.fillText(f(55356,57135),0,0),0!==e.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag"),unicode8:d("unicode8"),diversity:d("diversity")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag&&c.supports.unicode8&&c.supports.diversity||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);

		</script>

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

.rfv1{display:block;line-height:30px;color:#103150;font-weight:600;margin-top:-15px;}

.rfv{

	line-height:25px;

	vertical-align:middle;

	padding:0 5px;

}

input[type="radio"]{

	width:auto !important;

	height:auto !important;

	padding:0 5px;

	vertical-align:middle;

	}

</style>

<link rel='stylesheet' id='rpt-css'  href='css/rpt_style.min.css?ver=4.4.2' type='text/css' media='all' />

<script type='text/javascript' src='js/vendor/jquery-1.9.1.min.js?ver=4.4.2'></script>

<script type='text/javascript' src='js/jquery.easing.1.3.js?ver=4.4.2'></script>

<link rel='https://api.w.org/' href='<?php echo $baseurl;?>/wp-json/' />

<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo $baseurl;?>/xmlrpc.php?rsd" />

<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo $baseurl;?>/wp-includes/wlwmanifest.xml" />

<meta name="generator" content="WordPress 4.4.2" />

<link rel='shortlink' href='<?php echo $baseurl;?>/?p=103' />

<link rel="alternate" type="application/json+oembed" href="<?php echo $baseurl;?>/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpidatacenters.com%2Fabout-pi%2Fcontact%2F" />

<link rel="alternate" type="text/xml+oembed" href="<?php echo $baseurl;?>/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpidatacenters.com%2Fabout-pi%2Fcontact%2F&#038;format=xml" />

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-66937172-1', 'auto');

  ga('send', 'pageview');



</script>

</head>



<body class="page page-id-103 page-child parent-pageid-2 page-template page-template-tmplt-contactus page-template-tmplt-contactus-php">

<header class="hdr-home clearfix">

  <div class="header trans" data-0="background:rgba(1, 27, 47, 0); margin-top:0" data-50=" margin-top:0" data-60="background:rgba(255, 255, 255, 1); margin-top:-0">

    <div class="container clearfix">

      <div class="logo trans" data-0="width:255px;" data-50="width:180px;"> <a href="<?php echo $baseurl;?>/"> <img src="<?php echo $baseurl;?>/wp-content/uploads/2015/08/logo.png" alt="logo"> </a> </div>

      <div class="header-rht trans" data-0="margin-top:50px" data-50="margin-top:29px">

       
        <script>

            function checkVal() {

                if (document.getElementById('s').value == "") {

                    return false;

                }

            }

                        </script>

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

        <script>

                            $(document).scroll(function() {

                                t = $(this).scrollTop();

                                if (t > 29)

                                {

                                    $('nav>ul>li > ul.sub-menu').addClass("upnav");

                                    $('.single-menu .sub-menu').addClass("upnav-1");

                                }

                                else

                                {

                                    $('nav>ul>li > ul.sub-menu').removeClass("upnav");

                                    $('.single-menu .sub-menu').removeClass("upnav-1");

                                }

                            });



//                            header.header_t

//                            {

//                            height: 71px;

//                                    }

                        </script> 

      </div>

    </div>

  </div>

</header>

<section class="section sec13 inner-banner-2" style="background: url(<?php echo $baseurl;?>/wp-content/uploads/2015/08/ban-reachus1.jpg) no-repeat center bottom;">

  <div class="header-caption">

    <div class="container">

      <h1>Reach Us</h1>

    </div>

  </div>

</section>

<div class="content-section">

  <div class="contact clearfix">

    <div class="container clearfix">

      <div class="contact-left-box">

        <div class="contact-right">

          <section class="thanks clearfix" style="display:none; color: #fff">

            <h2  style="color: #7CC2E7">Thank you!</h2>

            <p style="color: #1C7044; font-size: 12px; font-weight: bold"> Your enquiry has been submitted successfully.<br/>

              We will contact you soon.</p>

            <a href="<?php echo $baseurl;?>/"></a> </section>

          <form name="contactForm" method="post" id="contactForm">

            <h1 class="txt-2">Reach Us</h1>

            <span class="span1">Please fill in form below, and we’ll get back to you soon.</span>

            <ul>

            	<?php if($usern!='0'&&$usern!=''){?>

				<li style="width:100%;">

                		<input type="hidden" value="<?php echo $usern;?>" name="usname">

						<label class="rfv1">Type of query: </label>

                    	<label class="rfv"><input type="radio" value="1" name="typqu" checked="checked"> &nbsp;Technical</label>

                    	<label class="rfv"><input type="radio" value="2"  name="typqu"> &nbsp;Business</label>

				</li>

                <?php }else{?>

              <li>

	              <input type="hidden" value="0" name="typqu">

                <input class="txtbox required" placeholder="Full Name"  type="text" autocomplete="off" name="name">

              </li>

              <li>

                <input  placeholder="Email Address" class="txtbox required"  type="email"  autocomplete="off" name="email">

              </li>

              <li>

                <input  placeholder="Designation" class="txtbox required"  type="text"  autocomplete="off" name="designation">

              </li>

              <li>

                <input  placeholder="Company" class="txtbox required"  type="text"  autocomplete="off" name="company">

              </li>

              <li>

                <input placeholder="Mobile" class="txtbox required"  type="text"  autocomplete="off" name="phone">

              </li>

              <li>

                <select name="country" id="country_id" class="txtbox required">

                  <option value="">Country...</option>

                  <option value="Afganistan">Afghanistan</option>

                  <option value="Albania">Albania</option>

                  <option value="Algeria">Algeria</option>

                  <option value="American Samoa">American Samoa</option>

                  <option value="Andorra">Andorra</option>

                  <option value="Angola">Angola</option>

                  <option value="Anguilla">Anguilla</option>

                  <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>

                  <option value="Argentina">Argentina</option>

                  <option value="Armenia">Armenia</option>

                  <option value="Aruba">Aruba</option>

                  <option value="Australia">Australia</option>

                  <option value="Austria">Austria</option>

                  <option value="Azerbaijan">Azerbaijan</option>

                  <option value="Bahamas">Bahamas</option>

                  <option value="Bahrain">Bahrain</option>

                  <option value="Bangladesh">Bangladesh</option>

                  <option value="Barbados">Barbados</option>

                  <option value="Belarus">Belarus</option>

                  <option value="Belgium">Belgium</option>

                  <option value="Belize">Belize</option>

                  <option value="Benin">Benin</option>

                  <option value="Bermuda">Bermuda</option>

                  <option value="Bhutan">Bhutan</option>

                  <option value="Bolivia">Bolivia</option>

                  <option value="Bonaire">Bonaire</option>

                  <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>

                  <option value="Botswana">Botswana</option>

                  <option value="Brazil">Brazil</option>

                  <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>

                  <option value="Brunei">Brunei</option>

                  <option value="Bulgaria">Bulgaria</option>

                  <option value="Burkina Faso">Burkina Faso</option>

                  <option value="Burundi">Burundi</option>

                  <option value="Cambodia">Cambodia</option>

                  <option value="Cameroon">Cameroon</option>

                  <option value="Canada">Canada</option>

                  <option value="Canary Islands">Canary Islands</option>

                  <option value="Cape Verde">Cape Verde</option>

                  <option value="Cayman Islands">Cayman Islands</option>

                  <option value="Central African Republic">Central African Republic</option>

                  <option value="Chad">Chad</option>

                  <option value="Channel Islands">Channel Islands</option>

                  <option value="Chile">Chile</option>

                  <option value="China">China</option>

                  <option value="Christmas Island">Christmas Island</option>

                  <option value="Cocos Island">Cocos Island</option>

                  <option value="Colombia">Colombia</option>

                  <option value="Comoros">Comoros</option>

                  <option value="Congo">Congo</option>

                  <option value="Cook Islands">Cook Islands</option>

                  <option value="Costa Rica">Costa Rica</option>

                  <option value="Cote DIvoire">Cote D'Ivoire</option>

                  <option value="Croatia">Croatia</option>

                  <option value="Cuba">Cuba</option>

                  <option value="Curaco">Curacao</option>

                  <option value="Cyprus">Cyprus</option>

                  <option value="Czech Republic">Czech Republic</option>

                  <option value="Denmark">Denmark</option>

                  <option value="Djibouti">Djibouti</option>

                  <option value="Dominica">Dominica</option>

                  <option value="Dominican Republic">Dominican Republic</option>

                  <option value="East Timor">East Timor</option>

                  <option value="Ecuador">Ecuador</option>

                  <option value="Egypt">Egypt</option>

                  <option value="El Salvador">El Salvador</option>

                  <option value="Equatorial Guinea">Equatorial Guinea</option>

                  <option value="Eritrea">Eritrea</option>

                  <option value="Estonia">Estonia</option>

                  <option value="Ethiopia">Ethiopia</option>

                  <option value="Falkland Islands">Falkland Islands</option>

                  <option value="Faroe Islands">Faroe Islands</option>

                  <option value="Fiji">Fiji</option>

                  <option value="Finland">Finland</option>

                  <option value="France">France</option>

                  <option value="French Guiana">French Guiana</option>

                  <option value="French Polynesia">French Polynesia</option>

                  <option value="French Southern Ter">French Southern Ter</option>

                  <option value="Gabon">Gabon</option>

                  <option value="Gambia">Gambia</option>

                  <option value="Georgia">Georgia</option>

                  <option value="Germany">Germany</option>

                  <option value="Ghana">Ghana</option>

                  <option value="Gibraltar">Gibraltar</option>

                  <option value="Great Britain">Great Britain</option>

                  <option value="Greece">Greece</option>

                  <option value="Greenland">Greenland</option>

                  <option value="Grenada">Grenada</option>

                  <option value="Guadeloupe">Guadeloupe</option>

                  <option value="Guam">Guam</option>

                  <option value="Guatemala">Guatemala</option>

                  <option value="Guinea">Guinea</option>

                  <option value="Guyana">Guyana</option>

                  <option value="Haiti">Haiti</option>

                  <option value="Hawaii">Hawaii</option>

                  <option value="Honduras">Honduras</option>

                  <option value="Hong Kong">Hong Kong</option>

                  <option value="Hungary">Hungary</option>

                  <option value="Iceland">Iceland</option>

                  <option value="India">India</option>

                  <option value="Indonesia">Indonesia</option>

                  <option value="Iran">Iran</option>

                  <option value="Iraq">Iraq</option>

                  <option value="Ireland">Ireland</option>

                  <option value="Isle of Man">Isle of Man</option>

                  <option value="Israel">Israel</option>

                  <option value="Italy">Italy</option>

                  <option value="Jamaica">Jamaica</option>

                  <option value="Japan">Japan</option>

                  <option value="Jordan">Jordan</option>

                  <option value="Kazakhstan">Kazakhstan</option>

                  <option value="Kenya">Kenya</option>

                  <option value="Kiribati">Kiribati</option>

                  <option value="Korea North">Korea North</option>

                  <option value="Korea Sout">Korea South</option>

                  <option value="Kuwait">Kuwait</option>

                  <option value="Kyrgyzstan">Kyrgyzstan</option>

                  <option value="Laos">Laos</option>

                  <option value="Latvia">Latvia</option>

                  <option value="Lebanon">Lebanon</option>

                  <option value="Lesotho">Lesotho</option>

                  <option value="Liberia">Liberia</option>

                  <option value="Libya">Libya</option>

                  <option value="Liechtenstein">Liechtenstein</option>

                  <option value="Lithuania">Lithuania</option>

                  <option value="Luxembourg">Luxembourg</option>

                  <option value="Macau">Macau</option>

                  <option value="Macedonia">Macedonia</option>

                  <option value="Madagascar">Madagascar</option>

                  <option value="Malaysia">Malaysia</option>

                  <option value="Malawi">Malawi</option>

                  <option value="Maldives">Maldives</option>

                  <option value="Mali">Mali</option>

                  <option value="Malta">Malta</option>

                  <option value="Marshall Islands">Marshall Islands</option>

                  <option value="Martinique">Martinique</option>

                  <option value="Mauritania">Mauritania</option>

                  <option value="Mauritius">Mauritius</option>

                  <option value="Mayotte">Mayotte</option>

                  <option value="Mexico">Mexico</option>

                  <option value="Midway Islands">Midway Islands</option>

                  <option value="Moldova">Moldova</option>

                  <option value="Monaco">Monaco</option>

                  <option value="Mongolia">Mongolia</option>

                  <option value="Montserrat">Montserrat</option>

                  <option value="Morocco">Morocco</option>

                  <option value="Mozambique">Mozambique</option>

                  <option value="Myanmar">Myanmar</option>

                  <option value="Nambia">Nambia</option>

                  <option value="Nauru">Nauru</option>

                  <option value="Nepal">Nepal</option>

                  <option value="Netherland Antilles">Netherland Antilles</option>

                  <option value="Netherlands">Netherlands (Holland, Europe)</option>

                  <option value="Nevis">Nevis</option>

                  <option value="New Caledonia">New Caledonia</option>

                  <option value="New Zealand">New Zealand</option>

                  <option value="Nicaragua">Nicaragua</option>

                  <option value="Niger">Niger</option>

                  <option value="Nigeria">Nigeria</option>

                  <option value="Niue">Niue</option>

                  <option value="Norfolk Island">Norfolk Island</option>

                  <option value="Norway">Norway</option>

                  <option value="Oman">Oman</option>

                  <option value="Pakistan">Pakistan</option>

                  <option value="Palau Island">Palau Island</option>

                  <option value="Palestine">Palestine</option>

                  <option value="Panama">Panama</option>

                  <option value="Papua New Guinea">Papua New Guinea</option>

                  <option value="Paraguay">Paraguay</option>

                  <option value="Peru">Peru</option>

                  <option value="Phillipines">Philippines</option>

                  <option value="Pitcairn Island">Pitcairn Island</option>

                  <option value="Poland">Poland</option>

                  <option value="Portugal">Portugal</option>

                  <option value="Puerto Rico">Puerto Rico</option>

                  <option value="Qatar">Qatar</option>

                  <option value="Republic of Montenegro">Republic of Montenegro</option>

                  <option value="Republic of Serbia">Republic of Serbia</option>

                  <option value="Reunion">Reunion</option>

                  <option value="Romania">Romania</option>

                  <option value="Russia">Russia</option>

                  <option value="Rwanda">Rwanda</option>

                  <option value="St Barthelemy">St Barthelemy</option>

                  <option value="St Eustatius">St Eustatius</option>

                  <option value="St Helena">St Helena</option>

                  <option value="St Kitts-Nevis">St Kitts-Nevis</option>

                  <option value="St Lucia">St Lucia</option>

                  <option value="St Maarten">St Maarten</option>

                  <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>

                  <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>

                  <option value="Saipan">Saipan</option>

                  <option value="Samoa">Samoa</option>

                  <option value="Samoa American">Samoa American</option>

                  <option value="San Marino">San Marino</option>

                  <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>

                  <option value="Saudi Arabia">Saudi Arabia</option>

                  <option value="Senegal">Senegal</option>

                  <option value="Serbia">Serbia</option>

                  <option value="Seychelles">Seychelles</option>

                  <option value="Sierra Leone">Sierra Leone</option>

                  <option value="Singapore">Singapore</option>

                  <option value="Slovakia">Slovakia</option>

                  <option value="Slovenia">Slovenia</option>

                  <option value="Solomon Islands">Solomon Islands</option>

                  <option value="Somalia">Somalia</option>

                  <option value="South Africa">South Africa</option>

                  <option value="Spain">Spain</option>

                  <option value="Sri Lanka">Sri Lanka</option>

                  <option value="Sudan">Sudan</option>

                  <option value="Suriname">Suriname</option>

                  <option value="Swaziland">Swaziland</option>

                  <option value="Sweden">Sweden</option>

                  <option value="Switzerland">Switzerland</option>

                  <option value="Syria">Syria</option>

                  <option value="Tahiti">Tahiti</option>

                  <option value="Taiwan">Taiwan</option>

                  <option value="Tajikistan">Tajikistan</option>

                  <option value="Tanzania">Tanzania</option>

                  <option value="Thailand">Thailand</option>

                  <option value="Togo">Togo</option>

                  <option value="Tokelau">Tokelau</option>

                  <option value="Tonga">Tonga</option>

                  <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>

                  <option value="Tunisia">Tunisia</option>

                  <option value="Turkey">Turkey</option>

                  <option value="Turkmenistan">Turkmenistan</option>

                  <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>

                  <option value="Tuvalu">Tuvalu</option>

                  <option value="Uganda">Uganda</option>

                  <option value="Ukraine">Ukraine</option>

                  <option value="United Arab Erimates">United Arab Emirates</option>

                  <option value="United Kingdom">United Kingdom</option>

                  <option value="United States of America">United States of America</option>

                  <option value="Uraguay">Uruguay</option>

                  <option value="Uzbekistan">Uzbekistan</option>

                  <option value="Vanuatu">Vanuatu</option>

                  <option value="Vatican City State">Vatican City State</option>

                  <option value="Venezuela">Venezuela</option>

                  <option value="Vietnam">Vietnam</option>

                  <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>

                  <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>

                  <option value="Wake Island">Wake Island</option>

                  <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>

                  <option value="Yemen">Yemen</option>

                  <option value="Zaire">Zaire</option>

                  <option value="Zambia">Zambia</option>

                  <option value="Zimbabwe">Zimbabwe</option>

                </select>

              </li>

              <li>

                <input placeholder="Industry" class="txtbox required"  type="text"  autocomplete="off" name="industry">

              </li>

              <li>

                <input placeholder="How did you hear about us?" class="txtbox required"  type="text"  autocomplete="off" name="about">

              </li>

              <?php }?>

              <li style="width:100%">

                <input placeholder="Subject" class="txtbox required"  type="text"  autocomplete="off" name="subject">

              </li>

              <li style="width:100%">

                <textarea placeholder="Message" class="txtarea required" name="message"></textarea>

              </li>

              

              <li>

                <div class="status" style="display:none; "></div>

              </li>

              <li>

                <button class="s-btn trans">SEND NOW</button>

                <div class="loading" style="display:none; text-align: center;  text-align: center;

                                     float: right;    padding: 0 10px;"> <img alt="loading" src="<?php echo $baseurl;?>/wp-content/themes/pidata/images/bx_loader.gif" /> </div>

                <input type="hidden" value="contactform" name="action">

              </li>

            </ul>

          </form>

        </div>

      </div>

      <div class="contact-right-box">

        <h1 class="txt-2">Contact Address</h1>

        <div class="contact-detail-box">

          <div class="contact-icon-box"> <img src="<?php echo $baseurl;?>/wp-content/themes/pidata/images/contact-icon-01.png" alt="icon"/> </div>

          <div class="contact-text-box">

            <p> <b>Head Quarters</b><br>

              Pi DATACENTERS Pvt. Ltd.<br>

              Survey # 49/P, Plot no -12<br>

              IT Layout, Auto Nagar<br>

              Mangalagiri, Guntur (Dist.)<br>

              Andhra Pradesh, India<br>

              Pin: 522503</p>

            <p> <b>Office</b><br>

              Pi DATACENTERS Pvt. Ltd.<br>

              B904 &amp; 905<br>

              The Platina, Gachibowli,<br>

              Hyderabad, India<br>

              Pin : 500032<br>

            </p>

          </div>

        </div>

        <div class="contact-detail-box">

          <div class="contact-icon-box"> <img src="<?php echo $baseurl;?>/wp-content/themes/pidata/images/contact-icon-02.png" alt="icon" /> </div>

          <div class="contact-text-box">

            <p> <a href="tel:+914067456662" >1800-3074-3282 </a> </p>

          </div>

        </div>

        

        <!--<div class="contact-detail-box">

                    <div class="contact-icon-box">

                        <img src="<?php echo $baseurl;?>/wp-content/themes/pidata/images/contact-icon-03.png" alt="icon" />

                    </div>



                    <div class="contact-text-box">

                        <p>

                456 875 3569 2121                        </p>

                    </div>

                </div>-->

        

        <div class="contact-detail-box">

          <div class="contact-icon-box"> <img src="<?php echo $baseurl;?>/wp-content/themes/pidata/images/contact-icon-04.png" alt="icon" /> </div>

          <div class="contact-text-box">

            <p> <a href="mailto:sales@pidatacenters.com">sales@pidatacenters.com</a><br />

              <a href="mailto:marcom@pidatacenters.com">marcom@pidatacenters.com</a><br />

              <a href="mailto:media@pidatacenters.com">media@pidatacenters.com</a> </p>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

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

          <h4>Shri. J Satyanarayana, IAS (Retd)<span>E-Governance, Electronics and IT, Advisor to Government of AP</span></h4>

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

        <p>©2015 Pi DATACENTERS Pvt. Ltd.    All rights reserved</p>

        <div class="social-icons"> <a target="_blank" href="https://www.linkedin.com/company/6437312?trk=tyah&amp;trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A6437312%2Cidx%3A1-1-1%2CtarId%3A1440322319243%2Ctas%3Api%20data" class="in"></a> <a target="_blank" href=" https://twitter.com/Pi_DATACENTERS" class="twr"></a> <a target="_blank" href="https://web.facebook.com/pidatacenters" class="fb"></a> </div>

      </div>

    </div>

  </div>

</footer>

<!--==============================footer=================================--> 

<script type='text/javascript' src='js/camera.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/owl.carousel.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/SmoothScroll-1.2.1.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/jquery.easing-sooper.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/skrollr.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/main.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/selectivizr-min.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/wp-embed.min.js?ver=4.4.2'></script> 

<script type='text/javascript' src='<?php echo $baseurl;?>/wp-content/themes/pidata/js/select.js?ver=4.4.2'></script> 

<script type='text/javascript' src='js/validate.js?ver=4.4.2'></script> <script type="text/javascript">

        $(document).ready(function() {

            $.validator.setDefaults({ignore: ":hidden:not(select)"});

            $('#contactForm').validate({

                onfocusout: function(element) {



                    $(element).valid();

                },

                submitHandler: function(form) {

                    $.ajax({

                        type: "POST",

                        url: '<?php echo $baseurl;?>/pidata/plans/contact.php',

                        data: $('#contactForm').serialize(),

                        beforeSend: function() {

                            $("input[name=submit]", form).attr('disabled', 'disabled');

                            $("div.loading", form).show();

                            $("div.status", form).hide();

                        },

                        success: function(result) {

                            // alert(result)



                            if (result == 1 || result == '1') {

                                $(form).slideUp();

                                $(".thanks").slideDown();

                                $("div.loading", form).hide();

                            }

                            else {

                                $("div.loading", form).hide();

                                $("input[name=submit]", form).removeAttr('disabled');

                                $("div.status", form).html(result);

                                $("div.status", form).show();



                            }

                        }

                    });

                    //  alert(data);

                }

            });



        });



    </script> 

<script>

        function numericFilter(txb) {

            txb.value = txb.value.replace(/[^\0-9]/ig, "");

        }

    </script> 

<script type="text/javascript">

        $('#country_id').select2();

    </script> 

<script src="js/in.js" type="text/javascript"> lang: en_US</script> 

<script src="https://apis.google.com/js/platform.js" async defer></script> 

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

if (landscape && window.innerWidth < 3000 && window.innerWidth > 1000) {

$(document).ready(function() {

    skrollr.init({

        forceHeight: true

    });



});

}

</script> 

<script type="text/javascript">

  (function() {

    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;

    po.src = 'https://apis.google.com/js/platform.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

  })();

</script> 

<script>!function(d, s, id) {

                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^https:/.test(d.location) ? 'http' : 'https';

                                    if (!d.getElementById(id)) {

                                        js = d.createElement(s);

                                        js.id = id;

                                        js.src = p + '://platform.twitter.com/widgets.js';

                                        fjs.parentNode.insertBefore(js, fjs);

                                    }

                                }(document, 'script', 'twitter-wjs');

</script>

<div id="fb-root"></div>

<script>(function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id))

            return;

        js = d.createElement(s);

        js.id = id;

        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=1487044554925467";

        fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));</script> 



<!-- <script>

$(".pop-call .icon").click(function() {

  $( ".dial-number" ).toggle( "slide");

});

</script> --> 

<script>



    $(".pop-call").hover(function(){

    

    $('.pop-call').toggleClass('myTip');



});

</script>

</body>

</html>

