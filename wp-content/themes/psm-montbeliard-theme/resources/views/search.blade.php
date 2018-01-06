@extends('layouts.app')

@section('content')
    <section id="page-search-section-result">
        @include('partials.page-header')
        @if (!have_posts())
            <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 no-results d-flex align-items-center flex-column">
                <h3>{{  __('Désolé, aucun résultat n\'a été trouvé 🙁', 'sage') }}</h3>
                <p>Essayez à nouveau </p>
                {!! get_search_form() !!}
            </div>
        @endif

        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2 no-padding">
            @while(have_posts()) @php(the_post())
                @if (get_post_type() == 'job_listing' && !is_user_logged_in())

                @else
                    @include('partials.content-search')
                @endif
            @endwhile
        </div>
        <div class="d-flex justify-content-center">
            {!! get_the_posts_navigation() !!}
        </div>
    </section>
@endsection



