<?php 
session_start();
$baseurl="https://pidatacenters.com/pidata";

$baseurl2="https://pidatacenters.com/pidata";


$servername = "localhost";

$username = "pidatacenters";

$password = 'oh4$Otu,7JUZ';

//$username = "root";

//$password = "";

$dbname = "pidatacenters";

$mr_con = new mysqli($servername, $username, $password, $dbname);
print_r($mr_con);exit;
if ($mr_con->connect_error) {die("Connection failed");} 

?>

		