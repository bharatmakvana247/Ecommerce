<!doctype html>
<html class="no-js" lang="en">
@include('user.theme.header_script')

<body class="wide-layout">
    <div class="wrapper">
        @include('user.theme.header')

        <section id="page-content" class="page-wrapper section">
            @if (Route::current()->uri() != 'userside')
                @include('user.theme.bread')
            @endif

            @yield('mainContent')
        </section>
        @include('user.theme.sidebar')
        @include('user.theme.footer')
    </div>
    @include('user.theme.footer_script')
</body>

</html>
