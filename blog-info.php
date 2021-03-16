<?php
	include_once('includes/db-config.php');


 $data = new Databases;

 $postid = $_GET['id'];
 $post = $data->select_single('posts', $postid);
 include_once('includes/header.php');
?>


<div class="hb-blogConInfo">
	<div class="container">
		<div class="hb-blog_Info">
			<h1><?php echo $post["title"]; ?></h1>
			<div class="hb-SciInfo">
				<div class="hb-postinfo">
					<p><i class="fa fa-calendar" style="font-size: 16px;background: #2c84b2;padding: 9px;color: white;margin-right: 13px;"></i><span><?php echo $post["created_at"]; ?></span></p>
				</div>
				<ul class="list-inline  hb-bSin  text-right"> 
                    <li><a href="https://www.linkedin.com/company/pidatacenters" target="_blank"> <img src="images/menu-icons/linkedin_ico.svg" alt='linkedin'></a></li>
                    <li><a href="https://twitter.com/Pi_DATACENTERS" target="_blank"> <img src="images/menu-icons/twitter_ico.svg" alt='twitter'></a></li>
                    <li><a href="https://www.youtube.com/channel/UCcrUri8y8maUmz3P_9uCeJg" target="_blank"> <img src="images/menu-icons/youtube_ico.svg" alt='youtube'></a></li>
                         
                    <li><a href="#"> <img src="images/menu-icons/Instagram_ico.svg" alt='insta'></a></li>
                    <li><a href="https://web.facebook.com/pidatacenters" target="_blank"> <img src="images/menu-icons/facebook_ico.svg" alt='facebook'></a></li>
                 </ul>
		</div>

		<div class="hb-bImg_co">
			<p>
				<img src="https://harbour1.in/dashboard/public/imgs/<?php echo $post["full_img"]; ?>" alt="log">
			</p>
		</div>
		<div class="hb-bC_cni">
			<?php echo $post["detail"]; ?>
		</div>
	</div>
</div>
</div>
<?php
	include_once('includes/footer.php');
?>
