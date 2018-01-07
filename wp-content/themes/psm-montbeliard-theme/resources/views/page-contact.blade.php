@extends('layouts.app')
@section('content')
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.43.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.43.0/mapbox-gl.css' rel='stylesheet' />
<style>
    body { margin:0; padding:0; }
    #map { position:absolute; top:0; bottom:0; width:100%; }
    .marker {
        z-index: 10;
        display: block;
        width: 30px;
        height: auto;
        border: none;
        cursor: pointer;
        background-repeat: no-repeat;
        padding: 0;
    }
</style>

<section id="page-contact-section-map" class="page-header">
    <div class="row header">
        <div class="filter"></div>
        <div class="header-content">
            <h1><?php echo the_title() ?></h1>
        </div>
        <div id="map"></div>
    </div>
</section>

<section id="page-contact-section-contact-form">
    <div class="row">
        <div class="col-12 col-xl-8 offset-xl-3 no-padding">
            {!! do_shortcode('[contact-form-7 id="2256" title="Formulaire de contact"]') !!}
        </div>
    </div>

</section>
<script type="text/javascript"> var image_marker_url = 'url({{get_theme_file_uri()}}/dist/images/svg/psm-logo.svg)' </script>
<script type="text/javascript" src="{!!  get_template_directory_uri() . '/assets/scripts/mapbox-api-contact.js' !!}"></script>
@endsection


