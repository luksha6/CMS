@extends('layouts.master')

@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-warning">
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

        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{url('/profile/update')}}"enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                <div class="box box-primary">

                    <div class="box-body box-profile">

                        <div class="container text-center">


                            @if($user->profile_pic)
                                <div class="box-body">
                                    <div class="form-group">

                                   <span class="btn btn-default btn-file" style=" .btn-file {
            position: relative;
            overflow: hidden;
            width: 0px !important;
            height:0px !important;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;

            min-width:0;
            min-height:0;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }">
                                        <img class="profile-user-img img-responsive img-circle"
                                             src="{{url('/uploads/profile')}}/{{$user->profile_pic}}"
                                             alt="User profile picture" style="width:100% !important;"></a>
                                       <input type="file" name="profile_pic" id="profile_pic">
                                        </span>
                                    </div>

                                </div>
                            @else
                                <div class="box-body">
                                    <div class="form-group">

                                   <span class="btn btn-default btn-file">
                                         <img style="position:relative;"
                                              src="{{url('/resources/assets/img/avatar.jpg')}}"
                                              class="profile-user-img img-responsive img-circle"> <i
                                               class="fa fa-plus-circle "
                                               style="position:absolute; right:5px; top:90px;"></i></a>
                                       <input type="file" name="profile_pic" id="profile_pic"/>
                                        </span>

                                    </div>
                                </div>
                            @endif
                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                        </div>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Ime i Prezime</b> <a class="pull-right">{{Auth::user()->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>E-Mail</b> <a class="pull-right">{{Auth::user()->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Lozinka</b> <a class="pull-right">************</a>
                            </li>
                        </ul>


                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box-body">
                    <div class="form-group">

                        <h3><label class="badge"> Uredi Profil</label></h3>

                        <div class="form-group">
                            <label>Ime i Prezime</label>
                            <input name="name" id="first_name" type="text" class="form-control"
                                   value="{{Auth::user()->name}}">
                        </div>

                        <div class="form-group">
                            <label>E-Mail</label>
                            <input name="email" id="user_email" type="text" class="form-control"
                                   value="{{Auth::user()->email}}">
                        </div>
                        <button type="submit" class="btn btn-success" type="submit" value="Spremi">
                            SPREMI PROMJENE
                        </button>
                        <hr>
                    </div>
                </div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="box-body">
                    <div class="form-group">

                        <h3><label class="badge"> Promjena Lozinke</label></h3>
                        <form method="POST" action="{{url('/profile/password')}}" class="form-horizontal"
                              role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <label>Stara Lozinka</label>
                                <input type="password" id="pass_old" name="password-old" class="form-control"
                                       placeholder="Lozinka ">
                            </div>


                            <div class="form-group">
                                <label>Lozinka</label>
                                <input type="password" id="pass" name="password" class="form-control"
                                       placeholder="Lozinka ">
                            </div>


                            <div class="form-group">
                                <label>Potvrdi Lozinku</label>
                                <input type="password" id="pass_repet" name="password-repeat"
                                       class="form-control"
                                       placeholder="Lozinka ">
                            </div>
                            <button type="submit" class="btn btn-success" type="submit" value="Spremi">
                                SPREMI PROMJENE
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>












@endsection
