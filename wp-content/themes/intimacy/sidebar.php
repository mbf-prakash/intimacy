<?php 
$right_nav = get_post_meta( $post->ID, '_right_nav', true );
if($right_nav!=''){
?>		

			<div class="col-4 h-100">
				<div class="sticky-sidebar">
				    <?php  echo do_shortcode($right_nav); ?>
			    </div>
			</div>
<?php } ?>