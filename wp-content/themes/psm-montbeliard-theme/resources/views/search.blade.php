@extends('layouts.app')

@section('content')
    <section id="page-search-section-result">
        {{--@include('partials.page-header')--}}
        <div class="no-results">
            {!! get_search_form() !!}

            @if (!have_posts())
                <div style="margin-top: 20px" class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 d-flex align-items-center flex-column">
                    <h3>{{  __('Désolé, aucun résultat n\'a été trouvé 🙁', 'sage') }}</h3>
                </div>
            @else
                <div style="margin-top: 20px" class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 d-flex align-items-center flex-column">
                    <h3>{{ \App\App::title() }}</h3>
                </div>
            @endif
        </div>

        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 no-padding">
            @while(have_posts()) @php(the_post())
                @if (get_post_type() == 'job_listing' && !is_user_logged_in())

                @else
                    @include('partials.content-search')
                @endif
            @endwhile
        </div>
        <div class="d-flex justify-content-center">
            {!! the_posts_pagination(array('mid_size' => 0,'prev_text'=>'←','next_text'=>'→')) !!}
        </div>
    </section>
@endsection



