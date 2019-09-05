@extends('layouts.master')

@section('content')
    <h1>Nova objava</h1>

    <hr>

    <form method="POST" action="{{url('/')}}{{('create')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Naslov: </label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Sadržaj: </label>
            <textarea id="body" name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Pohrani</button>
        </div>

        @include('layouts.errors')

    </form>

@endsection
