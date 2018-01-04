{{\App\App::check_logged_in()}}
@extends('layouts.app')
@section('content')
    <section id="page_inscription_section_form">
        <div class="row">
            @if(get_option('users_can_register'))
                <form class="col-12 col-lg-6 col-xl-4" action="" method="post" name="user_registeration">
                    <img src="{!! _e(get_template_directory_uri().'/../dist/images/svg/psm-logo.svg') !!}" alt="Vignette d'inscription, image d'un étudiant.">

                    {{--Errors / Valdiation messages --}}
                    @if ($validate_fields)
                        <div class="form-errors">
                            @foreach ($validate_fields->get_error_messages() as $error)
                                <p> {{ $error }}</p>
                            @endforeach
                        </div>
                    @elseif(count($validate_fields) == 0 && isset($reg_errors)){
                    <p>Inscription réussie ! <a href="{{ home_url() }}/connexion">Connectez vous</a></p>
                    @endif
                    {{-- End Errors / Validation messages --}}

                    <div class="field_container">
                        <label for="register_first_name">Prénom<span style="color:#B81C23"> *</span></label>
                        <input id="register_first_name" type="text" placeholder="Prénom"  name='user_first_name' required="" value="@php(isset($_POST['user_first_name']) ? _e(esc_attr($_POST['user_first_name'])): _e(''))">
                    </div>
                    <div class="field_container">
                        <label for="register_last_name">Nom<span style="color:#B81C23"> *</span></label>
                        <input id="register_last_name" type="text" placeholder="Nom" name='user_last_name' required="" value="@php(isset($_POST['user_last_name']) ? _e(esc_attr($_POST['user_last_name'])): _e(''))">
                    </div>
                    <div class="field_container">
                        <label for="register_email">Email<span style="color:#B81C23"> *</span></label>
                        <input id="register_email" type="email" placeholder="Email" name='user_email' required="" value="@php(isset($_POST['user_email']) ? _e(esc_attr($_POST['user_email'])): _e(''))">
                    </div>
                    <div class="field_container">
                        <label for="register_login">Identifiant<span style="color:#B81C23"> *</span></label>
                        @if($username_cas == "undefined")
                            <input id="register_login" type="text" placeholder="Login"  name='user_login' required=""  value="@php(isset($_POST['user_login']) ? _e(esc_attr($_POST['user_login'])): '')">
                        @else
                            <input id="register_login" type="text" placeholder="Login"  name='user_login' required="" readonly value="@php(isset($_POST['user_login']) ? _e(esc_attr($_POST['user_login'])): _e($username_cas ))">
                            <small>Votre identifiant est votre login ent.</small>
                        @endif
                    </div>
                    <div class="field_container">
                        <label for="register_password">Mot de passe<span style="color:#B81C23"> *</span></label>
                        <input id="register_password" type="password" placeholder="Mot de passe" name='user_password' required="">
                    </div>
                    <div class="field_container">
                        <label for="register_password2">Confirmer mot de passe<span style="color:#B81C23"> *</span></label>
                        <input id="register_password2" type="password" placeholder="Mot de passe" name='user_password2' required="">
                    </div>
                    <div class="field_container">
                        <label for="register_formation">Formation actuelle<span style="color:#B81C23"> *</span></label>
                        <select id="register_formation" name="user_formation" required="">
                            @for ( $i = 0; $i < count(\App\Inscription::get_formation_names()); $i++ )

                                @php($formation_name = \App\Inscription::get_formation_names()[$i]->name)
                                @php($formation_post_value = $_POST['user_formation'])

                                <option value="{{ \App\Inscription::get_formation_names()[$i]->name}}" {{ $formation_post_value == $formation_name ? _e('selected'): null }}>
                                    {{ \App\Inscription::get_formation_names()[$i]->name }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="field_container">
                        <label for="studies_period">Période de formation<span style="color:#B81C23"> *</span></label>
                        <select id="studies_period" name="user_studies_period" required="">
                            @for ( $i = -5; $i < 0; $i++ )
                                @php($date_value = date('Y')+$i)
                                @php($date_value_plus_one = $date_value+1)
                                @php($dates_to_string = $date_value ."/". $date_value_plus_one)
                                @php($studies_period_post_value = $_POST['user_studies_period'])
                                <option value="{{ $date_value }}/{{$date_value_plus_one}}" {{ $studies_period_post_value == $dates_to_string ? _e('selected'): null }}>
                                    {{ _e('Promo - ') . $date_value}}/{{ $date_value_plus_one}}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="field_container">
                        <label for="register_key">Clé d'inscription<span style="color:#B81C23"> *</span></label>
                        <input id="register_key" type="text" placeholder="Clé d'inscription" name='auth_register_key' required="" value="<?php isset($_POST['auth_register_key']) ? _e(esc_attr($_POST['auth_register_key'])): _e('') ?>">
                        <small>La clé d'inscription est distribuée par la scolarité en chaque début d'année scolaire. Pour plus d'informations, vérifiez vos mails ou contactez la scolairté.</small>
                    </div>
                    <label class="hvr-skew-backward">
                        @php( wp_nonce_field( 'create_user_form_submit', 'djie3duhb3edub3u' ))
                        <input class="btn btn-psm-green" type="submit" value="Confirmer" name="submit">
                    </label>
                </form>
            @endif
        </div>
    </section>

@endsection

