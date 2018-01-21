/* eslint-disable no-undef */
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
export default {
    init() {

    },
    finalize() {
        /**
         * ANIMATION N°2 M1 PROJETS RHIZOMES et page PROJETS RHIZOMES
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

        $('#projects-page-presentation-section .picture svg').hover(function(){
            TweenLite.set(this, {cursor: "pointer"});
        });

        $('#projects-page-presentation-section .picture svg').click(function () {
            anmas2_tl.restart();
        });

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
            triggerElement: "#projects-page-presentation-section .picture",
            triggerHook: "0.5",
        })
        //.addIndicators({name: "Rhizome animation", indent: 150}) // add indicators (requires plugin)
            .addTo(controllerProjetRhizomeMaster1Section)
            .setTween(anmas2_tl);
    },
};



