<?php
	include_once('includes/db-config.php');
 	include_once('includes/header.php');

	 $data = new Databases;
?>

<div class="hb-bannerCont">
	<div class="hb-bannerImgCont">
		<div class="hb-bannerImg">
			<picture>
			     <source media="(max-width: 768px)" srcset="images/banners/news_mbanner.png">
			      <img  src="images/banners/news_banner.png" alt="Harbour1 Cloud Backup as a Service Banner" style="width:100%">
      		</picture>
		</div>		
	</div>
</div>

<div class="hb-newsSection">
	<div class="container">
		<ul >
		<?php  
			$news_data = $data->select('posts','2'); 
			if(count($news_data)>0){
				foreach ($news_data as $post) {
					?>			
				<li class="hb-newsContSection">
				  <div class="hb-newsDate">
						<div class="hb-NewsDesData">
							<div class="news-date">
								<h3>May<span> 23</span> </h3>
							</div>
						</div>
						<div class="hb-newsContDes">
							<h2><?php echo $post["title"]; ?></h2>
							<span>09-Jul-2018, Monday</span>
							<p><?php echo substr(strip_tags($post["detail"]), 0, 120); ?>...</p>
							<div class="hb-neRedMor">
								<a href="./news-info.php?id=<?php echo $post["id"]; ?>&title=<?php echo $data->create_slug($post["title"]) ?>">ReadMore</a>
							</div>
						</div>
				  </div>
					<div class="hb-newsThumb">
						<p>
						<img src="https://harbour1.in/dashboard/public/imgs/<?php echo $post["thumb"]; ?>" >
						</p>
					</div>
				</li>
				<?php
				}
				
			}
			else{
				echo "no posts";
			} 
            ?>
		</ul>
	</div>
</div>

<?php
	include_once('includes/footer.php');
?>
