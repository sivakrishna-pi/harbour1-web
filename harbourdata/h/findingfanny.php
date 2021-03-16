<?php require_once('plans/mysql.php');

$baseurl='https://pidatacenters.com';

function alias($alias,$tb,$col,$retrive){ global $mr_con;

	$sql = mysqli_query($mr_con,"SELECT $retrive FROM $tb WHERE $col='$alias' AND flag=0");

	if(mysqli_num_rows($sql)){

		$row = mysqli_fetch_array($sql);

		return $row[$retrive];

	}else return "";

}

function selected($fv1,$fv2){

	if($fv1==$fv2) return 'selected="selected"';

}

?>