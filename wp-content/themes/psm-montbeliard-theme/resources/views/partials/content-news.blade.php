<article class="news col-12 col-sm-6 col-xl-3 no-padding">
    <div class="thumbnail">
        <a href="@php(the_permalink())">
            @if (has_post_thumbnail())
                {{ the_post_thumbnail() }}
            @else
                <img src="{!! \App\App::get_default_image_article_thumbnail() !!}">
            @endif
        </a>
        <span class="line"></span>
    </div>
    <div class="text-news-container col-12">
        <h3 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h3>
        <p class="date">{!! get_the_date() !!}</p>
        <p class="excerpt">{!! get_the_excerpt() !!}</p>
    </div>
</article>