@php($site = get_post_meta(get_the_ID(),'_project_web_site',true))
@php($video = get_post_meta(get_the_ID(),'_project_video',true))
@php($year= get_post_meta(get_the_ID(),'_project_year',true))
@php($term = wp_get_post_terms(get_the_ID(), 'project_type'))

<section id="page-section-header" class="page-header">
    <div class="row header" style="background-image: url('{!! get_theme_mod('theme',\App\App::get_image_page_header()) !!}')">
        <div class="filter"></div>
        <div class="header-content">
            <h1>{!! the_title()!!}</h1>
            @if(get_post_type() == 'project')
                <p class="date">{!!  $term[0]->name !!}</p>
                <p>{!! $year !!}</p>
            @endif
        </div>
    </div>
</section>
<section id="page-section-content" class="page-or-news-content">
    @while(have_posts())  @php(the_post())
        <article class="row">
            <div class="col-12 col-lg-8 col-xl-7 offset-xl-1 content">
                @php(edit_post_link())
                @if(get_post_type() == 'project')
                    <div class="w-100 d-flex justify-content-center">
                        {{the_post_thumbnail('medium')}}
                    </div>
                @endif
                @php(the_content())
                @if(get_post_type() == 'project')
                    <div class="w-100 d-flex justify-content-center flex-wrap">
                        @if($site != null)
                            <a style="margin-right: 7px;margin-left:7px" class="btn btn-psm" href="{{ $site }}" target="_blank">Voir le site</a>
                        @endif
                        @if($video != null)
                            <a style="margin-right: 7px;margin-left:7px" class="btn btn-psm" href="{{ $video }}" target="_blank">Voir la vidéo</a>
                        @endif
                    </div>
                @endif
            </div>
            <div class="col-12 col-lg-4 col-xl-3 sidebar">
                <div class="other-news">
                    @include('partials/social-medias')

                    @if(get_post_type() == 'project')
                        <h3>Découvrir d'autres projets</h3>
                        @include('partials/random-projects')
                    @else
                        <h3>Découvrir nos articles</h3>
                        @include('partials/random-posts')
                    @endif

                </div>
            </div>
        </article>
    @endwhile
</section>