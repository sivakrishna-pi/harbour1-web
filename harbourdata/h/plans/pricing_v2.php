<?php include('mysql.php');
error_reporting(0);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//session_start();
function getcateg($fv1){global $mr_con;

  $q1="SELECT categ_name FROM categories WHERE id='$fv1'";

  $eq1=mysqli_query($mr_con,$q1);

  if(mysqli_num_rows($eq1)>'0'){

    $r1=mysqli_fetch_array($eq1);

    return $r1['categ_name'];

  }else return '0';

}
function selected($fv1,$fv2){

  if($fv1==$fv2) return 'selected="selected"';

}



$baseurl='https://pidatacenters.com/pidata';
if(!empty($_REQUEST['x'])){
  $a1=mysqli_real_escape_string($mr_con,$_REQUEST['x']);

  $cpu_total=mysqli_real_escape_string($mr_con,$_REQUEST['cpu_total']);
  $ram_total=mysqli_real_escape_string($mr_con,$_REQUEST['ram_total']);
  $space_total=mysqli_real_escape_string($mr_con,$_REQUEST['space_total']);
  $data_total=mysqli_real_escape_string($mr_con,$_REQUEST['data_total']);

  $packip_total=mysqli_real_escape_string($mr_con,$_REQUEST['packip_total']);
  $packbackup_total=mysqli_real_escape_string($mr_con,$_REQUEST['packbackup_total']);
  $packdatabase_total=mysqli_real_escape_string($mr_con,$_REQUEST['packdatabase_total']);
  $packos_total=mysqli_real_escape_string($mr_con,$_REQUEST['packos_total']);
  $pricing = mysqli_real_escape_string($mr_con,$_REQUEST['total']);

  $planprice=$pricing;
  $os=mysqli_real_escape_string($mr_con,$_REQUEST['os']);
  $os_t=mysqli_real_escape_string($mr_con,$_REQUEST['os_t']);
  $database=mysqli_real_escape_string($mr_con,$_REQUEST['database']);
  $database_t=mysqli_real_escape_string($mr_con,$_REQUEST['database_t']);
  $backup=mysqli_real_escape_string($mr_con,$_REQUEST['backup']);

  $ip_num=mysqli_real_escape_string($mr_con,$_REQUEST['ip_num']);
  if(isset($_REQUEST['ip']) && $_REQUEST['ip']!=='' && $_REQUEST['ip']!=='0')$ip=mysqli_real_escape_string($mr_con,$_REQUEST['ip']);else $ip='0';
//$min_months = '1';
  $cpu=mysqli_real_escape_string($mr_con,$_REQUEST['cpu']);
  $ram=mysqli_real_escape_string($mr_con,$_REQUEST['ram']);

  $cpu_e=mysqli_real_escape_string($mr_con,$_REQUEST['cpu_e']);
  $ram_e=mysqli_real_escape_string($mr_con,$_REQUEST['ram_e']);


  $space=mysqli_real_escape_string($mr_con,$_REQUEST['space']);
  $data=mysqli_real_escape_string($mr_con,$_REQUEST['data']);

  $power=mysqli_real_escape_string($mr_con,$_REQUEST['power']);
  $power_total=mysqli_real_escape_string($mr_con,$_REQUEST['power_total']);
  $server=mysqli_real_escape_string($mr_con,$_REQUEST['server']);
  $server_total=mysqli_real_escape_string($mr_con,$_REQUEST['server_total']);

  $drive=mysqli_real_escape_string($mr_con,$_REQUEST['drive']);
  $drive_code=mysqli_real_escape_string($mr_con,$_REQUEST['drive_code']);

  $tenure=mysqli_real_escape_string($mr_con,$_REQUEST['tenure']);

  $tenure_price=mysqli_real_escape_string($mr_con,$_REQUEST['tenure_price']);

  $product_id = $a1.'-'.$cpu.'-'.$ram.'-'.$space.'-'.$data.'-'.$ip_num.'-'.$backup.'-'.$os.'-'.$os_t.'-'.$database.'-'.$database_t;

  if(empty($_SESSION['cart'])){

    array_push($_SESSION['cart'], array($product_id));

    $_SESSION['cart'][$product_id]['plan_id'] = $a1;

    $_SESSION['cart'][$product_id]['productid'] = $product_id;

     $_SESSION['cart'][$product_id]['ip_total'] = $packip_total;
    $_SESSION['cart'][$product_id]['backup_total'] = $packbackup_total;
    $_SESSION['cart'][$product_id]['database_total'] = $packdatabase_total;
    $_SESSION['cart'][$product_id]['os_total'] = $packos_total;
     $_SESSION['cart'][$product_id]['ip'] = $ip;

    $_SESSION['cart'][$product_id]['cpu'] = $cpu;
    $_SESSION['cart'][$product_id]['ram'] = $ram;
    $_SESSION['cart'][$product_id]['space'] = $space;
    $_SESSION['cart'][$product_id]['data'] = $data;

     $_SESSION['cart'][$product_id]['cpu_total'] = $cpu_total;
    $_SESSION['cart'][$product_id]['ram_total'] = $ram_total;
    $_SESSION['cart'][$product_id]['space_total'] = $space_total;
    $_SESSION['cart'][$product_id]['data_total'] = $data_total;

     /*$cpu_total=mysqli_real_escape_string($mr_con,$_REQUEST['cpu_total']);
  $ram_total=mysqli_real_escape_string($mr_con,$_REQUEST['ram_total']);
  $space_total=mysqli_real_escape_string($mr_con,$_REQUEST['space_total']);
  $data_total=mysqli_real_escape_string($mr_con,$_REQUEST['data_total']);

 $packip_total=mysqli_real_escape_string($mr_con,$_REQUEST['packip_total']);
  $packbackup_total=mysqli_real_escape_string($mr_con,$_REQUEST['packbackup_total']);
  $packdatabase_total=mysqli_real_escape_string($mr_con,$_REQUEST['packdatabase_total']);
  $packos_total=mysqli_real_escape_string($mr_con,$_REQUEST['packos_total']);
 
  */


    $_SESSION['cart'][$product_id]['ip_num'] = $ip_num;
    $_SESSION['cart'][$product_id]['backup'] = $backup;
    $_SESSION['cart'][$product_id]['os'] = $os;
    $_SESSION['cart'][$product_id]['os_t'] = $os_t;
    $_SESSION['cart'][$product_id]['database'] = $database;
    $_SESSION['cart'][$product_id]['database_t'] = $database_t;

    $_SESSION['cart'][$product_id]['cpu_e'] = $cpu_e;
    $_SESSION['cart'][$product_id]['ram_e'] = $ram_e;

    $_SESSION['cart'][$product_id]['power'] = $power;
    $_SESSION['cart'][$product_id]['power_total'] = $power_total;
    $_SESSION['cart'][$product_id]['server'] = $server;
    $_SESSION['cart'][$product_id]['server_total'] = $server_total;
    $_SESSION['cart'][$product_id]['drive'] = $drive;
    $_SESSION['cart'][$product_id]['drive_code'] = $drive_code;

    $_SESSION['cart'][$product_id]['tenure'] = $tenure;

    $_SESSION['cart'][$product_id]['tenure_price'] = $tenure_price;

    $_SESSION['cart'][$product_id]['pricing'] = $pricing;

   //$pricing = mysqli_real_escape_string($mr_con,$_REQUEST['total']);

    $planprice=$pricing;



 
 /*   print "<pre>";
    echo "if empty";
    print_r($_SESSION['cart']);
    print "</pre>";
    echo "\n";  */

  }else{
   $flag = 0;
   foreach ($_SESSION['cart'] as $sess_product_id => $value) {
    # code...
    if ($sess_product_id==$product_id) {
      # code...
      $_SESSION['cart'][$product_id]['plan_id'] = $a1;
      $_SESSION['cart'][$product_id]['productid'] = $product_id;

       $_SESSION['cart'][$product_id]['ip_total'] = $packip_total;
    $_SESSION['cart'][$product_id]['backup_total'] = $packbackup_total;
    $_SESSION['cart'][$product_id]['database_total'] = $packdatabase_total;
    $_SESSION['cart'][$product_id]['os_total'] = $packos_total;
     $_SESSION['cart'][$product_id]['ip'] = $ip;


      $_SESSION['cart'][$product_id]['cpu'] = $cpu;
      $_SESSION['cart'][$product_id]['ram'] = $ram;
      $_SESSION['cart'][$product_id]['space'] = $space;
      $_SESSION['cart'][$product_id]['data'] = $data;

     $_SESSION['cart'][$product_id]['cpu_total'] = $cpu_total;
    $_SESSION['cart'][$product_id]['ram_total'] = $ram_total;
    $_SESSION['cart'][$product_id]['space_total'] = $space_total;
    $_SESSION['cart'][$product_id]['data_total'] = $data_total;

      $_SESSION['cart'][$product_id]['ip_num'] = $ip_num;
      $_SESSION['cart'][$product_id]['backup'] = $backup;
      $_SESSION['cart'][$product_id]['os'] = $os;
      $_SESSION['cart'][$product_id]['os_t'] = $os_t;
      $_SESSION['cart'][$product_id]['database'] = $database;
      $_SESSION['cart'][$product_id]['database_t'] = $database_t;
      $_SESSION['cart'][$product_id]['tenure'] = $tenure;

      $_SESSION['cart'][$product_id]['cpu_e'] = $cpu_e;
      $_SESSION['cart'][$product_id]['ram_e'] = $ram_e;

      $_SESSION['cart'][$product_id]['power'] = $power;
      $_SESSION['cart'][$product_id]['power_total'] = $power_total;
      $_SESSION['cart'][$product_id]['server'] = $server;
      $_SESSION['cart'][$product_id]['server_total'] = $server_total;
      $_SESSION['cart'][$product_id]['drive'] = $drive;
      $_SESSION['cart'][$product_id]['drive_code'] = $drive_code;

      $_SESSION['cart'][$product_id]['tenure_price'] = $tenure_price;

      $_SESSION['cart'][$product_id]['pricing'] = $pricing;

   //$pricing = mysqli_real_escape_string($mr_con,$_REQUEST['total']);

      $planprice=$pricing;



      $flag = 1;
    }
  }
  if($flag == 0){
 //array_push($_SESSION['cart'], array($product_id));
   // array_push($_SESSION['cart'][$product_id], array("plan_id" => $a1, "cpu" => $cpu, "ram" => $ram, "space" => $space, "data" => $data, "ip_num" => $ip_num, "backup" => $backup, "os" => $os, "os_t" => $os_t, "database" => $database, "database_t" => $database_t, "tenure" => $tenure));
   $_SESSION['cart'][$product_id]['plan_id'] = $a1;
   $_SESSION['cart'][$product_id]['productid'] = $product_id;

    $_SESSION['cart'][$product_id]['ip_total'] = $packip_total;
    $_SESSION['cart'][$product_id]['backup_total'] = $packbackup_total;
    $_SESSION['cart'][$product_id]['database_total'] = $packdatabase_total;
    $_SESSION['cart'][$product_id]['os_total'] = $packos_total;
     $_SESSION['cart'][$product_id]['ip'] = $ip;


   $_SESSION['cart'][$product_id]['cpu'] = $cpu;
   $_SESSION['cart'][$product_id]['ram'] = $ram;
   $_SESSION['cart'][$product_id]['space'] = $space;
   $_SESSION['cart'][$product_id]['data'] = $data;


     $_SESSION['cart'][$product_id]['cpu_total'] = $cpu_total;
    $_SESSION['cart'][$product_id]['ram_total'] = $ram_total;
    $_SESSION['cart'][$product_id]['space_total'] = $space_total;
    $_SESSION['cart'][$product_id]['data_total'] = $data_total;

   $_SESSION['cart'][$product_id]['ip_num'] = $ip_num;
   $_SESSION['cart'][$product_id]['backup'] = $backup;
   $_SESSION['cart'][$product_id]['os'] = $os;
   $_SESSION['cart'][$product_id]['os_t'] = $os_t;
   $_SESSION['cart'][$product_id]['database'] = $database;
   $_SESSION['cart'][$product_id]['database_t'] = $database_t;
   $_SESSION['cart'][$product_id]['tenure'] = $tenure;
   $_SESSION['cart'][$product_id]['tenure_price'] = $tenure_price;
   $_SESSION['cart'][$product_id]['cpu_e'] = $cpu_e;
   $_SESSION['cart'][$product_id]['ram_e'] = $ram_e;

   $_SESSION['cart'][$product_id]['power'] = $power;
   $_SESSION['cart'][$product_id]['power_total'] = $power_total;
   $_SESSION['cart'][$product_id]['server'] = $server;
   $_SESSION['cart'][$product_id]['server_total'] = $server_total;
   $_SESSION['cart'][$product_id]['drive'] = $drive;
   $_SESSION['cart'][$product_id]['drive_code'] = $drive_code;

   $_SESSION['cart'][$product_id]['pricing'] = $pricing;
   
   //$pricing = mysqli_real_escape_string($mr_con,$_REQUEST['total']);
   $planprice=$pricing;
//$planprice=$pricing;


 }


/* print "<pre>";
 echo "if not empty";
 print_r($_SESSION['cart']);
 print "</pre>";
 echo "\n";*/
}

/*print "<pre>";
echo "Complete Session";
print_r($_SESSION['cart']);
print "</pre>";
echo "\n";*/
}
$re='';

$reverse_session = array_reverse($_SESSION['cart']);
foreach ($reverse_session as $product) {
  # code...



  $a1=   $product['plan_id'];

    $productid=   $product['productid'];
  //$_SESSION['cart'][$product_id]['productid'] = $product_id;

  $packip_total=   $product['ip_total'];
  $packbackup_total=   $product['backup_total'];
  $packdatabase_total=   $product['database_total'];
  $packos_total=   $product['os_total'];
  $ip=   $product['ip'];

/*$_SESSION['cart'][$product_id]['packip_total'] = $packip_total;
    $_SESSION['cart'][$product_id]['packbackup_total'] = $packbackup_total;
    $_SESSION['cart'][$product_id]['packdatabase_total'] = $packdatabase_total;
    $_SESSION['cart'][$product_id]['packos_total'] = $packos_total;
     $_SESSION['cart'][$product_id]['ip'] = $ip;*/

  $cpu=   $product['cpu'];
  $ram=   $product['ram'];
  $space=   $product['space'];
  $data=   $product['data'];

  $cpu_total=   $product['cpu_total'];
  $ram_total=   $product['ram_total'];
  $space_total=   $product['space_total'];
  $data_total=   $product['data_total'];

  $ip_num=   $product['ip_num'];
  $backup=   $product['backup'];
  $os_t=   $product['os_t'];
  $database=   $product['database'];
  $database_t=   $product['database_t'];
  $tenure=   $product['tenure'];

  $tenure_price = $product['tenure_price'];


    /*$_SESSION['cart'][$product_id]['cpu_total'] = $cpu_total;
    $_SESSION['cart'][$product_id]['ram_total'] = $ram_total;
    $_SESSION['cart'][$product_id]['space_total'] = $space_total;
    $_SESSION['cart'][$product_id]['data_total'] = $data_total;*/

  

  $cpu_e=$product['cpu_e'];
  $ram_e=$product['ram_e'];

  $power=$product['power'];
  $power_total=$product['power_total'];
  $server=$product['server'];
  $server_total=$product['server_total'];
  $drive=$product['drive'];
  $drive_code=$product['drive_code'];

   //$pricing = mysqli_real_escape_string($mr_con,$_REQUEST['total']);
  $pricing =$product['pricing'];
  $planprice=$pricing;





  $q1="SELECT `plan`, `subplan`, `min_months`, `image`, `description`,`alias` FROM lj_server_plans1 WHERE alias='$a1' AND flag='0'";

  $eq1=mysqli_query($mr_con,$q1);

  if(mysqli_num_rows($eq1)){

    while($r1=mysqli_fetch_array($eq1)){

      if($r1['subplan']=="Enterprise Dedicated Servers - E3"){
        $subplan='E3 - Series';
      }else if($r1['subplan']=="Enterprise Dedicated Servers - E5"){
        $subplan= 'E5 - Series';
      }else{
        $subplan= $r1['subplan'];
      }
      $re.='<div class="qwesr"><h2 class="category-title"><a role="button" href="javascript:void(0)" class="cate" style="color: #ffffff;">'.$subplan.'</a>

      <a class="change_me close-pro" style="background:transparent;margin-right:15px; float:right;" href="javascript:void(0)" data-value="'.$r1['alias'].'"><i class="fa fa-times" aria-hidden="true" style="color:#fff;"></i><!--<img src="images/close_a.png" style="width:10px; height:10px;">--></a>


      <a class="minus-pro" style="background:transparent;margin-right:15px; float:right;"  href="javascript:void(0)" data-value="'.$r1['alias'].'"><i class="toggle-me fa fa-chevron-up" aria-hidden="true" style="color:#fff;"></i><!--<img src="images/close_a.png" style="width:10px; height:10px;">--></a></h2>';


      $re.='<div class="category-block jaganindia">';

      $re.='<table width="100%" cellpadding="0" cellspacing="0" class="sum-table">';



      $re.='<tr>';

      $re.='<td >';

      $re.='<h3 class="arrow-bg bold">Plan Details:</h3></td><td></td><td valign="top">&nbsp;</td><tr><tr><td>&nbsp;</td></tr>';

       $re.='<input type="hidden" name="packproductid[]" class="packproductid" value="'.$productid.'">';


      if($cpu_total!=='' && $cpu_total!=='0')$re.='<tr><td style="width:41%; "><p class="dbmargin3" style=
      "text-indent: 0px !important; text-align: left !important;"><b>CPU :</b> </p></td><td style="width:34%; text-align: right !important;"><p class="dbmargin3" style="text-align: right !important;">'.$cpu.' Cores</p></td><td style="text-align: right;"><p class="dbmargin3" style="text-align: right !important;">'.$cpu_total.'/-</p></td></tr>';
      if($ram_total!=='' && $ram_total!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Ram :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$ram.' GB</p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$ram_total.'/-</p></td></tr>';

      if($cpu_e!=='' && $cpu_e!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>CPU :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$cpu_e.' Cores</p></td><td></td></tr>';

      if($ram_e!=='' && $ram_e!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Ram :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$ram_e.' GB</p></td><td></td></tr>';

      if($space_total!=='' && $space_total!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Disk Space :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$space.' GB</p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$space_total.'/-</p></td></tr>';

      if(($space_total=='' || $space_total=='0') &&($space!=='' && $space!=='0'))$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Disk Space :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$space.' GB</p></td><td></td></tr>';

      if($data_total!=='' && $data_total!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Data Transfer :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$data.' GB</p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$data_total.'/-</p></td></tr>';

      if($ip_num!=='' && $ip_num!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>IP :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$ip_num.'</p></td><td></td></tr>';
//echo $os;
      if($subplan!='Dedicated Disk Storage' && $subplan!= 'Enterprise Cloud Storage'){
        if($os!==''  && $os!=='0' && $os_t!==''  && $os_t!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>OS :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$os_t.'</p></td><td></td></tr>';}


      if($database!=='' && $database!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Database :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$database_t.'</p></td><td></td></tr>';
      if($backup!=='' && $backup!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Backup :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$backup.' GB</p></td><td></td></tr>';
      if($drive!=='' && $drive!=='0')$re.='<tr><td><p class="dbmargin3" style=
        "text-indent: 0px !important;text-align: left !important;"><b>Drive :</b> </p></td><td><p class="dbmargin3" style="text-align: right !important;">'.$drive.'</p></td><td></td></tr>';

      $mm_total= intval($planprice/$tenure);
      $re.='<tr><td style="padding-top: 13px;"><p class="dbmargin3" style= "
      text-indent: 0px !important;text-align: left !important;"><b style="    color: #262626 !important;">Monthly Cost: </b></p></td><td style="    padding-top: 13px;"></td><td style="padding-top: 13px;"><p 
      class="dbmargin3 mm_total" style="text-align: right !important;">'.$mm_total.'/-</p></td></tr></table>';



      $re.='<table width="100%" cellpadding="0" cellspacing="0" class="sum-table"><tr>';

      if($r1['subplan']=='Cloud Server'){

        $re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
        $re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
        $re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
        $re.='<input type="hidden" name="packprice1[]" class="packprice1" value="'.$pricing.'">';
        $re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

        $pricing=$cpu_total+$ram_total+$space_total+$data_total;
        $re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';

        $re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';


        $re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
        $re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
        $re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
        $re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';
        $re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';
        $re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
        $re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
        $re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
        $re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
        $re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
        $re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
        $re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
        $re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
        $re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

        $re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
        $re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
        $re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
        $re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';

        $re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';

        $re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
        $re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';


        $re.='<div><label><td><b class="lblgree">Tenure:</b></td> ';
       /* if($r1['subplan']=="Cloud Server"){  

          $re.='<td><select class="packmonths changepricing dbmargin3 cloudSelectMonths" style="text-indent: 0px !important;     width: 70%;
        height: inherit;" name="packmonths[]">';


         }else{
           $re.='<td><select class="packmonths changepricing dbmargin3" style="text-indent: 0px !important;     width: 70%;
        height: inherit;" name="packmonths[]">';


         }
*/
          $re.='<td><select class="packmonths changepricing dbmargin3" style="text-indent: 0px !important;     width: 70%;
        height: inherit;" name="packmonths[]">';
        $re.='<option value="1"'; if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>Monthly</option>';

      //if($r1['min_months']<='2')$re.='<option value="2" ';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months x Rs '.$pricing.'/-</option>';

        $re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>1 year (Quarterly Advance)</option>';

        $re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>1 year (50% Advance)</option>';

        $re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>1 year (100% Advance)</option>';

        $re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>2 years (100% Advance)</option>';

        $re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>3 years (100% Advance)</option>';



        $re.='</select></td></label><tr><td>&nbsp</td></tr>';
        $re.='<tr"><div class="jaganindia"><td><label><b class="lblgree">Quantity:</b></label></td><td>
        <span class="inline hello123"  style="padding-left:10px;">&nbsp;<img src="images/3546564.png" ></span>&nbsp;
        <input type="number" name="packqtt[]" value="1" class="incss changepricings123 inline dbmargin3" style="text-indent: 0px !important; 
        width: 34px;
        padding-left: 1px !important;   height: 20px;" min="1" max="10" step="1" readonly="readonly">
        <span class="inline hello1234">&nbsp;<img src="images/3546565.png" ></span></td></div>';





        //$re.='</td>';

        $re.='</tr>';




      }else if($r1['subplan']=='Virtual Dedicated Servers'){
        $re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
        $re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
        $re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
        $re.='<input type="hidden" name="packprice1[]" class="packprice1" value="'.$pricing.'">';
        $re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

        $pricing=$cpu_total+$ram_total+$space_total+$data_total;
        $re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';

        $re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';


        $re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
        $re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
        $re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
        $re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';
        $re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';
        $re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
        $re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
        $re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
        $re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
        $re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
        $re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
        $re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
        $re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
        $re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

        $re.='<input type="hidden" name="packdrivecode[]" class="packdrivecode" value="'.$drive_code.'">';


        $re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
        $re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
        $re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
        $re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';

        $re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';

        $re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
        $re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';



        $re.='<div><label><td><b class="lblgree">Tenure:</b></td> ';
        $re.='<td><select class="packmonths changepricing dbmargin3" style="text-indent: 0px !important;     width: 70%;
        height: inherit;" name="packmonths[]">';

        $re.='<option value="1"'; if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>Monthly</option>';

      //if($r1['min_months']<='2')$re.='<option value="2" ';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months x Rs '.$pricing.'/-</option>';

        $re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>1 year (Quarterly Advance)</option>';

        $re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>1 year (50% Advance)</option>';

        $re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>1 year (100% Advance)</option>';

        $re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>2 years (100% Advance)</option>';

        $re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>3 years (100% Advance)</option>';



        $re.='</select></td></label><tr><td>&nbsp</td></tr>';
        $re.='<tr"><div class="jaganindia"><td><label><b class="lblgree">Quantity:</b></label></td><td>
        <span class="inline hello123"  style="padding-left:10px;">&nbsp;<img src="images/3546564.png" ></span>&nbsp;
        <input type="number" name="packqtt[]" value="1" class="incss changepricings123 inline dbmargin3" style="text-indent: 0px !important; 
        width: 34px;
        padding-left: 1px !important;   height: 20px;" min="1" max="10" step="1" readonly="readonly">
        <span class="inline hello1234">&nbsp;<img src="images/3546565.png" ></span></td></div>';





        //$re.='</td>';

        $re.='</tr>';





      }else if(($r1['subplan']=='Enterprise Dedicated Servers - E3')||($r1['subplan']=='Enterprise Dedicated Servers - E5')){

        $re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
        $re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
        $re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
        $pricing = $tenure_price;

        $re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
        $re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

        $re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

        $re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
        $re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
        $re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
        $re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
        $re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
        $re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
        $re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
        $re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
        $re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
        $re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';
        $re.='<input type="hidden" name="packdrivecode[]" class="packdrivecode" value="'.$drive_code.'">';

        $re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
        $re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';

        $re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
        $re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
        $re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';

        $re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';

        $re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';


        $re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
        $re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
        $re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
        $re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';


        $re.='<div><label><td><b class="lblgree">Tenure:</b></td> ';
        $re.='<td><select class="packmonths changepricing dbmargin3" style="text-indent: 0px !important;     width: 70%;
        height: inherit;" name="packmonths[]">';



      //if($r1['min_months']<='2')$re.='<option value="2" ';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months x Rs '.$pricing.'/-</option>';

        $re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>1 year (Quarterly Advance)</option>';

        $re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>1 year (50% Advance)</option>';

        $re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>1 year (100% Advance)</option>';

        $re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>2 years (100% Advance)</option>';

        $re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>3 years (100% Advance)</option>';



        $re.='</select></td></label><tr><td>&nbsp</td></tr>';
        $re.='<tr"><div class="jaganindia"><td><label><b class="lblgree">Quantity:</b></label></td><td>
        <span class="inline hello123"  style="padding-left:10px;">&nbsp;<img src="images/3546564.png" ></span>&nbsp;
        <input type="number" name="packqtt[]" value="1" class="incss changepricings123 inline dbmargin3" style="text-indent: 0px !important;  
        width: 34px;
        padding-left: 1px !important;  height: 20px;" min="1" max="10" step="1" readonly="readonly">
        <span class="inline hello1234">&nbsp;<img src="images/3546565.png" ></span></td></div>';





        //$re.='</td>';

        $re.='</tr>';





      }
      else if(($r1['subplan']=='Enterprise Cloud Storage')||($r1['subplan']=='Dedicated Disk Storage')){

        $re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
        $re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
        $re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
        $pricing = $pricing-$ip;

        $re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
        $re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

        $re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

        $re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
        $re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
        $re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
        $re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
        $re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
        $re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
        $re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
        $re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
        $re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
        $re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

        $re.='<input type="hidden" name="packdrivecode[]" class="packdrivecode" value="'.$drive_code.'">';

        $re.='<input type="hidden" name="packtenure[]" class="packtenure" value="'.$tenure.'">';
        $re.='<input type="hidden" name="packtenureprice[]" class="packtenureprice" value="'.$tenure_price.'">';

        $re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';

        $re.='<input type="hidden" name="packcpu1[]" class="packcpu1" value="'.$cpu_total.'">';
        $re.='<input type="hidden" name="packcpu2[]" class="packcpu2" value="'.$ram_total.'">';
        $re.='<input type="hidden" name="packcpu3[]" class="packcpu3" value="'.$space_total.'">';

        $re.='<input type="hidden" name="packcpu4[]" class="packcpu4" value="'.$data_total.'">';



        $re.='<input type="hidden" name="packip_total[]" class="packip_total" value="'.$packip_total.'">';
        $re.='<input type="hidden" name="packbackup_total[]" class="packbackup_total" value="'.$packbackup_total.'">';
        $re.='<input type="hidden" name="packdatabase_total[]" class="packdatabase_total" value="'.$packdatabase_total.'">';
        $re.='<input type="hidden" name="packos_total[]" class="packos_total" value="'.$packos_total.'">';


        $re.='<div><label><td><b class="lblgree">Tenure:</b></td> ';
        $re.='<td><select class="packmonths changepricing dbmargin3" style="text-indent: 0px !important;     width: 70%;
        height: inherit;" name="packmonths[]">';

        $re.='<option value="1"'; if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>Monthly</option>';

      //if($r1['min_months']<='2')$re.='<option value="2" ';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months x Rs '.$pricing.'/-</option>';

        $re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>1 year (Quarterly Advance)</option>';

        $re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>1 year (50% Advance)</option>';

        $re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>1 year (100% Advance)</option>';

        $re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>2 years (100% Advance)</option>';

        $re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>3 years (100% Advance)</option>';



        $re.='</select></td></label><tr><td>&nbsp</td></tr>';
        $re.='<tr"><div class="jaganindia"><td><label><b class="lblgree">Quantity:</b></label></td><td>
        <span class="inline hello123"  style="padding-left:10px;">&nbsp;<img src="images/3546564.png" ></span>&nbsp;
        <input type="number" name="packqtt[]" value="1" class="incss changepricings123 inline dbmargin3" style="text-indent: 0px !important;  
        width: 34px;
        padding-left: 1px !important;  height: 20px;" min="1" max="10" step="1" readonly="readonly">
        <span class="inline hello1234">&nbsp;<img src="images/3546565.png" ></span></td></div>';





        //$re.='</td>';

        $re.='</tr>';





      }
      else if($r1['subplan']=='Virtual Dedied Servers'){

        $re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
        $re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
        $re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
        $pricing = $pricing-$ip;

        $re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
        $re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

        $re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

        $re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
        $re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
        $re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
        $re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
        $re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
        $re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
        $re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
        $re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
        $re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
        $re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

        $re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';

        $re.='<div><label><b class="lblgree">Tenure:</b> ';
        $re.='<select class="packmonths changepricing finselet" name="packmonths[]">';

        if($r1['min_months']=='1')$re.='<option value="1">Monthly</option>';



        $re.='<option value="3">1 year (Quarterly Advance)</option>';

        $re.='<option value="6">1 year (50% Advance)</option>';

        $re.='<option value="12">1 year (100% Advance)</option>';

        $re.='<option value="24">2 years (100% Advance)</option>';

        $re.='<option value="36">3 years (100% Advance)</option>';

      //$re.='<option value="48">48 Months x Rs '.$pricing.'/-</option>';

        $re.='</select></label>';
        $re.='<div class="jaganindia"><label><b class="lblgree">Quantity:</b></label>
        <span class="inline hello123"  style="padding-left:10px;">&nbsp;<img src="images/3546564.png" style="
          padding-bottom: 6px;
          "></span>&nbsp;
          <input type="number" name="packqtt[]" value="1" class="incss changepricings123 inline" min="1" max="10" step="1" readonly="readonly">
          <span class="inline hello1234">&nbsp;<img src="images/3546565.png" style="
            padding-bottom: 6px;
            "></span></div>';


          }


          else{

            $re.='<input type="hidden" name="packid[]" class="packid" value="'.$a1.'">';
            $re.='<input type="hidden" name="packselected[]" class="packselected" value="'.$r1['plan'].'">';
            $re.='<input type="hidden" name="packselectedsub[]" class="packselectedsub" value="'.$r1['subplan'].'">';
            $pricing = $pricing-$ip;

            $re.='<input type="hidden" name="packprice[]" class="packprice" value="'.$pricing.'">';
            $re.='<input type="hidden" name="packipn[]" class="packipn" value="'.$ip.'">';

            $re.='<input type="hidden" name="packminmonths[]" class="packminmonths" value="'.$r1['min_months'].'">';

            $re.='<input type="hidden" name="packcpu[]" class="packcpu" value="'.$cpu.'">';
            $re.='<input type="hidden" name="packram[]" class="packram" value="'.$ram.'">';
            $re.='<input type="hidden" name="packdata[]" class="packdata" value="'.$data.'">';
            $re.='<input type="hidden" name="packspace[]" class="packspace" value="'.$space.'">';
            $re.='<input type="hidden" name="packos[]" class="packos" value="'.$os_t.'">';
            $re.='<input type="hidden" name="packdb[]" class="packdb" value="'.$database_t.'">';
            $re.='<input type="hidden" name="packbackup[]" class="packbackup" value="'.$backup.'">';
            $re.='<input type="hidden" name="packips[]" class="packips" value="'.$ip_num.'">';
            $re.='<input type="hidden" name="packdrive[]" class="packdrive" value="'.$drive.'">';
            $re.='<input type="hidden" name="packserver[]" class="packserver" value="'.$server.'">';

            $re.='<input type="hidden" name="packpower[]" class="packpower" value="'.$power.'">';


            $re.='<div><label><td><b class="lblgree">Tenure:</b></td> ';
            $re.='<td><select class="packmonths changepricing dbmargin3" style="text-indent: 0px !important;     width: 70%;
            height: inherit;" name="packmonths[]">';

            $re.='<option value="1"'; if($tenure=='1'){$re.= selected(1,$tenure);}$re.='>Monthly</option>';

      //if($r1['min_months']<='2')$re.='<option value="2" ';if($tenure=='2'){$re.= selected(2,$tenure);}$re.='>2 Months x Rs '.$pricing.'/-</option>';

            $re.='<option value="3"';if($tenure=='3'){$re.= selected(3,$tenure);}$re.='>1 year (Quarterly Advance)</option>';

            $re.='<option value="6"';if($tenure=='6'){$re.= selected(6,$tenure);}$re.='>1 year (50% Advance)</option>';

            $re.='<option value="12"';if($tenure=='12'){$re.= selected(12,$tenure);}$re.='>1 year (100% Advance)</option>';

            $re.='<option value="24"';if($tenure=='24'){$re.= selected(24,$tenure);}$re.='>2 years (100% Advance)</option>';

            $re.='<option value="36"';if($tenure=='36'){$re.= selected(36,$tenure);}$re.='>3 years (100% Advance)</option>';



            $re.='</select></td></label><tr><td>&nbsp</td></tr>';
            $re.='<tr"><div class="jaganindia"><td><label><b class="lblgree">Quantity:</b></label></td><td>
            <span class="inline hello123"  style="padding-left:10px;">&nbsp;<img src="images/3546564.png" ></span>&nbsp;
            <input type="number" name="packqtt[]" value="1" class="incss changepricings123 inline dbmargin3" style="text-indent: 0px !important; 
            width: 34px;
            padding-left: 1px !important;   height: 20px;" min="1" max="10" step="1" readonly="readonly">
            <span class="inline hello1234">&nbsp;<img src="images/3546565.png" ></span></td></div>';





        //$re.='</td>';

            $re.='</tr>';





          }



          $re.='</table>';

          $re.='<table width="100%" cellpadding="0" cellspacing="0" class="sum-table sum-tablea">';

          $re.='<tr>';

          $re.='<td><span class="bold">Plan Price: Rs <span class="subbrtor" id="subbrtor">'.$planprice.'</span>/-</span></td>';
          $re.='<input type="hidden" name="planprice[]" class="planprice" id="planprice2" value="'.$planprice.'">';
          $re.='<input type="hidden" name="plantotal[]" class="plantotal" id="plantotal" value="'.$planprice.'">';


          $re.='</tr>';
          if(($r1['subplan']=='Enterprise Dedicated Servers - E3')||($r1['subplan']=='Enterprise Dedicated Servers - E5'))
          {
            $re.='<tr>';

            $re.='<td><span class="bold"><font color="red">*</font>One Time Set Up Charges will be applicable</span></td>';
            $re.='</tr>';
          }

          $re.='</table>';

          $re.='</div></div>';


        }

      }else{}
    }
    echo $re;

    ?>