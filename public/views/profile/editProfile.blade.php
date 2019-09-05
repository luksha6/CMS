@extends('layouts.master')

@section('content')
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="user-settings">
            <form method="POST" action="/public/profile/update" class="form-horizontal"
                  role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <h1 style="text-align: center;">Vaš profil</h1><hr>
                @if($user->profile_pic)
                    <div class="col-md-4 offset-3">
                        <img style="position:relative;" src="/public/uploads/profile/{{$user->profile_pic}}"
                             class="img-responsive img-thumbnail ">
                    </div>
                @else
                    <div class="col-md-2 offset-5">
                        <img style="position:relative;" src="/resources/assets/img/avatar.jpg"
                             class="img-responsive img-thumbnail ">
                    </div>
            @endif
                <div class="col-md-4 offset-5 form-group">
                    <label for="profile_pic">Odaberite istaknutu sliku:</label><br>
                    <input type="file" name="profile_pic" id="profile_pic"/>
                </div>
                <hr>
            <!-- edit form column -->
                <div class="col-md-9 personal-info">

                    <h3 style="margin-left:22%;">Osobni podatci</h3>


                    <div class="form-group">
                        <label for="first_name" class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input id="first_name" name="name" class="form-control" type="text" value="{{Auth::user()->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_email" class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input id="user_email" name="email" class="form-control" type="text" value="{{Auth::user()->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-luksha" value="Save Changes">
                        </div>
                    </div>
                </div>
            </form>

            <hr>

            <form method="POST" action="/public/profile/password" class="form-horizontal"
                  role="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <h3 style="text-align: center;">Promjena lozinke</h3><hr>
                <div class="form-group">
                    <label for="pass_old" class="col-md-3 control-label">Old password:</label>
                    <div class="col-md-8">
                        <input id="pass_old" name="password-old" class="form-control" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-md-3 control-label">New Password:</label>
                    <div class="col-md-8">
                        <input id="pass" name="password" class="form-control" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass_repet" class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input id="pass_repet" name="password-repeat" class="form-control" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-luksha" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>

@endsection
