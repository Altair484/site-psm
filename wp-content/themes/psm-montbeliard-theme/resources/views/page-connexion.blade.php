{{\App\App::check_logged_in()}}
@extends('layouts.app')
@section('content')
<section id="connexion_page_section_form">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 col-xl-4 form-content">
            <img src="{!! _e(get_template_directory_uri().'/../dist/images/svg/psm-logo.svg') !!}" alt="Vignette de connexion, image d'un étudiant.">
            <!-- Errors section -->
            @if (is_wp_error($get_login_errors))
                @foreach($get_login_errors ->get_error_messages() as $error)
                    <div class="form-errors">
                            <p> {{ $error }}</p>
                    </div>
                @endforeach
            @endif

            <!-- Trys left -->
            @if($get_trys == 0 && get_option('activate_login_brute_force_protection') == 'true')
                <!-- Anti Brute force -->
                <div class="form-warning">
                    @if($get_remaining_time['minutes_showing'] == true)
                        <p class="anti-brute-force-message"><i class="fa fa-warning"></i> Connexion bloquée. Réésayez dans {{ $get_remaining_time['time_left'] }} minutes</p>
                    @else
                        <p class="anti-brute-force-message"><i class="fa fa-warning"></i> Connexion bloquée. Réésayez dans {{ $get_remaining_time['time_left'] }} secondes</p>
                    @endif
                </div>
            @else
                @if($_GET['justRegistered'] == "true")
                    <div class="job-manager-message">
                        <p>Votre compte vient d'être créé, vous pouvez vous connecter :)</p>
                    </div>
                @endif
                {{ \App\Connexion::login_form() }}
                <div class="login-links">
                    <a href="{!! site_url().'/mot-de-passe-oublie' !!}">Mot de passe oublié?</a> <span> / </span>
                    <a href="{!! wp_registration_url() !!}">Inscription</a>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection