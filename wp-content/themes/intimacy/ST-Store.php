<?php 
 /*******
Template Name:Stores
*******/
get_header();
?>
<section class="myaccount-section section-start" >
			<div class="container generic-container">
				<div class="row myaccount-heading">
					<div class="col-8">
						<div class="breadcrumbs clearfix nomobile">
							<ul>
								<li><a href="<?php echo get_site_url().'/'; ?>" title="Home">Home</a></li>
								<li><a href="#"><?php echo $post->post_title; ?></a></li>
							</ul>
						</div>	
						<div class="no-desc back-catagory"><a href="<?php echo get_site_url().'/'; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i>Home</a></div>
						<h1><?php echo $post->post_title; ?></h1>
			            <?php echo apply_filters('the_content', $post->post_content); ?>
					</div>
				</div>
				<div class="row formWrap main-content">
					<div class="col-3 myaccount-tab">
						<div class="myaccount-sidetab" >
							<ul>
								<li class="active" value="#details">All Location</li>
								<?php $args = array(
					                   'post_type'    => 'location',
					                     'taxonomy'   => 'location_cat',
					                     'order'    => 'DESC',
					                     'orderby'      => 'term_order',
					                     'hide_empty'   => '0',
					                     'numberposts'  => -1
					              );
					             $all_categories = get_categories( $args );

					             foreach ($all_categories as $cat) {
					             ?>
								<li value="#<?php echo $cat->name; ?>"><?php echo $cat->name; ?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-9 myaccount-form ">
						<div class="myaccount-subform active" id="details">
							<div class="accord active">All Location</div>
							<div class="subformtab  active">
							<div class="row address-card-con">
								<?php
					                $loc_cat_args = array(
					                 'post_type' => 'location',
					                 'orderby'    => 'menu_order',
					                 'order' => 'DESC',
					                 'numberposts'=> -1
					                 
					                );
					               $stores = get_posts($loc_cat_args);
					               foreach ($stores as $store) {
					               ?>
									<div class="col-4">
										<div class="myaccount-address-box">
											<h3><?php echo $store->post_title; ?></h3>
											<?php echo apply_filters('the_content', $store->post_content); ?>
							              	
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
						<?php foreach ($all_categories as $cat) {?>	
						<div class="myaccount-subform" id="<?php echo $cat->name; ?>">
							<div class="accord"><?php echo $cat->name; ?></div>
							<div class="subformtab">
							<div class="row address-card-con">
								<?php 
				                $location_cat_args = array('post_type' => 'location',
				                                            'orderby'    => 'menu_order',
				                                            'order' => 'DESC',
				                                            'numberposts'=>-1,
				                                            'tax_query' =>  array(
				                                                    array(
				                                                        'taxonomy' => 'location_cat',
				                                                        'field' => 'id',
				                                                        'terms' => $cat->term_id
				                                                        )
				                                            )
				                                            );
				                $locations = get_posts($location_cat_args);
				                
				                foreach ($locations as $key => $location) {
				                  $term_prods[$cat->term_id][] = $location->ID;
				                }
								foreach ($locations as $location) { 
								 ?>
									<div class="col-4">
										<div class="myaccount-address-box">
											<h3><?php echo $location->post_title; ?></h3>
											<?php echo apply_filters('the_content', $location->post_content); ?>
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); ?>