@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
        <section class="content-header">
            <h1>
                Slider

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Pocetak</a></li>
                <li>Slider</li>
                <li class="active">Uredi Slajd</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="row">
                <div class="col-xs-12">

                    <form method="POST" action="{{url('/admin/slider/edit')}}/{{ $slide->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <!-- text input -->
                        <div class="form-group">
                            <label>Naslov Slajdera</label>
                            <input type="text" class="form-control" placeholder="Naslov " name="title" value="{{ $slide->title }}">
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                            <label>Tekst Ispod Naslova</label>
                            <textarea class="form-control" rows="3" placeholder="Tekst " name="body">{{ $slide->body }}</textarea>
                        </div>

                        <div class="form-group">
                            <p><label>Slider Aktivan</label></p>
                            @if($slide->active)
                                <label>
                                    Aktivan
                                    <input type="checkbox" name="active" checked>
                                </label>
                            @else
                                <label>
                                    Aktivan
                                    <input type="checkbox" name="active">
                                </label>
                            @endif
                        </div>

                        <div class="form-group">
                            <p><label>Gumb Aktivan</label></p>
                            @if($slide->button_active)
                                <label>
                                    Aktivan
                                    <input type="checkbox" name="button_active" checked>
                                </label>
                            @else
                                <label>
                                    Aktivan
                                    <input type="checkbox" name="button_active">
                                </label>
                            @endif
                        </div>

                        <!-- text input -->
                        <div class="form-group">
                            <label>Naziv Buttona</label>
                            <input type="text" name="button_title" class="form-control" placeholder="Button "
                                   value="{{ $slide->button_title }}">
                        </div>

                        <!-- text input -->
                        <div class="form-group">
                            <label>Link Gdje Button Vodi
                                <small>(http://www.google.com)</small>
                            </label>
                            <input type="text" name="button_link" class="form-control" placeholder="Link "
                                   value="{{ $slide->button_link }}">
                        </div>

                        <h3><button type="submit" class="label label-success"> Uredi Slajd</button></h3>

                    </form>
                </div>

            </div>


        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection