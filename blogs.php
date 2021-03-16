<?php
	include_once('includes/db-config.php');
 	include_once('includes/header.php');

	 $data = new Databases;
?>


<div class="hb-bannerCont">
	<div class="hb-bannerImgCont">
		<div class="hb-bannerImg">
			<picture>
			     <source media="(max-width: 768px)" srcset="images/banners/blog_mbanner.png">
			      <img  src="images/banners/blog_banner.png" alt="Harbour1 Cloud Backup as a Service Banner" style="width:100%">
      		</picture>
		</div>		
	</div>
</div>


<div class="hb-blogs">
	<div class="container">
		<ul class="list-inline hb-blogLists">
		<?php  
			$post_data = $data->select('posts','1');
             if (count($news_data)>0) {
                 foreach ($post_data as $post) {
        ?>  
			<li  class="hb-blogBox">
				<div class="hb-blogBoxCont" >
					<div class="hb-blogIm">
						<p>
						<img src="https://harbour1.in/dashboard/public/imgs/<?php echo $post["thumb"]; ?>" alt="blog1">
					</p>
					</div>
					<div class="hb-blogBoxInfo">
						<h3><?php echo $post["title"]; ?></h3>
						<p><?php echo substr(strip_tags($post["detail"]), 0, 120); ?>...</p>
						<div class="hb-blogClick  ">
							<a href="./blog-info.php?id=<?php echo $post["id"]; ?>&title=<?php echo $data->create_slug($post["title"]) ?>" class="global-button">Read More</a>
						</div>
					</div>
				</div>
			</li>
		<?php
                 }
             }else{
				 echo 'No Posts';
			 }
		?>
		</ul>
	</div>
</div>
<?php
	include_once('includes/footer.php');
?>
