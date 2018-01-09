@extends('layouts.app')
@section('content')

    <section id="projects-page-header" class="page-header">
        <div class="row header" style="background-image: url('{!! get_theme_mod('projets_rhizome_page_header_section_img',\App\App::get_image_page_header('projets_rhizome', 'jpg')) !!}')">
            <div class="filter"></div>
            <div class="header-content">
                <span class="d-flex justify-content-center" style="width: 100%;">
                    <div class="projets_rhizome_page_header_section_img" style="width: 1px"></div>
                </span>
                <h1 class="projets_rhizome_page_header_section_title">
                    {{ get_theme_mod(
                        'projets_rhizome_page_header_section_title',
                        get_the_title()
                    ) }}
                </h1>
                <p class="formation projets_rhizome_page_header_section_subtitle">
                    {{ get_theme_mod(
                        'projets_rhizome_page_header_section_subtitle',
                        'Master 1 PSM'
                    ) }}
                </p>
            </div>
        </div>
    </section>

    <section id="projects-page-presentation-section" class="section-image-left-content-right">
        <div class="row justify-content-center align-items-center">
            <div class="content offset-0 offset-md-2 col-12 col-md-9">
                <div class="row">
                    <div class="picture col-12 col-md-3 no-padding">
                        <img src="http://via.placeholder.com/960x540" alt="">
                    </div>
                    <div class="text col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
                        <h2 class="projets_rhizome_page_presentation_section_title">
                            {{ get_theme_mod(
                                'projets_rhizome_page_presentation_section_title',
                                'Lorem ipsum dolores'
                            ) }}
                        </h2>
                        <p class="projets_rhizome_page_presentation_section_text">
                            {!! get_theme_mod(
                                'projets_rhizome_page_presentation_section_text',
                                'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                 tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                 quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                 consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                 consequat, vel illum dolore eu feugiat nulla facilisis.'
                            ) !!}
                        </p>
                        <div class="btns-box">
                            <span class="projets_rhizome_page_presentation_section_link_page_master_1">
                                 <a class="btn btn-psm-green" href="{!! site_url() .'/?p='. get_theme_mod(
                                    'projets_rhizome_page_presentation_section_link_page_master_1',
                                    '4'
                                ) !!}">Master 1</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="projects-navigation" class="col-12">
                <h4>Sélectionne une année : </h4>
                <span class="d-flex justify-content-center" style="width: 100%;">
                    <div class="projets_rhizome_page_projects_section_years_dropdown_list" style="width: 1px"></div>
                </span>
                <select>
                    @php($option_number =  get_theme_mod('projets_rhizome_page_projects_section_years_dropdown_list','6'))
                    <option style="display: none"></option>
                    @for($i=$option_number-1; $i >= 0;  $i--)
                        <option value="{{ date('Y') - $i}}">{{ date('Y') - $i}}</option>
                    @endfor
                </select>
            </div>
        </div>
    </section>
    <div class="scrollToProjects"></div>
    <section class="noProjectsResults">
        Désolé, les projets de cette année n'ont pas encore été publiés.
    </section>
    @while($get_projects->have_posts()) @php($get_projects->the_post())
    @php( $year = get_post_meta(get_the_ID(),'_project_year',true))
    @php($site = get_post_meta(get_the_ID(),'_project_web_site',true))
    @php($video = get_post_meta(get_the_ID(),'_project_video',true))
    @if($get_projects->current_post % 2 == 0)
        @php($theme = wp_get_post_terms(get_the_ID(), 'project_theme')[0]->name)
        <section data-year="{{ $year }}" class="project section-image-right-content-left">
            <div class="row justify-content-center align-items-center">
                <article class="content col-12 col-md-9">
                    <div class="row">
                        <div class="text col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
                            <h2>{!! get_the_title() !!}</h2>
                            <p class="theme">Thème de l'année : {{ $theme }}</p>
                            {!! get_the_content() !!}
                            <div class="btns-box">
                                @if($site != null)
                                     <a class="btn btn-psm" href="{{ $site }}" target="_blank">Voir le site</a>
                                @endif
                                @if($video != null)
                                     <a class="btn btn-psm" href="{{ $video }}" target="_blank">Voir la vidéo</a>
                                @endif
                            </div>
                        </div>
                        <div class="picture col-12 col-md-3 no-padding">
                            {{ \App\App::get_image_projects() }}
                        </div>
                    </div>
                </article>
                <div class="col-md-2"></div>
            </div>
        </section>
    @else
        <section style="background-color: #17232d" data-year="{{ $year }}" class="project section-image-left-content-right">
            <div class="row justify-content-center align-items-center">
                <article class="content offset-0 offset-md-2 col-12 col-md-9">
                    <div class="row">
                        <div class="picture col-12 col-md-3 no-padding">
                            {{ \App\App::get_image_projects() }}
                        </div>
                        <div class="text col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
                            <h2>{!! get_the_title() !!}</h2>
                            <p class="theme">Thème de l'année : {{ $theme }}</p>
                            {!! get_the_content() !!}
                            <div class="btns-box">
                                @if($site != null)
                                    <a class="btn btn-psm" href="{{ $site }}" target="_blank">Voir le site</a>
                                @endif
                                @if($video != null)
                                    <a class="btn btn-psm" href="{{ $video }}" target="_blank">Voir la vidéo</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    @endif
    @endwhile
    @php(wp_reset_postdata())
@endsection