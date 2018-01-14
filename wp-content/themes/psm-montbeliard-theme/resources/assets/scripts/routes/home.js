/* eslint-disable no-undef*/
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
export default {
    init() {
        // JavaScript to be fired on the home page
    },
    finalize() {
        /* ==========================================================================
         WELCOME PAGE - SECTION WELCOME
         ========================================================================== */
        /**
         * IDEE TWEEN MAX ANIMATION
         *
         * @description Set movements of each svg IDEE childs
         * This animation is infinite.
         *
         * @author Federico Borsoi
         * */

            //Each objects animated in the SVG
        var tete_idee = $('#tete_idee'),
            ampoule = $('#ampoule_idee'),
            tung_al = $('#tung_al_idee'),
            tung_et = $('#tung_et_idee'),
            eteinte = $('#eteinte_idee'),
            allumee = $('#allumee_idee'),
            bras_droit_idee = $('#avant-bras_droit'),
            bras_gauche_idee = $('#avant-bras_gauche_idee');

        //Timeline
        var tl_idee = new TimelineMax;
        tl_idee.to(tete_idee, 0.5, {rotation: 30, transformOrigin: "90% 100%"}, 3)
            .to(bras_droit_idee, 0.3, {rotation: 70, transformOrigin: "15% 90%"}, 3.5)
            .to(bras_gauche_idee, 0.3, {rotation: 120, transformOrigin: "90% 30%"}, 3.5)
            .set(tung_al, {className: "+=show"}, 3.7)
            .set(tung_et, {className: "+=hidden"}, 3.7)
            .set(eteinte, {className: "+=hidden"}, 3.7)
            .set(allumee, {className: "+=show"}, 3.7)
            .fromTo(ampoule, 0.15, {rotation: -10, transformOrigin: "50%, 50%"}, {
                rotation: 10,
                transformOrigin: "50%, 50%",
                repeat: -1,
                ease: Power0.easeNone,
                yoyo: true,
            });
        //END IDEE TWEEN MAX ANIMATION

        /**
         * REUNION TWEEN MAX ANIMATION
         *
         * @description Set movements of each svg REUNION childs
         * This animation is infinite.
         *
         * @author Federico Borsoi
         * */
            //Each objects animated in the SVG
        var bras_reunion = $('#avant-bras_gauche_reunion'),
            ar_bras_reunion = $('#arriere-bras_gauche_reunion'),
            ombre = $('#ombre_reunion'),
            feuille_diagramme = $('#feuille_diagramme_reunion')

        //Timeline
        var tl_reunion = new TimelineMax({repeat: -1});
        tl_reunion.to([bras_reunion, ombre], 0.5, {y: -47, x: 30})
            .to(ar_bras_reunion, 0.5, {rotation: -50, x: 10, y: 10, transformOrigin: "0% 20%"}, 0)
            .to([bras_reunion, ombre], 0.5, {y: 0, x: 0}, 0.5)
            .to(ar_bras_reunion, 0.5, {rotation: 0, x: 0, y: 0, transformOrigin: "0% 20%"}, 0.5)
            .to([bras_reunion, ombre], 0.5, {rotation: 40, x: -2, transformOrigin: "12% 80%"})
            .to([bras_reunion, ombre], 0.5, {rotation: 0, x: 2, transformOrigin: "12% 80%"})
            .to([bras_reunion, ombre], 0.5, {rotation: 40, x: -2, transformOrigin: "12% 80%"})
            .to(feuille_diagramme, 0.5, {rotation: -30, transformOrigin: "100% 0%"})
            .to(feuille_diagramme, 0.5, {y: 500})
            .to([bras_reunion, ombre], 0.5, {rotation: 0, transformOrigin: "12% 80%"})
            .to([bras_reunion, ombre], 0.5, {rotation: 10, transformOrigin: "12% 80%"})
            .to([bras_reunion, ombre], 0.5, {rotation: 30, transformOrigin: "12% 80%"})
            .to([bras_reunion, ombre], 0.5, {y: 3, rotation: 50, transformOrigin: "12% 80%"})
            .to([bras_reunion, ombre], 0.5, {y: 0, rotation: 0, transformOrigin: "12% 80%"}, 6.5)
            .to(feuille_diagramme, 0.5, {y: 0, rotation: 0}, 6.5);
        //END REUNION TWEEN MAX ANIMATION

        /**
         * TRAVAIL TWEEN MAX ANIMATION
         *
         * @description Set movements of each svg TRAVAIL childs
         * This animation is infinite.
         *
         * @author Federico Borsoi
         * */
            //Each objects animated in the SVG
        var com_tr = $('#com_travail'),
            tete_com = $('#tete_com_travail'),
            bras_com = $('#bras_com_travail'),
            tw_com = $('#twitter_travail'),
            mus_tr = $('#musique_travail'),
            graph_tr = $('#graphisme_travail'),
            dev_tr = $('#developpement_travail'),
            vol_droit = $('#volume-son-droit_mus_travail'),
            vol_gauche = $('#volume-son-gauche_mus_travail'),
            pied_mus = $('#chaussure-gauche_mus_travail'),
            tete_mus = $('#tete_mus_travail'),
            bras_d_mus = $('#bras-droit_mus_travail'),
            avantb_mus = $('#avant-bras-g_mus_travail'),
            arriereb_mus = $('#arriere-bras-g_mus_travail'),
            main_mus = $('#arriere-main_mus_travail'),
            ill_1 = $('#p1_ill_graph_travail'),
            ill_2 = $('#p4_ill_graph_travail'),
            ill_3 = $('#p5_ill_graph_travail'),
            ill_4 = $('#p6_ill_graph_travail'),
            ill_5 = $('#p2_ill_graph_travail'),
            ill_6 = $('#p8_ill_graph_travail'),
            ill_7 = $('#p9_ill_graph_travail'),
            ill_8 = $('#p10_ill_graph_travail'),
            ill_9 = $('#p7_ill_graph_travail'),
            ill_10 = $('#p3_ill_graph_travail'),
            ill_11 = $('#p11_ill_graph_travail'),
            boule_pap = $('#boule_pap_graph'),
            main_graph = $('#main_graph_travail'),
            bras_graph = $('#bras-droit_graph_travail'),
            brasg_graph = $('#bras-gauche_graph_travail'),
            code_dev = $('#code_dev_travail rect'),
            brasd_dev = $('#bras-droit_dev'),
            brasg_dev = $('#bras-gauche_dev');

        //Timeline
        var tl_travail = new TimelineMax({repeat: -1});
        tl_travail.from(bras_com, 1, {rotation: 150, transformOrigin: "90% 90%"})
            .to(tete_com, 0.3, {rotation: 10, transformOrigin: "50% 100%"}, 1.5)
            .to(tete_com, 0.3, {rotation: 0, transformOrigin: "50% 100%"})
            .set(tw_com, {className: "-=transparent"}, 2.5)
            .to(tete_com, 0.3, {rotation: 10, transformOrigin: "50% 100%"}, 3)
            .to(tete_com, 0.3, {rotation: 0, transformOrigin: "50% 100%"})
            .set(com_tr, {className: "+=transparent"}, 5)
            .set(mus_tr, {className: "-=transparent"}, 5)
            .to(pied_mus, 0.5, {rotation: 10, transformOrigin: "100% 100%", repeat: 10})
            .from(tete_mus, 0.5, {rotation: -5, transformOrigin: "50% 100%", yoyo: true, repeat: 10}, 5)
            .from(bras_d_mus, 0.2, {y: -2, x: 3, repeat: 25, yoyo: true}, 5)
            .to(vol_droit, 0.5, {y: 15}, 5)
            .to(vol_gauche, 0.5, {y: -5}, 5.5)
            .to([avantb_mus, main_mus], 0.5, {y: 2, x: 5}, 5.5)
            .to(arriereb_mus, 0.5, {rotation: -4, transformOrigin: "50%, 0%"}, 5.5)
            .to(vol_droit, 0.5, {y: -5}, 6)
            .to(vol_gauche, 0.5, {y: 15}, 6)
            .to(vol_droit, 0.5, {y: 15}, 6.5)
            .to(vol_gauche, 0.5, {y: 0}, 6.5)
            .to([avantb_mus, main_mus], 0.5, {y: 0, x: 0}, 6.5)
            .to(arriereb_mus, 0.5, {rotation: 0, transformOrigin: "50%, 0%"}, 6.5)
            .to(vol_droit, 0.5, {y: 0}, 7)
            .to(vol_gauche, 0.5, {y: 10}, 7)
            .to(vol_droit, 0.5, {y: 10}, 7.5)
            .to(vol_gauche, 0.5, {y: -2}, 7.5)
            .to([avantb_mus, main_mus], 0.5, {y: 3.5, x: 9}, 8)
            .to(arriereb_mus, 0.5, {rotation: -7, transformOrigin: "50%, 0%"}, 8)
            .to(vol_droit, 0.5, {y: -2}, 8)
            .to(vol_gauche, 0.5, {y: 8}, 8)
            .to(vol_droit, 0.5, {y: 8}, 8.5)
            .to(vol_gauche, 0.5, {y: 20}, 8.5)
            .to(vol_droit, 0.5, {y: 20}, 9)
            .to(vol_gauche, 0.5, {y: -5}, 9)
            .to([avantb_mus, main_mus], 0.5, {y: 4, x: 15}, 9)
            .to(arriereb_mus, 0.5, {rotation: -10, transformOrigin: "50%, 0%"}, 9)
            .to(vol_droit, 0.5, {y: -5}, 9.5)
            .to(vol_gauche, 0.5, {y: 0}, 9.5)
            .to([avantb_mus, main_mus], 0.5, {y: -3, x: -15}, 9.5)
            .to(arriereb_mus, 0.5, {rotation: 9, transformOrigin: "50%, 0%"}, 9.5)
            .to(vol_droit, 0.5, {y: 0})
            .set(mus_tr, {className: "+=transparent"}, 10)
            .set(graph_tr, {className: "-=transparent"}, 10)
            .fromTo(main_graph, 0.4, {x: -20}, {x: 10, repeat: 4, yoyo: true, repeatDelay: 0.5}, 10)
            .fromTo(bras_graph, 0.4, {rotation: 2, transformOrigin: "0% 30%"}, {
                rotation: -5,
                transformOrigin: "0% 30%",
                yoyo: true,
                repeat: 4,
                repeatDelay: 0.5,
            }, 10)
            .fromTo(brasg_graph, 0.5, {rotation: 2, transformOrigin: "100% 30%"}, {
                rotation: -2,
                transformOrigin: "100% 30%",
                yoyo: true,
                repeat: 3,
            }, 10.4)
            .from(ill_1, 0.1, {opacity: 0}, 10.4)
            .from(ill_2, 0.1, {opacity: 0}, 10.8)
            .from(ill_3, 0.1, {opacity: 0}, 11.2)
            .from(ill_4, 0.1, {opacity: 0}, 11.6)
            .from(ill_5, 0.1, {opacity: 0}, 12)
            .from(boule_pap, 0.6, {x: 6, y: -85, ease: Bounce.easeOut}, 12)
            .from(ill_6, 0.1, {opacity: 0}, 12.4)
            .from(ill_7, 0.1, {opacity: 0}, 12.8)
            .from(ill_8, 0.1, {opacity: 0}, 13.2)
            .from(ill_9, 0.1, {opacity: 0}, 13.6)
            .from(ill_10, 0.1, {opacity: 0}, 14)
            .from(ill_11, 0.1, {opacity: 0}, 14.4)
            .set(graph_tr, {className: "+=transparent"}, 15)
            .set(dev_tr, {className: "-=transparent"}, 15)
            .to(code_dev, 5, {y: -50, ease: Linear.easeNone})
            .to(brasd_dev, 0.2, {
                rotation: -6,
                transformOrigin: "0% 30%",
                repeat: 25,
                yoyo: true,
                ease: Linear.easeNone,
            }, 15)
            .from(brasg_dev, 0.2, {
                rotation: 6,
                transformOrigin: "100% 30%",
                repeat: 25,
                yoyo: true,
                ease: Linear.easeNone,
            }, 15);
        //END TRAVAIL TWEEN MAX ANIMATION

        /**
         * DEPLOIEMENT TWEEN MAX ANIMATION
         *
         * @description Set movements of each svg DEPLOIEMENT childs
         * This animation is infinite.
         *
         * @author Federico Borsoi
         * */
            //Each objects animated in the SVG
        var tetes_levees = $('#tetes_levees_depl'),
            bouche_pere = $('#bouche-pere_depl'),
            bouche_mere = $('#bouche-mere_depl'),
            bouche_fils = $('#bouche-fils_depl'),
            bouche_fille1 = $('#bouche-fille1_depl'),
            bouche_fille2 = $('#bouche-fille2_depl'),
            fleche1 = $('#fleche1_depl'),
            fleche2 = $('#fleche2_depl'),
            fleche3 = $('#fleche3_depl');

        //Timeline
        var tl_depl = new TimelineMax({repeat: -1, repeatDelay: 2});
        tl_depl.to(tetes_levees, 0, {opacity: 0}, -1)
            .from([fleche1, fleche2, fleche3], 2, {scale: 4, y: -400}, 1)
            .to(tetes_levees, 0, {opacity: 1}, 3.5)
            //.to([tete_pere, tete_mere, tete_fils, tete_fille1, tete_fille2], 0, {opacity:0},3.5)
            .to([bouche_pere, bouche_mere, bouche_fils, bouche_fille1, bouche_fille2], 0.5, {y: 5}, 4);
        //END DEPLOIEMENT TWEEN MAX ANIMATION

        /*---- SVG SLIDING ANIMATIONS ----*/

        //Set the initial state of animation to active
        var active = "idee";

        //Set the elements to animate
        var animations = $('#animations_home'),
            animation = $('#animations_home').find('div').find('svg');

        var slider_texts = $('#text-slider-container'),
            slider_text = $('#svg-slider-texte').find('.text-slider');

        /**
         * IDEE OPEN
         *
         * @description This function will create the same animation for each sliders (text and svg one)
         * When this function is called, the IDEE slider will be shown with a slide animation
         *
         * @author Federico Borsoi/Jeff Jardon
         */
        function idee_open() {
            var timeLine_svg_idee_animation = new TimelineMax;
            var timeLine_text_slider_idee_animation = new TimelineMax;

            //SVG Slider animation
            timeLine_svg_idee_animation.to(animation, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(animations, 0.5, {x: "0%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(animation, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_idee.play(), 1.5);

            //Text Slider animation
            timeLine_text_slider_idee_animation.to(slider_text, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(slider_texts, 0.5, {x: "0%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(slider_text, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_idee.play(), 1.5);

            active = "idee";
            //Select state of the navigation (bulls and arrows class)
            select_state();
        }

        //END IDEE OPEN

        /**
         * REUNION OPEN
         *
         * @description This function will create the same animation for each sliders (text and svg one)
         * When this function is called, the REUNION slider will be shown with a slide animation
         *
         * @author Federico Borsoi/Jeff Jardon
         */
        function reunion_open() {
            var timeLine_svg_reunion_animation = new TimelineMax;
            var timeLine_text_slider_reunion_animation = new TimelineMax;

            //SVG Slider animation
            timeLine_svg_reunion_animation.to(animation, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(animations, 0.5, {x: "-100%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(animation, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_reunion.play());

            //Text Slider animation
            timeLine_text_slider_reunion_animation.to(slider_text, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(slider_texts, 0.5, {x: "-100%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(slider_text, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_idee.play(), 1.5);
            active = "reunion";
            //Select state of the navigation (bulls and arrows class)
            select_state();
        }

        //END REUNION OPEN

        /**
         * TRAVAIL OPEN
         *
         * @description This function will create the same animation for each sliders (text and svg one)
         * When this function is called, the TRAVAIL slider will be shown with a slide animation
         *
         * @author Federico Borsoi/Jeff Jardon
         */
        function travail_open() {
            var timeLine_svg_travail_animation = new TimelineMax;
            var timeLine_text_slider_travail_animation = new TimelineMax;

            //SVG Slider animation
            timeLine_svg_travail_animation.to(animation, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(animations, 0.5, {x: "-200%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(animation, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_travail.play());

            //Text Slider animation
            timeLine_text_slider_travail_animation.to(slider_text, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(slider_texts, 0.5, {x: "-200%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(slider_text, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_idee.play(), 1.5);
            active = "travail";
            //Select state of the navigation (bulls and arrows class)
            select_state();
        }

        //TRAVAIL OPEN

        /**
         * DEPLOIEMENT OPEN
         *
         * @description This function will create the same animation for each sliders (text and svg one)
         * When this function is called, the DEPLOIEMENT slider will be shown with a slide animation
         *
         * @author Federico Borsoi/Jeff Jardon
         */
        function deploiement_open() {
            var timeLine_svg_deploiement_animation = new TimelineMax;
            var timeLine_text_slider_deploiement_animation = new TimelineMax;

            //SVG Slider animation
            timeLine_svg_deploiement_animation.to(animation, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(animations, 0.5, {x: "-300%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(animation, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_depl.play());

            //Text Slider animation
            timeLine_text_slider_deploiement_animation.to(slider_text, 0.2, {scale: 0.8, transformOrigin: "50% 50%"})
                .to(slider_texts, 0.5, {x: "-300%", ease: Power1.easeInOut})
                .add(function () {
                    reset_animations()
                })
                .to(slider_text, 0.2, {scale: 1, transformOrigin: "50% 50%"})
                .add(tl_idee.play(), 1.5);
            active = "deploiement";
            //Select state of the navigation (bulls and arrows class)
            select_state();
        }

        //END DEPLOIEMENT OPEN

        /**
         * RESET ANIMATIONS
         *
         * @description When a new state of animation is selected (active var) all animations are reset to start
         * @author Federido Borsoi
         */
        function reset_animations() {
            if (active != "idee") {
                tl_idee.restart();
                tl_idee.pause();
            }
            if (active != "reunion") {
                tl_reunion.restart();
                tl_reunion.pause();
            }
            if (active != "travail") {
                tl_travail.restart();
                tl_travail.pause();
            }
            if (active != "deploiement") {
                tl_depl.restart();
                tl_depl.pause();
            }
        }

        //END RESET ANIMATIONS

        /*---- END SVG SLIDING ANIMATIONS ----*/

        /**
         * SVG SLIDER NAVIGATION CLICK
         *
         * @description When the user choose to click on bulls or next/prev arrows, events are fired to change animation states
         *
         * @author Jeff Jardon
         *
         */
        $('#svg-slider-buttons').find('li').find('i').click(function () {
            switch ($(this).attr("id")) {
                case "prev":
                    precedent();
                    break;
                case "sel_idee":
                    idee_open();
                    break;
                case "sel_reunion":
                    reunion_open();
                    break;
                case "sel_travail":
                    travail_open();
                    break;
                case "sel_deploiement":
                    deploiement_open();
                    break;
                case "next":
                    suivant();
                    break;
            }
        });
        //END SVG SLIDER NAVIGATION CLICK

        /**
         * SUIVANT
         *
         * @description This function will check the current state of the animation
         * When this function is called, the animation state will be set with the next one
         *
         * @author Federico Borsoi
         */
        function suivant() {
            if (active == "idee") {
                reunion_open();
            } else if (active == "reunion") {
                travail_open();
            } else if (active == "travail") {
                deploiement_open();
            }
        }

        //END SUIVANT

        /**
         * PRECEDENT
         *
         * @description This function will check the current state of the animation
         * When this function is called, the animation state will be set with the previous one
         *
         * @author Federico Borsoi
         */
        function precedent() {
            if (active == "reunion") {
                idee_open();
            } else if (active == "travail") {
                reunion_open();
            } else if (active == "deploiement") {
                travail_open();
            }
        }

        // END PRECEDENT

        /**
         * SWIPE FUNCTION
         *
         * Reproduce the swipe event on any screens, so sliders can be swiped right, left and down
         * @link http://labs.rampinteractive.co.uk/touchSwipe/demos/
         *
         * @author Jeff Jardon
         */
        $(function () {
            //Enable swiping...
            $("#text-slider-container, #animations_home, .swipe-container").swipe({
                //Generic swipe handler for all directions
                swipe: function (event, direction) {
                    switch (active) {
                        case "idee":
                            if (direction == "left") {
                                reunion_open();
                            }
                            break;
                        case "reunion":
                            if (direction == "right") {
                                idee_open();
                            }
                            if (direction == "left") {
                                travail_open();
                            }
                            break;
                        case "travail":
                            if (direction == "right") {
                                reunion_open();
                            }
                            if (direction == "left") {
                                deploiement_open();
                            }
                            break;
                        case "deploiement":
                            if (direction == "right") {
                                travail_open();
                            }
                            break;
                    }
                    /*if (direction == "down") {
                     $('html, body').animate({
                     scrollTop: '-=300'
                     }, 500);
                     }
                     if (direction == "up") {
                     $('html, body').animate({
                     scrollTop: '+=300'
                     }, 500);
                     }*/
                },
                allowPageScroll: "vertical",
                //Default is 75px, set to 0 so any distance triggers swipe
                threshold: 75,
            });
        });
        //END SWIPE FUNCTION

        /**
         * SELECT STATE
         *
         * @description each time the sliders change slides, bulls and arrow from navigation get active or selected classes
         * @author Federico Borsoi/Jeff Jardon
         */
        function select_state() {
            var bull_idee = $('#sel_idee');
            var bull_reunion = $('#sel_reunion');
            var bull_travail = $('#sel_travail');
            var bull_deploiement = $('#sel_deploiement');
            var prev = $('#prev');
            var next = $('#next')

            bull_idee.removeClass('selected');
            bull_reunion.removeClass('selected');
            bull_travail.removeClass('selected');
            bull_deploiement.removeClass('selected');
            next.removeClass('inactive');
            prev.removeClass('inactive');
            switch (active) {
                case "idee":
                    bull_idee.addClass('selected');
                    prev.addClass('inactive');
                    break;
                case "reunion":
                    bull_reunion.addClass('selected');
                    break;
                case "travail":
                    bull_travail.addClass('selected');
                    break;
                case "deploiement":
                    bull_deploiement.addClass('selected');
                    next.addClass('inactive');
                    break;
            }
        }

        //END SELECT STATE

        //RESPONSIVE WELCOME SECTION (SMARTPHONES, SMALL TABLETS)
        var text_modal =  $('#welcome-left-collumn').find("#svg-slider-texte");
        $( "button.show-text-slider" ).click(function() {
            text_modal.animate({
                height: "100vh",
            });
        });
        $( "button.hide-text-slider" ).click(function() {
            text_modal.animate({
                height: 0,
            });
        });

        $("button.next-slide").click(function() {
            text_modal.animate({
                height: 0,
            });
            suivant();
            if($(this).hasClass('last-slide')){
                TweenLite.to(window, 0.5, {scrollTo: "#presentation-section"});
            }
        });

        /* ==========================================================================
         WELCOME PAGE - SECTION PRENSENTATION
         ========================================================================== */
        /**
         * PRESENTATION BACKGROUND ELEMENTS ANIMATION
         *
         * @description trigger a Scroll animation on background elements (losanges)
         * Only displayed on devices greater thant 768 width px (tablet landscape and more)
         * @author Jeff Jardon
         * */
        var controllerPresentationSection = new ScrollMagic.Controller();
        if ($(window).width() > 768) {
            // Declade timelines for each geometrics
            var tl_losange1_presentation = new TimelineMax,
                tl_losange2_presentation = new TimelineMax,
                tl_losange3_presentation = new TimelineMax,
                tl_losange4_presentation = new TimelineMax;

            //Find each geometrics elements in html
            var losange_presentation_1 = $('#presentation-section').find('.losange:nth-child(1)'),
                losange_presentation_2 = $('#presentation-section').find('.losange:nth-child(2)'),
                losange_presentation_3 = $('#presentation-section').find('.losange:nth-child(3)'),
                losange_presentation_4 = $('#presentation-section').find('.losange:nth-child(4)');

            //Set the animation they will execute
            tl_losange1_presentation.to(losange_presentation_1, 0.5, {scale: 3, ease: Linear.easeNone});
            tl_losange2_presentation.to(losange_presentation_2, 0.5, {top: "-100px", ease: Linear.easeNone});
            tl_losange3_presentation.to(losange_presentation_3, 0.5, {top: "-75px", ease: Linear.easeNone});
            tl_losange4_presentation.to(losange_presentation_4, 1, {bottom: "0px", ease: Linear.easeNone});



            //Geometric 1 Scene
            new ScrollMagic.Scene({
                triggerElement: "#presentation-section",
                duration: '400',
                triggerHook: 0.5,
            })
                .setTween(tl_losange1_presentation)
                //.addIndicators({name: "losange 1 scale"}) // add indicators (requires plugin)
                .addTo(controllerPresentationSection);

            //Geometric 2 Scene
            new ScrollMagic.Scene({
                triggerElement: "#presentation-section",
                duration: "100%",
                triggerHook: 0.5,
            })
                .setTween(tl_losange2_presentation)
                //.addIndicators({name: "losange 2 translate", indent: 200}) // add indicators (requires plugin)
                .addTo(controllerPresentationSection);

            //Geometric 3 Scene
            new ScrollMagic.Scene({
                triggerElement: "#presentation-section",
                duration: "100%",
                triggerHook: 0.5,
            })
                .setTween(tl_losange3_presentation)
                //.addIndicators({name: "losange 3 translate", indent: 300}) // add indicators (requires plugin)
                .addTo(controllerPresentationSection);

            //Geometric 4 Scene
            new ScrollMagic.Scene({
                triggerElement: "#presentation-section",
                duration: "100%",
                triggerHook: 0.5,
            })
                .setTween(tl_losange4_presentation)
                //.addIndicators({name: "losange 4 translate", indent: 500}) // add indicators (requires plugin)
                .addTo(controllerPresentationSection);
        }
        // END PRESENTATION BACKGROUND ELEMENTS ANIMATION

        /**
         * ANIMATION WRITING KEYWORD GUY
         *
         * @author Federico Borsoi
         * */

        var objets_anac1 = $("#items-anac1"),
            costume_anac1 = $("#costume-anac1"),
            avantbras_g_anac1 = $("#avantbras-g-anac1"),
            avantbras_d_anac1 = $("#avantbras-d-anac1"),
            bras_g_anac1 = $("#bras-g-anac1"),
            bras_d_anac1 = $("#bras-d-anac1"),
            bouche_anac1 = $('#bouche-anac1');

        var tl_anac1 = new TimelineMax;
        $('#corps-anac1, #jambes-anac1').hover(function(){
            TweenLite.set(this, {cursor: "pointer"});
        });

        $('#corps-anac1, #jambes-anac1').click(function () {
            tl_anac1.restart();
        });

        var comptxP = -600,
            comptxI = 500,
            comptx = comptxP,
            compty = 0,
            compteur = 0,
            quand = 0;

        tl_anac1.to(avantbras_g_anac1, 0.2, {rotation: 10, repeat: 55, yoyo: true, transformOrigin: "100% 0", ease: Power0.easeNone}, 0);
        tl_anac1.to(avantbras_d_anac1, 0.2, {rotation: -10, repeat: 55, yoyo: true, ease: Power0.easeNone}, 0.2);

        tl_anac1.to(bras_d_anac1, 0.5, {rotation: -5, transformOrigin: "50% 0"}, 2);
        tl_anac1.to(bras_g_anac1, 0.5, {rotation: 5}, 4);
        tl_anac1.to(bras_g_anac1, 0.5, {rotation: -5}, 7);
        tl_anac1.to(bras_d_anac1, 0.5, {rotation: 0, transformOrigin: "50% 0"}, 10);
        tl_anac1.to(bras_g_anac1, 0.5, {rotation: 0}, 11);

        tl_anac1.to(bras_d_anac1, 0.5, {rotation: -10, transformOrigin: "50% 0", y: 5}, 12.5);
        tl_anac1.to(bras_g_anac1, 0.5, {rotation: 10}, 12.5);
        tl_anac1.to(avantbras_d_anac1, 0.5, {rotation: 20, transformOrigin: "0 15%"}, 12.5);
        tl_anac1.to(avantbras_g_anac1, 0.5, {rotation: -20, transformOrigin: "90% 20%"}, 12.5);

        objets_anac1.children().each(function () {
            tl_anac1.to($(this), 3, {scale: 3, x: comptx, y: compty, opacity: 0}, quand);
            if (compteur % 2 == 0) {
                comptx = comptxP;
            } else {
                comptx = comptxI;
            }
            if (comptxP < 310) {
                comptxP += 32;
            }
            if (comptxI > -600) {
                comptxI -= 42;
            }

            if (compty > -500) {
                if (compteur >= 27) {
                    compty += 30;
                } else {
                    compty -= 30;
                }
            }
            quand += 0.2;
            compteur += 1;
        });

        objets_anac1.children().each(function () {
            tl_anac1.to($(this), 0.2, {opacity: 1}, 13);
            tl_anac1.to($(this), 0.5, {scale: 0, x: 70, y: -130}, 13);
        });
        tl_anac1.to(costume_anac1, 0.3, {opacity: 1}, 13.2);

        costume_anac1.children().each(function () {
            tl_anac1.from($(this), 1, {fill: "#8dbc1f"}, 13.2);
        });

        tl_anac1.from(bouche_anac1, 1, {x: 80, rotation: -80, transformOrigin: "100% 0%"});

        new ScrollMagic.Scene({
            triggerElement: "#presentation-section .picture",
            triggerHook: "0.5",
            reverse: false,
        })
            //.addIndicators({name: "Writing guy", indent: 300}) // add indicators (requires plugin)
            .addTo(controllerPresentationSection)
            .setTween(tl_anac1);


        /* ==========================================================================
         WELCOME PAGE - SECTION FORMATIONS
         ========================================================================== */
        /**
         * ANIMATION FORMATIONS WRITTING LETTERS
         *
         * @description Desktop : Write the content of the formation title on hover
         * Smaller devices : Write the content of the formation title on scroll
         *
         * @author Jeff Jardon
         * */

        //Declare Timelines
        var tl_writting_letters_formations_licence = new TimelineMax;
        var tl_writting_letters_formations_master1 = new TimelineMax;
        var tl_writting_letters_formations_master2 = new TimelineMax;

        //Find each html elements to animate
        var element = $('#formations-section').find('.formations');
        var writting_letters = element.find('span.writing-letter');

        writting_letters.each(function (index) {
            //Replace each characters with <span>character</span>
            $(this).html($(this).text().replace(/(\w)/g, "<span>$&</span>"));

            switch (index) {
                case 0 :
                    tl_writting_letters_formations_licence.staggerFrom($(this).find('span'), 0.1, {
                        autoAlpha: 0,
                        rotation: 90,
                        scale: 3,
                        display: "none",
                    }, 0.05);
                    tl_writting_letters_formations_licence.stop();
                    break;
                case 1 :
                    tl_writting_letters_formations_master1.staggerFrom($(this).find('span'), 0.1, {
                        autoAlpha: 0,
                        rotation: 90,
                        scale: 3,
                        display: "none",
                    }, 0.05);
                    tl_writting_letters_formations_master1.stop();
                    break;
                case 2 :
                    tl_writting_letters_formations_master2.staggerFrom($(this).find('span'), 0.1, {
                        autoAlpha: 0,
                        rotation: 90,
                        scale: 3,
                        display: "none",
                    }, 0.05);
                    tl_writting_letters_formations_master2.stop();
                    break;
            }
        });

        //Display the animation on mouse hover and mouse out on devices greater than 1024px
        if ($(window).width() > 1024) {
            element.find(".formation").mouseover(function () {
                switch ($(this).index()) {
                    case 0 :
                        //$(this).find("span.writing-letter > span").last().append("&nbsp;");
                        tl_writting_letters_formations_licence.play();
                        break;
                    case 1 :
                        tl_writting_letters_formations_master1.play();
                        break;
                    case 2 :
                        tl_writting_letters_formations_master2.play();
                        break;
                }
            })

            element.find(".formation").mouseout(function () {
                switch ($(this).index()) {
                    case 0 :
                        tl_writting_letters_formations_licence.reverse();
                        break;
                    case 1 :
                        tl_writting_letters_formations_master1.reverse();
                        break;
                    case 2 :
                        tl_writting_letters_formations_master2.reverse();
                        break;
                }
            })
            //Display the animation on scroll on devices lesser than 1024px
        } else {
            var Scroll_formations_section = new ScrollMagic.Controller();

            //Licence
            new ScrollMagic.Scene({
                triggerElement: '.formation:nth-of-type(1)',
                duration: '33%',
                triggerHook: 0.5,
            })
                .setClassToggle('.formation:nth-of-type(1) .filter', 'activeScroll')//Addclass to .navbar
                .setTween(tl_writting_letters_formations_licence.play())
                //.addIndicators({name: 'licence 3 anim', colorTrigger: 'red', indent: 200, colorStart: '#75CC395'})
                .addTo(Scroll_formations_section);


            //Master 1
            new ScrollMagic.Scene({
                triggerElement: '.formation:nth-of-type(2)',
                duration: '33%',
                triggerHook: 0.5,
            })
                .setClassToggle('.formation:nth-of-type(2) .filter', 'activeScroll')//Addclass to .navbar
                .setTween(tl_writting_letters_formations_master1.play())
                //.addIndicators({name: 'Master 1 anim', colorTrigger: 'red', indent: 200, colorStart: '#75CC395'})
                .addTo(Scroll_formations_section);


            //Master 2
            new ScrollMagic.Scene({
                triggerElement: '.formation:nth-of-type(3)',
                duration: '33%',
                triggerHook: 0.5,
            })
                .setClassToggle('.formation:nth-of-type(3) .filter', 'activeScroll')//Addclass to .navbar
                .setTween(tl_writting_letters_formations_master2.play())
                //.addIndicators({name: 'Master 2 anim', colorTrigger: 'red', indent: 200, colorStart: '#75CC395'})
                .addTo(Scroll_formations_section);
        }

        /* ==========================================================================
         WELCOME PAGE - SECTION PROJECTS
         ========================================================================== */
        /**
         * PROJECTS BACKGROUND ELEMENTS ANIMATION
         *
         * @description trigger a Scroll animation on background elements (losanges)
         * Only displayed on devices greater thant 768 width px (tablet landscape and more)
         * @author Jeff Jardon
         * */
        var controllerProjectsSection = new ScrollMagic.Controller();
        if ($(window).width() > 768) {
            // Declade timelines for each geometrics
            var tl_losange1_projects = new TimelineMax,
                tl_losange2_projects = new TimelineMax,
                tl_losange3_projects = new TimelineMax;


            //Find each geometrics elements in html
            var losange_projects_1 = $('#projects-section').find('.losange:nth-child(1)'),
                losange_projects_2 = $('#projects-section').find('.losange:nth-child(2)'),
                losange_projects_3 = $('#projects-section').find('.losange:nth-child(3)');

            //Set the animation they will execute
            tl_losange1_projects.to(losange_projects_1, 0.5, {top: "-100px", ease: Linear.easeNone});
            tl_losange2_projects.to(losange_projects_2, 0.5, {top: "700px", ease: Linear.easeNone});
            tl_losange3_projects.to(losange_projects_3, 0.5, {top: "200px", ease: Linear.easeNone});

            //Geometric 1 Scene
            new ScrollMagic.Scene({
                triggerElement: "#projects-section",
                duration: '400',
                triggerHook: 0.5,
            })
                .setTween(tl_losange1_projects)
                //.addIndicators({name: "losange 1 scale"}) // add indicators (requires plugin)
                .addTo(controllerProjectsSection);

            //Geometric 2 Scene
            new ScrollMagic.Scene({
                triggerElement: "#projects-section",
                duration: "100%",
                triggerHook: 0.5,
            })
                .setTween(tl_losange2_projects)
                //.addIndicators({name: "losange 2 translate", indent: 200}) // add indicators (requires plugin)
                .addTo(controllerProjectsSection);

            //Geometric 3 Scene
            new ScrollMagic.Scene({
                triggerElement: "#projects-section",
                duration: "100%",
                triggerHook: 0.5,
            })
                .setTween(tl_losange3_projects)
                //.addIndicators({name: "losange 3 translate", indent: 300}) // add indicators (requires plugin)
                .addTo(controllerProjectsSection);
        }
        // END PROJECTS BACKGROUND ELEMENTS ANIMATION

        /**
         * ANIMATION Project SVG
         *
         * @author Federico Borsoi
         * */
        var pointe_fusee = $('#tete-fusee-anac2'),
            corps_fusee = $('#corps-fusee-anac2'),
            moteur_fusee = $('#moteur-fusee-anac2'),
            pieds_fusee = $('#pieds-fusee-anac2'),
            feu_fusee = $('#feu-fusee-anac2'),
            fusee = $('#fusee-anac2'),
            p1_anac2 = $('#p1-anac2'),
            bras_p1_anac2 = $('#bras-p1-anac2'),
            bras_g_p1_anac2 = $('#avantbras-g-anac2'),
            bras_d_p1_anac2 = $('#avantbras-d-anac2'),
            p2_anac2 = $('#p2-anac2'),
            bras_d_p2_anac2 = $('#bras-d-p2-anac2'),
            bras_g_p2_anac2 = $('#bras-g-p2-anac2'),
            bras_g_mech = $('#bras-g-mech-anac2'),
            bras_d_mech = $('#bras-d-mech-anac2'),
            plateforme_anac2 = $('#plateforme-anac2'),
            p3_anac2 = $('#p3-anac2'),
            bras_p3_anac2 = $("#bras-p3-anac2"),
            wl1_anac2 = $('#wireless-1-anac2'),
            wl2_anac2 = $('#wireless-2-anac2'),
            wl3_anac2 = $('#wireless-3-anac2'),
            rect1_anac2 = $('#rect1-anac2'),
            rect2_anac2 = $('#rect2-anac2'),
            rect3_anac2 = $('#rect3-anac2'),
            etoiles_anac2 = $('#etoiles-anac2'),
            div_anac2 = $('#projects-section').find('.content'),
            textes_anac2 = $('#projects-section p');

        var fusee_tl = new TimelineMax();

        $('#projects-section .content .picture svg').hover(function(){
            TweenLite.set(this, {cursor: "pointer"});
        });

        $('#projects-section .content .picture svg ').click(function () {
            fusee_tl.restart();
        });

        fusee_tl.set(div_anac2, {border: 'solid 2px #e8e8e8'})
            .fromTo([pointe_fusee, p1_anac2, bras_p1_anac2], 1, {opacity: 0, y: -200}, {opacity: 1, y: -150})
            .to(bras_g_p1_anac2, 0.2, {rotation: 10, transformOrigin: "100% 0%", ease: Power1.easeOut}, 0.8)
            .to(bras_d_p1_anac2, 0.2, {rotation: -10, transformOrigin: "0% 10%", ease: Power1.easeOut}, 0.8)
            .to(pointe_fusee, 0.2, {y: -160}, 0.8)
            .to(bras_g_p1_anac2, 0.8, {rotation: -20, transformOrigin: "100% 0%", ease: Back.easeOut}, 1)
            .to(bras_d_p1_anac2, 0.8, {rotation: 20, transformOrigin: "0% 10%", ease: Back.easeOut}, 1)
            .to(pointe_fusee, 2, {y: 0, ease: Power4.easeOut}, 1)
            .to([p1_anac2, bras_p1_anac2], 1, {opacity: 0, y: -200}, 2)

            .from([corps_fusee, p2_anac2, bras_g_p2_anac2], 1, {opacity: 0, x: -50}, 1.5)
            .to([bras_g_p2_anac2, bras_d_p2_anac2], 1, {rotation: -8, transformOrigin: "0% 10%", ease: Power2.easeIn}, 2)
            .to([corps_fusee, pointe_fusee], 0.8, {y: -25, ease: Power2.easeIn}, 2.1)
            .to([bras_g_p2_anac2, bras_d_p2_anac2], 0.8, {rotation: 60, transformOrigin: "0% 10%", ease: Power4.easeOut}, 2.9)
            .to([corps_fusee, pointe_fusee], 1, {y: 300, ease: Power4.easeOut}, 3)
            .to([p2_anac2, bras_g_p2_anac2], 3, {y: -1200}, 3)
            .to([p2_anac2, bras_g_p2_anac2], 3, {opacity: 0}, 3.2)

            .to([corps_fusee, pointe_fusee], 2, {y: -400, ease: Power1.easeInOut}, 3.5)
            .to([corps_fusee, pointe_fusee], 2, {y: 0, ease: Power1.easeInOut}, 5.5)
            .from([plateforme_anac2, moteur_fusee, pieds_fusee, p3_anac2], 2, {opacity: 0, y: 250, ease: Power1.easeOut}, 6)
            .from(bras_g_mech, 3, {rotation: -20, ease: Power3.easeOut, transformOrigin: "50% 100%"}, 8)
            .from(bras_d_mech, 3, {rotation: 20, ease: Power3.easeOut, transformOrigin: "50% 100%"}, 8)

            .from(bras_p3_anac2, 0.2, {rotation: 20, transformOrigin: "90% 90%", yoyo: true, repeat: 7}, 10)
            .add(new TimelineMax({repeat: 2}).staggerFrom([wl1_anac2, wl2_anac2, wl3_anac2], 0.3, {opacity: 0}, 0.3), 11.6)
            .set([wl1_anac2, wl2_anac2, wl3_anac2], {opacity: 0}, 14.3)
            .staggerTo([rect1_anac2, rect2_anac2, rect3_anac2], 0.6, {fill: "#8dbc1f"}, 0.6, 12.2)
            .to([p3_anac2], 1, {opacity: 0, x: 50}, 15)

            .fromTo(feu_fusee, 0.4, {scale: 0, transformOrigin: "50%, 0%"}, {scale: 0.4, yoyo: true, repeat: 3}, 14.5)
            .to(fusee, 0.4, {y: -10, yoyo: true, repeat: 3}, 14.7)
            .to(feu_fusee, 2, {scale: 1}, 16.1)
            .to(feu_fusee, 0.2, {scale: 0.9, yoyo: true, repeat: -1, ease: Power0.easeNone}, 18.1)
            .to(bras_g_mech, 3, {rotation: -20, ease: Power3.easeOut, transformOrigin: "50% 100%"}, 16.6)
            .to(bras_d_mech, 3, {rotation: 20, ease: Power3.easeOut, transformOrigin: "50% 100%"}, 16.6)
            .to(fusee, 3, {y: -400, ease: Power2.easeIn}, 16.6)
            .to(fusee, 1, {rotation: 2, ease: Power0.easeNone}, 17.6)
            .to(fusee, 2, {x: 200}, 18.6)
            .to(fusee, 1, {rotation: 0, ease: Power0.easeNone}, 19.6)
            .to(plateforme_anac2, 2, {y: 300}, 17.1)
            .to(plateforme_anac2, 2, {opacity: 0}, 18.6)
            .to(fusee, 4, {y: -50}, 21.1)
            .to([div_anac2], 3, {backgroundColor: '#17232d', borderColor: '#34495e'}, 19.1)
            .to(textes_anac2, 3, {color: '#e8e8e8'}, 19.1)
            .from(etoiles_anac2, 4, {opacity: 0, y: "-50%", ease: Power0.easeNone}, 19.1)
            .to(etoiles_anac2, 4, {y: "50%", ease: Power0.easeNone, repeat: -1}, 23.1)
            .add(new TimelineMax({repeat: -1, repeatDelay: 3}).to(fusee, 0.2, {rotation: -1, yoyo: true, repeat: 1, ease: Power0.easeNone})
            .to(fusee, 0.2, {rotation: 1, yoyo: true, repeat: 1, ease: Power0.easeNone}).to(fusee, 0.2, {rotation: 1, yoyo: true, repeat: 1, ease: Power0.easeNone}, 3)
            .to(fusee, 0.2, {rotation: -1, yoyo: true, repeat: 1, ease: Power0.easeNone}))
        fusee_tl.timeScale(1.5);

        new ScrollMagic.Scene({
            triggerElement: "#projects-section .picture",
            triggerHook: "0.5",
            reverse: false,
        })
            //.addIndicators({name: "Rocket", indent: 800}) // add indicators (requires plugin)
            .addTo(controllerProjectsSection)
            .setTween(fusee_tl);

        /* ==========================================================================
         WELCOME PAGE - SECTION NEWS
         ========================================================================== */

        //See general.js

        /* ==========================================================================
         WELCOME PAGE - SECTION professional
         ========================================================================== */
        /**
         * professional BACKGROUND ELEMENTS ANIMATION
         *
         * @description trigger a Scroll animation on background elements (losanges)
         * Only displayed on devices greater thant 768 width px (tablet landscape and more)
         * @author Jeff Jardon
         * */
        var controllerProfessionalSection = new ScrollMagic.Controller();
        if ($(window).width() > 768) {
            // Declade timelines for each geometrics
            var tl_losange1_professional = new TimelineMax,
                tl_losange2_professional = new TimelineMax,
                tl_losange3_professional = new TimelineMax;


            //Find each geometrics elements in html
            var losange_professional_1 = $('#professional-section').find('.losange:nth-child(1)'),
                losange_professional_2 = $('#professional-section').find('.losange:nth-child(2)'),
                losange_professional_3 = $('#professional-section').find('.losange:nth-child(3)');

            //Set the animation they will execute
            tl_losange1_professional.to(losange_professional_1, 0.5, {top: "-100px", ease: Linear.easeNone});
            tl_losange2_professional.to(losange_professional_2, 0.5, {top: "200px", ease: Linear.easeNone});
            tl_losange3_professional.to(losange_professional_3, 0.5, {top: "60%", ease: Linear.easeNone});

            //Geometric 1 Scene
            new ScrollMagic.Scene({
                triggerElement: "#professional-section",
                duration: '400',
                triggerHook: 0.5,
            })
                .setTween(tl_losange1_professional)
                //.addIndicators({name: "losange 1 scale"}) // add indicators (requires plugin)
                .addTo(controllerProfessionalSection);

            //Geometric 2 Scene
            new ScrollMagic.Scene({
                triggerElement: "#professional-section",
                duration: "100%",
                triggerHook: 0.5,
            })
                .setTween(tl_losange2_professional)
                //.addIndicators({name: "losange 2 translate", indent: 200}) // add indicators (requires plugin)
                .addTo(controllerProfessionalSection);

            //Geometric 3 Scene
            new ScrollMagic.Scene({
                triggerElement: "#professional-section",
                duration: "100%",
                triggerHook: 0.5,
            })
                .setTween(tl_losange3_professional)
                //.addIndicators({name: "losange 3 translate", indent: 300}) // add indicators (requires plugin)
                .addTo(controllerProfessionalSection);
        }
        // END professional BACKGROUND ELEMENTS ANIMATION

        //START PROFESSIONAL ANIMATION SVG
        var anac3_1 = $('#anac3-1'),
            anac3_2 = $('#anac3-2'),
            anac3_3 = $('#anac3-3'),
            balle_jeff = $('#balle-jeff-anac3'),
            jeff_anac3 = $('#jeff-anac3'),
            fede_anac3 = $('#fede-anac3'),
            al_anac3 = $('#al-anac3'),
            balle_al = $('#balle-al-anac3'),
            balle_fede = $('#balle-fede-anac3'),
            cylindres_anac3 = $('.cylindre_anac3'),
            bague1_anac3 = $('#bague1-anac3'),
            bague2_anac3 = $('#bague2-anac3'),
            top_decl_anac3 = $('#top-decl-anac3'),
            bague_dev_anac3 = $('#bague-dev-anac3'),
            bague_com_anac3 = $('#bague-com-anac3'),
            bague_gestion_anac3 = $('#bague-gestion-anac3'),
            barre_d_anac3 = $('#barre-d-anac3'),
            barre_g_anac3 = $('#barre-g-anac3'),
            pro_anac3 = $('#pro-anac3'),
            lum_anac3 = $('#lum-anac3 circle')
            ;

        var anac3_tl = new TimelineMax({repeat: -1});

        anac3_tl.to(pro_anac3, 0.1, {opacity: 0})
            .set(pro_anac3, {opacity: 0})
            .set(lum_anac3, {fill: '#17232d'})
            .set(anac3_1, {opacity: 1})
            .set(anac3_2, {opacity: 0})
            .set(anac3_3, {opacity: 0})
            .from(balle_jeff, 1, {y: -1000, opacity: 0, ease: Bounce.easeOut})
            .to(balle_jeff, 1, {y: 180, ease: Bounce.easeOut}, 0.7)
            .to(jeff_anac3, 1, {y: "20%"}, 0.7)
            .to(bague1_anac3, 1, {y: 10, ease: Power0.easeOut}, 1.7)
            .to(bague2_anac3, 1, {y: 20, ease: Power0.easeOut}, 1.7)
            .to(top_decl_anac3, 1, {y: 30, ease: Power0.easeOut}, 1.7)
            .to(balle_jeff, 1, {y: 230, scale: 1.1, transformOrigin: "50% 50%", ease: Power0.easeOut}, 1.7)
            .to(jeff_anac3, 1, {y: "130%"}, 1.7)
            .to(balle_jeff, 0.5, {y: -300, scale: 0.6, transformOrigin: "50% 50%", ease: Power2.easeOut}, 3)
            .to([bague1_anac3, bague2_anac3, top_decl_anac3], 0.5, {y: 0, ease: Elastic.easeOut}, 3)
            .to(jeff_anac3, 0.3, {y: "-130%", ease: Power0.easeOut, repeat: 1}, 3)
            .from(barre_d_anac3, 0.5, {x: 500}, 3)
            .from(barre_g_anac3, 0.5, {x: -500}, 3)
            .to(barre_d_anac3, 0.5, {rotation: -8, transformOrigin: "100% 100%"}, 3.5)
            .set(jeff_anac3, {y: "130%"}, 3.5)
            .to(jeff_anac3, 0.3, {y: "80%", ease: Power0.easeOut}, 3.5)
            .to(jeff_anac3, 0.3, {y: "130%", ease: Power1.easeIn}, 3.8)
            .set(jeff_anac3, {y: "-130%"}, 4.1)
            .to(balle_jeff, 1, {y: 20, scale: 1.1, transformOrigin: "50% 50%", ease: Power1.easeIn}, 4.1)
            .to(jeff_anac3, 0.5, {y: "130%", ease: Power1.easeIn, repeat: 1}, 4.1)
            .to(barre_d_anac3, 0.3, {rotation: 18, transformOrigin: "100% 100%", ease: Back.easeOut}, 5.1)
            .to(balle_jeff, 3, {
                bezier: {
                    type: 'soft',
                    values: [
                        {x: -140, y: -380, scale: 0.4, transformOrigin: "50% 50%"}, {
                        x: -400,
                        y: -1300,
                        scale: 0.3,
                        transformOrigin: "50% 50%",
                    },
                        {x: -500, y: -450, scale: 0, transformOrigin: "50% 50%"}],
                }, ease: Circ.easeOut,
            }, 5.1)
            .set(jeff_anac3, {x: "130%", y: "130%"}, 5.1)
            .to(jeff_anac3, 0.3, {x: "-110%", y: "-130%", repeat: 5}, 5.1)
            .to(barre_d_anac3, 0.5, {rotation: 0, transformOrigin: "100% 100%"}, 6)
            .to(barre_d_anac3, 1, {x: 500}, 6.5)
            .to(barre_g_anac3, 1, {x: -500}, 6.5)
            .fromTo(bague_dev_anac3, 0.5, {scale: 0, transformOrigin: "50% 50%"}, {
                scale: 1.5,
                opacity: 0,
                transformOrigin: "50% 50%",
            }, 6.5)
            .to(pro_anac3, 0.2, {opacity: 1, yoyo: true, repeat: 6, repeatDelay: 0.2}, 6.5)
            .to(lum_anac3, 0.2, {fill: '#8dbc1f', yoyo: true, repeat: 6, repeatDelay: 0.2}, 6.5)
            .from(cylindres_anac3, 0.1, {opacity: 0}, 6)
            .set([cylindres_anac3, balle_jeff], {opacity: 0}, 7)

            .set(pro_anac3, {opacity: 0}, 10)
            .set(lum_anac3, {fill: '#17232d'}, 10)
            .set(anac3_1, {opacity: 0}, 10)
            .set(anac3_2, {opacity: 1}, 10)
            .from(balle_fede, 1, {y: -1000, opacity: 0, ease: Bounce.easeOut}, 10)
            .to(balle_fede, 1, {y: 180, ease: Bounce.easeOut}, 10.7)
            .to(fede_anac3, 1, {y: "20%"}, 10.7)
            .to(bague1_anac3, 1, {y: 10, ease: Power0.easeOut}, 11.7)
            .to(bague2_anac3, 1, {y: 20, ease: Power0.easeOut}, 11.7)
            .to(top_decl_anac3, 1, {y: 30, ease: Power0.easeOut}, 11.7)
            .to(balle_fede, 1, {y: 230, scale: 1.1, transformOrigin: "50% 50%", ease: Power0.easeOut}, 11.7)
            .to(fede_anac3, 1, {y: "130%"}, 11.7)
            .to(balle_fede, 0.5, {y: -300, scale: 0.6, transformOrigin: "50% 50%", ease: Power2.easeOut}, 13)
            .to([bague1_anac3, bague2_anac3, top_decl_anac3], 0.5, {y: 0, ease: Elastic.easeOut}, 13)
            .to(fede_anac3, 0.3, {y: "-130%", ease: Power0.easeOut, repeat: 1}, 13)
            .to(barre_d_anac3, 0.5, {x: 0}, 13)
            .to(barre_g_anac3, 0.5, {x: 0}, 13)
            .to(barre_g_anac3, 0.5, {rotation: 8, transformOrigin: "0% 100%"}, 13.5)
            .set(fede_anac3, {y: "130%"}, 13.5)
            .to(fede_anac3, 0.3, {y: "80%", ease: Power0.easeOut}, 13.5)
            .to(fede_anac3, 0.3, {y: "130%", ease: Power1.easeIn}, 13.8)
            .set(fede_anac3, {y: "-130%"}, 14.1)
            .to(balle_fede, 1, {y: 20, scale: 1.1, transformOrigin: "50% 50%", ease: Power1.easeIn}, 14.1)
            .to(fede_anac3, 0.5, {y: "130%", ease: Power1.easeIn, repeat: 1}, 14.1)
            .to(barre_g_anac3, 0.3, {rotation: -18, transformOrigin: "0% 100%", ease: Back.easeOut}, 15.1)
            .to(balle_fede, 3, {
                bezier: {
                    type: 'soft',
                    values: [{x: 140, y: -380, scale: 0.4, transformOrigin: "50% 50%"}, {
                        x: 400,
                        y: -1300,
                        scale: 0.3,
                        transformOrigin: "50% 50%",
                    }, {x: 500, y: -450, scale: 0, transformOrigin: "50% 50%"}],
                }, ease: Circ.easeOut,
            }, 15.1)
            .set(fede_anac3, {x: "130%", y: "130%"}, 15.1)
            .to(fede_anac3, 0.3, {x: "110%", y: "-130%", repeat: 5}, 15.1)
            .to(barre_g_anac3, 0.5, {rotation: 0, transformOrigin: "0% 100%"}, 16)
            .to(barre_d_anac3, 1, {x: 500}, 16.5)
            .to(barre_g_anac3, 1, {x: -500}, 16.5)
            .fromTo(bague_com_anac3, 0.5, {scale: 0, transformOrigin: "50% 50%"}, {
                scale: 1.5,
                opacity: 0,
                transformOrigin: "50% 50%",
            }, 16.5)
            .to(pro_anac3, 0.2, {opacity: 1, yoyo: true, repeat: 6, repeatDelay: 0.2}, 16.5)
            .to(lum_anac3, 0.2, {fill: '#8dbc1f', yoyo: true, repeat: 6, repeatDelay: 0.2}, 16.5)
            .to(cylindres_anac3, 0.1, {opacity: 1}, 15)
            .set([cylindres_anac3, balle_fede], {opacity: 0}, 17)

            .set(pro_anac3, {opacity: 0}, 20)
            .set(lum_anac3, {fill: '#17232d'}, 20)
            .set(anac3_2, {opacity: 0}, 20)
            .set(anac3_3, {opacity: 1}, 20)
            .from(balle_al, 1, {y: -1000, opacity: 0, ease: Bounce.easeOut}, 20)
            .to(balle_al, 1, {y: 180, ease: Bounce.easeOut}, 20.7)
            .to(al_anac3, 1, {y: "20%"}, 20.7)
            .to(bague1_anac3, 1, {y: 10, ease: Power0.easeOut}, 21.7)
            .to(bague2_anac3, 1, {y: 20, ease: Power0.easeOut}, 21.7)
            .to(top_decl_anac3, 1, {y: 30, ease: Power0.easeOut}, 21.7)
            .to(balle_al, 1, {y: 230, scale: 1.1, transformOrigin: "50% 50%", ease: Power0.easeOut}, 21.7)
            .to(al_anac3, 1, {y: "130%"}, 21.7)
            .to(balle_al, 0.5, {y: -300, scale: 0.6, transformOrigin: "50% 50%", ease: Power2.easeOut}, 23)
            .to([bague1_anac3, bague2_anac3, top_decl_anac3], 0.5, {y: 0, ease: Elastic.easeOut}, 23)
            .to(al_anac3, 0.3, {y: "-130%", ease: Power0.easeOut, repeat: 1}, 23)
            .to(barre_d_anac3, 0.5, {x: 0}, 23)
            .to(barre_g_anac3, 0.5, {x: 0}, 23)
            .to(barre_d_anac3, 0.5, {rotation: -8, transformOrigin: "100% 100%"}, 23.5)
            .to(barre_g_anac3, 0.5, {rotation: 8, transformOrigin: "0% 100%"}, 23.5)
            .set(al_anac3, {y: "130%"}, 23.5)
            .to(al_anac3, 0.3, {y: "80%", ease: Power0.easeOut}, 23.5)
            .to(al_anac3, 0.3, {y: "130%", ease: Power1.easeIn}, 23.8)
            .set(al_anac3, {y: "-130%"}, 24.1)
            .to(balle_al, 1, {y: 20, scale: 1.1, transformOrigin: "50% 50%", ease: Power1.easeIn}, 24.1)
            .to(al_anac3, 0.5, {y: "130%", ease: Power1.easeIn, repeat: 1}, 24.1)
            .to(barre_g_anac3, 0.3, {rotation: -18, transformOrigin: "0% 100%", ease: Back.easeOut}, 25.1)
            .to(barre_d_anac3, 0.3, {rotation: 18, transformOrigin: "100% 100%", ease: Back.easeOut}, 25.1)
            .to(balle_al, 3, {
                bezier: {
                    type: 'soft',
                    values: [{y: -380, scale: 0.4, transformOrigin: "50% 50%"}, {
                        y: -1300,
                        scale: 0.3,
                        transformOrigin: "50% 50%",
                    }, {y: -450, scale: 0, transformOrigin: "50% 50%"}],
                }, ease: Circ.easeOut,
            }, 25.1)
            .set(al_anac3, {x: "130%", y: "130%"}, 25.1)
            .to(al_anac3, 0.3, {y: "-130%", repeat: 5}, 25.1)
            .to(barre_g_anac3, 0.5, {rotation: 0, transformOrigin: "0% 100%"}, 26)
            .to(barre_d_anac3, 0.5, {rotation: 0, transformOrigin: "100% 100%"}, 26)
            .to(barre_d_anac3, 1, {x: 500}, 26.5)
            .to(barre_g_anac3, 1, {x: -500}, 26.5)
            .fromTo(bague_gestion_anac3, 0.5, {scale: 0, transformOrigin: "50% 50%"}, {
                scale: 1.5,
                opacity: 0,
                transformOrigin: "50% 50%",
            }, 26.5)
            .to(pro_anac3, 0.2, {opacity: 1, yoyo: true, repeat: 6, repeatDelay: 0.2}, 26.5)
            .to(lum_anac3, 0.2, {fill: '#8dbc1f', yoyo: true, repeat: 6, repeatDelay: 0.2}, 26.5)
            .to(cylindres_anac3, 0.1, {opacity: 1}, 26.2)
            .set([cylindres_anac3, balle_al], {opacity: 0}, 27)

        anac3_tl.timeScale(2);

        new ScrollMagic.Scene({
            triggerElement: "#professional-section #",
            triggerHook: "0.5",
            reverse: false,
        })
            //.addIndicators({name: "Professional", indent: 600}) // add indicators (requires plugin)
            .addTo(controllerProfessionalSection)
            .setTween(anac3_tl);
    },
};
