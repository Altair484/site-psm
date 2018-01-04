@php

$args = array(
    'post_type' => 'post',
    'orderby' => 'rand',
    'showposts' => 2,
);

$the_query = new WP_Query($args);
@endphp
@if($the_query->have_posts()) 
    @while ($the_query->have_posts())
        @php($the_query->the_post())
        <div class="thumbnail">
            <figure>
                <a href="{!!  get_the_permalink() !!}">
                    @php($default_img = get_template_directory_uri().'/../dist/images/960-540-abstract-'. rand(1,6).'.jpg')
                    @if (has_post_thumbnail())
                        {{ the_post_thumbnail() }}
                    @else
                        <img src="{{ $default_img }}">
                    @endif
                </a>
            </figure>
            <span class="line"></span>
        </div>
        <a href="{!! the_permalink()!!}"><h4>{!!  the_title() !!}</h4></a>
    @endwhile
    @php(wp_reset_postdata())
@else
    <p>Il n'y a pas d'actualité pour ce post.</p>
@endif



