<?php 
/* 
Template Name: Expertise
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
			<div style="margin:0 auto;width:100%;position:relative;padding:0 0 15px 0;">
            <div id="expertise">
            <?php while ( have_posts() ) : the_post(); ?>
			<div class="heroText"><?php the_content(); ?></div>
				<?php 
                if( get_field('aoe') ){
			
                    while( has_sub_field('aoe') ){ 
						$layoutStyle = get_sub_field('service_layout_style');
						if($layoutStyle == "Four Projects" || $layoutStyle == "Three Projects"){
									//Four projects to be shown
						$aoe_title = get_sub_field('aoe_title');
						$aoe_image = get_sub_field('aoe_image');
						$aoe_description = get_sub_field('aoe_description'); 
						$aoe_description_array = explode("\n", $aoe_description);
						$aoe_description_array_count = count($aoe_description_array);
						$aoe_description_array_1 = array_slice($aoe_description_array, 0, round($aoe_description_array_count / 2));
						$aoe_description_array_2 = array_slice($aoe_description_array, round($aoe_description_array_count / 2));
?>
	<div class="services-block-container">
		<div style="" class="services-block">
			<div style="float:left; width:100%">
				<p><a href="/" class="back-to-top-btn">Back to Top</a></p>
			<?php
				$heading_style = get_field('heading_style_services');
				$text_style = get_field('text_style_services');
				
				echo '<div class="block-first-col">';
				if(empty($heading_style)){
					echo '<h3 class="heading">' . $aoe_title . '</h3>';
				}
				else{
					//echo '<' . $heading_style . ' class="customH heading">' . $aoe_title . '</' . $heading_style . '>';
					echo '<h3 class="customH heading">' . $aoe_title . '</h3>';
				}
				echo '</div>';
				echo '<div class="services-description-container">';
					echo '<div class="services-description-column">';
					if(empty($text_style)){
						echo '<h5 style="color: rgb(103, 103, 103); text-transform: uppercase; font-weight: bold; line-height: 16px; font-size: 16px;">';
						foreach($aoe_description_array_1 as $aoe_description_item):
						echo '<span class="aoeList">' . $aoe_description_item . '</span>';
						endforeach;
						echo '</h5>';
					}
					else{
						echo '<' . $text_style . ' class="customH">';
						//echo '<div>' . $aoe_array_count . '</div>';
						foreach($aoe_description_array_1 as $aoe_description_item):
						echo '<span class="aoeList">' . $aoe_description_item . '</span>';
						endforeach;
						echo '</' . $text_style . '>';
					}
					echo '</div>';
					echo '<div class="services-description-column">';
					if(empty($text_style)){
						echo '<h5 style="color: rgb(103, 103, 103); text-transform: uppercase; font-weight: bold; line-height: 16px; font-size: 16px;">';
						foreach($aoe_description_array_2 as $aoe_description_item):
						echo '<span class="aoeList">' . $aoe_description_item . '</span>';
						endforeach;
						echo '</h5>';
					}
					else{
						echo '<' . $text_style . ' class="customH">';
						//echo '<div>' . $aoe_array_count . '</div>';
						foreach($aoe_description_array_2 as $aoe_description_item):
						echo '<span class="aoeList">' . $aoe_description_item . '</span>';
						endforeach;
						echo '</' . $text_style . '>';
					}
					echo '</div>';
				echo '</div>';

				if ($aoe_title=="LEED Services"){$relLink="leed-services";}
				elseif ($aoe_title=="Energy, Waste, &amp; Water"){$relLink="energy-waste-water";}
				elseif ($aoe_title=="Planning &amp; Infrastructure"){$relLink="planning-infrastructure";}
				elseif ($aoe_title=="Advanced Green Buildings"){$relLink="advanced-green-buildings";}
				elseif ($aoe_title=="General Green Building Consulting"){$relLink="other-green-building-consulting";}
				elseif ($aoe_title=="Reporting &amp; Regulatory Compliance"){$relLink="reporting-regulatory-compliance";}
				elseif ($aoe_title=="Corporate Sustainability Programs"){$relLink="corporate-sustainability-programs";}
				elseif ($aoe_title=="Workshops &amp; Professional Education"){$relLink="workshops-professional-education";}
				elseif ($aoe_title=="Green Building Consulting"){$relLink="other-green-building-consulting";}
				else{
					$relLink = strtolower(str_replace(" ", "-", $aoe_title));
					$relLink = str_replace(",", "", $relLink);
					$relLink = str_replace("&amp;", "", $relLink);
				}
				$relLink .= "&type=service-filter";
			?>
			</div>
		</div>
					<div class="services-image-block">
		                <?php
						$arrayRel = get_sub_field('related_projects');
						foreach ($arrayRel as $value) {
							$url = $value->guid;
							$projectID = $value-> ID;
							$readMore = get_field('read_more', $projectID);
							$client = get_field('client', $projectID);
							$title = $value-> post_title;
							$imagesArray = get_field('featured_image', $projectID);
							if(empty($imagesArray[0]["featured_image"])){

								if($readMore == 1){
									echo '<a href="' . $url . '">';
								}
								?>
								<div class="projectHoverImg profile-box noImagePresent" style="background-color:rgba(191, 204, 215, 0.4);<?php if($readMore == 1){echo "cursor:pointer;";} ?>">
						        <div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 100%; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
								<div style="position:absolute;bottom:0;height:80px;top:46px;width:100%;">
									<h5 class="peopleText" style="font-weight: 600; color: #2b92b5; margin: 12px 20px 0px; font-size: 14px; display: block;"><?php echo $client; ?></h5>
									<h6 class="peopleText" style="color: #2b92b5; margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display:block; font-weight: 200; text-overflow: ellipsis;"><?php echo $title; ?></h6>
								</div>
		                        <?php
								if($readMore == 1){
								echo '<div class="peopleText read-more" style="position: absolute; left: 20px; bottom: 13px; color: #2b92b5; font-size: 12px; display: block; font-family: museo-sans, sans-serif; font-weight: 300;">Read more</div>';
								}
								?>
		</div>
		<?php

			if($readMore == 1){
				echo '</a>';
			}
		}else{
				if($readMore == 1){
					echo '<a href="' . $url . '">';
				}
			foreach ($imagesArray as $featuredImg) {
				echo '<div class="projectHoverImg profile-box" style="position:relative;'; 
				if($readMore == 1){
					echo "cursor:pointer;";
				}
				echo 'background:url(' . $featuredImg["featured_image"] . ') 50% 50% no-repeat;overflow:hidden; background-size:cover;">';
			}
			?>

							<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 100%; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
								<div style="position:absolute;bottom:0;height:80px;top:46px;width:100%;">
									<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px; font-size: 14px; display: none;"><?php echo $client; ?></h5>
									<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200; text-overflow: ellipsis;"><?php echo $title; ?></h6>
					
								</div>
                
		                        <?php
				
								$readMore = get_field('read_more', $projectID);
								if($readMore == 1){

							echo '<div class="peopleText read-more" style="position: absolute; left: 20px; bottom: 13px; color: rgb(255, 255, 255); font-size: 12px; display: none; font-family: museo-sans, sans-serif; font-weight: 300;">Read more</div>';
			
								} ?>
						</div>
		<?php
			if($readMore == 1){
				echo '</a>';
			}
			//echo $url . ", " . $projectID . ", " . $client . ", " . $title;
			}
		}
		?>
		    </div>
			<p class="view-all-link align-right">VIEW ALL <a href="<?php echo site_url(); ?>/projects/?projects=<?php echo $relLink; ?>">PROJECTS  OF THIS TYPE</a></p>
</div>
<?php
				}
		//end of $layoutstyle "three images"	
		else{
		//only one image to be shown - default.
                $aoe_title = get_sub_field('aoe_title');
				$aoe_image = get_sub_field('aoe_image');
                $aoe_description = get_sub_field('aoe_description'); ?>
                        <div class="aoe" style="position:relative;">
                            <div class="project-left" style="padding: 0 0 60px 0;">
<?php

$heading_style = get_field('heading_style_services');
$text_style = get_field('text_style_services');

if(empty($heading_style)){
	echo '<h2 class="heading">' . $aoe_title . '</h2>';
}
else{
	echo '<' . $heading_style . ' class="customH heading">' . $aoe_title . '</' . $heading_style . '>';
}

if(empty($text_style)){
	echo '<p class="csText">';
	foreach($aoe_description_array as $aoe_description_item):
	echo '<span class="aoeList">' . $aoe_description_item . '</span>';
	endforeach;
	echo '</p>';
}
else{
	echo '<' . $text_style . ' class="customH csText">';
	foreach($aoe_description_array as $aoe_description_item):
	echo '<span class="aoeList">' . $aoe_description_item . '</span>';
	endforeach;
	echo '</' . $text_style . '>';
}
?>                 
				</div>
			    <div class="project-right"><div class="clientImg" style="width:452px; height:100%; float:right; <?php if(empty($aoe_image)){}else{echo "background-image: url('" . $aoe_image . "'); background-repeat: no-repeat;background-position: center center; background-size: cover;";} ?>"></div></div>

<?php

if ($aoe_title=="LEED Services"){$relLink="leed-services";}
elseif ($aoe_title=="Energy, Waste, &amp; Water"){$relLink="energy-waste-water";}
elseif ($aoe_title=="Planning &amp; Infrastructure"){$relLink="planning-infrastructure";}
elseif ($aoe_title=="Advanced Green Buildings"){$relLink="advanced-green-buildings";}
elseif ($aoe_title=="General Green Building Consulting"){$relLink="other-green-building-consulting";}
elseif ($aoe_title=="Reporting &amp; Regulatory Compliance"){$relLink="reporting-regulatory-compliance";}
elseif ($aoe_title=="Corporate Sustainability Programs"){$relLink="corporate-sustainability-programs";}
elseif ($aoe_title=="Workshops &amp; Professional Education"){$relLink="workshops-professional-education";}
elseif ($aoe_title=="Green Building Consulting"){$relLink="other-green-building-consulting";}
else{
	$relLink = strtolower(str_replace(" ", "-", $aoe_title));
	$relLink = str_replace(",", "", $relLink);
	$relLink = str_replace("&amp;", "", $relLink);
}
?>
<div class="project-left" style="padding:0px; position:absolute; bottom:30px;"><p class="align-left"><br />VIEW ALL <a href="<?php echo site_url(); ?>/projects/?projects=<?php echo $relLink; ?>">PROJECTS OF THIS TYPE</a></p></div>

                            <?php 

							$related_projects = get_sub_field('related_projects'); ?>
                            <?php if( $related_projects ): ?>
                                <ul>
                                <?php foreach( $related_projects as $related_project ): ?>
                                    <li>
                                    <?php 
if( get_field('featured_image',$related_project->ID) ){
	while( has_sub_field('featured_image',$related_project->ID) ){ 
		$featured_image = get_sub_field('featured_image',$related_project->ID);
		//$brief_description = get_sub_field('brief_description',$related_project->ID);
		if ($featured_image) {  ?>
        <div class="image-wrap">

        <?php

		if($readMore == 1){

       		echo "<a href='" . get_permalink( $related_project->ID ) . "'>";

		}

		?>            
                            
                                    <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" /></div>
                                    <?php
							
							
									if($readMore == 1){
										echo " </a>";
									}
							
							
									}
									} 
									} ?>
                                    <div class="text-wrap">
                            
                                    <?php
                                    if($readMore == 1){

										echo "<a href='" . get_permalink( $related_project->ID ) . "'>";
							
									}
									echo get_the_title( $related_project->ID );
									
											if($readMore == 1){
												echo " </a>";
											}
  ?>
                                        <?php //if ($brief_description) { ?><p><?php the_field('brief_description',$related_project->ID); ?></p><?php //} ?>
                                        </div><!-- .text-wrap -->
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ;?>
                                   <div class="clear"></div>        
                        </div><!-- .aoe -->
                
                        <div class="clear"></div>  
                    <?php
					}
					}//end of "one image" layout

                } ?>

                 <?php endwhile; ?>
            </div><!-- #expertise -->
       
				<br style="clear:both;"/>
			</div>
		</div><!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>
<script>
jQuery(document).ready(function($) {

	$(".aoe").each(function() {
		var clientsHeight = $(this).outerHeight();
		$(this).find(".clientImg").css({"height":clientsHeight});
	});

});

</script>