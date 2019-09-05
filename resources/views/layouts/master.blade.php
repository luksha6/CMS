<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/resources/assets/img/favicons/favicon.ico">

    <title>FSR CMS | Dobrodošli!</title>

    <!-- Bootstrap CSS -->
    <link href="{{url('/resources/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/resources/dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('/resources/dist/css/bootstrap-grid.css')}}" rel="stylesheet">
    <link href="{{url('/resources/dist/css/bootstrap-grid.min.css')}}" rel="stylesheet">
    <link href="{{url('/resources/dist/css/bootstrap-reboot.css')}}" rel="stylesheet">
    <link href="{{url('/resources/dist/css/bootstrap-reboot.min.css')}}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{url('/dist/css/skins/skin-blue.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('/bower_components/Ionicons/css/ionicons.min.css')}}">


    <!-- CSS za FSRCMS -->
    <link href="{{url('/resources/fsrcms.css')}}" rel="stylesheet">
    <style type="text/css"> .btn-file {
            position: relative;




        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;

            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }</style>

</head>

<body>

@include('layouts.navbar')

@include('layouts.slider')

<hr>

<main role="main">
    <div class="container">

        <div class="row" >
            <!-- SADRZAJ -->
            <div class="col-sm-8">
                @yield('content')
            </div>
            <!-- KRAJ -->

            <!-- SIDEBAR -->
            <div class="col-sm-4">
                <div class="jumbotron" style="padding-top:15px;">
                    <aside>
                        @include('sidebar.categories')
                        <hr>
                        @include('sidebar.archive')
                        <hr>
                        @include('sidebar.socialNetworks')
                    </aside>
                </div>
            </div>
            <!-- SIDEBAR KRAJ-->
        </div>

    </div>

</main> <!-- KRAJ MAINA -->

@include('layouts.footer')


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{url('/resources/assets/js/vendor/jquery.min.js')}}"><\/script>')</script>
<script src="{{url('/resources/assets/js/vendor/popper.min.js')}}"></script>
<script src="{{url('/resources/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>