<?php
get_header();
$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
?>

<div id="main-content">
<?php if ( ! $is_page_builder_used ) : ?>
	<div class="container">
		<div id="content-area">
			<?php while ( have_posts() ) : the_post(); 
					$project_id = $wp_query->query_vars['prj'];
					$post = get_post($project_id);
					$subtitle = get_field('subtitle');
					$tags = get_field('tags');
					$featured_images = get_field('featured_image');
					$description = get_field('description');
					$at_a_glance = get_field('at_a_glance');
					$project_outcomes = get_field('project_outcomes');
					$graphs = get_field('graphs');
					$slider_gallery = get_field('slider_gallery');
					$at_a_glance_text = get_field('at_a_glance_text') ?: "At a Glance";
					$at_a_glance_link = get_field('at_a_glance_link');
					$at_a_glance_text_area = get_field('at_a_glance_text_area');
					$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
					$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
					$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all")); 
			?>
			<div class="single-project-container">  
				<div class="single-project-content-container">
					<h2 class="client-name open-sans"><?php the_field('client'); ?></h2>
					<h3 class="project-headline open-sans"><?php print $post->post_title; ?></h3>
					<h5 class="project-subline open-sans"><?php the_content(); ?></h5>
                    <?php 
					
					/* Services */
					if(!empty($services)){  ?>
						<ul id="tags-blue"><li class="title-li" style="margin: 2px 5px 3px 0;padding: 0;list-style-type: none;float: left;font-size: 14px;color: #676767;width: 120px;">Services provided</li>
                        <?php foreach ($services as $service) { 
							$cleaned = str_replace('&amp;','&',$service->name);
							$pieces = explode("; ", $cleaned);
							foreach($pieces as $element) { ?>
								<li class="tag open-sans">
									<a class="click" 
										name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $element; ?>
									</a>
								</li><?php 
							} 
						} ?>
						</ul>
<?php				}
					
					/* Industry sectors */
					if(!empty($industry_sectors)){?>
						<ul id="tags-blue"><li class="title-li" style="margin: 2px 5px 3px 0;padding: 0;list-style-type: none;float: left;font-size: 14px;color: #676767; width: 120px;">Industry sector</li>						
						<?php
                        foreach ($industry_sectors as $industry_sector) { ?>
                            <li class="tag open-sans"><a class="click" name="<?php echo $industry_sector->name; ?>" id="show-<?php echo $industry_sector->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $industry_sector->slug . "&type=industry-sector-filter"; ?>"><?php echo $industry_sector->name; ?></a></li><?php 
						} ?>
						</ul>
<?php 				} 
					
                    if(!empty($industry_sectors)){ ?>
						<ul id="tags-blue">
							<li class="title-li" style="margin: 2px 5px 3px 0;padding: 0;list-style-type: none;float: left;font-size: 14px;color: #676767; width: 120px;">Building types</li>
                        <?php 
                        foreach ($building_types as $building_type) { ?>
                            <li class="tag open-sans"><a class="click" name="<?php echo $building_type->name; ?>" id="show-<?php echo $building_type->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $building_type->slug . "&type=building-type-filter"; ?>"><?php echo $building_type->name; ?></a></li><?php 
						} ?>
						</ul>
<?php 				} ?>

                    <div style="clear:both;"></div>

					<!-- the slider script -->
                    <div style="max-width: 626px; margin: 30px 0 30px 0;" class="metaslider metaslider-flex metaslider-7035 ml-slider">
						<div id="metaslider_container_7035">
							<div id="metaslider_7035" class="flexslider">
								<ul class="slides">
								<?php 
									foreach($featured_images as $featured_image) { 
										if(empty($featured_image['featured_image'])){}
										else { ?>
											<li style="display: block;  height:400px;float: left;">
												<img src="<?php print $featured_image['featured_image']; ?>" />
											</li>       
<?php 									} 
									  }
									foreach($slider_gallery as $slider_gallery_image) {
										if(empty($slider_gallery_image['slider_image'])){}
										else { ?>
											<li style="display: block; width: 100%; height:400px; float: left;">
												<img src="<?php print $slider_gallery_image['slider_image']; ?>" />
											</li>
<?php 									} 
									} ?>    
								</ul>			
							</div>       
						</div>
						<?php 
							if(empty($slider_gallery_image['slider_image'])){}
							else { ?> 
							   <script type="text/javascript">
									var metaslider_7035 = function($) {
										$('#metaslider_7035').addClass('flexslider'); // theme/plugin conflict avoidance
										$('#metaslider_7035').flexslider({ 
											slideshowSpeed:600000000,
											animation:"fade",
											controlNav:true,
											directionNav:true,
											pauseOnHover:true,
											direction:"horizontal",
											reverse:false,
											animationSpeed:700,
											prevText:"\34",
											nextText:"\35",
											slideshow:true
										});
									};
									var timer_metaslider_7035 = function() {
										var slider = !window.jQuery ? window.setTimeout(timer_metaslider_7035, 1) : !jQuery.isReady ? window.setTimeout(timer_metaslider_7035, 1) : metaslider_7035(window.jQuery);
									};
									timer_metaslider_7035();
								</script>
						<?php } ?>
					</div> 
					
                    <div class="project-section-text open-sans"><?php echo $description; ?></div>
				</div>
				<div class="single-project-sidebar-container">
					<div class="project-sidebar open-sans">
						<h2 class="project-sidebar-header open-sans"><?php echo $at_a_glance_text;?></h2>
						<ul class="project-sidebar-list">
							<?php if (get_field('city') || get_field('state')) { ?>
								<li>
									<i style="color:#003260; padding-right: 15px;display: table-cell;" class="fa fa-map-marker fa-fw"></i>
									<span><?php if(get_field('city')) { the_field('city') ;  ?>, <?php } the_field('state');  ?></span>
								</li>
                        <?php } 
						if (get_field('certification_level')) { ?>
<li><i style="color:#003260; padding-right: 15px;display: table-cell;" class="fa fa-certificate fa-fw"></i><span><?php the_field('certification_level'); ?></span></li>
<?php } ?>
							<?php foreach($at_a_glance as $at_a_glance_item): ?>
                            <?php if(!empty($at_a_glance_item['text'])){ ?>
                            	<li>
                             <?php if(!empty($at_a_glance_item['icon'])){ ?>
                            
								<i style="color:#003260; <?php if (!empty($at_a_glance_item['icon'])){echo "padding-right: 15px;";} ?> display: table-cell;" class="fa <?php echo $at_a_glance_item['icon']; ?> fa-fw"></i>
								<?php }; ?>
								<span>
							<?php print $at_a_glance_item['text']; ?></span></li>
							<?php }; endforeach; ?>
                            <?php foreach($at_a_glance_link as $at_a_glance_link_item): ?> 
                            <?php if(!empty($at_a_glance_link_item['text'])){ 
                            
									if (strpos($at_a_glance_link_item['text'],'http"//') !== false) {
										$externalLink = $at_a_glance_link_item['text'];
									}
									else{
										$externalLink = "http://" . $at_a_glance_link_item['text'];	
									}
							?>
								<li><i style="color:#003260; padding-right: 15px; display: table-cell;" class="fa fa-fw fa-link"></i><span><a href="<?php print $externalLink; ?>"><?php print $at_a_glance_link_item['text']; ?></a></span></li>
							<?php }; endforeach; ?>
                            
                            
                            <?php if(!empty($at_a_glance_text_area)){ ?>
                            
								<li class="glanceTextArea"><span><?php print $at_a_glance_text_area ?></span></li>
                                
                        <?php } ?>  
						</ul>
					</div>
                    <?php if (!empty($project_outcomes[0]['text'])) { ?> 
					<div class="project-sidebar">
						<h5 class="project-sidebar-header open-sans">Key Project Outcomes</h5>
						<ul class="project-sidebar-list open-sans">
                        
							<?php foreach($project_outcomes as $project_outcomes_item): ?>
								<li><i style="color:#003260; <?php if (!empty($project_outcomes_item['icon'])) {echo "padding-right: 15px;";} ?> display: table-cell" class="fa fa-fw <?php print $project_outcomes_item['icon']; ?>"></i><span><?php print $project_outcomes_item['text']; ?></span></li>
                                
                                
							<?php endforeach; ?>
						</ul>
						<?php foreach($graphs as $graph): ?>
							<?php print $graph['chart']; ?>
						<?php endforeach; ?>
					</div>
                    <?php } ?>
				</div>
				<br style="clear:both;"/>     
			</div>
            <?php endwhile; ?>
				</div> <!-- #content-area -->
			</div> <!-- .container -->

		<?php endif; ?>

		</div> <!-- #main-content -->

		<?php get_footer(); ?>