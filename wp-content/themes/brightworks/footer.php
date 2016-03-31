<br style="clear:both;"/>
		<div id="footer">

<div id="footer-inner-wrapper">
				<ul	id="city-menu">

                <?php
			global $post;
			$office = new WP_Query();
			$office->query('posts_per_page=-1&post_type=office&orderby=menu_order&order=ASC');
			if ( $office->have_posts() ) : while ( $office->have_posts() ) : $office->the_post(); ?>
	
					<li><a href="/contact/#<?php echo strtolower($post->post_name); ?>"><?php the_title(); ?></a></li>
<?php endwhile; endif;  wp_reset_query(); //wp_reset_postdata();  ?>
				</ul>



<div id="footer-inner-wrapper">
				
				<div id="copyright-block">Copyright &copy; 2001-<?php echo date("Y"); ?> Brightworks Sustainability Advisors. All rights reserved.</div>
				
			</div>


			
			<br style="clear:both;"/>
		</div>
	</div>
</body>
</html>