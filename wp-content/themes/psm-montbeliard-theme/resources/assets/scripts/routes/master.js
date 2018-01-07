/* eslint-disable no-undef */
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';

export default {
    init() {

    },
    finalize() {
        /**
         * ANIMATION N°1 M1 NAV
         *
         * @description: Trigger the svg animation of the presentation section of master 1 SECTION
         *
         * @author Federico Borsoi
         */

        var finger1_anmas1 = $('#finger1-anmas1'),
                finger2_anmas1 = $('#finger2-anmas1'),
                finger3_anmas1 = $('#finger3-anmas1'),
                button_anmas1 = $('#button-anmas1'),
                ecr_anmas1 = $('#ecr-anmas1'),
                ecr_ver_anmas1 = $('#ecr-verrouille-anmas1'),
                heure_anmas1 = $('#heure-anmas1'),
                deuxpoints_anmas1 = $('#deuxpoints-anmas1'),
                fleche_anmas1 = $('#fleche-anmas1'),
                deverrouiller_anmas1 = $('#deverrouiller-anmas1 path'),
                bleu_rect_anmas1 = $('#bleu-rect-anmas1'),
                vert_rect_anmas1 = $('#vert-rect-anmas1'),
                blanc_rect_anmas1 = $('#blanc-rect-anmas1'),
                ecrAccueil_anmas1 = $('#ecrAccueil-anmas1'),
                anc_anmas1 = $('#anc-anmas1'),
                prog_anmas1 = $('#prog-anmas1'),
                rhiz_anmas1 = $('#rhizome-anmas1'),
                app_anc_anmas1 = $('#app-anc-anmas1'),
                app_prog_anmas1 = $('#app-prog-anmas1'),
                app_rhiz_anmas1 = $('#app-rhizome-anmas1'),
                title_m1_anmas1 = $('#title-m1-anmas1'),
                heure_ecr_anmas1 = $('#heure_ecr_anmas1'),
                head1_anmas1 = $('#head1-anmas1'),
                head3_anmas1 = $('#head3-anmas1')

        TweenMax.from(finger1_anmas1, 2, {x: "100", repeat: -1, ease: Power4.easeOut});
        TweenMax.fromTo(finger2_anmas1, 2, {x: "300", repeat: -1, ease: Power4.easeInOut}, {
            x: "-100",
            repeat: -1,
            ease: Power4.easeInOut,
        });

        TweenMax.to(fleche_anmas1, 2, {x: "-100", repeat: -1, ease: Power1.easeInOut});
        TweenMax.from(deuxpoints_anmas1, 0.4, {opacity: 0, repeat: -1, ease: Power0.easeNone, repeatDelay: 0.6})
        var tl_dev_anmas1 = new TimelineMax({repeat: -1, timeScale: 0.5})
        tl_dev_anmas1.staggerTo(deverrouiller_anmas1, 0.05, {fill: '#e8e8e8'}, -0.05)
        .staggerTo(deverrouiller_anmas1, 0.05, {fill: '#ffffff'}, -0.05, 0.5);

        TweenLite.set([ecr_anmas1, ecr_ver_anmas1, finger2_anmas1, finger3_anmas1], {opacity: 0});

        var ecrActif = false;

        //Timeline pour l'apparition des apps
        var ecr_apparait = new TimelineMax();

        ecr_apparait.staggerFrom([anc_anmas1, rhiz_anmas1, prog_anmas1], 0.5, {
            scale: 0,
            opacity: 0,
            transformOrigin: "center",
        }, 0.1)
        .from([title_m1_anmas1, head1_anmas1, heure_ecr_anmas1, head3_anmas1], 1, {opacity: 0}, 0.3);

        //timeline pour le finger3
        var finger3_tl = new TimelineMax({repeat: -1, repeatDelay: 2});

        finger3_tl.to(finger3_anmas1, 0.5, {x: 150})
        .to(finger3_anmas1, 0.2, {y: -100, scale: 0.9, transformOrigin: "center", repeat: 1, yoyo: true})
        .to(finger3_anmas1, 0.5, {x: 500}, 1.5)
        .to(finger3_anmas1, 0.2, {y: -100, scale: 0.9, transformOrigin: "center", repeat: 1, yoyo: true})
        .to(finger3_anmas1, 0.5, {x: 850}, 2.8)
        .to(finger3_anmas1, 0.2, {y: -100, scale: 0.9, transformOrigin: "center", repeat: 1, yoyo: true})
        .to(finger3_anmas1, 0.5, {x: 0}, 4.2);

        //fonctions pour gérer le bouton
        button_anmas1.hover(function () {
            TweenLite.set(button_anmas1, {cursor: "pointer"});
            TweenLite.to(button_anmas1, 0.3, {scale: 1.05, transformOrigin: "center"});
            TweenLite.to(finger1_anmas1, 0.3, {opacity: 0});
        }, function () {
            TweenLite.to(button_anmas1, 0.3, {scale: 1, transformOrigin: "center"});
            TweenLite.to(finger1_anmas1, 0.3, {opacity: 1});
        })
        button_anmas1.mousedown(function () {
            TweenLite.set(button_anmas1, {scale: 0.9, transformOrigin: "center"});
        })
        button_anmas1.mouseup(function () {
            TweenLite.set(button_anmas1, {scale: 1.05, transformOrigin: "center"});
            TweenLite.to([ecr_ver_anmas1, finger2_anmas1], 0.5, {opacity: 1});
            finger1_anmas1.hide();
        })
        button_anmas1.click(function () {
            new Draggable(ecrAccueil_anmas1, {
                type: "x",
                lockAxis: true,
                onDragStart: dragaccStart,
                onDragEnd: dragaccEnd,
                bounds: {top: 0, left: 0, width: 10, height: 0},
            });
            ecr_apparait.reverse();
            TweenLite.to(ecrAccueil_anmas1, 0.5, {x: "0%"});
            TweenLite.to(finger2_anmas1, 1, {opacity: 1});
            TweenLite.to(finger3_anmas1, 1, {opacity: 0});
            ecrActif = false;
        })

        //fonctions pour gérer la parallaxe des losanges
        var newXv = 0;
        var entree = true;

        vert_rect_anmas1.mousemove(function () {
            TweenLite.to(vert_rect_anmas1, 0.5, {x: newXv});
            if (entree) {
                newXv += 10;
                entree = false;
            } else {
                newXv -= 10;
                entree = true;
            }
        })

        bleu_rect_anmas1.mousemove(function () {
            TweenLite.to(bleu_rect_anmas1, 0.5, {x: newXv});
            if (entree) {
                newXv += 5;
                entree = false;
            } else {
                newXv -= 5;
                entree = true;
            }
        })

        blanc_rect_anmas1.mousemove(function () {
            TweenLite.to(blanc_rect_anmas1, 0.5, {x: newXv});
            if (entree) {
                newXv += 2;
                entree = false;
            } else {
                newXv -= 2;
                entree = true;
            }
        })

        //fonction pour gérer le déverrouillage
        function dragaccStart() {
            TweenLite.to(ecr_anmas1, 0.5, {opacity: 1});
            TweenLite.to(finger2_anmas1, 0.5, {opacity: 0});
            ecr_apparait.restart();
        }

        function dragaccEnd() {
            TweenLite.to(ecrAccueil_anmas1, 0.5, {x: "-100%"});
            TweenLite.to(finger3_anmas1, 2, {opacity: 1});
            ecrActif = true;
        }


        ecr_anmas1.hover(function () {
            TweenLite.to(finger3_anmas1, 0.5, {opacity: 0});
        }, function () {
            if (ecrActif) {
                TweenLite.to(finger3_anmas1, 0.5, {opacity: 1});
            }
        });

        //fonctions pour le hover des applications
        app_anc_anmas1.hover(scaleUp, scaleDown);
        app_prog_anmas1.hover(scaleUp, scaleDown);
        app_rhiz_anmas1.hover(scaleUp, scaleDown);

        //fonctions pour le click sur les app
        app_anc_anmas1.click(function () {
            if($(window).width() > 992){
                TweenLite.to(window, 1.5, {scrollTo: {y:".psm-formations-testimony-section", offsetY:99}});
            }else{
                TweenLite.to(window, 1.5, {scrollTo: ".psm-formations-testimony-section"});
            }
        });
        app_prog_anmas1.click(function () {
            if($(window).width() > 992){
                TweenLite.to(window, 0.5, {scrollTo: {y:"#master-1 .psm-formations-programme-section", offsetY:99}});
            }else{
                TweenLite.to(window, 0.5, {scrollTo: "#master-1.psm-formations-programme-section"});
            }
        })
        app_rhiz_anmas1.click(function () {
            if($(window).width() > 992){
                TweenLite.to(window, 1, {scrollTo: {y:".psm-formations-project-section", offsetY:99}});
            }else{
                TweenLite.to(window, 1, {scrollTo: ".psm-formations-project-section"});
            }
        })


        new ScrollMagic.Scene({
            triggerElement: ".psm-formations-presentation-section .picture",
            triggerHook: "0.5",
        })
        .addIndicators({name: "Augmented reality guy", indent: 300}) // add indicators (requires plugin)
        .addTo(controllerPresentationMaster2Section)
        .setTween(password_tl);

        /**
         * ANIMATION N°2 M1 PROJETS RHIZOMES
         *
         * @description: Animation of rhizome projects of master 1 SECTION
         *
         * @author Federico Borsoi
         */
        var controllerProjetRhizomeMaster1Section = new ScrollMagic.Controller();

        var clip_anmas2 = $('#clip-anmas2'),
                rhizome_anmas2 = $('#rhizome-anmas2'),
                mac_anmas2 = $('#mac-anmas2'),
                desktop_anmas2 = $('#desktop-anmas2'),
                iphone_anmas2 = $('#iphone-anmas2'),
                ipad_anmas2 = $('#ipad-anmas2'),
                moulin_anmas2 = $('#moulin-anmas2'),
                clouds_anmas2 = $('#clouds-anmas2'),
                sunshine_anmas2 = $('#sunshine-anmas2'),
                ventre_taupe_anmas2 = $('#ventre-taupe-anmas2'),
                day1_anmas2 = $('#day1-anmas2'),
                day2_anmas2 = $('#day2-anmas2'),
                day3_anmas2 = $('#day3-anmas2'),
                day4_anmas2 = $('#day4-anmas2'),
                day5_anmas2 = $('#day5-anmas2'),
                day6_anmas2 = $('#day6-anmas2'),
                day7_anmas2 = $('#day7-anmas2'),
                day8_anmas2 = $('#day8-anmas2'),
                leftLeaves_anmas2 = $('#left-leaves-anmas2'),
                rightLeaves_anmas2 = $('#right-leaves-anmas2'),
                tige_anmas2 = $('#tige-anmas2'),
                graine_anmas2 = $('#seed-anmas2'),
                herbe_day6 = $('#herbe-day6'),
                herbe_day7 = $('#herbe-day7'),
                herbe_day8 = $('#herbe-day8');

        var anmas2_tl = new TimelineMax();
        var anmas2_screen_tl = new TimelineMax({repeat: -1});

        anmas2_screen_tl.to(moulin_anmas2, 5, {
            rotation: 360,
            transformOrigin: 'center',
            repeat: 2,
            ease: Power0.easeNone,
        })
        .to(sunshine_anmas2, 1, {
            scale: 1.2,
            repeat: 13,
            yoyo: true,
            transformOrigin: 'center',
            ease: Power0.easeNone,
        }, 0)
        .to(ventre_taupe_anmas2, 1.5, {
            scale: 1.15,
            repeat: 8,
            yoyo: true,
            transformOrigin: 'bottom',
            ease: Power1.easeInOut,
        }, 0)
        .from(graine_anmas2, 1, {y: -300, ease: Power3.easeIn}, 0)
        .from(tige_anmas2, 1, {scaleY: 0, transformOrigin: 'bottom'}, 2)
        .from(leftLeaves_anmas2, 1, {x: "100%", scale: 0, transformOrigin: 'bottom-right'}, 3)
        .from(rightLeaves_anmas2, 1, {x: "-100%", scale: 0, transformOrigin: 'bottom-left'}, 4)
        .to(day1_anmas2, 0.1, {opacity: 0}, 6.1)
        .from(day2_anmas2, 0.1, {opacity: 0}, 6)
        .to(day2_anmas2, 0.1, {opacity: 0}, 7.1)
        .from(day3_anmas2, 0.1, {opacity: 0}, 7)
        .to(day3_anmas2, 0.1, {opacity: 0}, 8.1)
        .from(day4_anmas2, 0.1, {opacity: 0}, 8)
        .to(day4_anmas2, 0.1, {opacity: 0}, 9.1)
        .from(day5_anmas2, 0.1, {opacity: 0}, 9)
        .to(day5_anmas2, 0.1, {opacity: 0}, 10.1)
        .from(herbe_day6, 0.2, {y: "100%"}, 10)
        .from(day6_anmas2, 0.1, {opacity: 0}, 10)
        .to(day6_anmas2, 0.1, {opacity: 0}, 11.1)
        .from(herbe_day7, 0.2, {y: "100%"}, 11)
        .from(day7_anmas2, 0.1, {opacity: 0}, 11)
        .to(day7_anmas2, 0.1, {opacity: 0}, 12.1)
        .from(herbe_day8, 0.2, {y: "100%"}, 12)
        .from(day8_anmas2, 0.1, {opacity: 0}, 12)


        //apparition logo rhizome
        anmas2_tl.fromTo(rhizome_anmas2, 1, {opacity: 0, scale: 2, transformOrigin: 'center'}, {
            opacity: 1,
            scale: 4,
            transformOrigin: 'center',
        })
        .from(rhizome_anmas2, 1, {x: "330%", y: "130%"}, 2)
        .to(rhizome_anmas2, 1, {scale: 1}, 2)
        //apparition devices
        .from(desktop_anmas2, 1, {opacity: 0, x: "100%"}, 3)
        .from(iphone_anmas2, 1, {opacity: 0, x: "-100%"}, 3)
        .from(mac_anmas2, 1, {opacity: 0, y: "100%"}, 3)
        .from(ipad_anmas2, 1, {opacity: 0, y: "-100%"}, 3)
        //allume écran
        .from(clip_anmas2, 1, {opacity: 0}, 5)
        .fromTo(clouds_anmas2, 50, {x: "-80%", ease: Power0.easeNone, repeat: -1}, {
            x: "100%",
            ease: Power0.easeNone,
            repeat: -1,
        }, 5)
        .add(anmas2_screen_tl, 5);

        new ScrollMagic.Scene({
            triggerElement: "#master-1 .psm-formations-project-section .picture",
            triggerHook: "0.5",
        })
        .addIndicators({name: "Rhizome animation", indent: 150}) // add indicators (requires plugin)
        .addTo(controllerProjetRhizomeMaster1Section)
        .setTween(anmas2_tl);


        /**
         * ANIMATION N°1 M2 NAV
         *
         * @description: Trigger the svg animation of the presentation section of master 2 SECTION
         *
         * @author Federico Borsoi
         */


        var controllerPresentationMaster2Section = new ScrollMagic.Controller();

        var phone_anmas3 = $('#phone-anmas3'),
                screen_anmas3 = $('#screen-anmas3'),
                clipper_anmas3 = $('#clipper-anmas3'),
                password_screen_anmas3 = $('#password-screen-anmas3'),
                header_anmas3 = $('#header-anmas3'),
                desktop_anmas3 = $('#desktop-anmas3'),
                icones_anmas3 = $('#icones-anmas3'),
                type_cursor_anmas3 = $('#type-cursor-anmas3'),
                mdp_anmas3 = $('#mdp-anmas3 circle'),
                saisiemdp_anmas3 = $('#saisiemdp-anmas3'),
                chargement_anmas3 = $('#chargement-anmas3 path'),
                go_anmas3 = $('#go-anmas3 path'),
                ico_prog_anmas3 = $('#ico-prog-anmas3'),
                ico_proj_anmas3 = $('#ico-proj-anmas3'),
                ico_anc_anmas3 = $('#ico-anc-anmas3'),
                app_anc_anmas3 = $('#app-anc-anmas3'),
                app_prog_anmas3 = $('#app-prog-anmas3'),
                app_pfe_anmas3 = $('#app-pfe-anmas3'),
                heure_anmas3 = $('#heure-anmas3'),
                heure2_anmas3 = $('#heure2-anmas3');

        var myPhone_anmas3 = [phone_anmas3, screen_anmas3, clipper_anmas3];
        var allscreens_anmas3 = [password_screen_anmas3, header_anmas3, desktop_anmas3, icones_anmas3];
        var password_tl = new TimelineLite;
        var follow = false;

        $('.choose-training').click(function () {
            password_tl.time(0);
        });

        screen_anmas3.css("pointer-events", "none");

        TweenMax.from(type_cursor_anmas3, 0.5, {opacity: 0, repeat: -1, repeatDelay: 0.5, ease: Power0.easeNone});
        TweenLite.set(screen_anmas3, {y: -1});
        password_tl.set(allscreens_anmas3, {opacity: 0})
        .to(password_screen_anmas3, 2, {opacity: 1})
        .set(allscreens_anmas3, {opacity: 1})
        .set(saisiemdp_anmas3, {opacity: 0}, 2)
        .staggerFrom(mdp_anmas3, 0.01, {opacity: 0, ease: Power0.easeNone}, 0.1)
        .to(type_cursor_anmas3, 0.01, {x: 25, ease: Power0.easeNone}, 2)
        .to(type_cursor_anmas3, 0.01, {x: 50, ease: Power0.easeNone}, 2.1)
        .to(type_cursor_anmas3, 0.01, {x: 75, ease: Power0.easeNone}, 2.2)
        .to(type_cursor_anmas3, 0.01, {x: 100, ease: Power0.easeNone}, 2.3)
        .to(type_cursor_anmas3, 0.01, {x: 125, ease: Power0.easeNone}, 2.4)
        .to(type_cursor_anmas3, 0.01, {x: 150, ease: Power0.easeNone}, 2.5)
        .to(type_cursor_anmas3, 0.01, {x: 175, ease: Power0.easeNone}, 2.6)
        .to(type_cursor_anmas3, 0.01, {x: 200, ease: Power0.easeNone}, 2.7)
        .to(type_cursor_anmas3, 0.01, {x: 225, ease: Power0.easeNone}, 2.8)
        .to([mdp_anmas3, go_anmas3], 0.1, {fill: "#bbbbbb"}, 3)
        .to(type_cursor_anmas3, 0.01, {scale: 0, ease: Power0.easeNone}, 3)
        .from(chargement_anmas3, 0.5, {opacity: 0}, 3)
        .add(
                new TimelineMax({repeat: -1, repeatDelay: -0.2}).staggerTo(chargement_anmas3, 0.2, {
                    fill: '#eeeeee',
                    yoyo: true,
                    repeat: 1,
                    ease: Power0.easeNone,
                }, -0.1)
        )
        .to(password_screen_anmas3, 0.5, {opacity: 0, onComplete: chargementtermine}, 5)
        .set(password_screen_anmas3, {scale: 0})
        .from([$('#screen-anmas3 path'), $('#screen-anmas3 rect'), $('#screen-anmas3 text'), $('#screen-anmas3 tspan')], 0.5, {
            fill: '#000000',
            opacity: 1,
        })

        function chargementtermine() {
            follow = true;
        }

        // Find your root SVG element
        var svg = document.querySelector('#svg-anmas3');

        // Create an SVGPoint for future math
        var pt = svg.createSVGPoint();

        // Get point in global SVG space
        function cursorPoint(evt) {
            pt.x = evt.clientX;
            pt.y = evt.clientY;
            return pt.matrixTransform(svg.getScreenCTM().inverse());
        }

        svg.addEventListener('mousemove', function (evt) {
            var loc = cursorPoint(evt);
            if (follow) {
                if (loc.x > 190 && loc.x < 1740) {
                    TweenLite.to(myPhone_anmas3, 0.1, {
                        x: loc.x - 1750,
                    });
                }
                if (loc.y > 249 && loc.y < 846) {
                    TweenLite.to(myPhone_anmas3, 0.1, {
                        y: loc.y - 700,
                    });
                }
            }
        }, false);


        ico_prog_anmas3.click(function () {
            TweenLite.to(myPhone_anmas3, 0.2, {x: -1280, y: -300})
        })
        ico_proj_anmas3.click(function () {
            TweenLite.to(myPhone_anmas3, 0.2, {x: -800, y: -300})
        })
        ico_anc_anmas3.click(function () {
            TweenLite.to(myPhone_anmas3, 0.2, {x: -310, y: -300})
        })

        //fonctions pour le hover des applications
        app_anc_anmas3.hover(scaleUp, scaleDown);
        app_prog_anmas3.hover(scaleUp, scaleDown);
        app_pfe_anmas3.hover(scaleUp, scaleDown);

        //fonctions pour le click sur les app
        app_anc_anmas3.click(function () {
            if($(window).width() > 992){
                TweenLite.to(window, 1.5, {scrollTo: {y:".psm-formations-testimony-section", offsetY:99}});
            }else{
                TweenLite.to(window, 1.5, {scrollTo: ".psm-formations-testimony-section"});
            }
        });
        app_prog_anmas3.click(function () {
            if($(window).width() > 992){
                TweenLite.to(window, 0.5, {scrollTo: {y:"#master-2 .psm-formations-programme-section", offsetY:99}});
            }else{
                TweenLite.to(window, 0.5, {scrollTo: "#master-2 .psm-formations-programme-section"});
            }
        })
        app_pfe_anmas3.click(function () {
            if($(window).width() > 992){
                TweenLite.to(window, 1, {scrollTo: {y:"#master-2 .psm-formations-project-section", offsetY:99}});
            }else{
                TweenLite.to(window, 1, {scrollTo: "#master-2 .psm-formations-project-section"});
            }
        })

        new ScrollMagic.Scene({
            triggerElement: "#master-2 .psm-formations-presentation-section .picture",
            triggerHook: "0.5",
        })
        .addIndicators({name: "Augmented reality guy", indent: 300}) // add indicators (requires plugin)
        .addTo(controllerPresentationMaster2Section)
        .setTween(password_tl);

        /**
         * GENERAL FUNCTIONS
         */

        function scaleUp() {
            TweenLite.set(this, {cursor: "pointer"});
            TweenLite.to(this, 0.2, {scale: 1.05, transformOrigin: "center"});
        }

        function scaleDown() {
            TweenLite.to(this, 0.2, {scale: 1, transformOrigin: "center"});
        }

        function heureActuelle() {
            var heureNow = new Date();
            var heure = addZero(heureNow.getHours()) + " " + " " + addZero(heureNow.getMinutes());
            heure_anmas1.text(heure);
            heure_ecr_anmas1.text(heure);
            heure_anmas3.text(heure);
            heure2_anmas3.text(heure);
            //--------------------------------------------------------------------
        }

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }


        setInterval(heureActuelle, 1000);
    },
};

