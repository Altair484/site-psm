<?php
//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}
?>
<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
    <body @php(body_class('main-content'))>
        @php(do_action('get_header'))
        @include('partials.header')
            <div class="container-fluid no-padding">
                @yield('content')

                {{--@if (App\display_sidebar())
                  <aside class="sidebar">
                    @include('partials.sidebar')
                  </aside>
                @endif--}}

                @php(do_action('get_footer'))
                @include('partials.footer')
            </div>
        {{--<script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type": "EducationalOrganization",
            "name" : "Formation Produits et Services Multimédia",
            "url": "https://psm-montbeliard.fr"--}}{{--,
            "sameAs" : [
            "https://www.facebook.com/neumarkets",
            "https://www.instagram.com/neumarkets",
            "https://www.linkedin.com/company/neumarkets-inc-",
            "https://plus.google.com/+Neumarkets"
            ]--}}{{-- }
        </script>--}}

        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "HighSchool",
            "name" : "Formation Produits et Services Multimédia",
            "url": "https://psm-montbeliard.fr",
            "logo": "https://psm-montbeliard.fr/wp-content/themes/psm-montbeliard-theme/resources/assets/images/svg/psm-logo.svg",
            "image": "https://psm-montbeliard.fr/wp-content/themes/psm-montbeliard-theme/resources/assets/images/svg/psm-logo.svg",
            "description": "La formation Produits et Services Multimédia propose une Licence et un Master destiné à former les étudiants à la gestion de projet, la conception, le développement et la communication grâce à de nombreux enseignements de qualités et projets.",
            "telephone": "+33 3 81 99 46 62",
            "email": "scolaritem2i.stgi@univ-fcomte.fr",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Montbéliard",
                "addressRegion": "Franche-comté",
                "streetAddress": "4 place Tharradin",
                "postalCode": "25200"
            }
        }
        </script>
        @php(wp_footer())
    </body>
</html>
