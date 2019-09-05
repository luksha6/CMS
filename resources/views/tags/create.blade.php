@extends('layouts.master')

@section('content')
    <h1>Novi Tag</h1>

    <hr>

    <form method="POST" action="{{('/public/tag/create')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Ime Taga: </label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Pohrani</button>
        </div>
        @include('layouts.errors')

    </form>

@endsection
