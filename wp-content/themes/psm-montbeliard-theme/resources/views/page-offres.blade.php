{{\App\App::check_not_logged_in()}}
@extends('layouts.app')
@section('content')

    <section id="page_offer_section_header" class="page-header">
        <div class="row header" style="background-image: url('{!! get_theme_mod('',\App\App::get_image_page_header('offer_page', 'jpg')) !!}')">
            <div class="filter"></div>
            <div class="header-content">
                <span class="d-flex justify-content-center" style="width: 100%;">
                    <div class="offer_page_header_section_img" style="width: 1px"></div>
                </span>
                <h1 class="offer_page_header_section_title">
                    {{ get_theme_mod(
                        'offer_page_header_section_title',
                        get_the_title()
                    ) }}
                </h1>
                <p class="formation offer_page_header_section_subtitle">
                    {{get_theme_mod(
                        'offer_page_header_section_subtitle',
                        'Consultez nos offres de stage, CDI ou CDD.'
                    )}}
                </p>
            </div>
        </div>
    </section>

    {{--See job_manager/job-filters.php--}}
    {!! do_shortcode('[jobs]') !!}
@endsection

