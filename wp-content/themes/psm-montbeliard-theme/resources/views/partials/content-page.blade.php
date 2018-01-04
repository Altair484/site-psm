<section id="page-news-single-section-header" class="page-header">
    @while(have_posts())  @php(the_post())
    <div class="row header" style="background-image: url('{!! get_theme_mod('theme',\App\App::get_default_image_page_header()) !!}')">
        <div class="filter"></div>
        <div class="header-content">
            <h1>{!! the_title()!!}</h1>
        </div>
    </div>
</section>
<section id="page-news-single-section-new-content" class="page-or-news-content">
    <article class="row">
        <div class="col-12 col-lg-8 col-xl-7 offset-xl-1 content">
            @php(edit_post_link())
            @php(the_content())
        </div>
        <div class="col-12 col-lg-4 col-xl-3 sidebar">
            <div class="other-news">
                @include('partials/social-medias')
                <h3>Découvrir nos articles</h3>
                @include('partials/random-posts')
            </div>
        </div>
    </article>
    @endwhile
</section>