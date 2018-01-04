<header class="banner">
   {{-- <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>--}}
        <!-- Navigation Start -->
      <nav id="main-nav">
        <div class="burger" {!! is_admin_bar_showing() ? _e('style="top:46px;"') : null !!} >
          <a href="#" data-toggle="#main-nav" id="sidebar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </a>
        </div>
        <div id="sidebar" class="{{ $get_menu_class }}" {{ is_admin_bar_showing()? _e('style="top:32px;"') : null  }}>
          <div id="logo-psm-nav" >
            <img src="{!! _e(get_template_directory_uri().'/../dist/images/svg/psm-logo.svg') !!}" alt="Logo du menu PSM">
          </div>
            {{ \App\App::get_main_navigation() }}
        </div>
      </nav>
      <!-- Navigation End -->
</header>
<div id="loader-wrapper">
    <div id="loader">
    </div>
    <div class="txt">
        <p class="txt-perc">0%</p>
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

