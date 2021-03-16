<?php
include('mysql.php');

function dec_enc($string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'cloudking';
    $secret_iv = 'cloudking';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

    return $output;
}

if (isset($_GET['verifyid']) && !empty($_GET['verifyid']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    global $mr_con;
    $verifyid = $_GET['verifyid'];
    $hashcode = $_GET['hash'];

    $dec_hashcode = dec_enc($hashcode);

    // echo $dec_hashcode;
    $usermail = '';
    $message = '';

    $check = mysqli_query($mr_con, "SELECT is_email_verified FROM `profiles` WHERE user_id = '$verifyid'");
    if (mysqli_num_rows($check) > 0) {
        $checkrow = mysqli_fetch_array($check);
        $isverify = $checkrow['is_email_verified'];

        if ($isverify == 1) {
            $message = '<p>Email Verification already done, Please login.</p>';
        } else {
            $res = mysqli_query($mr_con, "SELECT email FROM `users` WHERE id = '$verifyid'");

            if (mysqli_num_rows($res) > 0) {

                $row = mysqli_fetch_array($res);
                $usermail = $row['email'];

                if ($usermail == $dec_hashcode) {

                    // $get_result = mysqli_query($mr_con,"UPDATE profiles SET is_email_verified = 1, promo_balance = 100000 WHERE user_id='$verifyid'");
                    $get_result = mysqli_query($mr_con, "UPDATE profiles SET is_email_verified = 1, promo_balance = 0 WHERE user_id='$verifyid'");

                    if ($get_result) {

                        $get_gst = mysqli_query($mr_con, "select `gst_num` from users where id ='$verifyid'");
                        if (mysqli_num_rows($get_gst) > 0) {
                            $row = mysqli_fetch_array($get_gst);
                            $get_gst_num = $row['gst_num'];
                            // echo $get_gst_num;
                            $get_gst_exist = mysqli_query($mr_con, "select `gst_num` from msme_purchase_limits where gst_num ='$get_gst_num'");

                            if (mysqli_num_rows($get_gst_exist) == 0) {
                                $domain = substr($usermail, strpos($usermail, '@') + 1);
                                $get_gst = mysqli_query($mr_con, "insert into msme_purchase_limits (`domain_name`,`gst_num`,`msme_limit_monthly`,`used_limit_monthly`,`remaining_limit_monthly`) 
                                    values('$domain','$get_gst_num',50000,0,50000)");
                            }
                        }

                        $message = "<p><b>Thank you for Conformation....</b></p> <br><br>
                        <p>Congratulations, You have <b>successfully</b> confirmed your email for Pi DATACENTERS.</p>";
                    } else {
                        $message = "<p>Something went wrong! Try again later</p>";
                    }
                } else {
                    $message = '<p>In Correct Link.</p>';
                }
            } else {
                $message = '<p>User Not Found.</p>';
            }
        }
    } else {
        $message = '<p>profile not exists</p>';
    }
} else {
    $message = '<p>Something went wrong! Try again later.</p>';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thank you for submitting the form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />

    <script src="https://use.fontawesome.com/7e819a0c8e.js"></script>

</head>

<body>
    <div class="container">
        <header class="header">
            <a class="logo" href="https://pidatacenters.com/"><img src="https://pidatacenters.com/wp-content/uploads/2017/12/Pi-Logo-180x80.png?v12" alt="Pi Logo"></a>
        </header>

        <div class="content thanks">

            <?php echo $message; ?>

            <div class="form-block">
                <p>Learn more about <br>Pi’s products and services</p>

                <a href="https://pidtacenters.com" class="button">Corporate Website</a>
            </div>

        </div>

    </div>

    </div>
    <footer class="footer-bottom">
        <p>©2019 Pi DATACENTERS Pvt.Ltd.<br> All Rights Reserved</p>
        <footer>

</body>

</html>