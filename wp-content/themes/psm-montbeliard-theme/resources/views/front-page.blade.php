@extends('layouts.app')
@section('content')

    <section id="welcome-section" style="background-image: url('{!! get_theme_mod('home_page_welcome_section_img',\App\App::get_image_page_header('batiment-psm', 'jpg')) !!}')">
        <div class="filter"></div>
        <div class="row">
            <div id="welcome-left-collumn" class="col-12 col-md-7">
                <div id="logo-welcome" class="col-9 col-sm-7 offset-sm-1 col-xl-6 no-padding hidden-md-down">
                    <h1>{{bloginfo()}}</h1>
                </div>
                <div id="svg-slider-texte" class="col-12 col-sm-10 offset-sm-1 no-padding">
                    <div id="text-slider-container">
                        <div id="text-slider-idee" class="col-12 no-padding text-slider">
                            <h3 class="home_page_welcome_section_slide_1_title">
                                {{ get_theme_mod(
                                    'home_page_welcome_section_slide_1_title',
                                    'Berceau d\'idées innovantes')
                                }}
                            </h3>
                            <p class="home_page_welcome_section_slide_1_text">
                                {!! get_theme_mod(
                                    'home_page_welcome_section_slide_1_text',
                                    'Les plus grandes innovations naissent d\'idées simples. Les étudiants de PSM sont encouragés à '.
                                    'cultiver leur créativité et leur imagination, à voir le monde avec un regard novateur et à '.
                                    'concevoir des produits et services multimédia répondant aux besoins et aux demandes d’aujourd’hui '.
                                    'et de demain.'
                                ) !!}
                            </p>
                            <div class="btns-box">
                                <button class="btn btn-transparent hide-text-slider">Fermer</button>
                                <button class="btn btn-psm-green next-slide">Suivant</button>
                            </div>
                        </div>
                        <div id="text-slider-reunion" class="col-12 no-padding text-slider">
                            <h3 class="home_page_welcome_section_slide_2_title">
                                {{ get_theme_mod(
                                    'home_page_welcome_section_slide_2_title',
                                    'Des compétences de leader'
                                )}}
                            </h3>
                            <p class="home_page_welcome_section_slide_2_text">
                                {!! get_theme_mod(
                                    'home_page_welcome_section_slide_2_text',
                                    'L’expérience prépare mieux que la théorie aux défis du monde actuel. Chez PSM, nous formons '.
                                    'des chefs de projet complets et polyvalents en confrontant nos étudiants à des expériences '.
                                    'concrètes. À la sortie, ils seront capables de concevoir, réaliser et promouvoir des projets '.
                                    'multimédia complexes et innovants.')
                                !!}
                            </p>
                            <div class="btns-box">
                                <button class="btn btn-transparent hide-text-slider">Fermer</button>
                                <button class="btn btn-psm-green next-slide">Suivant</button>
                            </div>
                        </div>
                        <div id="text-slider-travail" class="col-12 no-padding text-slider">
                            <h3 class="home_page_welcome_section_slide_3_title">
                                {{ get_theme_mod(
                                    'home_page_welcome_section_slide_3_title',
                                    'Partager, valoriser, réussir'
                                ) }}
                            </h3>
                            <p class="home_page_welcome_section_slide_3_text">
                                {!! get_theme_mod(
                                    'home_page_welcome_section_slide_3_text',
                                    'Savoir composer, gérer et travailler dans une équipe de professionnels aux profils différents '.
                                    'est une compétence fondamentale dans le secteur du multimédia. En étant confrontés à de '.
                                    'nombreux projets collectifs, les étudiants de PSM apprennent à valoriser les compétences '.
                                    'spécifiques de chaque membre d’une équipe, à partager et à communiquer pour mieux réussir.'
                                )!!}
                            </p>
                            <div class="btns-box">
                                <button class="btn btn-transparent hide-text-slider">Fermer</button>
                                <button class="btn btn-psm-green next-slide">Suivant</button>
                            </div>
                        </div>
                        <div id="text-slider-deploiement" class="col-12 no-padding text-slider">
                            <h3 class="home_page_welcome_section_slide_4_title">
                                {{ get_theme_mod(
                                    'home_page_welcome_section_slide_4_title',
                                    'La qualité avant tout'
                                ) }}
                            </h3>
                            <div class="home_page_welcome_section_slide_4_text">
                                {!! get_theme_mod(
                                    'home_page_welcome_section_slide_4_text',
                                    'Un produit ou un service de qualité est un produit qui sait répondre aux besoins et aux '.
                                    'attentes de ses cibles. Pour cette raison, PSM tient particulièrement à cœur d’enseigner '.
                                    'aux professionnels du multimédia de demain à bien observer et analyser le marché, à concevoir '.
                                    'et à réaliser des produits et des services visant à proposer la meilleure expérience '.
                                    'utilisateur possible.'
                                ) !!}
                            </div>
                            <div class="btns-box">
                                <button class="btn btn-transparent hide-text-slider">Fermer</button>
                                <button class="btn btn-psm-green next-slide last-slide">Suivant</button>
                            </div>
                        </div>
                    </div>
                    {{--<div class="swipe-container">
                          {!! get_template_part('../dist/images/svg/inline', 'swipe.svg') !!}
                      </div>--}}
                </div>
            </div>
            <div id="welcome-right-collumn" class="col-12 col-md-5 ">
                <div id="animations_home">
                    <div class="col-12 svg-container" id="idee">
                        {!! get_template_part('/assets/images/svg/inline', 'idee.svg') !!}
                        <button class="btn btn-psm-green show-text-slider">
                            {{ get_theme_mod(
                               'home_page_welcome_section_slide_1_title',
                               'Berceau d\'idées innovantes')
                           }}
                        </button>
                    </div>
                    <div class="col-12 svg-container" id="reunion">
                        {!! get_template_part('/assets/images/svg/inline', 'reunion.svg') !!}
                        <button class="btn btn-psm-green show-text-slider">
                            {{ get_theme_mod(
                                'home_page_welcome_section_slide_2_title',
                                'Des compétences de leader'
                            )}}
                        </button>
                    </div>
                    <div class="col-12 svg-container" id="travail">
                        {!! get_template_part('/assets/images/svg/inline', 'travail.svg') !!}
                        <button class="btn btn-psm-green show-text-slider">
                            {{ get_theme_mod(
                                'home_page_welcome_section_slide_3_title',
                                'Partager, valoriser, réussir'
                            ) }}
                        </button>
                    </div>
                    <div class="col-12 svg-container" id="deploiement">
                        {!! get_template_part('/assets/images/svg/inline', 'deploiement.svg') !!}
                        <button class="btn btn-psm-green show-text-slider">
                            {{ get_theme_mod(
                               'home_page_welcome_section_slide_4_title',
                               'La qualité avant tout'
                           ) }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="slider-nav col-12 no-padding">
                <ul id="svg-slider-buttons" class="col-10">
                    <li><i id="prev" class="inactive fa fa-angle-double-left "></i></li>
                    <li><i id="sel_idee" class="selected fa fa-circle"></i></li>
                    <li><i id="sel_reunion" class="fa fa-circle"></i></li>
                    <li><i id="sel_travail" class="fa fa-circle"></i></li>
                    <li><i id="sel_deploiement" class="fa fa-circle"></i></li>
                    <li><i id="next" class="fa fa-angle-double-right"></i></li>
                </ul>
            </div>
        </div>
        {{--<div class="mouse">
            <div class="scroll"></div>
        </div>--}}
    </section>
    <!-- Welcome section end -->

    <!-- Presentation section start -->
    <section id="presentation-section" class="section-image-left-content-right">
        <div class="row justify-content-center align-items-center">
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="content offset-0 offset-md-2 col-12 col-md-9">
                <div class="row">
                    <div class="picture col-12 col-md-4 no-padding">
                        {!! get_template_part('/assets/images/svg/inline', 'anac1.svg') !!}
                    </div>
                    <div class="text col-12 col-md-8 d-flex justify-content-center align-items-start flex-column">
                        <h2 class="home_page_presentation_section_title">
                            {{ get_theme_mod(
                                'home_page_presentation_section_title',
                                'PASSIONNÉS ET SUPER MOTIVÉS !'
                            ) }}
                        </h2>
                        <div class="home_page_presentation_section_text">
                            {!! get_theme_mod(
                                'home_page_presentation_section_text',
                                'Chez PSM, votre <b>passion</b> sera la clé de votre réussite. Que vous ayez un profil de graphiste, communicant, '.
                                'développeur, informaticien, ou que vous soyez tout simplement <b>motivé</b> et passionné par <b>l’innovation</b>, le '.
                                'multimédia et les nouvelles technologies, nous allons vous transmettre les <b>outils</b> et les <b>expériences</b> '.
                                'nécessaires à faire de vous un professionnel qualifié dans votre domaine de prédilection. '.
                                'Vous visez <b>l’excellence</b> pour la poursuite de vos études en <b>BAC+3</b> ou en <b>Master</b> ? PSM pourrait être la '.
                                'réponse : venez découvrir nos <b>ormations</b> et nos <b>modalités d’admission</b>. '
                            ) !!}
                        </div>
                        <div class="btns-box">
                            <span class="home_page_presentation_section_admission_licence_link">
                            <a class="btn btn-psm" href="{!! get_theme_mod(
                                'home_page_presentation_section_admission_licence_link',
                                'http://formations.univ-fcomte.fr/ws?_profil=ufc&_cmd=getFormation&_oid=CDM-KPROG8&_onglet=admission&_redirect=voir_fiche_program'
                            ) !!}" target="_blank">ADMISSION LICENCE
                            </a>
                        </span>
                        <span class="home_page_presentation_section_admission_master_link">
                            <a class="btn btn-psm" href="{!! get_theme_mod(
                                'home_page_presentation_section_admission_master_link',
                                'http://formations.univ-fcomte.fr/ws?_profil=ufc&_cmd=getFormation&_oid=CDM-KPROG107&_onglet=admission&_redirect=voir_fiche_program'
                            ) !!}" target="_blank">ADMISSION MASTER
                            </a>
                        </span>
                        <span class="home_page_presentation_section_apply_link">
                            <a class="btn btn-psm-green" href="{!! get_theme_mod(
                                'home_page_presentation_section_apply_link',
                                'https://scolarite.univ-fcomte.fr/ecandidat/#!accueilView'
                            ) !!}" target="_blank">CANDIDATER
                            </a>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Presentation section end -->

    <!-- Formation section start -->
    <section id="formations-section">
        <div class="row formations ">
            <a href="{{ site_url().'/licence' }}" style="background-image:url('{{ get_theme_mod(
			        'home_page_formations_section_img_1',
			        get_template_directory_uri(). '/../dist/images/formations/licence3-psm.jpg'
			    ) }}')" class="formation home_page_formations_section_img_1">
                <div class="filter"></div>
                <h2>L<span class="writing-letter">ICENCE</span>3</h2>
            </a>

            <a href="{{add_query_arg( 'formation', 'm1', site_url().'/master' )}}" style="background-image:url('{{ get_theme_mod(
			        'home_page_formations_section_img_2',
			         get_template_directory_uri(). '/../dist/images/formations/master1-psm.jpg'
			    )}}')" class="formation home_page_formations_section_img_2">
                <div class="filter"></div>
                <h2 class="formation-title">M<span class="writing-letter">ASTER</span>1</h2>
            </a>

            <a href="{{add_query_arg( 'formation', 'm2', site_url().'/master' )}}" style="background-image:url('{{ get_theme_mod(
			        'home_page_formations_section_img_3',
			           get_template_directory_uri(). '/../dist/images/formations/master2-psm.jpg'
			    )}}')" class="formation home_page_formations_section_img_3">
                <div class="filter"></div>
                <h2 class="formation-title">M<span class="writing-letter">ASTER</span>2</h2>
            </a>
        </div>
    </section>
    <!-- Formation section end -->

    <!-- Projects section start -->
    <section id="projects-section" class="section-image-right-content-left">
        <div class="row justify-content-center align-items-center">
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="content col-12 col-md-9">
                <div class="row">
                    <div class="text col-12 col-md-8 d-flex justify-content-center align-items-start flex-column">
                        <h2 class="home_page_projects_section_title">
                            {{ get_theme_mod(
                               'home_page_projects_section_title',
                               'Des formations orientées projet !'
                           ) }}
                        </h2>
                        <div class="home_page_projects_section_text">
                            {!! get_theme_mod(
                                'home_page_projects_section_text',
                                'Les <b>projets multimédia</b> sont le pain quotidien des étudiants de PSM. Chaque année, ils sont amenés à
                                réaliser un vrai projet d’<b>équipe</b>, en totale autonomie et dans des <b>conditions réelles</b> (et cela, en
                                plus des projets spécifiques aux unités d’enseignements).<br />
                                Ces <b>expériences concrètes</b>, en plus d’être extrêmement formatrices et valorisantes, aboutissent souvent
                                à des résultats remarquables.<br />
                                Découvrez les projets réalisés au fil des années par nos étudiant dans la section dédiée de ce site !'
                            )!!}
                        </div>
                        <div class="btns-box">
                            <span class="home_page_projects_section_rhizome_page">
                                 <a class="btn btn-psm" href="{!! site_url() .'/?p='. get_theme_mod(
                                    'home_page_projects_section_rhizome_page',
                                    '1866'
                                ) !!}">Projets rhizome</a>
                            </span>
                            <span class="home_page_projects_section_pfe_page">
                                 <a class="btn btn-psm" href="{!! site_url() .'/?p='. get_theme_mod(
                                    'home_page_projects_section_pfe_page',
                                    '1868'
                                ) !!}">Projets fin d'études</a>
                            </span>
                        </div>
                    </div>
                    <div class="picture col-12 col-md-4">
                        {!! get_template_part('/assets/images/svg/inline', 'anac2.svg') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
    <!-- Projects section end -->

    <!-- News section start -->
    <section id="news-section">
        <h2>Actualités</h2>
        <div class="row justify-content-around">
            {!! \App\FrontPage::get_three_news() !!}
            <div class="row w-100">
                <div class="see-all-news  d-flex justify-content-center align-items-center col-12">
                    <span class="home_page_news_section_news_page">
                        <a class="btn btn-psm" href="{!! site_url() .'/?p='. get_theme_mod(
                        'home_page_news_section_news_page',
                        '16'
                    ) !!}" >Voir toutes les actualités</a>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!-- News section end -->

    <!-- Professional section start -->
    <section id="professional-section" class="section-image-left-content-right">
        <div class="row justify-content-center align-items-center">
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="losange"></div>
            <div class="content offset-0 offset-md-2 col-12 col-md-9">
                <div class="row">
                    <div class="picture col-12 col-md-4 no-padding">
                        {!! get_template_part('/assets/images/svg/inline', 'anac3.svg') !!}
                    </div>
                    <div class="text col-12 col-md-8 d-flex justify-content-center align-items-start flex-column">
                        <h2 class="home_page_professional_section_title">
                            {{ get_theme_mod(
                               'home_page_professional_section_title',
                               'Un tremplin vers le monde du travail'
                            ) }}
                        </h2>
                        <div class="home_page_professional_section_text">
                            {!! get_theme_mod(
                             'home_page_professional_section_text',
                             'La force de PSM est la <b>réussite</b> de ses étudiants dans le monde du travail. Pour atteindre ce but,
                             nous misons sur la <b>qualité</b> des enseignements, sur la <b>polyvalence</b> des compétences des étudiants et
                             sur des <b>expériences professionnelles</b> réellement valorisantes pour leurs profils.<br />
                             Les stages de Licence 3 et de Master 2 visent à favoriser l’insertion professionnelle et le <b>recrutement</b>
                             immédiat de nos diplômés.<br />
                             Vous êtes un professionnel et vous souhaitez soumettre une offre de stage / emploi à nos étudiants ?
                             Un formulaire est disponible pour vous dans la section <a href="#">Espace Pro</a>.'
                            )!!}
                        </div>
                        <span class="home_page_professional_section_link_page_pro">
                             <a class="btn btn-psm" href="{!! site_url() .'/?p='. get_theme_mod(
                                'home_page_professional_section_link_page_pro',
                                '1868'
                            ) !!}">Espace pro</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Professional section end -->
@endsection
