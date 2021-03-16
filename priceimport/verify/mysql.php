<?php 
session_start();

$servername = "localhost";
$username = "pidatacenters";
$password = 'oh4$Otu,7JUZ';

$dbname = "pi_data_centers";

$mr_con = new mysqli($servername, $username, $password, $dbname);

if ($mr_con->connect_error) {die("Connection failed");} 

?>

		