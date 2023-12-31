<!-- begin:: Aside -->
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="/" class="js-loader">
                <img alt="Logo" src="{{ asset('images/James_logo_ITservices.png') }}" width="120" />
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span>
                    <i class="flaticon2-fast-back" style="color: #5867dd"></i>
                </span>
                <span>
                    <i class="flaticon2-fast-next" style="color: #5867dd"></i>
                </span>
            </button>
            <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left"
                id="kt_aside_toggler"><span></span></button>
        </div>
    </div>
    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
            data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  kt-menu__item {{ str_contains($routeName, 'tasks') ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                    <a href="/tasks" class="kt-menu__link js-loader">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-tasks"></i>
                        </span><span class="kt-menu__link-text">Tasks</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end:: Aside Menu -->
</div>
<!-- end:: Aside -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // open menu if sub link is active
        $('.kt-menu__item.kt-menu__item--active').closest('li.kt-menu__item--submenu').addClass('kt-menu__item--open');
    }, false);
</script>
