@extends('layouts.app')

@section('content')
    <!-- Background video section start -->
    <section class="psm-formations-background-video-section">
        <div class="losange"></div>
        <div class="losange"></div>
        <div class="video-background" >
            <div class="video-foreground">
                <div class="filter"></div>
                <div id="player"></div>
            </div>
        </div>
        <h1 class="licence-page-section-header-title"><i class="fa fa-graduation-cap"></i>&nbsp;{{ get_theme_mod('licence_page_header_section_title', get_the_title().' 3 Produits et Services Multimédia') }}</h1>
        <div class="mouse">
            <div class="scroll"></div>
        </div>
    </section>
    <!-- Background video section end -->

    <div id="licence">
        <section class="psm-formations-presentation-section section-image-left-content-right">
            <div class="row justify-content-center align-items-center">
                <div class="content offset-0 offset-md-1 col-12 col-md-10">
                    <div class="row">
                        <div class="picture col-12 offset-md-1 col-md-3 no-padding">
                            {!! get_template_part('/assets/images/svg/inline', 'anlic1.svg') !!}
                        </div>
                        <div class="text col-12 col-md-8 d-flex justify-content-center align-items-start flex-column">
                            <h2 class="licence_page_presentation_section_title">
                                {{ get_theme_mod(
                                    'licence_page_presentation_section_title',
                                    'La licence en bref'
                                ) }}
                            </h2>
                            <p class="licence_page_presentation_section_text">
                                {!! get_theme_mod(
                                    'licence_page_presentation_section_text',
                                    'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                     tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                     quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                     consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                     consequat, vel illum dolore eu feugiat nulla facilisis.'
                                ) !!}
                            </p>
                            <span class="licence_page_presentation_section_admission_link">
                                <a class="btn btn-psm" href="{!! get_theme_mod(
                                    'licence_page_presentation_section_admission_link',
                                    '#'
                                ) !!}" target="_blank">ADMISSION
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="psm-formations-programme-section">
            <div class="row header">
                <div class="col-12">
                    <h2 class="licence_page_programme_section_title">
                        {{ get_theme_mod(
                            'licence_page_programme_section_title',
                            'Programme'
                        ) }}
                    </h2>
                    <h3>Développement</h3>
                </div>
            </div>
            <div class="row programme-container">
                <div class="row programme-content ">
                    <div class="losanges-container col-12 col-lg-6 no-padding">
                        <div class="losange-origine">
                            <div class="losange active">
                                <i class="fa fa-code"></i>
                                <h4>{!! $get_school_subjects_list[1]->name !!}</h4>
                            </div>
                            <div class="losange no-hover">
                            </div>
                            <div class="losange">
                                <i class="fa fa-plus"></i>
                                <h4>{!! $get_school_subjects_list[0]->name !!}</h4>
                            </div>
                            <div class="losange">
                                <i class="fa fa-tasks"></i>
                                <h4>{!! $get_school_subjects_list[2]->name !!}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- ACCORDEON DEVELOPPEMENT -->
                    <div class="accordeon-container col-12 col-lg-6 no-padding">
                        <div class="accordeon">
                            @while($get_programme_licence_3['school-subject-dev']->have_posts())
                                @php
                                    $get_programme_licence_3['school-subject-dev']->the_post();
                                    $ue = get_the_terms($get_programme_licence_3['school-subject-dev']->ID, 'unite-enseignement')[0]->name;
                                @endphp
                                <div class="accordeon-title">
                                    <h4 >{{ get_the_title() }}</h4>
                                    <i class="fa"></i>
                                </div>

                                <div class="accordeon-content" >
                                    <p class="unite-enseignement">Unité d'enseignement : {!! ($ue != null) ? _e($ue) : 'Non renseignée'  !!}</p>
                                    <hr>
                                    {!! wpautop( get_the_content() ) !!}
                                </div>
                            @endwhile
                        </div>
                        <!-- END  ACCORDEON DEVELOPPEMENT-->

                        <!-- ACCORDEON GESTION DE PROJETS-->
                        <div class="accordeon">
                            @while($get_programme_licence_3['school-subject-project-managment']->have_posts())
                                @php
                                    $get_programme_licence_3['school-subject-project-managment']->the_post();
                                    $ue = get_the_terms($get_programme_licence_3->ID, 'unite-enseignement')[0]->name;
                                @endphp
                                <div class="accordeon-title">
                                    <h4 >{{ get_the_title() }}</h4>
                                    <i class="fa"></i>
                                </div>

                                <div class="accordeon-content">
                                    <p class="unite-enseignement">Unité d'enseignement : {!! ($ue != null) ? _e($ue) : 'Non renseignée'  !!}</p>
                                    <hr>
                                    {!! wpautop( get_the_content() ) !!}
                                </div>
                            @endwhile

                        </div>
                        <!-- END  ACCORDEON GESTION DE PROJETS-->

                        <!-- ACCORDEON AUTRES-->
                        <div class="accordeon">
                            {{--Todo: Remplacer "school-subject-others" par le vrai nom--}}
                            @while($get_programme_licence_3['school-subject-others']->have_posts())
                                @php
                                    $get_programme_licence_3['school-subject-others']->the_post();
                                    $ue = get_the_terms($get_programme_licence_3->ID, 'unite-enseignement')[0]->name;
                                @endphp
                                <div class="accordeon-title">
                                    <h4 >{{ get_the_title() }}</h4>
                                    <i class="fa"></i>
                                </div>

                                <div class="accordeon-content">
                                    <p class="unite-enseignement">Unité d'enseignement : {!! ($ue != null) ? _e($ue) : 'Non renseignée'  !!}</p>
                                    <hr>
                                    {!! wpautop( get_the_content() ) !!}
                                </div>
                            @endwhile
                        </div>
                        @php(wp_reset_postdata())
                    </div>
                    <!-- END  ACCORDEON AUTRES-->
                </div>
            </div>
        </section>

        <section class="psm-formations-project-section section-image-right-content-left">
            <div class="row justify-content-center align-items-center">
                <div class="content col-12 col-md-9">
                    <div class="row">
                        <div class="text col-12 col-md-9 d-flex justify-content-center align-items-start flex-column">
                            <h2 class="licence_page_projects_section_title">
                                {{ get_theme_mod(
                                   'licence_page_projects_section_title',
                                   'Des formations orientées projet !'
                               ) }}
                            </h2>
                            <p class="licence_page_projects_section_text">
                                {!! get_theme_mod(
                                    'licence_page_projects_section_text',
                                    'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                     tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                     quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                     consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                     consequat, vel illum dolore eu feugiat nulla facilisis.'
                                )!!}
                            </p>
                            {{--<div class="btns-box">
                                <span class="licence_page_projects_section_link_page_opi">
                                     <a class="btn btn-psm-white" href="{!! site_url() .'/?p='. get_theme_mod(
                                        'licence_page_projects_section_link_page_opi',
                                        ''
                                    ) !!}">Projets OPI</a>
                                </span>
                            </div>--}}
                        </div>
                        <div class="picture col-12 col-md-3">
                            {!! get_template_part('/assets/images/svg/inline', 'anlic2.svg') !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </section>

        <section class="psm-formations-testimony-section">
            <div class="row header">
                <div class="col-12">
                    <h2 class="licence_page_testimony_section_title">
                        {{ get_theme_mod(
                           'licence_page_testimony_section_title',
                           'Ils sont passés par PSM'
                        ) }}
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="hexagone-container">
                    <div class="hexagone-item">
                        <div class="hexagone">
                            <div class="hexagone-texts">
                                <blockquote class="citation licence_page_testimony_section_quote_first_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_quote_first_student',
                                       '"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla"'
                                    ) }}
                                </blockquote>
                                <h4 class="name-student licence_page_testimony_section_name_first_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_name_first_student',
                                       'First Student Name'
                                    ) }}
                                </h4>
                                <p class="licence_page_testimony_section_work_first_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_work_first_student',
                                       'First Student Work'
                                    ) }}
                                </p>
                                <p class="licence_page_testimony_section_promo_first_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_promo_first_student',
                                       'First Student Promo'
                                    ) }}
                                </p>
                            </div>
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        <div class="hexagone">
                            <div class="hexagone-texts">
                                <blockquote class="citation licence_page_testimony_section_quote_second_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_quote_first_student',
                                       '"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla"'
                                    ) }}
                                </blockquote>
                                <h4 class="name-student licence_page_testimony_section_name_second_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_name_second_student',
                                       'Second Student Name'
                                    ) }}
                                </h4>
                                <p class="licence_page_testimony_section_work_second_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_work_second_student',
                                       'Second Student Work'
                                    ) }}
                                </p>
                                <p class="licence_page_testimony_section_promo_second_student">
                                    {{ get_theme_mod(
                                       'licence_page_testimony_section_promo_second_student',
                                       'Second Student Promo'
                                    ) }}
                                </p>
                            </div>
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        @php($image_hex_1 = get_theme_mod('licence_page_testimony_section_image_first_student', get_template_directory_uri(). '/../dist/images/user_graduated.png'))
                        <div class="hexagone img--1 licence_page_testimony_section_image_first_student" style="background-image: url('{{$image_hex_1}}')">
                            <div class="hexTop licence_page_testimony_section_image_first_student" style="background-image: url('{{$image_hex_1}}')"></div>
                            <div class="hexBottom licence_page_testimony_section_image_first_student"style="background-image: url('{{$image_hex_1}}')"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        <div class="hexagone">
                            <div class="hexagone-texts">
                                <h3 class="exergue-number">
                                    Plus de <br />
                                    <span class="licence_page_testimony_section_number_graduated">
                                     {{ get_theme_mod(
                                       'licence_page_testimony_section_number_graduated',
                                       '500'
                                     )}}
                                    </span><br />
                                    diplômés en
                                    <span class="licence_page_testimony_section_number_years">
                                     {{ get_theme_mod(
                                       'licence_page_testimony_section_number_years',
                                       '15'
                                     )}}
                                    </span> ans.
                                </h3>
                            </div>
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                        </div>
                    </div>

                    <div class="hexagone-item">
                        @php($image_hex_2 = get_theme_mod('licence_page_testimony_section_image_second_student', get_template_directory_uri(). '/../dist/images/user_graduated.png'))
                        <div class="hexagone img--1 licence_page_testimony_section_image_second_student" style="background-image: url('{{$image_hex_2}}')">
                            <div class="hexTop licence_page_testimony_section_image_second_student" style="background-image: url('{{$image_hex_2}}')"></div>
                            <div class="hexBottom licence_page_testimony_section_image_second_student"style="background-image: url('{{$image_hex_2}}')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript"> var you_video_tube_id = '{{ get_theme_mod('licence_page_header_section_video_id','rY1iA0ulO-0')}}'</script>
    <script type="text/javascript"> var theme_url = '{{ get_template_directory_uri() }}';</script>
    <script type="text/javascript" src="{!!  get_template_directory_uri() . '/assets/scripts/you-tube-api.js' !!}"></script>
@endsection