<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title', 'James IT Services')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @livewireStyles

    <!--begin::Fonts -->
    <link href="{{ asset('fonts/family=Poppins.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Fonts -->
@section('global_css')
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('css/skins/header/base/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/skins/brand/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/skins/aside/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/appCustom.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Skins -->
@show

<!--begin::Page Custom Styles(used by this page) -->
@yield('page_css')
<!--end::Page Custom Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/cropped-OGHIazP-32x32.png') }}"/>

</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading kt-aside--minimize">

@section('mobile_head_menu')
    @include('components.mobile_head_menu')
@show

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @section('left_navigation')
            @include('components.left_navigation')
        @show
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

        @section('header')
            @include('components.header')
        @show
        @section('subheader')
            @include('components.subheader')
        @show
        <!-- begin:: Content -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <!-- begin:: body_content section -->
                @yield('body_content')
                <!-- end:: body_content section -->
                </div>
            </div>
            <!-- end:: Content -->
            @section('footer')
                @include('components.footer')
            @show
        </div>
    </div>
</div>

@section('global_js')
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <!-- end::Global Config -->

    @livewireScripts

    <script>
        window.addEventListener('closeModal', e => {
            $('.modal').modal('hide');
            setTimeout(function() {
                $(".alert-dismissible").fadeOut('fast');
            }, 3000);
        });
    </script>

    <script>
         window.livewire.on('dismissAlert', ()=> {
             setTimeout(function() {
                 $(".alert-dismissible").fadeOut('fast');
             }, 3000);
         });
    </script>


    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('plugins/global/plugins.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts.bundle.min.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
@show


<!--begin::Page Scripts(used by this page) -->
@section('page_js')
    <script>
        $(document).ready(function (e) {
            $('.js-loader').on('click', function (e) {
                $('body').loadingModal({
                    text: 'Зареждане...',
                    color: '#fff',
                    animation: 'wave'
                });
            });
        });
    </script>
@show
<!--end::Page Scripts -->
</body>
</html>
