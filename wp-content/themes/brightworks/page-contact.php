<?php 
/* 
Template Name: Contact
*/
?>
<?php get_header(); ?>

		<div id="content-area">
			<div style="display:none;margin:0 auto;width:1022px;position:relative;height:420px;">
				<div style="left: 10px; color: rgb(103, 103, 103); font-size: 36px; position: absolute; top: 25px; font-family: Open Sans; width: 400px;line-height: 42px;"><?php the_content(); ?></div>
				<div style="left: 10px; position: absolute; top: 250px; font-family: Open Sans; width: 400px;">
					<div>
						<ul style="list-style: none outside none;margin: 0;padding: 0;" class="contact-nav">
                        <?php
			global $post;
			$office = new WP_Query();
			$office->query('posts_per_page=-1&post_type=office&orderby=menu_order&order=ASC');
			if ( $office->have_posts() ) : while ( $office->have_posts() ) : $office->the_post(); ?>
							<li  style="float:left;width:195px;" class="<?php echo $post->post_name; ?>-office"><?php the_title(); ?></li>
                            <?php endwhile; endif;  wp_reset_query(); //wp_reset_postdata();  ?>
						</ul>
					</div>
					<br style="clear:both;"/>
				</div>
				<div id="contact-map" style="width: 620px; height: 380px;position:absolute;right:0;top:20px;"></div>
			</div>
			<?php
			global $post;
			$office = new WP_Query();
			$office->query('posts_per_page=-1&post_type=office&orderby=menu_order&order=ASC');
			if ( $office->have_posts() ) : while ( $office->have_posts() ) : $office->the_post(); ?>
			<!-- Block of City -->
            <a name="<?php echo strtolower($post->post_name); ?>"></a>
			<div class="periwinkleBg" id="<?php echo strtolower($post->post_name); ?>-office" style="margin:30px auto 0 auto;width:1022px;position:relative;font-family: Open Sans;">
				<!--<div style="background-color:#ACDFE2;">-->
				<div>
					<div style="float:left;width:255px; padding:30px;">
						<h4 style="color: #003260; font-size: 24px; margin: 10px 15px 0px; line-height: 20px;"><?php the_title(); ?></h4>
						<h5 style="color: rgb(103, 103, 103); text-transform: uppercase; font-weight: bold; line-height: 20px; font-size: 16px; margin: 5px 0px 0px 15px;"><?php the_field('subtitle'); ?></h5>
						<p style="font-size: 16px; color:#676767; margin: 18px 0px 0px 15px;"><?php the_field('address'); ?><br/><?php the_field('city'); ?>, <?php the_field('state'); ?> <?php the_field('zip'); ?></p>
						<ul style="list-style:none;margin:10px 15px;padding:0;">
                        
                        
							<li style="margin: 5px 0;"><i class="fa fa-phone fa-fw" style="margin-right: 10px;vertical-align: middle;color: #003260;"></i><a style="font-size: 16px; line-height:27px; color:#2b92b5; text-decoration:none;" href="tel:+1<?php 

$phoneNo = preg_replace("/[^0-9]/", "", get_field('phone'));
echo $phoneNo ?>"><?php the_field('phone'); ?></a></li>

<?php if(get_field('fax')){ 
							echo '<li style="margin: 5px 0;"><i class="fa fa-fax fa-fw" style="margin-right: 10px;vertical-align: middle;color: #003260;"></i><a style="font-size: 16px; line-height:27px; color:#676767;text-decoration:none;" href="fax:+1';
							
							

$faxNo = preg_replace("/[^0-9]/", "", get_field('fax'));
echo $faxNo . '">';


echo get_field('fax') . '</a></li>';


} 

?>
							<li style="margin: 5px 0;"><i class="fa fa-envelope fa-fw" style="margin-right: 10px;vertical-align: middle;color: #003260;"></i><a style="font-size: 16px; line-height:27px; color:#2b92b5;text-decoration:none;" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></li>
						</ul>
						<!--<p style="margin:0 0 10px 15px;"><a style="font-size:14px;color:#01498B;text-transform:uppercase;text-decoration:none;" href="/projects">VIEW ALL <span style="font-weight:bold;">PROJECTS</span></a></p>-->
						<!-- <?php /*?><p style="margin:0 0 10px 15px;"><a style="font-size:14px;color:#01498B;text-transform:uppercase;text-decoration:none;" href="">VIEW ALL <span style="font-weight:bold;">NEWS</span></a></p><?php */?>-->
					</div>
					<div style="float:left;margin:0 0 0 0px;width:675px;">
						<!--<h3 style="color:#676767;margin:10px 0;font-size:18px;">RELATED PROJECTS</h3>-->


 











						
						
						 <?php  
			$related_projects = get_field('related_projects',$post->ID);
        if( $related_projects ): ?>

        <div style="float:left;margin:0 0 0px 0;width:675px;padding-top:30px;">
		<div class="threeRelatedProjects" style="margin-left:30px;margin-bottom: 20px;font-size: 16px;font-weight: bold; color:rgb(103, 103, 103);margin-top:10px;">REPRESENTATIVE PROJECTS</div>

			<?php foreach( $related_projects as $related_project): ?>
            <?php setup_postdata($related_project); ?>
            <?php 
if( get_field('featured_image',$related_project->ID) ){
	while( has_sub_field('featured_image',$related_project->ID) ){ 
		$featured_image = get_sub_field('featured_image'); ?>
        
        <?php $readMore = get_field('read_more', $related_project->ID); ?>

<?php

if(empty($featured_image)){
	//[project has no featured image - put a coloured background in, and change font colour
	
	if($readMore == 1){
			echo '<a href="' . get_permalink($related_project->ID) . '">';
		}
	
	
	echo '<div id="' . $post->ID . '" class="projectHoverImg profile-box noImagePresent" style="width:195px;height:195px;position:relative;'; 
	if($readMore == 1){echo "cursor:pointer;";} 
	echo 'float:left;overflow:hidden; margin-left:30px;margin-bottom:30px;background-color:rgba(191, 204, 215, 0.4);">

<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 195px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
						<div style="position:absolute;height:80px;top:46px;width:195px;">
							<h5 class="peopleText" style="font-weight: 600; color: rgb(0, 143, 180); margin: 0px 20px 0px 20px; font-size: 14px; text-transform: capitalize; display: block;">' . get_field('client',$related_project->ID) . '</h5>
							<h6 class="peopleText" style="color: rgb(0, 143, 180); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: block; font-weight: 200;text-overflow: ellipsis;">' . get_the_title($related_project->ID) . '</h6>
							
						</div>';
						
						?>
                        
                        <?php
                        
						
						if($readMore == 1){

					echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(0, 143, 180); font-size: 12px; display: block; font-family: museo-sans, sans-serif; font-weight: 300;">Read more...</div>';
					
						}
						
						?>



<?php
echo '</div>';

if($readMore == 1){
			echo '</a>';
		}

	

	
	
}


else{

//the_field('brief_description',$related_project->ID);

if($readMore == 1){
			echo '<a href="' . get_permalink($related_project->ID) . '">';
		}
		


echo '<div id="' . $post->ID . '" class="projectHoverImg profile-box" style="width:195px;height:195px;position:relative;'; 
if($readMore == 1){echo "cursor:pointer;";} 
echo 'float:left;background:url(' . $featured_image . ') 50% 50% no-repeat;overflow:hidden; background-size:cover; margin-left:30px;margin-bottom:30px;">

<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 195px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
						<div style="position:absolute;height:80px;top:46px;width:195px;">
							<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 0px 20px 0px 20px; font-size: 14px; text-transform: capitalize; display: none;">' . get_field('client',$related_project->ID) . '</h5>
							<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200;text-overflow: ellipsis;">' . get_the_title($related_project->ID) . '</h6>
							
						</div>';
						
						?>
                        
                        <?php
                       
						
						if($readMore == 1){

					echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(255, 255, 255); font-size: 12px; display: none; font-family: museo-sans, sans-serif; font-weight: 300;">Read more...</div>';
					
					
						}
						
						?>



<?php
echo '</div>';

if($readMore == 1){
			echo '</a>';
		}


?>

							
						
                        <?php
						
}
	}
} ?>
                        <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <br style="clear:both;"/>
					</div>
        <?php endif; ?>
                        
						<br style="clear:both;"/>
					</div>
					<br style="clear:both;"/>
				</div>
			</div>
			<!-- Block of City -->

            <?php endwhile; endif;  wp_reset_query(); //wp_reset_postdata();  ?>
		</div>
		<?php get_footer(); ?>