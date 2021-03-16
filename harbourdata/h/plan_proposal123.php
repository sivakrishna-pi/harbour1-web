<?php 
session_start();
$diff_id = $_SESSION['diff_id'];
//echo $diff_id;
header('Location: https://pidatacenters.com/pidata/p/Plan_proposal-'.$diff_id.'.pdf');
?>