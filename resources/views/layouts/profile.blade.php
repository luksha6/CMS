@extends('layouts.master')

@section('content')
    <div id="right-block" class="col-md-7 offset-3">

        <div class="user-settings">

            <form class="form-horizontal" role="form" enctype="multipart/form-data">

                <h1 style="margin-left:16%">Vaš profil</h1>
                @if($user->profile_pic)
                    <div class="col-md-2 hidden-xs offset-2">
                        <img style="position:relative;" src="{{url('//uploads/profile/{{$user->profile_pic}}"
                             class="img-responsive img-thumbnail ">
                        <img style="position:absolute; top:-5px; right:15px;" src="{{url('/resources/assets/img/camera.png')}}">
                    </div>
                @else
                    <div class="col-md-2 hidden-xs offset-2">
                        <img style="position:relative;" src="{{url('/resources/assets/img/avatar.jpg')}}"
                             class="img-responsive img-thumbnail ">
                        <img style="position:absolute; top:-5px; right:15px;" src="{{url('/resources/assets/img/camera.png')}}">
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