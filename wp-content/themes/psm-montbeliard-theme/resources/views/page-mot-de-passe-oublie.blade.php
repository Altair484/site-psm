{{\App\App::check_logged_in()}}

@extends('layouts.app')
@section('content')
    <section id="mot_de_passe_oublie_page_section_form">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 col-xl-4 form-content">
                <img src="{!! _e(get_template_directory_uri().'/../dist/images/svg/psm-logo.svg') !!}" alt="Vignette de connexion, image d'un étudiant.">
                {{\App\Mot_de_passe_oublie::forgot_password()}}
                <form method="post">
                    <p>Veuillez saisir l'adresse e-mail de récupération du mot de passe.</p>
                    <p>
                        <label for="user_login">E-mail:</label>
                        @php( $user_email = isset( $_POST['user_email'] ) ? $_POST['user_email'] : '')
                        <input type="text" name="user_email" id="user_email" value="{{$user_email}}" /></p>
                    <p class="forgot-password-submit">
                        <input type="hidden" name="action" value="reset" />
                        <input type="submit" value="Réinitialiser le mot de passe" class="btn btn-psm-green" id="submit" />
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection