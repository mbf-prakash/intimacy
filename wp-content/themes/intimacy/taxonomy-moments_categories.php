<?php 
get_header();
$curr_term_id = get_queried_object()->term_id;
$post_term=get_queried_object();
$moments_cat_args = array('post_type' => 'moments',
                          'orderby'    => 'menu_order',
                          'order' => 'ASC',
			              'numberposts'=>-1,
                              'tax_query' =>  array(
                                      array(
                                          'taxonomy' => 'moments_categories',
                                          'field' => 'id',
                                          'terms' => $curr_term_id
                                          )
                              )
                              );
$moments = get_posts($moments_cat_args);
?>
<div>&nbsp;</div>
<section class="container generic-container section-start generic-list">
	    <div class ="row">
						<div class="col-8">
							<div class="breadcrumbs clearfix nomobile">
								<ul>
									<li><a href="<?php echo get_bloginfo('url'); ?>" class="home">Home</a></li>	
									<li><a href="<?php echo get_bloginfo('url'); ?>/moments" class="Moments">Moments</a></li>
									<li><a><?php echo $post_term->name; ?></a></li>
								</ul>
							</div>
							<div class="no-desc back-catagory">
								<a href="<?php echo get_bloginfo('url'); ?>">
									<i class="fa fa-angle-left" aria-hidden="true"></i>Home
								</a>
							</div>
							<h1><?php echo $post_term->name; ?></h1>
							    <?php echo wpautop($post_term->description); ?>
						</div>
	</div>
						<div class="blog">
								<div class="">
									<div class="row">

								<?php	foreach ($moments as $moment){
										$feat_image = wp_get_attachment_url(get_post_thumbnail_id($moment->ID));

									?>

								<div class="col-4">
									<a href="<?php echo get_permalink($moment->ID); ?>" class="vertical-tile p-0 no-effect">
									    <div class="vertical-tile-banner">
											<img src="<?php echo $feat_image;?>" alt="hero-banner">
										</div>
										<div class="vertical-tile-content">
											<h6><?php echo get_the_date('F jS, Y'); ?></h6>
											<h3><?php echo $moment->post_title; ?></h3>
									    </div>
								    </a>
								</div>
								<?php } ?>
								</div>
							</div>
						</div>
				</section>
<?php get_footer();?>
