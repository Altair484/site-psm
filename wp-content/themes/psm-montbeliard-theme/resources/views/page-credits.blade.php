@extends('layouts.app')

@section('content')
    <section id="page-credits-section-team">
        <div class="row header">
            <h1>Ils ont réalisé le site&nbsp;:</h1>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="team-member-wrapper">
                    <div class="team-member-content col-xl-10 offset-xl-1">
                        <div class="team-member-picture">
                            <img src="{{ get_template_directory_uri() }}. '/../dist/images/svg/visages/anne-lise-pricaz.svg'" alt="Image de profil : Anne-lise Pricaz">
                        </div>
                        <div class="team-member-name">
                            <h2>Anne-lise Pricaz</h2>
                        </div>
                        <div class="team-member-desc">
                            <h3>Chef de projet</h3>
                            <h4>Missions :</h4>
                            <ul>
                                <li>Gestion de projet</li>
                                <li>Graphisme et webdesign</li>
                                <li>Photographie</li>
                            </ul>
                        </div>
                        <div class="team-member-social-networks">
                            <a href="https://fr.linkedin.com/in/annelisepricaz" target="_blank">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="http://annelisepricaz.com/" target="_blank">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="team-member-wrapper">
                    <div class="team-member-content col-xl-10 offset-xl-1">
                        <div class="team-member-picture">
                            <img src="{{ get_template_directory_uri() }}. '/../dist/images/svg/visages/federico-borsoi.svg'" alt="Image de profil : Anne-lise Pricaz">
                        </div>
                        <div class="team-member-name">
                            <h2>Fédérico Borsoi</h2>
                        </div>
                        <div class="team-member-desc">
                            <h3>Chargé de communication</h3>
                            <h4>Missions :</h4>
                            <ul>
                                <li>Créateur SVG et animations JS</li>
                                <li>Rédacteur web</li>
                                <li>Responsable vidéographie</li>
                            </ul>
                        </div>
                        <div class="team-member-social-networks">
                            <a href="https://www.linkedin.com/in/federico-borsoi-24246812b/" target="_blank">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="http://federicoborsoi.com/fr/about/" target="_blank">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="team-member-wrapper">
                    <div class="team-member-content col-xl-10 offset-xl-1">
                        <div class="team-member-picture">
                            <img src="{{ get_template_directory_uri() }}. '/../dist/images/svg/visages/jeff-jardon.svg'" alt="Image de profil : Anne-lise Pricaz">
                        </div>
                        <div class="team-member-name">
                            <h2>Jeff Jardon</h2>
                        </div>
                        <div class="team-member-desc">
                            <h3>Développeur Web</h3>
                            <h4>Missions :</h4>
                            <ul>
                                <li>Intégration front-end</li>
                                <li>Intégration back-end</li>
                                <li>Sécurité et référencement</li>
                            </ul>
                        </div>
                        <div class="team-member-social-networks">
                            <a href="https://www.linkedin.com/in/jean-fran%C3%A7ois-jardon-273818113/" target="_blank">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="https://www.jeff-jardon.com/" target="_blank">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="page-credits-section-thanks">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-4">
                @while(have_posts())
                    @php(the_post())
                    {!! the_content() !!}
                @endwhile
            </div>
        </div>
    </section>
@endsection
