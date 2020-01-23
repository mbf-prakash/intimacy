<?php
/**********
Template Name: My Account Page
**********/
?>
<?php
get_header();
?>
<section class="myaccount-section" >							
	<?php echo apply_filters('the_content', $post->post_content); ?>
</section>
<?php get_footer();?>
