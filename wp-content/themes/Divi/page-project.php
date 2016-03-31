<?php 
/* 
Template Name: Project
*/
$i=0;
$projectCounter = 0;
$projectCollectorDivCounter = 0;
$projectChecker = 0;
$otherCheck = 0;
$otherCheckF = 0;
$qsValid = "yes";
$postCounter = 0;
$postCounterF = 0;
$signatureCheck = 0;
?>
<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );



?>

<div id="main-content">
<?php if ( ! $is_page_builder_used ) : ?>
	<div id="loadingContainer"></div>
				<div id="content-area">
					<div class="project-page-container">
						<!-- START project-filters -->
						<div id="project-filters-container">
							<div class="container">
								<div id="project-filters">
			                		<ul>
					                    <li class="industry-sector-filter"><span class="li-title">Industry Sector</span>
					                    <ul id="industry-sector-filter">
					                        <?php 
					                        $industry_sectors = get_terms('industry-sector', array(
												  'orderby'  => 'name',
												  'order'    => 'ASC'
											  )
											); 
					                        foreach ($industry_sectors as $industry_sector) { ?>
					                            <li><a class="click" name="<?php echo $industry_sector->name; ?>" id="show-<?php echo $industry_sector->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $industry_sector->slug . "&type=industry-sector-filter"; ?>"><?php echo $industry_sector->name; ?></a></li>
					                        <?php } ?>
					                    </ul>
					                    <div class="moreIndicator" style="height:20px;text-align:center;background-color:#fff;display:none;"><i class="fa fa-angle-down"></i></div>
					                    </li>
					                    <li class="service-filter"><span class="li-title">Service</span>
					                    <ul id="service-filter">
					                        <?php 
					                        $services = get_terms('service', array(
												  'orderby'       =>  'term_order',
					                				'hide_empty'    => false
											  )
											); 
					                        foreach ($services as $service) {
												if ((!strpos($service->name,';')) && (!strpos($service->name,'/')) && (!strpos($service->name,'('))) {  ?>
					                            <li><a class="click" name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $service->name; ?></a></li>
					                        <?php 
												} else { ?>
					                 <li><a class="click" name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $service->name; ?></a></li>
					                <?php } } ?>
					                    </ul>
										<div class="moreIndicator" style="height:20px;text-align:center;background-color:#fff;display:none;"><i class="fa fa-angle-down"></i></div>
									</li>
					                    <li class="building-type-filter"><span class="li-title">Building Type</span>
					                    <ul id="building-type-filter">
					                        <?php 
					                        $building_types = get_terms('building-type', array(
												'orderby'  => 'name',
												'order'    => 'ASC'
											)); 
					                        foreach ($building_types as $building_type) { ?>
					                            <li><a class="click" name="<?php echo $building_type->name; ?>" id="show-<?php echo $building_type->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $building_type->slug . "&type=building-type-filter"; ?>"><?php echo $building_type->name; ?></a></li>
					                        <?php } ?>
					                    </ul>
					                    <div class="moreIndicator" style="height:20px;text-align:center;background-color:#fff;display:none;"><i class="fa fa-angle-down"></i></div>
					                    </li>
					        			<li class="location-filter"><span class="li-title">Location</span>
						                    <ul id="location-filter">
						                        <?php 
						                        $locations = get_terms('location', array(
													'orderby'       =>  'term_order',
						                			'hide_empty'    => false
						  					  	)); 
						                        foreach ($locations as $location) { ?>
						                            <li><a class="click" name="<?php echo $location->name; ?>" id="show-<?php echo $location->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $location->slug . "&type=location-filter"; ?>"><?php echo $location->name; ?></a></li>
						                        <?php } ?>
						                    </ul>
											<div class="moreIndicator" style="height:20px;text-align:center;background-color:#fff;display:none;"><i class="fa fa-angle-down"></i></div>
										</li>
					                    <li id="see-all">
					                    	<a href="<?php echo site_url(); ?>/projects">See All</a>
					                    </li>
					                </ul>
		                		</div>
		                	</div>
						</div>
						<!-- END project-filters -->
					<!-- </div> -->
					<div class="container">
		                <div class="clear"></div>
		                <div id="project-listing" class="<?php if($_GET['view']) { echo ' all'; } ?>">
		      <div id="no-results">
		      <p>Sorry, there were no matches.  Please <a href="<?php echo site_url(); ?>/projects">try again</a>.</p></div>
		<h1 style="color:#003260;" id="featuredProjectsTitle" class="projectsTitles"><?php echo get_field('signature_projects_title')?></h1>
						<?php
						$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
						$qString = $_GET['projects'];
						$qStringType = $_GET['type'];
						if($qString =="energy-waste-water"){$selectedFilter = "energy-waste-water"; $qsCheck="yes";}
						elseif($qString =="leed-services"){$selectedFilter = "leed-services";$qsCheck="yes";}
						elseif($qString =="planning-infrastructure"){$selectedFilter = "planning-infrastructure";$qsCheck="yes";}
						elseif($qString =="advanced-green-buildings"){$selectedFilter = "advanced-green-buildings";$qsCheck="yes";}
						elseif($qString =="other-green-building-consulting"){$selectedFilter = "other-green-building-consulting";$qsCheck="yes";}
						elseif($qString =="reporting-regulatory-compliance"){$selectedFilter = "reporting-regulatory-compliance";$qsCheck="yes";}
						elseif($qString =="corporate-sustainability-programs"){$selectedFilter = "corporate-sustainability-programs";$qsCheck="yes";}
						elseif($qString =="workshops-professional-education"){$selectedFilter = "workshops-professional-education";$qsCheck="yes";}	
						elseif(isset($_GET['projects'])){
							$selectedFilter = htmlspecialchars($qString, ENT_QUOTES);
							$selectedFilter = strtolower(str_replace(" ", "-", $qString));
							$selectedFilter = str_replace(",", "", $selectedFilter);
							$selectedFilter = str_replace("&amp;", "", $selectedFilter);
							$qsCheck="yes";
						}
						global $post;
						$args = array(
							'post_type'		=> 'project',
							'posts_per_page'	=> -1,
							'meta_key'		=> 'signature_project',
							'orderby' => array( 'meta_value' => 'DESC', 'name' => 'ASC' )
						);
						$projects = new WP_Query($args);
						?>
		         <div id="unfilteredDiv" class='<?php if($qsCheck=="yes" && $qsValid == "yes"){echo "hideThis";}else{echo "showThis";} ?>'>
		<?php
		//repeat the query, this time get everything and hide it.
		$counter = 0;
		if ( $projects->have_posts() ) : while ( $projects->have_posts() ) : 

		$projects->the_post(); 
		$totalPosts = $projects->post_count;
		$postCounter++;
		?>
		<?php
		$readMore = get_field('read_more');
		$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all")); ?>
		<?php
		if((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheck == 0 && $i!=0) {
			$i = 0;
			$counter = 0;
			echo '<div class="collectedProjects" id="projectCollector' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
		}
		if($counter == 0){
			echo '<ul class="project-list">';
		}
				echo "<li>";
		?>
		                <div style="width:100%; display:none;" id="<?php echo $post->ID . '-detail'; ?>" class="project-section <?php echo 'project' . $projectCounter . ' '; $projectCounter++;?><?php 
						if((get_field('signature_project') == "Signature Projects") || (get_field('signature_project') == "Signature Projects ")) { echo 'signature-project ';} elseif((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheck == 0){echo "firstOther other-project "; $otherCheck = 1;} else{echo 'other-project ';} ?>project<?php 
						if( get_field('featured_image') ){
							while( has_sub_field('featured_image') ){ 
								$featured_image = get_sub_field('featured_image');
								if (!$featured_image) {  ?> without-featured-image<?php 

								} 
							} 
						}
		else{echo " noPic";}
		$classArray = array();
						$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
						foreach ($services as $service) {
							$service_space = str_replace(' ', '-',strtolower($service->name));
							$service_space = str_replace(',', '',$service_space);
							$service_amp_pre = str_replace('-&amp;', '',strtolower($service_space));
		          			$service_amp = str_replace(',', '',strtolower($service_amp_pre));
							echo ' show-'.$service_amp;
							array_push($classArray, ' show-'.$service_amp);
					
						}
						$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
						foreach ($industry_sectors as $industry_sector) {
							$industry_space = str_replace(' ', '-',strtolower($industry_sector->name));
							$industry_space = str_replace(',', '',$industry_space);
							$industry_amp = str_replace('-&amp;', '',strtolower($industry_space));
							echo ' show-'.$industry_amp;
							array_push($classArray, ' show-'.$industry_amp);
						}
						$locations = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
						foreach ($locations as $location) {
							$location_space = str_replace(' ', '-',strtolower($location->name));
							$location_space = str_replace(',', '',$location_space);
							$location_amp = str_replace('--', '',strtolower($location_space));
							echo ' show-'.$location_amp;
							array_push($classArray, ' show-'.$location_amp);
						}
						$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
						foreach ($building_types as $building_type) {
							$building_type_space = str_replace(' ', '-',strtolower($building_type->name));
							$building_type_space = str_replace(',', '',$building_type_space);
							$building_type_amp = str_replace('-&amp;', '',strtolower($building_type_space));
							$building_type_slash = str_replace('/', '',strtolower($building_type_amp));
							echo ' show-'.$building_type_slash;
							array_push($classArray, ' show-'.$building_type_slash);
						} ?>">
		                <div class="project-left" style="width:48%">
		<span style="float:right;" class="clientLoc"><?php if(get_field('city')) { the_field('city');  } ?><?php if(get_field('city')&&get_field('state')) { echo ', '; } ?>
		                        <?php if(get_field('state')) { the_field('state'); }  ?></span>

		<h2><?php the_field('client'); ?></h2>
		                    <h1><?php if($readMore == 1){
		                                    echo '<a class="readMoreIndicator" href="' . get_permalink() . '">' . get_the_title() . '</a>';
								}else{
									echo get_the_title();
								} 
							?></h1>
		                    <?php the_content(); ?>
		                    <ul class="project-services">
		                        <li class="title-li">Services provided</li>
		                        <?php 
								$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
								$serviceArray=array();		
		                        foreach ($services as $service) { 
		                        $cleaned = str_replace('&amp;','&',$service->name);
		            			$pieces = explode("; ", $cleaned);
								foreach($pieces as $element) { $serviceArray[] = $service->name;?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $element; ?></a></li>
		                        <?php 
		} } ?>
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="project-sectors">
		                        <li class="title-li" >Industry sector</li>
		                        <?php 
								$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
		                        foreach ($industry_sectors as $industry_sector) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $industry_sector->name; ?>" id="show-<?php echo $industry_sector->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $industry_sector->slug . "&type=industry-sector-filter"; ?>"><?php echo $industry_sector->name; ?></a></li>
		                        <?php } ?>
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="building-types">
		                        <li class="title-li" >Building types</li>
		                        <?php 
								$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
		                        foreach ($building_types as $building_type) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $building_type->name; ?>" id="show-<?php echo $building_type->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $building_type->slug . "&type=building-type-filter"; ?>"><?php echo $building_type->name; ?></a></li>
		                        <?php 
		} ?>           
		                    </ul>
		                    </div><!-- .project-left -->
		<!-- .project-middle -->
		                   <?php 
		if( get_field('featured_image') ){
			while( has_sub_field('featured_image') ){ 
				
				$featured_image = get_sub_field('featured_image');
				$brief_description = get_sub_field('brief_description');
				if ($featured_image) {  ?>
		                    <?php if($readMore == 1){echo '<a href="' . get_permalink() . '">';}?>
		                    <div class="project-right" style="width:48.8%; height: 100%; float: right; background-image: url(<?php echo $featured_image; ?>); background-position: 50% 50%; background-repeat: no-repeat; background-size:cover;">
		                    </div>
		                    <?php if($readMore == 1){echo '</a>';}?>
		                    <!-- project-right -->
		                    <?php }
			}
		} ?> 
		                <div class="clear"></div>
		                </div>
		<?php
		$clientName = get_field('client');
		$theContent = get_the_content();
		$theContent = wordwrap($theContent, 80);
		$theContent = explode("\n", $theContent);
		$theContent = $theContent[0] . '...';
		if(empty($featured_image)){$backgroundStyle = 'background-color:rgba(191, 204, 215, 0.4);'; $imageCheck = "noImagePresent";}
		else{$backgroundStyle = 'background:url(' . $featured_image . ') 50% 50% no-repeat;'; $imageCheck = "imagePresent";}

		echo '<div id="' . $post->ID . '" class="projectHoverImg profile-box'; foreach($classArray as $value){echo $value;}; echo ' ' . $imageCheck . '" style="width:100%;height:100%;position:relative;margin-right:30px;margin-bottom:30px;cursor:pointer;float:left;overflow:hidden;background-size: cover!important;' . $backgroundStyle . '">

		<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width:100%; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
								<div style="position:absolute;bottom:0;height:80px;top:20px;width:100%;">
									<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px 20px; font-size: 14px;display: none;">' . $clientName . '</h5>
									<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none;font-weight: 200;text-overflow: ellipsis;">' . get_the_title() . '</h6>
							
								</div>';
						
								if($readMore == 1){

								}
		echo '</div>';
		$i++;
		?>
		<?php
		if($i==4){
		echo '<div class="collectedProjects" id="projectCollector' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '" style=""></div>';
		$i=0;
		}
		if($i!=4 && $postCounter == $totalPosts){
		echo '<div class="collectedProjects" id="projectCollector' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '" style=""></div>';
		}			 
							echo '</li>';	
					$counter ++;
					if($counter == 4){
						$counter = 0;
						echo '</ul>';
					}
					?>
		<?php endwhile; endif;  wp_reset_query(); //wp_reset_postdata();  ?>
		</div>
		<!-- End unfiltered Div -->
		<!-- Start filtered Div -->
		<?php 
		$i=0; 
		$projectCounter = 0;
		$projectCollectorDivCounter = 0;
		$projectChecker = 0;
		$postCounter = 0;
		$counter2 = 0;
		?>
		<div id="filteredServicesDiv" class='<?php if($qsCheck=="yes" && $qsValid == "yes"){echo "showThis";}else{echo "hideThis";} ?>'>
			<ul class="project-list">
						<?php
						if ( $projects->have_posts() ) : while ( $projects->have_posts() ) : 
		$projects->the_post();
		$readMore = get_field('read_more');
		?>
		<?php
		$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
			foreach ($services as $service) {
		
				$service_space = str_replace(' ', '-',strtolower($service->name));
				$service_space = str_replace(',', '',$service_space);
				$service_amp_pre = str_replace('-&amp;', '',strtolower($service_space));
      			$service_amp = str_replace(',', '',strtolower($service_amp_pre));
				if($service_amp == $selectedFilter && $qStringType == "service-filter"){ ?>
				<?php $postCounter++; ?>
				<?php if($i == 0){
				} ?>
			<?php
		    if((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0 && $i!=0) {
				echo '</ul>';
		        echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
				echo '<ul class="project-list">';
				$i=0;
		    }?>
		                <div style="width:100%; display:none;" id="<?php echo $post->ID . 'F-detail'; ?>" class="project-section <?php echo 'projectF' . $projectCounter . ' '; $projectCounter++;?><?php 
						if((get_field('signature_project') == "Signature Projects") || (get_field('signature_project') == "Signature Projects ")) { echo 'signature-project '; $signatureCheck = 1;} elseif((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0){echo "firstOtherF  other-projectF "; $otherCheckF = 1;} else{echo 'other-projectF ';} ?>projectF<?php 
						if( get_field('featured_image') ){
							while( has_sub_field('featured_image') ){ 
								$featured_image = get_sub_field('featured_image');
								if (!$featured_image) {  ?> without-featured-image<?php 

								} 
							} 
						}
		else{echo " noPic";}
		$classArray = array();
						$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
						foreach ($services as $service) {
							$service_space = str_replace(' ', '-',strtolower($service->name));
							$service_space = str_replace(',', '',$service_space);
							$service_amp_pre = str_replace('-&amp;', '',strtolower($service_space));
		          			$service_amp = str_replace(',', '',strtolower($service_amp_pre));
							echo ' show-'.$service_amp;
							array_push($classArray, ' show-'.$service_amp);
						}
						$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
							foreach ($industry_sectors as $industry_sector) {
							$industry_space = str_replace(' ', '-',strtolower($industry_sector->name));
							$industry_space = str_replace(',', '',$industry_space);
							$industry_amp = str_replace('-&amp;', '',strtolower($industry_space));
							echo ' show-'.$industry_amp;
							array_push($classArray, ' show-'.$industry_amp);
						}
						$locations = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
						foreach ($locations as $location) {
							$location_space = str_replace(' ', '-',strtolower($location->name));
							$location_space = str_replace(',', '',$location_space);
							$location_amp = str_replace('--', '',strtolower($location_space));
							echo ' show-'.$location_amp;
							array_push($classArray, ' show-'.$location_amp);
						}
						$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
						foreach ($building_types as $building_type) {
							$building_type_space = str_replace(' ', '-',strtolower($building_type->name));
							$building_type_space = str_replace(',', '',$building_type_space);
							$building_type_amp = str_replace('-&amp;', '',strtolower($building_type_space));
							$building_type_slash = str_replace('/', '',strtolower($building_type_amp));
							echo ' show-'.$building_type_slash;
							array_push($classArray, ' show-'.$building_type_slash);
						} ?>">
		                <div class="project-left" style="width:48%">
		<span style="float:right;" class="clientLoc"><?php if(get_field('city')) { the_field('city');  } ?><?php if(get_field('city')&&get_field('state')) { echo ', '; } ?>
		                        <?php if(get_field('state')) { the_field('state'); }  ?></span>

		<h2><?php the_field('client'); ?></h2>

		                    <h1><?php if($readMore == 1){
		                                    echo '<a class="readMoreIndicator" href="' . get_permalink() . '">' . get_the_title() . '</a>';                    
								}else{
									echo get_the_title();
								} 
							?></h1>
		                    <?php the_content(); ?>
		                    <ul class="project-services">
		                        <li class="title-li">Services provided</li>
		                        <?php 
								$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
								$serviceArray=array();		
		                        foreach ($services as $service) { 
									$cleaned = str_replace('&amp;','&',$service->name);
									$pieces = explode("; ", $cleaned);
            
									foreach($pieces as $element) { $serviceArray[] = $service->name;?>
		                            	<li class="bg-fill"><a class="click" name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $element; ?></a></li>
		                        <?php 
									}
								} ?>
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="project-sectors">
		                        <li class="title-li">Industry sector</li>
		                        <?php 
								$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
		                        foreach ($industry_sectors as $industry_sector) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $industry_sector->name; ?>" id="show-<?php echo $industry_sector->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $industry_sector->slug . "&type=industry-sector-filter"; ?>"><?php echo $industry_sector->name; ?></a></li>
		                        <?php } ?>
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="building-types">
		                        <li class="title-li">Building types</li>
		                        <?php 
								$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
		                        foreach ($building_types as $building_type) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $building_type->name; ?>" id="show-<?php echo $building_type->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $building_type->slug . "&type=building-type-filter"; ?>"><?php echo $building_type->name; ?></a></li>
		                        <?php 
		} ?>       
		                    </ul>
		                    </div><!-- .project-left -->
		<!-- .project-middle -->
		                   <?php 
		if( get_field('featured_image') ){
			while( has_sub_field('featured_image') ){ 
				$featured_image = get_sub_field('featured_image');
				$brief_description = get_sub_field('brief_description');
				if ($featured_image) {  
					if($readMore == 1){
						echo '<a href="' . get_permalink() . '">';} ?>
						<div class="project-right" style="width:48.8%; height: 100%; float: right; background-image: url(<?php echo $featured_image; ?>); background-position: 50% 50%; background-repeat: no-repeat; background-size:cover;"></div>
                    
		                <?php if($readMore == 1){
							echo '</a>';
						} 
                    
		                    // project-right 
		          }
			}
		} ?> 
			<div class="clear"></div>
		</div>

 
		<?php

		//Blue hover-over stuff

		$clientName = get_field('client');
		$theContent = get_the_content();
		$theContent = wordwrap($theContent, 80);
		$theContent = explode("\n", $theContent);
		$theContent = $theContent[0] . '...';

		if(empty($featured_image)){$backgroundStyle = 'background-color:rgba(191, 204, 215, 0.4);'; $imageCheck = "noImagePresent";}
		else{$backgroundStyle = 'background:url(' . $featured_image . ') 50% 50% no-repeat;'; $imageCheck = "imagePresent";}

		echo '<li><div id="' . $post->ID . 'F" class="projectHoverImg profile-boxF'; foreach($classArray as $value){echo $value;}; echo ' ' . $imageCheck . '" style="width:100%;height:100%;position:relative;margin-right:30px;margin-bottom:30px;cursor:pointer;float:left;overflow:hidden;background-size: cover!important;' . $backgroundStyle . '">

		<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width:100%; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
								<div style="position:absolute;bottom:0;height:80px;top:20px;width:100%;">
									<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px 20px; font-size: 14px; display: none;">' . $clientName . '</h5>
									<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200;text-overflow: ellipsis;">' . get_the_title() . '</h6>
							
								</div>';
								if($readMore == 1){
				}
		echo '</div></li>';
		$i++;

		if($i==4){
			echo '</ul>';	
			echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
			echo '<ul class="project-list">';
			$i=0;
		}
			}// end if $service_amp == $selectedFilter
		} // end foreach ($services as $service) 
		$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
						foreach ($industry_sectors as $industry_sector) {
							$industry_space = str_replace(' ', '-',strtolower($industry_sector->name));
							$industry_space = str_replace(',', '',$industry_space);
							$industry_amp = str_replace('-&amp;', '',strtolower($industry_space));
		if($industry_amp == $selectedFilter && $qStringType == "industry-sector-filter"){ ?>

		<?php $postCounter++; ?>
                   
			<?php
		    if((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0 && $i!=0) {
		        $i = 0;
				echo '</ul>';
		        echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
    			echo '<ul class="project-list">';
		    }
		    ?>          
		                <div style="width:100%; display:none;" id="<?php echo $post->ID . 'F-detail'; ?>" class="project-section <?php echo 'projectF' . $projectCounter . ' '; $projectCounter++;?><?php 
						if((get_field('signature_project') == "Signature Projects") || (get_field('signature_project') == "Signature Projects ")) { echo 'signature-project '; $signatureCheck = 1;} elseif((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0){echo "firstOtherF  other-projectF "; $otherCheckF = 1;} else{echo 'other-projectF ';} ?>projectF<?php 
						if( get_field('featured_image') ){
							while( has_sub_field('featured_image') ){ 
								$featured_image = get_sub_field('featured_image');
								if (!$featured_image) {  ?> without-featured-image<?php 
								} 
							} 
						}else{
							echo " noPic";
						}
						$classArray = array();
						$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
						foreach ($services as $service) {
							$service_space = str_replace(' ', '-',strtolower($service->name));
							$service_space = str_replace(',', '',$service_space);
							$service_amp_pre = str_replace('-&amp;', '',strtolower($service_space));
		          			$service_amp = str_replace(',', '',strtolower($service_amp_pre));
							echo ' show-'.$service_amp;
							array_push($classArray, ' show-'.$service_amp);
						}
						$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
							foreach ($industry_sectors as $industry_sector) {
							$industry_space = str_replace(' ', '-',strtolower($industry_sector->name));
							$industry_space = str_replace(',', '',$industry_space);
							$industry_amp = str_replace('-&amp;', '',strtolower($industry_space));
							echo ' show-'.$industry_amp;
							array_push($classArray, ' show-'.$industry_amp);
						}
						$locations = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
						foreach ($locations as $location) {
							$location_space = str_replace(' ', '-',strtolower($location->name));
							$location_space = str_replace(',', '',$location_space);
							$location_amp = str_replace('--', '',strtolower($location_space));
							echo ' show-'.$location_amp;
							array_push($classArray, ' show-'.$location_amp);
						}
						$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
						foreach ($building_types as $building_type) {
							$building_type_space = str_replace(' ', '-',strtolower($building_type->name));
							$building_type_space = str_replace(',', '',$building_type_space);
							$building_type_amp = str_replace('-&amp;', '',strtolower($building_type_space));
							$building_type_slash = str_replace('/', '',strtolower($building_type_amp));
							echo ' show-'.$building_type_slash;
							array_push($classArray, ' show-'.$building_type_slash);
						} ?>">
		                <div class="project-left" style="width:48%">
							<span style="float:right;" class="clientLoc"><?php if(get_field('city')) { the_field('city');  } ?><?php if(get_field('city')&&get_field('state')) { echo ', '; } ?>
		                        <?php if(get_field('state')) { the_field('state'); }  ?></span>
								<h2><?php the_field('client'); ?></h2>
		                    <h1>
		                    <?php if($readMore == 1){
		                                    echo '<a class="readMoreIndicator" href="' . get_permalink() . '">' . get_the_title() . '</a>';     
								}else{
									echo get_the_title();
								} 
							?>
		                    </h1>
		                    <?php the_content(); ?>
		                    <ul class="project-services">
		                        <li class="title-li">Services provided</li>
		                        <?php 
								$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
								$serviceArray=array();		
		                        foreach ($services as $service) { 
									$cleaned = str_replace('&amp;','&',$service->name);
									$pieces = explode("; ", $cleaned);
            
									foreach($pieces as $element) { $serviceArray[] = $service->name;?>
		                            	<li class="bg-fill"><a class="click" name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $element; ?></a></li>
		                        <?php 
									}
								} ?>
                        
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="project-sectors">
		                        <li class="title-li">Industry sector</li>
		                        <?php 
								$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
		                        foreach ($industry_sectors as $industry_sector) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $industry_sector->name; ?>" id="show-<?php echo $industry_sector->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $industry_sector->slug . "&type=industry-sector-filter"; ?>"><?php echo $industry_sector->name; ?></a></li>
		                        <?php } ?>
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="building-types">
		                        <li class="title-li">Building types</li>
		                        <?php 
								$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
		                        foreach ($building_types as $building_type) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $building_type->name; ?>" id="show-<?php echo $building_type->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $building_type->slug . "&type=building-type-filter"; ?>"><?php echo $building_type->name; ?></a></li>
		                        <?php 
		} ?>
		                    </ul>
		                    </div><!-- .project-left -->
		                   <?php 
		if( get_field('featured_image') ){
			while( has_sub_field('featured_image') ){ 
				$featured_image = get_sub_field('featured_image');
				$brief_description = get_sub_field('brief_description');
				if ($featured_image) {  ?>
		                    <?php if($readMore == 1){echo '<a href="' . get_permalink() . '">';}?>
                    
		                    <div class="project-right" style="width:48.8%; height: 100%; float: right; background-image: url(<?php echo $featured_image; ?>); background-position: 50% 50%; background-repeat: no-repeat; background-size:cover;">
		                    </div>
		                    <?php if($readMore == 1){echo '</a>';} ?>
		                    <!-- project-right -->
		                    <?php }
			}
		} ?> 
		                <div class="clear"></div>
		                </div>
		<?php
		$clientName = get_field('client');
		$theContent = get_the_content();
		$theContent = wordwrap($theContent, 80);
		$theContent = explode("\n", $theContent);
		$theContent = $theContent[0] . '...';
		if(empty($featured_image)){$backgroundStyle = 'background-color:rgba(191, 204, 215, 0.4);'; $imageCheck = "noImagePresent";}
		else{$backgroundStyle = 'background:url(' . $featured_image . ') 50% 50% no-repeat;'; $imageCheck = "imagePresent";}

		echo '<li><div id="' . $post->ID . 'F" class="projectHoverImg profile-boxF'; foreach($classArray as $value){echo $value;}; echo ' ' . $imageCheck . '" style="width:100%;height:100%;position:relative;margin-right:30px;margin-bottom:30px;cursor:pointer;float:left;overflow:hidden;background-size: cover!important;' . $backgroundStyle . '">

		<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width:100%; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
								<div style="position:absolute;bottom:0;height:80px;top:20px;width:100%;">
									<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px 20px; font-size: 14px; display: none;">' . $clientName . '</h5>
									<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200;text-overflow: ellipsis;">' . get_the_title() . '</h6>
								</div>';
								if($readMore == 1){
								
								}
		echo '</div></li>';
		$i++;
		?>
		<?php
		if($i==4){	
			echo '</ul>';
			echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
			echo '<ul class="project-list">';
			$i=0;
		}
			}// end if $industry_amp
		} // end foreach ($industry ?>
		<?php
		$locations = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
						foreach ($locations as $location) {
							$location_space = str_replace(' ', '-',strtolower($location->name));
							$location_space = str_replace(',', '',$location_space);
							$location_amp = str_replace('--', '',strtolower($location_space));
	
		if($location_amp == $selectedFilter && $qStringType == "location-filter"){ ?>
		<?php $postCounter++; ?>       
			<?php
		    //put remaining projects in collector div, and start a new one. For break because of  "other projects" title.
		    if((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0 && $i!=0) {
				echo '</ul>';
		        echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
				echo '<ul class="project-list">';
    			$i = 0;
		    }
		    ?>          
		                <div style="width:100%; display:none;" id="<?php echo $post->ID . 'F-detail'; ?>" class="project-section <?php echo 'projectF' . $projectCounter . ' '; $projectCounter++;?><?php 
						if((get_field('signature_project') == "Signature Projects") || (get_field('signature_project') == "Signature Projects ")) { echo 'signature-project '; $signatureCheck = 1;} elseif((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0){echo "firstOtherF  other-projectF "; $otherCheckF = 1;} else{echo 'other-projectF ';} ?>projectF<?php 
						if( get_field('featured_image') ){
							while( has_sub_field('featured_image') ){ 
								$featured_image = get_sub_field('featured_image');
								if (!$featured_image) {  ?> without-featured-image<?php 

								} 
							} 
						}
		else{echo " noPic";}
		$classArray = array();
						$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
						foreach ($services as $service) {
							$service_space = str_replace(' ', '-',strtolower($service->name));
							$service_space = str_replace(',', '',$service_space);
							$service_amp_pre = str_replace('-&amp;', '',strtolower($service_space));
		          			$service_amp = str_replace(',', '',strtolower($service_amp_pre));
							echo ' show-'.$service_amp;
							array_push($classArray, ' show-'.$service_amp);
						}
				
						$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
							foreach ($industry_sectors as $industry_sector) {
							$industry_space = str_replace(' ', '-',strtolower($industry_sector->name));
							$industry_space = str_replace(',', '',$industry_space);
							$industry_amp = str_replace('-&amp;', '',strtolower($industry_space));
							echo ' show-'.$industry_amp;
							array_push($classArray, ' show-'.$industry_amp);
						}
				
						$locations = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
						foreach ($locations as $location) {
							$location_space = str_replace(' ', '-',strtolower($location->name));
							$location_space = str_replace(',', '',$location_space);
							$location_amp = str_replace('--', '',strtolower($location_space));
							echo ' show-'.$location_amp;
							array_push($classArray, ' show-'.$location_amp);
						}
						$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
						foreach ($building_types as $building_type) {
							$building_type_space = str_replace(' ', '-',strtolower($building_type->name));
							$building_type_space = str_replace(',', '',$building_type_space);
							$building_type_amp = str_replace('-&amp;', '',strtolower($building_type_space));
							$building_type_slash = str_replace('/', '',strtolower($building_type_amp));
							echo ' show-'.$building_type_slash;
							array_push($classArray, ' show-'.$building_type_slash);
						} ?>">
		                <div class="project-left" style="width:48%">
		<span style="float:right;" class="clientLoc"><?php if(get_field('city')) { the_field('city');  } ?><?php if(get_field('city')&&get_field('state')) { echo ', '; } ?>
		                        <?php if(get_field('state')) { the_field('state'); }  ?></span>
		<h2><?php the_field('client'); ?></h2>
		                    <h1><?php if($readMore == 1){
		                                    echo '<a class="readMoreIndicator" href="' . get_permalink() . '">' . get_the_title() . '</a>';
								}else{
									echo get_the_title();
								} 
							?></h1>
		                    <?php the_content(); ?>
		                    <ul class="project-services">
		                        <li class="title-li">Services provided</li>
		                        <?php 
								$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
								$serviceArray=array();		
		                        foreach ($services as $service) { 
									$cleaned = str_replace('&amp;','&',$service->name);
									$pieces = explode("; ", $cleaned);
									foreach($pieces as $element) { $serviceArray[] = $service->name;?>
		                            	<li class="bg-fill"><a class="click" name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $element; ?></a></li>
		                        <?php 
									}
								} ?>
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="project-sectors">
		                        <li class="title-li">Industry sector</li>
		                        <?php 
								$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
		                        foreach ($industry_sectors as $industry_sector) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $industry_sector->name; ?>" id="show-<?php echo $industry_sector->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $industry_sector->slug . "&type=industry-sector-filter"; ?>"><?php echo $industry_sector->name; ?></a></li>
		                        <?php } ?>
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="building-types">
		                        <li class="title-li">Building types</li>
		                        <?php 
								$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
		                        foreach ($building_types as $building_type) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $building_type->name; ?>" id="show-<?php echo $building_type->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $building_type->slug . "&type=building-type-filter"; ?>"><?php echo $building_type->name; ?></a></li>
		                        <?php 
		} ?>
		                    </ul>
		                    </div><!-- .project-left -->
		<!-- .project-middle -->
		                   <?php 
		if( get_field('featured_image') ){
			while( has_sub_field('featured_image') ){ 
				$featured_image = get_sub_field('featured_image');
				$brief_description = get_sub_field('brief_description');
				if ($featured_image) {  ?>
		                    <?php if($readMore == 1){echo '<a href="' . get_permalink() . '">';}?>
                    
		                    <div class="project-right" style="width:48.8%; height: 100%; float: right; background-image: url(<?php echo $featured_image; ?>); background-position: 50% 50%; background-repeat: no-repeat; background-size:cover;">
		                    </div>
		                    <?php if($readMore == 1){echo '</a>';}?>
		                    <!-- project-right -->
		                    <?php }
			}
		} ?> 
		                <div class="clear"></div>
		                </div>
		<?php
		$clientName = get_field('client');
		$theContent = get_the_content();
		$theContent = wordwrap($theContent, 80);
		$theContent = explode("\n", $theContent);
		$theContent = $theContent[0] . '...';

		if(empty($featured_image)){$backgroundStyle = 'background-color:rgba(191, 204, 215, 0.4);'; $imageCheck = "noImagePresent";}
		else{$backgroundStyle = 'background:url(' . $featured_image . ') 50% 50% no-repeat;'; $imageCheck = "imagePresent";}

		echo '<li><div id="' . $post->ID . 'F" class="projectHoverImg profile-boxF'; foreach($classArray as $value){echo $value;}; echo ' ' . $imageCheck . '" style="width:100%;height:100%;position:relative;margin-right:30px;margin-bottom:30px;cursor:pointer;float:left;overflow:hidden;background-size: cover!important;' . $backgroundStyle . '">

		<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width:100%; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
								<div style="position:absolute;bottom:0;height:80px;top:20px;width:100%;">
									<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px 20px; font-size: 14px; display: none;">' . $clientName . '</h5>
									<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200;text-overflow: ellipsis;">' . get_the_title() . '</h6>
							
								</div>';
						
								if($readMore == 1){
								}
		echo '</div></li>';
		$i++;
		if($i==4){
			echo '</ul>';	
			echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
			echo '<ul class="project-list">';
			$i=0;
		}
			}// end if $locations_amp

		} // end foreach ($locations 
		$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
	
	
		foreach ($building_types as $building_type) {
			$building_type_space = str_replace(' ', '-',strtolower($building_type->name));
			$building_type_space = str_replace(',', '',$building_type_space);
			$building_type_amp = str_replace('-&amp;', '',strtolower($building_type_space));
			$building_type_slash = str_replace('/', '',strtolower($building_type_amp));
		
			if($building_type_slash == $selectedFilter && $qStringType == "building-type-filter"){ 

				$postCounter++; 
    
		    //put remaining projects in collector div, and start a new one. For break because of  "other projects" title.
		    if((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0 && $i!=0) {
		        $i = 0;
				echo '</ul>';
		        echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
				echo '<ul class="project-list">';
		    }
		    ?>          

		                <div style="width:100%; display:none;" id="<?php echo $post->ID . 'F-detail'; ?>" class="project-section <?php echo 'projectF' . $projectCounter . ' '; $projectCounter++;?><?php 
						if((get_field('signature_project') == "Signature Projects") || (get_field('signature_project') == "Signature Projects ")) { echo 'signature-project '; $signatureCheck = 1;} elseif((get_field('signature_project') != "Signature Projects") && (get_field('signature_project') != "Signature Projects ") && $otherCheckF == 0){echo "firstOtherF  other-projectF "; $otherCheckF = 1;} else{echo 'other-projectF ';} ?>projectF<?php 
						if( get_field('featured_image') ){
							while( has_sub_field('featured_image') ){ 
								$featured_image = get_sub_field('featured_image');
								if (!$featured_image) {  ?> without-featured-image<?php 

								} 
							} 
						}
		else{echo " noPic";}
		$classArray = array();
						$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
						foreach ($services as $service) {
					
							$service_space = str_replace(' ', '-',strtolower($service->name));
							$service_space = str_replace(',', '',$service_space);
							$service_amp_pre = str_replace('-&amp;', '',strtolower($service_space));
          
		          			$service_amp = str_replace(',', '',strtolower($service_amp_pre));
					
							echo ' show-'.$service_amp;
							array_push($classArray, ' show-'.$service_amp);
					
						}
				
						$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
							foreach ($industry_sectors as $industry_sector) {
							$industry_space = str_replace(' ', '-',strtolower($industry_sector->name));
							$industry_space = str_replace(',', '',$industry_space);
							$industry_amp = str_replace('-&amp;', '',strtolower($industry_space));
							echo ' show-'.$industry_amp;
							array_push($classArray, ' show-'.$industry_amp);
						}
				
						$locations = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
						foreach ($locations as $location) {
							$location_space = str_replace(' ', '-',strtolower($location->name));
							$location_space = str_replace(',', '',$location_space);
							$location_amp = str_replace('--', '',strtolower($location_space));
							echo ' show-'.$location_amp;
							array_push($classArray, ' show-'.$location_amp);
						}
				
						$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
						foreach ($building_types as $building_type) {
							$building_type_space = str_replace(' ', '-',strtolower($building_type->name));
							$building_type_space = str_replace(',', '',$building_type_space);
							$building_type_amp = str_replace('-&amp;', '',strtolower($building_type_space));
							$building_type_slash = str_replace('/', '',strtolower($building_type_amp));
							echo ' show-'.$building_type_slash;
							array_push($classArray, ' show-'.$building_type_slash);
						} ?>">
		                <div class="project-left" style="width:48%">
                	

		<span style="float:right;" class="clientLoc"><?php if(get_field('city')) { the_field('city');  } ?><?php if(get_field('city')&&get_field('state')) { echo ', '; } ?>
		                        <?php if(get_field('state')) { the_field('state'); }  ?></span>

		<h2><?php the_field('client'); ?></h2>

		                    <h1><?php if($readMore == 1){
		                                    echo '<a class="readMoreIndicator" class="readMoreIndicator" href="' . get_permalink() . '">' . get_the_title() . '</a>';
                                
								}else{
									echo get_the_title();
								} 
							?></h1>
		                    <?php the_content(); ?>
                    
		                    <ul class="project-services">
		                        <li class="title-li">Services provided</li>
		                        <?php 
								$services = wp_get_post_terms($post->ID, 'service', array("fields" => "all"));
						
						$serviceArray=array();		
		                        foreach ($services as $service) { 
									$cleaned = str_replace('&amp;','&',$service->name);
									$pieces = explode("; ", $cleaned);
            
									foreach($pieces as $element) { $serviceArray[] = $service->name;?>
		                            	<li class="bg-fill"><a class="click" name="<?php echo $service->name; ?>" id="show-<?php echo $service->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $service->slug . "&type=service-filter"; ?>"><?php echo $element; ?></a></li>
		                        <?php 
									}
								} ?>
                        
		                    </ul>
		                    <div class="clear"></div>
		                    <ul class="project-sectors">
		                        <li class="title-li">Industry sector</li>
		                        <?php 
								$industry_sectors = wp_get_post_terms($post->ID, 'industry-sector', array("fields" => "all"));
		                        foreach ($industry_sectors as $industry_sector) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $industry_sector->name; ?>" id="show-<?php echo $industry_sector->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $industry_sector->slug . "&type=industry-sector-filter"; ?>"><?php echo $industry_sector->name; ?></a></li>
		                        <?php } ?>
		                    </ul>
		                    <div class="clear"></div>
                    
                    
		                    <ul class="building-types">
		                        <li class="title-li">Building types</li>
		                        <?php 
								$building_types = wp_get_post_terms($post->ID, 'building-type', array("fields" => "all"));
		                        foreach ($building_types as $building_type) { ?>
		                            <li class="bg-fill"><a class="click" name="<?php echo $building_type->name; ?>" id="show-<?php echo $building_type->slug; ?>" href="<?php echo "http://brightworks.net/dev/projects/?projects=" . $building_type->slug . "&type=building-type-filter"; ?>"><?php echo $building_type->name; ?></a></li>
		                        <?php 
		} ?>
                        
		                    </ul>
		                    </div><!-- .project-left -->
		<!-- .project-middle -->

		                   <?php 
		if( get_field('featured_image') ){
			while( has_sub_field('featured_image') ){ 
				$featured_image = get_sub_field('featured_image');
				$brief_description = get_sub_field('brief_description');
				if ($featured_image) {  ?>

	
		                    <?php if($readMore == 1){echo '<a href="' . get_permalink() . '">';}?>
                    
		                    <div class="project-right" style="width:48.8%; height: 100%; float: right; background-image: url(<?php echo $featured_image; ?>); background-position: 50% 50%; background-repeat: no-repeat; background-size:cover;">
                    
		                    </div>
		                    <?php if($readMore == 1){echo '</a>';}?><!-- project-right -->
		                    <?php }
			}
		} ?> 
		                <div class="clear"></div>
		                </div>

		<?php

		//}  //showThis

		//Blue hover-over stuff

		$clientName = get_field('client');
		$theContent = get_the_content();
		$theContent = wordwrap($theContent, 80);
		$theContent = explode("\n", $theContent);
		$theContent = $theContent[0] . '...';

		if(empty($featured_image)){$backgroundStyle = 'background-color:rgba(191, 204, 215, 0.4);'; $imageCheck = "noImagePresent";}
		else{$backgroundStyle = 'background:url(' . $featured_image . ') 50% 50% no-repeat;'; $imageCheck = "imagePresent";}

		echo '<li><div id="' . $post->ID . 'F" class="projectHoverImg profile-boxF'; foreach($classArray as $value){echo $value;}; echo ' ' . $imageCheck . '" style="width:100%;height:100%;position:relative;margin-right:30px;margin-bottom:30px;cursor:pointer;float:left;overflow:hidden;background-size: cover!important;' . $backgroundStyle . '">

		<div style="opacity: 0.8; position: absolute; bottom: 0px; height: 100%; width:100%; display: none; background-color: rgb(37, 82, 128);" class="profile-box-highlight"></div>
								<div style="position:absolute;bottom:0;height:80px;top:20px;width:100%;">
									<h5 class="peopleText" style="font-weight: 600; color: rgb(255, 255, 255); margin: 12px 20px 0px 20px; font-size: 14px; display: none;">' . $clientName . '</h5>
									<h6 class="peopleText" style="color: rgb(255, 255, 255); margin: 0px 0px 0px 20px; font-size: 13px; letter-spacing: 0.5px; min-height: 80px; padding-right: 10px; display: none; font-weight: 200;text-overflow: ellipsis;">' . get_the_title() . '</h6>
							
								</div>';
						
								if($readMore == 1){
								}

		echo '</div></li>';
		$i++;
		?>

		<?php

		if($i==4){	
			echo '</ul>';
			echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
			echo '<ul class="project-list">';
			$i=0;
		}

		if($i!=4 && 1==1){
		}
			}// end if $building_amp
		} // end foreach ($building 

		?>

		<?php endwhile; endif;  wp_reset_query(); //wp_reset_postdata();  ?>

		<?php

		if($i!=4 || $i!=0){	
			echo '</ul>';
			echo '<div class="collectedProjectsF" id="projectCollectorF' . $projectCollectorDivCounter; $projectCollectorDivCounter++; echo '"></div>';
		}
		?>
		</div> <!-- end filteredServicesDiv -->	

		            </div><!-- #project-listing -->
						<br style="clear:both;"/>
						</div>
					</div>
				</div>
				<?php //echo $signatureCheck; 
				if($signatureCheck == 0 && $qsCheck=="yes"){echo '<style>.projectsTitles{display:none!important;}</style>';} ?>
		 <!-- #content-area -->
	<!-- </div> --> <!-- .container -->

<?php endif; ?>

<span class="hide" id="nonSigTitle"><?php echo get_field('non-signature_projects_title')?></span>


</div> <!-- #main-content -->

<?php get_footer(); ?>