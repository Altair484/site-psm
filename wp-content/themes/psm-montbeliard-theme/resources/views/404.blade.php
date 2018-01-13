@extends('layouts.app')

@section('content')
    <section id="page-404">
        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 no-results d-flex align-items-center flex-column">
            <h3>{{  __(App::title() , 'sage') }}</h3>
            <p>Tentez votre chance avec la recherche !</p>
            {!! get_search_form() !!}
        </div>
    </section>
@endsection
