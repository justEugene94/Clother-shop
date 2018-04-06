@extends('layouts.index')

@section('header')
    @include('index.header')
@endsection

@section('content')
    @include('blog.content_single')
@endsection

@section('footer')
    @include('index.footer')
@endsection