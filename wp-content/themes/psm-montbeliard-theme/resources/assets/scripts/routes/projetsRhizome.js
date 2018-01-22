/* eslint-disable no-undef */
import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
export default {
    init() {

    },
    finalize() {
        /**
         * ANIMATION page PROJETS RHIZOMES
         *
         * @description: Animation of rhizome page
         *
         * @author Federico Borsoi
         */
        var controllerProjetRhizomeMaster1Section = new ScrollMagic.Controller();

        var circle_rhiz = $('#circle_rhiz'),
            leftPalm_rhiz = $('#leftPalm_rhiz'),
            rightPalm_rhiz = $('#rightPalm_rhiz'),
            oscar_rhiz = $('#oscar_rhiz'),
            star_rhiz = $('#star_rhiz'),
            hexa_rhiz = $('#hexa_rhiz path'),
            tirets_rhiz = $('#tirets_rhiz'),
            R_rhiz = $('#R_rhiz'),
            H_rhiz = $('#H_rhiz'),
            I_rhiz = $('#I_rhiz'),
            Z_rhiz = $('#Z_rhiz'),
            O_rhiz = $('#O_rhiz'),
            M_rhiz = $('#M_rhiz'),
            E_rhiz = $('#E_rhiz');

        var rhizome_tl = new TimelineMax();

        $('#projects-page-presentation-section .picture svg').hover(function(){
            TweenLite.set(this, {cursor: "pointer"});
        });

        $('#projects-page-presentation-section .picture svg').click(function () {
            rhizome_tl.restart();
        });

        rhizome_tl.staggerFrom([R_rhiz, H_rhiz, I_rhiz, Z_rhiz, O_rhiz, M_rhiz, E_rhiz], 0.4, {opacity:0, scale:2, transformOrigin:"center"}, 0.1)
            .to([R_rhiz, H_rhiz, I_rhiz, Z_rhiz, O_rhiz, M_rhiz, E_rhiz], 0.5, {scale:1.1, ease:Power1.easeIn})
            .to([R_rhiz, H_rhiz, I_rhiz, Z_rhiz, O_rhiz, M_rhiz, E_rhiz], 0.5, {scale:1, ease:Power1.easeOut})
            .from(tirets_rhiz, 1, {scale:1.5, transformOrigin:"center"}, 1.5)
            .from(tirets_rhiz, 0.5, {opacity:0}, 1.5)
            .from(leftPalm_rhiz, 1.5, {opacity:0, rotation:-90, transformOrigin:"right center"}, 0)
            .from(rightPalm_rhiz, 1.5, {opacity:0, rotation:90, transformOrigin:"left center"}, 0)
            .from(oscar_rhiz, 1.5, {scaleX:0, transformOrigin:"center"}, 0)
            .staggerFrom(hexa_rhiz, 0.4, {opacity:0, scale:2}, 0.1, 1.5)
            .fromTo(star_rhiz, 1.5, {scale:0, transformOrigin:"center"}, {rotation:720, scale:1}, 0)
            .from(circle_rhiz, 1, {opacity:0, scale:2, transformOrigin:"center"}, 1.5)



        new ScrollMagic.Scene({
            triggerElement: "#projects-page-presentation-section .picture",
            triggerHook: "0.5",
        })
        //.addIndicators({name: "Rhizome animation", indent: 150}) // add indicators (requires plugin)
            .addTo(controllerProjetRhizomeMaster1Section)
            .setTween(rhizome_tl);
    },
};



