<?php

ini_set('display_errors',0);

//error_reporting(E_ALL);
session_start();

//ob_start();

include ('mysql.php');


$_SESSION['plan_proposal'] = $_POST;
/*print_r('<pre>');
print_r($_SESSION['plan_proposal']);
print_r('</pre>');
print_r('<pre>');
print_r($_POST);
print_r('</pre>');*/
echo "string";

?>