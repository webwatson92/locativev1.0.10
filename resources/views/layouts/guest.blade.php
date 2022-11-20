<!DOCTYPE html>
<html lang="fr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Marketing</title>
    <link rel="icon" href="img/logo.png" type="image/png">

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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('styles')
    @livewireStyles
</head>

<body class="crm_body_bg">
    <section class="main_content dashboard_part default_content">
        <div class="main">
            <div class="container-fluid p-0">
                <div class="row " style="padding-top:30px">
                   @yield('content')
                </div>
            </div>
        </div>

    </section>
    @yield('scripts')
    <script src="{{ asset('js/jquery1-3.4.1.min.js')}}"></script>

    <script src="{{ asset('js/popper1.min.js')}}"></script>

    <script src="{{ asset('js/bootstrap1.min.js')}}"></script>

    <script src="{{ asset('js/metisMenu.js')}}"></script>

    <script src="{{ asset('vendors/count_up/jquery.waypoints.min.js')}}"></script>

    <script src="{{ asset('vendors/chartlist/Chart.min.js')}}"></script>

    <script src="{{ asset('vendors/count_up/jquery.counterup.min.js')}}"></script>

    <script src="{{ asset('vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>

    <script src="{{ asset('vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>

   <script src="{{ asset('vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
     {{-- <script src="{{ asset('vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatable/js/buttons.print.min.js')}}"></script> --}}
    <script src="{{ asset('js/chart.min.js')}}"></script>

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
    
    @yield('scripts')
</body>
</html>