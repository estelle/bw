<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="featured" style="height:auto;">

	<div id="featured-inner" style="height:auto;">

        <div id="content-area">
            <?php the_content();?>
        </div>
        
   	</div>
    
</div>

<?php endwhile; endif;  wp_reset_query(); ?>

<?php get_footer(); ?>