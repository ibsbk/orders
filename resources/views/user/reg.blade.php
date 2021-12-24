@extends('layouts.layout')
@section('content')
    @guest()
        <div class="logo">Регистрация</div>
        <form method="post" class="form">
            @csrf
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
                @error('gender_id')
                <p class="err">
                    {{$message}}
                </p>
                @enderror
                <div>пол</div>
                <select name="gender_id">
                    @foreach($genders as $gender)
                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                    @endforeach
                </select>
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
                @error('password_confirmation')
                <p class="err">
                    {{$message}}
                </p>
                @enderror
                <div>повторите пароль</div>
                <input type="password" name="password_confirmation" placeholder="пароль">
            </div>
            <div class="wrapper">
               <button>Регистрация</button>
            </div>
        </form>
    @endguest
@endsection
