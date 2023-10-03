<?php 
  use Illuminate\Support\Facades\Auth;

  if(Auth::check()){
    $USERID           = (Auth::getUser()->USERID);
    $EMAIL            = (Auth::getUser()->email);
    $USERGROUPID      = (Auth::getUser()->USERGROUPID);
  }
    
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Glossary') }}</title>
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="cork/assets/img/hls.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="cork/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="cork/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="cork/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <link href="cork/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="cork/assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css">
    <link href="cork/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="cork/assets/css/apps/contacts.css" rel="stylesheet" type="text/css" />
    <link href="cork/plugins/editors/quill/quill.snow.css" rel="stylesheet" type="text/css">
    <link href="cork/assets/css/apps/todolist.css" rel="stylesheet" type="text/css" />
    <link href="cork/assets/css/modified.css" rel="stylesheet" type="text/css" />
    <link href="cork/assets/css/forms/switches.css" rel="stylesheet" type="text/css" >
    <link href="cork/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="cork/plugins/table/datatable/datatables.css" rel="stylesheet" type="text/css">
    <link href="cork/plugins/table/datatable/dt-global_style.css"  rel="stylesheet" type="text/css" >
    
    

</head>
<body class="sidebar-noneoverflow application">

    <!--this div is for use exclusivily VUE.JS --->
    <div id="app">

    @if(Auth::check())
      <input type="hidden" name="USERID" id="USERID" value="<?=$USERID?>">
      <input type="hidden" name="USERGROUPID" id="USERGROUPID" value="<?=$USERGROUPID?>">
    @endif
    
    <!--  BEGIN NAVBAR  -->
        @include('layouts.partials_client.topbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        @if(Auth::check())
            <!--  BEGIN SIDEBAR  -->
            <div class="sidebar-wrapper sidebar-theme">
                
                @include('layouts.partials_client.sidebar')
                @include('layouts.partials_client.sidebarchild')

            </div>
            <!--  END SIDEBAR  -->
        @endif
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                @yield('content')
            </div>
           
        </div>

        <!--  END CONTENT AREA  -->
       
    </div>
        <!-- END MAIN CONTAINER -->

    </div>
    <div class="footer-wrapper-center">
        @include('layouts.partials_client.footer')
    </div>
    <!-- close tag use Vue.js --->


     <!-- Jquery Core js -->
	<!--script src="{{ asset('vendor/jquery-3.4.1/jquery-3.4.1.min.js') }}"></!--script-->
	<!-- Bootstrap Core js -->
	<!--script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></!--script-->
	<!-- Sweet Alert2 Core js -->
	<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="cork/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="cork/bootstrap/js/popper.min.js"></script>
    <script src="cork/bootstrap/js/bootstrap.min.js"></script>
    <script src="cork/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="cork/assets/js/app.js"></script>   
    <script src="cork/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script> 
  
    
    <script>
        $(document).ready(function() {
            App.init();
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script src="cork/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="cork/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="cork/assets/js/apps/contact.js"></script>
    <script src="cork/assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="cork/plugins/editors/quill/quill.js"></script>
    <script src="cork/assets/js/apps/todoList.js"></script>
    <script src="cork/assets/js/authentication/form-1.js"></script>
    <script src="js/scripts/sendfeedback.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.min.js"></script>
    

</body>
</html>
