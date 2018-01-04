{{{\App\App::check_not_logged_in()}}
@extends('layouts.app')
@section('content')
    <section id="job_single">
        <article>
            @while(have_posts())  @php(the_post())
                    @php(the_content())
            @endwhile
        </article>
    </section>
@endsection
