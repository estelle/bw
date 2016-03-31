<!DOCTYPE HTML>
<html><head>
	<!-- <title>BrightWorks</title> -->
	<title><?php bloginfo('name'); ?></title>

<!-- <script src="//use.typekit.net/ofi2hjp.js"></script>
<script>try{Typekit.load();}catch(e){}</script> -->


	<meta name="viewport" content="width=device-width, minimumscale=1.0, maximum-scale=1.0" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Crete+Round"> -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/style.css?ver=<?php echo rand(2,9999); ?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/responsive.css">
	<script src="<?php bloginfo('template_directory');?>/js/jquery-1.10.2.min.js"></script>

	<script src="<?php bloginfo('template_directory');?>/js/jquery.masonry.js"></script>


    <?php if (is_page(15)){ //people ?>

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
    <?php } ?>


 <?php if (is_page(contact) || is_page(services) || is_page(clients)){   ?>
    <script>
	    $(function(){
			$(".profile-box").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("display", "block");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css("display", "none");}); 

$(".noImagePresent").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("color", "#fff");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css({"color": "#008FB4","display": "block"});}); 


			//$(".profile-box").click(function() {
				//window.location.href = '<?php //echo get_site_url(); ?>/profile?person='+$(this).attr("id");
			//});
	    });
	</script>
    <?php } ?>


<script src="http://www.brightworks.net/dev/wp-content/plugins/ml-slider/assets/sliders/flexslider/jquery.flexslider-min.js"></script>

<link rel="stylesheet" type="text/css" href="http://www.brightworks.net/dev/wp-content/plugins/ml-slider/assets/sliders/flexslider/flexslider.css">


<?php if (is_page('projects')){  ?>
    <script>

jQuery(document).ready(function($) {

	var i=0;
	var j=0;
	var numSignCounter = 0;
	var numSignItems = $('.signature-project').length;
	console.log(numSignItems);
	//move all expanded projects into a collector div, for display onclick.
	$(".project").each(function() {
		
		numSignCounter++;
		if($(this).hasClass("signature-project")){console.log(numSignCounter + ", " + numSignItems);}
		
		
		if(i != 3){
			i++;
			$(this).appendTo("#projectCollector" + j);
	
		}
		
		else{
			$(this).appendTo("#projectCollector" + j);
			j++;
			i=0;
	    
		}
		
		if($(this).hasClass("signature-project") && numSignCounter == numSignItems && i!=0){
			
			
			$(this).appendTo("#projectCollector" + j);
			j++;
			i=0;
		}
	});
	
	
	var k=0;
	var l=0;
	var numSignCounterF = 0;
	var numSignItemsF = $('#filteredServicesDiv .signature-project').length;
	
	console.log("sdf " + numSignItemsF);
	//move all expanded projects into a collector div, for display onclick.
	$(".projectF").each(function() {
		
		numSignCounterF++;
		if($(this).hasClass("signature-project")){console.log(numSignCounterF + ", " + numSignItemsF);}
		
		
		if(k != 3){
			k++;
			$(this).appendTo("#projectCollectorF" + l);
	
		}
		
		else{
			$(this).appendTo("#projectCollectorF" + l);
			l++;
			k=0;
	    
		}
		
		if($(this).hasClass("signature-project") && numSignCounterF == numSignItemsF && k!=0){
			
			$(this).appendTo("#projectCollectorF" + l);
			l++;
			k=0;
		}
	});
	
	


});
	    $(function(){
			$(".profile-box").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("display", "block");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css("display", "none");}); 
			
			$(".profile-boxF").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("display", "block");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css("display", "none");}); 

$(".noImagePresent").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("color", "#fff");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css({"color": "#008FB4","display": "block"});}); 







			$(".profile-box").click(function() {
				var projectId = $(this).attr("id");
				$(".project").css({"display":"none"});
				$("#"+projectId+"-detail").css({"display":"inline-block"});
				//$('.project-section').show();
			});
			
			
			
			$(".profile-boxF").click(function() {
				var projectIdF = $(this).attr("id");
				$(".projectF").css({"display":"none"});
				$("#"+projectIdF+"-detail").css({"display":"inline-block"});
				//$('.project-section').show();
			});
			
			
			
			


//clean qs
var urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();


var qs = urlParams["projects"];
var qsType = urlParams["type"];


//Query String handlers
function hideOthers(){


	//$('.collectedProjects').hide();
	$('.project-section').hide();
 	$('.project').hide();
	//$('.projectHoverImg').hide();
	$('.projectHoverImg').hide();
	

	//$("#project-listing").addClass('compact');
	var industry_sector_val = $.cookie("industry_sector");
	var service_val = $.cookie("service");
	var building_type_val = $.cookie("building_type");
	var location_val = $.cookie("location");
	
	$("."+industry_sector_val).show().fadeIn();
	$("."+service_val).show().fadeIn();
	$("."+building_type_val).show().fadeIn();
	$("."+location_val).show().fadeIn();

	
	$('.project-section').hide();
	//$('.collectedProjects').hide();
				
	$('.strong').removeClass('strong');
	
	
	
	$("#"+qsType).find("#"+industry_sector_val).addClass('strong');
	$("#"+qsType).find("#"+service_val).addClass('strong');
	$("#"+qsType).find("#"+building_type_val).addClass('strong');
	$("#"+qsType).find("#"+location_val).addClass('strong');

}


if(qs == "leed-services"){
	var this_id = "show-leed-services";
	$.cookie("service", this_id);
	var this_name = "LEED Services";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();
	
}


if(qs == "energy-waste-water"){
	var this_id = "show-energy-waste-water";
	$.cookie("service", this_id);
	var this_name = "Energy, Waste &amp; Water";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();

}

if(qs == "planning-infrastructure"){

	var this_id = "show-planning-infrastructure";
	$.cookie("service", this_id);
	var this_name = "Planning &amp; Infrastructure";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();

}

if(qs == "advanced-green-buildings"){
	var this_id = "show-advanced-green-buildings";
	$.cookie("service", this_id);
	var this_name = "Advanced Green Buildings";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();

}

if(qs == "other-green-building-consulting"){
	var this_id = "show-other-green-building-consulting";
	$.cookie("service", this_id);
	var this_name = "Other Green Building Consulting";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();

}

if(qs == "reporting-regulatory-compliance"){
	var this_id = "show-reporting-regulatory-compliance";
	$.cookie("service", this_id);
	var this_name = "Reporting &amp; Regulatory Compliance";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();

}

if(qs == "corporate-sustainability-programs"){
	var this_id = "show-corporate-sustainability-programs";
	$.cookie("service", this_id);
	var this_name = "Corporate Sustainability Programs";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();


}

if(qs == "workshops-professional-education"){
	var this_id = "show-workshops-professional-education";
	$.cookie("service", this_id);
	var this_name = "Workshops &amp; Professional Education";
	$("#show-leed-services").parent().parent().hide();
	$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');

	hideOthers();


}



if (!qs){}

else{
	var this_id = "show-" + qs;
	$.cookie("service", this_id);
	
	var thisName;
	
	if(qs=="arts-entertainment-media"){this_name="Arts, Entertainment &amp; Media";}
	else if(qs=="healthcare-social-services"){this_name="Healthcare &amp; Social Services";}
	else if(qs=="banking-financial-services"){this_name="Banking & Financial Services";}
	else if(qs=="food-processing-grocery"){this_name="Food Processing &amp; Grocery";}
	else if(qs=="real-estate-management-operations-maintenance"){this_name="Real Estate Management, Operations &amp; Maintenance";}
	else if(qs=="sports-recreation-fitness"){this_name="Sports, Recreation & Fitness";}
	else if(qs=="warehousing-distribution"){this_name="Warehousing &amp; Distribution";}
	else if(qs=="biotechnology-life-sciences"){this_name="biotechnology &amp; Life Sciences";}
	else if(qs=="planning-infrastructure"){this_name="planning &amp; infrastructure";}
	else if(qs=="reporting-regulatory-compliance"){this_name="reporting &amp; Regulatory Compliance";}
	else if(qs=="workshops-professional-education"){this_name="Workshops &amp; Professional Education";}
	else if(qs=="energy-waste-water"){this_name="Energy, Waste &amp; Water";}
	else if(qs=="cultural-public-service"){this_name="Cultural &amp; Public Service";}
	else if(qs=="sports-recreation"){this_name="Sports &amp; Recreation";}
	else if(qs=="retail-restaurants"){this_name="Retail &amp; Restaurants";}
	else if(qs=="transportation-parking"){this_name="Transportation &amp; Parking";}
	else if(qs=="public-safety-emergency-services"){this_name="Public Safety &amp; Emergency Services";}
	else if(qs=="k-12-education"){this_name="K&ndash;12 Education";}
	
	
	else if(qs=="international-all-regions"){this_name="International – All Regions";}
	else if(qs=="us-hawaii"){this_name="US – Hawaii";}
	else if(qs=="us-midwest"){this_name="US – Midwest";}
	else if(qs=="us-national"){this_name="US – National";}
	else if(qs=="us-northeast"){this_name="US – Northeast";}
	else if(qs=="us-northern-california"){this_name="US – Northern California";}
	else if(qs=="us-other-regions"){this_name="US – Other Regions";}
	else if(qs=="us-pacific-northwest"){this_name="US – Pacific Northwest";}
	else if(qs=="us-southern-california"){this_name="US – Southern California";}
	
	
	else{this_name = qs.replace(/\-/g, " ");}
	
	
	$("#show-"+qs).parent().parent().hide();
	$('.'+ qsType +' .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.' + qsType).addClass('selected-filter');

	hideOthers();
	
	
}


});

	</script>
    <?php } ?>


    
    <?php if(is_page(13)) { ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
      $("#masonry").masonry();
    });
    </script>
    <?php } ?>
    <?php if(is_page(19)) { //contact ?>
    	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/jquery-jvectormap-1.2.2.css" type="text/css" media="screen"/>
    <script src="<?php bloginfo('template_directory');?>/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery-jvectormap-us-aea-en.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script>
	    $(function(){
	
	    	var stateProjectData = {
				<?php  
					$terms = get_terms("location");
					$count = count($terms);
					if ( $count > 0 ){
						foreach ( $terms as $term ) { ?>
							"US-<?php echo convert_state($term->name,'abbrev'); ?>": <?php echo $term->count; ?>,<?php 
						}
					} ?>
	    		
	    	};

	    	var officeMarkers = [
			<?php
			global $post;
			$office = new WP_Query();
			$office->query('posts_per_page=-1&post_type=office&orderby=menu_order&order=ASC');
			if ( $office->have_posts() ) : while ( $office->have_posts() ) : $office->the_post(); ?>
				{latLng:[<?php the_field('latitude'); ?>, <?php the_field('longitude'); ?>], name: '<?php the_title(); ?>'},
				 <?php endwhile; endif;  wp_reset_query(); ?>
			];
	
	    	$('#contact-map').vectorMap({
	    		map: 'us_aea_en',
	    		backgroundColor: 'transparent',
	    		zoomMax:1,
	    		zoomMin:1,
	    		zoomOnScroll:false,
	    		zoomButtons:false,
	    		regionStyle: {
		    		initial: {
		    			fill: '#acdfe2',
		    			"fill-opacity": 1,
		    			stroke: '#ffffff',
		    			"stroke-width": 1,
		    			"stroke-opacity": 1
		    		},
		    		hover: {
		    			"fill-opacity": 1,
		    			fill: '#0070B7'
		    		},
		    		selected: {
		    			fill: '#01498B'
		    		},
	    			selectedHover: {
		    			fill: '#0070B7'
		    		}
	    		},
	    		series: {
	    			regions: [{
	    				values: stateProjectData
	    			}]
	    		},
	    		markers: officeMarkers,
	    		markerStyle:{
	    			image:'<?php bloginfo('template_directory');?>/images/marker.png',
	    			initial: {
	    				fill: 'transparent',
	    				stroke: 'transparent',
	    				"fill-opacity": 0,
	    				"stroke-width": 1,
	    				"stroke-opacity": 0,
	    				r: 10
	    			},
	    			hover: {
	    				stroke: '#0070B7',
	    				"stroke-width": 1
	    			},
	    			selected: {
	    				fill: '#0070B7'
	    			},
	    			selectedHover: {
	    				fill: '#0070B7'
	    			}
	    		},
	    		selectedRegions: [
	    			<?php  
					/*$terms = get_terms("location");
					$count = count($terms);
					if ( $count > 0 ){
						foreach ( $terms as $term ) { ?>
							"US-<?php echo convert_state($term->name,'abbrev'); ?>",<?php 
						}
					}*/ ?>
          
					"US-OR",
          "US-CA",
          "US-OH",
					"US-NY"
					
					
	    		],
	    		onRegionLabelShow: function(e, el, code) {
	    			if(stateProjectData[code]) {
	    				el.html("<span style='color:#ffffff;font-size:16px;'>"+el.html()+"</span><br/><span style='font-size:12px;color:#ffffff;'>"+stateProjectData[code]+" Projects</span>");
	    			}
	    		},
	    		onMarkerLabelShow:function(e, el, code) {
					//el.html("<div style='width:10px;height:10px;background-color:black;'></div>");
		    	},
		    	onMarkerClick:function(e, code) {
					var cityClicked = officeMarkers[code].name;
					
			    	$.scrollTo('#'+cityClicked.toLowerCase().replace(/\s+/g, '')+'-office', 800);
			    },
			    onMarkerOver: function(e, code) {
			    	var city = officeMarkers[code].name;
					$("#scrollTo"+city).css("color","#0070B7");
				},
				onMarkerOut: function(e, code) {
					var city = officeMarkers[code].name;
					$(".contact-nav li").css("color","#0070B7");
				},
				onRegionClick: function(e, code) {
					
					var regionHandler = {
						"US-OR": "portland-office",
			    		"US-WA": "portland-office",
			    		"US-CA": "sanfrancisco-office",
		    			"US-ID": "portland-office",
		    			"US-UT": "oakland-office",
		    			"US-AZ": "los-angeles-office",
		    			"US-CO": "oakland-office",
		    			"US-TX": "oakland-office",
		    			"US-NE": "cleveland-office",
		    			"US-IA": "cleveland-office",
		    			"US-IL": "cleveland-office",
		    			"US-FL": "cleveland-office",
		    			"US-NC": "cleveland-office",
		    			"US-TN": "cleveland-office",
		    			"US-KY": "cleveland-office",
		    			"US-VA": "cleveland-office",
		    			"US-NY": "new-york-office",
		    			"US-OH": "cleveland-office",
		    			"US-PA": "new-york-office",
		    			"US-MA": "new-york-office"
					};
					
					$.scrollTo("#"+regionHandler[code], 800);
					
				}
	    	});

	    	var map = $("#contact-map").vectorMap('get', 'mapObject');

	    	$.each(officeMarkers, function(index, value) {
		    	var markerImg = $('<img/>', {'src': '<?php bloginfo('template_directory');?>/images/marker.png'} );
		    	var markerDiv = $('<div/>', {'style':'position:absolute;cursor:pointer;'});
		    	markerImg.appendTo(markerDiv);
		    	markerDiv.appendTo("#contact-map");
		    	var newMarkerP = map.latLngToPoint(value.latLng[0], value.latLng[1]);
		    	markerDiv.css('left',newMarkerP.x-6);
		    	markerDiv.css('top',newMarkerP.y-15);
		    	markerDiv.click(function() {
//if value missing hyphen
if(value.name=="New York"){value.name="New-York"}
else if(value.name=="Los Angeles"){value.name="Los-Angeles"}

		    		$.scrollTo('#'+value.name.toLowerCase().replace(/\s+/g, '')+'-office', 800);
				});
				markerDiv.hover(
					function(e) {
						$(".jvectormap-label").show();
						$(".jvectormap-label").text(value.name);
						$(".jvectormap-label").css("top", e.pageY-25);
						$(".jvectormap-label").css("left", e.pageX-($(".jvectormap-label").width()+20));
						$("#scrollTo"+value.name.replace(/\s+/g, '')).css("color","#0070B7");


					},
					function(e) {
						$(".jvectormap-label").hide();
						$(".contact-nav li").css("color","#0070B7");
					}
				);
	    	});

	    	$(".contact-nav li").hover(
				function(e) {
					$(this).css("color","#0070B7");
				},
				function(e) {
					$(this).css("color","#0070B7");
				}
			);
			$(".contact-nav li").click(function() { 
			var this_class = $(this).attr("class");
			$.scrollTo('#'+this_class, 800); 
			});

	    	
	    });

	</script>
    <?php } ?>
    <?php if (is_page(27)) { ?>
    <script src="<?php bloginfo('template_directory');?>/js/Chart.min.js"></script>
    <script>
	    $(function(){
			$(".aoe li:nth-child(4)").addClass('fourth');
			$(".project-slider-image").click(function() {
				var img_path = $(this).css("background-image");
				$(".project-featured-image").css("background-image", img_path);
				$(".project-slider-image").removeClass("selected-slider");
				$(this).addClass("selected-slider");
			});













			
			$( "#project-filters li" ).hover(
				function() {
					$(this).find('ul').show();
				}, function() {
					$( this ).find('ul').hide();
				}
			);
			
			$( ".aoe li" ).hover(
				function() {
					$(this).find('.text-wrap').addClass('text-wrap-active');
				}, function() {
					$( this ).find('.text-wrap').removeClass('text-wrap-active');
				}
			);
	    });
	</script>
    <?php } ?>
    <?php if(is_page(144)) { ?>
    <script src="<?php bloginfo('template_directory');?>/js/Chart.min.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery.cookie.js"></script>
    <script>


	jQuery(document).ready(function($) {
		$(".commaz").last().addClass('remove');
	});


function removeFilters(){
	
	$('#unfilteredDiv').css({"display":"inline-block"});
	$('#filteredServicesDiv').css({"display":"none"});

	
	$.removeCookie("industry_sector");
	$.removeCookie("service");
	$.removeCookie("building_type");
	$.removeCookie("location");

	$('.projectHoverImg').show();
	
	$( "#building-type-filter a.click" ).parent().parent().hide();
	$( "#building-type-filter a.click").parent().parent().parent().find('.li-title').html("BUILDING TYPE");
	$( ".building-type-filter").removeClass('selected-filter');
	
	$( "#service-filter a.click" ).parent().parent().hide();
	$( "#service-filter a.click").parent().parent().parent().find('.li-title').html("SERVICE");
	$( ".service-filter").removeClass('selected-filter');
	
	$( "#industry-sector-filter a.click" ).parent().parent().hide();
	$( "#industry-sector-filter a.click").parent().parent().parent().find('.li-title').html("INDUSTRY SECTOR");
	$( ".industry-sector-filter").removeClass('selected-filter');
	
	$( "#location-filter a.click" ).parent().parent().hide();
	$( "#location-filter a.click").parent().parent().parent().find('.li-title').html("LOCATION");
	$( ".location-filter").removeClass('selected-filter');

	

}

	    $(function(){

			
			$(".project-slider-image").click(function() {
				var img_path = $(this).css("background-image");
				$(".project-featured-image").css("background-image", img_path);
				$(".project-slider-image").removeClass("selected-slider");
				$(this).addClass("selected-slider");
			});
			
			$( "#project-filters li" ).hover(
				function() {
					$(this).find('ul').show();
					
					//console.log($(this).find('ul').find('li').attr('id'));
					
					if($(this).hasClass("industry-sector-filter") || $(this).hasClass("building-type-filter")){
						$(this).find(".moreIndicator").show();
					}
					
				}, function() {
					$( this ).find('ul').hide();
					
					if($(this).hasClass("industry-sector-filter") || $(this).hasClass("building-type-filter")){
						$(this).find(".moreIndicator").hide();
					}
					
				}
			);
			
			
			
			$( ".project" ).hover(
				function() {
					$(this).addClass('project-wrap-active');
				}, function() {
					$( this ).removeClass('project-wrap-active');
				}
			);
			
			
			$.removeCookie("industry_sector");
			$.removeCookie("service");
			$.removeCookie("building_type");
			$.removeCookie("location");



			$( "#industry-sector-filter a, .project-sectors .click" ).click(function() {
				
				//hide loader
				$("#loadingContainer").css({"display": "inline"});
				
				
				var thisId = $(this).attr('id');
				var thisQs = thisId.replace('show-','');
				var thisType = "industry-sector-filter";

				
				window.location.href = "http://brightworks.net/dev/projects/?projects=" + thisQs + "&type=" + thisType;
				
				//rest is useless
				
				
				removeFilters();
				var this_id = $(this).attr("id");
				$.cookie("industry_sector", this_id);
				var this_name = $(this).attr("name");
				$(this).parent().parent().hide();
				$('.industry-sector-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.industry-sector-filter').addClass('selected-filter');
			});
			
			

			$( ".project-services .click" ).click(function() {
				
				var this_id = $(this).attr("id");
				$.cookie("industry_sector", this_id);
				var this_name = $(this).attr("name");
				$(this).parent().parent().hide();
				$('.industry-sector-filter .li-title').html(this_name);
        			$("#project-filters li").removeClass('selected-filter');
        			$('.industry-sector-filter').addClass('selected-filter');
				//console.log(this_id);console.log(this_name);
			});
			


			
			
			$( "#service-filter a.click" ).click(function() {
				
				//hide loader
				$("#loadingContainer").css({"display": "inline"});
				
				var thisId = $(this).attr('id');
				var thisQs = thisId.replace('show-','');
				var thisType = "service-filter";
				
				window.location.href = "http://brightworks.net/dev/projects/?projects=" + thisQs + "&type=" + thisType;
				
				
				
				removeFilters();
				var this_id = $(this).attr("id");
				$.cookie("service", this_id);
				var this_name = $(this).attr("name");
				$(this).parent().parent().hide();
				$('.service-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.service-filter').addClass('selected-filter');
			});
			
			$( "#building-type-filter a, .building-types a.click" ).click(function() {
				
				//hide loader
				$("#loadingContainer").css({"display": "inline"});
				
				var thisId = $(this).attr('id');
				var thisQs = thisId.replace('show-','');
				var thisType = "building-type-filter";
				
				window.location.href = "http://brightworks.net/dev/projects/?projects=" + thisQs + "&type=" + thisType;
				
				
				removeFilters();
				var this_id = $(this).attr("id");
				$.cookie("building_type", this_id);
				var this_name = $(this).attr("name");
				$(this).parent().parent().hide();
				$('.building-type-filter .li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.building-type-filter').addClass('selected-filter');
        
			});
			
			$( "#location-filter a.click" ).click(function() {
				
				//hide loader
				$("#loadingContainer").css({"display": "inline"});
				
				var thisId = $(this).attr('id');
				var thisQs = thisId.replace('show-','');
				var thisType = "location-filter";
				
				window.location.href = "http://brightworks.net/dev/projects/?projects=" + thisQs + "&type=" + thisType;
				
				
				removeFilters();
				var this_id = $(this).attr("id");
				$.cookie("location", this_id);
				var this_name = $(this).attr("name");
				console.log(this_name);
				$(this).parent().parent().hide();
				$(this).parent().parent().parent().find('.li-title').html(this_name);
        //$("#project-filters li").removeClass('selected-filter');
        $('.location-filter').addClass('selected-filter');
			});
			
			$( "a.click" ).click(function() {

				$('.project').hide();
				//$('.projectHoverImg').hide();

				$('.projectHoverImg').hide();
				

				//$("#project-listing").addClass('compact');
				var industry_sector_val = $.cookie("industry_sector");
				var service_val = $.cookie("service");
				var building_type_val = $.cookie("building_type");
				var location_val = $.cookie("location");
	
				$("."+industry_sector_val).show().fadeIn();
				$("."+service_val).show().fadeIn();
				$("."+building_type_val).show().fadeIn();
				$("."+location_val).show().fadeIn();


				
				$('.strong').removeClass('strong');
				$("#"+industry_sector_val).addClass('strong');
				$("#"+service_val).addClass('strong');
				$("#"+building_type_val).addClass('strong');
				$("#"+location_val).addClass('strong');

				$('.project-section').hide();
				//$('.collectedProjects').hide();
				
				if ( (industry_sector_val == "undefined") && (service_val == "undefined")  && (business_type_val == "undefined") && (locationr_val == "undefined")) {
					$("#no-results").fadeIn();
				} else {
					$("#no-results").hide();
				}
			});
			
	    });
	</script>
    <?php } ?>
    <?php if(is_single()) { ?>
    <script src="<?php bloginfo('template_directory');?>/js/Chart.min.js"></script>
    <script>
	    $(function(){
			$(".project-slider-image").click(function() {
				var img_path = $(this).css("background-image");

				var imgUrl = img_path.replace("url(", "");
				imgUrl = imgUrl.replace(")", "");
				
				imgUrl = imgUrl.replace(/"/g, '');
				//imgUrl = '"' + imgUrl + '"';

				$(".project-featured-image img").attr("src", imgUrl);
				$(".project-slider-image").removeClass("selected-slider");
				$(this).addClass("selected-slider");
			});
	    });
	</script>
    <?php } ?>
    <?php if(is_front_page()) { ?>
    <script>
	    $(function(){
	$(".fpb-box").hover(function() {
		$(this).find(".fpb-highlight").css("display", "inline"); 
		$(this).find(".fpb-text").css("display", "inline");
		$(this).find(".fpb-readMore").css("display", "inline");
	}, function() { 
		$(".fpb-highlight").css("display", "none");
		$(".fpb-text").css("display", "none");
		$(".fpb-readMore").css("display", "none");

	    	//$(".fpb-box").hover(function() { $(this).find(".fpb-highlight").css("background-color", "#DBF5FD"); }, function() { $(".fpb-highlight").css("background-color", "#F7FCFE"); }); 
	});
	      
});


	</script>
    <?php } ?>
    
    
    
    
<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicon-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#008fb4">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51732446-17', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body>
	<?php if (is_page('projects')){  ?><div id="loadingContainer"></div> <?php } ?>
    <div id="contentContainer"></div>
		<div id="header">
			<div id="inner-header">
				<div id="logo"><a href="<?php echo get_home_url(); ?>"><img src="http://brightworks.net/dev/wp-content/uploads/2014/10/Brightworks_Logo_500px.png" width="250px" /></a></div>



				<div id="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				</div>
			</div>
		</div>