<?php get_header(); ?>
<div class="container section-start nomobile">
				<div class="row">
					<div class="col-12">
						<div class="breadcrumbs clearfix">
							<ul>
								<li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
								<li><a href="#"><?php echo $post->post_title; ?></a></li>
							</ul>
					</div>

					</div>
				</div>
			</div>

<div class="container generic-container generic-list">
					<div class="row">
						<div class="col-8 col-center-block">
										<div class="no-desc back-catagory"><a href="<?php echo get_site_url().'/'; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>Home</a></div>
							<h1><?php echo $post->post_title; ?></h1>
							<?php echo apply_filters('the_content', $post->post_content); ?>
						</div>
					</div>
				</div>
<?php get_footer();?>
