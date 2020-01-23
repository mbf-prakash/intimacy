<?php get_header();?>
<div class="container blog-detail section-start generic-list">

			<div class="breadcrumbs clearfix nomobile">
				 <ul>
	              <?php
	              if (function_exists('bcn_display')) {
	              bcn_display();
	              }?>
	            </ul>
			</div>
			<div class="row">
				<div class="col-8 col-center-block">
					<div class="no-desc back-catagory"><a href="<?php echo get_bloginfo('url'); ?>/inspiration"><i class="fa fa-angle-left" aria-hidden="true"></i>Inspiration</a></div>
					<div class="desview">
						<h1><?php echo $post->post_title;?></h1>
						<h3><?php echo get_the_date('F jS, Y'); ?></h3>
					</div>
					<?php echo apply_filters('the_content', $post->post_content); ?>
				</div>
				<div class="col-4 side-bar">
					<?php 
				$currLnk = get_permalink($post->ID);
				?>
				<!-- <div class="social-links left">
				    	<h6>SHARE THIS</h6>
						<div class="footer-social">
							<a class="no-effect" href="http://www.facebook.com/sharer.php?u=<?php echo $currLnk; ?>&t=<?php echo $post->post_title; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a class="no-effect" href="https://www.linkedin.com/cws/share?url=<?php echo $currLnk; ?>&t=<?php echo $post->post_title; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>
					</div> -->
				</div>
			</div>
</div>

<?php get_footer(); ?>