@php
$args = array(
    'post_type' => 'project',
    'orderby' => 'rand',
    'showposts' => 2,
    'post__not_in' => array($post->ID),
);

$the_query = new WP_Query($args);
@endphp
@if($the_query->have_posts()) 
    @while ($the_query->have_posts())
        @php($the_query->the_post())
        <div>
            <figure class="d-flex w-100 justify-content-center">
                <a style="max-width: 300px" href="{{ the_permalink() }}">
                    @if (has_post_thumbnail())
                        {{ the_post_thumbnail() }}
                    @else
                        <img src="{!! \App\App::get_default_image_article_thumbnail() !!}" alt="Image d'écriture d'un article wordpress">
                    @endif
                </a>
            </figure>
            <span class="line"></span>
        </div>
        <a href="{!! the_permalink()!!}"><h4>{!!  the_title() !!}</h4></a>
    @endwhile
    @php(wp_reset_postdata())
@else
    <p>Aucune actualité symilaire à afficher.</p>
@endif



