<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RWA | Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/public/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="/public/dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="/public/plugins/iCheck/all.css">
    <link rel="stylesheet" href="/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css"> .btn-file {
            position: relative;
            overflow: hidden;
            width:100%;
            height:153px;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;

            min-width: 100%;
            min-height: 100%;
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

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.layout.header')

    @include('admin.layout.sidebar')

    @yield('content')

    <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Admin Panel v1.0
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2018 <a href="#">RWA_FSR_CMS</a>.</strong> All rights reserved.
        </footer>

</div>



<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/public/dist/js/adminlte.min.js"></script>


<!-- FastClick -->
<script src="/public/bower_components/fastclick/lib/fastclick.js"></script>


<!-- CK Editor -->
<script src="/public/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>

<!-- DataTables -->

<script src="/public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="/public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script>

        $(function () {

                $('#example1').DataTable()

                $('#example2').DataTable({

                        'paging'      : true,

                        'lengthChange': false,

                        'searching'   : false,

                        'ordering'    : true,

                        'info'        : true,

                        'autoWidth'   : false

                })

            })

    </script>

</body>
</html>