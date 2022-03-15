<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Admin</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <script>
        var currentURL = '{{ App\Helpers\Helper::Url() }}';

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- //custom-theme -->
    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/component.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/export.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/flipclock.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/circles.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/style_grid.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

    <!-- font-awesome-icons -->
    <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <style>
        .imgPreview img {
            padding: 10px;
            max-width: 100px;
        }

        .prdimgPreview img {
            position: relative;
            left: 80px;
            top: 2px;

            padding: 10px;
            max-width: 100px;
        }

    </style>
</head>


<body>
    <div class="wthree_agile_admin_info">
        <div class="w3_agileits_top_nav">
            <ul id="gn-menu" class="gn-menu-main">
                @include('admin.theme.sidebar')
                @include('admin.theme.header')
                <li class="second full-screen">
                    <section class="full-top">
                        <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                    </section>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="inner_content">
            <div class="inner_content_w3_agile_info">

                @yield('content')
                <div class="agile_top_w3_post_sections">
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    @include('admin.theme.footer')

    <script type="text/javascript" src="{{ asset('admin/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('admin/js/amcharts.js') }}"></script>
    <script src="{{ asset('admin/js/serial.js') }}"></script>
    <script src="{{ asset('admin/js/export.js') }}"></script>
    <script src="{{ asset('admin/js/light.js') }}"></script>
    <!-- //amcharts -->
    {{-- <script src="{{ asset('admin/js/chart1.js') }}"></script> --}}
    <script src="{{ asset('admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/modernizr.custom.js') }}"></script>

    <script src="{{ asset('admin/js/classie.js') }}"></script>
    <script src="{{ asset('admin/js/gnmenu.js') }}"></script>
    <script>
        new gnMenu(document.getElementById('gn-menu'));

    </script>
    <!-- /circle-->
    <script type="text/javascript" src="{{ asset('admin/js/circles.js') }}"></script>

    <script src="{{ asset('admin/js/skycons.js') }}"></script>
    <script>
        var icons = new Skycons({
                "color": "#fcb216"
            }),
            list = [
                "partly-cloudy-day"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);
        icons.play();

    </script>
    <script>
        var icons = new Skycons({
                "color": "#fff"
            }),
            list = [
                "clear-night", "partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind", "fog"
            ],
            i;
        for (i = list.length; i--;)
            icons.set(list[i], list[i]);
        icons.play();

    </script>
    <script src="{{ asset('admin/js/screenfull.js') }}"></script>
    <script>
        $(function() {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }
            $('#toggle').click(function() {
                screenfull.toggle($('#container')[0]);
            });
        });

    </script>
    <script src="{{ asset('admin/js/bars.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-3.1.1.min.js') }}"></script>
    <script>
        var Project_Url = '{{ env('Project_Url') }}';

    </script>
    {{-- Session Message --}}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>
