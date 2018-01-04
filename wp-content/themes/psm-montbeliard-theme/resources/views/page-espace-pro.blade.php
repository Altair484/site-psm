@extends('layouts.app')
@section('content')
    <section id="page_espace_pro_section_header" class="page-header">
        <div class="row header" style="background-image: url('{!! get_theme_mod('',\App\App::get_image_page_header('offer_page', 'jpg')) !!}')">
            <div class="filter"></div>
            <div class="header-content">
                <span class="d-flex justify-content-center" style="width: 100%;">
                    <div class="professional_page_header_section_img" style="width: 1px"></div>
                </span>
                <h1 class="professional_page_header_section_title">
                    {{ get_theme_mod(
                        'professional_page_header_section_title',
                        get_the_title()
                    ) }}
                </h1>
                <p class="formation professional_page_header_section_subtitle">
                    {{get_theme_mod(
                        'professional_page_header_section_subtitle',
                        'Travaillez avec nos étudiants'
                    )}}
                </p>
            </div>
        </div>
    </section>

    <section id="page-espace-pro-section-info" class="section-image-left-content-right">
        <div class="row justify-content-center align-items-center">
            <div class="content offset-0 offset-md-2 col-12 col-md-9">
                <div class="row">
                    <div class="picture col-12 col-md-3 no-padding">
                        <img src="http://via.placeholder.com/960x540" alt="">
                    </div>
                    <div class="text col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
                        <h2 class="professional_page_presentation_section_title">
                            {{ get_theme_mod(
                                'professional_page_presentation_section_title',
                                get_the_title()
                            ) }}
                        </h2>
                        <p class="professional_page_presentation_section_text">
                            {!! get_theme_mod(
                                'professional_page_presentation_section_text',
                                'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                 tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                 quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                 consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                 consequat, vel illum dolore eu feugiat nulla facilisis.'
                            ) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 header">
                <h2>Formulaire de dépôt d'une offre :</h2>
            </div>
        </div>
    </section>

    <section id="page-espace-pro-section-form">
        <div class="row">
            <div class="col-12 no-padding">
                {!! do_shortcode('[submit_job_form]') !!}
            </div>
        </div>
    </section>
@endsection

