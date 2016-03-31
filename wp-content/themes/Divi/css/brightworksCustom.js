jQuery( document ).ready(function( $ ) {
	
	//--> CUSTOM BRIGHTWORKS JAVASCIPT <--//
	
	$( ".et_header_style_left #et-top-navigation nav > ul > li > a" ).wrapInner( "<span></span>" );
	
	$( ".pure-toggle-text" ).on( "click", function() {
		if($(this).parent().hasClass('open')){
			$(this).parent().removeClass('open');
		}else{
			$(this).parent().addClass('open');
		}
	});
	
	
	$( 'input, textarea').on( "click", function() {
		$this = $(this);
		if($this.hasClass('wpcf7-not-valid')){
			$this.removeClass('wpcf7-not-valid');
		}
	});
	
	/* Legacy Scripts from previous dev theme  built by ATOM (http://weareatom.com/)- */
	$(".profile-box").hover(function() { 
		$(this).find(".profile-box-highlight").css("display", "block"); 
		$(this).find(".peopleText").css("display", "block");
		$(this).addClass('on');
	},function() { 
		$(".profile-box-highlight").css("display", "none"); 
		$(this).find(".peopleText").css("display", "none");
		$(this).removeClass('on');
	}); 
	$(".noImagePresent").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("color", "#fff");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css({"color": "#008FB4","display": "block"});}); 
	
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

		}else{
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
	

	//-->> HOME PAGE SCRIPTS <<--//
	
	$('.et_pb_more_button').html('Read More<span class="arrow"></span>');
	
	if($('.home').length){
		
		$(".fpb-box").hover(function() {
			$(this).find(".fpb-highlight").css("display", "inline"); 
			$(this).find(".fpb-text").css("display", "inline");
			$(this).find(".fpb-readMore").css("display", "inline");
			$(this).addClass('on');
		}, function() { 
			$(".fpb-highlight").css("display", "none");
			$(".fpb-text").css("display", "none");
			$(".fpb-readMore").css("display", "none");
			$(this).removeClass('on');
		    	//$(".fpb-box").hover(function() { $(this).find(".fpb-highlight").css("background-color", "#DBF5FD"); }, function() { $(".fpb-highlight").css("background-color", "#F7FCFE"); }); 
		});
	}	
	
	$(".back-to-top-btn").click(function(e) {
		e.preventDefault();
		$("html, body").animate({ scrollTop: "0px" });
	});
		
				
				
				
	//-->> PROJECT PAGE SCRIPTS <<--//
	if($('.page-template-page-project').length){
		
		$(window).scroll(function (event) {
		    var scroll = $(window).scrollTop();
			if(scroll > 60){
				console.log(scroll);
				// $('#project-filters-container').css('position', 'absolute');
// 				$('#project-filters-container').css('top', '92px');
				
				// $('#project-filters').css('position', 'fixed');
// 				$('#project-filters').css('top', '92px');
			}else{
				// $('#project-filters-container').css('position', 'absolute');
// 				$('#project-filters-container').css('top', 'auto');
				
				// $('#project-filters').css('position', 'absolute');
// 				$('#project-filters').css('top', 'auto');
			}
		});

		$(".project-section").each(function() {
			var projectHeight = $(this).outerHeight();
			$(this).find(".project-right").css({"height":projectHeight});
		});

		//wait to get heights, then hide the relevant part.
		$(".showThis").css({"display":"inline-block"});
		$(".hideThis").css({"display":"none"});

		//--> START Sripts moved from page template<--//
		$("#loadingContainer").css({"display": "none"});
		var firstID = $(".other-project:first").attr('id');
		var idNo = firstID.replace('-detail','');
		//console.log(idNo);
		
		var otherProjectTitles = $('#nonSigTitle').text();
		$("#"+idNo).closest('.project-list').before('<h1 style="color:#003260; clear:both;" id="otherProjectsTitle" class="projectsTitles">' + otherProjectTitles + '</h1>');


		//and repeat

		if ($(".other-projectF").length) {
			var firstIDF = $(".other-projectF:first").attr('id');
			var idNoF = firstIDF.replace('-detail','');

			$("#"+idNoF).closest('.project-list').before('<h1 style="color:#003260; clear:both;" id="otherProjectsTitle" class="projectsTitles">' + otherProjectTitles + '</h1>');

		}


		$(".noImagePresent").find(".peopleText").css({"display": "block", "color":"#008FB4"});



		//add "read more"
		$(".project-left a").each(function() {
			if($(this).hasClass("readMoreIndicator")){
				var readMoreLink = $(this).attr("href");
				console.log(readMoreLink);
				$(this).parent().siblings('p').append("<a style='text-decoration:none;' href='" + readMoreLink + "'><span style='color:#2b92b5;' class='readMoreJS'> Read more</span></a>");
	
			}
	
		});
		//--> END Sripts moved from page template<--//

		$(".profile-box").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("display", "block");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css("display", "none");}); 
		$(".profile-boxF").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("display", "block");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css("display", "none");}); 
		$(".noImagePresent").hover(function() { $(this).find(".profile-box-highlight").css("display", "block"); $(this).find(".peopleText").css("color", "#fff");}, function() { $(".profile-box-highlight").css("display", "none"); $(this).find(".peopleText").css({"color": "#008FB4","display": "block"});}); 


		$(".profile-box").click(function() {
			//alert('profile-box click');
			var projectId = $(this).attr("id");
			var offsetPoint;
			$(".project").css({"display":"none"});
			$("#"+projectId+"-detail").css({"display":"inline-block"});
			
			if($('.et-fixed-header').length){
				offsetPoint = 180;
			}else{
				offsetPoint = 230;
			}
			$('html, body').animate({
			        scrollTop: $("#"+projectId+"-detail").offset().top - offsetPoint
			    }, 400);
			//$('.project-section').show();
		});
		
		
		$(".profile-boxF").click(function() {
			var projectIdF = $(this).attr("id");
			$(".projectF").css({"display":"none"});
			$("#"+projectIdF+"-detail").css({"display":"inline-block"});
			if($('.et-fixed-header').length){
				offsetPoint = 180;
			}else{
				offsetPoint = 230;
			}
			$('html, body').animate({
			        scrollTop: $("#"+projectIdF+"-detail").offset().top - offsetPoint
			    }, 400);
			//$('.project-section').show();
		});
		

		/* Other Header Scripts */
		
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
		
				//if($(this).hasClass("industry-sector-filter") || $(this).hasClass("building-type-filter")){
					$(this).find(".moreIndicator").show();
					//}
		
			}, function() {
				$( this ).find('ul').hide();
		
				//if($(this).hasClass("industry-sector-filter") || $(this).hasClass("building-type-filter")){
					$(this).find(".moreIndicator").hide();
					//}
		
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
			$("#project-listing").css("display", "none");
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
			$("#project-listing").css("display", "none");
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
			$("#project-listing").css("display", "none");
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
			$("#project-listing").css("display", "none");
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
			
					//});
				
				/* End other header scripts */

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
	
}


});

//--> END - CUSTOM BRIGHTWORKS JAVASCIPT <--//
