@extends('layouts.show')

@section('header')
    @include('index.header')
@endsection

@section('sidebar')
    @include('show.sidebar')
@endsection

@section('content')
    @include('show.content')
@endsection

@section('footer')
    @include('index.footer')
@endsection