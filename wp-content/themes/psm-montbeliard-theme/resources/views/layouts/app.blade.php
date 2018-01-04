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
        @php(wp_footer())
    </body>
</html>
