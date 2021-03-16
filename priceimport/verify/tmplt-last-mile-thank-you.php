
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thank you for submitting the form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic" rel="stylesheet">
     <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri(); ?>/css/lastmile.css" />
   <script src="https://use.fontawesome.com/7e819a0c8e.js"></script>
   <script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>

    <style type="text/css">
    body{
        font-size: 20px;
        /* Dropdown Button */
    }
.dropbtn {
    /*background-color: #4CAF50;*/
    color: #000;
    /*padding: 16px;*/
    /*font-size: 20px;*/
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    margin-right: 20px;
    position: relative;
    display: inline-block;
    float: right;
    margin-top: 20px;
        margin-right: 100px;

}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
        min-width: 250px;
    margin-left: 5px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 15px;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    /*background-color: #3e8e41;*/
}

@media(max-width: 900px){
    .dropdown{
        margin-right: 0px;
    }
}

@media(max-width: 600px){
    footer p{
        padding: 20px 0;
        font-size: 15px;
    }
}
@media(max-width: 400px){
    .dropbtn{
        font-size: 11px !important;
    }
    
}
</style>

</head>
<body>
    <div class="container">
        <header class="header">
            <a class="logo" href="https://pidatacenters.com/"><img src="<?php echo $upload_dir?>/uploads/2017/12/Pi-Logo-180x80.png" alt="Pi Logo" onclick="ga('send', 'event', 'Click', 'Logo Click', 'Last Mile Campaign - Thank You Page');"></a>        
            <div class="dropdown">
                <img style="width: 22px; height: 22px;" src="https://pidatacenters.com/wp-content/uploads/2017/12/india-fill.svg" alt="icon" style="display: inline-block; margin-bottom: -2px;">
  <a class="dropbtn" style="display: inline-block; text-decoration: none; color: #000; cursor: pointer; font-size: 14px;
    text-transform: uppercase;
    font-weight: bold;vertical-align: super">The Last Mile Gallery ▼</a>
  <div class="dropdown-content">
    <a href="../smart-farming/" onclick="ga('send', 'event', 'Click', 'Smart Farming Menu Click', 'Last Mile Campaign - Thank You Page');">&#8250; Smart Farming</a>
    <a href="../e-learning/" onclick="ga('send', 'event', 'Click', 'e-Learning Menu Click', 'Last Mile Campaign - Thank You Page');">&#8250; e-Learning</a>
     <a href="../digital-healthcare/" onclick="ga('send', 'event', 'Click', 'Digital Healthcare Menu Click', 'Last Mile Campaign - Thank You Page');">&#8250; Digital Healthcare</a>
     <a href="../secure-transaction/" onclick="ga('send', 'event', 'Click', 'Secure Transaction Menu Click', 'Last Mile Campaign - Thank You Page');">&#8250; Secure Transaction</a>
     <a href="../media-entertainment/" onclick="ga('send', 'event', 'Click', 'Media Entertainment Menu Click', 'Last Mile Campaign - Thank You Page');">&#8250; Delivering Happiness</a>
     <a href="../digitizing-all-walks-life/" onclick="ga('send', 'event', 'Click', 'Digitizing Menu Click', 'Last Mile Campaign - Thank You Page');">&#8250; Digitizing All Walks Of Life </a>
    <!-- <a href="#">Link 3</a> -->
  </div>
</div>    
        </header>

        <div class="content thanks">
            <p><b>Thank you for downloading....</b></p> <br><br>
            <p>If your download does not start automatically, <br>please <a target="_blank" onclick="ga('send', 'event', 'Click', 'Click Here Button', 'Last Mile Campaign - Thank You Page');"  href="<?php echo $file_url; ?>"><b>click here</b></a></p>
       

        <div class="form-block">
            <p>Learn more about <br>Pi’s products and services</p>
           
            <a href="mailto:marcom@pidatacenters.com?subject=Hi! I am interested to know more about The Last Mile initiatives by Pi" class="button"onclick="ga('send', 'event', 'Click', 'Schedule a call Button', 'Last Mile Campaign - Thank You Page');">Schedule a Call</a>
        </div>  

         </div>         
    
    </div>
    
    </div>
    <footer class="footer-bottom">
       <p>©2018 Pi DATACENTERS Pvt.Ltd.<br> All Rights Reserved</p>
    <footer>

</body>

</html>