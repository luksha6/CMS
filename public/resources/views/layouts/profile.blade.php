@extends('layouts.master')

@section('content')
    <div id="right-block" class="col-md-7 offset-3">

        <div class="user-settings">

            <form class="form-horizontal" role="form" enctype="multipart/form-data">

                <h1 style="margin-left:16%">Vaš profil</h1>
                @if($user->profile_pic)
                    <div class="col-md-2 hidden-xs offset-2">
                        <img style="position:relative;" src="/public/uploads/profile/{{$user->profile_pic}}"
                             class="img-responsive img-thumbnail ">
                        <img style="position:absolute; top:-5px; right:15px;" src="/resources/assets/img/camera.png">
                    </div>
                @else
                    <div class="col-md-2 hidden-xs offset-2">
                        <img style="position:relative;" src="/resources/assets/img/avatar.jpg"
                             class="img-responsive img-thumbnail ">
                        <img style="position:absolute; top:-5px; right:15px;" src="/resources/assets/img/camera.png">
                    </div>
            @endif
            <!-- edit form column -->
                <div class="col-md-9 personal-info">

                    <h3 style="margin-left:22%;">Osobni podatci</h3>

                    <div class="form-group">
                        <label for="first_name" class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input id="first_name" class="form-control" type="text" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_email" class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input id="user_email" class="form-control" type="text" value="{{ $user->email }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="pass" class="col-md-3 control-label">New Password:</label>
                        <div class="col-md-8">
                            <input id="pass" class="form-control" type="password" value="11111122333">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass_repet" class="col-md-3 control-label">Confirm password:</label>
                        <div class="col-md-8">
                            <input id="pass_repet" class="form-control" type="password" value="11111122333">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="button" class="btn btn-luksha" value="Save Changes">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>


</main> <!-- KRAJ MAINA -->

@endsection


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/resources/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
    $(document).ready(function () {
        var mode = false;
        $('a[id="nightmodeID"]').click(function () {
            if (mode == false) {
                $('body').css('background', '#142634');
                $('body').css('color', '#BDC7C1');
                $('div[class="jumbotron"]').css('background', '#142634');
                $('hr').css('background', 'white');
                $('nav').css('border-bottom', '1px solid white');
                $('footer').css('background', '#142634');
                $('ul[class="paginator"]').css('background', '#142634');
                mode = true;
            } else {
                $('body').css('background', '#fff');
                $('body').css('color', 'black');
                $('div[class="jumbotron"]').css('background', '#e9ecef');
                $('hr').css('background', 'grey');
                $('nav').css('background', '#343a40');
                $('footer').css('background', '#e9ecef');
                mode = false;
            }
        });
    })
</script>
<script src="/resources/assets/js/vendor/popper.min.js"></script>
<script src="/resources/dist/js/bootstrap.min.js"></script>
</body>
</html>