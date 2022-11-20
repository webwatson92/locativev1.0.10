<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Tableau de bord</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/themefy_icon/themify-icons.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/niceselect/css/nice-select.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/owl_carousel/css/owl.carousel.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/gijgo/gijgo.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/font_awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendors/tagsinput/tagsinput.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/datepicker/date-picker.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/scroll/scrollable.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendors/datatable/css/buttons.dataTables.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/text_editor/summernote-bs4.css')}}" />

    <link rel="stylesheet" href="{{ asset('vendors/morris/morris.css')}}">

    <link rel="stylesheet" href="{{ asset('vendors/material_icon/material-icons.css')}}" />

    <link rel="stylesheet" href="{{ asset('css/metisMenu.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style1.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/colors/default.css')}}" id="colorSkinCSS">
    <!-- Switch btn -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
     <!-- / Switch btn -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
    @livewireStyles
</head>
<body>

<!-- Sidebar menu -->
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">

    <div class="logo d-flex justify-content-between">
        <a href="index.html" class="h5">Tableau de bord</a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu"> 
        @auth
            @admin
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            <img src="img/menu-icon/2.svg" alt="">
                        </div>
                        <span>Paramètre</span>
                    </a>
                    <ul>
                        @superadmin
                            <li><a href="{{ route('user.list') }}">Utilisateur</a></li>
                        @endsuperadmin
                        <li><a href="{{ route('cotable.index') }}">Cotable</a></li>
                        <li><a href="{{ route('pays.index') }}">Pays</a></li>
                        <li><a href="{{ route('ville.index') }}">Ville</a></li>
                        <li><a href="{{ route('quartier.index') }}">Quartier</a></li>
                        <li><a href="{{ route('cat_permis.index') }}">Cat permis</a></li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                        <img src="img/menu-icon/5.svg" alt="">
                        </div>
                        <span>Fonction</span>
                    </a>
                    <ul>
                        <li><a href="{{ route('societe.index') }}">Société</a></li>
                            <li><a href="{{ route('gerant.index') }}">Gérant</a></li>
                            <li><a href="{{ route('chauffeur.index') }}">Chauffeur</a></li>
                            <li><a href="{{ route('client.admin') }}">Client</a></li>
                            <li><a href="{{ route('fournisseur.index') }}">Fournisseur</a></li>
                    </ul>
                </li>
            @endadmin
                <li class="">
                    <a class="has-arrow" href="{{ route('gestion.index') }}" aria-expanded="false">
                        <div class="icon_menu">
                        <img src="img/menu-icon/6.svg" alt="">
                        </div>
                        <span>Gestion</span>
                    </a>
                </li>
        @endauth   
    </ul>

</nav>
<!-- /Sidebar menu -->

<!-- Header & content -->
<section class="main_content dashboard_part">

    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <!-- btn-sidebar & search -->
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area d-flex align-items-center">
                        <div class="search_inner">
                            <form action="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search here...">
                                </div>
                                <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                            </form>
                        </div>
                    </div>
                    <!-- / btn-sidebar & search -->

                    <!-- btn-notif-msg & profil -->
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <a class="bell_notification_clicker nav-link-notify" href="#"> <img src="img/icon/bell.svg" alt="">
                                </a>

                                <div class="Menu_NOtification_Wrap">
                                    <div class="notification_Header">
                                        <h4>Notifications</h4>
                                    </div>
                                <div class="Notification_body">

                                <div class="single_notify d-flex align-items-center">
                                <div class="notify_thumb">
                                <a href="#"><img src="img/staf/2.png" alt=""></a>
                                </div>
                                <div class="notify_content">
                                <a href="#"><h5>Cool Marketing </h5></a>
                                <p>Lorem ipsum dolor sit amet</p>
                                </div>
                                </div>

                                <div class="single_notify d-flex align-items-center">
                                <div class="notify_thumb">
                                <a href="#"><img src="img/staf/4.png" alt=""></a>
                                </div>
                                <div class="notify_content">
                                <a href="#"><h5>Awesome packages</h5></a>
                                <p>Lorem ipsum dolor sit amet</p>
                                </div>
                                </div>

                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1">See More</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="CHATBOX_open nav-link-notify" href="#"> <img src="img/icon/msg.svg" alt=""> </a>
                            </li>
                        </div>
                        <div class="profile_info">
                            <img src="img/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p></p>
                                    <h5><h5>{{ Auth::user()->name }}</h5></h5>
                                </div>
                                <div class="profile_info_details">
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / btn-notif-msg & profil -->
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container-fluid p-0">
            <div class="row" style="padding-top:0px">
                @yield('content')
            </div>
        </div>
    </div>

</section>


<!-- Go to top -->
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
<!-- /Go to top -->

<script src="{{ asset('js/jquery1-3.4.1.min.js')}}"></script>

<script src="{{ asset('js/popper1.min.js')}}"></script>

<script src="{{ asset('js/bootstrap1.min.js')}}"></script>

<script src="{{ asset('js/metisMenu.js')}}"></script>

<script src="{{ asset('vendors/count_up/jquery.waypoints.min.js')}}"></script>

<script src="{{ asset('vendors/chartlist/Chart.min.js')}}"></script>

<script src="{{ asset('vendors/count_up/jquery.counterup.min.js')}}"></script>

<script src="{{ asset('vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>

<script src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{ asset('vendors/progressbar/jquery.barfiller.js')}}"></script>

<script src="{{ asset('vendors/tagsinput/tagsinput.js')}}"></script>

<script src="{{ asset('vendors/text_editor/summernote-bs4.js')}}"></script>
<script src="{{ asset('vendors/am_chart/amcharts.js')}}"></script>

<script src="{{ asset('vendors/scroll/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('vendors/scroll/scrollable-custom.js')}}"></script>
<script src="{{ asset('vendors/chart_am/core.js')}}"></script>
<script src="{{ asset('vendors/chart_am/charts.js')}}"></script>
<script src="{{ asset('vendors/chart_am/animated.js')}}"></script>
<script src="{{ asset('vendors/chart_am/kelly.js')}}"></script>
<script src="{{ asset('vendors/chart_am/chart-custom.js')}}"></script>

<script src="{{ asset('js/custom.js')}}"></script>
@livewireScripts
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{ ('Jquery/prettify.js') }}"></script>
<script>
    window.addEventListener('closeModal', event => {
        $('#modalForm').modal('hide');
    })
    window.addEventListener('openModal', event => {
        $('#modalForm').modal('show');
    })
    // delete
    window.addEventListener('openDeleteModal', event => {
        $('#modalFormDelete').modal('show');
    })
    window.addEventListener('closeDeleteModal', event => {
        $('#modalFormDelete').modal('hide');
    })
    //end Delete
    $(document).ready(function(){
        //this event is triggered  when the modal is hidden
        $('#modalForm').on('hidden.bs.modal', function(){
            livewire.emit('forcedCloseModal');
        });
    });
</script>
<script src="https://kit.fontawesome.com/299943a710.js" crossorigin="anonymous"></script>
<!-- Switch btn -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- / Switch btn -->
@yield('scripts')
</body>
</html>
