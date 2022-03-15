<!DOCTYPE html>
<html lang="en">

<head>
    <title>Esteem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/component.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/export.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/flipclock.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/circles.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/style_grid.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Alpine Js CDSN --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    <div class="wthree_agile_admin_info">
        <div class="w3_agileits_top_nav">
            <ul id="gn-menu" class="gn-menu-main">
                @include('admin.theme.sidebar')
                @include('admin.theme.header')
                <li class="second full-screen">
                    {{-- <section class="full-top">
                        <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                    </section> --}}
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="inner_content">
            <div class="inner_content_w3_agile_info">
                <div class="agile_top_w3_grids">
                    <h1> Comming Soon...</h1>
                    {{ App\Helpers\Helper::Url() }}
                    <html>
                    <h1 x-data="{ message: 'I ❤️ Laravel' }" x-text="message"></h1>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.theme.footer')
    <script src="{{ asset('admin/js/classie.js') }}"></script>
    <script src="{{ asset('admin/js/gnmenu.js') }}"></script>
    <script>
        new gnMenu(document.getElementById('gn-menu'));

    </script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-3.1.1.min.js') }}"></script>
    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

    </script>

</body>

</html>
