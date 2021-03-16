<?php
include('mysql.php');

    $get_result = mysqli_query($mr_con,"UPDATE `profiles` SET `promo_balance` = '100000' WHERE `profiles`.`id` = 104");
            
    if($get_result){ 
        $message="<p><b>Values Updated Successfuly....</b></p> <br><br>";
    }else{
        $message="<p>Something went wrong! Try again later</p>";
    }

    echo $message;
?>