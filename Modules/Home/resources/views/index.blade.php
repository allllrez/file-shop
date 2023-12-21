@extends('home::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('home.name') !!}</p>
@endsection
