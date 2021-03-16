<?php 
include('mysql.php');
$copmans=mysqli_real_escape_string($mr_con,$_REQUEST['cname']);
$svname=mysqli_real_escape_string($mr_con,$_REQUEST['name']);
$svmob=mysqli_real_escape_string($mr_con,$_REQUEST['mobile']);
$emailll=mysqli_real_escape_string($mr_con,$_REQUEST['email']);
$insq="INSERT INTO lj_whitepaper_popup (name,company_name,mobile,email) VALUES ('$svname','$copmans','$svmob','$emailll')";
mysqli_query($mr_con,$insq);
