<?php
	include_once('includes/db-config.php');
 	include_once('includes/header.php');

	 $data = new Databases;
?>

<div class="hb-bannerCont">
	<div class="hb-bannerImgCont">
		<div class="hb-bannerImg">
			<picture>
			     <source media="(max-width: 768px)" srcset="images/banners/cstu_banner.png">
			      <img  src="images/banners/cstu_mbanner.png" alt="Harbour1 Cloud Backup as a Service Banner" style="width:100%">
      		</picture>
		</div>		
	</div>
</div>


<div class="hb-blogs">
	<div  class="hb-casePop">
		<div class="hb-dPop">
			<p class="text-center">Fill Your Details</p>
			<form class="hb-casestudy_form" id="caseStudiesForm">
			<div class="hb-cFormGroup">
				<label>Name</label>
				<input type="text" name="name" required="" placeholder="Name" required autocomplete="off">
			</div>
			<div class="hb-cFormGroup">
				<label>Company Name</label>
				<input type="text" name="companyName" required="" placeholder="Company Name" required autocomplete="off">
			</div>
			<div class="hb-cFormGroup">
				<label>Mobile Number</label>
				<input type="text" name="mobile" required="" placeholder="Mobile Number" required autocomplete="off">
			</div>
			<div class="hb-cFormGroup">
				<label>Email ID</label>
				<input type="text" name="email" required="" autocomplete="off" required placeholder="Email">
			</div>
			<div class="hb-cFormGroup">
				<input type="hidden" name="post_id" id="post_id">
				<input type="submit" name="submit" value="Download Case Study" class="hb-cseSub">
			</div>
		</form>
		</div>
	</div>
	<div class="container">

		<ul class="list-inline hb-blogLists">
		<?php  
			$case_data = $data->select('posts','3');
             if (count($case_data)>0) {
                 foreach ($case_data as $post) {
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
							<p  class="global-button hb-downLoadTest"  data-post_id="<?php echo trim($post['id']); ?>">Download Case Study</p>
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
