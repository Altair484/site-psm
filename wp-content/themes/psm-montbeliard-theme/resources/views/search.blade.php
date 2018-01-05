@extends('layouts.app')

@section('content')
    <section id="page-search-section-result">
        @include('partials.page-header')
        @if (!have_posts())
            <div class="alert alert-warning">
                {{  __('Désolé, aucun résultat n\'a été trouvé', 'sage') }}
            </div>
            {{--{!! get_search_form(false) !!}--}}
        @endif

        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            @while(have_posts()) @php(the_post())
            @include('partials.content-search')
            @endwhile
        </div>
        {!! get_the_posts_navigation() !!}
    </section>
@endsection



