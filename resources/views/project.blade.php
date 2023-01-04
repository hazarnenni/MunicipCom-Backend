<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">

<head>
    <title>@yield('page_title', setting('admin.title') . ' - ' . setting('admin.description'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="assets-path" content="{{ route('voyager.voyager_assets') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">


    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
    ">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if ($admin_favicon == '')
        <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif



    <!-- App CSS -->
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">

    @yield('css')
    @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif

    <!-- Few Dynamic Styles -->
    <style type="text/css">
        .voyager .side-menu .navbar-header {
            background: {{ config('voyager.primary_color', '#22A7F0') }};
            border-color: {{ config('voyager.primary_color', '#22A7F0') }};
        }

        .widget .btn-primary {
            border-color: {{ config('voyager.primary_color', '#22A7F0') }};
        }

        .widget .btn-primary:focus,
        .widget .btn-primary:hover,
        .widget .btn-primary:active,
        .widget .btn-primary.active,
        .widget .btn-primary:active:focus {
            background: {{ config('voyager.primary_color', '#22A7F0') }};
        }

        .voyager .breadcrumb a {
            color: {{ config('voyager.primary_color', '#22A7F0') }};
        }

        .card-body {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 50px;
        }

        /*----  Main Style  ----*/
        #cards_landscape_wrap-2 {
            text-align: center;
            background: #F7F7F7;

        }

        #cards_landscape_wrap-2 .container {
            padding-top: 30px;
            padding-bottom: 100px;
        }

        #cards_landscape_wrap-2 a {
            text-decoration: none;
            outline: none;
        }

        #cards_landscape_wrap-2 .card-flyer {
            border-radius: 5px;
        }

        #cards_landscape_wrap-2 .card-flyer .image-box {
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.50);
            border-radius: 5px;
        }

        #cards_landscape_wrap-2 .card-flyer .image-box img {
            -webkit-transition: all .9s ease;
            -moz-transition: all .9s ease;
            -o-transition: all .9s ease;
            -ms-transition: all .9s ease;
            width: 100%;
            height: 200px;
        }

        #cards_landscape_wrap-2 .card-flyer:hover .image-box img {
            opacity: 0.7;
            -webkit-transform: scale(1.15);
            -moz-transform: scale(1.15);
            -ms-transform: scale(1.15);
            -o-transform: scale(1.15);
            transform: scale(1.15);
        }

        #cards_landscape_wrap-2 .card-flyer .text-box {
            text-align: center;
        }

        #cards_landscape_wrap-2 .card-flyer .text-box .text-container {
            padding: 30px 18px;
        }

        #cards_landscape_wrap-2 .card-flyer {
            background: #FFFFFF;
            margin-top: 50px;
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.40);
        }

        #cards_landscape_wrap-2 .card-flyer:hover {
            background: #fff;
            box-shadow: 0px 15px 26px rgba(0, 0, 0, 0.50);
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            margin-top: 50px;
        }

        #cards_landscape_wrap-2 .card-flyer .text-box p {
            margin-top: 10px;
            margin-bottom: 0px;
            padding-bottom: 0px;
            font-size: 14px;
            letter-spacing: 1px;
            color: #000000;
        }

        #cards_landscape_wrap-2 .card-flyer .text-box h6 {
            margin-top: 0px;
            margin-bottom: 4px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            font-family: 'Roboto Black', sans-serif;
            letter-spacing: 1px;
            color: #22A7F0;
        }
    </style>

    @if (!empty(config('voyager.additional_css')))
        <!-- Additional CSS -->
        @foreach (config('voyager.additional_css') as $css)
            <link rel="stylesheet" type="text/css" href="{{ asset($css) }}">
        @endforeach
    @endif

    @yield('head')
</head>

<body class="voyager @if (isset($dataType) && isset($dataType->slug)) {{ $dataType->slug }} @endif">

    {{-- loader here --}}

    <?php
    if (\Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'http://') || \Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'https://')) {
        $user_avatar = Auth::user()->avatar;
    } else {
        $user_avatar = Voyager::image(Auth::user()->avatar);
    }

    use App\Models\Project;

    $project = Project::all();

    ?>

    <div class="app-container">
        <div class="fadetoblack visible-xs"></div>
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button class="hamburger btn-link">
                            <span class="hamburger-inner"></span>
                        </button>
                        @section('breadcrumbs')
                            <ol class="breadcrumb hidden-xs">
                                @php
                                    $segments = array_filter(explode('/', str_replace(route('voyager.dashboard'), '', Request::url())));
                                    $url = route('voyager.dashboard');
                                @endphp
                                @if (count($segments) == 0)
                                    <li class="active"><i class="voyager-boat"></i> {{ __('voyager::generic.dashboard') }}
                                    </li>
                                @else
                                    <li class="active">
                                        <a href="{{ route('voyager.dashboard') }}"><i class="voyager-boat"></i>
                                            {{ __('voyager::generic.dashboard') }}</a>
                                    </li>
                                    @foreach ($segments as $segment)
                                        @php
                                            $url .= '/' . $segment;
                                        @endphp
                                        @if ($loop->last)
                                            <li>{{ ucfirst(urldecode($segment)) }}</li>
                                        @else
                                            {{-- <li>
                                                <a href="{{ $url }}">{{ ucfirst(urldecode($segment)) }}</a>
                                            </li> --}}
                                        @endif
                                    @endforeach
                                @endif
                            </ol>
                        @show
                    </div>
                    <ul class="nav navbar-nav @if (__('voyager::generic.is_rtl') == 'true') navbar-left @else navbar-right @endif">
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                                aria-expanded="false"><img src="{{ $user_avatar }}" class="profile-img"> <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-animated">
                                <li class="profile-img">
                                    <img src="{{ $user_avatar }}" class="profile-img">
                                    <div class="profile-body">
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <h6>{{ Auth::user()->email }}</h6>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <?php $nav_items = config('voyager.dashboard.navbar_items'); ?>
                                @if (is_array($nav_items) && !empty($nav_items))
                                    @foreach ($nav_items as $name => $item)
                                        <li {!! isset($item['classes']) && !empty($item['classes']) ? 'class="' . $item['classes'] . '"' : '' !!}>
                                            @if (isset($item['route']) && $item['route'] == 'voyager.logout')
                                                <form action="{{ route('voyager.logout') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-block">
                                                        @if (isset($item['icon_class']) && !empty($item['icon_class']))
                                                            <i class="{!! $item['icon_class'] !!}"></i>
                                                        @endif
                                                        {{ __($name) }}
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : (isset($item['route']) ? $item['route'] : '#') }}"
                                                    {!! isset($item['target_blank']) && $item['target_blank'] ? 'target="_blank"' : '' !!}>
                                                    @if (isset($item['icon_class']) && !empty($item['icon_class']))
                                                        <i class="{!! $item['icon_class'] !!}"></i>
                                                    @endif
                                                    {{ __($name) }}
                                                </a>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            @include('voyager::dashboard.sidebar')
            @section('content')
                <div class="page-content">
                    <div class="analytics-container">
                        <!-- Topic Cards -->
                        <div id="cards_landscape_wrap-2">

                            <div class="container">
                                <div class="card">
                                    <div class="card-body">جميع المشاريع</div>
                                </div>

                                <div class="row">
                                    @foreach ($project as $item)
                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                            <a href="">
                                                <div class="card-flyer">
                                                    <div class="text-box">
                                                        <div class="image-box">
                                                            <img src="{{ Voyager::image($item->photo) }}" alt="" />
                                                        </div>
                                                        <div class="text-container">
                                                            <h6>{{ $item->label }}</h6>
                                                            <p>تاريخ البدء:
                                                                {{ date('d-m-Y', strtotime($item->startDate)) }}
                                                            </p>
                                                            <p>تاريخ الانتهاء:
                                                                {{ date('d-m-Y', strtotime($item->endDate)) }}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

        <script>
            (function() {
                var appContainer = document.querySelector('.app-container'),
                    sidebar = appContainer.querySelector('.side-menu'),
                    navbar = appContainer.querySelector('nav.navbar.navbar-top'),
                    loader = document.getElementById('voyager-loader'),
                    hamburgerMenu = document.querySelector('.hamburger'),
                    sidebarTransition = sidebar.style.transition,
                    navbarTransition = navbar.style.transition,
                    containerTransition = appContainer.style.transition;

                sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition =
                    appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                    navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none';

                if (window.innerWidth > 768 && window.localStorage && window.localStorage['voyager.stickySidebar'] ==
                    'true') {
                    appContainer.className += ' expanded no-animation';
                    loader.style.left = (sidebar.clientWidth / 2) + 'px';
                    hamburgerMenu.className += ' is-active no-animation';
                }

                navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition;
                sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition;
                appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                    containerTransition;
            })();
        </script>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                @yield('page_header')
                <div id="voyager-notifications"></div>
                @yield('content')
            </div>
        </div>
    </div>
    </div>

    @include('voyager::partials.app-footer')
    <!-- Javascript Libs -->

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>

    <script>
        @if (Session::has('alerts'))
            let alerts = {!! json_encode(Session::get('alerts')) !!};
            helpers.displayAlerts(alerts, toastr);
        @endif

        @if (Session::has('message'))

            // TODO: change Controllers to use AlertsMessages trait... then remove this
            var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
            var alertMessage = {!! json_encode(Session::get('message')) !!};
            var alerter = toastr[alertType];

            if (alerter) {
                alerter(alertMessage);
            } else {
                toastr.error("toastr alert-type " + alertType + " is unknown");
            }
        @endif
    </script>
    @include('voyager::media.manager')
    @yield('javascript')
    @stack('javascript')
    @if (!empty(config('voyager.additional_js')))
        <!-- Additional Javascript -->
        @foreach (config('voyager.additional_js') as $js)
            <script type="text/javascript" src="{{ asset($js) }}"></script>
        @endforeach
    @endif

</body>

</html>
