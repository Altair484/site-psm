<?php get_header() ?>
<!-- Welcome section start -->

<section id="welcome-section">
	<div class="filter"></div>
	<div class="row">
		<div id="welcome-left-collumn" class="col-12 col-md-7">
			<div id="logo-welcome" class="col-7 offset-1 no-padding hidden-md-down">
				<img src="<?php _e(get_template_directory_uri().'/assets/img/svg/psm-logo.svg') ?>" alt="Logo de la seciton accueil du site PSM">
			</div>
			<div id="svg-slider-texte" class="col-12 col-sm-10 offset-sm-1 no-padding">
				<div id="text-slider-container">
					<div id="text-slider-idee" class="col-12 no-padding text-slider">
						<h3><?php echo get_theme_mod('home_page_welcome_section_slide_1_title')?></h3>
						<?php echo wpautop(get_theme_mod('home_page_welcome_section_slide_1_text'))?>
					</div>
					<div id="text-slider-reunion" class="col-12 no-padding text-slider">
						<h3><?php echo get_theme_mod('home_page_welcome_section_slide_2_title')?></h3>
						<?php echo wpautop(get_theme_mod('home_page_welcome_section_slide_2_text'))?>
					</div>
					<div id="text-slider-travail" class="col-12 no-padding text-slider">
						<h3><?php echo get_theme_mod('home_page_welcome_section_slide_3_title')?></h3>
						<?php echo wpautop(get_theme_mod('home_page_welcome_section_slide_3_text'))?>
					</div>
					<div id="text-slider-deploiement" class="col-12 no-padding text-slider">
						<h3><?php echo get_theme_mod('home_page_welcome_section_slide_4_title')?></h3>
						<?php echo wpautop(get_theme_mod('home_page_welcome_section_slide_4_text'))?>
					</div>
				</div>
			</div>

			<ul id="svg-slider-nav" class="col-10 offset-1 d-flex no-padding justify-content-between align-items-center">
				<li><i id="prev" class="inactive fa fa-backward"></i></li>
				<li><i id="sel_idee" class="selected fa fa-circle"></i></li>
				<li><i id="sel_reunion" class="fa fa-circle"></i></li>
				<li><i id="sel_travail" class="fa fa-circle"></i></li>
				<li><i id="sel_deploiement" class="fa fa-circle"></i></li>
				<li><i id="next" class="fa fa-forward"></i></li>
			</ul>
		</div>
		<div id="welcome-right-collumn" class="col-12 col-md-5">
			<div id="animations_home">
				<div class="col-8 offset-2 col-md-12 offset-md-0  svg-container d-flex align-items-center" id="idee">
					<?php get_template_part('assets/img/svg/inline', 'idee.svg');?>
				</div>
				<div class="col-8 offset-4 col-md-12 offset-md-0  svg-container d-flex align-items-center" id="reunion">
					<?php get_template_part('assets/img/svg/inline', 'reunion.svg');?>
				</div>
				<div class="col-8 offset-4 col-md-12 offset-md-0  svg-container d-flex align-items-center" id="travail">
					<?php get_template_part('assets/img/svg/inline', 'travail.svg');?>
				</div>
				<div class="col-8 offset-4 col-md-12 offset-md-0  svg-container d-flex align-items-center" id="deploiement">
					<?php get_template_part('assets/img/svg/inline', 'deploiement.svg');?>
				</div>
			</div>
		</div>
	</div>
	<div class="mouse">
		<div class="scroll"></div>
	</div>
	<div class="swipe-container">
		<?php get_template_part('assets/img/svg/inline', 'swipe.svg');?>
	</div>
</section>
<!-- Welcome section end -->

<!-- Presentation section start -->
<section id="presentation-section">
	<div class="row justify-content-center align-items-center">
		<div class="losange"></div>
		<div class="losange"></div>
		<div class="losange"></div>
		<div class="losange"></div>
		<div id="presentation-content" class="offset-0 offset-md-2 col-12 col-md-9">
			<div class="row">
				<div id="presentation-picture" class="col-12 col-md-3 no-padding">
					<?php get_template_part('assets/img/svg/inline', 'anac1.svg');?>
				</div>
				<div id="presentation-text" class="col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
					<h2>Passionnés et Super Motivés !</h2>
					<p>Chez PSM, votre <b>passion</b> sera la clé de votre réussite. Que vous ayez un profil de graphiste, communicant,
						développeur, informaticien, ou que vous soyez tout simplement <b>motivé</b> et passionné par <b>l’innovation</b>, le
						multimédia et les nouvelles technologies, nous allons vous transmettre les <b>outils</b>et les <b>expériences</b>
						nécessaires à faire de vous un professionnel qualifié dans votre domaine de prédilection.
						Vous visez <b>l’excellence</b> pour la poursuite de vos études en <b>BAC+3</b> ou en <b>Master</b> ? PSM pourrait être la
						réponse : venez découvrir nos <a href="#">formations</a> et nos <a href="">modalités d’admission</a>.
					</p>
					<a class="btn btn-psm" href="#">ADMISSION</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Presentation section end -->

<!-- Formation section start -->
<section id="formations-section">
	<div class="row formations">
		<a href="front-page.php" style="background-image:url('<?php echo get_theme_mod('home_page_formations_section_img_1')?>')" class="formation">
			<div class="filter"></div>
			<h2>L<span class="writing-letter">ICENCE</span>3</h2>
		</a>

		<a href="front-page.php" style="background-image:url('<?php echo get_theme_mod('home_page_formations_section_img_2')?>')" class="formation">
			<div class="filter"></div>
			<h2 class="formation-title">M<span class="writing-letter">ASTER</span>1</h2>
		</a>

		<a href="front-page.php" style="background-image:url('<?php echo get_theme_mod('home_page_formations_section_img_3')?>')" class="formation">
			<div class="filter"></div>
			<h2 class="formation-title">M<span class="writing-letter">ASTER</span>2</h2>
		</a>
	</div>
</section>
<!-- Formation section end -->

<!-- Projects section start -->
<section id="projects-section">
	<div class="row justify-content-center align-items-center">
		<div class="losange"></div>
		<div class="losange"></div>
		<div class="losange"></div>
		<div class="losange"></div>
		<div id="projects-content" class="col-12 col-md-9">
			<div class="row">
				<div id="projects-text" class="col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
					<h2>Des formations orientées projet</h2>
					<p>Les <b>projets multimédia</b> sont le pain quotidien des étudiants de PSM. Chaque année, ils sont amenés à
						réaliser un vrai projet d’<b>équipe</b>, en totale autonomie et dans des <b>conditions réelles</b> (et cela, en
						plus des projets spécifiques aux unités d’enseignements).<br />
						Ces <b>expériences concrètes</b>, en plus d’être extrêmement formatrices et valorisantes, aboutissent souvent
						à des résultats remarquables.<br />
						Découvrez les projets réalisés au fil des années par nos étudiant dans la section dédiée de ce site !

					</p>
					<div class="btns-box">
						<a class="btn btn-psm" href="#">PROJETS RHIZOME</a>
						<a class="btn btn-psm" href="#">PROJETS FIN D'ÉTUDES</a>
					</div>
				</div>
				<div id="projects-picture" class="col-12 col-md-3">
					<?php get_template_part('assets/img/svg/inline', 'anac2.svg');?>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</section>
<!-- Projects section end -->

<!-- News section start -->
<section id="news-section">
	<div class="row justify-content-around">
		<?php
		if ( have_posts() ) {
			$i = 0;
			while (have_posts() && $i <= 2) : the_post();
				get_template_part( 'template-parts/news/news', 'thumb' );
				$i++;
			endwhile;
		} // end if
		?>
		<div class="row w-100">
			<div class="see-all-news  d-flex justify-content-center align-items-center col-12">
				<a href="#" class="btn btn-psm">Voir toutes les actualités</a>
			</div>
		</div>
	</div>
</section>
<!-- News section end -->

<!-- Professional section start -->
<section id="professional-section">
	<div class="row justify-content-center align-items-center">
		<div class="losange"></div>
		<div class="losange"></div>
		<div class="losange"></div>
		<div class="losange"></div>
		<div id="professional-content" class="col-12 col-lg-11">
			<div class="row">
				<div id="professional-picture" class="col-12 col-md-3">
					<?php get_template_part('assets/img/svg/inline', 'anac3.svg');?>
				</div>
				<div id="professional-text" class="col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
					<h2>Un tremplin vers le monde du travail</h2>
					<p>La force de PSM est la <b>réussite</b> de ses étudiants dans le monde du travail. Pour atteindre ce but,
						nous misons sur la <b>qualité</b> des enseignements, sur la <b>polyvalence</b> des compétences des étudiants et
						sur des <b>expériences professionnelles</b> réellement valorisantes pour leurs profils.<br />
						Les stages de Licence 3 et de Master 2 visent à favoriser l’insertion professionnelle et le <b>recrutement</b>
						immédiat de nos diplômés.<br />
						Vous êtes un professionnel et vous souhaitez soumettre une offre de stage / emploi à nos étudiants ?
						Un formulaire est disponible pour vous dans la section <a href="#">Espace Pro</a>.
					</p>
					<a class="btn btn-psm" href="#">Espace pro</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Professional section end -->
<?php get_footer(); ?>






