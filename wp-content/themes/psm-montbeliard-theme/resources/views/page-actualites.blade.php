@extends('layouts.app')

@section('content')
    @php
        if($get_current_page_index  > $load_news->max_num_pages){
            exit('La page que vous cherchez n\'existe pas');
        }
    @endphp

    <section id="page_news_section_header" class="page-header">
        <div class="row header" style="background-image: url('{!! get_theme_mod('',\App\App::get_image_page_header()) !!}')">
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
                        'Les dernières nouveautés de la formation'
                    )}}
                </p>
            </div>
        </div>
    </section>

    <section id="page-news-section-news">
        <div class="row">
            @while ($load_news->have_posts())
                @php($load_news->the_post())
                @if ( $load_news->current_post < $get_max_post_per_page )
                    @include('partials.content-news')
                @endif
		    @endwhile
            @php(wp_reset_postdata())

        </div>
        <div class="row">
            <nav class="w-100 d-flex justify-content-center align-items-center">
                <ul class="posts-navigation">
                    @if($load_news->max_num_pages > 0)
                        <li>
                            {!! get_previous_posts_link( __('&larr; Précédent', 'sage') ) !!}
                        </li>
                        <li>
                            {!! get_next_posts_link( __('Suivant &rarr;', 'sage'), $load_news->max_num_pages ) !!}
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </section>
@endsection
