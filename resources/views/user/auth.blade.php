@extends('layouts.layout')
@section('content')
    @guest()
        <div class="logo">Авторизация</div>
        <form method="post" class="form">
            @csrf
            <div class="wrapper">
                @error('autherror')
                <p class="err">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="wrapper">
                @error('login')
                <p class="err">
                    {{$message}}
                </p>
                @enderror
                <div>логин</div>
                <input type="text" name="login" placeholder="login">
            </div>
            <div class="wrapper">
                @error('password')
                <p class="err">
                    {{$message}}
                </p>
                @enderror
                <div>пароль</div>
                <input type="password" name="password" placeholder="пароль">
            </div>
            <div class="wrapper">
                <button>Войти</button>
            </div>
        </form>
    @endguest
@endsection
