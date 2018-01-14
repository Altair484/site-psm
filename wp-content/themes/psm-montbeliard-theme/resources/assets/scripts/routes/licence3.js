/* eslint-disable no-undef */
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

        var phone_anlic1 = $('#phone-anlic1'),
            charg_anlic1 = $('#charger-anlic1'),
            light_anlic1 = $('#light-anlic1'),
            chargPort_anlic1 = $('#charger-port-anlic1'),
            fleche_chargPort_anlic1 = $('#fleche-chargPort-anlic1'),
            lettres_chargPort_anlic1 = $('#text-chargPort-anlic1 path'),
            phonePort_anlic1 = $('#phone-port-anlic1'),
            fleche_phonePort_anlic1 = $('#fleche-phonePort-anlic1'),
            lettres_phonePort_anlic1 = $('#text-phonePort-anlic1 path'),
            highbat_anlic1 = $('#highbat-anlic1'),
            bat1_anlic1 = $('#bat1-anlic1'),
            bat2_anlic1 = $('#bat2-anlic1'),
            bat3_anlic1 = $('#bat3-anlic1'),
            proline_anlic1 = $('#pro-line-anlic1'),
            apprline_anlic1 = $('#appr-line-anlic1'),
            staline_anlic1 = $('#sta-line-anlic1'),
            appr_anlic1 = $('#appr-anlic1'),
            pro_anlic1 = $('#projet-anlic1'),
            sta_anlic1 = $('#stage-anlic1'),
            l3_anlic1 = $('#l3-anlic1 path');

        new Draggable(charg_anlic1, {type:"x", lockAxis:true, onDragStart:chargStart, onDragEnd:chargOk, bounds:{top:0, left:1000, width:880, height:0}});
        var dragPhone = new Draggable(phone_anlic1, {type:"x", lockAxis:true, onDragStart:phoneStart, onDragEnd:phoneOk, bounds:{top:0, left:0, width:1150, height:0}});

        dragPhone.disable();

        TweenMax.to(fleche_chargPort_anlic1, 2, {x:"65%", repeat:-1, ease:Power1.easeOut});
        new TimelineMax({repeat:-1}).staggerTo(lettres_chargPort_anlic1, 0.1, {fill:'#999999'},0.035).staggerTo(lettres_chargPort_anlic1, 0.1, {fill:'##17232D'}, 0.035, 0.5);

        TweenMax.fromTo(fleche_phonePort_anlic1, 1.5, {x:"-10%", repeat:-1}, {x:"30%", repeat:-1, ease:Power1.easeOut});
        new TimelineMax({repeat:-1}).staggerTo(lettres_phonePort_anlic1, 0.1, {fill:'#999999'},0.03).staggerTo(lettres_phonePort_anlic1, 0.1, {fill:'##17232D'}, 0.03, 0.5);

        TweenLite.set([phonePort_anlic1, highbat_anlic1, apprline_anlic1, proline_anlic1, staline_anlic1, appr_anlic1, pro_anlic1, sta_anlic1], {opacity:0});

        TweenMax.staggerTo([bat1_anlic1, bat2_anlic1, bat3_anlic1], 1, {fill:"#a9d825", yoyo:true, repeat:-1}, 0.33);

        appr_anlic1.hide();
        sta_anlic1.hide();
        pro_anlic1.hide();
        bat1_anlic1.hide();
        bat2_anlic1.hide();
        bat3_anlic1.hide();

        var tl_init = new TimelineMax();

        function chargStart(){
            TweenLite.to(chargPort_anlic1, 0.5, {opacity:0});
        }

        function chargOk(){
            if(this.endX>262){
                dragPhone.enable();
                if(dragPhone.x<640){
                    TweenLite.to(phonePort_anlic1,0.5, {opacity:1});
                }else{
                    TweenLite.set(highbat_anlic1, {opacity:1});
                    hoverOk(true);
                }
                TweenLite.set([light_anlic1, l3_anlic1], {fill:"#8dbc1f"});
            }else{
                TweenLite.set(light_anlic1, {fill:"#34495e"});
                TweenLite.set(l3_anlic1, {fill:"#b3b3b3"});
                TweenLite.to(chargPort_anlic1, 0.5, {opacity:1});
                TweenLite.to(phonePort_anlic1, 0.5, {opacity:0});
                TweenLite.set(highbat_anlic1, {opacity:0});
                dragPhone.disable();
                hoverOk(false);
            }
        }

        function phoneStart(){
            TweenLite.to(phonePort_anlic1, 0.5, {opacity:0});
        }

        function phoneOk(){
            if(this.endX>640){
                TweenLite.to(phonePort_anlic1, 0.5, {opacity:0});
                TweenLite.set(highbat_anlic1, {opacity:1});
                TweenMax.staggerFrom([bat1_anlic1, bat2_anlic1, bat3_anlic1], 1, {opacity:0}, 1)
                tl_init.set(apprline_anlic1, {opacity:1})
                    .from(apprline_anlic1, 0.5, {scaleX:0, transformOrigin:"right"}, 3)
                    .to(appr_anlic1, 0.5, {opacity:1},3)
                    .to(bat1_anlic1, 0.5, {scaleY:1.5, transformOrigin:"bottom"},3)
                    .to([bat2_anlic1, bat3_anlic1], 0.5, {scaleY:0.75, transformOrigin:"top"},3)
                    .to(bat2_anlic1, 0.5, {y:"-22%"},3)
                    .add(function(){appr_anlic1.show();},3);
                hoverOk(true);
            }else{
                TweenLite.to(phonePort_anlic1, 0.5, {opacity:1});
                TweenLite.set(highbat_anlic1, {opacity:0});
                hoverOk(false);
            }
        }

        var apprlineTl = new TimelineMax();
        var prolineTl = new TimelineMax();
        var stalineTl = new TimelineMax();
        var al1=true, al2=true, al3=true;
        //var opline=false;

        function hoverOk(ok){
            if(ok){
                bat1_anlic1.show();
                bat2_anlic1.show();
                bat3_anlic1.show();

                bat1_anlic1.hover(function(){
                    TweenLite.set(bat1_anlic1, {cursor:'pointer'})
                    tl_init.reversed(true).progress(0);
                    TweenLite.to(apprline_anlic1, 0.1, {opacity:1});
                    appr_anlic1.show();
                    if(al1){
                        apprlineTl.to(apprline_anlic1, 0.5, {scaleX:1, transformOrigin:"right"})
                            .to(appr_anlic1, 0.5, {opacity:1}, 0)
                            .to(bat1_anlic1, 0.5, {scaleY:1.5, transformOrigin:"bottom"}, 0)
                            .to([bat2_anlic1, bat3_anlic1], 0.5, {scaleY:0.75, transformOrigin:"top"}, 0)
                            .to(bat2_anlic1, 0.5, {y:"-22%"}, 0);
                        al1=false;
                    } else {
                        apprlineTl.restart();
                    }
                }, function(){
                    apprlineTl.reversed(true).progress(0);
                });

                bat1_anlic1.on('click', function(){
                    if($(window).width() > 992){
                        TweenLite.to(window, 0.5, {scrollTo: {y:".psm-formations-programme-section", offsetY:100}});
                    }else{
                        TweenLite.to(window, 0.5, {scrollTo: ".psm-formations-programme-section"});
                    }
                })

                bat2_anlic1.hover(function(){
                    TweenLite.set(bat2_anlic1, {cursor:'pointer'})
                    tl_init.reversed(true).progress(0);
                    pro_anlic1.show();
                    TweenLite.set(proline_anlic1, {opacity:1});
                    prolineTl.restart();
                    if(al2){
                        prolineTl.from(proline_anlic1, 0.5, {scaleX:0, transformOrigin:"right"})
                            .to(pro_anlic1, 0.5, {opacity:1}, 0)
                            .to(bat2_anlic1, 0.5, {scaleY:1.5, transformOrigin:"center"}, 0)
                            .to(bat1_anlic1, 0.5, {scaleY:0.75, transformOrigin:"bottom"}, 0)
                            .to(bat3_anlic1, 0.5, {scaleY:0.75, transformOrigin:"top"}, 0);
                        al2=false;
                    }
                }, function(){
                    prolineTl.reversed(true).progress(0);
                });

                bat2_anlic1.on('click', function(){
                    if($(window).width() > 992){
                        TweenLite.to(window, 1, {scrollTo: {y:".psm-formations-project-section", offsetY:100}});
                    }else{
                        TweenLite.to(window, 1, {scrollTo: ".psm-formations-project-section"});
                    }
                })

                bat3_anlic1.hover(function(){
                    TweenLite.set(bat3_anlic1, {cursor:'pointer'})
                    tl_init.reversed(true).progress(0);
                    sta_anlic1.show();
                    TweenLite.set(staline_anlic1, {opacity:1});
                    stalineTl.restart();
                    if(al3){
                        stalineTl.from(staline_anlic1, 0.5, {scaleX:0, transformOrigin:"right"})
                            .to(sta_anlic1, 0.5, {opacity:1}, 0)
                            .to(bat3_anlic1, 0.5, {scaleY:1.5, transformOrigin:"top"}, 0)
                            .to([bat2_anlic1, bat1_anlic1], 0.5, {scaleY:0.75, transformOrigin:"bottom"}, 0)
                            .to(bat2_anlic1, 0.5, {y:"22%"}, 0);
                        al3=false;
                    }

                }, function(){
                    stalineTl.reversed(true).progress(0);
                });
            } else { //it's not ok
                bat1_anlic1.hide();
                bat2_anlic1.hide();
                bat3_anlic1.hide();
            }

            bat3_anlic1.on('click', function(){
                if($(window).width() > 992){
                    TweenLite.to(window, 1.5, {scrollTo: {y:".psm-formations-testimony-section", offsetY:100}});
                }else{
                    TweenLite.to(window, 1.5, {scrollTo: ".psm-formations-testimony-section"});
                }
            })

        }

        /**
         * ANIMATION N°1 M1 NAV
         *
         * @description: Trigger the svg animation of the presentation section of master 1 SECTION
         *
         * @author Federico Borsoi
         */

            //Animation écran d'accueil
            //tous les éléments de l'écran d'accueil
        var pizza_acc_anlic2 = $('#pizza-acc-anlic2'),
            slice_anlic2 = $('#slice-anlic2'),
            title_anlic2 = $('#title_anlic2'),
            start_anlic2 = $('#start-anlic2'),
            son_anlic2 = $('#son-anlic2'),
            son_on_anlic2 = $('#son-on-anlic2'),
            son_off_anlic2 = $('#son-off-anlic2'),
            sound_anlic2 = false;
        var tl_acc_anlic2 = new TimelineLite();

        //Buitages et musiques
        var pizza_sounds = {};
        pizza_sounds['musique'] = new Audio();
        pizza_sounds['musique'].src = theme_url + "/assets/musiques/letto-la-dona.mp3";

        pizza_sounds['remplir-recipient-eau'] = new Audio();
        pizza_sounds['remplir-recipient-eau'].src = theme_url + "/assets/musiques/remplir-recipient-eau.mp3";

        pizza_sounds['remplir-recipient-lait-huile'] = new Audio();
        pizza_sounds['remplir-recipient-lait-huile'].src = theme_url + "/assets/musiques/remplir-recipient-lait-huile.mp3";

        pizza_sounds['ajouter-levure'] = new Audio();
        pizza_sounds['ajouter-levure'].src = theme_url + "/assets/musiques/ajouter-levure.mp3";

        pizza_sounds['ajouter-sel'] = new Audio();
        pizza_sounds['ajouter-sel'].src = theme_url + "/assets/musiques/ajouter-sel.mp3";

        pizza_sounds['ajouter-farine'] = new Audio();
        pizza_sounds['ajouter-farine'].src = theme_url + "/assets/musiques/ajouter-farine.mp3";

        pizza_sounds['melanger'] = new Audio();
        pizza_sounds['melanger'].src = theme_url + "/assets/musiques/melanger.mp3";

        pizza_sounds['rouleau-a-patisserie'] = new Audio();
        pizza_sounds['rouleau-a-patisserie'].src = theme_url + "/assets/musiques/rouleau-a-patisserie.mp3";

        pizza_sounds['pulpe-de-tomate'] = new Audio();
        pizza_sounds['pulpe-de-tomate'].src = theme_url + "/assets/musiques/pulpe-de-tomate.mp3";

        pizza_sounds['mozzarela'] = new Audio();
        pizza_sounds['mozzarela'].src = theme_url + "/assets/musiques/mozzarela.mp3";

        pizza_sounds['tomates'] = new Audio();
        pizza_sounds['tomates'].src = theme_url + "/assets/musiques/tomates.mp3";

        pizza_sounds['basilic'] = new Audio();
        pizza_sounds['basilic'].src = theme_url + "/assets/musiques/basilic.mp3";

        pizza_sounds['four'] = new Audio();
        pizza_sounds['four'].src = theme_url + "/assets/musiques/four.mp3";

        pizza_sounds['pizza-termine'] = new Audio();
        pizza_sounds['pizza-termine'].src = theme_url + "/assets/musiques/pizza-termine.mp3";

        pizza_sounds['mamamia'] = new Audio();
        pizza_sounds['mamamia'].src = theme_url + "/assets/musiques/mamamia.mp3";


        jQuery.each(pizza_sounds, function(key){
            pizza_sounds[key].volume= 0.2;
            pizza_sounds[key].autoPlay=false;
            pizza_sounds[key].preLoad=true;
            pizza_sounds[key].loop=false;
        });

        pizza_sounds['musique'].volume=0.1;
        pizza_sounds['musique'].loop=true;
        pizza_sounds['remplir-recipient-eau'].volume= 0.7;
        pizza_sounds['remplir-recipient-lait-huile'].volume= 0.7;
        pizza_sounds['rouleau-a-patisserie'].volume = 1;
        pizza_sounds['pizza-termine'].volume=0.1;

        tl_acc_anlic2.from(title_anlic2, 1, {y:-1000, ease:Bounce.easeOut})
            .from(start_anlic2, 1, {y:500, ease:Power4.easeOut})
            .from(pizza_acc_anlic2, 1, {x:-1000, ease:Bounce.easeOut},0)
            .from(slice_anlic2, 1, {x:-45, y:-43});

        son_anlic2.hide();
        son_off_anlic2.hide();

        son_anlic2.hover(function(){
            son_anlic2.css('cursor', 'pointer');
            son_on_anlic2.css('opacity', 1);
            son_off_anlic2.css('opacity', 1);
        }, function(){
            son_on_anlic2.css('opacity', 0.6);
            son_off_anlic2.css('opacity', 0.6);
        });

        son_anlic2.click(function(){
            switch (sound_anlic2) {
                case true:
                    desactivateSounds();
                    son_on_anlic2.hide();
                    son_off_anlic2.show();
                    sound_anlic2 = false;
                    break;
                case false:
                    activateSounds();
                    son_on_anlic2.show();
                    son_off_anlic2.hide();
                    sound_anlic2 = true;
                    break;

            }
            new TimelineMax().to(son_anlic2, 0.1, {scale:1.2, transformOrigin:"center", ease:Power0.easeNone}).to(son_anlic2, 0.3, {scale:1, ease:Bounce.easeOut})
        })

        function desactivateSounds() {
            pizza_sounds['musique'].pause();
            jQuery.each(pizza_sounds, function(key){
                pizza_sounds[key].volume=0;
            });
        }

        function activateSounds() {
            pizza_sounds['musique'].play();
            jQuery.each(pizza_sounds, function(key){
                pizza_sounds[key].volume= 0.2;
            });
            pizza_sounds['musique'].volume=0.1;
            pizza_sounds['remplir-recipient-eau'].volume= 0.7;
            pizza_sounds['remplir-recipient-lait-huile'].volume= 0.7;
            pizza_sounds['rouleau-a-patisserie'].volume = 1;
            pizza_sounds['pizza-termine'].volume=0.1;
        }


        start_anlic2.click(function(){
            if (confirm('Cette animation émet de la musique et du son. Vous pouvez le désactiver à tout moment. Pour la lire plus tard, cliquez sur le bouton "Annuler"')) {
                sound_anlic2 = true;
                acc_charged();
                activateSounds();
            }
            else {
                desactivateSounds();
            }
        });


        function acc_charged(){
            son_anlic2.show();
            pizza_sounds['musique'].play();
            new TimelineLite({onComplete:acc_gone}).to(title_anlic2, 0.5, {y:-800, ease:Power1.easeIn})
                .to(start_anlic2, 0.5, {y:800, ease:Power1.easeIn},0)
                .to(pizza_acc_anlic2, 0.5, {x:-800, ease:Power1.ease1},0)
        }


        start_anlic2.hover(function(){
            start_anlic2.css('cursor', 'pointer');
            TweenLite.to(this, 0.3, {scale:0.9, transformOrigin:"center"});
        }, function(){
            TweenLite.to(this, 0.3, {scale:1, transformOrigin:"center"});
        });

        function acc_gone(){
            pizza_acc_anlic2.hide();
            start_anlic2.hide();
            title_anlic2.hide();

            ingredientsAppear();
        }

        //Animation partie ingrédients
        var bol_anlic2 = $('#bol-anlic2'),
            boule_pateapizza_anlic2 = $('#boule-pateapizza-anlic2'),
            eau_versee_anlic2 = $('#eau-versee-anlic2'),
            lait_verse_anlic2 = $('#lait-verse-anlic2'),
            huile_versee_anlic2 = $('#huile-versee-anlic2'),
            levure_versee_anlic2 = $('#levure-versee-anlic2'),
            farine_versee_anlic2 = $('#farine-versee-anlic2'),
            ingredients_versees_anlic2 = $('#ingredients-versees-anlic2'),
            //ingrédients
            verredeau_anlic2 = $('#verredeau-anlic2'),
            verredelait_anlic2 = $('#verredelait-anlic2'),
            verredhuile_anlic2 = $('#verredhuile-anlic2'),
            levure_anlic2 = $('#levure-anlic2'),
            sel_anlic2 = $('#sel-anlic2'),
            farine_anlic2 = $('#farine-anlic2'),
            //instructions
            fleche_ing_anlic2 = $('#fleche-ing-anlic2'),
            instr_eau_anlic2 = $('#instr-eau-anlic2'),
            instr_lait_anlic2 = $('#instr-lait-anlic2'),
            instr_huile_anlic2 = $('#instr-huile-anlic2'),
            instr_levure_anlic2 = $('#instr-levure-anlic2'),
            instr_sel_anlic2 = $('#instr-sel-anlic2'),
            instr_farine_anlic2 = $('#instr-farine-anlic2'),
            instr_melange_anlic2 = $('#instr-melange-anlic2'),
            fleche_melange_anlic2 = $('#fleche-melange-anlic2');

        var tl_apparition_ing = new TimelineLite();

        TweenLite.set(bol_anlic2, {x:1000});
        TweenLite.set([verredeau_anlic2, verredelait_anlic2, verredhuile_anlic2, levure_anlic2, sel_anlic2, farine_anlic2, fleche_ing_anlic2], {x:-500});
        TweenLite.set([instr_eau_anlic2, instr_lait_anlic2, instr_huile_anlic2, instr_levure_anlic2, instr_sel_anlic2, instr_farine_anlic2, instr_melange_anlic2], {y:800});
        TweenLite.set([eau_versee_anlic2, lait_verse_anlic2, huile_versee_anlic2, levure_versee_anlic2, farine_versee_anlic2], {scale:0, transformOrigin:"center"});
        TweenLite.set([fleche_melange_anlic2, boule_pateapizza_anlic2], {opacity:0});

        function ingredientsAppear(){
            tl_apparition_ing.to([bol_anlic2, verredeau_anlic2, fleche_ing_anlic2], 0.5, {x:0, ease:Power2.easeOut})
                .to(fleche_ing_anlic2, 1, {x:150, repeat:-1, repeatDelay:0.2, ease:Power1.easeOut})
                .to(instr_eau_anlic2, 0.5, {y:0, ease:Power2.easeOut},0);
            drag_ing(verredeau_anlic2);
        }

        function drag_ing(ing){
            new Draggable(ing, {type:"x", lockAxis:true, onDragStart:hideFleche, onDragStartParams:[fleche_ing_anlic2, true], onDragEnd:dragEnd, onDragEndParams:[ing], bounds:{top:0, left:0, width:1500, height:0}});
        }

        function hideFleche(fleche, hide, meld){
            if(hide){
                fleche.hide();
            } else {
                fleche.show();
            }

            if(meld){
                pizza_sounds['melanger'].play();
            }
        }

        function dragEnd(ing){
            if(this.endX > 400){
                TweenLite.set(ing, {scale:0});
                trouveInstr(ing).hide();
                switch(ing){
                    case verredeau_anlic2:
                        pizza_sounds['remplir-recipient-eau'].play();
                        setTimeout(function(){
                            pizza_sounds['remplir-recipient-eau'].pause();
                        },1000);
                        TweenLite.to(eau_versee_anlic2, 1, {scale:1, transformOrigin:"center", onComplete:nextIng, onCompleteParams:[verredelait_anlic2]});
                        break;
                    case verredelait_anlic2:
                        pizza_sounds['remplir-recipient-lait-huile'].play();
                        TweenLite.to(lait_verse_anlic2, 1, {scale:1, transformOrigin:"center", onComplete:nextIng, onCompleteParams:[verredhuile_anlic2]});
                        break;
                    case verredhuile_anlic2:
                        pizza_sounds['remplir-recipient-lait-huile'].play();
                        setTimeout(function(){
                            pizza_sounds['remplir-recipient-lait-huile'].pause();
                        },500);
                        TweenLite.to(huile_versee_anlic2, 1, {scale:1, transformOrigin:"center", onComplete:nextIng, onCompleteParams:[levure_anlic2]});
                        break;
                    case levure_anlic2:
                        pizza_sounds['ajouter-levure'].play();
                        TweenLite.to(levure_versee_anlic2, 1, {scale:1, transformOrigin:"center", onComplete:nextIng, onCompleteParams:[sel_anlic2]});
                        break;
                    case sel_anlic2:
                        pizza_sounds['ajouter-sel'].play();
                        nextIng(farine_anlic2);
                        break;
                    case farine_anlic2:
                        pizza_sounds['ajouter-farine'].play();
                        TweenLite.to(farine_versee_anlic2, 1, {scale:1, transformOrigin:"center", onComplete:melangeStart});
                        break;
                    case sauce_anlic2:
                        pizza_sounds['pulpe-de-tomate'].play();
                        setTimeout(function(){
                            pizza_sounds['pulpe-de-tomate'].pause();
                        },1000);
                        TweenLite.to(sauce_etale_anlic2, 1, {opacity:1, scale:1, transformOrigin:"center", onComplete:nextIng, onCompleteParams:[mozza_anlic2]});
                        break;
                    case mozza_anlic2:
                        pizza_sounds['mozzarela'].play();
                        setTimeout(function(){
                            pizza_sounds['mozzarela'].pause();
                        },1000);
                        TweenLite.to(mozza_etale_anlic2, 1, {opacity:1, scale:1, transformOrigin:"center", onComplete:nextIng, onCompleteParams:[tomates_anlic2]});
                        break;
                    case tomates_anlic2:
                        pizza_sounds['tomates'].play();
                        setTimeout(function(){
                            pizza_sounds['tomates'].pause();
                        },1000);
                        TweenLite.to(tomates_etale_anlic2, 1, {opacity:1, scale:1, transformOrigin:"center", onComplete:nextIng, onCompleteParams:[basilic_anlic2]});
                        break;
                    case basilic_anlic2:
                        pizza_sounds['basilic'].play();
                        TweenLite.to(basilic_etale_anlic2, 1, {opacity:1, scale:1, transformOrigin:"center", onComplete:enfournerStart});
                        break;
                    default:
                        break;
                }
            } else {
                hideFleche(fleche_ing_anlic2, false);
            }
        }

        function nextIng(ing){
            TweenLite.to(ing, 0.5, {x:0, ease:Power2.easeOut});
            TweenLite.to(trouveInstr(ing), 0.5, {y:0, ease:Power2.easeOut});
            drag_ing(ing);
            hideFleche(fleche_ing_anlic2, false);
        }

        function trouveInstr(ing){
            switch (ing) {
                case verredeau_anlic2:
                    return instr_eau_anlic2;
                case verredelait_anlic2:
                    return instr_lait_anlic2;
                case verredhuile_anlic2:
                    return instr_huile_anlic2;
                case levure_anlic2:
                    return instr_levure_anlic2;
                case sel_anlic2:
                    return instr_sel_anlic2;
                case farine_anlic2:
                    return instr_farine_anlic2;
                case sauce_anlic2:
                    return instr_sauce_anlic2;
                case mozza_anlic2:
                    return instr_mozza_anlic2;
                case tomates_anlic2:
                    return instr_tomates_anlic2;
                case basilic_anlic2:
                    return instr_basilic_anlic2;
                default:
                    return none;
            }
        }

        function melangeStart(){
            TweenLite.set(ingredients_versees_anlic2, {transformOrigin:"center"});
            Draggable.create(ingredients_versees_anlic2, {type:"rotation", onDragStart:hideFleche, onDragStartParams:[fleche_melange_anlic2, true, "melding"], onDragEnd:finMelange});
            TweenLite.to(instr_melange_anlic2, 1, {y:0});
            TweenLite.to(fleche_melange_anlic2, 0.5, {opacity:1});
        }


        function finMelange(){
            if(this.rotation>720){
                pizza_sounds['melanger'].pause();
                new TimelineLite({onComplete:rouleauStart}).set(boule_pateapizza_anlic2, {opacity:1, x:200})
                    .to(ingredients_versees_anlic2, 1, {scale:0})
                    .to(instr_melange_anlic2, 0.5, {y:-800}, 0)
                    .to(boule_pateapizza_anlic2, 0.5, {scale:1.3, transformOrigin:"center"}, 1.5)
                    .to(bol_anlic2, 0.5, {x:1000})
                    .to(boule_pateapizza_anlic2, 0.5, {x:0},2)
                    .to(boule_pateapizza_anlic2, 0.5, {scale:1}, 2.5)
            }else{
                pizza_sounds['melanger'].pause();
                hideFleche(fleche_melange_anlic2, false);
            }
        }


        //Animation pâte étirée
        var clipper_bouleapizza_anlic2 = $('#clipper-bouleapizza-anlic2'), //clipper
            clipper_patecr1_anlic2 = $('#clipper-patecr1-anlic2'), //clipper
            clipper_patecr2_anlic2 = $('#clipper-patecr2-anlic2'), //clipper
            pate_ecr2_anlic2 = $('#pate-ecr2-anlic2'),
            rouleau_anlic2 = $('#rouleau-anlic2'),
            rouleau_passe = 0,
            //instructions
            instr_ecrase_anlic2 = $('#instr-ecrase-anlic2'),
            finger1_anlic2 = $('#finger1-anlic2'),
            finger2_anlic2 = $('#finger2-anlic2');

        TweenLite.set(rouleau_anlic2, {x:500});
        TweenLite.set([instr_ecrase_anlic2, finger1_anlic2, finger2_anlic2], {y:500});

        function rouleauStart(){
            new TimelineMax().to(rouleau_anlic2, 0.5, {x:0})
                .to([instr_ecrase_anlic2, finger1_anlic2], 0.5, {y:0}, 0)
                .to([finger1_anlic2], 1, {y:-40, repeat:-1, repeatDelay:0.2, ease:Power1.easeOut});
        }

        rouleau_anlic2.hover(function(){
            rouleau_anlic2.css("cursor", "pointer");
            TweenLite.to(this, 0.5, {scale:0.9, transformOrigin:"center"});
        }, function(){
            TweenLite.to(this, 0.5, {scale:1});
        })

        rouleau_anlic2.click(function(){
            pizza_sounds['rouleau-a-patisserie'].play();
            rouleau_passe += 1;
            if(rouleau_passe==1){
                new TimelineMax().set(rouleau_anlic2, {scale:0.9})
                    .to([rouleau_anlic2, clipper_bouleapizza_anlic2, clipper_patecr1_anlic2], 1, {x:-1200})
                    .to(rouleau_anlic2, 0.5, {scale:1})
                    .to(finger2_anlic2, 0.5, {y:0}, 1)
                    .to(finger2_anlic2, 1, {y:-40, repeat:-1, repeatDelay:0.2, ease:Power1.easeOut}, 1.5);
                finger1_anlic2.hide();
            }else if (rouleau_passe==2) {
                new TimelineMax({onComplete:garnitureStart}).set(rouleau_anlic2, {scale:0.9})
                    .to(instr_ecrase_anlic2, 0.5, {y:500})
                    .to([rouleau_anlic2, clipper_patecr1_anlic2], 1.5, {x:400},0)
                    .to(clipper_patecr2_anlic2, 1, {x:1200}, 0)
                    .to(rouleau_anlic2, 0.5, {scale:1});
                finger2_anlic2.hide();
            }
        })


        //Animation garniture
        var pizza_anlic2 =$('#pizza-anlic2'), //pizza complète
            //Ingredients étalés
            sauce_etale_anlic2 = $('#sauce-etale-anlic2'),
            mozza_etale_anlic2 = $('#mozza-etale-anlic2'),
            tomates_etale_anlic2 = $('#tomates-etalees-anlic2'),
            basilic_etale_anlic2 = $('#basilic-etale-anlic2'),
            //ingredients
            sauce_anlic2 = $('#sauce-anlic2'),
            mozza_anlic2 = $('#mozza-anlic2'),
            tomates_anlic2 = $('#tomates-anlic2'),
            basilic_anlic2 = $('#basilic-anlic2'),
            //instructions
            instr_sauce_anlic2 = $('#instr-sauce-anlic2'),
            instr_mozza_anlic2 = $('#instr-mozza-anlic2'),
            instr_tomates_anlic2 = $('#instr-tomates-anlic2'),
            instr_basilic_anlic2 = $('#instr-basilic-anlic2');

        TweenLite.set([sauce_anlic2, mozza_anlic2, tomates_anlic2, basilic_anlic2], {x:-500})
        TweenLite.set([instr_sauce_anlic2, instr_mozza_anlic2, instr_tomates_anlic2, instr_basilic_anlic2], {y:500})
        TweenLite.set([sauce_etale_anlic2, mozza_etale_anlic2, tomates_etale_anlic2, basilic_etale_anlic2], {scale:0, transformOrigin:"center"})

        function garnitureStart (){
            TweenLite.set([mozza_etale_anlic2, tomates_etale_anlic2, basilic_etale_anlic2], {opacity:0, scale:1.5, transformOrigin:"center"})
            new TimelineLite().to(sauce_anlic2, 0.5, {x:0, ease:Power2.easeOut})
                .add(function(){hideFleche(fleche_ing_anlic2, false)})
                .to(instr_sauce_anlic2, 0.5, {y:0, ease:Power2.easeOut},0);
            drag_ing(sauce_anlic2);
        }

        //Animation partie four
        var fond_four_anlic2 = $('#fond-four-anlic2'),
            pelle_four_anlic2 = $('#pelle-four-anlic2'),
            four_anlic2 = $('#four-anlic2'), //partie haute du four
            feu_four_anlic2 = $('#feu-four-anlic2'),
            pizzaetpelle_anlic2 = $('#pizzaetpelle_anlic2'),
            //Instructions
            instr_four_anlic2 = $('#instr-four-anlic2'),
            fleche_four_anlic2 = $('#fleche-four-anlic2'),
            bravo_anlic2 = $('#bravo-anlic2');

        TweenLite.set([four_anlic2, fond_four_anlic2], {y:-500});
        TweenLite.set(pelle_four_anlic2, {y:1000});
        TweenLite.set(bravo_anlic2, {scale:0, transformOrigin:"top left"});
        TweenMax.to(fleche_four_anlic2, 1, {y:100, repeat:-1, repeatDelay:0.2})
        hideFleche(fleche_four_anlic2, true);
        TweenLite.set(instr_four_anlic2, {y:500});


        function enfournerStart(){
            new TimelineLite({onComplete:fourDrag}).to(pelle_four_anlic2, 0.5, {y:0})
                .to(pelle_four_anlic2, 0.5, {scale:0.7, transformOrigin:"50% 18%"})
                .to(pizza_anlic2, 0.5, {scale:0.7, transformOrigin:"center"}, 0.5)
                .to([pelle_four_anlic2, pizza_anlic2], 0.5, {y:200})
                .to([four_anlic2, fond_four_anlic2], 0.5, {y:0}, 0.5);
            TweenMax.to(feu_four_anlic2, 0.3, {opacity:0.3, repeat:-1, yoyo:true, ease:Power0.easeNone})
        }

        var pizzadrag;

        function fourDrag(){
            pizzadrag = new Draggable(pizzaetpelle_anlic2, {type:"y", lockAxis:true, onDragStart:hideFleche, onDragStartParams:[fleche_four_anlic2, true], onDragEnd:fourDragEnd, bounds:{top:1000, left:0, width:0, height:600}});
            hideFleche(fleche_four_anlic2, false);
            TweenLite.to(instr_four_anlic2, 0.5, {y:0});
        }

        function fourDragEnd(){
            if(this.endY<-666){

                pizzadrag.disable();
                instr_four_anlic2.hide();
                new TimelineMax().to(pelle_four_anlic2, 0.5, {y:1000})
                    .to(pate_ecr2_anlic2, 3, {fill:"#e5c480"})
                    .to(pelle_four_anlic2, 0.5, {y:200})
                    .to(pizzaetpelle_anlic2, 0.5, {y:0})
                    .to(pelle_four_anlic2, 1, {y:2000})
                    .to(pizza_anlic2, 1, {x:-300, scale:1.5})
                    .to(bravo_anlic2, 0.5, {scale:1});

                pizza_sounds['four'].play();
                setTimeout(function(){
                    pizza_sounds['four'].pause();
                },4000);

                setTimeout(function(){
                    pizza_sounds['musique'].pause();
                    pizza_sounds['pizza-termine'].play();
                },6000);

                setTimeout(function(){
                    pizza_sounds['mamamia'].play();
                },7000);
            }else{
                hideFleche(fleche_four_anlic2, false);
            }

        }
    },
};

