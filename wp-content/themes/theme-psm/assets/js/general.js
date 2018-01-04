/*(function ($) {
 var element = $('.losange');

 element.on('click', function(event) {
 element.css('transform','scale(1)');
 TweenMax.to($(this), 0.2, {scale:1.3});
 })
 })(jQuery);*/

jQuery(document).ready(function( $ ) {

    /* ==========================================================================
     GENERAL
     ========================================================================== */

	/**
	 * NEWS THUMBNAIL ANIMATION
	 *
	 * @description Desktop : Hover add a class 'active', the css does the animate
	 * Small devices : Scroll add a class 'active', the css does the animate
	 *
	 * @author Jeff Jardon
	 */

		//Declare new Scroll Magic Controller
	var news_section_animation_controller = new ScrollMagic.Controller;
	//find html elements to animate
	var thumbnail_news = $('section').find('.thumbnail');

	//Hover toggle class on greater devices
	if ($(window).width() > 1024) {
		thumbnail_news.mouseover(function () {
			$(this).addClass("active");
		})
		thumbnail_news.mouseout(function () {
			$(this).removeClass("active");
		})
		//Scroll toggle class on smaller devices
	}else {
		thumbnail_news.each(function () {
			new ScrollMagic.Scene({
				triggerElement: this,
				duration: "50%",
				triggerHook: 0.5
			})
				.setClassToggle(this, 'active')//Addclass to .navbar
				.addIndicators({name: 'Active anim on scroll', colorTrigger: 'red', indent: 200, colorStart: '#75CC395'})
				.addTo(news_section_animation_controller);
		});
	}

},jQuery);
$(window).on('load', function(){
    //Do stuff
});

//Todo:Delete this on prod
/*
//Time line Max add class
var ScrollMenuTimeLine = new TimelineMax;

 ScrollMenuTimeLine.set(logo_psm, {className: "+=show-logo"});
 .setTween(ScrollMenuTimeLine)*/

/*

 var BASE_URL = window.location.hostname;
 var SVG_FOLDER_PATH =  "/wordpress/site-psm-front/img/svg/";
 var LOGO_URL =  SVG_FOLDER_PATH + "psm-logo.svg";
 var logo_psm = $('#logo-psm-nav');
 logo_psm.load(LOGO_URL, function() {
 });

 */

/*var ScrollMenuBackgroundController = new ScrollMagic.Controller();
 //Show the background (black) of the main navigation
 var blackMenuScene = new ScrollMagic.Scene({
 triggerElement: 'section:nth-child(2)',
 triggerHook:0
 })
 .setClassToggle('.navbar', 'bg-black')//Addclass to .navbar
 .addIndicators({
 name:'black nav',
 colorTrigger: 'red',
 indent: 200,
 colorStart: '#75CC395'
 })
 .addTo(ScrollMenuBackgroundController);*/
