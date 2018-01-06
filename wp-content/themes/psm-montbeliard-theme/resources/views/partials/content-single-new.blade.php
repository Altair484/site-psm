<section id="page-news-single-section-header" class="page-header">
    @while(have_posts())  @php(the_post())
    <div class="row header" style="background-image: url('{!! \App\App::get_image_page_header() !!}')">
        <div class="filter"></div>
        <div class="header-content">
            <h1>{!! the_title()!!}</h1>
            <p class="date">{!!  get_the_date() !!}</p>
            <p class="author">{!! get_the_author_meta( 'first_name' ). ' ' . get_the_author_meta( 'last_name' ) !!}</p>
        </div>
    </div>
</section>
<section id="page-news-single-section-new-content" class="page-or-news-content">
    <article class="row">
        <div class="col-12 col-lg-8 col-xl-7 offset-xl-1 content">
            @php(edit_post_link())
            @php(the_content())
            {!! get_the_post_navigation( array(
                    'prev_text' => '<span class="btn btn-psm"><i class="fa fa-arrow-left"></i> Précédent</span>',
                    'next_text' => '<span class="btn btn-psm">Suivant <i class="fa fa-arrow-right"></i></span>',
                    'screen_reader_text' => __( 'Continuez de lire' ),
            ))!!}
        </div>
        <div class="col-12 col-lg-4 col-xl-3 sidebar">
            <div class="post-tags">
                @php ($posttags = get_the_tags())
                @if ($posttags)
                    @foreach($posttags as $key => $value)
                        @if ($key <= 8)
                            <span {{--href="{{ get_tag_link($value->term_id) }}"--}} class="tag"><i class="fa fa-tag"></i> {!!  $value->name !!}</span>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="other-news">
                @include('partials/social-medias')
                <h3>Autres articles</h3>
                @include('partials/random-posts')
            </div>
        </div>
    </article>
    @endwhile
</section>