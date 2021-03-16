<?
include('mysql.php');
function generateRandomString($length = 8) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++){$randomString .= $characters[rand(0, $charactersLength - 1)];}
	return strtoupper($randomString);
}
if(isset($_REQUEST['title']) && $_REQUEST['title']!=''){
$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$fileName=generateRandomString().".".$ext;
$upfile=move_uploaded_file($_FILES["file"]["tmp_name"],"../images/".$fileName);
if($upfile){$profileimg = "images/".$fileName;$check=TRUE;}else{$profileimg="";}
	
	
	
$qw2="INSERT INTO lj_server_plans (title, category1, category2, category3, min_gb, min_months, price, increments, iops, descrip, alias,imggg)
VALUES('".$_REQUEST['title']."','".$_REQUEST['cat1']."','".$_REQUEST['cat2']."','".$_REQUEST['cat3']."','".$_REQUEST['mingb']."','".$_REQUEST['minmonths']."','".$_REQUEST['price']."','".$_REQUEST['increm']."','".$_REQUEST['iops']."','".$_REQUEST['description']."','".$_REQUEST['alias']."','$profileimg')";
$eq1=mysqli_query($mr_con,$qw2);
}
	$q1="SELECT categ_name,id FROM categories";
	$eq1=mysqli_query($mr_con,$q1);
	if(mysqli_num_rows($eq1)>'0'){
		while($r1=mysqli_fetch_array($eq1)){
		$recv.='<option value="'.$r1['id'].'">'.$r1['categ_name'].'</option>';
		}
	}else return '0';

?>

<form action="" method="post" enctype="multipart/form-data">
title:<input name="title"><bR><bR>
cat 1<select name="cat1"><option value="0">Select</option> <?php echo $recv;?></select><bR><bR>
cat 2<select name="cat2"><option value="0">Select</option><?php echo $recv;?></select><bR><bR>
cat 3<select name="cat3"><option value="0">Select</option><?php echo $recv;?></select><bR><bR>
Min GB:<input name="mingb"><bR><bR>
min months:<input name="minmonths"><bR><bR>
price:<input name="price"><bR><bR>
increments:<input name="increm"><bR><bR>
iops:<input name="iops"><bR><bR>
description:<textarea name="description"></textarea><bR><bR>
alias:<input name="alias"><bR><bR>
<input type="file" name="file" />
<input type="submit">
</form>