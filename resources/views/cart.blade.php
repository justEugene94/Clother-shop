@extends('layouts.cart')

@section('header')
    @include('index.header')
@endsection

@section('sidebar')
    @include('cart.sidebar')
@endsection

@section('content')
    @include('cart.content')
@endsection

@section('footer')
    @include('index.footer')
@endsection