@extends('layouts.main')
@section('content')

<html>
    <body>
    <link rel="stylesheet" href="{{ asset('css/publichome.css') }}" type="text/css">
    <img src="{{ asset('images/home.png') }}" aly="bg">
    <a href="{{ route('login') }}">Click Here To Login</a>
    </body>
</html>

@endsection