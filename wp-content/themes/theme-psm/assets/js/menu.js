jQuery(document).ready(function( $ ) {
    /**
     * SCROLLING MENU Animations
     *
     * @description When the user scroll to the top of section 2, navbar autmaticly become black
     * @author Jeff Jardon
     * */
    //Init ScrollMagic
    var ScrollMenuBackgroundController = new ScrollMagic.Controller();
    //Show the background (black) of the main navigation
    new ScrollMagic.Scene({triggerElement: 'section:nth-child(2), #masters', triggerHook: 0.5})
        .setClassToggle('#sidebar', 'dark-menu')
        .addIndicators({name: 'dark menu show', colorTrigger: 'red', indent: 700, colorStart: 'pink'})
        .addTo(ScrollMenuBackgroundController);

    //Show the logo of the main navigation
    new ScrollMagic.Scene({triggerElement: 'section:nth-child(2), #masters', triggerHook: 0.5})
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

},jQuery);
