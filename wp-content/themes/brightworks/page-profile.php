<?php 
/* 
Template Name: Profile
*/
?>
<?php get_header(); ?>

<div id="content-area">
  <?php 

					
					$name = get_field('name');
					$title = get_field('title');
					$photo = get_field('photo');
					
					$phone_number = get_field('phone_number');
					$linkedin = get_field('linkedin');
					$email_address = get_field('email_address');
					
					$education = get_field('education');
					$expertise = get_field('expertise');
					$professional_memberships = get_field('professional_memberships');
					$selected_experience = get_field('selected_experience');
					$board_service = get_field('board_service');
					$publications = get_field('publications');
					$perspectives_opinion = get_field('perspectives_opinion');
					$short_description = get_field('short_description');
					
					$current_office = get_field('office_detail');
				
				
				
			?>
  <div style="margin:0 auto;width:1022px;position:relative;padding:15px 0;">
    <div style="width:300px;float:left;"> <img style="width:310px;" src="<?php echo $photo; ?>"/>
      <div class="periwinkleBg" style="width:270px;margin:5px 0;padding:20px;">
        <h3 style="color:#003260; margin:0;">Contact <?php echo ucwords(strtolower($name)); ?></h3>
        <ul style="list-style:none;margin:10px 15px 10px 0;padding:0;">
        <?php if ($phone_number) {
?>
          <li style="margin: 5px 0;"><i class="fa fa-phone fa-fw" style="margin-right: 10px;vertical-align: middle;color: #003260;"></i><a style="font-size: 14px; color:#2b92b5;text-decoration:none;font-family:Open Sans;" href="<?php $noDashPhoneNumber = preg_replace("/[^0-9,.]/", "", $phone_number); echo 'tel:+1' . $noDashPhoneNumber; ?>"><?php echo $phone_number; ?></a></li>
          <?php } ?>
          <?php if ($email_address) { ?>
          <li style="margin: 5px 0;"><i class="fa fa-envelope fa-fw" style="margin-right: 10px;vertical-align: middle;color: #003260;"></i><a style="font-size: 14px; color:#2b92b5;text-decoration:none;font-family:Open Sans;" href="<?php echo 'mailto:' . $email_address; ?>"><?php echo $email_address; ?></a></li>
           <?php } ?>
          <?php if ($linkedin) { ?>
          <li style="margin: 5px 0;"><i class="fa fa-linkedin fa-fw" style="margin-right: 10px;vertical-align: middle;color: #003260;"></i><a style="font-size: 14px; color:#2b92b5;text-decoration:none;font-family:Open Sans;" href="<?php echo $linkedin; ?>"><?php echo $linkedin; ?></a></li>
          <?php } ?>
        </ul>
      </div>
      
      
      
      
      
<div class="periwinkleBg" style="width:270px;margin:5px 0;padding:20px;">

<h3 style="margin:0; color:#003260;">Offices</h3>
<ul style="list-style:none;margin:10px 0;padding:0;">
<?php
	foreach($current_office as $officeInfo){ 
	
		$thisOffice = $officeInfo->post_title;
		
		$urlFriendlyOffice = strtolower(str_replace(" ", "-", $thisOffice));
	
		echo '<li><a style="text-decoration:none;" href="' . get_option("siteurl") . '/contact/#' . $urlFriendlyOffice .'-office"><div style="color:#2b92b5;font-family:Open Sans;font-size:14px;line-height:32px;text-decoration:none;">' . $thisOffice . '</div></li>';
	}
	?>

</ul>
</div>
      
      
      
      
      <div class="periwinkleBg" style="width:270px;margin:5px 0;padding:20px;">


<?php
foreach($current_office as $officeInfo){ 

	$thisOffice = $officeInfo->post_title;

?>

    <h3 style="margin:0; color:#003260;">Other <?php echo $thisOffice; ?> Staff</h3>
        
	<ul style="list-style:none;margin:10px 0;padding:0;">
    
    <?php
	
	
	
	$args = array(
	'posts_per_page' => -1,
	'post_type' => 'people',
	);

	$the_query = new WP_Query( $args );

	if( $the_query->have_posts() ): while ( $the_query->have_posts() ) : $the_query->the_post();
    
		$peopleOffices = get_field('office_detail');
		
		foreach($peopleOffices as $personOffice){
			
			if($personOffice->post_title == $thisOffice && strcasecmp(get_the_title(), $name) != 0){ //same office; not the same name
	
				echo '<li><a style="color:#2b92b5;font-family:Open Sans;font-size:14px;line-height:32px;text-decoration:none;" href="' . get_the_permalink() .  '">' . get_the_title() . '</a></li>';
			}
		}
    	
  	endwhile; endif; 

 	wp_reset_query();  // Restore global post data stomped by the_post().
	
	echo '</ul>';
	
}

?>
        
        
        
        
        <p style="color:#676767;">VIEW ALL <a href="/dev/people" style="color:#008FB4;text-decoration:none;">OTHER STAFF &rsaquo;</a></p>
      </div>
      
    </div>
    <div style="width:680px;margin-left:40px;float:left;" class="person-profile">
      <h2 style="font-weight:700;font-family:Open Sans;color:#01498B;margin:3px 0 0 0;"><?php echo ucwords(strtolower($name)); ?></h2>
      <h3 style="font-weight:300;text-transform:uppercase;font-family:'museo-sans';color:#008FB4;margin:3px 0 15px 0;"><?php echo $title; ?></h3>
      <div class="profile" style="color:#676767;font-size:16px;letter-spacing:0.5px;"><?php echo $short_description; ?> </div>
        <?php  
						//$person_param = $_GET['person'];
						/*$selected_projects = get_field('selected_projects',$person_param);

        if( $selected_projects ): ?>
      <div style="float:left;margin:0 0 20px 0;width:675px;">
        <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0 0 10px 0;text-transform:uppercase;">SELECTED PROJECTS</h4>
        <?php foreach( $selected_projects as $selected_project): ?>
        <?php setup_postdata($selected_project); ?>
        <?php 
if( get_field('featured_image',$selected_project->ID) ){
	while( has_sub_field('featured_image',$selected_project->ID) ){ 
		$featured_image = get_sub_field('featured_image'); ?>
        <div style="position:relative;background-image:url(<?php echo $featured_image; ?>);width:192px;height:192px;float:left;background-size:200px 200px;background-repeat:no-repeat;margin:0 20px 0 0;">
          <div style="position:absolute;bottom:0;height:85px;width:192px;background-color:#01498b;opacity:0.7;"></div>
          <div style="position:absolute;bottom:0;height:85px;width:192px;">
            <div style="color: rgb(0, 118, 128); text-transform: uppercase; font-weight: bold; font-size: 12px; line-height: 12px; margin: 11px 0px 0px 15px;font-family:Open Sans;">
              <?php the_field('brief_description',$selected_project->ID); ?>
            </div>
            <div class="crete-round" style="color: black; font-weight: bold; font-size: 12px; line-height: 12px; margin: 7px 0px 0px 15px;font-family:Open Sans;"><?php echo get_the_title($selected_project->ID); ?></div>
            <div class="crete-round" style="color: black; font-size: 11px; line-height: 11px; margin: 7px 0px 0px 15px;font-family:Open Sans;"><a style="color:black;text-decoration:none;" href="<?php echo get_permalink($selected_project->ID); ?>">READ MORE</a></div>
          </div>
        </div>
        <?php
	}
} ?>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        <br style="clear:both;"/>
      </div>
      <?php endif;*/ 
	  
	  
	  ?>
      <br/>
      <?php if ($expertise) { ?>
      <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0;text-transform:uppercase;">Education</h4>
      <div class="profile-cat"><?php echo $expertise; ?></div>
      <br/>
      <?php } ?>
      
      <?php if ($education) { ?>
      <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0;text-transform:uppercase;">Education</h4>
      <div class="profile-cat"><?php echo $education; ?></div>
      <br/>
      <?php } ?>
      <?php if ($professional_memberships) { ?>
      <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0;text-transform:uppercase;">Technical Credentials &amp; Professional Memberships</h4>
      <div class="profile-cat"><?php echo $professional_memberships; ?></div>
      <br/>
      <?php } ?>
      <?php if ($selected_experience) { ?>
      <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0;text-transform:uppercase;">Selected Experience</h4>
      <div class="profile-cat"><?php echo $selected_experience; ?></div>
      <br/>
	  <?php } ?>
      <?php if ($board_service) { ?>
      <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0;text-transform:uppercase;">Service</h4>
      <div class="profile-cat"><?php echo $board_service; ?></div>
      <br/>
      <?php } ?>
      <?php if ($publications) { ?>
      <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0;text-transform:uppercase;">Publications</h4>
      <div class="profile-cat"><?php echo $publications; ?></div>
      <br/>
      <?php } ?>
      <?php if ($perspectives_opinion) { ?>
      <h4 style="font-family:Open Sans;color:#01498B;font-size:16px;margin:0;text-transform:uppercase;">PERSPECTIVES/OPINION</h4>
      <div class="profile-cat"><?php echo $perspectives_opinion; ?></div>
      <br/>
      <?php } ?>
      
      
      
      
      
      
      
      
      
      
<?php  
	$selectedProjects = get_field('selected_projects');
	$number_of_selected_projects = get_field('number_of_selected_projects');
	if(empty($number_of_selected_projects)){$number_of_selected_projects = 6;}
   	if( $selectedProjects ): ?>
        <div class="threeRelatedProjectsPeopleTitle" style="font-size: 16px;font-weight: bold; color:#01498B;margin-top:10px;margin-bottom:15px; font-family:Open Sans;">SELECTED PROJECTS</div>
        <div class="threeRelatedProjectsPeople">
        
        

	<?php
	
	$i = 0;
		
		foreach( $selectedProjects as $selectedProject){
			
			if(++$i > $number_of_selected_projects) break;
		
			
			$thisProject = $selectedProject->ID;
			
			$readMore = get_field('read_more',$thisProject);
				
				if(get_field('featured_image',$thisProject)){
					
					$img = get_field('featured_image',$thisProject);
				
					$featured_image = $img[0]['featured_image'];
					
				}
				
				if(!empty($featured_image)){
					
					if($readMore == 1){echo '<a href="' . get_permalink($selectedProject->ID) . '">';}
					
					echo '<div id="' . $post->ID . '" class="projectHoverImg profile-box" style="width:215px;height:215px;position:relative;';
					if($readMore == 1){echo 'cursor:pointer;';}
					
					echo 'float:left;background:url(' . $featured_image . ') 50% 50% no-repeat;overflow:hidden; background-size:cover; margin-right:30px;margin-bottom: 30px;">
	
	<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 215px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
							<div style="position:absolute;top:50px;width:215px;">
								<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px 20px; font-size: 14px; display: none;">' . get_field('client',$selectedProject->ID) . '</h5>
								<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200;text-overflow: ellipsis;">' . get_the_title($selectedProject->ID) . '</h6>
								
							</div>';
							
							if($readMore == 1){
	
	echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(255, 255, 255); font-size: 12px; display: none; font-family: museo-sans, sans-serif; font-weight: 300;">Read more <i class="fa fa-angle-right fa-fw"></i></div>';}
	
	echo '</div>';
	
	if($readMore == 1){echo '</a>';}
		
				}
				
				else{
					//project has no featured image - put a coloured background in, and change font colour
					if($readMore == 1){echo '<a href="' . get_permalink($selectedProject->ID) . '">';}
					
					echo '<div id="' . $post->ID . '" class="projectHoverImg profile-box noImagePresent" style="width:215px;height:215px;position:relative;';
					if($readMore == 1){echo 'cursor:pointer;';}
					
					echo 'float:left;overflow:hidden;background-color:rgba(191, 204, 215, 0.4); margin-right:30px;margin-bottom: 30px;">
	
	<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width: 215px; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
							<div style="position:absolute;top:50px;width:215px;">
								<h5 class="peopleText" style="font-weight: 600; color: rgb(0, 143, 180); margin: 12px 20px 0px 20px; font-size: 14px; display: block;">' . get_field('client',$selectedProject->ID) . '</h5>
								<h6 class="peopleText" style="color: rgb(0, 143, 180); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: block; font-weight: 200;text-overflow: ellipsis;">' . get_the_title($selectedProject->ID) . '</h6>
								
							</div>';
							
							if($readMore == 1){
	
	echo '<div class="peopleText" style="position: absolute; bottom: 13px; color: rgb(0, 143, 180); font-size: 12px; display: block; font-family: museo-sans, sans-serif; font-weight: 300;">Read more <i class="fa fa-angle-right fa-fw"></i></div>';
							}
	
	
	echo '</div>';
	if($readMore == 1){echo '</a>';}
				}

		

	} wp_reset_postdata(); endif; ?>
    
    
        
        
</div> <!-- threeRelatedProjectsPeople -->
        
        
        
      
      
      
      
      
      
    </div>
    <br style="clear:both;"/>
  </div>
</div>
<?php get_footer(); ?>

<script>

	    $(function(){
			$(".profile-box").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("display", "block");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css("display", "none");}); 

$(".noImagePresent").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("color", "#fff");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css({"color": "#008FB4","display": "block"});}); 

			/* hyperlink added instead of this
			$(".profile-box").click(function() {
				window.location.href = '<?php //echo get_site_url(); ?>/profile?person='+$(this).attr("id");
			});
			*/
	    });
</script>