<article @php(post_class('row'))>
    <div class="col-12 col-lg-6 col-xl-6 no-padding thumnail-search">
        <a href="@php(the_permalink())">
            @if (has_post_thumbnail())
                {{ the_post_thumbnail() }}
            @else
                <img src="{!! \App\App::get_default_image_article_thumbnail() !!}">
            @endif
        </a>
    </div>
    <div class="col-12 col-lg-6 col-xl-6 entry">
        <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
        <div class="entry-summary">
            @php(the_excerpt())
        </div>
     </div>
</article>
