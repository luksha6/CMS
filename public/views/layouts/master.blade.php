<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/resources/assets/img/favicons/favicon.ico">

    <title>FSR CMS | Dobrodošli!</title>

    <!-- Bootstrap CSS -->
    <link href="/resources/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/dist/css/bootstrap.css" rel="stylesheet">
    <link href="/resources/dist/css/bootstrap-grid.css" rel="stylesheet">
    <link href="/resources/dist/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="/resources/dist/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="/resources/dist/css/bootstrap-reboot.min.css" rel="stylesheet">


    <!-- CSS za FSRCMS -->
    <link href="/resources/fsrcms.css" rel="stylesheet">
</head>

<body>

@include('layouts.navbar')

@include('layouts.header')

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
<script>window.jQuery || document.write('<script src="/resources/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
    $(document).ready(function()
    {
        var mode=false;
        $('a[id="nightmodeID"]').click(function()
        {
            if(mode==false)
            {
                $('body').css('background','#142634');
                $('body').css('color','#BDC7C1');
                $('div[class="jumbotron"]').css('background','#142634');
                $('hr').css('background','white');
                $('nav').css('border-bottom','1px solid white');
                $('footer').css('background','#142634');
                $('ul[class="paginator"]').css('background','#142634');
                mode=true;
            }else
            {
                $('body').css('background','#fff');
                $('body').css('color','black');
                $('div[class="jumbotron"]').css('background','#e9ecef');
                $('hr').css('background','grey');
                $('nav').css('background','#343a40');
                $('footer').css('background','#e9ecef');
                mode=false;
            }
        });
    })
</script>
<script src="/resources/assets/js/vendor/popper.min.js"></script>
<script src="/resources/dist/js/bootstrap.min.js"></script>
</body>
</html>