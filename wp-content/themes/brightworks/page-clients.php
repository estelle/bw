<?php 
/* 
Template Name: Clients
*/
?>
<?php the_post(); ?>
<?php get_header(); ?>
		<div id="content-area">
			<!--<div style="margin:0 auto;width:1022px;position:relative;padding: 25px 0 45px;">
				<h3 class="open-sans" style="margin:0 0 0 0;padding:0;color:#676767;font-size:36px;line-height:42px;font-weight: normal;"><?php //the_content(); ?></h3> 
			</div>-->
			<div style="margin:0 auto;width:1022px;position:relative;padding:30px 0;">
				<?php $sector = new WP_Query(array(
				'post_type' => 'clientsector',
				'orderby' => 'name', 
				'order' => 'asc', 
				'posts_per_page' => -1)); ?>
				<?php while($sector->have_posts()): ?>
					<?php
						$sector->the_post();
						$sector_clients = get_field('client_names');
						$sector_client_array = explode("\n", $sector_clients);

$sector_image = get_field('featured_image');

$heading_style = get_field('heading_style');

$text_style = get_field('text_style');

$layoutStyle = get_field('clients_layout_style');



if($layoutStyle == "Three Projects" || $layoutStyle == "Four Projects"){
	?>
    
    
    	<div class="clients" style="position:relative; overflow:hidden;">
        
        	<div style="padding:30px 0 30px 30px; display:inline-block;">

       			<div style="float:left; width:285px;">



<?php
//apply preferred heading style
if(empty($heading_style)){
	echo '<h2 class="heading">' . get_the_title() . '</h2>';
}
else{
	echo '<' . $heading_style . ' class="customH heading">' . get_the_title() . '</' . $heading_style . '>';
}



if(empty($text_style)){
	echo '<p>';
	foreach($sector_client_array as $sector_client):
	echo '<span class="clientList">' . $sector_client . '</span>';
    endforeach;
	echo '</p>';
}
else{
	echo '<' . $text_style . ' class="customH">';
	foreach($sector_client_array as $sector_client):
	echo '<span class="clientList">' . $sector_client . '</span>';
    endforeach;
	echo '</' . $text_style . '>';
}




?>

  <?php
  $titleStr = get_the_title();
  if(strpos($titleStr,'overnment') !== false){
	  $relLink = "government";
	  
  }
  elseif(strpos($titleStr,'Higher Education') !== false){
	  $relLink = "higher-education";
	  
  }
  elseif(strpos($titleStr,'K-12 Education') !== false){
	  $relLink = "k12-education";
	  
  }
  
  
  else{
  
	  $relLink = $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $titleStr);
	  $relLink = str_replace(range(0,9),'',$relLink);
	  $relLink = str_replace(",", "", $relLink );
	  $relLink = str_replace(" ", "-", $relLink );
	  $relLink = strtolower(str_replace("--", "-", $relLink ));
	  
  }
  
  $relLink .= "&type=industry-sector-filter";
  
  
  /*
  if(get_the_title() == ""){$relLink="transportation";}
  
  
			
				if ($aoe_title=="transportation"){$relLink="transportation";}
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
				
				$relLink .= "&type=industry-sector-filter";
			*/
			?>


                        </div>

			    		<div style="width:675px; float:right;">
                        <!-- three projects go here-->
                        
                        <p class="align-right" style="margin:0;float:right;">VIEW ALL <a href="<?php echo site_url(); ?>/projects/?projects=<?php echo $relLink; ?>">PROJECTS  OF THIS TYPE</a></p>
                        
                        
<?php

$arrayRel = get_field('related_projects');

//print_r ($arrayRel);

if(!empty($arrayRel)){
		echo '<div class="threeRelatedProjects" style="margin-left:30px;margin-bottom: 20px;font-size: 16px;font-weight: bold;">RELATED PROJECTS</div>';
	}

foreach ($arrayRel as $value) {

	$url = $value->guid;
	
	$projectID = $value-> ID;	
	
	$readMore = get_field('read_more', $projectID);

	$client = get_field('client', $projectID);

	$title = $value-> post_title;


	$imagesArray = get_field('featured_image', $projectID);
	
	
	
	foreach ($imagesArray as $featuredImg) {
		
		if(empty($featuredImg["featured_image"])){
		
			if($readMore == 1){
				echo '<a href="' . $url . '">';
			}
		
		?>
		
		
		<div class="projectHoverImg profile-box noImagePresent" style="width:195px;height:195px;position:relative;<?php if($readMore == 1){echo "cursor:pointer;";} ?>float:left;margin-left:30px;background-color:rgba(191, 204, 215, 0.4);">
        
        <div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 195px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
        



						<div style="position:absolute;bottom:0;height:80px;top:34px;width:195px;">
							<h5 class="peopleText" style="font-weight: 600; color: rgb(0, 143, 180); margin: 12px 20px 0px; font-size: 14px; text-transform: capitalize; display: block;"><?php echo $client; ?></h5>
							<h6 class="peopleText" style="color: rgb(0, 143, 180); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display:block; text-transform: capitalize; font-weight: 200; text-overflow: ellipsis;"><?php echo $title; ?></h6>
							
						</div>
                        
                        <?php
						
						if($readMore == 1){

						echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(0, 143, 180); font-size: 12px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300;">Read more...</div>';
						
						}
						
						?>

</div>




<?php

if($readMore == 1){
	echo "</a>";
	
}

	
	
	}
	
	else{
		
		if($readMore == 1){
				echo '<a href="' . $url . '">';
			}

		
		
		


		
		echo '<div class="projectHoverImg profile-box" style="width:195px;height:195px;position:relative;float:left;background:url(' . $featuredImg["featured_image"] . ') 50% 50% no-repeat;overflow:hidden; background-size:cover; margin-left:30px;'; if($readMore == 1){echo "cursor:pointer;";}; echo '">';
	
	?>

					<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 195px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
						<div style="position:absolute;bottom:0;height:80px;top:34px;width:195px;">
							<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px; font-size: 14px; text-transform: capitalize; display: none;"><?php echo $client; ?></h5>
							<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; text-transform: capitalize; font-weight: 200; text-overflow: ellipsis;"><?php echo $title; ?></h6>
							
						</div>
                        
                        <?php
						
						if($readMore == 1){

						echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(255, 255, 255); font-size: 12px; text-transform: capitalize; display: none; font-family: museo-sans, sans-serif; font-weight: 300;">Read more...</div>';
						
						}
						
						?>


				</div>
                
                
<?php

		if($readMore == 1){
			echo "</a>";
			
		}


	}
	}

	//echo $url . ", " . $projectID . ", " . $client . ", " . $title;

	
}


?>
                        

                        
                        </div><!-- end three project layout-->
                        
                 </div>
                        
    		</div>



<?php	
	
}

else{
	?>
	
		<div class="clients" style="position:relative; overflow:hidden;">

       		<div class="project-left">



<?php
//apply preferred heading style
if(empty($heading_style)){
	echo '<h2 class="heading">' . get_the_title() . '</h2>';
}
else{
	echo '<' . $heading_style . ' class="customH heading">' . get_the_title() . '</' . $heading_style . '>';
}



if(empty($text_style)){
	echo '<p style="margin-bottom:0px;" class="csText">';
	foreach($sector_client_array as $sector_client):
	echo '<span class="clientList">' . $sector_client . '</span>';
    endforeach;
	echo '</p>';
}
else{
	echo '<' . $text_style . ' class="customH csText" style="margin-bottom:0px;">';
	foreach($sector_client_array as $sector_client):
	echo '<span class="clientList">' . $sector_client . '</span>';
    endforeach;
	echo '</' . $text_style . '>';
}


?>


             	</div>
                
                <div class="project-right" style="float:right;">

			    <div class="clientImg" style="width:452px; height:100%; float:right; <?php if(empty($sector_image)){}else{echo "background-image: url('" . $sector_image . "'); background-repeat: no-repeat;background-position: center center;";} ?>"></div>

			</div>
            
      	</div>


<?php	
} //end "one image" layout.





					?>
                    
                    
                    
                    
				<?php endwhile; ?>
				<br style="clear:both;"/>
			</div>
		</div>
		<?php get_footer(); ?>
<?php wp_reset_postdata(); ?>


<script>

jQuery(document).ready(function($) {

	$(".clients").each(function() {
		var clientsHeight = $(this).outerHeight();
		$(this).find(".clientImg").css({"height":clientsHeight});
	});

});

</script>