/* eslint-disable no-undef*/
import $ from 'jquery';
import imagesLoaded from 'imagesloaded';
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
export default {
    init() {
        /**
         * PRELOADER
         */
        imagesLoaded.makeJQueryPlugin( $ );
        var imgLoad = imagesLoaded('body');
        var imageMaxCount = imgLoad.images.length;
        var currentImage = 0;
        var value = 0;

        imgLoad.on( 'always', function() {
            for ( var i = 0, len = imgLoad.images.length; i < len; i++ ) {
                var image = imgLoad.images[i];
                if(!image.isLoaded){
                    /* eslint-disable no-console*/
                    console.log( 'L\'image ' + image.img.src + ' n\'a pas été chargée correctement' );
                }
            }

            $( document ).ready(function () {
                setTimeout(function () {
                    $('body').toggleClass('loaded');
                }, 500);
            });
        });

        imgLoad.on( 'progress', function() {
            currentImage++;
            var number = Math.round((currentImage * 100)/imageMaxCount);
            value = number + ' %';
            $('.txt-perc').text(value);
        });
    },
    finalize() {
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
                });
                thumbnail_news.mouseout(function () {
                    $(this).removeClass("active");
                });
                //Scroll toggle class on smaller devices
            } else {
                thumbnail_news.each(function () {
                    new ScrollMagic.Scene({
                        triggerElement: this,
                        duration: "50%",
                        triggerHook: 0.5,
                    })
                    .setClassToggle(this, 'active')//Addclass to .navbar
                    .addIndicators({name: 'Active anim on scroll', colorTrigger: 'red', indent: 200, colorStart: '#75CC395'})
                    .addTo(news_section_animation_controller);
                });
            }

            /**
             * SCROLLING MENU Animations
             *
             * @description When the user scroll to the top of section 2, navbar autmaticly become black
             * @author Jeff Jardon
             * */
            //Init ScrollMagic
            var ScrollMenuBackgroundController = new ScrollMagic.Controller();
            //Show the background (black) of the main navigation
            new ScrollMagic.Scene({triggerElement: 'section:nth-child(2), #masters, .job_listings > section:nth-child(1)', triggerHook: 0.5})
            .setClassToggle('#sidebar', 'dark-menu')
            .addIndicators({name: 'dark menu show', colorTrigger: 'red', indent: 700, colorStart: 'pink'})
            .addTo(ScrollMenuBackgroundController);

            //Show the logo of the main navigation
            new ScrollMagic.Scene({triggerElement: 'section:nth-child(2), #masters, .job_listings > section:nth-child(1)', triggerHook: 0.5})
            .setClassToggle('#logo-psm-nav', 'show-logo')
            .addIndicators({name: 'logo show', colorTrigger: 'red', indent: 600, colorStart: 'pink'})
            .addTo(ScrollMenuBackgroundController);
            //END SCROLLING MENU ANIMATIONS

            /**
             * SCROLLING Click BURGER ANIMATION
             *
             * @description The user click on the burger menu, this one will come from outside of the screen
             * @author Jeff Jardon
             * */
            if ($(window).width() < 992) {
                var sidebar = $('#sidebar');
                var links = sidebar.find('a');
                var timeLineLinks = new TimelineMax;
                var forward = false;
                timeLineLinks.staggerFrom(links, 0.5, {x: -200, scale: 0.1, autoAlpha: 0, ease: Power2.easeIn}, 0.1);
                timeLineLinks.reverse();

                $("[data-toggle]").click(function (e) {
                    e.preventDefault();
                    //Animation
                    timeLineLinks.timeScale(1);
                    if (forward == false)//timeline is going forward so we should reverse it
                    {
                        timeLineLinks.play();
                    }
                    else//timeline is going backwards, so we should make it go forward
                    {
                        timeLineLinks.timeScale(4);
                        timeLineLinks.reverse();
                    }
                    //this toggles the boolean on each click event
                    if(forward) {
                        forward = false;
                    } else {
                        forward = true;
                    }
                    //Open sidebar
                    $(sidebar).toggleClass("open-sidebar");
                });
            }
            //END CLICK BURGER ANIMATION

            /**
             * SCROLLING CLICK DROPDOWNS
             *
             * @description The user click on a menu items composed by several sub menus. Those ones will be shown in a dropdown
             * @author Jeff Jardon
             * */
            $(".menu-item-has-children > a").click(function(e) {
                e.preventDefault();
                var dropdown = $(this).parent().find('.sub-menu');
                dropdown.toggleClass("open-dropdown");
            });
            //END CLICK DROPDOWNS

            /* ==========================================================================
             PAGE MASTERS - SECTION VIDEO
             ========================================================================== */

            /***
             *  SECTIONS ANIMATION
             *
             *  @description This animation is triggered on every first div child of an section tag
             *
             *  @author Jeff Jardon
             */



            /*var sections = $('section > .row').map(function(){
             return $(this).length;
             }).get();

             alert(sections);*/

            if($(window).width() > 992) {
                var controllerParralaxSections = new ScrollMagic.Controller();
                var sections = $('section > .row');
                sections.each(function () {
                    var tl_parralax_sections = new TimelineMax;
                    var current_element = this;
                    var section_name = "Parralax Section : " + $(this).parent().parent().attr('id');
                    var section = this.parentNode;

                    tl_parralax_sections.from(current_element, 1, {y: 100, opacity: 0, ease: Power4.easeOut});

                    new ScrollMagic.Scene({
                        triggerElement: section,
                        triggerHook: 0.6,
                    })
                        .setTween(tl_parralax_sections)
                        .addIndicators({name: section_name}) // add indicators (requires plugin)
                        .addTo(controllerParralaxSections);
                });
            }


            /**
             * LITTLE BOTTOM VIDEO
             * @description : Like the you tube application when you scroll, the video keeps playing in a little windows at the bottom
             * of the screen
             *
             * @author Jeff Jardon
             */
            var ScrollVideoController = new ScrollMagic.Controller();
            //Show the background (black) of the main navigation
            new ScrollMagic.Scene({triggerElement: '#masters, #licence', triggerHook: 0})
            .setClassToggle('.video-background', 'miniature')
            .addIndicators({name: 'miniature video', colorTrigger: 'red', indent: 700, colorStart: 'pink'})
            .addTo(ScrollVideoController);

            /**
             * LITTLE BOTTOM VIDEO SWIPE
             *
             * @description This function has two events, scrolls and swipes. If swipes are detected to the left we can send
             * away the miniature video. If the miniature is swipped and the user back to the welcome video section, the offset must
             * be canceled with the windows.scroll function
             */
            var tl_swipe_miniature = new TimelineMax;
            var miniature = $(".video-background");
            $(function() {
                //Enable Swippe event listener on miniature video
                miniature.swipe( {
                    swipeStatus:function(event, phase, direction, distance)
                    {
                        //Only trigger if the video is in miniature mode
                        if (phase=="move" && direction =="right" && miniature.width() <= 320){
                            tl_swipe_miniature.to(miniature, 0, {x:distance});
                        }

                        //Reset to origin position if the user doesn't swippe enough
                        if(phase == "cancel"){
                            tl_swipe_miniature.to(miniature, 0.01, {x:0});
                        }

                        if (phase=="end" && miniature.width() <= 320){
                            tl_swipe_miniature.to(miniature, 0.01, {x:(miniature.width()+10)});
                            miniature.addClass('swipped');
                        }
                    },
                    triggerOnTouchEnd:false,
                    maxTimeThreshold:1000,
                    threshold:100,
                    cancelThreshold:10,
                });
            });


            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll < $(window).height()){
                    miniature.show();
                    tl_swipe_miniature.to(miniature, 0.01, {x:0});
                }else if (miniature.hasClass('swipped')) {
                    miniature.hide();
                }
            });



            /* ==========================================================================
             PAGE MASTERS - SECTION CHOOSE TRAINING
             ========================================================================== */
            /**
             * TOGGLE MASTERS TRAINING
             *
             * @description On click on the button master 1 or master 2, the correct sections are shown
             *
             * @author Jeff Jardon
             */
            jQuery(document).ready(function() {
            $(function($) {
                var choose_training = $("#toggle-masters").find(".row").find(".choose-training");

                var master_1_content = $("#masters").find("#master-1"),
                        master_2_content = $("#masters").find("#master-2");

                $(choose_training).click(function () {
                    if ($(this).index() == 0) {
                        master_1_content.addClass("selected");
                        master_2_content.removeClass("selected");

                        $(this).addClass("active");
                        $(this).next().removeClass("active");

                        if($(window).width() > 992){
                            TweenLite.to(window, 0.5, {scrollTo: {y:"#master-1", offsetY:100}});
                        }else{
                            TweenLite.to(window, 0.5, {scrollTo: "#master-1"});
                        }
                    } else {
                        master_2_content.addClass("selected");
                        master_1_content.removeClass("selected");

                        $(this).addClass("active");
                        $(this).prev().removeClass("active");

                        if($(window).width() > 992){
                            TweenLite.to(window, 0.5, {scrollTo: {y:"#master-2", offsetY:100}});
                        }else{
                            TweenLite.to(window, 0.5, {scrollTo: "#master-2"});
                        }
                    }
                });
            });

            /* ==========================================================================
             PAGE MASTERS - SECTION PROGRAMMES
             ========================================================================== */
            /**
             * ACCORDEON DROPDOWN
             *
             * @description: If a title from the accordeon is clicked, its content is shown
             *
             * @author Jeff Jardon
             */

            $(function($){
                var contents = $('.accordeon-content');
                var titles = $('.accordeon-title');
                titles.on('click',function(){
                    var title = $(this);
                    contents.filter(':visible').slideUp(function(){
                        $(this).prev('.accordeon-title').removeClass('is-opened');
                    });

                    var content = title.next('.accordeon-content');

                    if (!content.is(':visible')) {
                        content.slideDown(function(){title.addClass('is-opened')});
                    }
                });
            });

            /**
             * LOSANGES CLICKS EVENTS
             *
             * @description: When losanges are clicked, the following accordeon is shown
             *
             * @author Jeff Jardon
             */

            var section_programme = $('.psm-formations-programme-section'),
                    accordeons = section_programme.find('.accordeon'),
                    losanges = section_programme.find('.losange'),
                    sub_title_section = section_programme.find('.header').find('h3');

            var titles = losanges.find('h4').map(function(){
                return $(this).text();
            }).get();

            accordeons.addClass('hide');
            accordeons.first().removeClass('hide').addClass('show');
            accordeons.eq(3).removeClass('hide').addClass('show');
            $('.accordeon:first-of-type > :nth-child(2)').css("display","block");



            losanges.on('click', function(){
                if ($(this).index() != 1){
                    accordeons.addClass('hide');
                }
                if ($(this).index() == 0 ){
                    sub_title_section.text(titles[0]);
                    losanges.removeClass('active');
                    $(this).addClass('active');
                    accordeons.removeClass('show');
                    accordeons.eq(0).removeClass('hide').addClass('show');
                    accordeons.eq(3).removeClass('hide').addClass('show');
                } else  if ($(this).index() == 3){
                    sub_title_section.text(titles[2]);
                    losanges.removeClass('active');
                    $(this).addClass('active');
                    accordeons.removeClass('show');
                    accordeons.eq(1).removeClass('hide').addClass('show');
                    accordeons.eq(4).removeClass('hide').addClass('show');
                } else  if ($(this).index() == 2){
                    sub_title_section.text(titles[1]);
                    losanges.removeClass('active');
                    $(this).addClass('active');
                    accordeons.removeClass('show');
                    accordeons.eq(2).removeClass('hide').addClass('show');
                    accordeons.eq(5).removeClass('hide').addClass('show');
                }
            });

            if ($(window).width() < 573) {
                losanges.eq(2).insertAfter(losanges.eq(3));
            }

            /* ==========================================================================
             PAGE MASTERS - SECTION TESTIMONY
             ========================================================================== */
            var controllerTestimonySection = new ScrollMagic.Controller();
            var hexagones = $('.hexagone-item');

            if ($(window).width() > 992) {
                var tl_hexagones = new TimelineMax;
                tl_hexagones.from(hexagones.eq(0), 1, {y: -200, x:-200,opacity: 0,ease: Bounce.easeOut});
                tl_hexagones.from(hexagones.eq(1), 1, {y: -200, x:200,opacity: 0, ease: Bounce.easeOut},'-=1');
                tl_hexagones.from(hexagones.eq(2), 1, {y: 200, x:-200,opacity: 0, ease: Bounce.easeOut},'-=1');
                tl_hexagones.from(hexagones.eq(3), 1, {y: 200, x:0,opacity: 0, ease: Bounce.easeOut},'-=1');
                tl_hexagones.from(hexagones.eq(4), 1, {y: 200, x:200,opacity: 0, ease: Bounce.easeOut},'-=1');

                new ScrollMagic.Scene({
                    triggerElement: '.hexagone-container',
                    triggerHook: 0.5,
                })
                .setTween(tl_hexagones)
                .addIndicators({name: 'hexagones_anim'}) // add indicators (requires plugin)
                .addTo(controllerTestimonySection);
            }else {
                hexagones.each(function () {
                    var tl_hexagones = new TimelineMax;
                    tl_hexagones.from(this, 0.3, {x:-200,opacity: 0,ease: Power4.easeOut});
                    new ScrollMagic.Scene({
                        triggerElement: this,
                        triggerHook: 0.5,
                    })
                    .setTween(tl_hexagones)
                    .addIndicators({name: ('hexagone_anim_mobile' +$(this).index())}) // add indicators (requires plugin)
                    .addTo(controllerTestimonySection);
                });
            }

            if ($(window).width() < 992) {
                hexagones.eq(4).insertAfter(hexagones.eq(2));
            }

            if ($(window).width() < 573) {
                hexagones.eq(2).insertAfter(hexagones.eq(0));
            }

            /* ==========================================================================
             PAGE PROJECTS - SELECT
             ========================================================================== */
            //var yearLink = $('#projects-navigation').find('select').find('option');
            //var yearNow = new Date().getFullYear();
            //defaultDate();
            /*function defaultDate() {
                 yearLink.each(function () {
                     if($(this).val() == yearNow){
                         $(this).attr('selected','true');
                         //Automaticly show the current year's related projects on page load
                         //selectProjects(yearNow);
                     }
                 })
             }*/

            var select = $('#projects-navigation').find('select');
            var projects = $('section.project');
            var noProjectsResults = $('.noProjectsResults');
            noProjectsResults.hide();
            projects.hide();

            select.change(function () {
                var selectedDate = $(this).val();
                selectProjects(selectedDate);
                if($(window).width() > 992){
                    TweenLite.to(window, 0.5, {scrollTo: {y:".scrollToProjects", offsetY:100}});
                }else{
                    TweenLite.to(window, 0.5, {scrollTo: ".scrollToProjects"});
                }
            });

            function selectProjects(selectedDate) {
                var countDisplayedProjects = 0;
                projects.each(function () {
                    if(selectedDate == $(this).data('year')){
                        $(this).show();
                        countDisplayedProjects++;
                    }else{
                        $(this).hide();
                    }
                });

                noProjectsResults.hide();
                if(countDisplayedProjects == 0){
                    noProjectsResults.show()
                }
            }
        },jQuery);
    },
};

