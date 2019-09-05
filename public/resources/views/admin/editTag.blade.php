@extends('admin.layout.master')

@section('content')

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
                Tagovi

            </h1>
            <ol class="breadcrumb">
                <li><a href="../Pocetna.html"><i class="fa fa-dashboard"></i> Pocetak</a></li>
                <li>Objave</li>
                <li class="active">Dodaj Tag</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <form method="POST" action="/public/tag/update/{{ $tag->id }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-warning">Spremi</button>
                                    </div>
                                    <input type="text" id="dodaj_tag" name="name" class="form-control"
                                           value="{{ $tag->name }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->

    </div>
@endsection