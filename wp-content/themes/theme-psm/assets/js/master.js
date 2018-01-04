/* ==========================================================================
 PAGE MASTERS - SECTION VIDEO
 ========================================================================== */

/**
 * YOU TUBE API
 *
 * @description: We use the You Tube Api to listen to the full screen mode events. Also, we want the video start playing
 * on page load but to be muted. Finally, we can easily set the url (src) parametters.
 *
 * @author: Google, used by Jeff Jardon
 */
// 1. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 2. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player, iframe;
var $ = document.querySelector.bind(document);
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        videoId: you_video_tube_id,
        width: "100%",
        playerVars:{
            "showinfo":0,
            "rel":0,
            "controls":0,
            "autoplay":1,
            "loop":1,
            "playlist": you_video_tube_id,
            "mute":1,
            "playinline":0,
            "wmode":"opaque"
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

// 3. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
    iframe = $('#player');
    player.mute();

    setupListener();
}
function setupListener (){
    $('.video-background').addEventListener('dblclick', playFullscreen);
    $('.video-background').addEventListener('click', playStop);
}

function playFullscreen (){
    var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
    requestFullScreen.bind(iframe)();
}

// 4. Add events listenner for fullscreen mode
document.addEventListener("fullscreenchange", onFullScreenChange, false);
document.addEventListener("webkitfullscreenchange", onFullScreenChange, false);
document.addEventListener("mozfullscreenchange", onFullScreenChange, false);

//If the fullscreen var is empty, we mute the video, else, we reset to start and enable the sound
function onFullScreenChange() {
    var fullscreenElement = document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement;
    if(fullscreenElement == null){
        player.mute();
    }else {
        player.seekTo(0);
        player.unMute();
    }
}

// 5. Play/Stop video

var clickCount = 0;
function playStop() {
    clickCount++;
    if(clickCount%2 == 0){
        player.playVideo()
    }else {
        player.pauseVideo()
    }
}

// 6. The API calls this function when the player's state changes.
var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        done = true;
    }
}

jQuery(document).ready(function( $ ) {

    /***
     *  SECTIONS ANIMATION
     *
     *  @description This animation is triggered on every first div child of an section tag
     *
     *  @author Jeff Jardon
     */

    var controllerParralaxSections = new ScrollMagic.Controller();

    /*var sections = $('section > .row').map(function(){
        return $(this).length;
    }).get();

    alert(sections);*/


   var sections = $('section:not(.psm-formations-testimony-section, #toggle-masters) > .row > div');
   sections.each(function () {
       var tl_parralax_sections = new TimelineMax;
       var current_element = this;
       var section_name = "Parralax Section : " + $(this).parent().parent().attr('id');
       var section = this.parentNode;
       if ($(window).width() > 768) {
           tl_parralax_sections.from(current_element, 1, {y: 100, opacity: 0, rotationX: 90, ease: Power4.easeOut});
       }else{
           tl_parralax_sections.from(current_element, 1, {y: 100, opacity: 0, ease: Power4.easeOut});
       }
       new ScrollMagic.Scene({
           triggerElement: section,
           triggerHook: 0.6
       })
           .setTween(tl_parralax_sections)
           .addIndicators({name: section_name}) // add indicators (requires plugin)
           .addTo(controllerParralaxSections);
    });


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
            cancelThreshold:10
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
    $(function($) {
        var choose_training = $("#toggle-masters").find(".row").find(".choose-training");

        var master_1_content = $("#masters").find("#master-1"),
            master_2_content = $("#masters").find("#master-2");

        $(choose_training).click(function (e) {

            if ($(this).index() == 0) {
                master_1_content.addClass("selected");
                master_2_content.removeClass("selected");

                $(this).addClass("active");
                $(this).next().removeClass("active");
            } else {
                master_2_content.addClass("selected");
                master_1_content.removeClass("selected");

                $(this).addClass("active");
                $(this).prev().removeClass("active");
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

    var header = $('.header');

    if ($(window).width() > 992) {
        var tl_hexagones = new TimelineMax;
        tl_hexagones.from(hexagones.eq(0), 1, {y: -200, x:-200,opacity: 0,ease: Bounce.easeOut});
        tl_hexagones.from(hexagones.eq(1), 1, {y: -200, x:200,opacity: 0, ease: Bounce.easeOut},'-=1');
        tl_hexagones.from(hexagones.eq(2), 1, {y: 200, x:-200,opacity: 0, ease: Bounce.easeOut},'-=1');
        tl_hexagones.from(hexagones.eq(3), 1, {y: 200, x:0,opacity: 0, ease: Bounce.easeOut},'-=1');
        tl_hexagones.from(hexagones.eq(4), 1, {y: 200, x:200,opacity: 0, ease: Bounce.easeOut},'-=1');

        new ScrollMagic.Scene({
            triggerElement: '.hexagone-container',
            triggerHook: 0.5
        })
            .setTween(tl_hexagones)
            .addIndicators({name: 'hexagones_anim'}) // add indicators (requires plugin)
            .addTo(controllerTestimonySection);
    }else {
        hexagones.each(function () {
            var tl_hexagones = new TimelineMax;
            console.log(this);
            tl_hexagones.from(this, 0.3, {x:-200,opacity: 0,ease: Power4.easeOut});
            new ScrollMagic.Scene({
                triggerElement: this,
                triggerHook: 0.5
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

},jQuery);
