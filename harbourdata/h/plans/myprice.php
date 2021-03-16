<?php header('Content-Type: application/json');
include('mysql.php');

ini_set('display_errors',0);

error_reporting(0);
$baseurl='https://pidatacenters.com/pidata';
if(isset($_REQUEST['addon'])){
	$hello=mysqli_real_escape_string($mr_con,$_REQUEST['hello']);

//$q1="SELECT $my_column FROM $table_name WHERE '$column'='$value'";
$q1="SELECT price FROM `lj_addon_price` WHERE `addon` = '$hello'";
$eq1=mysqli_query($mr_con,$q1);
if (!$eq1) {
    printf("Error: %s\n", mysqli_error($mr_con));
    exit();
}
//echo $eq1;
$roww=mysqli_fetch_array($eq1);
echo json_encode($roww[0]);

}else{

$table_name=mysqli_real_escape_string($mr_con,$_REQUEST['table_name']);

$column=mysqli_real_escape_string($mr_con,$_REQUEST['column']);

$my_column=mysqli_real_escape_string($mr_con,$_REQUEST['my_column']);

$value=mysqli_real_escape_string($mr_con,$_REQUEST['value']);

//$q1="SELECT $my_column FROM $table_name WHERE '$column'='$value'";
$q1="SELECT $my_column FROM $table_name WHERE $column = '$value'";
$eq1=mysqli_query($mr_con,$q1);
if (!$eq1) {
    printf("Error: %s\n", mysqli_error($mr_con));
    exit();
}
//echo $eq1;
$roww=mysqli_fetch_array($eq1);
echo json_encode($roww[$my_column]);
//echo '0';
//echo $q1;
}
?>