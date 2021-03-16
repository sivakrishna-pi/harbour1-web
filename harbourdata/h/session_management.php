<?php
session_start();
//echo $_REQUEST['product_id'];
$product_id=$_REQUEST['product_id'];
//print_r($_SESSION['cart']);
	 
	//echo "\n";
    seekAndDestroy($_SESSION['cart'],$product_id);
    function seekAndDestroy($haystack, $needle){
  foreach($haystack as $key => $value){
  //echo $key.'value =>'.$needle;
  //echo "\n";
    if($key == $needle){
      //unset($key);
     // echo "inside";
      $_SESSION['cart'][$needle] = "" ;
      unset( $_SESSION['cart'][$needle]);
     // print_r($_SESSION['cart']);
    }/*elseif(is_array($value)){
      $output[$key] = seekAndDestroy($value, $needle);
    }*/else{
      $output[$key] = $value;
    }
  }
  return $output;
}

?>