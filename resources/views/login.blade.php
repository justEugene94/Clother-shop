@extends('layouts.index')

@section('header')
    @include('index.header')
@endsection

@section('content')

    <div class="account">
        <h1>Account</h1>
        <div class="account-pass">
            <div class="col-md-8 account-top">
                <form method="POST" action="{{ url('/login') }}">

                    {{ csrf_field() }}

                    <div>
                        <span>Login</span>
                        <input name="login" type="text">
                    </div>
                    <div>
                        <span >Password</span>
                        <input name="password" type="password">
                    </div>
                    <input type="submit" value="Войти">
                </form>
            </div>
        </div>
    </div>

@endsection