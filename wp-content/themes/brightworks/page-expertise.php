<?php 
/* 
Template Name: Expertise
*/
?>
<?php get_header(); ?>
		<div id="content-area">
			
			<div style="margin:0 auto;width:1022px;position:relative;padding:0 0 15px 0;">
            	
             
            <div id="expertise">
            <?php while ( have_posts() ) : the_post(); ?>
			<div class="heroText"><?php the_content(); ?></div>
				<?php 
                if( get_field('aoe') ){
					
                    while( has_sub_field('aoe') ){ 
					
					
						$layoutStyle = get_sub_field('service_layout_style');
			
			
						if($layoutStyle == "Three Projects" || $layoutStyle == "Four Projects"){
									//three projects to be shown


$aoe_title = get_sub_field('aoe_title');

$aoe_image = get_sub_field('aoe_image');

$aoe_description = get_sub_field('aoe_description'); 

$aoe_description_array = explode("\n", $aoe_description);



?>
	<div class="periwinkleBg aoe" style="margin:0 auto 35px auto;padding:30px;position:relative; display:inline-block;">

		<div style="display:inline-block;">
			<div style="float:left;width:285px;">

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
					echo '<h5 style="color: rgb(103, 103, 103); text-transform: uppercase; font-weight: bold; line-height: 16px; font-size: 16px;">';
					foreach($aoe_description_array as $aoe_description_item):
					echo '<span class="aoeList">' . $aoe_description_item . '</span>';
					endforeach;
					echo '</h5>';
				}
				else{
					echo '<' . $text_style . ' class="customH">';
					foreach($aoe_description_array as $aoe_description_item):
					echo '<span class="aoeList">' . $aoe_description_item . '</span>';
					endforeach;
					echo '</' . $text_style . '>';
				}
				

			?>  
            
            
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
				
				$relLink .= "&type=service-filter";
			
			?>
            
            
            
            
            
            
            
            
                           
			</div>

			<div style="float:left;margin:0 0 0 0px;width:675px;">
    			<!-- three projects here-->
                <p class="align-right" style="float:right;">VIEW ALL <a href="<?php echo site_url(); ?>/projects/?projects=<?php echo $relLink; ?>">PROJECTS  OF THIS TYPE</a></p>
                <div class="threeRelatedProjects" style="margin-left:30px;margin-bottom: 20px;font-size: 16px;font-weight: bold;line-height: 30px;">RELATED PROJECTS</div>
                
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
		
		
		<div class="projectHoverImg profile-box noImagePresent" style="width:195px;height:195px;position:relative;float:left;margin-left:30px;background-color:rgba(191, 204, 215, 0.4);<?php if($readMore == 1){echo "cursor:pointer;";} ?>">
        
        <div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 195px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
        



						<div style="position:absolute;bottom:0;height:80px;top:46px;width:195px;">
							<h5 class="peopleText" style="font-weight: 600; color: rgb(0, 143, 180); margin: 12px 20px 0px; font-size: 14px; display: block;"><?php echo $client; ?></h5>
							<h6 class="peopleText" style="color: rgb(0, 143, 180); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display:block; font-weight: 200; text-overflow: ellipsis;"><?php echo $title; ?></h6>
							
						</div>
                        
                        <?php
						
						
						
						if($readMore == 1){

						echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(0, 143, 180); font-size: 12px; display: block; font-family: museo-sans, sans-serif; font-weight: 300;">Read more...</div>';
						
						}
						
						?>

</div>




<?php

	if($readMore == 1){
		echo '</a>';
	}
		
		
		
}
	
	else{
	
		if($readMore == 1){
		
			echo '<a href="' . $url . '">';
			
		}

	foreach ($imagesArray as $featuredImg) {
		//echo "<br/>image url: " . $featuredImg["featured_image"] . "<br/><br/>";
		
		//print_r($imagesArray[0]["featured_image"]);
		
		echo '<div class="projectHoverImg profile-box" style="width:195px;height:195px;position:relative;'; 
		
		if($readMore == 1){
			echo "cursor:pointer;";
		}
		
		echo 'float:left;background:url(' . $featuredImg["featured_image"] . ') 50% 50% no-repeat;overflow:hidden; background-size:cover; margin-left:30px;">';
	}

	/*$imageUrl1 = $imagesArray[0]["featured_image"];
	$imageUrl2 = $imagesArray[1]["featured_image"];
	$imageUrl3 = $imagesArray[2]["featured_image"];*/
	
	?>
                
                
                
                
                

					<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 195px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
						<div style="position:absolute;bottom:0;height:80px;top:46px;width:195px;">
							<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px; font-size: 14px; display: none;"><?php echo $client; ?></h5>
							<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200; text-overflow: ellipsis;"><?php echo $title; ?></h6>
							
						</div>
                        
                        <?php
						
						$readMore = get_field('read_more', $projectID);
						
						if($readMore == 1){

					echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(255, 255, 255); font-size: 12px; display: none; font-family: museo-sans, sans-serif; font-weight: 300;">Read more...</div>';
					
						}
						
						?>


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


	</div>

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
		
		?>
        
        
                                        
                                        
                                        
                                        
                                            <?php echo get_the_title( $related_project->ID );
											
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
                                       
                                        


                                        <?php /*?><p class="align-left">VIEW ALL <a href="<?php echo site_url(); ?>/perspectives">NEWS</a></p><?php */?>
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
		</div>
		<?php get_footer(); ?>


<script>
jQuery(document).ready(function($) {

	$(".aoe").each(function() {
		var clientsHeight = $(this).outerHeight();
		$(this).find(".clientImg").css({"height":clientsHeight});
	});

});

</script>