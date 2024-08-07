@extends('layouts.app')
@section('tittle')
    Home
@endsection
@section('content')
    @include('components.hero')
    @include('components.all-blog')
@endsection