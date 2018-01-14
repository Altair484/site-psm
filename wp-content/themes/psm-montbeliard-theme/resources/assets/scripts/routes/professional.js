import ScrollMagic from 'scrollmagic/scrollmagic/minified/ScrollMagic.min';
export default {
    init() {

    },
    finalize() {
        /*eslint-disable no-undef*/
        var controllerEspaceProSection = new ScrollMagic.Controller();

        var mac_anpro = $('#mac_anpro'),
            pers_anpro = $('#pers_anpro'),
            screen_anpro = $('#screen_anpro');

        var anpro_tl = new TimelineMax();

        $('#page-espace-pro-section-info .picture svg').hover(function(){
            TweenLite.set(this, {cursor: "pointer"});
        });

        $('#page-espace-pro-section-info .picture svg').click(function () {
            anpro_tl.restart();
        });

        anpro_tl.from(mac_anpro, 1, {y:50, opacity:0})
            .from(screen_anpro, 1, {fill:"#17232d"})
            .from(pers_anpro, 1, {y:1000})

        new ScrollMagic.Scene({
            triggerElement: "#page-espace-pro-section-info .picture",
            triggerHook: "0.5",
        })
        //.addIndicators({name: "Rhizome animation", indent: 150}) // add indicators (requires plugin)
            .addTo(controllerEspaceProSection)
            .setTween(anpro_tl);
        /*eslint-enable no-undef*/
    },
};
