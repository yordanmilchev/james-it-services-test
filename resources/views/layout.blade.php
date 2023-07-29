<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title', 'KBH')</title>
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
    <link href="{{ asset('themes/metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('themes/metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('themes/metronic/assets/css/skins/header/base/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('themes/metronic/assets/css/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('themes/metronic/assets/css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('themes/metronic/assets/css/skins/aside/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/vendor/jquery.loadingModal.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/typeahead.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/appCustom.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('themes/metronic/assets/css/responsive-datatables.css') }}" rel="stylesheet">
    <!--end::Layout Skins -->
@show

<!--begin::Page Custom Styles(used by this page) -->
@yield('page_css')
<!--end::Page Custom Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo.ico') }}"/>
    <!-- bootstrap-select component -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">

    @section('head_js')
        {{-- some javascript libraries need to be in head like amCharts --}}
    @show

    <style>
        .kt-pulse.kt-pulse--brand .kt-pulse__ring { border-color: rgba(255, 214, 10, 0.8); border-width: 6px; }
        .kt-checkbox > span { width: 25px; height: 25px; }
        .kt-checkbox > span:after { margin-top: -15px; margin-left: -5px; width: 10px; height: 20px; border: 1px solid #28a745; }
        .border-radius { border-radius: 8px; }

        .btn.btn-label-dark-warning {
            background-color: rgba(255, 87, 51, 0.2);
            color: #ffb822;
            cursor: text !important;
        }
    </style>
</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

@section('mobile_head_menu')
    @include('admin.components.mobile_head_menu')
@show

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @section('left_navigation')
            @include('admin.components.left_navigation')
        @show
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

        @section('header')
            @include('admin.components.header')
        @show
        @section('subheader')
            @include('admin.components.subheader')
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
                @include('admin.components.footer')
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
    <script src="{{ asset('themes/metronic/assets/plugins/global/plugins.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/metronic/assets/js/scripts.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/disableAutoFill/jquery.disableAutoFill.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/metronic/assets/js/pages/components/extended/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/vendor/jquery.loadingModal.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!--end::Global Theme Bundle -->

    <script>
        function showAjaxLoader() {
            $('<div class="ajaxLoader"><img src="{{ asset('/images/dots-loader.svg') }}"></div>').prependTo("body");
        }

        function hideAjaxLoader() {
            $(".ajaxLoader").remove();
        }

        $(document).ajaxSend(function (e, xhr, opt) {
            showAjaxLoader();
        });

        $(document).ajaxComplete(function () {
            hideAjaxLoader();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            }
        });
    </script>
@show


<!--begin::Page Scripts(used by this page) -->
@section('page_js')
    <script>
        $(document).ready(function (e) {
            $('.go-back-btn').on('click', function (event) {
                event.preventDefault();
                window.history.go(-1);
            });

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