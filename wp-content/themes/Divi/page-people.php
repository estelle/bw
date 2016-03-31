<?php 
/* 
Template Name: People
*/
?>
<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

// $dev =  $_GET['dev'];
// if($dev == 1){
// 	echo "<link rel='stylesheet' type='text/css' href='/dev/wp-content/themes/Divi/css/responsive.css' />";
// }

?>

<div id="main-content" class="sup">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area">
			<div style="margin:0 auto;width:100%;position:relative;padding:0;">
				<h3 class="open-sans" style="margin:0 0 0 0;padding:0;color:#676767;font-size:32px;font-weight: normal;line-height:40px;"><?php the_content(); ?></h3>
			</div>
			<div style="margin:0 auto;width:100%;position:relative;padding:15px 0;">
				<?php $person = new WP_Query(array('post_type' => 'people', 'posts_per_page' => -1, 'meta_key' => 'order_number','orderby' => 'meta_value_num','order' => 'ASC')); ?>

				<?php 
				$counter = 0;
					while($person->have_posts()): 
						
						$person->the_post();
						$name = get_field('name');
						//$office = get_field('office');
						$officeDetail = get_field('office_detail');
						$photo = get_field('photo');
						$title = get_field('title');
            
						if($counter == 0){
							echo '<ul class="people-list">';
						}
								echo "<li>";
            			?>
					               <a href="<?php echo get_permalink(); ?>">
										<div id="<?php echo get_the_ID(); ?>" class="profile-box <?php if(empty($photo)){echo "noImagePresent";} echo ' list-item-' . $counter ?>" style="<?php if(empty($photo)){echo "background-color: rgba(191, 204, 215, 0.4);";}else{echo "background-image:url(" . $photo . ");";} ?>">
											<div style="background-color:#255280;opacity:0.8;position:absolute;bottom:0;height:100%;width:100%;display:none;" class="profile-box-highlight"></div>
											<div style="position:absolute;bottom:0;top:30px;width:100%;">
												<h5 class="open-sans peopleText" style="font-weight:700;<?php if(empty($photo)){echo "color: rgb(0, 143, 180);";}else{echo "display:none;color:#fff;";} ?> margin:12px 0 0 20px;font-size:14px;"><?php echo $name; ?></h5>
												<h6 class="peopleText" style="margin:0 20px 0 20px;font-size:12px;letter-spacing:.5px;text-transform:uppercase;font-weight: 300;<?php if(empty($photo)){echo "color: rgb(0, 143, 180);";}else{echo "display:none;color:#fff;";} ?>"><?php echo $title; ?></h6>
                    
					                            <div class="peopleText" style="padding:20px;bottom:13px;font-size:12px;font-family: museo-sans, sans-serif;font-weight:300;<?php if(empty($photo)){echo "color: rgb(0, 143, 180);";}else{echo "display:none;color:#fff;";} ?>"><?php foreach($officeDetail as $officeInfo){echo $officeInfo->post_title; if ($officeInfo != end($officeDetail)){echo ' | ';}} ?></div>
					
											</div>

					<div class="peopleText read-more" style="font-weight:300;position:absolute;bottom:13px;font-size:12px;font-family: museo-sans, sans-serif;
					font-weight: 300;<?php if(empty($photo)){echo "color: rgb(0, 143, 180);";}else{echo "display:none;color:#fff;";} ?>">Read more</div>

										</div>
					                </a>
							<?php 
							echo '</li>';
							
							$counter ++;
							//echo "counter: " . $counter;
					if($counter == 4){
						$counter = 0;
						echo '</ul>';
					}
				endwhile; ?>
				<br style="clear:both;"/>
			</div>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>
<?php wp_reset_postdata(); ?>
<script>

jQuery(document).ready(function($) {
	$("#content-area .profile-box:eq(3), #content-area .profile-box:eq(7), #content-area .profile-box:eq(11), #content-area .profile-box:eq(15), #content-area .profile-box:eq(19), #content-area .profile-box:eq(23), #content-area .profile-box:eq(27), #content-area .profile-box:eq(31)").css({"margin-right":"0"});
});

</script>