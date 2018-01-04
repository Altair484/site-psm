<?php get_header(); ?>
<?php
/*if ( is_page('master')) {

} else {
	echo esc_html( get_page_template_slug(2) );
	die;
}
*/?>
<!-- Background video section start -->
<section class="psm-formations-background-video-section">
    <div class="losange"></div>
    <div class="losange"></div>
    <div class="video-background" >
        <div class="video-foreground">
            <div class="filter"></div>
            <div id="player"></div>
        </div>
    </div>
    <h1><i class="fa fa-graduation-cap"></i>&nbsp;<?php echo the_title()?> Produits et Services Multimédia</h1>
    <div class="mouse">
        <div class="scroll"></div>
    </div>
</section>
<!-- Background video section end -->

<!-- Masters toggles start -->
<div id="masters">
    <!-- Background video section start -->
    <section id="toggle-masters">
        <div class="row">
            <div class="choose-training col-6 no-padding <?php if (isset($_GET['formation']) and $_GET['formation'] == 'm1'){echo('active');} ?>">
                <button>Première année</button>
            </div>
            <div class="choose-training col-6 no-padding <?php if (isset($_GET['formation']) and $_GET['formation'] == 'm2'){echo('active');} ?>">
                <button>Deuxième année</button>
            </div>
        </div>
    </section>
    <div id="master-1" class="<?php if (isset($_GET['formation']) and $_GET['formation'] == 'm1'){echo('selected');} ?>">
        <section class="psm-formations-presentation-section">
            <div class="row justify-content-center align-items-center">
                <div class="presentation-content offset-0 col-12 col-md-9 offset-md-2 offset-xl-3 col-xl-7">
                    <div class="row">
                        <div class="presentation-picture col-12 col-md-3">
                            <img src="http://via.placeholder.com/960x540" alt="">
                        </div>
                        <div class="presentation-text col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
                            <h2>LE MASTER EN BREF</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                            </p>
                            <a class="btn btn-psm" href="#">Admission</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="psm-formations-programme-section">
            <div class="row header">
                <div class="col-12">
                    <h2>Programme</h2>
                    <h3>Développement</h3>
                </div>
            </div>
            <div class="row programme-container">
                <div class="row programme-content ">
                    <div class="losanges-container col-12 col-lg-6 no-padding">
                        <div class="losange-origine">
                            <div class="losange active">
                                <i class="fa fa-code"></i>
                                <h4>Développement</h4>
                            </div>
                            <div class="losange no-hover">
                            </div>
                            <div class="losange">
                                <i class="fa fa-plus"></i>
                                <h4>Autres</h4>
                            </div>
                            <div class="losange">
                                <i class="fa fa-tasks"></i>
                                <h4>Gestion de projet</h4>
                            </div>
                        </div>
                    </div>

                    <!-- ACCORDEON DEVELOPPEMENT -->
                    <div class="accordeon-container col-12 col-lg-6 no-padding">
                        <div class="accordeon">
                            <h4 class="accordeon-title">Ergonomie des interfaces<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                            <h4 class="accordeon-title">Image de synthèse<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                            <h4 class="accordeon-title">Réalité virtuelle et augmentée<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                            <h4 class="accordeon-title">Atelier Professionnel<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                        </div>
                    <!-- END  ACCORDEON DEVELOPPEMENT-->

                    <!-- ACCORDEON GESTION DE PROJETS-->
                        <div class="accordeon">
                            <h4 class="accordeon-title">Gestion de projet - UE 1<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                            <h4 class="accordeon-title">Gestion de projet - UE 2<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                            <h4 class="accordeon-title">Gestion de projet - UE 3<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                            <h4 class="accordeon-title">Gestion de projet - UE 4<i class="fa"></i></h4>
                            <div class="accordeon-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                                <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                            </div>
                        </div>
                    <!-- END  ACCORDEON GESTION DE PROJETS-->

                    <!-- ACCORDEON AUTRES-->
                    <div class="accordeon">
                        <h4 class="accordeon-title">Autres - UE 1<i class="fa"></i></h4>
                        <div class="accordeon-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                            <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                        </div>
                        <h4 class="accordeon-title">Autres - UE 2<i class="fa"></i></h4>
                        <div class="accordeon-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                            <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                        </div>
                        <h4 class="accordeon-title">Autres - UE 3<i class="fa"></i></h4>
                        <div class="accordeon-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                            <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                        </div>
                        <h4 class="accordeon-title">Autres - UE 4<i class="fa"></i></h4>
                        <div class="accordeon-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
                            <p>Volume horaire : 8 heures CM - 4 heures TP</p>
                        </div>
                    </div>
                </div>
                <!-- END  ACCORDEON AUTRES-->
                </div>
            </div>
        </section>

        <section class="psm-formations-project-section">
            <div class="row header"></div>
            <div class="row justify-content-center align-items-center">
                <div class="projects-content col-12 col-md-9 offset-xl-2 col-xl-7">
                    <div class="row">
                        <div class="projects-text col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
                            <h2>Des projets avant tout</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                                ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                                iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
                                nulla facilisis.
                            </p>
                            <div class="btns-box">
                                <a class="btn btn-psm-white" href="#">PROJETS RHIZOME</a>
                            </div>
                        </div>
                        <div class="projects-picture col-12 col-md-3">
                            <img src="http://via.placeholder.com/960x540" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </section>

        <section class="psm-formations-testimony-section">
            <div class="row header">
                <div class="col-12">
                    <h2>Ils sont passés par PSM</h2>
                </div>
            </div>
            <div class="row">
                <div class="hexagone-container">
                    <div class="hexagone-item">
                        <div class="hexagone">
                            <div class="hexagone-texts">
                                <blockquote class="citation">“Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla”
                                </blockquote>
                                <h4 class="name-student">Yohan Touvamal</h4>
                                <p>Chef de projet à Moment Factory</p>
                                <p>Promo 2010</p>
                            </div>
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        <div class="hexagone">
                            <div class="hexagone-texts">
                                <blockquote class="citation">“Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla”
                                </blockquote>
                                <h4 class="name-student">SAMANTAH LALA</h4>
                                <p>Chef de projet à Moment Factory</p>
                                <p>Promo 2010</p>
                            </div>
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        <div class="hexagone img--1">
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        <div class="hexagone">
                            <div class="hexagone-texts">
                                <h3 class="exergue-number"><span>Plus de</span><br/>500<span><br/>diplômés en </span>15<span> ans.</span></h3>
                            </div>
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        <div class="hexagone img--2">
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="master-2" class="<?php if (isset($_GET['formation']) and $_GET['formation'] == 'm2'){echo('selected');} ?>">
        <section class="psm-formations-programme-section">
            I have no code to show yet friends :(
        </section>
    </div>
</div>
<script type="text/javascript">
    var you_video_tube_id = 'Ex8Q1WWh2jo'
</script>
<?php get_footer(); ?>

