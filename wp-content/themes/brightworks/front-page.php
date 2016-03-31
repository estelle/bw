<?php 
/* 
Template Name: Front Page
*/
?>
<?php get_header(); ?>
<div id="front-content-area">

    <div id="featured-container">
    
        <div id="featured">
    
            <div id="featured-inner">
    
<?php echo do_shortcode('[metaslider id=7034]'); ?>
    
    
            </div>
            
        </div>
        
	</div>
        
    <!-- section 1 -->

    <div class="headingsFrontPageCont">
        <div class="headingsFrontPage">
            <?php echo do_shortcode('[acf field="tiles_title"]');?>
        </div>
    </div>
        
    


	<div id="front-page-boxes" class="fpb1">
    <?php 
			$i = 1;
      $counter = 1;
	 ?>
      
    <?php 
	
	global $post;
			
        
    $args = array(
		'post_type' => array('project', 'people'),
		'tax_query' => array(
			array(
				'taxonomy' => 'featured',
				'field'    => 'slug',
				'terms'    => 'homepage'
				
			),
		),
		'orderby' => 'modified',
		'order' => 'DESC',
		'hide_empty'         => 1
	);
	
	$projects = new WP_Query( $args );


	if ( $projects->have_posts() ) : while ( $projects->have_posts() ) : $projects->the_post(); ?>
         
	<?php 
		 
		$type = get_post_type();
		
		
		if($type == "people"){
			$image = "photo";
			$text = 'short_description';
			$name = "name";
			//echo get_field($image); //url
		}
	
		
		elseif($type == "project"){
			$image = 'featured_image';
			$text = 'brief_description';
			$name = "client";
			//echo get_field($image); //array
			
		}
		 
		//if(get_field($image)){
			
			$i++;
			
			if($type == "project"){
				while( has_sub_field($image) ){
			
					if(get_field("home_page_hover_title")){
						$hoverTitle = get_field("home_page_hover_title");
					}
					else{
						$hoverTitle = get_field($name);
					}
					
					
					if(get_field("home_page_hover_text")){
						$hoverText = get_field("home_page_hover_text");
					}
					else{
						$hoverText = get_the_title();
					}
	
					$featured_image = get_sub_field($image);
					$brief_description = get_sub_field($text);
					
					if ($counter++ <= 8) {  
						
						if (!$featured_image){?>
							
		<a href="<?php echo get_the_permalink(); ?>">
		<div class="fpb-box fpbNoImageBox">
			<div class="fpb-shade fpbNoImageShade"></div>
			<div class="fpb-highlight fpbNoImageHighlight"></div>
            <div class="fpb-text fpbNoImageText">

                <?php

                        $heading_style = get_field('home_page_hover_title_style_people');
            
                        $text_style = get_field('home_page_hover_text_style_people');
                
                        //apply preferred heading style
                        if(empty($heading_style)){
                            echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
                        }
                        else{
                            echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
                        }
    
    
                        if(empty($text_style)){
                            echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
                        }
                        else{
                            echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
                        }

                    ?>
        
            </div>

						<?php

							$readMore = get_field('read_more');

							if(1==1){//left here in case it is to be reused
						
								echo '<div class="fpb-readMore fpbNoImageReadMore" style="position: absolute; bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; color:#fff; display:none;">Read more...</div>';
								
							}
						
						?>
                        

        </div>
        </a>
							
							
							
							
						<?php			
	
						}
				
					else{
			
		
				
					?>
		<a href="<?php echo get_the_permalink(); ?>"><div class="fpb-box" style="background-image:url(<?php echo $featured_image; ?>);">
        <div class="fpb-shade"></div>
        <div class="fpb-highlight"></div>
            <div class="fpb-text">

    
                  		<?php
                            
							$heading_style = get_field('home_page_hover_title_style_project');
						
							$text_style = get_field('home_page_hover_text_style_project');
						
							
							//apply preferred heading style
							if(empty($heading_style)){
								echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
							}
							else{
								echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
							}
	
	
							if(empty($text_style)){
								echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
							}
							else{
								
								echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
							}
	
	
						?>
		</div>
	
					<?php 
	
						$readMore = get_field('read_more');
	
							if(1 == 1){ //all should have "read more". Left here in case of reuse.
							
							echo '<div class="fpb-readMore" style="position: absolute; bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; display:none; color:#fff;">Read more...</div>';
							}

						?>

					
		</div>
        </a>
						
					<?php 
					
						}
				
					}
		  		}
		  
			}
				
				
				
			if($type == "people"){

				$featured_image = get_field($image);
				$brief_description = get_field($text);
				
				
				if(get_field("home_page_hover_title")){
					$hoverTitle = get_field("home_page_hover_title");
				}
				else{
					$hoverTitle = get_field($name);
				}
				
				
				if(get_field("home_page_hover_text")){
					$hoverText = get_field("home_page_hover_text");
				}
				else{
					$hoverText = get_field('title');
				}
				
				
				
					
				if ($counter++ <= 8) {  
					if (!$featured_image){?>
                        
                        
    <a href="<?php echo get_the_permalink(); ?>">
    <div class="fpb-box fpbNoImageBox">
        <div class="fpb-shade fpbNoImageShade"></div>
        <div class="fpb-highlight fpbNoImageHighlight"></div>
        <div class="fpb-text fpbNoImageText">

            <?php

                    $heading_style = get_field('home_page_hover_title_style_people');
        
                    $text_style = get_field('home_page_hover_text_style_people');
            
                    //apply preferred heading style
                    if(empty($heading_style)){
                        echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
                    }
                    else{
                        echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
                    }


                    if(empty($text_style)){
                        echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
                    }
                    else{
                        echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
                    }

                ?>
    
        </div>

                    <?php

                        $readMore = get_field('read_more');

                        if(1==1){//left here in case it is to be reused
                    
                            echo '<div class="fpb-readMore fpbNoImageReadMore" style="position: absolute; bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; color:#fff; display:none;">Read more...</div>';
                            
                        }
                    
                    ?>
                    

    </div>
    </a>
                        
                        
                        
                        
						<?php			
	
					}
				
				else{
			
		
				
				?>
		<a href="<?php echo get_the_permalink(); ?>"><div class="fpb-box" style="background-size:cover; background-image:url(<?php echo $featured_image; ?>);">
		<div class="fpb-shade"></div>
		<div class="fpb-highlight"></div>
			<div class="fpb-text">
        
				<?php

					$heading_style = get_field('home_page_hover_title_style_people');
					
					$text_style = get_field('home_page_hover_text_style_people');
					
					
					//apply preferred heading style
					if(empty($heading_style)){
						echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
					}
					else{
						echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
					}
					
					
					if(empty($text_style)){
						echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
					}
					else{
						
						echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
					}
					
					
					
					
					?>
                    
			</div>

					<?php
                    
                    $readMore = get_field('read_more');
                    
                    if(1==1){//left here in case it is to be reused
                    
                    echo '<div class="fpb-readMore" style="position: absolute; bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; color:#fff; display:none;">Read more...</div>';
                    
                    }
                    
                    
                    ?>

						
		</div>
    	</a>
					<?php 
					
					}
					
				}
		  
			}
		
		//}

		 
		endwhile; endif;  wp_reset_query(); //wp_reset_postdata();  ?>


	</div>
    <!-- end section 1 -->

	<!-- section 2 -->

	<div class="headingsFrontPageCont">
        <div class="headingsFrontPage">
            <?php echo do_shortcode('[acf field="tiles_title_2"]');?>
        </div>
    </div>


	<div id="front-page-boxes" class="fpb2">
    
    <?php $i = 1;$counter = 1;
	?>
      
    <?php
		global $post;
			
        
		$args = array(
			'post_type' => array('project', 'people'),
				'tax_query' => array(
					array(
						'taxonomy' => 'featured',
						'field'    => 'slug',
						'terms'    => 'homepage2'
						
					),
				),
				'orderby' => 'modified',
				'order' => 'DESC',
				'hide_empty'         => 1
		);

		$projects = new WP_Query( $args );

		if ( $projects->have_posts() ) : while ( $projects->have_posts() ) : $projects->the_post(); ?>
         
		 <?php 
		 
			$type = get_post_type();
		
		
			if($type == "people"){
				$image = "photo";
				$text = 'short_description';
				$name = "name";
				//echo get_field($image); //url
			}
		
			
			elseif($type == "project"){
				$image = 'featured_image';
				$text = 'brief_description';
				$name = "client";
				//echo get_field($image); //array
				
			}
		 
			//if(get_field($image)){
				
				$i++;
				
				if($type == "project"){
					while( has_sub_field($image) ){ 
					
						if(get_field("home_page_hover_title")){
							$hoverTitle = get_field("home_page_hover_title");
						}
						else{
							$hoverTitle = get_field($name);
						}
						
						
						if(get_field("home_page_hover_text")){
							$hoverText = get_field("home_page_hover_text");
						}
						else{
							$hoverText = get_the_title();
						}
		
						$featured_image = get_sub_field($image);
						$brief_description = get_sub_field($text);
						
						if ($counter++ <= 8) {  
							if (!$featured_image){?>
							
							
            <a href="<?php echo get_the_permalink(); ?>">
            <div class="fpb-box fpbNoImageBox">
                <div class="fpb-shade fpbNoImageShade"></div>
                <div class="fpb-highlight fpbNoImageHighlight"></div>
                <div class="fpb-text fpbNoImageText">

                    <?php
    
                            $heading_style = get_field('home_page_hover_title_style_people');
                
                            $text_style = get_field('home_page_hover_text_style_people');
                    
                            //apply preferred heading style
                            if(empty($heading_style)){
                                echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
                            }
                            else{
                                echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
                            }
        
        
                            if(empty($text_style)){
                                echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
                            }
                            else{
                                echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
                            }
    
                        ?>
            
                </div>
    
                            <?php
    
                                $readMore = get_field('read_more');
    
                                if(1==1){//left here in case it is to be reused
                            
                                    echo '<div class="fpb-readMore fpbNoImageReadMore" style="position: absolute; bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; color:#fff; display:none;">Read more...</div>';
                                    
                                }
                            
                            ?>
                            
    
            </div>
            </a>
                                
                                
                                
                                
                            <?php			
        
                            }
                    
						else{
			
			?>
			<a href="<?php echo get_the_permalink(); ?>"><div class="fpb-box" style="background-image:url(<?php echo $featured_image; ?>);">
			<div class="fpb-shade"></div>
			<div class="fpb-highlight"></div>
				<div class="fpb-text">
			
			
								<?php
				
								$heading_style = get_field('home_page_hover_title_style_project');
								
								$text_style = get_field('home_page_hover_text_style_project');
								
								
								//apply preferred heading style
								if(empty($heading_style)){
									echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
								}
								else{
									echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
								}
								
								
								if(empty($text_style)){
									echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
								}
								else{
									
									echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
								}
			
								?>
				</div>
	
								<?php 
								
								$readMore = get_field('read_more');
								
								if(1 == 1){
								
								echo '<div class="fpb-readMore" style="position: absolute;  bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; display:none; color:#fff;">Read more...</div>';
								}
								
								?>
	
						
			</div>
			</a>
								<?php
							}
                  		}
		  			}
				}
				
				
				if($type == "people"){

					$featured_image = get_field($image);
					$brief_description = get_field($text);
					
					
					if(get_field("home_page_hover_title")){
						$hoverTitle = get_field("home_page_hover_title");
					}
					else{
						$hoverTitle = get_field($name);
					}
					
					
					if(get_field("home_page_hover_text")){
						$hoverText = get_field("home_page_hover_text");
					}
					else{
						$hoverText = get_field('title');
					}
				
				
					if ($counter++ <= 8) {  
						if (!$featured_image){?>
							
							
		<a href="<?php echo get_the_permalink(); ?>">
		<div class="fpb-box fpbNoImageBox">
			<div class="fpb-shade fpbNoImageShade"></div>
			<div class="fpb-highlight fpbNoImageHighlight"></div>
            <div class="fpb-text fpbNoImageText">

                <?php

                        $heading_style = get_field('home_page_hover_title_style_people');
            
                        $text_style = get_field('home_page_hover_text_style_people');
                
                        //apply preferred heading style
                        if(empty($heading_style)){
                            echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
                        }
                        else{
                            echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
                        }
    
    
                        if(empty($text_style)){
                            echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
                        }
                        else{
                            echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
                        }

                    ?>
        
            </div>

						<?php

							$readMore = get_field('read_more');

							if(1==1){//left here in case it is to be reused
						
								echo '<div class="fpb-readMore fpbNoImageReadMore" style="position: absolute; bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; color:#fff; display:none;">Read more...</div>';
								
							}
						
						?>
                        

        </div>
        </a>
							
							
							
							
						<?php			
	
						}
				
					else{
			
						?>
		<a href="<?php echo get_the_permalink(); ?>"><div class="fpb-box" style="background-size:cover; background-image:url(<?php echo $featured_image; ?>);">
        <div class="fpb-shade"></div>
        <div class="fpb-highlight"></div>
        	<div class="fpb-text">
							



				<?php

						$heading_style = get_field('home_page_hover_title_style_people');
						
						$text_style = get_field('home_page_hover_text_style_people');
						
						
						//apply preferred heading style
						if(empty($heading_style)){
							echo '<h5 class="fpb-header">' . $hoverTitle . '</h5>';
						}
						else{
							echo '<' . $heading_style . ' class="fpb-header">' . $hoverTitle . '</' . $heading_style . '>';
						}
						
						
						if(empty($text_style)){
							echo '<h6 class="fpb-subline">' . $hoverText. ' &nbsp;</h6>';
						}
						else{
							
							echo '<' . $text_style . ' class="fpb-subline">' . $hoverText. ' &nbsp;</' . $text_style . '>';
						}


					?>
			</div>

					<?php
                    
						$readMore = get_field('read_more');
						
						if(1==1){//left here in case it is to be reused
						
							echo '<div class="fpb-readMore" style="position: absolute;  bottom: 13px; font-size: 14px; text-transform: capitalize; display: block; font-family: museo-sans, sans-serif; font-weight: 300; color:#fff; display:none;">Read more...</div>';
						
						}


					?>

						
		</div>
        </a>
  
					<?php 
					
					}
				}
		  
			}
				
		//}

		 
		endwhile; endif;  wp_reset_query(); //wp_reset_postdata();  ?>

				
	</div>
    <!-- end section 2 -->          
            
      
    <div class="headingsFrontPageCont">
        <div class="headingsFrontPage">
            Affiliations
        </div>
    </div>
    
    <div id="frontPageLogos">


        <table style="width:100%">
          <tr>
        
            <td align="left">
                <img src="http://brightworks.net/dev/wp-content/uploads/2014/10/0000_Layer-1.png" />
            </td>
                <td align="left">
                <img src="http://brightworks.net/dev/wp-content/uploads/2014/10/0001_Layer-2.png" />
            </td> 
                <td align="center">
                <img src="http://brightworks.net/dev/wp-content/uploads/2014/10/0002_Layer-3.png" />
            </td>
        
            <td align="right">
                <img src="http://brightworks.net/dev/wp-content/uploads/2014/10/0003_Layer-4.png" />
            </td>
        
            <td align="right">
                <img src="http://brightworks.net/dev/wp-content/uploads/2014/10/0004_Layer-5.png" />
            </td>
            <td align="right"> 
                <img src="http://brightworks.net/dev/wp-content/uploads/2014/10/0005_Layer-6.png" />
            </td>
        
          </tr>
        </table>

	</div>
	
	<?php get_footer(); ?>
            
            
            <script>
            
			jQuery(document).ready(function($) {
				
				$(".slides li").each(function() {
					var altDesc = $(this).find("img").attr("alt");
					if (altDesc.length > 231) {
						altDesc = altDesc.substr(0,231-3) + "...";
					}
					
					/*
					
					function realWidth(obj){
						var clone = obj.clone();
						clone.css("visibility","hidden");
						$('body').append(clone);
						var captionHeight = clone.outerHeight();
						clone.remove();
						console.log(captionHeight);
						if (captionHeight > 40) {
							altDesc = altDesc.substr(0,150-3) + "...";
						}
					}
					realWidth($(this).find(".caption"));
					*/


					
					
					var href = $(this).find("a").attr("href");
					$(this).find(".caption-wrap").wrap("<a href='" + href + "'></a>");
	
	
					var titleText = $(this).find("img").attr("title");
					$(this).find(".caption-wrap").prepend("<div class='captionHeadline'>" + titleText + "</div>");
					
					
					var captionText = $(this).find(".caption").text();
					
					if (captionText.length > 30 && captionText.length < 46) {
						//$(this).find(".caption").css({"font-size":"18px"});
					}
					else if (titleText.length > 46) {
						titleText = titleText.substr(0,46-3) + "...";
					}
					
					
					$(this).find(".caption-wrap").append("<div class='altDescCaption'>" + altDesc + "</div>");
					$(this).find(".caption-wrap").append("<div class='readMore'>Read more...</div>");
					$(this).prepend("<div class='captionBg'></div>");
					
				});

				
			});
			//console.log($("#metaslider_7034").find("img").attr("src"));
			
			$("#metaslider_7034").find("img").each(function(){
				$(this).clone().insertAfter(this).css({'transform' : 'scale(2,2)','transform-origin': '0 0', 'float':'left'});
			});
			
			//$( ".front-page-boxes:last-child" ).find(".fpb-box").css({ "margin-right":"0"})
			
			$(".fpb1 .fpb-box:eq(3), .fpb1 .fpb-box:eq(7), .fpb2 .fpb-box:eq(3), .fpb2 .fpb-box:eq(7)").css({"margin-right":"0"});
			
            </script>
			